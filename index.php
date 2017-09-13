<?php include __DIR__.'/assets/parts/header.php' ?>



<!-- HEADER FOND -->
<header id="home">
	<div class="slider_home">
	  <img src="./assets/img/slide1" alt="">
	  <img src="./assets/img/slide2" alt="">
	  <img src="./assets/img/slide3" alt="">	  
	  <img src="./assets/img/slide4" alt="">
	</div>
</header>

		<!-- FIN HEADER FOND 

		<!-- BODY -->


	<div id="top" class="container">
		<div id="listSong" class="division">
  
      
		</div>
    
    
    <?php 
      if(isset($_SESSION['connect']))
        echo '<a href="#" id="addSon" class="btn" data-action="open" data-side="right"><span><i class="fa fa-plus-square-o" aria-hidden="true"></i> Ajoutez votre Musique !</span></a>';
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
            ?>

            </div>
            <div class="col-lg-6 col-md-6 ">
              <label for="cover">Cover : </label>
              <input id="cover" name="cover" type="file"/>
            </div>
            <div class="col-lg-6 col-md-6 ">
              <label for="music">Musique : </label>
              <input id="music" name="music" type="file"/>
            </div>
            
            <div class="col-lg-12 col-md-12 ">
              <button type="submit" class="hvr-horizontal blue">Soumettre</button>
            </div>
            
</form>


            </div>
        </div>

<script>


  var obj = {cover: 'cover', music: 'music'};
  $path = "assets/ws/upload.php";

  function res_ajax($data){
    file.target(obj, $path);

    $('#close').click()
    $('form#ajoutMusic *').val('');
    $('.close.fileinput-remove').click();
    setTimeout(()=>$('#listSong').load('assets/ws/list.php'), 2500);

  }


  $( "form#ajoutMusic" ).on( "submit", function( event ) {
      event.preventDefault();
      send.form(this, $path, res_ajax);
    });

  $('#listSong').load('assets/ws/list.php');

</script>


<br/>
<br/>
<br/>
<br/>














		<!-- FIN BODY -->


<?php include __DIR__.'/assets/parts/footer.php' ?>

<script>
  $playlist = $('div.sm2-playlist-wrapper ul.sm2-playlist-bd');
  $playlist.load('assets/ws/playlist.php');
</script>
<script src="assets/js/player.js" type="text/javascript" charset="utf-8"></script>
<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/js/soundmanagerv2/soundmanagerv2.js"