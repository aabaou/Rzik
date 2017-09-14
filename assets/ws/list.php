<?php

  include '../config/config.inc.php';


  if (empty($index))
    $index = 0;


  $champs = '';

  $userID = $_SESSION['userID'];
  $key = $_SESSION['key']; 

  $sql = "SELECT * FROM musics WHERE Users_id='$userID' ";

  $result = $mysqli->query($sql);



  while($data = $result->fetch_object()) {

    $id = cryptS($data->id, $key, '0123456789');
    
    $champs .= '
              <div class="col-md-3 piste" genre="'.$data->genres.'">
              <span onclick="playlist.addRemove(this)" song="'.$id.'" source ="assets/upload/'.$data->file.'" titre="'.$data->titre.'">
                  <div class="song" style="background-image: url(assets/upload/'.$data->cover.')";">
                    
                  </div>
              </span>
              <a href="music.php?q='.$id.'">
                  <p class="titre">'.$data->titre.'</p>
                  <p class="artiste">'.$data->artiste.'</p>
              </a>
              </div>      
    ';

    // $index++;
    // if($index == 8)
    //   break;
  }


  echo $champs;
?>