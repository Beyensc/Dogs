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
	     <tr><td>Nom du chien <input class="form-control" type="text" value="'.$value['nom'].'"readonly></td>
	     <td>race du chien <input class="form-control" type="text" value="'.$value['race'].'"readonly></td>
	     <td>Dog id <input class="form-control" type="text" value="'.$value['num_puce'].'"readonly></td>
	     <td>sexe <input class="form-control" type="text" value="'.$value['sexe'].'"readonly></td>
	     <td>date de naissance <input class="form-control" type="text" value="'.$value['date_naissance'].'"readonly></td>
	     <td>Puce <input class="form-control" type="text" value="'.$value['puce_dogs'].'"readonly></td>
	     <td>Tatouage <input class="form-control" type="text" value="'.$value['tatoo_dogs'].'"readonly></td>
	     <td><input class="btn btn-danger" type="button" value="Supprimer" id="delete" onclick="desactDogs(\''.$value['id_chien'].'\',\''.$value['nom'].'\')"><td><tr>
	     </table>';

    }
	
}
?>