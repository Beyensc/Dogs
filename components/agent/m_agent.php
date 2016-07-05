<?php

class MAgent extends MBase {

	private $checkDbPDO = false;

	public function __construct($appli) {
		parent::__construct($appli);
		
	}
	//La listes des différents models pour le projet,les requetes ce font dans la class dogs.class.php
	public function getListPro(){
		include_once('./class/dogs.class.php');
		$proprietaire=new Dogs($this->appli->dbPdo);
		return $proprietaire->getListpro();
	}

	public function getListNameDogs(){
		include_once('./class/dogs.class.php');
		$dogsName=new Dogs($this->appli->dbPdo);
		return $dogsName->getListNameDogs();
	}

	public function getListDogs(){
		include_once('./class/dogs.class.php');
		$race=new Dogs($this->appli->dbPdo);
		return $race->getListDogs();
	}
	public function Dogs(){
		include_once('./class/dogs.class.php');
		$dogs=new Dogs($this->appli->dbPdo);
		return $dogs->Dogs();
	}

	public function getListVerification(){
		include_once('./class/dogs.class.php');
		$verification=new Dogs($this->appli->dbPdo);
		return $verification->getListVerification();
	}

}
?>
