<?php
session_start();
if (!isset($_SESSION['email'])) {header ('Location: inscription_connexion/se_connecter.php');exit();}
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>page_profil</title>
    <link href="../css/Borderau_Bleu.css" rel="stylesheet"/>
    <link href="../css/pageProfil.css" rel="stylesheet"/>

</head>
<body>
<?php
$bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");
$email = $_SESSION['email'];
$id = $_GET['id'];

$sql = $bdd -> query('SELECT * FROM users WHERE id="'.$id.'"');
$result = $sql -> fetch();
?>

<div class="navbarBleue">
    <?php if ($result['role'] == 'pilote'): ?>
        <a class="recherche colorActif" href="#">Mes statistiques</a>
    <?php elseif ($result['role'] == 'admin'): ?>
        <a class="recherche" href="accueil_admin.php">Accueil</a>
    <?php else: ?>
        <a class="recherche" href="rechercher.php">Rechercher</a>
    <?php endif; ?>
    <a class="compte" href="">Mon Compte</a>
    <a class="FAQ" href="FAQ.php">FAQ</a>
    <a class="CGU" href="CGU.php">CGU</a>
    <a class="support" href="contact.php">Support</a>
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
    <a class="deconnecter" href="inscription_connexion/logout.php">Se Deconnecter</a>
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
