<?php
if(isset($_GET['nomMaster'])){
	//echo($_GET['nomMaster']);
	include ('../connect.php');
	include('../../../class/dogs.class.php');
	$art=new Dogs($pdo);
	$art->addNewDogs($_GET);
}

?>