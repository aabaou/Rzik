<?php include 'assets/parts/Header2.php'; ?>

<?php include 'assets/parts/Sidebar.php'; ?>

<?php echo page_top::add("Admin","",""); ?>

    <!-- BODY -->



<div class="division">

<div class="col-lg-12 col-md-12">
  <?php
    $key = $_SESSION['key'];

    echo table::data_table(['Titres',
                        'Artiste',
                        'Music',
                        'statut'], 'table_musics');

            $lignes = '';

  $sql = "SELECT * FROM musics WHERE 1=1";

  $result = $mysqli->query($sql);


            while($data = $result->fetch_object()) {

            switch ($data->status) {
              case '0':
                $statut = 'Non validé';
                break;
              case '1':
                $statut = 'Validé';
                break;              
              default:
                $statut = 'Error';
                break;
            }


                // Lignes du tableau
                $lignes .= '<tr class="titre" data-titre='.htmlspecialchars($data->titre).' data-music='.cryptS($data->id, $key, random_password(10)).'>';
                $lignes .= '<td>' . htmlspecialchars($data->titre) . '</td>' . PHP_EOL;
                $lignes .= '<td>' . htmlspecialchars($data->artiste) . '</td>' . PHP_EOL;
                $lignes .= '<td><audio controls="controls">
                    <source src="assets/upload/'.$data->file.'"  />
                  </audio></td>
                ' . PHP_EOL;
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

<div class="col-lg-12 col-md-12">
  <?php
    echo table::data_table(['Nom',
                        'Mail',
                        'Roles'], 'table_users');

            $lignes = '';

  $sql = "SELECT * FROM users";

  $result = $mysqli->query($sql);

            while($data = $result->fetch_object()) {
              switch ($data->r_roles_id) {
                case '0':
                  $roles = 'Non validé';
                  break;
                case '1':
                  $roles = 'Utilisateur';
                  break;  
                case '2':
                  $roles = 'Invalidé';
                  break;              
                default:
                  $roles = 'Error';
                  break;
              }              
                // Lignes du tableau
                $lignes .= '<tr>';
                $lignes .= '<td>' . htmlspecialchars($data->username) . '</td>' . PHP_EOL;
                $lignes .= '<td>' . htmlspecialchars($data->mail) . '</td>' . PHP_EOL;
                $lignes .= '<td>' . htmlspecialchars($roles) . '</td>' . PHP_EOL;
                $lignes .= '</tr>' . PHP_EOL;
            }
            echo $lignes;
  ?>
  </tbody>
  </table>

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
        <h4 class="modal-title">Validation</h4>
      </div>
      <form id="validate">
        <div class="modal-body">
          <p>Voulez-vous validez <span id="titre"></span> ?</p>
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
  $('tr.titre').on('click', function(event) {
    $this = $(this);
    $titre = $this.data('titre');
    $music = $this.data('music');

    $('#titre').text($titre);
    $('#music').val($music);
    $('#modal').click();

    event.stopPropagation();
  });

  $obj = {music : '#music'};
  $path = 'assets/ws/validate.php';

  $('#sendSubmit').on('click', function(event) {
      event.preventDefault();
      send.manual($obj, $path, 
        function(){
          $('#modal').click();
          console.log("message");
        }
      );
  });

</script>