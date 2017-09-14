<?php include __DIR__.'/assets/parts/header.php' ?>




	<div id="ajoutMusic" class="center">
	<div class="form">
	    <form>

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
	              <!-- <input type="hidden" value="<?php echo cryptS($data, $clef, $salt) ?>"> -->

	              <button type="submit" class="hvr-horizontal blue">Soumettre</button>
	            
		</form>
		</div>
	</div>





		<!-- FIN BODY -->


<?php include __DIR__.'/assets/parts/footer.php' ?>

<script>
function res_ajax($data){
	if(!!$data)
		setTimeout(()=>$(location).attr('href','index.php'), 2000);

}

	$( "form#inscriptionForm" ).on( "submit", function( event ) {
      event.preventDefault();
      $path = 'assets/ws/inscription.php';
      send.form(this, $path, res_ajax);
    });

typed.now();

</script>
<script src="assets/js/player.js" type="text/javascript" charset="utf-8"></script>
<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/js/soundmanagerv2/soundmanagerv2.js"