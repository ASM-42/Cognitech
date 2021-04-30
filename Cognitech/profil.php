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

        <form action="profile_update.php" method="post">
        <input type="email" class="boutonProfil" name="email" value="<?php echo htmlentities(trim($_SESSION['email'])); ?>">
<!--        <button class="boutonProfil">--><?php //echo htmlentities(trim($_SESSION['email'])); ?><!--</button>-->
        <button class="boutonMDP">password</button>
        <input type="text" class="boutonSexe" name="sexe" value="<?php echo $result['sexe']; ?>">
<!--        <button class="boutonSexe">--><?php //echo $result['sexe']; ?><!--</button>-->
        <input type="text" class="boutonTelephone" name="phone" value="0<?php echo $result['phone']; ?>">
<!--        <button class="boutonTelephone">0--><?php //echo $result['phone']; ?><!--</button>-->
        <input type="text" class="boutonEcurie" name="ecurie" value="<?php echo $result['ecurie']; ?>">
<!--        <button class="boutonEcurie">--><?php //echo $result['ecurie']; ?><!--</button>-->
        <input type="text" class="boutonDocteur" name="medecin" value="<?php echo $result['medecin']; ?>">
<!--        <button class="boutonDocteur">Dr.--><?php //echo $result['medecin']; ?><!--</button>-->
        <input type="text" class="boutonAnniversaire" name="dateDeNaissance" value="<?php echo $result['dateDeNaissance']; ?>">
<!--        <button class="boutonAnniversaire">--><?php //echo $result['dateDeNaissance']; ?><!--</button>-->
        <input type="submit" name="edit">
        </form>
    </div>
</div>
</body>
</html>