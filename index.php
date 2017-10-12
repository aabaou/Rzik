<?php include __DIR__.'/assets/parts/header.php' ?>



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
  <!--             <source src="./assets/img/platine.mp4">
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

  <div class="container">
    <div class="division">
      <h2>WebRadio</h2>
      <hr>
      <audio id="webradio" controls>
        <source src="http://192.168.100.144:8000/ice.ogg" type="audio/ogg">
      </audio>
    </div>
  </div>

<div class="relative">
  <h1 class="container">TOP 10</h1>
  <div class="relative">
    <section class="center slider">
    <?php
    $top10 = statistique_top_10();
    while($res = $top10->fetch_object()){
      //print('<div><h3>'.$res->titre.'</h3><img src="assets/upload/'.$res->cover.'"></div>');
      print('<div onclick="playlist.addRemove(this)" song="'.$res->music_id.'" source ="assets/upload/'.$res->file.'" titre="'.$res->titre.'">
        <h3>'.$res->titre.'</h3>
        <img src="assets/upload/'.$res->cover.'">
      </div>');
    }
    ?>
    </section>
  </div>
</div>
	<div id="searchSong" class="container">
<?php 

  if(isset($_SESSION['connect'])){
		
    echo '<div id="listSong" class="division">
  
      
		</div>';
  }
    
?>    
    <?php 
      if(isset($_SESSION['connect']))
        echo '<a href="#" id="addSon" class="btn" data-action="open" data-side="right"><span><i class="fa fa-plus-square-o" aria-hidden="true"></i> '.$dico['add_music'].' !</span></a>';
    ?>

	</div>



  <div class="sidebars">
      <div class="sidebar right">
        <a href="#" id="close" class="btn" data-action="close" data-side="right"><span><i class="fa fa-times" aria-hidden="true"></i></span></a>

    <form id="ajoutMusic">

      <div class="col-lg-6 col-md-6 ">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" name="titre" type="titre" id="titre">
              <label class="mdl-textfield__label" for="titre">Titre...</label>
            </div>
      </div>

      <div class="col-lg-6 col-md-6 ">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" name="artiste" type="artiste" id="artiste">
              <label class="mdl-textfield__label" for="artiste">Artiste...</label>
            </div>
      </div>


      <div class="col-lg-6 col-md-6 ">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" name="compositeur" type="compositeur" id="compositeur">
              <label class="mdl-textfield__label" for="compositeur">Compositeur...</label>
            </div>
      </div>

      <div class="col-lg-6 col-md-6 ">

        <?php

            if(isset($_SESSION['connect'])){

                if (empty($option))
                  $option = '';

                if (empty($index))
                  $index = 0;

                $option = '<li class="mdl-menu__item"></li>';

                $id = $attr_name = $name = "genre";

                $sql = "SELECT * FROM r_genres";

                $result = $mysqli->query($sql);

                while($data = $result->fetch_object()) {
                  $option .= '<li class="mdl-menu__item">' .  $data->genre . '</li>';
                  $index++;
                }

                  $champs = '
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                          <input class="mdl-textfield__input" type="text" id="'.$id.'" name=' . $attr_name . ' readonly tabIndex="-1">
                          <label for="'.$id.'" class="mdl-textfield__label">' . $name . '</label>
                          <ul for="'.$id.'" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                          ' . $option . '
                          </ul>
                        </div>
                      ';


                echo $champs;

              }
              ?>

            </div>

            <div class="col-lg-6 col-md-6 ">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                <input class="mdl-textfield__input" type="text" id="visible" readonly tabIndex="-1">
                <label for="visible" class="mdl-textfield__label">Visibilité</label>
                <ul for="visible" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                  <li class="mdl-menu__item"></li>
                  <li class="mdl-menu__item selectId"  data-value="0">Public</li>
                  <li class="mdl-menu__item selectId"  data-value="3">Privé</li>
                </ul>
                <input type="hidden" id="visible" name="visible" class="inputSelect">
              </div>
            </div>

            <div class="col-lg-6 col-md-6 ">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" name="description" type="description" id="description">
                    <label class="mdl-textfield__label" for="description">Description...</label>
                  </div>
            </div>      

            <div class="col-lg-6 col-md-6 ">
              <label for="cover">Cover : </label>
              <input id="cover" name="cover" type="file"/>
            </div>
            <div class="col-lg-6 col-md-6 ">
              <label for="music">Musique : </label>
              <input id="music" name="music" type="file"/>
            </div>
            
            <div class="col-lg-12 col-md-12 center">
              <button type="submit" class="hvr-horizontal blue">Soumettre</button>
            </div>
            
    </form>


            </div>
        </div>


<script>

  function refresh(){
      $('#listSong').load('assets/ws/list.php', function(){
          var options = {
          valueNames: [ 'titre', 'artiste' ]
        };

        var userList = new List('searchSong', options);

        getmdlSelect.init(".getmdl-select");
        
      });
      
  }


$(document).ready(function() {

  $(".center").slick({
    dots: true,
    infinite: true,
    centerMode: true,
    slidesToShow: 5,
    slidesToScroll: 3
  });
  obj = {cover: 'cover', music: 'music'};
  $path = "assets/ws/upload.php";

  function res_ajax($data){
    file.target(obj, $path);

    $('#close').click()
    $('form#ajoutMusic *').val('');
    $('.close.fileinput-remove').click();
    setTimeout(refresh(), 2500);

  }


  $( "form#ajoutMusic" ).on( "submit", function( event ) {
      event.preventDefault();
      send.form(this, $path, res_ajax);
    });

  $('#listSong').load('assets/ws/list.php', function(){
      var options = {
      valueNames: [ 'titre' ]
    };

    var userList = new List('searchSong', options);
  });

  typed.now();

});

</script>


<input type='hidden' name='lang' id='lang' value="<?php echo($_SESSION['lang']); ?>"/>


		<!-- FIN BODY -->


<?php include __DIR__.'/assets/parts/footer.php' ?>

<script>
  $playlist = $('div.sm2-playlist-wrapper ul.sm2-playlist-bd');
  $playlist.load('assets/ws/playlist.php');
</script>
<script src="assets/js/player.js" type="text/javascript" charset="utf-8"></script>
<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
<style type="text/css">
  .slider {
    width: 50%;
    margin: 100px auto;
  }

  .slick-slide {
    margin: 0px 20px;
  }

  .slick-slide img {
    width: 100%;
  }




  .slick-slide {
    transition: all ease-in-out .3s;
    opacity: .2;
  }

  .slick-active {
    opacity: .5;
  }

  .slick-current {
    opacity: 1;
  }
</style>