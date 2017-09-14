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
        <div id="info-music" class="container">
            <div id="music-detail" class="col-md-12">
    
            <div class="col-md-9">
                <h2><?php echo $res->titre ?></h2>
                <h4>by <?php echo $res->artiste ?></h4>
                <p><?php echo $res->description ?></p>
            </div>
            <div class="col-md-3">
                <img src="assets/upload/<?php echo $res->cover ?>" height="250" width="250">
            </div>
            <div class="col-md-4">
                <span class="glyphicon glyphicon-thumbs-up">
            </div>
        </div>
    </div>
    
</div>
    <div class="container">
        <div class="col-md-6">
                <div class="input-group">
                    <form id="comment-music">
                    <input type="text" id="userComment" name="comment" class="form-control input-sm chat-input" placeholder="Laissez un commentaire.."   />
                    <input type="hidden" name="music" value="<?php echo $_GET['q']; ?>" />
	            <span class="input-group-btn">       
                    <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-comment"></span> Add Comment</button>
                    </form>
                </span>
                </div>

                <script>
                    $(document).ready(function(){
                        var send = {

                            form : function($this, $path, $function) {
                                $result = $($this).serialize();

                                $.ajax({
                                url : $path,
                                dataType: "html",
                                type: "POST",
                                data : $result + '& valide=' + 1,
                                success: function(response){

                                    var $res = JSON.parse(response);

                                    switch ($res.status) {
                                    case "success":
                                        if(!!$res.message)
                                        notify.success($res.message);
                                        if ($function != 0)
                                        $function($res.data);
                                        break;
                                    case "error":
                                        notify.danger($res.message);
                                        break;
                                    default:
                                        notify.danger("Erreur inconnue");
                                        break;
                                    }


                                }
                                }).fail(function() {
                                notify.danger("Erreur inconnue");
                                });


                            },




                            test : function($this, $path, $function) {
                                $result = $($this).serialize();

                                $.ajax({
                                url : $path,
                                dataType: "html",
                                type: "POST",
                                data : $result,
                                success: function(response){
                                    console.dir(response);
                                    }
                                }).fail(function() {
                                notify.danger("Erreur inconnue");
                                });
                            }

                            };

                        function res_ajax(){
                            $('#userComment').val('');

                        }

                        $('#comment-music').on( "submit", function( event ) {
                            event.preventDefault();
                            $path = "assets/ws/music_list_post.php";
                            if(!!$('#comment-music').val())
                                send.form(this, $path, res_ajax);
                            else
                                notify.danger("Veuillez écrire un commentaire");
                        });

                    })
                
                </script>
<?php
    $sql2 = "SELECT * FROM comments, musics, users WHERE musics.id = comments.Musics_id AND musics.id = '$idMusic' AND users.id = comments.Users_id";
    
    
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
        
    </div>
</div>
<?php include __DIR__.'/assets/parts/footer.php' ?>