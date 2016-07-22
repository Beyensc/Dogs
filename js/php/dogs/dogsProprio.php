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
			<tr><td><h1><u>Chien:'.$value['nom'].'</u></h1></td></tr>
	     <tr><td>Nom du chien <input class="form-control" type="text" id="nomDogs'.$value['id_chien'].'" value="'.$value['nom'].'"></td>
	     <td>race du chien <input class="form-control" type="text" id="raceDogs'.$value['id_chien'].'" value="'.$value['race'].'"></td>
	     <td>date de naissance <input class="form-control" type="text" id="dateNaissance'.$value['id_chien'].'" value="'.$value['date_naissance'].'"></td>
	     <td>sexe <input class="form-control" type="text" id="sexe_dogs'.$value['id_chien'].'" value="'.$value['sexe'].'"></td>
	     <td>Dog id <input class="form-control" type="text" id="numPuceDogs'.$value['id_chien'].'" value="'.$value['num_puce'].'"></td>
	     <td>Puce <input class="form-control" type="text" id="puceDogs'.$value['id_chien'].'" value="'.$value['puce_dogs'].'"></td>
	     <td>Tatouage <input class="form-control" type="text"  id="tatooDogs'.$value['id_chien'].'" value="'.$value['tatoo_dogs'].'"></td></tr>
	     <tr><td><h1><u>Divers</u></h1></td></tr>
	     <tr><td>Lieu de détention <input class="form-control"  id="detention'.$value['id_chien'].'" type="text" value="'.$value['detention'].'"></td>
	     <td>Club <input class="form-control" type="text" id="club'.$value['id_chien'].'" value="'.$value['club'].'"></td>
	     <td>Adresse du club <input class="form-control" id="clubAdresse'.$value['id_chien'].'" type="text" value="'.$value['club_adresse'].'"></td>
	     <td>Mordant <input class="form-control" type="text" id="mordant'.$value['id_chien'].'"  value="'.$value['mordant'].'"></td>
	     <td>Vétérinaire <input class="form-control" type="text" id="veto'.$value['id_chien'].'" value="'.$value['veto'].'"></td>
	     <td>Téléphone(vétérinaire) <input class="form-control" id="vetoTel'.$value['id_chien'].'" type="text" value="'.$value['vetotel'].'"></td></tr>
	     <tr><td><h1><u>Remarque(s)</u></h1></td></tr>

	     <tr><td><input class="form-control" type="text"id="remarques'.$value['id_chien'].'"value="'.$value['remarques'].'"style="margin:.2em .5em;
				padding:0.1em .5em;
				border:2px solid black;
				background-color: red;
				color:#FFF;">
	     </td></tr>

	     <tr><td><img src="img/can.png" id="delete" onclick="desactDogs(\''.$value['id_chien'].'\',\''.$value['nom'].'\')"><td>
	     <td><img src="img/edit.png" title="Modifier" id="modif" onclick="modifDogs(\''.$value['id_chien'].'\',\''.$value['nom'].'\')"><td></tr>
	     </table>';

    }
	
}
?>