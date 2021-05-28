<?php
session_start();
if (!isset($_SESSION['email'])) {header ('Location: ../inscription_connexion/se_connecter.php');exit();}

include("../inscription_connexion/connect.php");

$connexion = mysqli_connect(SERVEUR,LOGIN, MDP, BDD);

$bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");

$recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';

$email = $_SESSION['email'];

$sql = $bdd -> query('SELECT * FROM users WHERE email="'.$email.'"');
$result = $sql -> fetch();
$_SESSION['role'] = $result['role'];
$sql = $connexion->query(
    "SELECT id, prenom, nom FROM users
      WHERE role = 'pilote'
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
<div class="container">
    <?php if ($result['role'] == 'admin'): ?>
        <a class="recherche" href="accueil_admin.php">Accueil</a>
    <?php elseif ($result['role'] == 'gestionnaire'): ?>
        <a class="recherche" href="accueil_gestionnaire.php">Accueil</a>
    <?php endif; ?>
    <a class="compte colorActif" href="">Rechercher</a>
    <a class="troisieme" href="profil.php">Mon Compte</a>
    <a class="FAQ" href="FAQ.php">FAQ</a>
    <a class="CGU" href="CGU.php">CGU</a>
    <a class="MentionsLegales" href="MentionsLegales.php">Mentions Légales</a>
    <a class="support" href="contact.php">Support</a>
    <a class="deconnecter" href="../index.html">Se Deconnecter</a>

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

