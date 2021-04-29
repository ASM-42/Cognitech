<?php
session_start();
if (!isset($_SESSION['email'])) {header ('Location: index.php');exit();}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>page_profil</title>
    <link href="Borderau_Bleu.css" rel="stylesheet"/>
    <link href="pageProfil.css" rel="stylesheet"/>

</head>
<body>
<?php
$bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");
$email = $_SESSION['email'];

$sql = $bdd -> query('SELECT * FROM users WHERE email="'.$email.'"');
$result = $sql -> fetch();
?>

<div class="container">
    <a class="recherche" href="rechercher.php">Rechercher</a>
    <a class="compte colorActif" href="">Mon Compte</a>
    <a class="FAQ" href="FAQ.html">FAQ</a>
    <a class="CGU" href="#CGU">CGU</a>
    <a class="support" href="contact.php">Support</a>
    <a class="deconnecter" href="index.html">Se Deconnecter</a>
</div>
<div class="pageProfil">
    <div class = "profil">
        <div class="headerProfil"><img src="images/imagePageProfil/icons8-utilisateur-96.png" id="imagecontact"> <?php echo $result['prenom'] . ' ' .  '<b>' . $result['nom'];?></div>
        <button class="boutonProfil"><?php echo htmlentities(trim($_SESSION['email'])); ?></button>
        <button class="boutonMDP">password</button>
        <button class="boutonSexe"><?php echo $result['sexe']; ?></button>
        <button class="boutonTelephone">0<?php echo $result['phone']; ?></button>
        <button class="boutonEcurie"><?php echo $result['ecurie']; ?></button>
        <button class="boutonDocteur">Dr.<?php echo $result['medecin']; ?></button>
        <button class="boutonAnniversaire"><?php echo $result['dateDeNaissance']; ?></button>
    </div>
</div>
</body>
</html>
