<?php
session_start();

include("inscription_connexion/connect.php");

$connexion = mysqli_connect(SERVEUR,LOGIN, MDP, BDD);

$sql = $connexion->query('SELECT * FROM faq');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FAQ</title>
    <link href="Borderau_Bleu.css" rel="stylesheet"/>
    <link href="FAQ.css" rel="stylesheet"/>
    <script type="text/javascript" src="FAQ.js" defer></script>
</head>
<body>


<div class="container">

    <h1 class="colorBleu titre">FAQ</h1>
    <a class="recherche" href="rechercher.php">Rechercher</a>
    <a class="compte" href="profil.php">Mon Compte</a>
    <a class="FAQ colorActif" href="">FAQ</a>
    <a class="CGU" href="#CGU">CGU</a>
    <a class="support" href="contact.php">Support</a>
    <a class="deconnecter" href="index.html">Se Deconnecter</a>

    <!-- <div id="google_translate_element"></div>
     <script type="text/javascript">
         function googleTranslateElementInit() {
             new google.translate.TranslateElement({pageLanguage: 'fr'}, 'google_translate_element');
         }
     </script>

     <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
 -->
</div>



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

<button class="boutonQuestions" onclick="on3()">Troisième Question ?</button>
<div id="overlay3" class="overlay">
    <div class="popup">
        <h2>
            Exemple simple de popup
            <span class="btnClose" onclick="off3()">&times;</span>
        </h2>
        <div>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a nulla
            a massa interdum imperdiet sed nec nibh. Proin porttitor euismod nulla ut
            interdum. Cras elementum placerat aliquam.
        </div>
    </div>
</div>

<button class="boutonQuestions" onclick="on4()">Quatrième Question ?</button>
<div id="overlay4" class="overlay">
    <div class="popup">
        <h2>
            Exemple simple de popup
            <span class="btnClose" onclick="off4()">&times;</span>
        </h2>
        <div>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a nulla
            a massa interdum imperdiet sed nec nibh. Proin porttitor euismod nulla ut
            interdum. Cras elementum placerat aliquam.
        </div>
    </div>
</div>

<button class="boutonQuestions" onclick="on5()">Cinquième Question ?</button>
<div id="overlay5" class="overlay">
    <div class="popup">
        <h2>
            Exemple simple de popup
            <span class="btnClose" onclick="off5()">&times;</span>
        </h2>
        <div>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a nulla
            a massa interdum imperdiet sed nec nibh. Proin porttitor euismod nulla ut
            interdum. Cras elementum placerat aliquam.
        </div>
    </div>
</div>-->

<!--<button class="boutonChevronD"></button>-->
<!--
    <button id="btnPopup" class="btnPopup" onclick="on()">Afficher Popup</button>
    <div id="overlay" class="overlay">
        <div id="popup" class="popup">
            <h2>
                Exemple simple de popup
                <span id="btnClose" class="btnClose" onclick="off()">&times;</span>
            </h2>
            <div>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a nulla
                a massa interdum imperdiet sed nec nibh. Proin porttitor euismod nulla ut
                interdum. Cras elementum placerat aliquam.
            </div>
        </div>
    </div>
-->

</body>
</html>