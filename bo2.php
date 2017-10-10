<?php include 'assets/parts/Header2.php'; ?>

<?php include 'assets/parts/Sidebar.php'; ?>

<?php echo page_top::add("Admin","",""); ?>

    <!-- BODY -->



<div class="division">




<div class="col-lg-12 col-md-12">
  <?php
  $key = $_SESSION['key'];

    echo table::data_table(['Nom',
                        'Mail',
                        'Statut'], 'table_users');

            $lignes = '';

  $sql = "SELECT * FROM users";

  $result = $mysqli->query($sql);

            while($data = $result->fetch_object()) {
              switch ($data->statut) {
                case '0':
                  $statut = 'Accepté';
                  break;
                case '1':
                  $statut = 'Banni';
                  break;             
                default:
                  $statut = 'Error';
                  break;
              }              
                // Lignes du tableau
                $lignes .= '<tr class="users" data-user='.cryptS($data->id, $key, random_password(10)).' data-username='. htmlspecialchars($data->username) .'>';
                $lignes .= '<td>' . htmlspecialchars($data->username) . '</td>' . PHP_EOL;
                $lignes .= '<td>' . htmlspecialchars($data->mail) . '</td>' . PHP_EOL;
                $lignes .= '<td>' . htmlspecialchars($statut) . '</td>' . PHP_EOL;
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
        <input id="user" name="user" type="hidden">
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
  $('.users').on('click', function(event) {
    $this = $(this);
    $user = $this.data('user');
    $username = $this.data('username');

    $('#username').text($username);
    $('#user').val($user);
    $('#modal').click();

    event.stopPropagation();
  });

  $obj = {user : '#user', action : '#action'};
  $path = 'assets/ws/usersValidate.php';

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