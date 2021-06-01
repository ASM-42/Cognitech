<?php
session_start();

include("../transition/connect.php");

$connexion = mysqli_connect(SERVEUR,LOGIN, MDP, BDD);

$sql = $connexion->query('SELECT * FROM faq');


$bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");
$email = $_SESSION['email'];
$sql2 = $bdd -> query('SELECT * FROM users WHERE email="'.$email.'"');
$result = $sql2 -> fetch();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FAQ</title>
    <link href="../css/Borderau_Bleu.css" rel="stylesheet"/>
    <link href="../css/FAQ.css" rel="stylesheet"/>
    <script type="text/javascript" src="../javascript/FAQ.js" defer></script>
</head>
<body>


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
        <a class="compte" href="profil.php?<?php echo $id?>">Mon Compte</a>
    <?php elseif ($result['role'] == 'pilote'): ?>
        <a class="compte" href="profil.php?<?php echo $id?>">Mon Compte</a>
    <?php else: ?>
        <a class="troisieme" href="profil.php?<?php echo $id?>">Mon Compte</a>
    <?php endif; ?>
    <a class="FAQ colorActif" href="">FAQ</a>
    <a class="CGU" href="CGU.php">CGU</a>
    <a class="MentionsLegales" href="MentionsLegales.php">Mentions Légales</a>
    <a class="support" href="contact.php">Support</a>
    <a class="deconnecter" href="../transition/logout.php">Se Deconnecter</a>
</div>


<div class="center">
    <h2>FAQ</h2>
<?php
$numb = 0;
echo "<div class='marginHaut'>";

while( $r = mysqli_fetch_array($sql)) {
    $question = $r['question'];
    $reponse = $r['reponse'];
    $numb++;


    echo "<button class='boutonQuestions' onclick=\"on$numb()\">$question</button>";
    echo "<div id='overlay$numb' class=\"overlay\">";
    echo "<div class=\"popup\">";
    echo "<h2>
            $question
            <span class=\"btnClose\" onclick=\"off$numb()\">&times;</span>
        </h2>";

    echo "<div>$reponse</div>";
    echo "</div>";
    echo "</div>";
}
echo "</div>";
?>

<!--<button class="boutonQuestion1" onclick="on1()"><?php /*$question*/?></button>
<div id="overlay1" class="overlay">
    <div class="popup">
        <h2>
            Comment contacter l'équipe technique de Infinite Measures?
            <span class="btnClose" onclick="off1()">&times;</span>
        </h2>
        <div>
            Pour nous contacter, il suffit de se rendre de l'onglet "Support" du Bordereaux et de remplit le formulaire de contact mis à disposition
        </div>
    </div>
</div>

<button class="boutonQuestions" onclick="on2()">Comment créer son profil lorsque l'on est pilote?</button>
<div id="overlay2" class="overlay">
    <div class="popup">
        <h2>
            Comment créer son profil lorsque l'on est pilote?
            <span class="btnClose" onclick="off2()">&times;</span>
        </h2>
        <div>
            Pour effectuer cette action, il faut préalablement remplir le formulaire d'inscription, puis ensuite attendre la validation du profil par l'écurie concerné par cette inscription
        </div>
    </div>
</div>
-->

</div>
</body>
</html>