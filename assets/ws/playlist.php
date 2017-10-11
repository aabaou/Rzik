<?php

  include __DIR__.'/../config/config.inc.php';

  

  if(isset($_SESSION['userID']) && isset($_SESSION['key'])){
    $userID = $_SESSION['userID'];
    $key = $_SESSION['key']; 
  

    $sql = "SELECT * FROM musics WHERE Users_id='$userID' AND playlist = '1' ";

    $result = $mysqli->query($sql);

    $champs = '';

    
    while($data = $result->fetch_object()) {

      $id = cryptS($data->id, $key, random_password(10));

      $champs .= "
               <li id='$id'><a href='assets/upload/{$data->file}'>$data->titre</a><span onclick='playlist.remove(this)'>x</span></li>   
      ";
    }

    echo $champs;

  }
?>