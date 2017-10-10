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