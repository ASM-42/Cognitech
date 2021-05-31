<?php
session_start();

$bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");

$email = $_SESSION['email'];

$sql = $bdd -> query('SELECT * FROM users WHERE email="'.$email.'"');
$result = $sql -> fetch();
$ecurie = $result['ecurie'];

$role_utilisateur = $result['role'];

if ($role_utilisateur != 'gestionnaire') {header ('Location: erreur404_en.html');exit();}

$membres = $bdd->query("
SELECT * FROM users
WHERE role != 'admin'
AND role != 'gestionnaire'
AND ecurie = '$ecurie'
ORDER BY FIELD (role, 'inconnu', 'pilote')
");

?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil Gestionnaire</title>
    <link href="../css/Borderau_Bleu.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../css/rechercher.css">
    <link rel="stylesheet" type="text/css" href="../css/administration.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
<div class="navbarBleue">
    <h1 class="colorBleu titre">Pilots</h1>
    <a class="recherche colorActif" href="">Home</a>
    <a class="compte" href="rechercher.php">Search</a>
    <a class="compte" href="profil.php">My account</a>
    <a class="FAQ" href="FAQ_admin.php">FAQ</a>
    <a class="CGU" href="CGU.php">T&Cs</a>
    <a class="MentionsLegales" href="MentionsLegales.php">Legal Notice</a>
    <a class="support" href="contact.php">Support</a>
    <a class="deconnecter" href="../index.html">Log Out</a>

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
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Status</th>
                          <th>Role</th>
                          <th>Edit</th> 
                          <th>Delete</th>
                          </tr>";

        while ($dbRow = $membres->fetch(PDO::FETCH_ASSOC)) {
            $id = $dbRow['id'];
            $prenom = $dbRow['prenom'];
            $nom = $dbRow['nom'];
            $role = $dbRow['role'];
            $status = 'En attente de validation';
            $confirmer = 'Confirmer le rôle';
            $check_inconnu = '';
            $check_gestionnaire = '';
            $check_pilote = '';
            $couleur = 'vert';


            if ($role != 'inconnu') {
                $status = 'Confirmé';


                if ($status = 'Confirmé') {
                    $confirmer = 'Modifier le rôle';
                }
                if ($role == 'pilote') {
                    $check_pilote = 'checked';
                } else {
                    $check_gestionnaire = 'checked';
                }
            } else {
                $couleur = 'rouge';
                $check_inconnu = 'checked';
            }




            { echo "<tr>
<form action='../transition/gestionnaire_validate.php?id=".$id."' method='post'>
                        <td>$id</td>
                        <td>$prenom</td>
                        <td>$nom</td>
                        <td class='$couleur'>$status</td>
                        <td><input type='radio' name='role' value='inconnu' $check_inconnu/>Unknown
                        <input type='radio' name='role' value='pilote' $check_pilote/>Pilots
                        </td>
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

<!--<td><input type='text' class='boutonRole' name='role' value='$role'</td>-->