<?php

  include __DIR__.'/../config/config.inc.php';


  $Methode = $_POST;

  $key = $_SESSION['key']; 

  $userID = $_SESSION['userID'];


  $update = new stdClass();

  
  foreach ($Methode as $cle => $value) {

    error_log('__'.$value);
      switch ($cle) {
          case 'music':
            $songID = decryptS($value, $key, random_password(10));
            $update->$cle = trim(htmlspecialchars($songID));
            break;    

          case 'action':
            $action = decryptS($value, $key, random_password(10));
            $update->$cle = trim(htmlspecialchars($action));
            break;  

          default:
            $update->$cle = trim(htmlspecialchars($value));
            break;
      }
  }


  $sql1 = "SELECT * FROM musics WHERE id = '$update->music'";

  $result = $mysqli->query($sql1);

  $res = $result->fetch_object();


  $sql2 = "UPDATE musics SET status = '$update->action' WHERE id = '$update->music'";
  $resultSend = ['status' => 'success', 'message' => 'Le statut a été modifié', 'data' => ' ' ];


  $mysqli->query($sql2);

  echo json_encode($resultSend);
?>