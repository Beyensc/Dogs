<?php
if(isset($_GET['id'])){
	echo($_GET['id']);
	include ('../connect.php');
	include('../../../class/dogs.class.php');
	$art=new Dogs($pdo);
	$art->deleteProprio($_GET['id']);
}
?>