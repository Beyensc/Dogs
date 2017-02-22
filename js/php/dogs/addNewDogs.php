<?php
if(isset($_GET['nomMaster'])){
print_r($_GET);
//echo "string";
	include ('../connect.php');
	include('../../../class/dogs.class.php');
	$art=new Dogs($pdo);
	$art->addNewDogs($_GET);
}

?>