<?php

class CExemple extends CBase {

    public function __construct($appli) {
        parent::__construct($appli);
    }

public function homepage(){
	echo 'coucou';
    //Dans la mesure où on met en composant par defaut "exemple" et action par défaut "homepage", nous atterrirons dans cette méthode, laquelle affiche "bêtement" coucou.
    //RAPPEL STRUCTURE MVC : Le contrôleur est appelé en premier, il fait appel au modèle s'il a besoin de données ou s'il a besoin d'en implémenter en bdd.  Fonction de la méthode utilisée dans le modèle, celui-ci renverra ou non une réponse.  Toute action de l'utilisateur attendant une réponse, le contrôleur enverra des infos ou, au moins, fera appel à la vue afin d'afficher le résultat attendu par l'utilisateur.
    
    //BIEN FAIRE ATTENTION A RENOMMER LES CLASSES, qu'il s'agisse du contrôleur, du modèle ou de la vue (voir les ligne 3 du C du M et de la V)

    $this->view->test();
}
}
?>