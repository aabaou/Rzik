<?php

include '../config/config.inc.php';


$Methode = $_POST;

$email = htmlspecialchars($mysqli->real_escape_string($Methode['email'] ));
$password = htmlspecialchars($mysqli->real_escape_string($Methode['password'] ));


$sha2pwd = sha1(sha1($password) . sha1($password));



$sql = "SELECT * FROM users WHERE mail = '$email'";

$result = $mysqli->query($sql);

$res = $result->fetch_object();


$pwd = sha1(sha1($password) . sha1($password));

if($pwd == $res->trackm){
	$can_connect = true;
}else{
	$can_connect = false;
}

$_SESSION['connect'] = $can_connect;
$_SESSION['username'] = $res->username;


header('Location: ../../index.php'); 


/* Fermeture de la connexion */
$mysqli->close();

?>

