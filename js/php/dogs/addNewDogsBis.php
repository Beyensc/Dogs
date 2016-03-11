<?php
if(isset($_GET['nomDogs'])){
	print_r($_GET);
	include ('../connect.php');
	include('../../../class/dogs.class.php');
	$art=new Dogs($pdo);
	$art->addNewDogsBis($_GET);
}

?>