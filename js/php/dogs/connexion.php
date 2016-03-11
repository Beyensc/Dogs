<?php
if(isset($_GET['login'])){

	include ('../connect.php');
	include('../../../class/dogs.class.php');
	$art=new Dogs($pdo);
	$art->connexion($_GET);
}

?>