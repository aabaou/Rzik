<?php include 'assets/parts/Header2.php'; ?>

<?php include 'assets/parts/Sidebar.php'; ?>

<?php echo page_top::add("Détails de la musique","",""); ?>

    <!-- BODY -->


    <input type="hidden" id="url" value="<?php echo $_GET['q'] ?>">

    <div class="division">

      <div class="col-lg-12 col-md-12">

        <div class="col-lg-6 col-md-6">
          <div id="graph">
            <div class='wrapper'>
              <div class='chart' id='p1'>
                <canvas id='c1' value="1"></canvas>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-6">
          <div id="graph">
            <div class='wrapper'>
              <div class='chart' id='p2'>
                <canvas id='c2' value="2"></canvas>
              </div>
            </div>
          </div>
        </div>

      </div>


    </div>

    <div class="division">
      <div class="col-lg-12 col-md-12">
        <?php
          $key = $_SESSION['key'];

          echo table::data_table(['Commentaire',
                              'Utilisateur',
                              'Date de création'], 'table_musics');

                  $lignes = '';

                  $sql = "SELECT comment, DATE(date) AS Jour, Users_id, username FROM comments 
                  INNER JOIN users ON users.id = comments.Users_id 
                  WHERE Musics_id = ".decryptS($_GET['q'], $key, random_password(10));

                  $result = $mysqli->query($sql);


                  while($data = $result->fetch_object()) {

                      // Lignes du tableau
                      $lignes .= '<tr class="comments">';
                      $lignes .= '<td>' . htmlspecialchars($data->comment) . '</td>' . PHP_EOL;
                      $lignes .= '<td>' . htmlspecialchars($data->username) . '</td>' . PHP_EOL;
                      $lignes .= '<td>' . date_YMD_WithoutRest($data->Jour) . '</td>' . PHP_EOL;
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


     <!-- Script -->
    <script charset="utf-8">

      $(document).ready(function(){

          $obj1 = {c1 : '#c1', getRef : '#url'};
          $obj2 = {c2 : '#c2', getRef : '#url'};

          $path = 'assets/ws/graphique.php';

          send.manual($obj1, $path, ($data)=>{

          chart.graphique($data.label, $data.donnee,  1);

        });

        send.manual($obj2, $path, ($data)=>{
          chart.graphique($data.label, $data.donnee,  2);
        });

      });

    </script>       
    
<?php include 'assets/parts/Footer2.php'; ?>