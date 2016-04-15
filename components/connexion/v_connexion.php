<?php

class VConnexion extends VBase {

    function __construct($appli, $model) {
        parent::__construct($appli, $model);
    }

       public function connexion($connexion){
      $html='';


      $html.=' 
       			<form class="form-horizontal" method="POST" >
                <div class="form-group">
                <div class="col-md-8"><input name="login" placeholder="Login" class="form-control" type="text" id="login"/></div>
                </div> 
                
                <div class="form-group">
                <div class="col-md-8"><input name="mdp" placeholder="Mot de passe" class="form-control" type="password" id="mdp"/></div>
                </div> 
                
                <div class="form-group">
                <div class="col-md-offset-0 col-md-8"><input  class="btn btn-success btn btn-success" type="submit" name="bconnexion " value="Connexion"/></div>
                </div>
            
            </form>';

            if(isset($_POST['bconnexion'])){

	            foreach ($connexion as $key => $value) {

	            	if($_POST['login'] == $value['login'] && $_POST['mdp'] == $value['mdp']){

	            		echo "login et mpd OK";
	            	}else{

	            		echo "erreur";
	            	}
	            }
	         }   


       $this->appli->list=$html;
    }


    
	
}
?>