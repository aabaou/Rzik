<?php

include '../config/config.inc.php';

if(empty($_POST['valide'])){

	$MethodeF = $_FILES;
	error_log("_______________File________________");
	$fileNameCover = isset($MethodeF['cover']['name']) ? $MethodeF['cover']['name'] : '';
	$fileTypeCover = isset($MethodeF['cover']['type']) ? $MethodeF['cover']['type'] : '';

	$fileNameMusic = isset($MethodeF['music']['name']) ? $MethodeF['music']['name'] : '';
	$fileTypeMusic = isset($MethodeF['music']['type']) ? $MethodeF['music']['type'] : '';


	$elementsCheminCover = pathinfo($fileNameCover);
	$extensionCover = $elementsCheminCover['extension'];

	$elementsCheminMusic = pathinfo($fileNameMusic);
	$extensionMusic = $elementsCheminMusic['extension'];

	$cover = sha1($fileNameCover);
	$musique = sha1($fileNameMusic);

	$pathCover = "../upload/{$cover}.{$extensionCover}";
	$pathMusic = "../upload/{$musique}.{$extensionMusic}";

	$uploadCover = upload('cover', $pathCover);
	$uploadMusic = upload('music', $pathMusic);

	$userID = $_SESSION['userID'];

	$track  = $_SESSION['uploadTime'];

	$sql = "UPDATE musics SET cover = '$pathCover', file = '$pathMusic' WHERE Users_id='$userID' AND track ='$track' ";
	
	error_log($sql);

	$res = $mysqli->query($sql);

	$result = ['status' => 'success', 'message' => 'Yop', 'data' => 'data'];

	unset($_SESSION['uploadTime']);

}
else{

	$Methode = $_POST;
	
	error_log("_______________POST________________");
	$titre = isset($Methode['titre']) ? $Methode['titre'] : '' ;
	$artiste = isset($Methode['artiste']) ? $Methode['artiste'] : '' ;
	$compositeur = isset($Methode['compositeur']) ? $Methode['compositeur'] : '' ;
	$genre = isset($Methode['genre']) ? $Methode['genre'] : '' ;
	$visible = isset($Methode['visible']) ? $Methode['visible'] : '' ;
	$description = isset($Methode['description']) ? $Methode['description'] : '' ;



	$userID = $_SESSION['userID'];
	$track = $_SESSION['uploadTime'] = time();



	$sql = "INSERT INTO musics(titre, artiste, compositeur, genres, Users_id, track, description,  status ) VALUES('$titre', '$artiste', '$compositeur', '$genre', '$userID', '$track', '$description', '$visible')";

	error_log($sql);

	$mysqli->query($sql);

	

	$result = ['status' => 'success', 'message' => $dico['email_already_exist'], 'data' => 'data' ];

}


echo json_encode($result);



// $elementsChemin = pathinfo($nomOrigine);
// $extensionFichier = $elementsChemin['extension'];
// $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'pdf' );
// // 1. strrchr renvoie l'extension avec le point (« . »).
// // 2. substr(chaine,1) ignore le premier caractère de chaine.
// // 3. strtolower met l'extension en minuscules.
// $extension_upload1 = strtolower(  substr(  strrchr($_FILES['identite']['name'], '.')  ,1)  );
// $extension_upload1 = strtolower(  substr(  strrchr($_FILES['bic']['name'], '.')  ,1)  );

// if ( in_array($extension_upload1,$extensions_valides) ) echo "Extension correcte";

?>