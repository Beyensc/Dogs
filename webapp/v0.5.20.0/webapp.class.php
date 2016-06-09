<?php

//version 0.11.5.4.0

class WebApp {

    private $dbPdo;
    private $debug = true;
    public $component = '';
    public $action = '';
    private $contentData = array();
    private $head = '';
    private $arMainMenu = array();
    public $urlVars;
    public $pathWebApp;
    private $pathModel = 'model/';
    private $pathView = 'view/';
    private $localDirComponents = 'components/';
    private $globalDirComponents = 'components/';
    private $pathMenu = 'menus/';
    private $controller;
    private $logged = false;
    private $defaultComponent;
    private $defaultAction;
    private $defaultParam1Name;
    private $defaultParam1Value;
    public $jsFiles = array();
    private $jsCode;
    public $cssFiles = array();
    public $cssCode;
    public $browser;
    public $browserVersion;
    public $doCheckBrowser = false;
    public $modeResponse = 'template';
    private $tplBasePath;
    public $tplPath;
    public $tplIndex;
    public $websitePath = '';

    public function __construct(&$urlVars) {
        $this->pathWebApp = dirname(__FILE__) . '/';

        require_once('configuration/main.configuration.php');

        $this->urlVars = $urlVars;
        if (isset($urlVars['component']))
            $this->component = $urlVars['component'];
        if (isset($urlVars['action']))
            $this->action = $urlVars['action'];
        if ($this->doCheckBrowser)
            $this->checkBrowser();
        if (class_exists('GUser')) {
            $this->checkUser();
        }
    }

    public function __set($name, $value) {
        $this->contentData[$name] = $value;
    }

    public function setJsCode($value) {
        $this->jsCode = $value;
    }

    public function addJsCode($value) {
        $this->jsCode.=$value;
    }

    public function addJsFile($filename) {
        $this->jsFiles[$filename] = '1';
    }

    public function addCssCode($value) {
        $this->cssCode.=$value;
    }

    public function addCssFile($filename) {
        $this->cssFiles[$filename] = '1';
    }

    public function addContentTop($value) {
        $this->contentData['ctTop'].=$value;
    }

    public function setContentTop($value) {
        $this->contentData['ctTop'] = $value;
    }

    public function addMainMenu($value) {
        $this->contentData['ctMainMenu'].=$value;
    }

    public function setMainMenu($value) {
        $this->contentData['ctMainMenu'] = $value;
    }

    public function addContentBottom($value) {
        $this->contentData['ctBottom'].=$value;
    }

    public function setContentBottom($value) {
        $this->contentData['ctBottom'] = $value;
    }

    public function setContentBody($value) {
        $this->contentData['ctBody'] = $value;
    }

    public function addContentBody($value) {
        $this->ctBody.=$value;
    }

    public function setLogged($value) {
        $this->logged = $value;
    }

    public function addHeader($value) {
        $this->head .= $value;
    }

    public function addMenuItem($key, $lib, $link) {
        $this->arMainMenu[$key] = array();
        $this->arMainMenu[$key]['lib'] = $lib;
        $this->arMainMenu[$key]['link'] = $link;
    }

    public function __get($name) {
        if (array_key_exists($name, $this->contentData)) {
            return $this->contentData[$name];
        }
        return null;
    }

    function getJsCode() {
        return '<script type="text/javascript">' . $this->jsCode . '</script>';
    }

    function getCssCode() {
        return '<style type="text/css">' . $this->cssCode . '</style>';
    }

    function getLogged() {
        return $this->logged;
    }

    function getDbPdo() {
        return $this->dbPdo;
    }

    function getTplPath() {
        return $this->tplBasePath . $this->tplPath;
    }

    function getGlobalComponentsPath() {

        return $this->pathWebApp . $this->globalDirComponents;
    }

    function getLibViewPath() {

        return $this->pathWebApp . $this->pathView;
    }

    function getLibModelPath() {

        return $this->pathWebApp . $this->pathModel;
    }

    function getHead() {
        return $this->head;
    }

    function getContentTop() {
        return $this->ctTop;
    }

    function getContentBody() {
        return $this->ctBody;
    }

    function getMainMenu() {
        return $this->ctMainMenu;
    }

    function getContentBottom() {
        return $this->ctBottom;
    }

