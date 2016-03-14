<?php

class VDogs extends VBase {

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

    public function listDogsPro($proprietaire/*,$race*/){

        $html='';

        $html.='<div id="form"><table class="table">';
      
        foreach ($proprietaire as $key => $row) {

          $html.=' <div class="info">
                  <tr><td>Nom : '.$row['nom'].'</br> Prénom : '.$row['prenom'].' </br> Adresse : rue '.$row['rue'].'&nbsp'.$row['numero'].'&nbsp'.$row['CP'].'&nbsp'.$row['ville']./*'</br>Race du chien : '.$row['race'].'</br> Numéro de la puce : '.$row['num_puce'].*/'</br></br>
                  <input class="btn btn-danger" type="button" value="supprimer" id="delete" onclick="desactProprio(\''.$row['id_proprietaire'].'\',\''.$row['nom'].'\')"> <input class="btn btn-info" type="button" value="Détails" id="details" onclick="details('.$row['id_proprietaire'].');"</td></tr></div>

                  <table class="table"  id="details'.$row['id_proprietaire'].'" style="display:none;" >
                  <tr><td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control"  type="text" placeholder="Nom du maître" name="nomMaster" id="nomMaster'.$row['id_proprietaire'].'" value="'.ucfirst($row['nom']).'">
                   </td>
                   <td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control"  type="text" placeholder="Prénom du maître" name="prenomMaster" id="prenomMaster'.$row['id_proprietaire'].'" value="'.ucfirst($row['prenom']).'">
                   </td></tr></div>
                    <tr>
                    <td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control" type="text"placeholder="Rue" name="rueMaster" id="rueMaster'.$row['id_proprietaire'].'" value="'.ucfirst($row['rue']).'"></td>
                    <td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control" type="text" placeholder="Numéro" name="numMaster" id="numMaster'.$row['id_proprietaire'].'" value="'.$row['numero'].'"></td>
                   <td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control" type="text" placeholder="Code postal" name="cpMaster" id="cpMaster'.$row['id_proprietaire'].'" value="'.$row['CP'].'"></td></tr>
                   <tr><td><input class="form-control" type="text" placeholder="Ville" name="villeMaster" id="villeMaster'.$row['id_proprietaire'].'" value="'.ucfirst($row['ville']).'"></td>
                   <td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control" type="text" placeholder="Pays" name="paysMaster" id="paysMaster'.$row['id_proprietaire'].'" value="'.ucfirst($row['pays']).'"></td>
                   </tr>
                   <tr>
                   <td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control" type="mail" placeholder="Mail" name="mailMaster" id="mailMaster'.$row['id_proprietaire'].'" value="'.$row['mail'].'"></td>
                   <td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control" type="text" placeholder="Téléphone" name="telMaster" id="telMaster'.$row['id_proprietaire'].'" value="'.$row['telephone'].'"></td>
                   <td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control" type="text" placeholder="GSM" name="gsmMaster" id="gsmMaster'.$row['id_proprietaire'].'" value="'.$row['gsm'].'"></td>
                   </tr>
                   <tr>';
                  /* <td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control" type="text" placeholder="Nom du chien" name="nomDogs" id="nomDogs'.$row['id_proprietaire'].'" value="'.ucfirst($row['nom_chien']).'"></td>
                   <td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control" type="text" placeholder="N° puce" name="numPuceDogs" id="numPuceDogs'.$row['id_proprietaire'].'" value="'.$row['num_puce'].'"></td>
                      <tr><td>Race du chien: </td><td><select class="form-control" name="raceDogs" id="raceDogs'.$row['id_proprietaire'].'">';
                      
                        foreach ($race as $key => $rowa) {

                         $html.='<option value="'.$rowa['id_race'].'"';

                         if($rowa['id_race']==$row['race_chien']){
                                      
                                     $html.='selected';
                            }
                            $html.='>'.$rowa['race'].'</option>';

                            }
                          
                   $html.='</select></tr>';*/
               
                  $html.='<td><input class="btn btn-primary" type="button" value="modifier" id="modif" onclick="modifFild(\''.$row['id_proprietaire'].'\',\''.$row['nom'].'\')"></td></tr></table>';
         
        }

        $html.='</table></div>';

        $this->appli->list=$html;
    }

