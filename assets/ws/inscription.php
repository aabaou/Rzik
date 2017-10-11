<?php

include '../config/config.inc.php';




$Methode = $_POST;

$userName = htmlspecialchars($mysqli->real_escape_string($Methode['login'] ));
$email = htmlspecialchars($mysqli->real_escape_string($Methode['email'] ));
$password = htmlspecialchars($mysqli->real_escape_string($Methode['password'] ));

$fakepassword = random_password(rand(5, 10));


$sha2pwd = sha1(sha1($password) . sha1($password));



$sql = "SELECT mail FROM users WHERE mail = '$email'";

$result = $mysqli->query($sql);

// Si le mail est déjà présent
if($result->num_rows == 0)
{

	$sql = "INSERT INTO users(mail, password, username, trackm, r_roles_id) VALUES('$email','$fakepassword','$userName', '$sha2pwd', '1')"; 

	error_log($sql);
	$mysqli->query($sql);

	$result = ['status' => 'success', 'message' => 'Votre compte a été crée', 'data' => 'data' ];

}

else {
	$result = ['status' => 'error', 'message' => 'Ce mail est déjà présent', 'data' => 'data' ];
	
}
// header('Location : /index.php');

echo json_encode($result);
/* Fermeture de la connexion */
$mysqli->close();

?>

