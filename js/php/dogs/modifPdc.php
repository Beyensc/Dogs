<?php
if(isset($_GET['id'])){
	
	include ('../connect.php');
	include('../../../class/dogs.class.php');
	$art=new Dogs($pdo);
	$art->modifPdc($_GET);//la fonction requête!!!!!

	
}

?>