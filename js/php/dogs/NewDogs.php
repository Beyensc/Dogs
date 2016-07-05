<?php


	include ('../connect.php');
	include('../../../class/dogs.class.php');
	$art=new Dogs($pdo);
	$art->ajoutDogs($_GET);
    print_r($_GET)

?>