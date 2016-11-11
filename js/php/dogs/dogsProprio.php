<?php
if(isset($_GET['id'])){
	//echo($_GET['id']);
	include ('../connect.php');
	include('../../../class/dogs.class.php');
    $art=new Dogs($pdo);
	//print_r($art->dogsProprio($_GET['id']));
	$list=$art->dogsProprio($_GET['id']);
	//print_r($list);
	foreach ($list as $key => $value) {
	
	

	echo'<table class="table" id ="listDogsPro">
			<tr><h1><u>'.ucfirst($value['nom']).'</u></h1></tr>
	     <tr>Nom du chien <input class="form-control" type="text" id="nomDogs'.$value['id_chien'].'" value="'.ucfirst($value['nom']).'"></tr>
	     <tr>race du chien <input class="form-control" type="text" id="raceDogs'.$value['id_chien'].'" value="'.$value['race'].'"></tr>
	     <tr>date de naissance <input class="form-control" type="text" id="dateNaissance'.$value['id_chien'].'" value="'.$value['date_naissance'].'"></tr>
	     <tr>sexe <input class="form-control" type="text" id="sexe_dogs'.$value['id_chien'].'" value="'.$value['sexe'].'"></tr>
	     <tr>Dog id <input class="form-control" type="text" id="numPuceDogs'.$value['id_chien'].'" value="'.$value['num_puce'].'"></tr>
	     <tr>Puce <input class="form-control" type="text" id="puceDogs'.$value['id_chien'].'" value="'.$value['puce_dogs'].'"></tr>
	     <tr>Tatouage <input class="form-control" type="text"  id="tatooDogs'.$value['id_chien'].'" value="'.$value['tatoo_dogs'].'"></tr>
	     <tr><h1><u>Divers</u></h1></tr>
	     <tr>Lieu de détention <input class="form-control"  id="detention'.$value['id_chien'].'" type="text" value="'.$value['detention'].'"></tr>
	     <tr>Club <input class="form-control" type="text" id="club'.$value['id_chien'].'" value="'.$value['club'].'"></tr>
	     <tr>Adresse du club <input class="form-control" id="clubAdresse'.$value['id_chien'].'" type="text" value="'.$value['club_adresse'].'"></tr>
	     <tr>Mordant <input class="form-control" type="text" id="mordant'.$value['id_chien'].'"  value="'.$value['mordant'].'"></tr>
	     <tr>Vétérinaire <input class="form-control" type="text" id="veto'.$value['id_chien'].'" value="'.ucfirst($value['veto']).'"></tr>
	     <tr>Téléphone(vétérinaire) <input class="form-control" id="vetoTel'.$value['id_chien'].'" type="text" value="'.$value['vetotel'].'"></tr>
	     <tr><h1><u>Remarque(s)</u></h1></tr>

	     <tr><input class="form-control" type="text"id="remarques'.$value['id_chien'].'"value="'.$value['remarques'].'">
	     </tr>

	     <tr><img src="img/can.png" id="delete" onclick="desactDogs(\''.$value['id_chien'].'\',\''.$value['nom'].'\')">&nbsp;<tr>
	     <tr><img src="img/edit.png" title="Modifier" id="modif" onclick="modifDogs(\''.$value['id_chien'].'\',\''.$value['nom'].'\')"></tr>
	     </table>';

    }
	
}
?>