<?php

$fileName = $_FILES['identite']['name'];
$fileType = $_FILES['identite']['type'];
$fileContent = file_get_contents($_FILES['identite']['tmp_name']);
$dataUrl = 'data:' . $fileType . ';base64,' . base64_encode($fileContent);
$json = json_encode(array(
  'name' => $fileName,
  'type' => $fileType,
  'dataUrl' => $dataUrl,
  'username' => $_REQUEST['username'],
  'accountnum' => $_REQUEST['accountnum']
));


$elementsChemin = pathinfo($nomOrigine);
$extensionFichier = $elementsChemin['extension'];
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'pdf' );
// 1. strrchr renvoie l'extension avec le point (« . »).
// 2. substr(chaine,1) ignore le premier caractère de chaine.
// 3. strtolower met l'extension en minuscules.
$extension_upload1 = strtolower(  substr(  strrchr($_FILES['identite']['name'], '.')  ,1)  );
$extension_upload1 = strtolower(  substr(  strrchr($_FILES['bic']['name'], '.')  ,1)  );

if ( in_array($extension_upload1,$extensions_valides) ) echo "Extension correcte";




echo $json;

?>