    public function listDogsProInactif($proprietaireIncatif){

        $html='';
        $html.='<div id="form"><table class="table">';
        $html.='<table class="table" id="formList">';
        foreach ($proprietaireIncatif as $key => $row) {

          $html.=' <div class="info">
          <tr><td>Nom : '.$row['nom'].'</br> Prénom : '.$row['prenom'].' </br> Adresse : rue '.$row['rue'].'&nbsp'.$row['numero'].'&nbsp'.$row['CP'].'&nbsp'.$row['ville'].'</br>Race du chien : </br> Numéro de la puce : </br></br>
                   <input class="btn btn-info" type="button" value="Détails" id="details" onclick="details('.$row['id_proprietaire'].');"></td></tr></div>

                  <table  class="table"  id="details'.$row['id_proprietaire'].'" style="display:none;" >

          <tr>
                 <td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control"type="text" placeholder="Nom du maître" name="nomMaster" id="nomMaster"  value="'.ucfirst($row['nom']).'"required autofocus></td>

               <td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control"  type="text" placeholder="Prénom du maître" name="prenomMaster" id="prenomMaster" value="'.ucfirst($row['prenom']).'"></td>
       </tr>
       <tr>
       <td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control" type="text"placeholder="Rue" name="rueMaster" id="rueMaster" value="'.ucfirst($row['rue']).'"></td>
       <td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control" type="text" placeholder="Numéro" name="numMaster" id="numMaster" value="'.$row['numero'].'"></td>
       <td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control" type="text" placeholder="Code postal" name="cpMaster" id="cpMaster" value="'.$row['CP'].'"></td></tr>
       <tr><td><input class="form-control" type="text" placeholder="Ville" name="villeMaster" id="villeMaster" value="'.ucfirst($row['ville']).'"></td>
       <td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control" type="text" placeholder="Pays" name="paysMaster" id="paysMaster" value="'.ucfirst($row['pays']).'"></td>
       </tr>
       <tr>
       <td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control" type="mail" placeholder="Mail" name="mailMaster" id="mailMaster" value="'.$row['mail'].'"></td>
       <td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control" type="text" placeholder="Téléphone" name="telMaster" id="telMaster" value="'.$row['telephone'].'"></td>
       <td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control" type="text" placeholder="GSM" name="gsmMaster" id="gsmMaster" value="'.$row['gsm'].'"></td>
       </tr>';
       /*<tr>
       <td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control" type="text" placeholder="Nom du chien" name="nomDogs" id="nomDogs" value="'.ucfirst($row['nom_chien']).'"></td>
       <td id="id_proprietaire"'.$row['id_proprietaire'].'"><input class="form-control" type="text" placeholder="N° puce" name="numPuceDogs" id="numPuceDogs" value="'.$row['num_puce'].'"></td>
       <td> <input class="form-control" type="text" placeholder="race du chien (dangereux)" name="raceDogs" id="raceDogs" value="'.$row['race'].'"</td></tr>*/

       $html.='<tr><td><input class="btn btn-success" type="button" value="Activer" id="delete" onclick="activProprio(\''.$row['id_proprietaire'].'\',\''.$row['nom'].'\')"></td>
        <td><input class="btn btn-danger" type="button" value="Supprimer" id="delete" onclick="deleteProprio(\''.$row['id_proprietaire'].'\',\''.$row['nom'].'\')"></td>

       </tr></table> ';

        }
        

        $html.='</table></div>';

        $this->appli->list=$html;
    }

