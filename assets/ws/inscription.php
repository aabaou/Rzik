<?php

include '../config/config.inc.php';




$Methode = $_POST;

$userName = htmlspecialchars($mysqli->real_escape_string($Methode['login'] ));
$email = htmlspecialchars($mysqli->real_escape_string($Methode['email'] ));
$password = htmlspecialchars($mysqli->real_escape_string($Methode['password'] ));

$fakepassword = random_password(rand(5, 10));

sleep(1);

$sha2pwd = sha1(sha1($password) . sha1($password));



$sql = "SELECT mail FROM users WHERE mail = '$email'";

$result = $mysqli->query($sql);

// Si le mail est déjà présent
if($result->num_rows == 0)
{

	$sql = "INSERT INTO users(mail, password, username, trackm, r_roles_id) VALUES('$email','$fakepassword','$userName', '$sha2pwd', '1')"; 

	$mysqli->query($sql);

	// header('refresh: 5; Location: index.html');
}

else {

	error_log("Ce mail est déjà présent");
	// header('refresh: 5; Location: inscription.html');
	
}



/* Fermeture de la connexion */
$mysqli->close();

?>

