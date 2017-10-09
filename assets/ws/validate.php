<?php

  include __DIR__.'/../config/config.inc.php';


  $Methode = $_POST;

  $key = $_SESSION['key']; 

  $userID = $_SESSION['userID'];


  $update = new stdClass();

  
  foreach ($Methode as $cle => $value) {

      switch ($cle) {
          case 'music':
            $songID = decryptS($value, $key, random_password(10));
            $update->$cle = trim(htmlspecialchars($songID));
            break;    

          default:
            $update->$cle = trim(htmlspecialchars($value));
            break;
      }
  }


  $sql1 = "SELECT * FROM musics WHERE id = '$update->music'";

  $result = $mysqli->query($sql1);

  $res = $result->fetch_object();

  if($res->status == '0'){
    $sql2 = "UPDATE musics SET status = '1' WHERE id = '$update->music'";
    $resultSend = ['status' => 'success', 'message' => 'La musique à été validé', 'data' => ' ' ];
  }
  else{
    $sql2 = "UPDATE musics SET status = '0' WHERE id = '$update->music'";
    $resultSend = ['status' => 'success', 'message' => 'La musique à été dévalidé', 'data' => ' ' ];
  }

  $mysqli->query($sql2);

  echo json_encode($resultSend);
?>