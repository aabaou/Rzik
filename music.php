<?php include __DIR__.'/assets/parts/header.php' ?>

<div class="container">
    <div id="music-detail" class="col-md-12">
        <div class="col-md-9">
            <h2>Titre</h2>
            <h4>by Artiste</h4>
            <p>Description :  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eu sapien luctus, consectetur magna et, interdum nisl. Integer vestibulum enim ac justo faucibus, eget mattis diam molestie. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla ut vehicula nulla, ac placerat velit. Sed pellentesque ex volutpat ultricies pharetra. Praesent vel sollicitudin odio, vitae mollis diam. Praesent quis elit ac dui fringilla maximus. Nullam suscipit arcu id ultricies varius.</p>
        </div>
        <div class="col-md-3">
            <img src="assets/upload/cover.jpg" height="200" width="250">
        </div>
    </div>
    <div class="col-md-12">
            <div class="container">
                <div class="input-group">
                    <input type="text" id="userComment" class="form-control input-sm chat-input" placeholder="Write your message here..."   />
	            <span class="input-group-btn" onclick="addComment()">       
                    <a href="#" class="btn btn-primary btn-sm"><span class="    glyphicon glyphicon-comment"></span> Add Comment</a>
                </span>
                </div>
<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=rzik;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM comments');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>

            <hr data-brackets-id="12673">
            <ul data-brackets-id="12674" id="sortable" class="list-unstyled ui-sortable">
                <strong class="pull-left primary-font"><!--User --><?php echo $donnees['username']; ?></strong>
                <small class="pull-right text-muted">
                <span class="glyphicon glyphicon-time"></span><!-- time --><?php echo $donnees['date']; ?></small>
                </br>
                <li class="ui-state-default"><?php echo $donnees['comment']; ?></li>
        
            </ul>
            </div>
        
    </div>
</div>
<?php } 
    $reponse->closeCursor(); // Termine le traitement de la requête ?>
    <?php include __DIR__.'/assets/parts/footer.php' ?>