<?php
if(isset($_GET['listDogs'])){
	//echo($_GET['nomMaster']);
	include ('../connect.php');
	include('../../../class/dogs.class.php');
	$art=new Dogs($pdo);
	$art->addNewDogsList($_GET);
}

?>