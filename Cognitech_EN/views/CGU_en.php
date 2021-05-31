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
    <title>Terms and Conditions of Use</title>
    <link href="../css/CGU.css" rel="stylesheet"/>
    <link href="../css/Borderau_Bleu.css" rel="stylesheet"/>
</head>
<body>


<div class="navbarBleue">
    <?php if ($result['role'] == 'pilote'): ?>
        <a class="recherche" href="StatistiquePilote.php">My statistics</a>
    <?php elseif ($result['role'] == 'admin'): ?>
        <a class="recherche" href="accueil_admin.php">Home</a>
    <?php else: ?>
        <a class="recherche" href="accueil_gestionnaire.php">Home</a>
    <?php endif; ?>
    <?php if ($result['role'] == 'admin'): ?>
    <?php elseif ($result['role'] == 'pilote'): ?>
    <?php else: ?>
        <a class="compte" href="rechercher.php">Search</a>
    <?php endif; ?>
    <?php if ($result['role'] == 'admin'): ?>
        <a class="compte" href="profil.php">My account</a>
    <?php elseif ($result['role'] == 'pilote'): ?>
        <a class="compte" href="profil.php">My account</a>
    <?php else: ?>
        <a class="troisieme" href="profil.php">My account</a>
    <?php endif; ?>
    <?php if ($result['role'] == 'admin'): ?>
        <a class="FAQ " href="FAQ_admin.php">FAQ</a>
    <?php else: ?>
        <a class="FAQ " href="FAQ.php">FAQ</a>
    <?php endif; ?>
    <a class="CGU colorActif" href="">T&Cs</a>
    <a class="MentionsLegales" href="MentionsLegales.php">Legal Notice</a>
    <a class="support" href="contact.php">Support</a>
    <a class="deconnecter" href="../index.html">Log Out</a>

</div>

<div class="center">
    <h2>Terms and Conditions of Use</h2>
    <p>
        These terms and conditions govern the use of this site www.infinite-measures.fr
        <br/>
        This site is owned and operated by Infinite Measures.
        <br/>
        By using this site, you indicate that you have read and understood the Terms of Use and that you agree to abide by them at all times.        <br/>
        <br/>
        Type of website : medical
    </p>

    <h3>Intellectual Property</h3>
    <p>
        All content published and made available on this site is the property of Infinite Measures and its creators. This includes, but is not limited to, images, texts, logos, documents, downloadable files and everything that contributes to the composition of this site.    </p>

    <h3>Acceptable use</h3>
    <p>
        As a user, you agree to use our site lawfully and not to use this site for any unlawful purpose, namely:
    </p>


    <li>Harassing or abusing other users of the site</li>
    <li>Violate the rights of other site users</li>
    <li>Hack another site user's account</li>
    <li>Act in any way that could be considered fraudulent</li>


    <p>If we believe that you are using this site illegally or in a manner that violates the above acceptable terms of use, we reserve the right to limit, suspend or terminate your access to this site. We also reserve the right to take any legal action necessary to prevent you from accessing our site.
    </p>
    <h3>Accounts</h3>
    <p>
        When you create an account on our site, you agree to the following:
    </p>

    <ol start="1">
        <li>that you are solely responsible for your account and the security and privacy of your account, including any passwords or sensitive information attached to that account, and</li>
        <li>that all personal information you provide to us through your account is current, accurate and truthful and that you will update your personal information if it changes.</li>
    </ol>
    <p>
        We reserve the right to suspend or terminate your account if you use our site illegally or violate the acceptable use policy.
    </p>

    <h3>Limitation of Liability</h3>
    <p>
        Infinite Measures or any of its employees will be held liable for any problems arising from this site. Nevertheless, Infinite Measures and its employees will not be held liable for any problems arising from any improper use of this site.
    </p>
    <h3>Indemnity</h3>
    <p>
        As a user, you hereby indemnify Infinite Measures from any and all liability, costs, causes of action, damages or expenses arising out of your use of this site or your violation of any of the provisions set forth herein.

    </p>
    <h3>Applicable Laws</h3>
    <p>
        This document is subject to the applicable laws in France and aims to comply with its necessary rules and regulations. This includes the EU-wide regulations set forth in the GDPR.

    </p>
    <h3>Divisibility</h3>

    <p>
        If at any time any of the provisions set forth herein are determined to be inconsistent with or invalid under applicable law, such provisions shall be deemed void and shall be removed from this document. All other provisions will not be affected by the laws and the remainder of the document will still be considered valid.
    </p>
    <h3>Amendments</h3>
    <p>
        These terms and conditions may be amended from time to time to maintain compliance with the law and to reflect any changes to the way we operate our site and the way we expect users to behave on our site. We recommend that our users check these terms and conditions from time to time to ensure that they are aware of any updates. If necessary, we will notify users by email of changes to these terms and conditions or post a notice on our site.
    </p>
    <h3>Contact</h3>
    <p>
        Please contact us if you have any questions or concerns. Our contact information is as follows:
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
        <span style="font-style:italic;font-weight:normal;">Effective Date: </span>
        June 27th 2021.</p>

</div>
</body>