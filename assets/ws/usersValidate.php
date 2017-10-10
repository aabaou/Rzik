<?php

  include __DIR__.'/../config/config.inc.php';


  $Methode = $_POST;

  $key = $_SESSION['key']; 

  $userID = $_SESSION['userID'];


  $update = new stdClass();

  
  foreach ($Methode as $cle => $value) {

    
      switch ($cle) {
          case 'user':
            $userID = decryptS($value, $key, random_password(10));
            $update->$cle = trim(htmlspecialchars($userID));
            error_log('__'.$userID);
            break;    

          case 'action':
            $action = decryptS($value, $key, random_password(10));
            $update->$cle = trim(htmlspecialchars($action));
            error_log('__'.$userID);
            break;  

          default:
            // $update->$cle = trim(htmlspecialchars($value));
            break;
      }
  }



  $sql2 = "UPDATE users SET statut = '$update->action' WHERE id = '$update->user'";
  $resultSend = ['status' => 'success', 'message' => 'Le statut a été modifié', 'data' => ' ' ];


  $mysqli->query($sql2);

  echo json_encode($resultSend);
?>