    public function AddNewDogs($race,$verification){
    	$html='';
    	$html.='
       <table class="table" id="formAjout">
       
       <tr>
       <td><input class="form-control"type="text" placeholder="Nom du maître" name="nomMaster" id="nomMaster" required autofocus></td>
       <td><input class="form-control"  type="text" placeholder="Prénom du maître" name="prenomMaster" id="prenomMaster"></td>
       </tr>
       <tr>
       <td><input class="form-control" type="text"placeholder="Rue" name="rueMaster" id="rueMaster"></td>
       <td><input class="form-control" type="text" placeholder="Numéro" name="numMaster" id="numMaster"></td>
       <td><input class="form-control" type="text" placeholder="Code postal" name="cpMaster" id="cpMaster"></td></tr>
       <tr><td><input class="form-control" type="text" placeholder="Ville" name="villeMaster" id="villeMaster"></td>
       <td><input class="form-control" type="text" placeholder="Pays" name="paysMaster" id="paysMaster"></td>
       </tr>
       <tr>
       <td><input class="form-control" type="mail" placeholder="Mail" name="mailMaster" id="mailMaster"></td>
       <td><input class="form-control" type="text" placeholder="Téléphone" name="telMaster" id="telMaster"></td>
       <td><input class="form-control" type="text" placeholder="GSM" name="gsmMaster" id="gsmMaster"></td>
       </tr>
       <tr>
       <td><input class="form-control" type="text" placeholder="Nom du chien" name="nomDogs" id="nomDogs"></td>
       <td><input class="form-control" type="text" placeholder="N° puce" name="numPuceDogs" id="numPuceDogs"></td></tr>
       <tr><td>Race du chien (dangereux): </td><td><select class="form-control" name="raceDogs" id="raceDogs">
       <option value="" selected></option>';
   
      foreach ($race as $key => $rowa) {

             $html.=' <option value='.$rowa['id_race'].'>'.$rowa['race'].'</option>';
        
     }
      $html.='</select></tr>
      <tr><td>vérifications</td></tr>';
      $i=0;
      foreach ($verification as $key => $vow) {
        
      $html.='<tr id="details'.$vow['id_verification'].'" ><td><input type="checkbox" name="verification"id="verification" value='.$vow['id_verification'].$i.'>&nbsp'.ucfirst($vow['verification']).'';
            $i++;
          }
      $html.='<tr><td><input class="btn btn-warning" type="button" value="Enregistrer" id="bAddDogs" onclick="addNewDogs();"></td></tr>
      </table>';

    	$this->appli->news=$html;
    }

    public function addNewDogsList($newDogsList,$race){

      $html='';
      $html.='<table class="table" id="formListDogs"><ul class="list-group">';

      $i=1;
      foreach ($race as $key => $row) {

        $html.='<tr><td><li class="list-group-item"'.$row['id_race'].'>' .$i.' '.$row['race'].'</li>

        <td><input class="btn btn-danger" type="button" value="Supprimer" id="deleteRace" onclick="deleteRace(\''.$row['id_race'].'\',\''.$row['race'].'\')"></td></td></tr>';
        $i++;
      }
      $html.='</ul></table>';

      $html.='<table class="table" id="formList">
      <tr><td>Mise a jour de la liste <input class="form-control" type="text" name="listDogs" id="listDogs" require autofocus></td></tr>
              <tr><td><input class="btn btn-warning" type="button" name="bListDogs" id="bListdogs" value="ajouter" onclick="addNewDogsList()"></td></tr></table>';

       $this->appli->list=$html;       
    } 

    public function addNewListVerification($verification,$newListVerification){

      $html='';
      $html.='<table class="table" id="formListDogs"><ul class="list-group">';

      
      foreach ($verification as $key => $vow) {
        
      
      $html.='<tr><td><li class="list-group-item"'.$vow['id_verification'].'> '.ucfirst($vow['verification']).'</li>

        <td><input class="btn btn-danger" type="button" value="Supprimer" id="deleteRace" onclick="deleteVerification(\''.$vow['id_verification'].'\',\''.$vow['verification'].'\')"></td></td></tr>';

          }
      $html.='</table>';

      $html.='<table class="table" id="formList">
      <tr><td>Mise a jour de la liste des vérifications <input class="form-control" type="text" name="listVerification" id="listVerification" require autofocus></td></tr>
              <tr><td><input class="btn btn-warning" type="button" name="bListVerification" id="bListVerification" value="ajouter" onclick="addNewListVerification()"></td></tr></table>';

       $this->appli->list=$html;       
    }  

    public function connexion(){
      $html='';
      $html.='


                    
                    
            <form action="/users/login" name="login" role="form" class="form-horizontal" method="post" accept-charset="utf-8">
                <div class="form-group">
                <div class="col-md-8"><input name="login" placeholder="Login" class="form-control" type="text" id="login"/></div>
                </div> 
                
                <div class="form-group">
                <div class="col-md-8"><input name="mdp" placeholder="Mot de passe" class="form-control" type="password" id="mdp"/></div>
                </div> 
                
                <div class="form-group">
                <div class="col-md-offset-0 col-md-8"><input  class="btn btn-success btn btn-success" type="submit" value="Connexion" onclick="connexion"/></div>
                </div>
            
            </form>
 ';


       $this->appli->list=$html;
    }

}
?>