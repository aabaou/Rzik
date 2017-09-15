<?php

	include 'fonctions.inc.php';
	
	session_start();
	
	if(empty($_SESSION['lang'])){
	$_SESSION['lang'] = 'fr';
	}
	
	if($_SESSION['lang'] != 'en'){
		$_SESSION['lang'] = 'fr';
	}
	
	if($_SESSION['lang'] == 'en'){
		include 'dico_en.php';
	}else{
		include 'dico_fr.php';
	}
	
	
	ini_set('upload-max-filesize', '50M');
	ini_set('post_max_size', '50M');

	

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