<?php
if(isset($_GET['nomMaster'])){
	print_r($_GET);
	include ('../connect.php');
	include('../../../class/dogs.class.php');
	$art=new Dogs($pdo);
	$art->addNewDogs($_GET);
}

?>