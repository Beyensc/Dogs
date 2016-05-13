<?php

class VAdmin extends VBase {

    function __construct($appli, $model) {
        parent::__construct($appli, $model);
    }

    public function recherche(){

      $html='';
       $html.=' <div id="formRecherche">
       
       <input type="text" class="form-control" placeholder="Recherche"  id="recherche"require autofocus></br>

       
       
       </div>';
      $this->appli->content=$html;
    }

    public function listDogsPro($proprietaire,$race,$dogs,$verification){


        $html='';
        $html2='';
        $html2.='<table class="table" id ="listpro" border=1>
                                ';

  

 foreach ($proprietaire as $key => $pow) {


                $html2.=' 
                                <tr>
                                  <td>'.ucfirst($pow['nom']).'</td>
                                  <td>'.ucfirst($pow['prenom']).'</td>
                                  <td>'.ucfirst($pow['numero']).'&nbsp rue &nbsp'.ucfirst($pow['rue']).'&nbsp'.ucfirst($pow['CP']).'&nbsp'.ucfirst($pow['ville']).'</td>
                                  <td> <img src="img/business.png" id="button"   id="details" onclick="details('.$pow['id_proprietaire'].');"></td>
                                  <td><img src="img/dog.png" id="ajoutDogs" a title="Ajouter un nouveau chien." onclick="ajoutDogsForm('.$pow['id_proprietaire'].');"></td>
                                  <td><img src="img/can.png" id="delete" onclick="desactProprio(\''.$pow['id_proprietaire'].'\',\''.$pow['nom'].'\')"></td>
                                  <td><img src="img/pdf.png"></td>
                                </tr>
                              
                            ';
                          }

                          $html2.='  
                              </table>';
    
 
         foreach ($proprietaire as $key => $row) {


                $html.=' 
                            
                             
                    


                   


                <div id="formdogs">
                  <table class="table" id="ajoutDogsForm'.$row['id_proprietaire'].'" style="display:none;">
                        <tr><td><h1><u>Chien</u></h1></td></tr>
                       <tr>
                         <td>Nom du chien  <input class="form-control" type="text" placeholder="Nom du chien" name="nomDogs" id="nomDogs'.$row['id_proprietaire'].'"></td>
                         <td>Dog id <input class="form-control" type="text" placeholder="xxx-xxx-xxxx" name="numPuceDogs" id="numPuceDogs'.$row['id_proprietaire'].'"></td>
                         <td>Date de naissance <input class="form-control" type="date" placeholder="Date de naissance" name="dateNaissance" id="dateNaissance'.$row['id_proprietaire'].'"></td>
                       </tr>
                       <tr>
                         <td>Puce <input class="form-control" type="text" placeholder="Puce" name="puceDogs" id="puceDogs'.$row['id_proprietaire'].'"></td>
                         <td>Tatouage <input class="form-control" type="text" placeholder="Tatouage" name="tatooDogs" id="tatooDogs'.$row['id_proprietaire'].'"></td>
                         <td>Sexe 
                           <select class="form-control" name="sexe_dogs" id="sexe_dogs'.$row['id_proprietaire'].'">
                             <option value=""></option>
                             <option value="mâle">Mâle</option>
                             <option value="femelle">Femelle</option>
                           </select>
                          </td>
                       </tr>
                       <tr>
                         <td>Race du chien (dangereux): </td>
                         <td>
                           <select class="form-control" name="raceDogs" id="raceDogs'.$row['id_proprietaire'].'">
                           <option value=""selected></option>';

                                       foreach ($race as $key => $rowa) {

                                             $html.=' <option  value='.$rowa['id_race'].' >'.$rowa['race'].'</option>';
                
                                       }
                              $html.='</select>
                          </td>  
                        </tr>

                        <tr><td><h1><u>Divers</u></h1></td></tr>
                        <tr>
                          <td>Lieu de détention du chien(si autre que celui de l adresse du propriétaire)<input class="form-control" type="text" placeholder="Lieu de détention" name="detention" id="detention'.$row['id_proprietaire'].'"></td>
                        </tr>    
                        <tr>
                          <td>Club de dressage<input class="form-control" type="text" placeholder="Nom du club" name="club" id="club'.$row['id_proprietaire'].'"></td>
                          <td>Adresse du club<input class="form-control" type="text" placeholder="Adresse du club" name="clubAdresse" id="clubAdresse'.$row['id_proprietaire'].'"></td>
                          <td>Dressage mordant 
                            <select class="form-control" name="mordant" id="mordant'.$row['id_proprietaire'].'">
                              <option value=""></option>
                              <option value="oui">oui</option>
                              <option value="non">non</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td>Vétérinaire<input class="form-control" type="text" placeholder="Vétérinaire" name="veto" id="veto'.$row['id_proprietaire'].'"></td>
                          <td>Téléphone du vétérinaire<input class="form-control" type="text" placeholder="Téléphone" name="vetoTel" id="vetoTel'.$row['id_proprietaire'].'"></td>
                        </tr>
                                 

                        <tr><td><h1><u>Remarque(s)</u></h1></td></tr>
                        <tr>
                          <td>
                            <textarea class="form-control" id="remarques'.$row['id_proprietaire'].'">
                            </textarea>
                          </td>
                        </tr>';

                                 /* foreach ($verification as $key => $vow) {

                                         $html.=' <tr><td><input class="form-control"type="text"id="verif'.$vow['id_verification'].'" value="'.ucfirst($vow['verification']).'"></td>
                                        <td> <select class="form-control" id="verif'.$row['id_proprietaire'].'">
                                        <option value=""></option>
                                         <option value="ok">OK</option>
                                         <option value="defaut">Defaut</option>
                                         <select></td></tr>';
            
                                   }*/
                          

                        $html.='<tr><td><input class="btn btn-primary" type="button" value="Ajouter" id="ajoutDogs" onclick="ajoutDogs('.$row['id_proprietaire'].'),ajoutVerifPro('.$row['id_proprietaire'].')"></td></tr>';

                        $html.='</table></div>

                      <div id="maitre">
                      <table class="table"  id="details'.$row['id_proprietaire'].'" style="display:none;" >

                          <tr><td><h1><u>Maître</u></h1></td></tr>
                          <tr>
                            <td id="id_proprietaire"'.$row['id_proprietaire'].'">Enregistrer le '.$row['datesave'].'</td>
                          </tr>
                          <tr>
                            <td id="id_proprietaire"'.$row['id_proprietaire'].'">Nom<input class="form-control"  type="text" placeholder="Nom du maître" name="nomMaster" id="nomMaster'.$row['id_proprietaire'].'" value="'.ucfirst($row['nom']).'">
                            </td>
                            <td id="id_proprietaire"'.$row['id_proprietaire'].'">Prénom<input class="form-control"  type="text" placeholder="Prénom du maître" name="prenomMaster" id="prenomMaster'.$row['id_proprietaire'].'" value="'.ucfirst($row['prenom']).'"></td>
                          </tr>

                          <tr>
                            <td id="id_proprietaire"'.$row['id_proprietaire'].'">Date de naissance<input class="form-control"  type="text" placeholder="Date de naissance" name="dateNaissance" id="dateNaissance'.$row['id_proprietaire'].'" value="'.$row['date_naissance'].'"></td>
                            <td id="id_proprietaire"'.$row['id_proprietaire'].'">Lieu de naissance<input class="form-control"  type="text" placeholder="Lieu de naissance" name="lieuNaissance" id="lieuNaissance'.$row['id_proprietaire'].'" value="'.ucfirst($row['lieu_naissance']).'"></td>
                           </tr>

                           </td></tr>

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

                           <tr><td><img src="img/edit.png" title="Modifier"  id="modif" onclick="modifFild(\''.$row['id_proprietaire'].'\',\''.$row['nom'].'\')"></td>
                          <td><input class="btn_listdog" type="button" value="voir" id="dogsProprio" onclick="dogsProprioform('.$row['id_proprietaire'].'),dogsProprio('.$row['id_proprietaire'].')"></td></tr>
                     </table>
                  </div>';

                       $html.='<div id="listDogs'.$row['id_proprietaire'].'"></div>
                       ';
                       

                   
             }

         
                 

                $this->appli->list=$html;
                $this->appli->tab=$html2;

        }

