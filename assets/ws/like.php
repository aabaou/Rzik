<?php

include '../config/config.inc.php';




$Methode = $_POST;

$musicIDCrypt = htmlspecialchars($mysqli->real_escape_string($Methode['music'] ));
$key = $_SESSION['key'];
$musicID = decryptS($musicIDCrypt, $key, random_password(10));

$userID = $_SESSION['userID'];

$sql = "SELECT * FROM likes WHERE music_id = '$musicID' AND user_id= '$userID'";

$result = $mysqli->query($sql);

// Si le mail est déjà présent
if($result->num_rows == 0)
{

	$sql = "INSERT INTO likes(music_id, user_id) VALUES('$musicID','$userID')"; 

	$mysqli->query($sql);

	$result = ['status' => 'success', 'message' => 'La musique a été ajouté aux j\'aime', 'data' => 'like' ];

}

else {
    $sql = "DELETE FROM likes WHERE music_id = '$musicID' AND user_id= '$userID'";

	$mysqli->query($sql);

    $result = ['status' => 'error', 'message' => 'La musique a été ajouté aux j\'aime', 'data' => 'dislike' ];
    
    
}
// header('Location : /index.php');

echo json_encode($result);
/* Fermeture de la connexion */
$mysqli->close();

?>

