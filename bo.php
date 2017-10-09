<?php include 'assets/parts/Header2.php'; ?>

<?php include 'assets/parts/Sidebar.php'; ?>

<?php echo page_top::add("Admin","",""); ?>

    <!-- BODY -->


<div class="division">

<div class="col-lg-12 col-md-12">
  <?php
    echo table::data_table(['Titres',
                        'Artiste',
                        'Music'], 'table_musics');

            $lignes = '';

  $sql = "SELECT * FROM musics WHERE 1=1";

  $result = $mysqli->query($sql);

            while($data = $result->fetch_object()) {
                // Lignes du tableau
                $lignes .= '<tr>';
                $lignes .= '<td>' . htmlspecialchars($data->titre) . '</td>' . PHP_EOL;
                $lignes .= '<td>' . htmlspecialchars($data->artiste) . '</td>' . PHP_EOL;
                $lignes .= '<td><audio controls="controls">
                    <source src="assets/upload/'.$data->file.'"  />
                  </audio></td>
                ' . PHP_EOL;
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
    echo table::data_table(['Titres',
                        'Artiste',
                        'Music'], 'table_users');

            $lignes = '';

  $sql = "SELECT * FROM musics";

  $result = $mysqli->query($sql);

            while($data = $result->fetch_object()) {
                // Lignes du tableau
                $lignes .= '<tr>';
                $lignes .= '<td>' . htmlspecialchars($data->titre) . '</td>' . PHP_EOL;
                $lignes .= '<td>' . htmlspecialchars($data->artiste) . '</td>' . PHP_EOL;
                $lignes .= '<td><audio controls="controls">
                    <source src="assets/upload/'.$data->file.'"  />
                  </audio><i class="fa fa-check" aria-hidden="true"></i></td>
                ' . PHP_EOL;
                $lignes .= '</tr>' . PHP_EOL;
            }
            echo $lignes;
  ?>
  </tbody>
  </table>

</div>


</div>



				
<?php include 'assets/parts/Footer2.php'; ?>

