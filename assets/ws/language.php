<?php

include '../config/config.inc.php';


$_SESSION['lang'] = $_GET['lang'];


header('Location: ../../index.php'); 


/* Fermeture de la connexion */
$mysqli->close();

?>