    function getIncludeContents($view, $filename) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }

    private function checkUser() {
        if (isset($_SESSION['usrId']))
            $id = $_SESSION['usrId'];
        else
            $id= - 1;

        if (@include_once('userclass.php')) {
            
        } else {
            if (!@include_once('guserclass.php'))
                $this->doDie('Main user class not Found.');
        }
        $user = new GUser($this->dbPdo);

        if ($id > -1) {
            $user->loadUserWithId($id);
            $this->setLogged(true);
        } else {

            $user->loadVisitorData();
        }
        $this->user = $user;
    }

    public function execute() {

        $ctrlName = 'C' . strtoupper(substr($this->component, 0, 1)) . substr($this->component, 1);

        if (file_exists($this->localDirComponents . '/' . $this->component . '/c_' . $this->component . '.php')) {
            include_once($this->localDirComponents . '/' . $this->component . '/c_' . $this->component . '.php');
        } else if (file_exists($this->getGlobalComponentsPath() . '/' . $this->component . '/c_' . $this->component . '.php')) {
            include_once($this->getGlobalComponentsPath() . '/' . $this->component . '/c_' . $this->component . '.php');
        } else {
            if (isset($this->defaultComponent) && $this->defaultComponent != '') {
                $this->component = $this->defaultComponent;
                $this->action = $this->defaultAction;

                if (isset($this->component)) {
                    include_once($this->localDirComponents . '/' . $this->component . '/c_' . $this->component . '.php');
                    $ctrlName = 'C' . strtoupper(substr($this->component, 0, 1)) . substr($this->component, 1);
                }
            }
        }

        if (class_exists($ctrlName)) {
            $this->controller = new $ctrlName($this);
            if (method_exists($this->controller, $this->action)) {
                $methodeName = $this->action;
                $this->controller->$methodeName();
            } else if (method_exists($this->controller, 'defaultAction')) {
                $this->controller->defaultAction();
            }
        } else {
            $this->doDie('WrongWay');
        }
        $this->loadMainMenu();
        $this->loadComponentMenu();
        $this->loadActionMenu();
    }

    private function loadMainMenu() {
        $filename = $this->pathMenu . 'main.menu.php';
        if (file_exists($filename))
            include_once($filename);
    }

    private function loadComponentMenu() {
        $filename = $this->pathMenu . $this->component . '.menu.php';
        if (file_exists($filename))
            include_once($filename);
    }

    private function loadActionMenu() {
        $filename = $this->pathMenu . $this->component . '_' . $this->action . '.menu.php';
        if (file_exists($filename))
            include_once($filename);
    }

    private function doDie($message) {
        if (!$this->debug)
            Die($message);
    }

    public function loadTemplate() {

        switch ($this->modeResponse) {
            case 'template':
                $cTplJsFile = $this->getTplPath() . 'js/' . $this->component . '.js';
                $aTplJsFile = $this->getTplPath() . 'js/' . $this->component . '_' . $this->action . '.js';
                if (file_exists($cTplJsFile)) {
                    $this->jsCode.=file_get_contents($cTplJsFile);
                }
                if (file_exists($aTplJsFile)) {
                    $this->jsCode.=file_get_contents($aTplJsFile);
                }
                $cSiteJsFile = 'js/' . $this->component . '.js';
                $aSiteJsFile = 'js/' . $this->component . '_' . $this->action . '.js';
                if (file_exists($cSiteJsFile)) {
                    $this->head .= '<script type="text/javascript" src="' . $cSiteJsFile . '"></script>';
                }
                if (file_exists($aSiteJsFile)) {
                    $this->head .= '<script type="text/javascript" src="' . $aSiteJsFile . '"></script>';
                }

                $cTplCssFile = $this->getTplPath() . 'css/' . $this->component . '.css';
                $aTplCssFile = $this->getTplPath() . 'css/' . $this->component . '_' . $this->action . '.css';
                if (file_exists($cTplCssFile)) {
                    $this->cssCode.=file_get_contents($cTplCssFile);
                }
                if (file_exists($aTplCssFile)) {
                    $this->cssCode.=file_get_contents($aTplCssFile);
                }

                $cSiteCssFile = 'css/' . $this->component . '.css';
                $aSiteCssFile = 'css/' . $this->component . '_' . $this->action . '.css';
                if (file_exists($cSiteCssFile)) {
                    $this->cssCode.=file_get_contents($cSiteCssFile);
                }
                if (file_exists($aSiteCssFile)) {
                    $this->cssCode.=file_get_contents($aSiteCssFile);
                }

                if (count($this->jsFiles) > 0) {

                    foreach ($this->jsFiles as $key => $value) {
                        $this->head .= '<script type="text/javascript" src="' . $key . '"></script>';
                    }
                }

                if (count($this->cssFiles) > 0) {

                    foreach ($this->cssFiles as $key => $value) {
                        if(trim($key) != '')
                            $this->head .= '<LINK rel="stylesheet" type="text/css" href="' . $key . '">';
                    }
                }

                if(trim($this->cssCode) != '')
                    $this->head .= '<style type="text/css">' . $this->cssCode . '</style>';
                
                $templateFile = $this->getTplPath() . $this->tplIndex;
                if (file_exists($templateFile)) {
                    include($templateFile);
                } else {
                    $this->doDie('No template');
                }
                break;

            case 'rest':
                header("Content-Type:text/xml");
                echo $this->pContentBody;

                break;
            case 'onlybody':
                echo $this->pContentBody;
                break;
        }
    }

    public function loadConf($filename) {
        if (file_exists($filename))
            include_once($filename);
    }

    private function checkBrowser() {
        include_once('Browser.php');
        $browser = new Browser();
        $this->browser = $browser->getBrowser();
        $this->browserVersion = $browser->getVersion();
    }

}

?>
