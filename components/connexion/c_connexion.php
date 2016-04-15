<?php

class CConnexion extends CBase {

    public function __construct($appli) {
        parent::__construct($appli);
    }

public function connexion(){

	
	$connexion=$this->model->connexion();
	$this->view->connexion($connexion);
}
}
?>