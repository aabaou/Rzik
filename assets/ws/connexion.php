<?php

include '../config/config.inc.php';


$Methode = $_POST;

$param = new stdClass();

foreach ($Methode as $key => $value) {
	$param->$key = trim(htmlspecialchars($mysqli->real_escape_string($value)));
}


// $email = htmlspecialchars($mysqli->real_escape_string($Methode['email'] ));
// $password = htmlspecialchars($mysqli->real_escape_string($Methode['password'] ));


$sha2pwd = sha1(sha1($param->password) . sha1($param->password));



$sql = "SELECT * FROM users WHERE mail = '$param->email' AND trackm = '$sha2pwd'";

$result = $mysqli->query($sql);

$res = $result->fetch_object();

if($res->num_rows == 0)
{

	$pwd = sha1(sha1($param->password) . sha1($param->password));

	if($pwd == $res->trackm){
		$can_connect = true;
	}else{
		$can_connect = false;
	}

	$_SESSION['connect'] = $can_connect;
	$_SESSION['username'] = $res->username;
	$_SESSION['userID'] = $res->id;
	$_SESSION['key'] = 'ilovetities';

	header('Location: ../../index.php'); 
}

else{
	header('Location: ../../index.php'); 
}




/* Fermeture de la connexion */
$mysqli->close();

?>

