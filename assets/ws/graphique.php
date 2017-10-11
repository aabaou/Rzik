<?php

  include __DIR__.'/../config/config.inc.php';


  $Methode = $_POST;

  $key = $_SESSION['key']; 

  $userID = $_SESSION['userID'];


  $update = new stdClass();
  $buffer = new stdClass();

  
  foreach ($Methode as $cle => $value) {

      switch ($cle) {
          case 'c1':
            $update->$cle = trim(htmlspecialchars($value));
            break;    

          case 'c2':
            $update->$cle = trim(htmlspecialchars($value));
            break;          

          case 'getRef':
            $url = decryptS($value, $key, random_password(10));
            $update->$cle = trim(htmlspecialchars($url));
            break;  

          default:
            // $update->$cle = trim(htmlspecialchars($value));
            break;
      }
  }

  if( isset($update->c1) ){

    $sql1 = "SELECT Musics_id, COUNT(comment) AS Comments, DATE(date) AS Jour FROM `comments` WHERE Musics_id = '$update->getRef' GROUP BY Jour";

    $result = $mysqli->query($sql1);

    $buffer->label = []; 
    $buffer->donnee = []; 
    $i = 1;

    while($data = $result->fetch_object()) {

      array_push($buffer->label, date_YMD_WithoutRest($data->Jour));
      array_push($buffer->donnee, $data->Comments);

    }

    $resultSend = ['status' => 'success', 'message' => '', 'data' => $buffer ];

    
  }

  if( isset($update->c2) ) {
    $sql2 = "SELECT music_id, COUNT(music_id) AS Compte, DATE(date) AS Jour FROM likes WHERE music_id = '$update->getRef' GROUP BY Jour";

    $result = $mysqli->query($sql2);

    $buffer->label = []; 
    $buffer->donnee = []; 
    $i = 1;

    while($data = $result->fetch_object()) {

      array_push($buffer->label, date_YMD_WithoutRest($data->Jour));
      array_push($buffer->donnee, $data->Compte);

    }

    $resultSend = ['status' => 'success', 'message' => '', 'data' => $buffer ];



  }



  


  echo json_encode($resultSend);
?>