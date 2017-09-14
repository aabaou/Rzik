<?php

	include 'fonctions.inc.php';

	ini_set('upload-max-filesize', '50M');
	ini_set('post_max_size', '50M');

	session_start();

	$salt = random_password(10); // Création de Sel

	########## app ID and app SECRET (Replace with yours) #############
	$appId = '830871210408145'; //Facebook App ID
	$appSecret = 'ed9897bb507dfd5d0e1e5c4e0786698f'; // Facebook App Secret
	$return_url = 'http://localhost/Rzik/';  //path to script folder
	$fbPermissions = 'publish_actions,email'; //more permissions : https://developers.facebook.com/docs/authentication/permissions/

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