<?php
try
{
	$pdo = new PDO('mysql:host=localhost;dbname=dogs','root','');
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}



?>
