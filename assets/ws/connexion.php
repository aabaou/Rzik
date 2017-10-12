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

$sqlBanni = "SELECT statut FROM users WHERE mail = '$param->email' AND trackm = '$sha2pwd'";
$resultBanni = $mysqli->query($sqlBanni);


$res = $result->fetch_object();

$resBanni = $resultBanni->fetch_object();

error_log($result->num_rows.'__'.$res->r_roles_id.'__'.$resBanni->statut);

if($result->num_rows != 0 && $resBanni->statut == 0)
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

	if($res->r_roles_id != 2)
		header('Location: ../../index.php'); 
	else{
		header('Location: ../../bo.php'); 
		$_SESSION['admin'] = $res->r_roles_id;
	}
}	


elseif($result->num_rows == 0 && $resBanni->statut == 0){
	header('Location: ../../index.php'); 
}



else{
	die('Vous êtes banni');
}




/* Fermeture de la connexion */
$mysqli->close();

?>

