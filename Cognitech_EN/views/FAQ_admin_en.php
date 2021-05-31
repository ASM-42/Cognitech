<?php
session_start();

include("../transition/connect.php");

$bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");
$email = $_SESSION['email'];
$sql2 = $bdd -> query('SELECT * FROM users WHERE email="'.$email.'"');
$result = $sql2 -> fetch();

$sql = $bdd->query('SELECT * FROM faq');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FAQ</title>
    <link href="../css/Borderau_Bleu.css" rel="stylesheet"/>
    <link href="../css/FAQ.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../css/rechercher.css">
    <script type="text/javascript" src="../javascript/FAQ.js" defer></script>
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


<div class="space">
    <ul>
        <?php
        echo "<table id='users'>
                          <tr>
                          <th>Question</th>
                          <th>Answer</th>
                          <th>Edit</th> 
                          <th>Delete</th>
                          </tr>";


        $id = '';
        echo "<tr>
<form action='../transition/FAQ_validate.php?id=".$id."' method='post'>
                        <td><input type='text' name='question' placeholder='Add a question'/></td>
                        <td><input type='text' name='reponse' placeholder='Add an answer'/></td>
<td>
<input type='submit' value='Ajouter' name='add'>
</td>
</form>
                      </tr>";

        while ($dbRow = $sql->fetch(PDO::FETCH_ASSOC)) {
            $id = $dbRow['id'];
            $question = $dbRow['question'];
            $reponse = $dbRow['reponse'];
            $confirmer = 'Modifier';


            { echo "<tr>
<form action='../FAQ_validate.php?id=".$id."' method='post'>
                        <td><input type='textarea' name='question' value='$question'/></td>
                        <td><input type='textarea' name='reponse' value='$reponse'/></td>
<td>
<input type='submit' value='$confirmer' name='edit'>
</td>

<td>
<input type='submit' value='&#10006;' class='center' name='delete'>
</td>
</form>
                      </tr>";}
        }
        ?>
    </ul>
</div>




</body>
</html>