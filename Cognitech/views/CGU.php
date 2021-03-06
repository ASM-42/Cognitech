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
    <title>Conditions Générales d'Utilisation</title>
    <link href="../css/CGU.css" rel="stylesheet"/>
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
    <a class="CGU colorActif" href="">CGU</a>
    <a class="MentionsLegales" href="MentionsLegales.php">Mentions Légales</a>
    <a class="support" href="contact.php">Support</a>
    <a class="deconnecter" href="../transition/logout.php">Se Deconnecter</a>

</div>

<div class="center">
    <h2>Conditions Générales d'Utilisation</h2>
    <p>
        Les présentes conditions générales régissent l'utilisation de ce site www.infinite-measures.fr
        <br/>
        Ce site appartient et est géré par Infinite Measures.
        <br/>
        En utilisant ce site, vous indiquez que vous avez lu et compris les conditions d'utilisation et que vous acceptez de les respecter en tout temps.
        <br/>
        <br/>
        Type de site : médical

    </p>

    <h3>Propriété intellectuelle</h3>
    <p>
        Tout contenu publié et mis à disposition sur ce site est la propriété de Infinite Measures et de ses créateurs. Cela comprend, mais n'est pas limité aux images, textes, logos, documents, fichiers téléchargeables et tout ce qui contribue à la composition de ce site.
    </p>

    <h3>Utilisation acceptable</h3>
    <p>
        En tant qu'utilisateur, vous acceptez d'utiliser notre site légalement et de ne pas utiliser ce site pour des fins illicites, à savoir :

    </p>


    <li>Harceler ou maltraiter les autres utilisateurs du site</li>
    <li>Violer les droits des autres utilisateurs du site</li>
    <li>Pirater le compte d'un autre utilisateur du site</li>
    <li>Agir de toute façon qui pourrait être considérée comme frauduleuse</li>


    <p> Si nous estimons que vous utilisez ce site illégalement ou d'une manière qui viole les conditions d'utilisation acceptable ci-dessus, nous nous réservons le droit de limiter, suspendre ou résilier votre accès à ce site. Nous nous réservons également le droit de prendre toutes les mesures juridiques nécessaires pour vous empêcher d'accéder à notre site.
    </p>
    <h3>Comptes</h3>
    <p>
        Lorsque vous créez un compte sur notre site, vous acceptez ce qui suit :
    </p>
    <ol start="1">
        <li>que vous êtes seul responsable de votre compte et de la sécurité et la confidentialité de votre compte, y compris les mots de passe ou les renseignements de nature délicate joints à ce compte, et</li>
        <li>que tous les renseignements personnels que vous nous fournissez par l'entremise de votre compte sont à jour, exacts et véridiques et que vous mettrez à jour vos renseignements personnels s'ils changent.</li>
    </ol>
    <p>
        Nous nous réservons le droit de suspendre ou de résilier votre compte si vous utilisez notre site illégalement ou si vous violez les conditions d'utilisation acceptable.
    </p>

    <h3>Limitation de responsabilit&eacute;</h3>
    <p>
        Infinite Measures ou l'un de ses employés sera tenu responsable de tout problème découlant de ce site. Néanmoins, Infinite Measures et ses employés ne seront pas tenus responsables de tout problème découlant de toute utilisation irrégulière de ce site.
    </p>
    <h3>Indemnité</h3>
    <p>
        En tant qu'utilisateur, vous indemnisez par les présentes Infinite Measures de toute responsabilité, de tout coût, de toute cause d'action, de tout dommage ou de toute dépense découlant de votre utilisation de ce site ou de votre violation de l'une des dispositions énoncées dans le présent document.

    </p>
    <h3>Lois applicables</h3>
    <p>
        Ce document est soumis aux lois applicables en France et vise à se conformer à ses règles et règlements nécessaires. Cela inclut la réglementation à l'échelle de l'UE énoncée dans le RGPD.

    </p>
    <h3>Divisibilité</h3>
    <p>
        Si, à tout moment, l'une des dispositions énoncées dans le présent document est jugée incompatible ou invalide en vertu des lois applicables, ces dispositions seront considérées comme nulles et seront retirées du présent document. Toutes les autres dispositions ne seront pas touchées par les lois et le reste du document sera toujours considéré comme valide.
    </p>
    <h3>Modifications</h3>
    <p>
        Ces conditions générales peuvent être modifiées de temps à autre afin de maintenir le respect de la loi et de refléter tout changement à la façon dont nous gérons notre site et la façon dont nous nous attendons à ce que les utilisateurs se comportent sur notre site. Nous recommandons à nos utilisateurs de vérifier ces conditions générales de temps à autre pour s&rsquo;assurer qu'ils sont informés de toute mise à jour. Au besoin, nous informerons les utilisateurs par courriel des changements apportés à ces conditions ou nous afficherons un avis sur notre site.
    </p>
    <h3>Contact</h3>
    <p>
        Veuillez communiquer avec nous si vous avez des questions ou des préoccupations. Nos coordonnées sont les suivantes :
        <br/>
        <br/>
        01 45 23 45 12
        <br/>
        <br/>
        cognitech@gmail.com
        <br/>
        <br/>
        28 rue Notre Dame des Champs, 75006 Paris
    </p>
    <p style="text-align:Right;">
        <span style="font-style:italic;font-weight:normal;">Date d'entrée en vigueur : </span>
        le 27 juin 2021.</p>

</div>
</body>