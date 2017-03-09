<?php
//la barre de navigation pour les admin 
if((isset($_SESSION['type'])) && ($_SESSION['type'] == 1)){

		$html='

        <div id="wrapper">

        <!-- Navigation -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?component=admin&action=actif">Police</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
              
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> '.$_SESSION['prenom'].' <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        <li>
                            <a href="?component=connexion&action=deconnexion"><i class="fa fa-fw fa-power-off"></i>Déconnexion</a>
                        </li>
                        <li>
                            <a href="?component=admin&action=nouvelUtilisateur"><i class="fa fa-fw fa-power-off"></i>Nouvel utilisateur</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="?component=admin&action=actif"><i class="fa fa-fw fa-dashboard"></i> Accueil</a>
                    </li>
                    

                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#proprietaire"><i class="fa fa-fw fa-arrows-v"></i> Propriétaire <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="proprietaire" class="collapse">
                            <li>
                                <a href="?component=admin&action=ajout">Nouveau propriétaire</a>
                            </li>
                            <li>
                                <a href="?component=admin&action=actif">Actif</a>
                            </li>
                            <li>
                                <a href="?component=admin&action=inactif">Inactif</a>
                            </li>
                        </ul>
                    </li>

                       <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#chien"><i class="fa fa-fw fa-arrows-v"></i> Chien <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="chien" class="collapse">
                            <li>
                                <a href="?component=admin&action=listeCompleteChien">Liste complete des chiens</a>
                            </li>
                            <li>
                                <a href="?component=admin&action=actif">non-dangereux</a>
                            </li>
                            <li>
                                <a href="?component=admin&action=inactif">dangereux</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#maj"><i class="fa fa-fw fa-arrows-v"></i> Mise à jour <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="maj" class="collapse">
                            <li>
                                <a href="?component=admin&action=majListDogs">Liste des chiens dangereux</a>
                            </li>
                            
                        </ul>
                    </li>
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <!-- /#page-wrapper -->

    </div>


      ';
		
}
//la barre de navigation pour les agents
else if((isset($_SESSION['type'])) && ($_SESSION['type'] == 2))
{

            $html='<ul class="nav nav-tabs nav-border-color nav-success" id="myTab">
                    <li class="active"><a data-toggle="tab" href="?component=agent&action=actif">Accueil</a></li>
                    <li class="disabled"><a href="?component=connexion&action=deconnexion">Déconnexion</a></li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div id="menu1" class="tab-pane fade active in">
                        
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <p><br>Texte Messages</p>
                    </div>
                    <div id="dropdown1" class="tab-pane fade">
                        <p><br>Texte 1</p>
                    </div>
                    <div id="dropdown2" class="tab-pane fade">
                        <p><br>Texte 2</p>
                    </div>
                </div>';
		/*$html=' 
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="?component=agent&action=actif">Police</a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li><a href="?component=connexion&action=deconnexion" ><img src="img/broken-link.png" title="Déconnexion"></a></li>
		    </ul>
		  </div>
		</nav>';*/
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
                <input name="login" placeholder="Login" class="form-control" type="text" id="login" required autofocus/>
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

       		


		        
            ';
}	


$this->index = $html;

?>