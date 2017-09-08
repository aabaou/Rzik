<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//          Test_utf8_encode($String)               converti en utf8 si necesaire
//          stripAccents($str, $charset='utf-8')    remplace les accents 
//          formatTel($str)                         Formate les numeros de telephone pour l'affichage
//          formatDate($date)                       Formate la date en JJ/MM/AAAA
//          FormatDateHeure($date,$heure=true)      Formate la date et l'heure
//          sendsms($text,$emailSec)                Envoi un sms en cas d'alerte de securité
//          hashPassword($text)                     hache un mot de passe en SHA512
//          todbDate ($Datetime='',$sql=true)       converti la date au format base de donnée
//          formatTel($str)                         Formate les numeros de telephone pour l'affichage
//          cryptS($data, $clef, $salt)             crypte une chaine
//          decryptS($data, $clef, $salt)           decrypte une chaine 
//          track($key,$action)                     ajoute une entrée das le trackLog
//          toBase36($input)                        Convertis un int en base 36
//          writeEC($typeEc,$dateComptable,
//                  $ticketId,$projetId,
//                  $plateforme,$devise,$ecId=0)            ajoute une Ecriture Comptable
//          logError($error,$type)                  $type=> 1=db
//          fileExists($fileName, $caseSensitive = true)    Verifie l'existance d'un fichier
//          date_YMD($date)                         Convertie les dates au format yyyy-mm-dd en dd/mm/yyyy + le reste si il y'a
//          date_YMD_lit($date)                     Convertie les dates au format yyyy-mm-dd en dd mm yyyy + le reste si il y'a au format litterale
//          date_YMD_WithoutRest($date)             Convertie les dates au format yyyy-mm-dd en dd/mm/yyyy - le reste
//          Mois($mois)                             Retourne le mois correspondant a l'entirer inséré
//          secure($data)                           Empêche le cross-scripting et l'injection SQL
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





function Test_utf8_encode($String)
{
    $enc=mb_detect_encoding($String,mb_detect_order() ,true);
    if ($enc=="UTF-8") 
        return str_replace("\"", "&quot;", $String);
    else
        return utf8_encode(str_replace("\"", "&quot;", $String));
}

