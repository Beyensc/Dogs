<?php

class CAdmin extends CBase {


    public function __construct($appli) {
        parent::__construct($appli);
    }


public function ajout(){
	$race=$this->model->getListDogs();
	$verification=$this->model->getListVerification();
	$proprietaire=$this->model->getlistPro();
	$this->view->recherche();
    $this->view->AddNewDogs($race,$verification);
}

public function actif(){
	
	$this->view->recherche();
	$proprietaire=$this->model->getlistPro();
	$dogsName=$this->model->getListNameDogs();
	$dogs=$this->model->dogs();
	$modifProprio=$this->model->modifProprio();
	$race=$this->model->getListDogs();
	//$dogsProprio=$this->model->dogsProprio();
	$verification=$this->model->getListVerification();
	$this->view->listDogsPro($proprietaire,$race,$dogs,$verification);
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

public function majListVerification(){

	$verification=$this->model->getListVerification();
	$newListVerification=$this->model->addNewListVerification();
	$modifListVerification=$this->model->modifListVerification();
	$this->view->addNewListVerification($verification,$newListVerification,$modifListVerification);
}

public function pdf(){
	$this->view->pdf();
	
}





}
?>