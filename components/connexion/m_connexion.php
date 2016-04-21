<?php

class MConnexion extends MBase {

	private $checkDbPDO = false;

	public function __construct($appli) {
		parent::__construct($appli);
		
	}

	public function connexion(){
		include_once('./class/dogs.class.php');
		$connexion=new Dogs($this->appli->dbPdo);
		return $connexion->connexion();
	}

	

}
?>
