<?php

class CConnexion extends CBase {

    public function __construct($appli) {
        parent::__construct($appli);
    }

public function connexion(){

	$connexion=$this->model->connexion();
	if($connexion == 1){
	header('Location: ?component=admin&action=actif ');
	}else if($connexion == 2){
		header('Location: ?component=agent&action=actif ');
	}
	
}

public function deconnexion()
      {
        $_SESSION['type']='';
        session_unset();

        session_destroy();

        header('Location:index.php');
      }
}
?>