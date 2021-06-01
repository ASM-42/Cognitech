<?php
session_start();
if(isset($_GET['id'])) {
    $_SESSION['id'] = $_GET['id'];
}

if (!isset($_SESSION['email'])) {header ('Location: inscription_connexion/se_connecter.php');exit();}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon profil</title>
    <link href="../css/Borderau_Bleu.css" rel="stylesheet"/>
    <link href="../css/pageProfil.css" rel="stylesheet"/>
</head>
<body>
<?php
$bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");
$email = $_SESSION['email'];

$sql = $bdd -> query('SELECT * FROM users WHERE email="'.$email.'"');
$result = $sql -> fetch();
?>

<div class="navbarBleue">
    <?php if ($result['role'] == 'pilote'): ?>
        <a class="recherche" href="StatistiquePilote.php">Mes statistiques</a>
    <?php elseif ($result['role'] == 'admin'): ?>
        <a class="recherche" href="accueil_admin.php">Accueil</a>
    <?php else: ?>
        <a class="recherche" href="accueil_gestionnaire.php">Accueil</a>
    <?php endif; ?>
    <?php if ($result['role'] == 'admin'): ?>
    <?php elseif ($result['role'] == 'pilote'): ?>
    <?php else: ?>
        <a class="compte" href="rechercher.php">Rechercher</a>
    <?php endif; ?>
    <?php if ($result['role'] == 'admin'): ?>
        <a class="compte colorActif" href="">Mon Compte</a>
    <?php elseif ($result['role'] == 'pilote'): ?>
        <a class="compte colorActif" href="">Mon Compte</a>
    <?php else: ?>
        <a class="troisieme colorActif" href="">Mon Compte</a>
    <?php endif; ?>
    <?php if ($result['role'] == 'admin'): ?>
        <a class="FAQ " href="FAQ_admin.php">FAQ</a>
    <?php else: ?>
        <a class="FAQ " href="FAQ.php">FAQ</a>
    <?php endif; ?>
    <a class="CGU" href="CGU.php">CGU</a>
    <a class="MentionsLegales" href="MentionsLegales.php">Mentions Légales</a>
    <a class="support" href="contact.php">Support</a>
    <!--<script>
        $('#LogoutButton').click(function() {
            var request = $.ajax({
                url: "/inscription_connexion/logout.php",
                type: "GET"
            });

            request.done(function(msg) {
                alert("Logged Out");
            });

            request.fail(function(jqXHR, textStatus) {
                alert("Error on Logging Out");
            });
        });
    </script>-->
    <a class="deconnecter" href="../transition/logout.php">Se Deconnecter</a>

</div>
<div class="pageProfil">
    <div class = "profil">
        <div class="headerProfil"><img src="../images/imagePageProfil/icons8-utilisateur-96.png" id="imagecontact"> <div><?php echo $result['prenom'] . ' ' .  '<b>' . $result['nom'];?></div></div>

        <form action="../transition/profile_update.php" method="post">
            <input type="email" class="boutonProfil case" name="email" value="<?php echo htmlentities(trim($_SESSION['email'])); ?>">
            <!--        <button class="boutonProfil">--><?php //echo htmlentities(trim($_SESSION['email'])); ?><!--</button>-->
            <button class="boutonMDP case">password</button>
            <input type="text" class="boutonSexe case" name="sexe" value="<?php echo $result['sexe']; ?>">
            <!--        <button class="boutonSexe">--><?php //echo $result['sexe']; ?><!--</button>-->
            <input type="text" class="boutonTelephone case" name="phone" value="0<?php echo $result['phone']; ?>">
            <!--        <button class="boutonTelephone">0--><?php //echo $result['phone']; ?><!--</button>-->

            <?php if ($result['role'] != 'admin'): ?>
                <input type="text" class="boutonEcurie case" name="ecurie" value="<?php echo $result['ecurie']; ?>">
            <?php else: ?>
            <?php endif; ?>

            <?php if ($result['role'] == 'gestionnaire'): ?>
            <?php else: ?>
                <input type="text" class="boutonDocteur case" name="medecin" value="<?php echo $result['medecin']; ?>">
            <?php endif; ?>

            <!--        <button class="boutonDocteur">Dr.--><?php //echo $result['medecin']; ?><!--</button>-->
            <input type="text" class="boutonAnniversaire case" name="dateDeNaissance" value="<?php echo $result['dateDeNaissance']; ?>">
            <!--        <button class="boutonAnniversaire">--><?php //echo $result['dateDeNaissance']; ?><!--</button>-->
            <input type="submit" name="edit" style="margin: auto auto auto 0;">
        </form>
    </div>
</div>
</body>
</html>
