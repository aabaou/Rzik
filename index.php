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

    <!-- Music part à retirer -->
    <?php include __DIR__.'/music.php' ?>
    <!-- fin part -->


	<div id="top" class="container">
		<div id="listSong" class="division">
  
      
		</div>
    
    
    <a href="#" id="addSon" class="btn" data-action="open" data-side="right"><span><i class="fa fa-plus-square-o" aria-hidden="true"></i> Ajoutez votre Musique !</span></a>

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
    $('#listSong').load('assets/ws/list.php')
  }


  $( "form#ajoutMusic" ).on( "submit", function( event ) {
      event.preventDefault();
      send.form(this, $path, res_ajax);
    });

  $('#listSong').load('assets/ws/list.php')
  

</script>

<p>test</p>
<p>test</p>
<p>test</p>
<p>test</p>
<p>test</p>
<p>test</p>
<p>test</p>
<p>test</p>
<p>test</p>
<p>test</p>
<p>test</p>


<div class="sm2-bar-ui full-width fixed">

 <div class="bd sm2-main-controls">

  <div class="sm2-inline-texture"></div>
  <div class="sm2-inline-gradient"></div>

  <div class="sm2-inline-element sm2-button-element">
   <div class="sm2-button-bd">
    <a href="#play" class="sm2-inline-button sm2-icon-play-pause">Play / pause</a>
   </div>
  </div>

  <div class="sm2-inline-element sm2-inline-status">

   <div class="sm2-playlist">
    <div class="sm2-playlist-target">
     <!-- playlist <ul> + <li> markup will be injected here -->
     <!-- if you want default / non-JS content, you can put that here. -->
     <noscript><p>JavaScript is required.</p></noscript>
    </div>
   </div>

   <div class="sm2-progress">
    <div class="sm2-row">
    <div class="sm2-inline-time">0:00</div>
     <div class="sm2-progress-bd">
      <div class="sm2-progress-track">
       <div class="sm2-progress-bar"></div>
       <div class="sm2-progress-ball"><div class="icon-overlay"></div></div>
      </div>
     </div>
     <div class="sm2-inline-duration">0:00</div>
    </div>
   </div>

  </div>

  <div class="sm2-inline-element sm2-button-element sm2-volume">
   <div class="sm2-button-bd">
    <span class="sm2-inline-button sm2-volume-control volume-shade"></span>
    <a href="#volume" class="sm2-inline-button sm2-volume-control">volume</a>
   </div>
  </div>

  <div class="sm2-inline-element sm2-button-element">
   <div class="sm2-button-bd">
    <a href="#prev" title="Previous" class="sm2-inline-button sm2-icon-previous">&lt; previous</a>
   </div>
  </div>

  <div class="sm2-inline-element sm2-button-element">
   <div class="sm2-button-bd">
    <a href="#next" title="Next" class="sm2-inline-button sm2-icon-next">&gt; next</a>
   </div>
  </div>

  <div class="sm2-inline-element sm2-button-element">
   <div class="sm2-button-bd">
    <a href="#repeat" title="Repeat playlist" class="sm2-inline-button sm2-icon-repeat">&infin; repeat</a>
   </div>
  </div>

  <!-- not implemented -->
  <!--
  <div class="sm2-inline-element sm2-button-element disabled">
   <div class="sm2-button-bd">
    <a href="#shuffle" title="Shuffle" class="sm2-inline-button sm2-icon-shuffle">shuffle</a>
   </div>
  </div>
  -->

  <div class="sm2-inline-element sm2-button-element sm2-menu">
   <div class="sm2-button-bd">
    <a href="#menu" class="sm2-inline-button sm2-icon-menu">menu</a>
   </div>
  </div>

 </div>

 <div class="bd sm2-playlist-drawer sm2-element">

  <div class="sm2-inline-texture">
   <div class="sm2-box-shadow"></div>
  </div>

  <!-- playlist content is mirrored here -->

  <div class="sm2-playlist-wrapper">

    <ul class="sm2-playlist-bd">

     <!-- item with "download" link -->
     <li>
      <div class="sm2-row">
       <div class="sm2-col sm2-wide">
        <a href="http://freshly-ground.com/data/audio/sm2/SonReal%20-%20LA%20%28Prod%20Chin%20Injetti%29.mp3"><b>SonReal</b> - LA<span class="label">Explicit</span></a>
       </div>
       <div class="sm2-col">
        <a href="http://freshly-ground.com/data/audio/sm2/SonReal%20-%20LA%20%28Prod%20Chin%20Injetti%29.mp3" target="_blank" title="Download &quot;LA&quot;" class="sm2-icon sm2-music sm2-exclude">Download this track</a>
       </div>
      </div>
     </li>

     <!-- standard one-line items -->
     <li><a href="http://freshly-ground.com/data/audio/sm2/SonReal%20-%20Let%20Me%20%28Prod%202oolman%29.mp3"><b>SonReal</b> - Let Me <span class="label">Explicit</span></a></li>
     <li><a href="http://freshly-ground.com/data/audio/sm2/SonReal%20-%20People%20Asking.mp3"><b>SonReal</b> - People Asking <span class="label">Explicit</span></a></li>
     <li><a href="http://freshly-ground.com/data/audio/sm2/SonReal%20-%20Already%20There%20Remix%20ft.%20Rich%20Kidd%2C%20Saukrates.mp3"><b>SonReal</b> - Already There Remix ft. Rich Kidd, Saukrates <span class="label">Explicit</span></a></li>
     <li><a href="http://freshly-ground.com/data/audio/sm2/The%20Fugitives%20-%20Graffiti%20Sex.mp3"><b>The Fugitives</b> - Graffiti Sex</a></li>
     <li><a href="http://freshly-ground.com/data/audio/sm2/Adrian%20Glynn%20-%20Seven%20Or%20Eight%20Days.mp3"><b>Adrian Glynn</b> - Seven Or Eight Days</a></li>
     <li><a href="http://freshly-ground.com/data/audio/sm2/SonReal%20-%20I%20Tried.mp3"><b>SonReal</b> - I Tried</a></li>
     <li><a href="http://freshly-ground.com/data/audio/mpc/20060826%20-%20Armstrong.mp3">Armstrong Beat</a></li>
     <li><a href="http://freshly-ground.com/data/audio/mpc/20090119%20-%20Untitled%20Groove.mp3">Untitled Groove</a></li>
     <li><a href="http://freshly-ground.com/data/audio/sm2/birds-in-kauai-128kbps-aac-lc.mp4">Birds In Kaua'i (AAC)</a></li>
     <li><a href="http://freshly-ground.com/data/audio/sm2/20130320%20-%20Po%27ipu%20Beach%20Waves.ogg">Po'ipu Beach Waves (OGG)</a></li>
     <li><a href="http://freshly-ground.com/data/audio/sm2/bottle-pop.wav">A corked beer bottle (WAV)</a></li>
     <li><a href="file:///C:/Users/Famille/Downloads/DRIFTERSOp.mp3">Rain</a></li>

    </ul>

  </div>

 </div>

</div>











		<!-- FIN BODY -->


<?php include __DIR__.'/assets/parts/footer.php' ?>

<script src="assets/js/player.js" type="text/javascript" charset="utf-8"></script>
<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/js/soundmanagerv2/soundmanagerv2.js"