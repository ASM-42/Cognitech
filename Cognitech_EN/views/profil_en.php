<?php
session_start();
if(isset($_GET['id'])) {
    $_SESSION['id'] = $_GET['id'];
}

if (!isset($_SESSION['email'])) {header ('Location: inscription_connexion/se_connecter_en.php');exit();}
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
        <a class="recherche" href="StatistiquePilote_en.php">Mes statistiques</a>
    <?php elseif ($result['role'] == 'admin'): ?>
        <a class="recherche" href="accueil_admin_en.php">Accueil</a>
    <?php else: ?>
        <a class="recherche" href="accueil_gestionnaire_en.php">Accueil</a>
    <?php endif; ?>
    <?php if ($result['role'] == 'admin'): ?>
    <?php elseif ($result['role'] == 'pilote'): ?>
    <?php else: ?>
        <a class="compte" href="rechercher_en.php">Rechercher</a>
    <?php endif; ?>
    <?php if ($result['role'] == 'admin'): ?>
        <a class="compte colorActif" href="">Mon Compte</a>
    <?php elseif ($result['role'] == 'pilote'): ?>
        <a class="compte colorActif" href="">Mon Compte</a>
    <?php else: ?>
        <a class="troisieme colorActif" href="">Mon Compte</a>
    <?php endif; ?>
    <a class="FAQ" href="FAQ_en.php">FAQ</a>
    <a class="CGU" href="CGU_en.php">CGU</a>
    <a class="MentionsLegales" href="MentionsLegales_en.php">Mentions Légales</a>
    <a class="support" href="contact_en.php">Support</a>
    <script>
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
    </script>
    <a class="deconnecter" href="../transition/logout_en.php">Se Deconnecter</a>

    <!-- <div id="google_translate_element"></div>
     <script type="text/javascript">
         function googleTranslateElementInit() {
             new google.translate.TranslateElement({pageLanguage: 'fr'}, 'google_translate_element');
         }
     </script>

     <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
 -->
</div>
<div class="pageProfil">
    <div class = "profil">
        <div class="headerProfil"><img src="../images/imagePageProfil/icons8-utilisateur-96.png" id="imagecontact"> <?php echo $result['prenom'] . ' ' .  '<b>' . $result['nom'];?></div>

        <form action="../transition/profile_update_en.php" method="post">
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
