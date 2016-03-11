<?php

class CDogs extends CBase {


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
	$modifProprio=$this->model->modifProprio();
	$race=$this->model->getListDogs();
	$this->view->listDogsPro($proprietaire,$race);
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
	$this->view->addNewListVerification($verification,$newListVerification);
}

public function connexion(){

	$this->view->connexion();
	$connexion=$this->model->connexion();
}

}
?>