function stripAccents($str, $charset='utf-8')
{
    $str = htmlentities($str, ENT_NOQUOTES, $charset);
    
    $str = preg_replace('#&([A-za-z])(?:acute|cedil|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
    $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
    
    return $str;
}

function formatTel($str)
{ 
    if (strlen($str)>10)
    {
        return substr($str, 0,3)." ".substr($str, 3, 1)." ".substr($str, 4, 2)." ".substr($str, 6, 2)." ".substr($str, 8, 2)." ".substr($str, 10, 2);
    }
    else
    {
        if (strlen($str)>9)
        {
            return substr($str, 0,2)." ".substr($str, 2, 2)." ".substr($str, 4, 2)." ".substr($str, 6, 2)." ".substr($str, 8, 2);
        }
        else
        {
            return $str;
        }
    }
}

function formatDate($date)
{
    $date = new DateTime($date);
    return $date->format('d/m/Y');
}

function FormatDateHeure($date,$heure=true)
{  
    if ((string)$date=='') return '';
    $d1=explode(' ',$date);
    $d2=explode('-',$d1[0]);
    return $d2[2].'/'.$d2[1].'/'.$d2[0].(($heure and isset($d1[1]))?' '.$d1[1]:'');
}

function sendsms($text,$emailSec)
{
    $date = date("d-m-Y");
    $heure = date("H:i");
    $text = "ALERTE COMPORTEMENT DOUTEUX ".$_SERVER["SERVER_NAME"]."\n le ". $date ." à ".$heure."\n".$text."\n".gethostbyaddr($_SERVER["REMOTE_ADDR"])."\n".$emailSec."\n".$_SERVER['REQUEST_URI']."\nCODE=".ip2long($_SERVER["REMOTE_ADDR"]);
    $compteFreeSms=array("10831734 " => "NEU3gxIIduZoZ6");
    foreach ($compteFreeSms as $key => $value) {
        file_get_contents("https://smsapi.free-mobile.fr/sendmsg?user=$key&pass=$value&msg=".urlencode($text));
    }
    // To
    $to = 'lm@eosventure.com';
    // Subject
    $subject = 'ALERTE COMPORTEMENT DOUTEUX '.$_SERVER["SERVER_NAME"];
    // Message
    $msg = $text."\nPOST=".var_export($_POST, true)."\nGET=".var_export($_GET, true)."\nNavigateur=".$_SERVER['HTTP_USER_AGENT'];
    // Function mail()
    mail($to, $subject, $msg);
}

function hashPassword($text)
{   
    $out[1]=hash('md5',hash('md5',$text).hash('md5',$text));
    $out[2]=hash('sha256',hash('sha256',$text).hash('sha256',$text));
    return $out;
}

function todbDate($Datetime='',$sql=true)
{   
    if (strlen($Datetime)==10)
    {   
        if(mbereg('^[0-9]{4}-[0-9]{2}-[0-9]{2}$',$Datetime)) 
            $todbDate=$Datetime;
        else 
            $todbDate=substr($Datetime,6,4)."-".substr($Datetime,3,2)."-".substr($Datetime,0,2);
    }
    elseif (strlen($Datetime)==19) 
        $todbDate=substr($Datetime,6,4)."-".substr($Datetime,3,2)."-".substr($Datetime,0,2)." ".substr($Datetime,11,8);
    else 
        $todbDate='';
    return $sql?($todbDate?"'".$todbDate."'":"NULL"):$todbDate;
}

function random_password($chars = 8) 
{
    $letters = 'abcefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ123456789';
    $out="";
    for ($i=0;$i<$chars;$i++)
    {
        $out.=substr(str_shuffle($letters), 0, 1);
    }
    return $out;
}

function spaceTel($str) 
{
    return chunk_split($str, 2, ' ');
}

function cryptS($data, $clef, $salt)
{
    $cipher  = MCRYPT_RIJNDAEL_128;          // Algorithme utilisé pour le cryptage des blocs
    $mode    = MCRYPT_MODE_CFB ;    
    $keyHash = md5($clef);
    $key = substr($keyHash, 0,   mcrypt_get_key_size($cipher, $mode) );
    $iv  = substr($keyHash, 0, mcrypt_get_block_size($cipher, $mode) );
    $data = mcrypt_encrypt($cipher, $key, $salt.$data, $mode, $iv);
    return  bin2hex(($data));
}

function decryptS($data, $clef, $salt)
{
    $data=hex2bin($data);
    $cipher  = MCRYPT_RIJNDAEL_128;          // Algorithme utilisé pour le cryptage des blocs
    $mode    = MCRYPT_MODE_CFB ;    
    $keyHash = md5($clef);
    $key = substr($keyHash, 0,   mcrypt_get_key_size($cipher, $mode) );
    $iv  = substr($keyHash, 0, mcrypt_get_block_size($cipher, $mode) );
    $tmp=mcrypt_decrypt($cipher, $key, $data, $mode, $iv);
    return substr($tmp, strlen($salt));
}

function track($key,$action)
{
    global $mysqli,$sessionUser;
    $action=$mysqli->real_escape_string($action);
    if ($sessionUser->id==-1)
        $userId="NULL";
    else
        $userId=$sessionUser->id;
    $sql= "INSERT INTO `track` (`id`, `KeyLink`, `Action`, `UserId`, `Date`, `Ip`) VALUES (NULL, '$key', '$action', ".$userId.", CURRENT_TIMESTAMP, '".ip2long($_SERVER["REMOTE_ADDR"])."');";
    if(!$result = $mysqli->query($sql))
        {
            die("There was an error running the query [<br>\n $sql \n<br>" . $mysqli->error . "\n<br>]");
        }
}

function toBase36($input)
{
    $valeur=$input;
    $puissances=array(36 , 36*36,36*36*36);
    $S1='0';
    $S2='0';
    $S3='0';
    $S4='0';
    $test=(int)($valeur/$puissances[2]);
    if ($test>0) {
        if ($test<10) {
            $S4=''.$test;
        }
        else
        {
            $S4=chr($test+55);
        }   
    }
    $valeur=$valeur%$puissances[2];
    $test=(int)($valeur/$puissances[1]);
    if ($test>0) {
        if ($test<10) {
            $S3=''.$test;
        }
        else
        {
            $S3=chr($test+55);
        }   
    }
    $valeur=$valeur%$puissances[1];
    $test=(int)($valeur/$puissances[0]);
    if ($test>0) {
        if ($test<10) {
            $S2=''.$test;
        }
        else
        {
            $S2=chr($test+55);
        }   
    }
    $valeur=$valeur%$puissances[0];
    if ($valeur<10) {
        $S1=''.$valeur;
    }
    else
    {
        $S1=chr($valeur+55);
    }   
    return $S4.$S3.$S2.$S1;
}   

function writeEC($typeEc,$dateComptable,$ticketId,$plateforme,$devise,$ecId=0)
{
    global $mysqli;
    //statut Ticket
    $statut=0;
    // Credit Element #
    $CE1="";
    $CE2="";
    $CE3="";
    $CE4="";
    $CE5="";
    // Débit Element #
    $DE1="";
    $DE2="";
    $DE3="";
    $DE4="";
    $DE5="";
    // Recherche de l'id investisseur
    $sql="select * from ticket where id=".$ticketId;
    if(!$result = $mysqli->query($sql)){
        die('There was an error running the query [' . $mysqli->error . ']');
    }
    while($data = $result->fetch_array())
    {
        $InvestisseurId=$data["InvestisseurId"];
        $projetId=$data["projetId"];
        $prixTotal=$data["prixTotal"];
    }
    // Recherche de l'id investisseur
    $sql="select * from projet where id=".$projetId;
    if(!$result = $mysqli->query($sql)){
        die('There was an error running the query [' . $mysqli->error . ']');
    }
    while($data = $result->fetch_array())
    {
        $entrepriseBeneficiaireId=$data["entrepriseBeneficiaireId"];
    }
    // cosntruction du champ Débit
    $DE3=toBase36($projetId);
    $DE4=$plateforme;
    $DE5=$devise;
    // cosntruction du champ Crédit
    $CE3=toBase36($projetId);
    $CE4=$plateforme;
    $CE5=$devise;
    $code="EC".$typeEc.'-BS'.$ticketId;
    // Recherche de l'existance d'une ligne deja existante
    $sql="select * from vueCompta where type=".$typeEc." and ticketId=".$ticketId;
    if(!$result = $mysqli->query($sql)){
        die('There was an error running the query [' . $mysqli->error . ']');
    }
    if ($result->num_rows>0)
        exit();
    switch ($typeEc) {
        case 1:
            $DE1="467100";
            $DE2="I".toBase36($InvestisseurId);
            $CE1="467001";
            $CE2="E".toBase36($entrepriseBeneficiaireId);
            // statut Accepté
            $statut=2;
            break;
        case 2:
            $DE1="";
            $CE1="";
            // statut Accepté
            $statut=2;
            break;
        case 3:
            $DE1="";
            $CE1="";
            // statut Accepté
            $statut=2;
            break;
        case 4:
            $DE1="512100";
            $DE2="LCLRT";
            $CE1="467300";
            $CE2="I".toBase36($InvestisseurId);
            // statut Accepté
            $statut=2;
            break;
        case 5:
            $DE1="512100";
            $DE2="LCLCT";
            $CE1="512100";
            $CE2="LCLRT";
            // statut Accepté
            $statut=4;
            break;
        case 6:
            $DE1="467001";
            $DE2="E".toBase36($entrepriseBeneficiaireId);
            $CE1="512100";
            $CE2="LCLCT";
            $code="EC".$typeEc.'-PJ'.$projetId;
            // statut Accepté
            $statut=8;
            break;
        case 7:
            $DE1="467001";
            $DE2="E".toBase36($entrepriseBeneficiaireId);
            $CE1="467100";
            $CE2="I".toBase36($InvestisseurId);
            // statut Accepté
            $statut=2;
            break;
        case 8:
            $DE1="467100";
            $DE2="I".toBase36($InvestisseurId);
            $CE1="512100";
            $CE2="LCLRT";
            // statut Accepté
            $statut=2;
            break;
        case 9:
            $DE1="467300";
            $DE2="I".toBase36($InvestisseurId);
            $CE1="467100";
            $CE2="I".toBase36($InvestisseurId);
            // statut Accepté
            $statut=2;
            break;
        case 10:
            $DE1="467100";
            $DE2="I".toBase36($InvestisseurId);
            $CE1="467300";
            $CE2="I".toBase36($InvestisseurId);
            // statut Accepté
            $statut=2;
            break;
        
        default:
            # code...
            break;
    }
    if  ((strlen($dateComptable)==0) || ($dateComptable==""))
        $dateComptable="CURRENT_TIMESTAMP";
    if ($ecId==0)
    {
        $sql="INSERT INTO `ec` (`id`, `type`, `code`, `dateComptable`, `dateOperation`) VALUES (NULL, '$typeEc', '$code', '$dateComptable', CURRENT_TIMESTAMP);";
        echo "<br>\n $sql <br>\n";
        if( $mysqli->query($sql)){
            echo "New record created successfully\n";
            $ecId=$mysqli->insert_id;
        } else {
            echo "\nError: " . $sql . "<br>\n" . mysqli_error($conn);
        }
    }

    $sql="INSERT INTO `ligneEc` (`ecId`, `debitE1`, `debitE2`, `debitE3`, `debitE4`, `debitE5`, `creditE1`, `creditE2`, `creditE3`, `creditE4`, `creditE5`, `ticketId`, `montant`) VALUES ('$ecId', '$DE1', '$DE2', '$DE3', '$DE4', '$DE5', '$CE1', '$CE2', '$CE3', '$CE4', '$CE5', '$ticketId', '$prixTotal');";
    echo "<br>\n $sql <br>\n";
    if( $mysqli->query($sql)){
        echo "New record created successfully\n";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    return $ecId;
} 


function logError($error,$type)
{
    global $environement;
    $key="";
    $txt="";
    if ($environement!=2)
    {
        switch ($type) {
            case 1:
                $txt='There was an error running the query [' . $error . ']';
                die($txt);
                $key="DBX";
                break;
            
            default:
                # code...
                break;
        }
        
    }
    track($key,$txt);
}
function fileExists($fileName, $caseSensitive = true) {

    if(file_exists($fileName)) {
        return $fileName;
    }
    if($caseSensitive) return false;

    // Handle case insensitive requests            
    $directoryName = dirname($fileName);
    $fileArray = glob($directoryName . '/*', GLOB_NOSORT);
    $fileNameLowerCase = strtolower($fileName);
    foreach($fileArray as $file) {
        if(strtolower($file) == $fileNameLowerCase) {
            return $file;
        }
    }
    return false;
}

function date_YMD($date){

    // On split l'entrée
    $row_date = explode("-", $date);

    // On vérifie que l'entrée ne posède que la date
    if(strpos($row_date[2], ' ') !== false) {
        // Si l'entrée ne possède pas que la date on re-split le dernier élément afin de ne pas modifier le reste
        $row_reste = explode(" ", $row_date[2]);
        $result_date = $row_reste[0].'/'.$row_date[1].'/'.$row_date[0].' '.$row_reste[1];

    }else{

        $result_date = $row_date[2].'/'.$row_date[1].'/'.$row_date[0];

    }

    // La sortie est convertie
    return $result_date;

}

function date_YMD_WithoutRest($date){

    // On split l'entrée
    $row_date = explode("-", $date);

    // Si l'entrée ne possède pas que la date on re-split le dernier élément afin de ne pas modifier le reste
    $row_reste = explode(" ", $row_date[2]);
    $result_date = $row_reste[0].'/'.$row_date[1].'/'.$row_date[0];

    // La sortie est convertie
    return $result_date;

}


function date_YMD_lit($date){

    // On split l'entrée
    $row_date = explode("-", $date);

    switch ($row_date[1]) {
        case 1:
            $mois_litterale = "Janvier";
            break;
        case 2:
            $mois_litterale = "Février";
            break;
        case 3:
            $mois_litterale = "Mars";
            break;
        case 4:
            $mois_litterale = "Avril";
            break;
        case 5:
            $mois_litterale = "Mai";
            break;
        case 6:
            $mois_litterale = "Juin";
            break;
        case 7:
            $mois_litterale = "Juillet";
            break;
        case 8:
            $mois_litterale = "Août";
            break;
        case 9:
            $mois_litterale = "Septembre";
            break;
        case 10:
            $mois_litterale = "Octobre";
            break;
        case 11:
            $mois_litterale = "Novembre";
            break;
        case 12:
            $mois_litterale = "Décembre";
            break;
        default:
            $mois_litterale = "Veuillez entrer une valeur comprise entre 1 et 12";
            break;
        }

    // On vérifie que l'entrée ne posède que la date
    if(strpos($row_date[2], ' ') !== false) {
        // Si l'entrée ne possède pas que la date on re-split le dernier élément afin de ne pas modifier le reste
        $row_reste = explode(" ", $row_date[2]);
        $result_date = $row_reste[0].' '.$mois_litterale.' '.$row_date[0].' '.$row_reste[1];

    }else{

        $result_date = $row_date[2].' '.$mois_litterale.' '.$row_date[0];

    }

    // La sortie est convertie
    return $result_date;

}


function date_YMD_num($date){

    // On split l'entrée
    $row_date = explode("-", $date);

    switch ($row_date[1]) {
        case 1:
            $mois_litterale = "01";
            break;
        case 2:
            $mois_litterale = "02";
            break;
        case 3:
            $mois_litterale = "03";
            break;
        case 4:
            $mois_litterale = "04";
            break;
        case 5:
            $mois_litterale = "05";
            break;
        case 6:
            $mois_litterale = "06";
            break;
        case 7:
            $mois_litterale = "07";
            break;
        case 8:
            $mois_litterale = "08";
            break;
        case 9:
            $mois_litterale = "09";
            break;
        case 10:
            $mois_litterale = "10";
            break;
        case 11:
            $mois_litterale = "11";
            break;
        case 12:
            $mois_litterale = "12";
            break;
        default:
            $mois_litterale = "Veuillez entrer une valeur comprise entre 1 et 12";
            break;
        }

    // On vérifie que l'entrée ne posède que la date
    if(strpos($row_date[2], ' ') !== false) {
        // Si l'entrée ne possède pas que la date on re-split le dernier élément afin de ne pas modifier le reste
        $row_reste = explode(" ", $row_date[2]);
        $result_date = $row_reste[0].'/'.$mois_litterale.'/'.$row_date[0].'/'.$row_reste[1];

    }else{

        $result_date = $row_date[2].'/'.$mois_litterale.'/'.$row_date[0];

    }

    // La sortie est convertie
    return $result_date;

}


function Mois($mois){

    switch ($mois) {
        case 1:
            $mois_litterale = "Janvier";
            break;
        case 2:
            $mois_litterale = "Février";
            break;
        case 3:
            $mois_litterale = "Mars";
            break;
        case 4:
            $mois_litterale = "Avril";
            break;
        case 5:
            $mois_litterale = "Mai";
            break;
        case 6:
            $mois_litterale = "Juin";
            break;
        case 7:
            $mois_litterale = "Juillet";
            break;
        case 8:
            $mois_litterale = "Août";
            break;
        case 9:
            $mois_litterale = "Septembre";
            break;
        case 10:
            $mois_litterale = "Octobre";
            break;
        case 11:
            $mois_litterale = "Novembre";
            break;
        case 12:
            $mois_litterale = "Décembre";
            break;
        default:
            $mois_litterale = "Veuillez entrer une valeur comprise entre 1 et 12";
            break;
        }

        return $mois_litterale;
    }


function secure($data){

    $res = htmlspecialchars(htmlentities($data));
    return $res;
}

function test($data){

    return $data;
}
