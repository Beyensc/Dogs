<?php

class VAgent extends VBase {

    function __construct($appli, $model) {
        parent::__construct($appli, $model);
    }


         public function recherche(){

          $html='';
           $html.=' <div id="formRecherche">
           <input type="text" class="form-control" placeholder="Recherche" require autofocus></br>
           <input type ="submit" class="btn btn-info" value ="Recherche" style="width:200px" onclick="recherche()">
           </div>';
          $this->appli->content=$html;
        }

     function listDogsPro($proprietaire,$race,$dogs,$verification){


        $html='';

      

        $html.='<div id="form"><table class="table" id="formListDogs"><ul class="list-group">';
    
 
         foreach ($proprietaire as $key => $row) {

          $html.=' <div id="form"><table class="table" id="formListDogs"><ul class="list-group">

                  <tr><td><li class="list-group-item"> '.ucfirst($row['nom']).'&nbsp'.ucfirst($row['prenom']).'</li></td>

            

                 <td> <input id="button" class="btn btn-info" type="button" value="Détails" id="details" onclick="details('.$row['id_proprietaire'].');"></td>

                 </table></div>


                   


                  <table class="table"  id="details'.$row['id_proprietaire'].'" style="display:none;" >
                  <tr><td><h1><u>Maître</u></h1></td></tr>
                  <tr><td id="id_proprietaire"'.$row['id_proprietaire'].'">Enregistrer le '.$row['datesave'].'</td></tr>
                  <tr><td id="id_proprietaire"'.$row['id_proprietaire'].'">Nom<input class="form-control"  type="text" placeholder="Nom du maître" name="nomMaster" id="nomMaster'.$row['id_proprietaire'].'" value="'.ucfirst($row['nom']).'">
                   </td>
                   
                   <td id="id_proprietaire"'.$row['id_proprietaire'].'">Prénom<input class="form-control"  type="text" placeholder="Prénom du maître" name="prenomMaster" id="prenomMaster'.$row['id_proprietaire'].'" value="'.ucfirst($row['prenom']).'"></tr>

                   <tr><td id="id_proprietaire"'.$row['id_proprietaire'].'">Date de naissance<input class="form-control"  type="text" placeholder="Date de naissance" name="dateNaissance" id="dateNaissance'.$row['id_proprietaire'].'" value="'.$row['date_naissance'].'"></td>

                   <td id="id_proprietaire"'.$row['id_proprietaire'].'">Lieu de naissance<input class="form-control"  type="text" placeholder="Lieu de naissance" name="lieuNaissance" id="lieuNaissance'.$row['id_proprietaire'].'" value="'.ucfirst($row['lieu_naissance']).'"></td>
                   </tr>
                   </td></tr></div>
                    <tr>
                    <td id="id_proprietaire"'.$row['id_proprietaire'].'">Rue<input class="form-control" type="text"placeholder="Rue" name="rueMaster" id="rueMaster'.$row['id_proprietaire'].'" value="'.ucfirst($row['rue']).'"></td>
                    <td id="id_proprietaire"'.$row['id_proprietaire'].'">N°<input class="form-control" type="text" placeholder="Numéro" name="numMaster" id="numMaster'.$row['id_proprietaire'].'" value="'.$row['numero'].'"></td>
                   <td id="id_proprietaire"'.$row['id_proprietaire'].'">Code postal<input class="form-control" type="text" placeholder="Code postal" name="cpMaster" id="cpMaster'.$row['id_proprietaire'].'" value="'.$row['CP'].'"></td></tr>
                   <tr><td>Ville<input class="form-control" type="text" placeholder="Ville" name="villeMaster" id="villeMaster'.$row['id_proprietaire'].'" value="'.ucfirst($row['ville']).'"></td>
                   <td id="id_proprietaire"'.$row['id_proprietaire'].'">Pays<input class="form-control" type="text" placeholder="Pays" name="paysMaster" id="paysMaster'.$row['id_proprietaire'].'" value="'.ucfirst($row['pays']).'"></td>
                   </tr>
                   <tr>
                   <td id="id_proprietaire"'.$row['id_proprietaire'].'">Mail<input class="form-control" type="mail" placeholder="Mail" name="mailMaster" id="mailMaster'.$row['id_proprietaire'].'" value="'.$row['mail'].'"></td>
                   <td id="id_proprietaire"'.$row['id_proprietaire'].'">Téléphone<input class="form-control" type="text" placeholder="Téléphone" name="telMaster" id="telMaster'.$row['id_proprietaire'].'" value="'.$row['telephone'].'"></td>
                   <td id="id_proprietaire"'.$row['id_proprietaire'].'">GSM<input class="form-control" type="text" placeholder="GSM" name="gsmMaster" id="gsmMaster'.$row['id_proprietaire'].'" value="'.$row['gsm'].'"></td>
                   </tr>

                   <tr><td id="id_proprietaire"'.$row['id_proprietaire'].'">Période contactable<input class="form-control" type="text" placeholder="Période contactable" name="periodeContact" id="periodeContact'.$row['id_proprietaire'].'" value="'.$row['periode_dispo'].'"></td>

                   <td id="id_proprietaire"'.$row['id_proprietaire'].'"> Autre période contactable<input class="form-control" type="text" placeholder=" Autre période contactable" name="autreDispo" id="autreDispo'.$row['id_proprietaire'].'" value="'.$row['autre_dispo'].'"></td></tr>
                   <tr><td><h1><u>Personne de contact</u></h1></td></tr>
                   <tr> <td id="id_proprietaire"'.$row['id_proprietaire'].'"> Nom<input class="form-control" type="text" placeholder=" Nom" name="nomContact" id="nomContact'.$row['id_proprietaire'].'" value="'.$row['nom_contact'].'"></td>
                   <td id="id_proprietaire"'.$row['id_proprietaire'].'"> Prénom<input class="form-control" type="text" placeholder=" Prénom" name="prenomContact" id="prenomContact'.$row['id_proprietaire'].'" value="'.$row['prenom_contact'].'"></td>
                   <td id="id_proprietaire"'.$row['id_proprietaire'].'"> Téléphone<input class="form-control" type="text" placeholder=" Téléphone" name="telContact" id="telContact'.$row['id_proprietaire'].'" value="'.$row['num_contact'].'"></td></tr>

                   <tr>
                  <td><input class="btn btn-primary" type="button" value="voir" id="dogsProprio" onclick="dogsProprioform('.$row['id_proprietaire'].'),dogsProprio('.$row['id_proprietaire'].')"></td></tr></table>';

                       $html.='<div id="listDogs'.$row['id_proprietaire'].'"></div>';
                       

                   
             }

         
                 

                $this->appli->list=$html;

        }

 

    }
	

?>