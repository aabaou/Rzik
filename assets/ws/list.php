<?php

  include '../config/config.inc.php';


  if (empty($index))
    $index = 0;


  $champs = '';

  $sql = "SELECT * FROM musics";

  $result = $mysqli->query($sql);

  while($data = $result->fetch_object()) {

    $champs .= '
              <div class="col-md-3 piste" source ="assets/upload/'.$data->file.'" titre="'.$data->titre.'">
                  <img src="assets/upload/'.$data->cover.'" alt="">
              </div>      
    ';

    $index++;
    if($index == 8)
      break;
  }




  echo $champs;
?>