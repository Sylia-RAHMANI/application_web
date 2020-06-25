<?php

// BDD
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=jeu;charset=utf8', 'root', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//$bdd->setAttribute(PDO::ALTER_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


?>
