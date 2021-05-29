<?php session_start();

$bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");
$id = $_SESSION['id'];

$sql = $bdd -> query('SELECT * FROM users WHERE id="'.$id.'"');
$result = $sql -> fetch();
$email = $result['email'];
$_SESSION['role'] = $result['role'];
?>
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


$sql2 = $bdd -> query('SELECT date, freq, refl, temperature, testnumber FROM statistique   WHERE email="'.$email.'"  ORDER BY testnumber DESC');
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
    <?php if ($_SESSION['role'] == 'pilote'): ?>
        <a class="recherche colorActif" href="#">Mes statistiques</a>
    <?php elseif ($_SESSION['role'] == 'admin'): ?>
        <a class="recherche" href="accueil_admin.php">Accueil</a>
    <?php else: ?>
        <a class="recherche" href="accueil_gestionnaire.php">Accueil</a>
    <?php endif; ?>
    <?php if ($_SESSION['role'] == 'admin'): ?>
    <?php elseif ($_SESSION['role'] == 'pilote'): ?>
    <?php else: ?>
        <a class="compte" href="rechercher.php">Rechercher</a>
    <?php endif; ?>
    <?php if ($_SESSION['role'] == 'admin'): ?>
        <a class="compte colorActif" href="">Mon Compte</a>
    <?php elseif ($_SESSION['role'] == 'pilote'): ?>
        <a class="compte" href="profil.php?<?php echo $id?>">Mon Compte</a>
    <?php else: ?>
        <a class="troisieme colorActif" href="">Mon Compte</a>
    <?php endif; ?>
    <a class="FAQ" href="FAQ.php">FAQ</a>
    <a class="CGU" href="CGU.php">CGU</a>
    <a class="MentionsLegales" href="MentionsLegales.php">Mentions Légales</a>
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

<div class="main" >
    <div class="header">
        <div class="headerProfil"><img src="../images/imagePageProfil/icons8-contacts-256.png" id="imagecontact"> <?php echo $result['prenom'] . ' ' .  '<b>' . $result['nom'];?></div>

        <!-- <div class="supprimer">

            <img src="images/poubelle.png">
        </div> -->
    </div>


    <div id="graph"  >
        <canvas id="myChart" style="width: 80%"></canvas>
    </div>

    <script>
        var freq = [];
        var temp = [];
        var refl = [];
        var date = [];

        <?php echo " freq = '".implode("<>", $tableaufreq)."'.split('<>');"; ?>

        <?php echo " date = '".implode("<>", $tableaudate)."'.split('<>');"; ?>

        <?php echo " temp = '".implode("<>", $tableautemp)."'.split('<>');"; ?>

        <?php echo " refl = '".implode("<>", $tableaurefl)."'.split('<>');"; ?>

        const reversed1 = freq.reverse();
        const reversed2 = date.reverse();
        const reversed3 = refl.reverse();
        const reversed4 = temp.reverse();

        const data = {
            labels:reversed2,
            datasets: [{
                label: 'Evolution de la température en fonction du temps',
                backgroundColor: 'rgb(286, 286, 286)',
                borderColor: 'rgb(255, 99, 132)',
                data: reversed4,
            },{
                label: 'Evolution des réflexes en fonction du temps',
                backgroundColor: 'rgb(120, 240, 78)',
                borderColor: 'rgb(0, 166, 166)',
                data: reversed3,
            },{
                label: 'Evolution de la fréquence en fonction du temps',
                backgroundColor: 'rgb(220, 240, 60)',
                borderColor: 'rgb(128, 0, 64)',
                data: reversed1,
            }]
        };


        const config = {
            type: 'line',
            data,
            options: {

            }
        };

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );


    </script>

    <div class="PartieDroite">
        <table>
            <caption>Evolution des statistiques</caption>
            <tr>
                <th></th>
                <th>Température <br> °C</th>
                <th>Fréquence cardiaque <br> BPM</th>
                <th>Réflexe <br> ms</th>
            </tr>
            <?php
            for ($i = 0; $i < $size; $i++) {
                ?>
                <tr>
                    <td><?php echo $tableaudate[$i]?></td>
                    <td><?php echo $tableautemp[$i]?></td>
                    <td><?php echo $tableaufreq[$i]?></td>
                    <td><?php echo $tableaurefl[$i]?></td>
                </tr>
                <?php
            }


            ?>

        </table>
    </div>






</body>
</html>
