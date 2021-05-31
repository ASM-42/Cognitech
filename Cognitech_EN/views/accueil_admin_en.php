<?php
session_start();
//if ($_SESSION['role'] == 'admin') {header ('Location: inscription_connexion/se_connecter_en.php');exit();}

$bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");


$email = $_SESSION['email'];
$sql = $bdd -> query('SELECT * FROM users WHERE email="'.$email.'"');
$result = $sql -> fetch();
$role_utilisateur = $result['role'];
if ($role_utilisateur != 'admin') {header ('Location: erreur404_en.html');exit();}


$membres = $bdd->query("
SELECT * FROM users
WHERE role != 'admin'
ORDER BY FIELD (role, 'inconnu', 'gestionnaire', 'pilote')
");

?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil administrateur</title>
    <link href="../css/Borderau_Bleu.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../css/rechercher.css">
    <link rel="stylesheet" type="text/css" href="../css/administration.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
<div class="navbarBleue">

    <a class="recherche colorActif" href="">Home</a>
    <a class="compte" href="profil.php">My account</a>
    <a class="FAQ" href="FAQ_admin.php">FAQ</a>
    <a class="CGU" href="CGU.php">T&Cs</a>
    <a class="MentionsLegales" href="MentionsLegales.php">Legal Notice</a>
    <a class="support" href="contact.php">Support</a>
    <a class="deconnecter" href="../index.html">Log Out</a>

</div>
<h1 class="colorWhite">Administration Pannel</h1>
<div class="espace">
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
        echo "<table id='users'>
            <tr>
                          <th colspan='7'>Add a User</th>
                          
                          </tr>";

        echo "<tr>
<form action='../transition/admin_validate.php' method='post'>
                        <td><input class='zone' type='text' name='prenom' placeholder='First Name' required/></td>
                        <td><input class='zone' type='text' name='nom' placeholder='Last Name' required/></td>
                        <td><input type='text' name='email' placeholder='Email' required/></td>
                        <td><input class='zone' type='password' name='mdp1' placeholder='Password' required/></td>
                        <td><input class='zone' type='text' name='ecurie' placeholder='Team' required/></td>
                        <td><input class='zone' type='text' name='role' placeholder='Role' required/></td>
                       
                        
<td>
<input type='submit' value='Ajouter' name='add'>
</td>
</form>
                      </tr>";

        echo "<table id='users'>
                          <tr>
                          <th>User ID</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Team</th>
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
            $ecurie = $dbRow['ecurie'];
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
<form action='../transition/admin_validate.php?id=".$id."' method='post'>
                        <td>$id</td>
                        <td>$prenom</td>
                        <td>$nom</td>
                        <td>$ecurie</td>
                        <td class='$couleur'>$status</td>
                        <td><input type='radio' name='role' value='inconnu' $check_inconnu/>Unknown
                        <input type='radio' name='role' value='gestionnaire' $check_gestionnaire/>Manager
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