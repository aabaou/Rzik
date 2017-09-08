<?php

	include 'fonctions.inc.php';


	$salt = random_password(10); // Création de Sel

	$hostname  ="localhost";			// Nom du serveur mysql
	$mysqluser ="root";					// login
	$mysqlpswd ="";					// password
	$database  ="rzik";	// Nom de la base de données
	date_default_timezone_set('Europe/Paris');

	$mysqli = new mysqli($hostname, $mysqluser, $mysqlpswd, $database);

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}

?>