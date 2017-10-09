<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <link rel="stylesheet" href="">


    <script src="assets/js/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
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

              $champs = '
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                      <input class="mdl-textfield__input" type="text" id="top" name="yop" readonly tabIndex="-1">
                      <label for="top" class="mdl-textfield__label">Test</label>
                      <ul for="top" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                      <li class="mdl-menu__item">FSFD</li>
                      <li class="mdl-menu__item">TR</li>
                      <li class="mdl-menu__item">FSTRFD</li>
                      <li class="mdl-menu__item">FSDFFD</li>  
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
<script src="assets/js/tools.js" type="text/javascript" charset="utf-8"></script>
<script>
  
$(document).ready(function () {
  getmdlSelect.init(".getmdl-select");
});

</script>
</body>
</html>