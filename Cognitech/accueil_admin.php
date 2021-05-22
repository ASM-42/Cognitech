<?php
session_start();
//if ($_SESSION['role'] == 'admin') {header ('Location: inscription_connexion/se_connecter.php');exit();}

$bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");

$membres = $bdd->query("
SELECT * FROM users
WHERE role != 'admin'
ORDER BY FIELD (role, 'inconnu', 'gestionnaire', 'pilote')
");

?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil Admin</title>
    <link href="Borderau_Bleu.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="rechercher.css">
    <link rel="stylesheet" type="text/css" href="administration.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
<div class="container">
    <h1 class="colorBleu titre">Panneau&nbsp;d'administration</h1>
    <a class="recherche colorActif" href="">Accueil</a>
    <a class="compte" href="profil.php">Mon Compte</a>
    <a class="FAQ" href="FAQ.html">FAQ</a>
    <a class="CGU" href="#CGU">CGU</a>
    <a class="support" href="contact.php">Support</a>
    <a class="deconnecter" href="index.html">Se Deconnecter</a>

</div>

<div class="space">
<ul>
    <?php /*while($m = $membres->fetch()) { */?><!--
        <form action='admin_validate.php?userId=".$userId."' method="post">
            <li><?/*= $m['id'] */?> : <?/*= $m['prenom'].' '.$m['nom'] */?>
                <input type="text" class="boutonRole" name="role" value="<?php /*echo $m['role']; */?>">
                <input type="submit" value="Confirmer le rôle" name="edit">
                <input type="submit" value="Supprimer" name="delete">
            </li>
        </form>
    --><?php /*} */?>


    <?php
    echo "<table id='users' class='table table-bordered'>
                          <tr>
                          <th>ID utilisateur</th>
                          <th>Prénom</th>
                          <th>Nom</th>
                          <th>Status</th>
                          <th>Rôle</th>
                          <th>Editer</th> 
                          <th>Supprimer</th>
                          </tr>";

    while ($dbRow = $membres->fetch(PDO::FETCH_ASSOC)) {
        $id = $dbRow['id'];
        $prenom = $dbRow['prenom'];
        $nom = $dbRow['nom'];
        $role = $dbRow['role'];
        $status = 'En attente de validation';
        $confirmer = 'Confirmer le rôle';
        $check = '';


        if ($role != 'inconnu') {
            $status = 'Confirmé';

            if ($status = 'Confirmé') {
                $confirmer = 'Modifier le rôle';
            }
        }




        { echo "<tr>
<form action='admin_validate.php?id=".$id."' method='post'>
                        <td>$id</td>
                        <td>$prenom</td>
                        <td>$nom</td>
                        <td>$status</td>
                        <td><input type='text' class='boutonRole' name='role' value='$role'</td>
<td>
<input type='submit' value='$confirmer' name='edit'>
</td>

<td>
<input type='submit' value='Supprimer' name='delete'>
</td>
</form>
                      </tr>";}
    }
    ?>
</ul>
</div>


</body>
</html>

<!--<td><input type='text' class='boutonRole' name='role' value='$role'</td>-->