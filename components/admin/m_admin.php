<?php

class MAdmin extends MBase {

	private $checkDbPDO = false;
	private  $pdo;

	public function __construct($appli) {
		parent::__construct($appli);
	}
	//La listes des différents models pour le projet,les requêtes se font dans la class dogs.class.php
	public function getListDogs(){
		include_once('./class/dogs.class.php');
		$race=new Dogs($this->appli->dbPdo);
		return $race->getListDogs();
	}

	public function veterinaire(){
		include_once('./class/dogs.class.php');
		$veterinaire=new Dogs($this->appli->dbPdo);
		return $veterinaire->veterinaire();
	}

	public function club(){
		include_once('./class/dogs.class.php');
		$club=new Dogs($this->appli->dbPdo);
		return $club->club();
	}



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

	public function Dogs(){
		include_once('./class/dogs.class.php');
		$dogs=new Dogs($this->appli->dbPdo);
		return $dogs->Dogs();
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

	public function pdc(){
		include_once('./class/dogs.class.php');
		$pdc=new Dogs($this->appli->dbPdo);
	}

	public function listPdc(){
		include_once('./class/dogs.class.php');
		$listPdc=new Dogs($this->appli->dbPdo);
		//return $listPdc->listPdc();
	}



	public function ajoutDogs(){
		include_once('./class/dogs.class.php');
		$ajoutDogs=new Dogs($this->appli->dbPdo);
	}

	public function addNewDogsBis(){
		include_once('./class/dogs.class.php');
		$newDogsBis=new Dogs($this->appli->dbPdo);
	}

	public function addNewDogsList(){
		include_once('./class/dogs.class.php');
		$newDogsList=new Dogs($this->appli->dbPdo);
	}

	public function modifProprio(){
		include_once('./class/dogs.class.php');
		$modifProprio=new Dogs($this->appli->dbPdo);
	}
	
	public function deleteProprio(){
		include_once('./class/dogs.class.php');
		$deleteProprio=new Dogs($this->appli->dbPdo);
	}
	
	public function dogsProprio(){
		include_once('./class/dogs.class.php');
		$dogsProprio=new Dogs($this->appli->dbPdo);
		//return $dogsProprio->dogsProprio();
	}
	public function deleteRace(){
		include_once('./class/dogs.class.php');
		$deleteRace=new Dogs($this->appli->dbPdo);
	}

	

}
?>
