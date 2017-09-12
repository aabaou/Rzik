<?php

include '../config/config.inc.php';

if(empty($_POST['valide'])){

	$MethodeF = $_FILES;

	$fileNameCover = isset($MethodeF['cover']['name']) ? $MethodeF['cover']['name'] : '';
	$fileTypeCover = isset($MethodeF['cover']['type']) ? $MethodeF['cover']['type'] : '';
	$fileContentCover = isset($MethodeF['cover']['tmp_name']) ? file_get_contents($MethodeF['cover']['tmp_name']) : '';

	$fileNameMusic = isset($MethodeF['music']['name']) ? $MethodeF['music']['name'] : '';
	$fileTypeMusic = isset($MethodeF['music']['type']) ? $MethodeF['music']['type'] : '';
	$fileContentMusic = isset($MethodeF['music']['tmp_name']) ? file_get_contents($MethodeF['music']['tmp_name']) : '';


	$dataUrl = 'data:' . $fileTypeMusic . ';base64,' . base64_encode($fileContentMusic);

	$elementsChemin = pathinfo($fileNameMusic);
	$extension = $elementsChemin['extension'];


	$pathCover = "../upload/{$fileNameCover}";
	$pathMusic = "../upload/{$fileNameMusic}";

	$uploadCover = upload('cover', $pathCover);
	$uploadMusic = upload('music', $pathMusic);

	$track = time();

	$userID = $_SESSION['userID'];

	$_SESSION['uploadTime'] = $track;

	$sql = "INSERT INTO musics(cover, file, Users_id, track, date_upload ) VALUES('$pathCover', '$pathMusic', '$userID', '$track', $track)"; 

	$res = $mysqli->query($sql);

	$result = ['status' => 'success', 'message' => 'Yop', 'data' => $res];

}
else{

	$Methode = $_POST;

	$titre = isset($Methode['titre']) ? $Methode['titre'] : '' ;
	$artiste = isset($Methode['artiste']) ? $Methode['artiste'] : '' ;
	$compositeur = isset($Methode['compositeur']) ? $Methode['compositeur'] : '' ;
	$genre = isset($Methode['genre']) ? $Methode['genre'] : '' ;



	$userID = $_SESSION['userID'];
	$track = $_SESSION['uploadTime'];


	$sql = "UPDATE musics SET titre = '$titre', artiste = '$artiste', compositeur = '$compositeur', genres = '$genre' WHERE Users_id='$userID' AND track ='$track' ";

	$mysqli->query($sql);

	unset($_SESSION['uploadTime']);

	$result = ['status' => 'success', 'message' => 'Ce mail est déjà présent', 'data' => $sql ];

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