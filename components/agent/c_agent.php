<?php

class CAgent extends CBase {

    public function __construct($appli) {
        parent::__construct($appli);
    }

    public function actif(){
	$this->view->recherche();
	$proprietaire=$this->model->getlistPro();
	$dogsName=$this->model->getListNameDogs();
	$dogs=$this->model->dogs();
	$race=$this->model->getListDogs();
	//$verification=$this->model->getListVerification();
	$this->view->listDogsPro($proprietaire,$race,$dogs);
}


}
?>