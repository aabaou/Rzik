<?php

  include __DIR__.'/../config/config.inc.php';


  $Methode = $_POST;

  $key = $_SESSION['key']; 

  $userID = $_SESSION['userID'];


  $update = new stdClass();

  
  foreach ($Methode as $cle => $value) {

      switch ($cle) {
          case 'commentID':
            $commentID = decryptS($value, $key, random_password(10));
            error_log($commentID);
            $update->$cle = trim(htmlspecialchars($commentID));
            break;  

          default:
            $update->$cle = trim(htmlspecialchars($value));
            break;
      }
  }



  $sql = "DELETE FROM comments WHERE id = '$update->commentID'";

  error_log($sql);
  $result = $mysqli->query($sql);

  $resultSend = ['status' => 'success', 'message' => 'Le commentaire à été supprimé', 'data' => ' ' ];



  echo json_encode($resultSend);
?>