    public function listDogsProInactif($proprietaireIncatif){

        $html='';
        
        $html.='<table class="table" id="formListDogs"><ul class="list-group">';
        foreach ($proprietaireIncatif as $key => $row) {

          $html.=' 
    
          
          <tr><td><li class="list-group-item">'.ucfirst($row['nom']).'&nbsp'.ucfirst($row['prenom']).'</li>

                   <td><input class="btn btn-success" type="button" value="Activer" id="delete" onclick="activProprio(\''.$row['id_proprietaire'].'\',\''.$row['nom'].'\')">

        <td><img src="img/can.png" id="delete" onclick="deleteProprio(\''.$row['id_proprietaire'].'\',\''.$row['nom'].'\')"></td></td></td></tr>';


                  
        }
        

        $html.='</ul></table>';

        $this->appli->list=$html;
    }

    public function AddNewDogs($race,$verification){
    	$html='';
    	$html.='
       <table class="table" id="formAjout">
       
       <tr>
       <tr><td><h1><u>Maître</u><h1></td></tr>
       <td>Nom<input class="form-control"type="text" placeholder="Nom du maître" name="nomMaster" id="nomMaster" required autofocus></td>
       <td>Prénom<input class="form-control"  type="text" placeholder="Prénom du maître" name="prenomMaster" id="prenomMaster"></td>
       </tr>
       <tr><td>Date de naissance<input class="form-control"  type="date" placeholder="Date de naissance" name="dateNaissance" id="dateNaissance"></td>
       <td>Lieu de naissance<input class="form-control"  type="text" placeholder="Lieu de naissance" name="lieuNaissance" id="lieuNaissance"></td></tr>
       <tr>
       <td>Rue<input class="form-control" type="text"placeholder="Rue" name="rueMaster" id="rueMaster"></td>
       <td>N°<input class="form-control" type="text" placeholder="Numéro" name="numMaster" id="numMaster"></td>
       <td>Code Postal<input class="form-control" type="text" placeholder="Code postal" name="cpMaster" id="cpMaster"></td></tr>
       <tr><td>Ville<input class="form-control" type="text" placeholder="Ville" name="villeMaster" id="villeMaster"></td>
       <td>Pays<input class="form-control" type="text" placeholder="Pays" name="paysMaster" id="paysMaster"></td>
       </tr>
       <tr>
       <td>Mail<input class="form-control" type="mail" placeholder="Mail" name="mailMaster" id="mailMaster"></td>
       <td>Téléphone<input class="form-control" type="text" placeholder="Téléphone" name="telMaster" id="telMaster"></td>
       <td>GSM<input class="form-control" type="text" placeholder="GSM" name="gsmMaster" id="gsmMaster"></td>
       
       <tr><td>Période contactable<select class="form-control" name="periodeContact" id="periodeContact">
       <option value=""></option>
       <option value="matin">Matin</option>
       <option value="midi">Midi</option>
       <option value="soir">Soir</option></td>
       <td>Autre<input class="form-control" type="text" placeholder="Autre" name="autreDispo" id="autreDispo"></td></tr>
       <tr><td><h1><u>Personne de contact</u><h1></td></tr>

       <tr><td>Nom<input class="form-control" type="text" placeholder="Nom" name="nomContact" id="nomContact"></td>
       <td>Prénom<input class="form-control" type="text" placeholder="Prénom" name="prenomContact" id="prenomContact"></td>
       <td>Téléphone<input class="form-control" type="text" placeholder="Téléphone" name="telContact" id="telContact"></td></tr>
       </tr>
       <tr><td>Date d&#145;enregistrement<input class="form-control" type="date" placeholder="Date d&#145;enregistrement" name="date" id="date"></td></tr>
       <tr><td><input class="btn btn-warning" type="button" value="Enregistrer" id="bAddDogs" onclick="addNewDogs();"></td></tr></table>';

    	$this->appli->news=$html;
    }

