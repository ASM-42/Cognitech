<?php
session_start();
if (!isset($_SESSION['email'])) {header ('Location: ../inscription_connexion/se_connecter_en.php');exit();}

include("../transition/connect_en.php");

$connexion = mysqli_connect(SERVEUR,LOGIN, MDP, BDD);

$bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");

$recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';

$email = $_SESSION['email'];

$sql1 = $bdd -> query('SELECT * FROM users WHERE email="'.$email.'"');
$result = $sql1 -> fetch();
$_SESSION['role'] = $result['role'];
$ecurie = $_SESSION['ecurie'];
$sql = $connexion->query(
    "SELECT id, prenom, nom, ecurie FROM users
      WHERE (role = 'pilote' AND ecurie = '$ecurie')
      AND prenom LIKE '%$recherche%'
      OR nom LIKE '%$recherche%'
      LIMIT 10");
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rechercher</title>
    <link href="../css/Borderau_Bleu.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../css/rechercher.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
<div class="navbarBleue">
    <?php if ($result['role'] == 'admin'): ?>
        <a class="recherche" href="accueil_admin_en.php">Home</a>
    <?php elseif ($result['role'] == 'gestionnaire'): ?>
        <a class="recherche" href="accueil_gestionnaire_en.php">Home</a>
    <?php endif; ?>
    <a class="compte colorActif" href="">Search</a>
    <a class="troisieme" href="profil_en.php">My Account</a>
    <a class="FAQ" href="FAQ_en.php">FAQ</a>
    <a class="CGU" href="CGU_en.php">T&Cs</a>
    <a class="MentionsLegales" href="MentionsLegales_en.php">Legal Notice</a>
    <a class="support" href="contact_en.php">Support</a>
    <a class="deconnecter" href="../index_en.html">Log Out</a>


</div>

<div class="space">
    <div class="formulaire">
        <form method="post">
            <input type="text" class="objet" name="recherche" placeholder="Pilot's name"><br>
            <button type="submit" class="envoyer" >Send</button>
        </form>


        <?php
        echo "<ul>\n";
        while( $r = mysqli_fetch_array($sql)) {
            $user_id = $r['id'];
            echo "<a href='StatistiqueGestio.php?id=$user_id'>";
            echo "<li>";
            echo "<div class=\"cont\">";
            echo "<div class=\"cont1\">";
            echo "<img src='../images/imagePageProfil/icons8-utilisateur-96.png' class=\"userimg\">";
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

