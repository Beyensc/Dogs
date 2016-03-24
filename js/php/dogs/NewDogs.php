<?php
if(isset($_GET['nomDogs'])){
		

	include ('../connect.php');
	include('../../../class/dogs.class.php');
	$art=new Dogs($pdo);
	 $art->ajoutDogs($_GET);
}

?>