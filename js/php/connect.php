<?php

$pdo = new PDO('mysql:host=localhost;dbname=dogs','root','ClemBey1991');

function htmltosql($text)
	{
	$rep=htmlentities($text,ENT_QUOTES, "UTF-8");
	return $rep;
	}

?>
