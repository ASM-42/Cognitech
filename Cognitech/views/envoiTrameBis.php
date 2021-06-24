<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="../css/indexstyle.css" rel="stylesheet"/>
</head>

<form action="" method="post">

    <input type="submit" class="bouton colorJaune" name="submit" value="Allumer la led rouge">
    <input type="submit" class="bouton colorJaune" name="submit2" value="Allumer la led bleue">
    <input type="submit" class="bouton colorJaune" name="submit3" value="Eteindre la led">
</form>


<?php

if(isset($_POST['submit'])) {

        $monUrl="http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=G9C1&TRAME=1G9C141425411425687423";

        header("Location: $monUrl");
        exit;
}

if(isset($_POST['submit2'])) {

    $monUrl="http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=G9C1&TRAME=1G9C131425411425687423";

    header("Location: $monUrl");
    exit;
}

if(isset($_POST['submit3'])) {

    $monUrl="http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=G9C1&TRAME=1G9C151425411425687423";

    header("Location: $monUrl");
    exit;
}
?>