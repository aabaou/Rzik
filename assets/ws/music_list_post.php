<?php

include '../config/config.inc.php';


$Methode = $_POST;

	$comment = isset($Methode['comment']) ? $Methode['comment'] : '' ;
    $musicIDCrypt = isset($Methode['music']) ? $Methode['music'] : '' ;

    $key = $_SESSION['key']; 
    $userID = $_SESSION['userID'];
    
    $musicID = decryptS($musicIDCrypt, $key, random_password(10));

    
    



	$sql = "INSERT INTO comments(comment, Users_id, Musics_id ) VALUES('$comment', '$userID', '$musicID');";


	$mysqli->query($sql);

    error_log($sql);
    
	$result = ['status' => 'success', 'message' => 'Votre commentaire a bien été ajouté', 'data' => 'data' ];


echo json_encode($result);

?>