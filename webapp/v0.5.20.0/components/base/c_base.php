<?php

class CBase {

    public $contentTagName = '';

    function __construct($appli) {

        $this->appli = $appli;

        $componentName = strtolower(substr(get_class($this), 1));
        if($this->appli->websitePath != '')
            $requirePath = $this->appli->websitePath . '/components/' . $componentName . '/';
        else
            $requirePath = '';

        require_once($requirePath . 'm_' . $componentName . '.php');
        require_once($requirePath . 'v_' . $componentName . '.php');
        
        $modelName = 'M' . substr(get_class($this), 1);
        $viewName = 'V' . substr(get_class($this), 1);

        $this->model = new $modelName($appli);
        $this->view = new $viewName($appli, $this->model);

        $filename = strtolower(get_class($this)) . '.conf.php';
        if (file_exists('conf/' . $filename))
            require_once($filename);
    }

    function __destruct() {
        
    }

}

?>