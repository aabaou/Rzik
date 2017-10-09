<?php include __DIR__.'/assets/parts/header.php' ?>

<?php include __DIR__.'/assets/objects/table.php' ?>
<!-- HEADER FOND -->
<!-- <header id="home">
	<div class="slider_home">
	  <img src="./assets/img/slide1" alt="">
	  <img src="./assets/img/slide2" alt="">
	  <img src="./assets/img/slide3" alt="">	  
	  <img src="./assets/img/slide4" alt="">
	</div>
</header> -->

<div id="platine" class="relative">
  <video id="turntable-video" loop="" autoplay="" onclick="if (!this.paused) { this.pause(); } else { this.play(); }">
              <source src="./assets/img/platine.webm" type="video/webm">
  <!--        <source src="./assets/img/platine.mp4">
              <source src="./assets/img/platine.mov" type="video/mp4"> -->
              <img id="turntable-static-video" src="./assets/img/platinePoster.jpg" alt="" style="width:100%;max-width:1920px">
  </video>
  <?php 
  if(empty($_SESSION['connect']))
    echo '<span first_sentence="Bienvenue sur Rzik ! ^500" second_sentence="La plateforme d\'écoute " class="typed_now" typed="typed"></span>';
  else
    echo '<span first_sentence="Bonjour '.$_SESSION['username'].' ! ^500" second_sentence="Votre playlist vous attend " class="typed_now" typed="typed"></span>';
  ?>
</div>
		<!-- FIN HEADER FOND 

		<!-- BODY -->


<div class="division">

<div class="col-lg-12 col-md-12">
  <?php
    echo table::data_table(['Titres',
                        'Artiste',
                        'Music'], 'table_musics');

            $lignes = '';

  $sql = "SELECT * FROM musics WHERE 1=1";

  $result = $mysqli->query($sql);

            while($data = $result->fetch_object()) {
                // Lignes du tableau
                $lignes .= '<tr>';
                $lignes .= '<td>' . htmlspecialchars($data->titre) . '</td>' . PHP_EOL;
                $lignes .= '<td>' . htmlspecialchars($data->artiste) . '</td>' . PHP_EOL;
                $lignes .= '<td><audio controls="controls">
                    <source src="assets/upload/'.$data->file.'"  />
                  </audio></td>
                ' . PHP_EOL;
                $lignes .= '</tr>' . PHP_EOL;
            }
            echo $lignes;
  ?>
  </tbody>
  </table>

</div>



<div class="col-lg-12 col-md-12">
  <?php
    echo table::data_table(['Titres',
                        'Artiste',
                        'Music'], 'table_users');

            $lignes = '';

  $sql = "SELECT * FROM musics";

  $result = $mysqli->query($sql);

            while($data = $result->fetch_object()) {
                // Lignes du tableau
                $lignes .= '<tr>';
                $lignes .= '<td>' . htmlspecialchars($data->titre) . '</td>' . PHP_EOL;
                $lignes .= '<td>' . htmlspecialchars($data->artiste) . '</td>' . PHP_EOL;
                $lignes .= '<td><audio controls="controls">
                    <source src="assets/upload/'.$data->file.'"  />
                  </audio></td>
                ' . PHP_EOL;
                $lignes .= '</tr>' . PHP_EOL;
            }
            echo $lignes;
  ?>
  </tbody>
  </table>

</div>


</div>














		<!-- FIN BODY -->


<?php include __DIR__.'/assets/parts/footer.php' ?>

<script>
  $playlist = $('div.sm2-playlist-wrapper ul.sm2-playlist-bd');
  $playlist.load('assets/ws/playlist.php');
</script>
<script src="assets/js/player.js" type="text/javascript" charset="utf-8"></script>
<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>