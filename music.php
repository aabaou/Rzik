<?php include __DIR__.'/assets/parts/header.php' ?>
<?php 

$idCrypt = $_GET["q"];
$key = $_SESSION['key'];
$idMusic = decryptS($idCrypt, $key, random_password(10));

$sql = "SELECT * FROM musics WHERE id = '$idMusic'";

$result = $mysqli->query($sql);

$res = $result->fetch_object();






?>
<div class="relative">
    <div id="background-music" style="background-image: url('assets/upload/<?php echo $res->cover ?>')" ></div>
        <div id="info-music" class="container-fluid">
            <div id="music-detail" class="container">
    
                <div class="col-md-9">
                    <h2><?php echo $res->titre ?></h2>
                    <h4>by <?php echo $res->artiste ?></h4>
                    <p><?php echo $res->description ?></p>
                    <p></p>
                    <!--<p><i class="fa fa-play-circle" style="font-size: 5em"></i></p>-->
                </div>
                <div class="col-md-3">
                    <img src="assets/upload/<?php echo $res->cover ?>" height="250" width="250">
                </div>
                <div class="col-md-4"></div>
                
                <div class="col-md-2">
                    
                </div>
            </div>
        </div>
    </div>
    
</div>
<div class="container">
    <div id="comment-container" class="container-fluid">
        <div class="col-md-8">
                <div class="input-group">
                        <form id="comment-music">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				        <input class="mdl-textfield__input" name="comment" type="text" id="userComment" style="display: inline-block">
                        <label class="mdl-textfield__label" for="comment">Commentaire</label>
                    <input type="hidden" name="music" value="<?php echo $_GET['q']; ?>" />
                    <button type="submit" class="hvr-horizontal blue" style="display: inline-block">Poster</button>
				  </div>
                    
                    </form>
                </span>
        </div>
                

                <script>
                    $(document).ready(function(){

                        function res_ajax(){
                            $('#userComment').val('');

                        }

                        $('form#comment-music').on( "submit", function( event ) {
                            event.preventDefault();
                            $path = "assets/ws/music_list_post.php";
                            if(!!$('#userComment').val())
                                send.form(this, $path, res_ajax);
                            else
                                notify.danger("Veuillez écrire un commentaire");
                        });

                    })
                
                </script>
<?php
    $sql2 = "SELECT * FROM comments, musics, users WHERE musics.id = comments.Musics_id AND musics.id = '$idMusic' AND users.id = comments.Users_id";
    error_log($sql2);
    
    $result2 = $mysqli->query($sql2);
    $select ='';
    while($res2 = $result2->fetch_object()){


            $select .= "<hr data-brackets-id='12673'>
            <ul data-brackets-id='12674' id='sortable' class='list-unstyled ui-sortable'>
                <strong class='pull-left primary-font'><!--User -->  $res2->username </strong>
                <small class='pull-right text-muted'>
                <span class='glyphicon glyphicon-time'></span><!-- time -->  ".date_YMD($res2->date)." </small>
                </br>
                <li class='ui-state-default'>  $res2->comment </li>
        
            </ul>";
        }

        echo $select;
            ?>
            </div>
            <script>
            $(document).ready(function(){
                
                $('#like-unlike').on( "click", function( event ) {
                            $path = "assets/ws/like.php";
                            
                            
                            send.form(this, $path, function($data){
                                $like = $("i#likeButton");
                                if($data =='like')
                                    $like.attr("class", "fa fa-thumbs-up");
                                else
                                    $like.attr("class", "fa fa-thumbs-o-up");
                                console.log($data);



                            });
                        });
            });

            
</script>

<div class="col-md-1"></div>
            <div class="col-md-3">
                <p></p>
                <form id="like-unlike">
                <?php 
                    $musicIDCrypt = $_GET['q'];
                    $key = $_SESSION['key'];
                    $musicID = decryptS($musicIDCrypt, $key, random_password(10));

                    $userID = $_SESSION['userID'];

                    $sql = "SELECT * FROM likes WHERE music_id = '$musicID' AND user_id= '$userID'";

                    $result = $mysqli->query($sql);


                    // Si le mail est déjà présent
                    if($result->num_rows == 0)
                        echo '<i id="likeButton" class="fa fa-thumbs-o-up" style="font-size: 2.5em;"> </i>';
                    else
                        echo '<i id="likeButton" class="fa fa-thumbs-up" style="font-size: 2.5em;"> </i>';

                ?>
                        <div id="like-container">
                            <h5>
                            <?php 
                            $sql = "SELECT COUNT(music_id) AS compte FROM likes WHERE music_id = '$musicID'";
                            $result = $mysqli->query($sql);
                            $res = $result->fetch_object();

                            echo '<strong><h4>'.$res->compte."</strong> j'aimes</h4>";
                            
                            ?>
                            </h5>
                            <input type="hidden" name="music" value="<?php echo $_GET['q']; ?>" />
                        </div>
                  </label>
                  

                </form>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__.'/assets/parts/footer.php' ?>