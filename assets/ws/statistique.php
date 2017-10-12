<?php

//include '../config/config.inc.php';

function statistique_nbr_ecoutes($id_musique) {
  global $mysqli;
  $sql = "SELECT COUNT(playlist) FROM musics WHERE playlist <> 0";
  $result = $mysqli->query($sql);

  $res = $result->fetch_object();
}

function statistique_top_10() {
  global $mysqli;
  $sql = "SELECT COUNT(music_id) AS TOP, music_id, titre, cover, file  FROM `likes`
          INNER JOIN musics ON musics.id = likes.music_id WHERE musics.status = 1
          GROUP BY music_id ORDER BY TOP LIMIT 10";
  error_log('_____________'.$sql);
  $result = $mysqli->query($sql);
  // $res = $result->fetch_object();
  return $result;
}

function statistique_nbr_comment($id_musique) {
  global $mysqli;
  $sql = "SELECT COUNT(id) FROM `comments` WHERE Musics_id = ".$id_musique;
  $result = $mysqli->query($sql);
  return $result;
}

function statistique_nbr_like($id_musique) {
  global $mysqli;
  $sql = "SELECT COUNT(music_id) FROM `likes` WHERE music_id =".$id_musique;
  $result = $mysqli->query($sql);
  return $result;
}