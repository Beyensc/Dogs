<?php
if(isset($_GET['listVerification'])){
	
	include ('../connect.php');
	include('../../../class/dogs.class.php');
	$art=new Dogs($pdo);
	$art->addNewListVerification($_GET);
}

?>