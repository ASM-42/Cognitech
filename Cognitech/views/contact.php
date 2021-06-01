<?php
session_start();

$bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");
$email = $_SESSION['email'];
$sql = $bdd -> query('SELECT * FROM users WHERE email="'.$email.'"');
$result = $sql -> fetch();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nous Contacter</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/nous-contacter.css">
    <link href="../css/Borderau_Bleu.css" rel="stylesheet"/>
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
                <a class="compte" href="profil.php">Mon Compte</a>
            <?php elseif ($result['role'] == 'pilote'): ?>
                <a class="compte" href="profil.php">Mon Compte</a>
            <?php else: ?>
                <a class="troisieme" href="profil.php">Mon Compte</a>
            <?php endif; ?>
            <?php if ($result['role'] == 'admin'): ?>
                <a class="FAQ " href="FAQ_admin.php">FAQ</a>
            <?php else: ?>
                <a class="FAQ " href="FAQ.php">FAQ</a>
            <?php endif; ?>
            <a class="CGU" href="CGU.php">CGU</a>
            <a class="MentionsLegales" href="MentionsLegales.php">Mentions Légales</a>
            <a class="support colorActif" href="">Support</a>
            <a class="deconnecter" href="../transition/logout.php">Se Deconnecter</a>
        </div>

        <div class="center">
            <h2>NOUS CONTACTER</h2>
        <div class="space">
            <div class="formulaire">
                <form method="post">
                    <input type="text" class="prenom" name="prenom" placeholder="Prénom" required><br>
                    <input type="text" class="nom" name="nom" placeholder="Nom" required><br>
                    <input type="email" class="email" name="mail" placeholder="Email" required><br>
                    <input type="tel" class="telephone" name="numero" placeholder="Téléphone"><br>
                    <input type="text" class="objet" name="Objet" placeholder="Objet"><br>
                    <textarea name="message" class="message" placeholder="Message" required></textarea><br>
                    <button type="submit" class="envoyer">Envoyer</button>
                </form>

                <?php
                $AdresseMail = "app20202021g9c@gmail.com";

                if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['numero']) && isset($_POST['Objet'])) {
                    // entête , toujours comme ça
                    $header="MIME-Version: 1.0\r\n";
                    $header.="From: CogniTech <".$_POST['mail'].">\r\n";
                    $header.='Content-Type:text/html; charset="uft-8"'."\n";
                    $header.='Content-Transfer-Encoding: 8bit';

                    $Message=htmlentities($_POST['message'],ENT_QUOTES,"UTF-8");
                    // mise en page du format
                    $message='
                <html lang="fr">
                    <body>
                        <div align="center">
                        <u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
					    <u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
					    <br />
                           '.nl2br($Message).'
                           <br/>
                           <p style="border: #5172DF solid 2px; background-color: #FBF778">Test Bannière</p>
                        </div>
                    </body>
                </html>
                ';

                    $Sujet='=?UTF-8?B?'.base64_encode($_POST['Objet']).'?=';

                    if(mail($AdresseMail,$Sujet,$message,$header)) {
                        echo "Le mail à été envoyé avec succès!";
                    }else {
                        echo "Une erreur est survenue, le mail n'a pas été envoyé";
                    }
                }

                ?>
            </div>
        </div>
        </div>
    </body>
</html>
