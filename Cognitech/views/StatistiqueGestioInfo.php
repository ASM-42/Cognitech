<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Statistiques</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="../css/Borderau_Bleu.css" rel="stylesheet"/>
    <link href="../css/StatStyle.css" rel="stylesheet"/>
</head>

<?php
$bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");
$id = $_GET['id'];

$sql = $bdd -> query('SELECT * FROM users WHERE id ="'.$id.'"');
$result = $sql -> fetch();
$mail = $result['email'];

$sql2 = $bdd -> query('SELECT date, freq, refl, temperature, testnumber FROM statistique   WHERE email="'.$mail.'"  ORDER BY testnumber DESC');
$tableaudate = array();
$tableaufreq = array();
$tableaurefl = array();
$tableautemp = array();
$tableaunombre = array();

$i = 0;
while($result2 = $sql2 -> fetch()) {
    $tableaudate[$i] = $result2['date'];
    $tableaufreq[$i] = $result2['freq'];
    $tableaurefl[$i] = $result2['refl'];
    $tableautemp[$i] = $result2['temperature'];
    $tableaunombre[$i] = $result2['testnumber'];
    $i++;
}

$size = count($tableaudate);


?>
<body>

<div class="container">
    <?php if ($_SESSION['role'] == 'admin'): ?>
        <a class="recherche" href="accueil_admin.php">Accueil</a>
    <?php elseif ($_SESSION['role'] == 'gestionnaire'): ?>
        <a class="recherche" href="accueil_gestionnaire.php">Accueil</a>
    <?php endif; ?>
    <a class="compte colorActif" href="rechercher.php">Rechercher</a>
    <a class="troisieme" href="profil.php">Mon Compte</a>
    <!--<a class="statistique colorActif" href="Statistique.php">Statistique</a>-->
    <a class="FAQ " href="FAQ.php">FAQ</a>
    <a class="CGU" href="CGU.php">CGU</a>
    <a class="MentionsLegales" href="MentionsLegales.php">Mentions Légales</a>
    <a class="support" href="contact.php">Support</a>
    <a class="deconnecter" href="../index.html">Se Deconnecter</a>
</div>

<div class="main" >
    <div class="header">
        <div class="headerProfil"><img src="../images/imagePageProfil/icons8-contacts-256.png" id="imagecontact"> <?php echo $result['prenom'] . ' ' .  '<b>' . $result['nom'];?></div>

        <!-- <div class="supprimer">

            <img src="images/poubelle.png">
        </div> -->
    </div>
    <div class="menu" >
        <a href="StatistiqueGestio.php?id=<?php echo $_GET['id']?>" class="stat bouton ">Statistiques</a>
        <a href="StatistiqueGestioInfo.php?id=<?php echo $_GET['id']?>" class="info bouton colorJaune" >Informations</a>
    </div>

    <div class="Data">
        <div class=" case"><?php echo $result['email']?></div>
        <div class=" case"><img src="../images/imagePageProfil/icons8-mâle-100.png"><?php echo $result['sexe']?></div>
        <div class=" case"> <img src="../images/imagePageProfil/icons8-téléphone-96.png"><?php echo $result['phone']?></div>
        <div class=" case"> <img src="../images/imagePageProfil/icons8-voiture-96.png"><?php echo $result['ecurie']?></div>
        <div class=" case "> <img src="../images/imagePageProfil/icons8-anniversaire-96.png"> <?php echo $result['dateDeNaissance']?></div>
    </div>

</body>
</html>
