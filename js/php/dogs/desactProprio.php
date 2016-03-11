<?php

if(isset($_GET['id'])){
	//echo($_GET['nom']);
	include ('../connect.php');
	include('../../../class/dogs.class.php');
	$art=new Dogs($pdo);
	$art->desactProprio($_GET['id']);
}
?>