<?php
try
{
	$pdo = new PDO('mysql:host=localhost;dbname=dogs','root','ClemBey1991');
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}



?>
