<?php
if(isset($_GET['id'])){
  //echo($_GET['id']);
  include ('../connect.php');
  include('../../../class/dogs.class.php');
    $art=new Dogs($pdo);
  
  $list=$art->listPdc($_GET['id']);
  
  
  foreach ($list as $key => $value) {



  echo' <div id="wrapper">
  <table class="table" id ="listPdc">
      <tr><h1><u>'.ucfirst($value['nom']).'</u></h1></tr>
            <tr>
          <td>Nom  <input class="form-control" type="text" placeholder="Nom du chien" name="nomContact" id="nomContact'.$value['id_pdc'].'" value="'.ucfirst($value['nom']).'"></td></tr>
          <tr>
          <td>Prénom<input class="form-control" type="text" placeholder="Prénom" name="prenomContact" id="prenomContact'.$value['id_pdc'].'"value="'.ucfirst($value['prenom']).'"></td></tr>
          <tr>
          <td>Téléphone<input class="form-control" type="text" placeholder="Téléphone" name="telContact" id="telContact'.$value['id_pdc'].'" value="'.$value['telephone'].'"></td></tr>
          <tr>
           <td>Gsm<input class="form-control" type="text" placeholder="Gsm" name="gsmContact" id="gsmContact'.$value['id_pdc'].'" value="'.$value['gsm'].'"></td></tr>
           <tr>
          <td>Rue<input class="form-control" type="text" placeholder="Rue" name="rueContact" id="rueContact'.$value['id_pdc'].'" value="'.$value['rue'].'"></td></tr>
          <tr>
          <td>Numéro<input class="form-control" type="text" placeholder="Numéro" name="numeroContact" id="numeroContact'.$value['id_pdc'].'" value="'.$value['numero'].'"></td></tr>
          <tr>
          <td>Code Postal<input class="form-control" type="text" placeholder="Code Postal" name="cpContact" id="cpContact'.$value['id_pdc'].'" value="'.$value['cp'].'"></td></tr>
          <tr>
          <td>Ville<input class="form-control" type="text" placeholder="Ville" name="villeContact" id="villeContact'.$value['id_pdc'].'" value="'.$value['ville'].'"></td></tr>
          <tr>
          <td>Pays<input class="form-control" type="text" placeholder="Pays" name="paysContact" id="paysContact'.$value['id_pdc'].'" value="'.$value['pays'].'"></td></tr>
          <tr><td><img src="img/edit.png" title="Modifier" id="modif" onclick="modifPdc(\''.$value['id_pdc'].'\',\''.$value['nom'].'\')"></td>
          <td><img src="img/can.png" id="delete" onclick="deletePdc(\''.$value['id_pdc'].'\',\''.$value['nom'].'\')">&nbsp;</td></tr>

           <tr><td><a href="?component=admin&action=actif">Retour</a></td></tr>
          </table>
      </div>';

   } 
  
}
?>