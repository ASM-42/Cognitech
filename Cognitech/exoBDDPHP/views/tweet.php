<?php
include("../models/connect.php");

//Connexion à la BDD
$connexion = mysqli_connect (SERVEUR, LOGIN, MDP);
mysqli_select_db ($connexion,BDD) or exit(mysqli_error($connexion)) ;

$result = mysqli_query($connexion, "SELECT auteur, tweet FROM tweets") or exit(mysqli_error($connexion)) ;
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Tweet</title>
    <link href="style.css" rel="stylesheet"/>
</head>
<body>
<main class="main">
    Publier un tweet :<br />
    <form action="../models/send_tweet.php" method="post">
        <label>Auteur:</label><input type="text" name="auteur"><br>
        <label>Tweet:</label><input type="text" name="tweet"><br>

        <button type="submit" name="submit">Envoyer</button>
    </form>
    <br>
    <br>
    <br>
    <br>

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
    <a href="#item1">Tweet</a>
    <a href="all.php">Utilisateurs</a>
    <a href="question1.php">1</a>
    <a href="question2.php">2</a>
    <a href="question5.php">5</a>
</div>
</body>
</html>