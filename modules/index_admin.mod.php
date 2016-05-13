<?php

if((isset($_SESSION['type'])) && ($_SESSION['type'] == 1)){

		$html='
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="?component=admin&action=actif">Police</a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li><a href="?component=admin&action=ajout">Ajouter</a></li> 
		      <li><a href="?component=admin&action=actif">actif</a></li>
		      <li><a href="?component=admin&action=inactif">Inactif</a></li>
		      <li><a href="?component=admin&action=majListDogs" > MAJ Liste des chiens</a></li>
		      <li><a href="?component=admin&action=majListVerification" > MAJ Liste des vérifications</a></li>
		      <li><a href="?component=connexion&action=deconnexion"><img src="img/broken-link.png" title="Déconnexion"></a></li>
		    </ul>
		  </div>
		</nav> ';
}
else if((isset($_SESSION['type'])) && ($_SESSION['type'] == 2))
{

		$html=' 
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="?component=agent&action=actif">Police</a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li><a href="?component=connexion&action=deconnexion" ><img src="img/broken-link.png" title="Déconnexion"></a></li>
		    </ul>
		  </div>
		</nav>';
}
else
{
	 $html=' 
	 <link href="templates/dogs/css/connexion.css" rel="stylesheet">
	 <div class="container">
<div class="row">
<div class="col-xs-12">
    
    <div class="main">
            
        <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-1">
                    
            
                    
            <form class="form-horizontal" method="POST" action="?component=connexion&action=connexion" accept-charset="utf-8">
                <div class="form-group">
                <div class="col-md-8">
                <input name="login" placeholder="Login" class="form-control" type="text" id="login" required/>
                </div>
                </div> 
                
                <div class="form-group">
                <div class="col-md-8">
                <input name="mdp" placeholder="Mot de passe" class="form-control" type="password" id="mdp" required/>
                </div>
                </div> 
                
                <div class="form-group">
                <div class="col-md-offset-0 col-md-8">
                <input  class="btn btn-success btn btn-success" type="submit" name="bconnexion" value="Connexion"/></div>
                </div>
            
            </form>
            
        </div>
        </div>
        
    </div>
</div>
</div>
</div>

       		


		        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
		        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:400,700,300" />
            ';
}	


$this->index = $html;

?>