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

function vidertableau($input)
{
    $size = count($input);
    for($i = 0; $i < $size; $i++) {
        unset($input[$i]);
    }
    return $input;
}


?>
<body>

<div class="container">
    <?php if ($_SESSION['role'] == 'pilote'): ?>
        <a class="recherche colorActif" href="#">My statistics</a>
    <?php elseif ($_SESSION['role'] == 'admin'): ?>
        <a class="recherche" href="accueil_admin_en.php">Home</a>
    <?php else: ?>
        <a class="recherche" href="accueil_gestionnaire_en.php">Home</a>
    <?php endif; ?>
    <?php if ($_SESSION['role'] == 'admin'): ?>
    <?php elseif ($_SESSION['role'] == 'pilote'): ?>
    <?php else: ?>
        <a class="compte" href="rechercher_en.php">Search</a>
    <?php endif; ?>
    <?php if ($_SESSION['role'] == 'admin'): ?>
        <a class="compte colorActif" href="">My Account</a>
    <?php elseif ($_SESSION['role'] == 'pilote'): ?>
        <a class="compte" href="profil_en.php?<?php echo $id?>">My Account</a>
    <?php else: ?>
        <a class="troisieme colorActif" href="">My Account</a>
    <?php endif; ?>
    <a class="FAQ" href="FAQ_en.php">FAQ</a>
    <a class="CGU" href="CGU_en.php">T&Cs</a>
    <a class="MentionsLegales" href="MentionsLegales_en.php">Legal Notice</a>
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
    <a class="deconnecter" href="../index_en.html">Log out</a>

</div>

<div class="main" >
    <div class="header">
        <div class="headerProfil"><img src="../images/imagePageProfil/icons8-contacts-256.png" id="imagecontact"> <?php echo $result['prenom'] . ' ' .  '<b>' . $result['nom'];?></div>

        <!-- <div class="supprimer">

            <img src="images/poubelle.png">
        </div> -->
    </div>
    <form action="StatistiquePilote_en.php" method="post" >
        <label for="debut">Start Date</label>
        <input type="date" min = "<?php echo end($tableaudate)?>" max="<?php echo $tableaudate[0]?>" name="debut" value="<?php if(!isset($_POST['debut'])){echo end($tableaudate);} else { echo $_POST['debut']; }?>" >

        <label for = "fin">End Date</label>
        <input type="date" min = "<?php echo end($tableaudate)?>" max="<?php echo $tableaudate[0]?>" name="fin"  value="<?php if( !isset($_POST['fin'])){echo $tableaudate[0] ;} else { echo $_POST['fin']; }?>">

        <input type="submit" value = "valider" >
    </form>



    <?php
    if(isset($_POST['debut']) && isset($_POST['fin'])) {


        $sql3 = $bdd -> query('SELECT date , freq, refl, temperature, testnumber FROM statistique   WHERE email="'.$email.'" AND date >= "'.$_POST['debut'].'"  AND date <= "'.$_POST['fin'].'" ORDER BY testnumber DESC');

        $i=0;
        $tableaudate = vidertableau($tableaudate);
        $tableaurefl = vidertableau($tableaurefl);
        $tableaufreq = vidertableau($tableaufreq);
        $tableaunombre = vidertableau($tableaunombre);
        $tableautemp = vidertableau($tableautemp);


        while($result3 = $sql3 -> fetch()) {
            $tableaudate[$i] = $result3['date'];
            $tableaufreq[$i] = $result3['freq'];
            $tableaurefl[$i] = $result3['refl'];
            $tableautemp[$i] = $result3['temperature'];
            $tableaunombre[$i] = $result3['testnumber'];
            $i++;

        }

        $size = count($tableaudate);


    }



    ?>


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
                label: "Temperature's evolution as a function of time",
                backgroundColor: 'rgb(286, 286, 286)',
                borderColor: 'rgb(255, 99, 132)',
                data: reversed4,
            },{
                label: "Reflex's evolution as a function of time",
                backgroundColor: 'rgb(120, 240, 78)',
                borderColor: 'rgb(0, 166, 166)',
                data: reversed3,
            },{
                label: "Heartbeat's evolution as a function of time",
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
            <caption>Statistic's evolution </caption>
            <tr>
                <th></th>
                <th>Temperature <br> °C</th>
                <th>Heartbeat<br> BPM</th>
                <th>Reflex <br> ms</th>
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
