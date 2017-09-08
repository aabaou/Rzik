<?php

include '../config/config.inc.php';


session_destroy();


header('Location: ../../index.php'); 


/* Fermeture de la connexion */
$mysqli->close();

?>

