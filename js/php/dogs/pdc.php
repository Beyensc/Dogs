<?php
if(isset($_GET['nomContact'])){
print_r($_GET);
echo "pdc.php";
	include ('../connect.php');
	include('../../../class/dogs.class.php');
	$art=new Dogs($pdo);
	$art->pdc($_GET);
}

?>