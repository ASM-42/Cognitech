<?php
include("../models/connect.php");

//Connexion à la BDD
$connexion = mysqli_connect (SERVEUR, LOGIN, MDP);
mysqli_select_db ($connexion,BDD) or exit(mysqli_error($connexion)) ;

/*echo "<script language=javascript>
const name = prompt('Qui ?');
</script>";*/
$result = mysqli_query($connexion, "
SELECT auteur, tweet FROM tweets
WHERE auteur = 'Xavier Derville' 
AND dateEcriture >= '2021-04-05 00:00:00'
AND dateEcriture < '2021-04-11 00:00:00'
") or exit(mysqli_error($connexion)) ;
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Utilisateurs</title>
    <link href="style.css" rel="stylesheet"/>
</head>
<body>
<main class="main">
    <?php
    echo "<table align='center'>\n";
    echo "<tr>";
    echo "<th>";
    echo 'Auteur';
    echo "</th>";
    echo "<th>";
    echo 'Tweet';
    echo "</th>";
    echo "</tr>";
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>";
        echo "<span class='pseudo'>" .$row['auteur'] . "</span>\n";
        echo "</td>";
        echo "<td>";
        echo "<span class='pseudo'>" .$row['tweet'] . "</span>\n";
        echo "</td>";
        echo "</tr>";

    }
    echo "</table>\n";
    ?>
</main>

<div class="navbar">
    <a href="espace-membre.php">Accueil</a>
    <a href="tweet.php">Tweet</a>
    <a href="all.php">Utilisateurs</a>
    <a href="question1.php">1</a>
    <a href="question2.php">2</a>
    <a href="question5.php">5</a>
</div>
</body>
</html>
