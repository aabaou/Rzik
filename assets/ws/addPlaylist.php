<?php

  include __DIR__.'/../config/config.inc.php';


  $Methode = $_POST;

  $key = $_SESSION['key']; 

  $song = htmlspecialchars($mysqli->real_escape_string($Methode['song'] ));

  $songID = decryptS($song, $key, random_password(10));
  $userID = $_SESSION['userID'];

  $sql = "SELECT * FROM musics WHERE id='$songID' AND Users_id='$userID' AND playlist = '1' ";

  $result = $mysqli->query($sql);

  // Si la playlist est déjà présente
  if($result->num_rows == 0)
  {
    $sql = "UPDATE musics SET playlist = '1' WHERE id='$songID' AND Users_id='$userID' ";
    $mysqli->query($sql);
    echo "1";

  }
  else{
    $sql = "UPDATE musics SET playlist = '0' WHERE id='$songID' AND Users_id='$userID' ";
    $mysqli->query($sql);
    echo "0";
  }

  $result = $mysqli->query($sql);

?>