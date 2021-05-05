<?php

include("inscription_connexion/connect.php");

$connexion = mysqli_connect(SERVEUR,LOGIN, MDP, BDD);

$recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';

// la requete mysql
$sql = $connexion->query(
    "SELECT prenom, nom FROM users
      WHERE prenom LIKE '%$recherche%'
      OR nom LIKE '%$recherche%'
      LIMIT 10");


?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rechercher</title>
    <link href="Borderau_Bleu.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="rechercher.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
<div class="container">
    <a class="recherche colorActif" href="">Rechercher</a>
    <a class="compte" href="profil.php">Mon Compte</a>
    <a class="FAQ" href="FAQ.html">FAQ</a>
    <a class="CGU" href="#CGU">CGU</a>
    <a class="support" href="contact.php">Support</a>
    <a class="deconnecter" href="index.html">Se Deconnecter</a>

   <!-- <div id="google_translate_element"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'fr'}, 'google_translate_element');
        }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
-->

</div>

<div class="space">
    <div class="formulaire">
        <form method="post">
            <input type="text" class="objet" name="recherche" placeholder="Entrez le nom du pilote"><br>
            <button type="submit" class="envoyer" >Envoyer</button>
        </form>


            <?php
            echo "<a href='profil.php'>";
            echo "<ul>\n";
            while( $r = mysqli_fetch_array($sql)) {
                echo "<li>";
                echo "<div class=\"cont\">";
                echo "<div class=\"cont1\">";
                echo "<img src=\"images/imagePageProfil/icons8-utilisateur-96.png\" class=\"userimg\">";
                echo "</div>";
                echo "<div class=\"sidebox\">";
                echo "<span>" .$r['prenom'] . ' ' . '<b>' . $r['nom'] ."</span>\n";
                echo "<br>";
            }
            ?>



    </div>
</div>


</body>
</html>