    public function addNewDogsList($newDogsList,$race){

      $html='';
      $html.='<table class="table" id="formListDogs"><ul class="list-group">';

      $i=1;
      foreach ($race as $key => $row) {

        $html.='<tr><td><li class="list-group-item"'.$row['id_race'].'>' .$i.' '.$row['race'].'</li>

        <td><img src="img/can.png" id="deleteRace" onclick="deleteRace(\''.$row['id_race'].'\',\''.$row['race'].'\')"></td></td></tr>';
        $i++;
      }
      $html.='</ul></table>';

      $html.='<table class="table" id="formList">
      <tr><td>Mise a jour de la liste <input class="form-control" type="text" name="listDogs" id="listDogs" require autofocus></td></tr>
              <tr><td><input class="btn btn-warning" type="button" name="bListDogs" id="bListdogs" value="ajouter" onclick="addNewDogsList()"></td></tr></table>';

       $this->appli->list=$html;       
    } 

    public function addNewListVerification($verification,$newListVerification,$modifListVerification){

      $html='';
      $html.='<table class="table" id="formListDogs"><ul class="list-group">';

      
      foreach ($verification as $key => $vow) {
        
      
      $html.='<tr><td><li '.$vow['id_verification'].'> <input class="form-control"type="text" id="verif'.ucfirst($vow['id_verification']).'" value="'.$vow['verification'].'"></li>

        <td><img src="img/can.png"id="deleteRace" onclick="deleteVerification(\''.$vow['id_verification'].'\',\''.$vow['verification'].'\')"></td><td><img src="img/edit.png" title="Modifier" onclick="modifListVerification('.$vow['id_verification'].')"></td></td></tr>';

          }
      $html.='</table>';

      $html.='<table class="table" id="formList">
      <tr><td>Mise a jour de la liste des vérifications <input class="form-control" type="text" name="listVerification" id="listVerification" require autofocus></td></tr>
              <tr><td><input class="btn btn-warning" type="button" name="bListVerification" id="bListVerification" value="ajouter" onclick="addNewListVerification()"></td>
              </tr></table>';

       $this->appli->list=$html;       
    }  



}
?>