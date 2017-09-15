<?php
//Load the database configuration file
include '../../assets/config/config.inc.php';

//Convert JSON data into PHP variable
$userData = json_decode($_POST['userData']);
var_dump($userData);
if(!empty($userData)){
  //Check whether user data already exists in database
  $prevQuery = "SELECT * FROM users WHERE mail = '".$userData->email."'";
echo 'OK';
  $prevResult = $mysqli->query($prevQuery);
  if($prevResult->num_rows > 0){
    //Update user data if already exists
    $query = "UPDATE users SET username = '".$userData->first_name.".".$userData->last_name."' WHERE mail = '".$userData->email."'";
    $update = $mysqli->query($query);
  }else{
    //Insert user data
    $query = "INSERT INTO users (username, mail) VALUES ('$userData->first_name.$userData->last_name','$userData->email')";
    error_log($query);
    $insert = $mysqli->query($query);
  }
  $_SESSION['connect'] = true;
  $_SESSION['username'] = $userData->first_name.$userData->last_name;
}
?>