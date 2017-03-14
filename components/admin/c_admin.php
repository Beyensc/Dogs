<?php

class CAdmin extends CBase {


    public function __construct($appli) {
        parent::__construct($appli);
    }

//La liste des différents contrôleur du projet qui appelle les models et les vues 
public function ajout(){
	$race=$this->model->getListDogs();
	$club=$this->model->club();
	$proprietaire=$this->model->getlistPro();
	$this->view->recherche();
    $this->view->AddNewDogs($race,$club);
}

public function actif(){
	
	$this->view->recherche();
	$proprietaire=$this->model->getlistPro();
	$dogsName=$this->model->getListNameDogs();
	$listPdc=$this->model->listPdc();
	$dogs=$this->model->dogs();
	$modifProprio=$this->model->modifProprio();
	$race=$this->model->getListDogs();
	$veterinaire=$this->model->veterinaire();
	$club=$this->model->club();
	$this->view->listDogsPro($proprietaire,$race,$dogs,$listPdc,$veterinaire,$club);
}

public function inactif(){
	$this->view->recherche();
	$proprietaireInactif=$this->model->getlistProInactif();
	$deleteProprio=$this->model->deleteProprio();
	$this->view->listDogsProInactif($proprietaireInactif);
}

public function majListDogs(){
	
	$newDogsList=$this->model->addNewDogsList();
	$race=$this->model->getListDogs();
	$deleteRace=$this->model->deleteRace();
	$this->view->addNewDogsList($newDogsList,$race);
}



public function pdf(){

	
	$race=$this->model->getListDogs();
	$dogs=$this->model->dogs();
	$dogsProprio=$this->model->dogsProprio();
	$proprietaire=$this->model->getlistPro();
	//$dogsName=$this->model->getListNameDogs();
	$this->view->pdf($race,$dogs,$dogsProprio,$proprietaire);
}

public function nouvelUtilisateur(){

	$this->view->nouvelUtilisateur();
}

public function listeCompleteChien(){

	$this->view->listeCompleteChien();
}





}
?>