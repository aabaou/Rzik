<?php

  include '../config/config.inc.php';


  if (empty($index))
    $index = 0;


  $champs = '';

  $sql = "SELECT * FROM musics";

  $result = $mysqli->query($sql);

  while($data = $result->fetch_object()) {

    $champs .= '
              <div class="col-md-3 piste" onclick="playlist.add(this)" source ="assets/upload/'.$data->file.'" titre="'.$data->titre.'">
                  <div class="song" style="background-image: url(assets/upload/'.$data->cover.')";">
                    
                  </div>
              </div>      
    ';

    $index++;
    if($index == 8)
      break;
  }




  echo $champs;
?>