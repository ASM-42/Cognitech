<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="nous-contacter.css">
    <link href="Borderau_Bleu.css" rel="stylesheet"/>
    <title>Nous Contacter</title>
</head>

    <body>
        <div class="container">
            <a class="recherche" href="#recherche">Rechercher</a>
            <a class="compte" href="#compte">Mon Compte</a>
            <a class="FAQ " href="FAQinvite.html">FAQ</a>
            <a class="CGU" href="#CGU">CGU</a>
            <a class="support colorActif" href="contact.html">Support</a>
            <a class="deconnecter" href="index.html">Se Deconnecter</a>
        </div>

        <div class="space">
            <h1 class="colorBleu">NOUS CONTACTER</h1>
            <div class="formulaire">
                <form method="post">
                    <input type="text" class="prenom" name="prenom" placeholder="Prénom" required><br>
                    <input type="text" class="nom" name="nom" placeholder="Nom" required><br>
                    <input type="email" class="email" name="mail" placeholder="Email" required><br>
                    <input type="tel" class="telephone" name="numero" placeholder="Téléphone"><br>
                    <input type="text" class="objet" name="Objet" placeholder="Objet"><br>
                    <textarea name="message" class="message" placeholder="Message" required></textarea><br>
                    <button type="submit" class="envoyer"></button>
                </form>

                <?php
                $AdresseMail = "bandiougou.ndiaye@eleve.isep.fr"; // inventer un mail support plustard...

                if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['numero']) && isset($_POST['Objet'])) {
                    // entête , toujours comme ça
                    $header="MIME-Version: 1.0\r\n";
                    $header.="From: CogniTech <".$_POST['mail'].">\r\n";
                    $header.='Content-Type:text/html; charset="uft-8"'."\n";
                    $header.='Content-Transfer-Encoding: 8bit';

                    $Message=htmlentities($_POST['message'],ENT_QUOTES,"UTF-8");
                    // mise en page du format
                    $message='
                <html>
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
                } else{
                    echo 'Tout les champs ne sont pas remplis!';
                }

                ?>
            </div>
        </div>

    </body>
</html>
