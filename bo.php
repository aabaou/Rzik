<?php include 'assets/parts/Header2.php'; ?>

<?php include 'assets/parts/Sidebar.php'; ?>

<?php echo page_top::add("Admin : Liste musique","",""); ?>

    <!-- BODY -->



<div class="division">

<div class="col-lg-12 col-md-12">
  <?php
    $key = $_SESSION['key'];

    echo table::data_table(['Titres',
                        'Artiste',
                        'Music',
                        'statut',
                        'Details'], 'table_musics');

            $lignes = '';

  $sql = "SELECT * FROM musics";

  $result = $mysqli->query($sql);


            while($data = $result->fetch_object()) {

            switch ($data->status) {
              case '0':
                $statut = 'En attente';
                break;
              case '1':
                $statut = 'Validé';
                break;  
              case '2':
                $statut = 'Refusé';
                break; 
              case '3':
                $statut = 'Privé';
                break;                
              default:
                $statut = 'Error';
                break;
            }


                // Lignes du tableau
                $lignes .= '<tr>';
                $lignes .= '<td class="titre" data-titre='.htmlspecialchars($data->titre).' data-music='.cryptS($data->id, $key, random_password(10)).'>' . htmlspecialchars($data->titre) . '</td>' . PHP_EOL;
                $lignes .= '<td class="titre" data-titre='.htmlspecialchars($data->titre).' data-music='.cryptS($data->id, $key, random_password(10)).'>' . htmlspecialchars($data->artiste) . '</td>' . PHP_EOL;
                $lignes .= '<td><audio controls="controls">
                    <source src="assets/upload/'.$data->file.'"  />
                  </audio></td>
                ' . PHP_EOL;
                $lignes .= '<td class="titre" data-titre='.htmlspecialchars($data->titre).' data-music='.cryptS($data->id, $key, random_password(10)).'>' . htmlspecialchars($statut) . '</td>' . PHP_EOL;
              $lignes .= '<td onclick="location.href=\''.SRC.'details.php?q='.cryptS($data->id, $key, random_password(10)).'\'"> Détails </td>' . PHP_EOL;
                $lignes .= '</tr>' . PHP_EOL;
            }
            echo $lignes;
  ?>
  </tbody>
  </table>

</div>

</div>
</div>



</div>


<!-- Trigger the modal with a button -->
<button type="button" id="modal" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Open Modal</button>

<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Changement de statut</h4>
      </div>
      <form id="validate">
        <div class="modal-body">
          <p>Voulez-vous changez le statut de <span id="titre"></span> ?</p>
                  <div class="col-lg-12 col-md-12 center">

        <?php

            if(isset($_SESSION['connect'])){

                if (empty($option))
                  $option = '';

                if (empty($index))
                  $index = 0;

                $option = '<li class="mdl-menu__item"></li>';

                $id = $attr_name = $name = "Statut";

                $sql = "SELECT * FROM r_statut_music";

                $result = $mysqli->query($sql);

                while($data = $result->fetch_object()) {
                  $option .= '<li class="mdl-menu__item selectId"  data-value="'.cryptS($data->id, $key, random_password(10)).'">' .  Test_utf8_encode($data->statut) . '</li>';
                  $index++;
                }

                  $champs = '
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth">
                          <input class="mdl-textfield__input" type="text" id="'.$id.'" readonly tabIndex="-1">
                          <label for="'.$id.'" class="mdl-textfield__label">' . $name . '</label>
                          <ul for="'.$id.'" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                          ' . $option . '
                          </ul>
                          <input type="hidden" id="action" name="action" class="inputSelect">
                        </div>
                      ';


                echo $champs;

              }
              ?>
        </div>
        </div>
        <input id="music" name="music" type="hidden">
      </form>
      <div class="modal-footer">
        <div class="col-lg-12 col-md-12 center">
          <button id="sendSubmit" type="submit" class="hvr-horizontal blue">Soumettre</button>
        </div>
      </div>
    </div>

  </div>
</div>


				
<?php include 'assets/parts/Footer2.php'; ?>

<script>
  $('.titre').on('click', function(event) {
    $this = $(this);
    $titre = $this.data('titre');
    $music = $this.data('music');

    $('#titre').text($titre);
    $('#music').val($music);
    $('#modal').click();

    event.stopPropagation();
  });

  $obj = {music : '#music', action : '#action'};
  $path = 'assets/ws/validate.php';


  $('.selectId').click(function(event) {
    $this = $(this);
    $data = $this.data('value');
    $('.inputSelect[type="hidden"]').val($data);
  });

  $('#sendSubmit').on('click', function(event) {
      event.preventDefault();
      send.manual($obj, $path, 
        function(){
          $('#modal').click();
          setTimeout(()=>refresh(),1500);
        }
      );
  });

</script>