<?php
if(isset($_GET['mdp_md5'])){
//print_r($_GET);
//echo "string";
	include ('../connect.php');
	include('../../../class/dogs.class.php');
	$art=new Dogs($pdo);
	$art->nouvelUtilisateur($_GET);
}

?>