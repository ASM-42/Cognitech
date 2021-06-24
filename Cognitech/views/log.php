<?php

$ch = curl_init();
curl_setopt(
    $ch,
    CURLOPT_URL,
    "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=G9C1");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);
/*echo "Raw Data:<br />";
echo("$data");*/


$data_tab = str_split($data,33);


// …
// décodage avec sscanf
/*list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
    sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
echo("<br />$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");
$datebis = "$year" . "-" . "$month" . "-" . "$day";*/


//echo "Tabular Data:<br />";
for($i=0, $size=count($data_tab); $i<$size; $i++){
    echo "Trame $i: $data_tab[$i]<br />";

    $trame = $data_tab[$i];
// décodage avec des substring
    $t = substr($trame,0,1);
    $o = substr($trame,1,4);

    list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
        sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
    echo("<br />Test n°$i<br/>Equipe $o<br/>Capteur n°$c<br/>Valeur : $v<br/>$year-$month-$day    $hour h $min m $sec s<br />");
}






$bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");
$id = $_SESSION['id'];

$sql = $bdd -> query('SELECT * FROM users WHERE id="'.$id.'"');
$result = $sql -> fetch();
$email = $result['email'];

$sql2 = $bdd -> query('INSERT INTO statistique (date, temperature, testnumber) VALUES ("'.$datebis.'", "'.$v.'", "'.$t.'") WHERE email="'.$email.'"');

?>