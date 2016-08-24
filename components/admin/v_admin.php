<?php

class VAdmin extends VBase {

    function __construct($appli, $model) {
        parent::__construct($appli, $model);
    }
    //La recherche qui passe par une fonction JS
    public function recherche(){

      $html='';
      $html.=' <div id="formRecherche">
       
       <input type="text" class="form-control" placeholder="Recherche"  id="recherche"></br>
       
       </div>';

      $this->appli->content=$html;
    }
    //Fonction qui permet de lister les propriétaires et leurs chiens 
    public function listDogsPro($proprietaire,$race,$dogs,$verification){


        $html='';
        $html2='';
        $html.='<div class="main">';
        $html2.='<table class="table" id ="listpro"  style="display:block;">
                  <tr>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Adresse</th>
                                            <th>Détails</th>
                                            <th>Nouveau chien</th>
                                            <th>Supprimer</th>
                                            <th>PDF</th>
                                          </tr>'; 

          foreach ($proprietaire as $key => $pow) {


                          $html2.=' 
                                          
                                          <tr>
                                            <td>'.ucfirst($pow['nom']).'</td>
                                            <td>'.ucfirst($pow['prenom']).'</td>
                                            <td>'.ucfirst($pow['numero']).'&nbsp rue &nbsp'.ucfirst($pow['rue']).'&nbsp'.ucfirst($pow['CP']).'&nbsp'.ucfirst($pow['ville']).'</td>
                                            <td> <img src="img/business.png" id="button"   id="details" onclick="details('.$pow['id_proprietaire'].');"></td>
                                            <td><img src="img/dog.png" id="ajoutDogs" a title="Ajouter un nouveau chien." onclick="ajoutDogsForm('.$pow['id_proprietaire'].');"></td>
                                            <td><img src="img/can.png" id="delete" onclick="desactProprio(\''.$pow['id_proprietaire'].'\',\''.$pow['nom'].'\')"></td>
                                            <td><a href="?component=admin&action=pdf&id'.$pow['id_proprietaire'].'" target=\"_blank\"><img src="img/pdf.png"></a></td>
                                          </tr>';
                                    }

                                    $html2.='</table>';
              
           
                   foreach ($proprietaire as $key => $row) {


                          $html.=' 

                          <div id="formdogs">
                            <table class="table" id="ajoutDogsForm'.$row['id_proprietaire'].'" style="display:none;">
                                  <tr><td><h1><u>Chien</u></h1></td></tr>
                                  <tr><td><a href="?component=admin&action=actif">Retour</a></td></tr>
                                 <tr>
                                   <td>Nom du chien  <input class="form-control" type="text" placeholder="Nom du chien" name="nomDogs" id="nomDogs'.$row['id_proprietaire'].'"></td>
                                 </tr>
                                 <tr>  
                                   <td>Dog id <input class="form-control" type="text" placeholder="xxx-xxx-xxxx" name="numPuceDogs" id="numPuceDogs'.$row['id_proprietaire'].'"></td>
                                 </tr>
                                 <tr>  
                                   <td>Date de naissance <input class="form-control" type="text" placeholder="J/M/A" name="dateNaissance" id="dateNaissance'.$row['id_proprietaire'].'"></td>
                                 </tr>
                                 <tr>
                                   <td>Puce <input class="form-control" type="text" placeholder="Puce" name="puceDogs" id="puceDogs'.$row['id_proprietaire'].'"></td>
                                 </tr>
                                 <tr>  
                                   <td>Tatouage <input class="form-control" type="text" placeholder="Tatouage" name="tatooDogs" id="tatooDogs'.$row['id_proprietaire'].'"></td>
                                 </tr>
                                 <tr>  
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
                                   
                                <tr>
                                  <td>
                                     <select class="form-control" name="raceDogs" id="raceDogs'.$row['id_proprietaire'].'">
                                     <option value=""selected></option>';

                                                 foreach ($race as $key => $rowa) {

                                                       $html.=' <option  value='.$rowa['id_race'].' >'.$rowa['race'].'</option>';
                          
                                                 }
                                        $html.='</select>
                                    </td> 
                                    </tr> 
                                    <tr>
                                      <td>Photo du chien</td>
                                    </tr>
                                    <tr>
                                      <td><input type="file" name="photoDog" size="30"></td>
                                     </tr> 
                                  </tr>

                                  <tr><td><h1><u>Divers</u></h1></td></tr>
                                  <tr>
                                    <td>Lieu de détention du chien(si autre que celui de l adresse du propriétaire)<input class="form-control" type="text" placeholder="Lieu de détention" name="detention" id="detention'.$row['id_proprietaire'].'"></td>
                                  </tr>    
                                  <tr>
                                    <td>Club de dressage<input class="form-control" type="text" placeholder="Nom du club" name="club" id="club'.$row['id_proprietaire'].'"></td>
                                  </tr>
                                  <tr>  
                                    <td>Adresse du club<input class="form-control" type="text" placeholder="Adresse du club" name="clubAdresse" id="clubAdresse'.$row['id_proprietaire'].'"></td>
                                  </tr>
                                  <tr>  
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
                                  </tr>
                                  <tr>  
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
                                    
                                              //test onmousedown : NOK
                                  $html.='<tr><td><input class="btn btn-primary" type="button" value="Ajouter" id="ajoutDogs" onclick="ajoutDogs(\''.$row['id_proprietaire'].'\');"></td></tr>

                                  </table></div>

                                <div id="maitre">
                                <table class="table"  id="details'.$row['id_proprietaire'].'" style="display:none;" >
                                <tr><td><a href="?component=admin&action=actif">Retour</a></td></tr>

                                    <tr><td><h1><u>Maître</u></h1></td></tr>
                                    <tr>
                                      <td id="id_proprietaire"'.$row['id_proprietaire'].'">Enregistrer le '.$row['datesave'].'</td>
                                    </tr>
                                    <tr>
                                      <td id="id_proprietaire"'.$row['id_proprietaire'].'">Nom<input class="form-control"  type="text" placeholder="Nom du maître" name="nomMaster" id="nomMaster'.$row['id_proprietaire'].'" value="'.ucfirst($row['nom']).'">
                                      </tr>
                                    <tr>  
                                      <td id="id_proprietaire"'.$row['id_proprietaire'].'">Prénom<input class="form-control"  type="text" placeholder="Prénom du maître" name="prenomMaster" id="prenomMaster'.$row['id_proprietaire'].'" value="'.ucfirst($row['prenom']).'"></td>
                                    </tr>

                                    <tr>
                                      <td id="id_proprietaire"'.$row['id_proprietaire'].'">Date de naissance<input class="form-control"  type="text" placeholder="Date de naissance" name="dateNaissance" id="dateNaissance'.$row['id_proprietaire'].'" value="'.$row['date_naissance'].'"></td>
                                    </tr>
                                    <tr>  
                                      <td id="id_proprietaire"'.$row['id_proprietaire'].'">Lieu de naissance<input class="form-control"  type="text" placeholder="Lieu de naissance" name="lieuNaissance" id="lieuNaissance'.$row['id_proprietaire'].'" value="'.ucfirst($row['lieu_naissance']).'"></td>
                                    </tr>

                                    </tr>

                                    <tr>
                                      <td id="id_proprietaire"'.$row['id_proprietaire'].'">Rue<input class="form-control" type="text"placeholder="Rue" name="rueMaster" id="rueMaster'.$row['id_proprietaire'].'" value="'.ucfirst($row['rue']).'"></td>
                                    </tr>
                                    <tr>    
                                     <td id="id_proprietaire"'.$row['id_proprietaire'].'">N°<input class="form-control" type="text" placeholder="Numéro" name="numMaster" id="numMaster'.$row['id_proprietaire'].'" value="'.$row['numero'].'"></td>
                                    </tr>
                                    <tr> 
                                     <td id="id_proprietaire"'.$row['id_proprietaire'].'">Code postal<input class="form-control" type="text" placeholder="Code postal" name="cpMaster" id="cpMaster'.$row['id_proprietaire'].'" value="'.$row['CP'].'"></td>
                                    </tr>
                                    <tr>
                                      <td>Ville<input class="form-control" type="text" placeholder="Ville" name="villeMaster" id="villeMaster'.$row['id_proprietaire'].'" value="'.ucfirst($row['ville']).'"></td>
                                    </tr>
                                    <tr>  
                                     <td id="id_proprietaire"'.$row['id_proprietaire'].'">Pays<input class="form-control" type="text" placeholder="Pays" name="paysMaster" id="paysMaster'.$row['id_proprietaire'].'" value="'.ucfirst($row['pays']).'"></td>
                                    </tr>
                                    <tr>
                                     <td id="id_proprietaire"'.$row['id_proprietaire'].'">Mail<input class="form-control" type="mail" placeholder="Mail" name="mailMaster" id="mailMaster'.$row['id_proprietaire'].'" value="'.$row['mail'].'"></td>
                                    </tr>
                                    <tr> 
                                     <td id="id_proprietaire"'.$row['id_proprietaire'].'">Téléphone<input class="form-control" type="text" placeholder="Téléphone" name="telMaster" id="telMaster'.$row['id_proprietaire'].'" value="'.$row['telephone'].'"></td>
                                    </tr>
                                    <tr> 
                                     <td id="id_proprietaire"'.$row['id_proprietaire'].'">GSM<input class="form-control" type="text" placeholder="GSM" name="gsmMaster" id="gsmMaster'.$row['id_proprietaire'].'" value="'.$row['gsm'].'"></td>
                                    </tr>
                                    <tr>
                                      <td id="id_proprietaire"'.$row['id_proprietaire'].'">Période contactable<input class="form-control" type="text" placeholder="Période contactable" name="periodeContact" id="periodeContact'.$row['id_proprietaire'].'" value="'.$row['periode_dispo'].'"></td>
                                    </tr>
                                    <tr>  
                                     <td id="id_proprietaire"'.$row['id_proprietaire'].'"> Autre période contactable<input class="form-control" type="text" placeholder=" Autre période contactable" name="autreDispo" id="autreDispo'.$row['id_proprietaire'].'" value="'.$row['autre_dispo'].'"></td>
                                    </tr>
                                     <tr><td><h1><u>Personne de contact</u></h1></td></tr>
                                     <tr> 
                                      <td id="id_proprietaire"'.$row['id_proprietaire'].'"> Nom<input class="form-control" type="text" placeholder=" Nom" name="nomContact" id="nomContact'.$row['id_proprietaire'].'" value="'.ucfirst($row['nom_contact']).'"></td>
                                    </tr>
                                    <tr>  
                                     <td id="id_proprietaire"'.$row['id_proprietaire'].'"> Prénom<input class="form-control" type="text" placeholder=" Prénom" name="prenomContact" id="prenomContact'.$row['id_proprietaire'].'" value="'.ucfirst($row['prenom_contact']).'"></td>
                                    </tr>
                                    <tr> 
                                     <td id="id_proprietaire"'.$row['id_proprietaire'].'"> Téléphone<input class="form-control" type="text" placeholder=" Téléphone" name="telContact" id="telContact'.$row['id_proprietaire'].'" value="'.$row['num_contact'].'"></td>
                                    </tr>
                                  
                                     <tr><td><img src="img/edit.png" title="Modifier"  id="modif" onclick="modifFild(\''.$row['id_proprietaire'].'\',\''.$row['nom'].'\');"></td>
                                    <td><input class="btn_listdog" type="button" value="voir" id="dogsProprio" onclick="dogsProprioform('.$row['id_proprietaire'].'),dogsProprio('.$row['id_proprietaire'].')"></td></tr>
                               </table>
                            </div>';

                                 $html.='<div id="listDogs'.$row['id_proprietaire'].'"></div>
                                  </div>';
                                 

                             
                       }

                   
                           




                          $this->appli->list=$html;
                          $this->appli->tab=$html2;
    }
    //Fonction qui permet l'affichage des propriétaires inactif c-à-d un proprietaire qui n'a plus de chien est désactiver au lieu d'être supprimer
    public function listDogsProInactif($proprietaireIncatif){

        /*$html='';
        
        $html.='<table class="table" id="formListDogs"><ul class="list-group">';
        foreach ($proprietaireIncatif as $key => $row) {

          $html.=' 
    
          
          <tr><td><li class="list-group-item">'.ucfirst($row['nom']).'&nbsp'.ucfirst($row['prenom']).'</li>

                   <td><input class="btn btn-success" type="button" value="Activer" id="delete" onclick="activProprio(\''.$row['id_proprietaire'].'\',\''.$row['nom'].'\');">

        <td><img src="img/can.png" id="delete" onclick="deleteProprio(\''.$row['id_proprietaire'].'\',\''.$row['nom'].'\');"></td></td></td></tr>';


                  
        }
        

        $html.='</ul></table>';*/
        $html='';

        $html.='<table class="table" id ="listpro"  style="display:block;">
                  <tr>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Activer</th>
                                            <th>Supprimer</th>
                                          </tr>'; 

          foreach ($proprietaireIncatif as $key => $pow) {


                          $html.=' 
                                          
                                          <tr>
                                            <td>'.ucfirst($pow['nom']).'</td>
                                            <td>'.ucfirst($pow['prenom']).'</td>
                                            
                                            
                                            <td><img src="img/eye.png" id="active" onclick="activProprio(\''.$pow['id_proprietaire'].'\',\''.$pow['nom'].'\');"></td>
                                            <td><img src="img/can.png" id="delete" onclick="deleteProprio(\''.$pow['id_proprietaire'].'\',\''.$pow['nom'].'\');"></td></td></td></tr>
                                            
                                          </tr>';
                                    }

                                    $html.='</table>';
              

        $this->appli->list=$html;
    }
    //Fonction pour l'ajout d'un nouveau propriétaire 
    public function AddNewDogs($race,$verification){
    	$html='';
    	$html.='
       <table class="table" id="formAjout">
       
       
       <tr><h1><u>Maître</u><h1></tr>
       <tr>Nom<input class="form-control"type="text" placeholder="Nom du maître" name="nomMaster" id="nomMaster"  required autofocus></tr>
       <tr>Prénom<input class="form-control"  type="text" placeholder="Prénom du maître" name="prenomMaster" id="prenomMaster" required></tr>
       
       <tr>Date de naissance<input class="form-control"  type="text" placeholder="J/M/A" name="dateNaissance" id="datepickerNaissance" required></tr>
       <tr>Lieu de naissance<input class="form-control"  type="text" placeholder="Lieu de naissance" name="lieuNaissance" id="lieuNaissance"></tr>
       
       <tr>Rue<input class="form-control" type="text"placeholder="Rue" name="rueMaster" id="rueMaster" required></tr>
       <tr>N°<input class="form-control" type="text" placeholder="Numéro" name="numMaster" id="numMaster" required></tr>
       <tr>Code Postal<input class="form-control" type="text" placeholder="Code postal" name="cpMaster" id="cpMaster" required></tr>
       <tr>Ville<input class="form-control" type="text" placeholder="Ville" name="villeMaster" id="villeMaster" required></tr>
       <tr>Pays<input class="form-control" type="text" placeholder="Pays" name="paysMaster" id="paysMaster" required></tr>
       
        
       <tr>Mail<input class="form-control" type="mail" placeholder="Mail" name="mailMaster" id="mailMaster"></tr>
       <tr>Téléphone<input class="form-control" type="text" placeholder="Téléphone" name="telMaster" id="telMaster" required></tr>
       <tr>GSM<input class="form-control" type="text" placeholder="GSM" name="gsmMaster" id="gsmMaster"></tr>
       
       <tr>Période contactable<select class="form-control" name="periodeContact" id="periodeContact">
       <option value=""></option>
       <option value="matin">Matin</option>
       <option value="midi">Midi</option>
       <option value="soir">Soir</option></td>
       <tr>Autre<input class="form-control" type="text" placeholder="Autre" name="autreDispo" id="autreDispo"></tr>
       <tr><h1><u>Personne de contact</u><h1></tr>

       <tr>Nom<input class="form-control" type="text" placeholder="Nom" name="nomContact" id="nomContact"></tr>
       <tr>Prénom<input class="form-control" type="text" placeholder="Prénom" name="prenomContact" id="prenomContact"></tr>
       <tr>Téléphone<input class="form-control" type="text" placeholder="Téléphone" name="telContact" id="telContact"></tr>
      
       <tr>Date d&#145;enregistrement<input class="form-control" type="text" placeholder="Date d&#145;enregistrement" name="date" id="datepicker"></tr></br>
       <tr><input class="btn btn-warning" type="button" value="Enregistrer" id="bAddDogs" onclick="addNewDogs();"></tr></table>';

    	$this->appli->news=$html;
    }
    //La liste des chiens dangereux et permet aussi de mettre à jour la liste 
    public function addNewDogsList($newDogsList,$race){

      $html='';
      $html.='<table class="table" id="formListDogs"><ul class="list-group">';

      $i=1;
      foreach ($race as $key => $row) {

        $html.='<tr><td><li class="list-group-item"'.$row['id_race'].'>' .$i.' '.$row['race'].'</li>

        <td><img src="img/can.png" id="deleteRace" onclick="deleteRace(\''.$row['id_race'].'\',\''.$row['race'].'\');"></td></td></tr>';
        $i++;
      }
      $html.='</ul></table>';

      $html.='<table class="table" id="formList">
      <tr><td>Mise a jour de la liste <input class="form-control" type="text" name="listDogs" id="listDogs" require ></td></tr>
              <tr><td><input class="btn btn-warning" type="button" name="bListDogs" id="bListdogs" value="ajouter" onclick="addNewDogsList();"></td></tr></table>';

       $this->appli->list=$html;       
    } 
    //La liste des différentes vérifications effectuées par les agents lors d'un passage et aussi ma possibilité de mettre à jour la liste
    public function addNewListVerification($verification,$newListVerification,$modifListVerification){

      $html='';
      $html.='<table class="table" id="formListDogs"><ul class="list-group">';

      
      foreach ($verification as $key => $vow) {
        
      
      $html.='<tr><td><li '.$vow['id_verification'].'> <input class="form-control"type="text" id="verif'.ucfirst($vow['id_verification']).'" value="'.$vow['verification'].'"></li>

        <td><img src="img/can.png"id="deleteRace" onclick="deleteVerification(\''.$vow['id_verification'].'\',\''.$vow['verification'].'\');"></td><td><img src="img/edit.png" title="Modifier" onclick="modifListVerification('.$vow['id_verification'].');"></td></td></tr>';

          }
      $html.='</table>';

      $html.='<table class="table" id="formList">
      <tr><td>Mise a jour de la liste des vérifications <input class="form-control" type="text" name="listVerification" id="listVerification" require ></td></tr>
              <tr><td><input class="btn btn-warning" type="button" name="bListVerification" id="bListVerification" value="ajouter" onclick="addNewListVerification();"></td>
              </tr></table>';

       $this->appli->list=$html;       
    }  
    //La fonction pour la sortie en PDF avec les données du propriétaire et du/des chien(s)
    
