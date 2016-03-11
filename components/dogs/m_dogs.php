<?php

class MDogs extends MBase {

	private $checkDbPDO = false;
	private  $pdo;

	public function __construct($appli) {
		parent::__construct($appli);
	}

	public function getListDogs(){
		include_once('./class/dogs.class.php');
		$race=new Dogs($this->appli->dbPdo);
		return $race->getListDogs();
	}

	public function getListVerification(){
		include_once('./class/dogs.class.php');
		$verification=new DOGS($this->appli->dbPdo);
		return $verification->getListVerification();
	}

	public function getListPro(){
		include_once('./class/dogs.class.php');
		$proprietaire=new Dogs($this->appli->dbPdo);
		return $proprietaire->getListpro();
	}

	public function getlistProInactif(){
		include_once('./class/dogs.class.php');
		$proprietaireInactif=new Dogs($this->appli->dbPdo);
		return $proprietaireInactif->getlistProInactif();
	}

	public function addNewDogs(){
		include_once('./class/dogs.class.php');
		$newDogs=new Dogs($this->appli->dbPdo);
	}

	public function addNewDogsList(){
		include_once('./class/dogs.class.php');
		$newDogsList=new Dogs($this->appli->dbPdo);
	}

	public function addNewListVerification(){
		include_once('./class/dogs.class.php');
		$newListVerification=new Dogs($this->appli->dbPdo);
	}

	public function modifProprio(){
		include_once('./class/dogs.class.php');
		$modifProprio=new Dogs($this->appli->dbPdo);
	}
	
	public function deleteProprio(){
		include_once('./class/dogs.class.php');
		$deleteProprio=new Dogs($this->appli->dbPdo);
	}
	public function deleteRace(){
		include_once('./class/dogs.class.php');
		$deleteRace=new Dogs($this->appli->dbPdo);
	}


}
?>
