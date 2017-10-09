<?php

  include '../config/config.inc.php';


  if (empty($index))
    $index = 0;


  $champs = '<ul class="list">';

  $userID = $_SESSION['userID'];
  $key = $_SESSION['key']; 

  $sql = "SELECT * FROM musics WHERE Users_id='$userID' ";

  $result = $mysqli->query($sql);



  while($data = $result->fetch_object()) {

    $id = cryptS($data->id, $key, '0123456789');
    
    $champs .= '
          
            <li>
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
            </li>    
    ';

    // $index++;
    // if($index == 8)
    //   break;
  }

  $champs .= "</ul>";



      $select = '';

      $option = '<li class="mdl-menu__item"></li>';


      $sql2 = "SELECT DISTINCT genres FROM musics WHERE Users_id='$userID' ";
      error_log($sql2);
      $result2 = $mysqli->query($sql2);

      while($data2 = $result2->fetch_object()) {
        $option .= '<li class="mdl-menu__item">' .  $data2->genres . '</li>';
        $index++;
      }

        $select = '
          <h2>Playlist</h2><hr/>
            <div class="col-lg-6 col-md-6 ">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                <input class="mdl-textfield__input" onchange="filter.song(this)" type="text" id="selectSong" readonly tabIndex="-1">
                <label for="selectSong" class="mdl-textfield__label">Genres</label>
                <ul for="selectSong" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                ' . $option . '
                </ul>
              </div>
              </div>
              <div class="col-lg-6 col-md-6 ">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input search" name="search" type="search" id="search">
                  <label class="mdl-textfield__label" for="search">Titre...</label>
                </div>
              </div>
            ';






  echo $select.$champs;
?>