    public function pdf($proprietaire,$race,$dogs,$dogsProprio) {
      /*echo "<pre>";
      print_r($dogs);
      echo "</pre>";  *///pk? dogsproprio ne fonctionne pas???? j'ai du rajouter les infos manquante dans le model dogs(a modifier)
    $html="";  
    $html.= "<page>
           
            <fieldset>
                <h1><img style=\"width: 20%;\"src=\"img/Police-logo.png\"><br>Immatriculation provisoire au registre des chiens dangereux</h1>
            </fieldset>";
           
            foreach ($proprietaire as $key => $value) {
              # code...
            
            
                $html.="<h2>Maître</h2>

                <table>
                <tr>
                  <td ".$value['id_proprietaire'].">Nom : ".ucfirst($value['nom'])." ".ucfirst($value['prenom'])."</td> 
                </tr>
                <tr>
                  <td ".$value['id_proprietaire'].">Lieu et date de naissance : ".ucfirst($value['lieu_naissance'])." ,le ".$value['date_naissance']."</td>
                </tr> 
                <tr>
                  <td ".$value['id_proprietaire'].">Adresse : ".$value['rue']." ".$value['numero']." , ".$value['CP']." ".ucfirst($value['ville'])."</td>
                </tr>
                <tr>
                  <td ".$value['id_proprietaire'].">Téléphone : ".$value['telephone']."</td>
                </tr> 
                 <tr>
                  <td ".$value['id_proprietaire'].">Téléphone (GSM) : ".$value['gsm']."</td>
                </tr> 
                <tr>
                  <td ".$value['id_proprietaire'].">Période contactable : ".$value['periode_dispo']." ".$value['autre_dispo']."</td>
                </tr>
                </table>";
                }
                foreach ($dogs as $key => $val) {   //dogproprio 
                  
                $html.="<h2>Chien</h2>

                <table>
                <tr>
                  <td ".$val['id_proprietaire'].">Nom : ".ucfirst($val['nom'])." </td>
                </tr>
                <tr>
                  <td ".$val['id_proprietaire'].">Sexe : ".$val['sexe']." </td>
                </tr>
                <tr>
                  <td ".$val['id_proprietaire'].">Date de naissance : ".$val['date_naissance']."</td>
                </tr>
                <tr>
                  <td ".$val['id_proprietaire'].">N° d'identification Dog-id : ".$val['num_puce']." </td>
                </tr>
                <tr>
                  <td ".$val['id_proprietaire'].">Puce : ".$val['puce_dogs']."</td>
                </tr>
                <tr>
                  <td ".$val['id_proprietaire'].">Tatouage : ".$val['tatoo_dogs']."</td>
                </tr>
                <tr>
                  <td ".$val['id_proprietaire'].">Race : ".$val['race']."</td>
                </tr>            
                </table>

                <h2>Divers</h2>

                <table>
                <tr>
                  <td ".$val['id_proprietaire'].">Lieu de détention du chien (si autre que celui de l'adresse du propriétaire) : ".ucfirst($val['detention'])."</td>
                </tr>
                <tr>
                  <td ".$val['id_proprietaire'].">Nom et téléphone du vétérinaire traitant : ".ucfirst($val['veto'])." ".$val['vetotel']."</td>
                </tr>
                <tr>
                  <td ".$val['id_proprietaire'].">Le chien est-il inscrit à un club de dressage? ".ucfirst($val['club'])."</td>
                </tr>
                <tr>
                  <td ".$val['id_proprietaire'].">Si oui,nom et adresse du club : ".$val['club_adresse']."</td>
                </tr>
                       
                </table>";
              }
            $html.="</page>"
            ;
        
    require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($html);
    $html2pdf->Output('exemple.pdf');
    }




  





}
?>