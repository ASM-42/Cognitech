<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Statistiques</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="../css/Borderau_Bleu.css" rel="stylesheet"/>
    <link href="../css/StatStyle.css" rel="stylesheet"/>
</head>

<?php
$bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");
$id = $_GET['$id'];

$sql = $bdd -> query('SELECT email FROM users WHERE id ="'.$id.'"');
$result = $sql -> fetch();

$sql2 = $bdd -> query('SELECT date, freq, refl, temperature, testnumber FROM statistique   WHERE email="'.$result.'"  ORDER BY testnumber DESC');
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
    <?php if ($result['role'] == 'admin'): ?>
        <a class="recherche" href="accueil_admin.php">Accueil</a>
    <?php elseif ($result['role'] == 'gestionnaire'): ?>
        <a class="recherche" href="accueil_gestionnaire.php">Accueil</a>
    <?php endif; ?>
    <a class="recherche" href="#recherche">Rechercher</a>
    <a class="compte" href="#compte">Mon Compte</a>
    <!--<a class="statistique colorActif" href="Statistique.php">Statistique</a>-->
    <a class="FAQ " href="FAQinvite.html">FAQ</a>
    <a class="CGU" href="#CGU">CGU</a>
    <a class="support" href="contact.html">Support</a>
    <a class="deconnecter" href="../index.html">Se Deconnecter</a>
</div>

<div class="main" >
    <div class="header">
        <div class="headerProfil"><img src="images/imagePageProfil/icons8-utilisateur-96.png" id="imagecontact"> <?php echo $result['prenom'] . ' ' .  '<b>' . $result['nom'];?></div>

        <!-- <div class="supprimer">

            <img src="images/poubelle.png">
        </div> -->
    </div>
    <div class="menu" >
        <a href="Statistique.php" class="stat bouton ">Statistiques</a>
        <a href="StatistiqueProfil.php" class="info bouton colorJaune" >Informations</a>
    </div>

    <div class="Data">
        <div class="ligne1">
            <span class="mail"><?php echo $result['email']?></span>
            <span class="sexe"><?php echo $result['sexe']?></span>
            <span class="phone"><?php echo $result['phone']?></span>
        </div>
        <div class="ligne2">
            <span class="ecurie"><?php echo $result['ecurie']?></span>
            <span class="birthday"><?php echo $result['dateDeNaissance']?></span>
        </div>
    </div>








</body>
</html>
