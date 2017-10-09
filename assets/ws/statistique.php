<?php

include '../config/config.inc.php';

function statistique_nbr_ecoutes($id_musique) {
  $sql = "SELECT COUNT(playlist) FROM musics WHERE playlist <> 0";
  $result = $mysqli->query($sql);

  $res = $result->fetch_object();
}

function statistique_top_5 () {

}