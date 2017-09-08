<?php include __DIR__.'/assets/parts/header.php' ?>




	<div id="page_inscription" class="center">
		<div class="form">
			<form id="inscriptionForm">
				<h2 class="jump center title">
					<span first_sentence='Vous &ecirc;tes membre ? ^500' second_sentence='Connectez-vous ! ' class="typed_now" typed='typed'></span>
				</h2>
				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				    <input class="mdl-textfield__input" name="login" type="login" id="login" required>
				    <label class="mdl-textfield__label" for="login">login...</label>
				  </div>
				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				    <input class="mdl-textfield__input" name="email" type="email" id="email" required>
				    <label class="mdl-textfield__label" for="email">Email...</label>
				  </div>
				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				    <input class="mdl-textfield__input" name="password" type="password" id="password" required>
				    <label class="mdl-textfield__label" for="password">Password...</label>
				  </div>
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