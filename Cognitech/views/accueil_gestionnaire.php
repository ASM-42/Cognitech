<?php
session_start();

$bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");

$email = $_SESSION['email'];

$sql = $bdd -> query('SELECT * FROM users WHERE email="'.$email.'"');
$result = $sql -> fetch();
$ecurie = $result['ecurie'];

$role_utilisateur = $result['role'];

if ($role_utilisateur != 'gestionnaire') {header ('Location: erreur404.html');exit();}

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
    <h1 class="colorBleu titre">Mes&nbsp;pilotes</h1>
    <a class="recherche colorActif" href="">Accueil</a>
    <a class="compte" href="rechercher.php">Rechercher</a>
    <a class="troisieme" href="profil.php">Mon Compte</a>
    <a class="FAQ" href="FAQ.php">FAQ</a>
    <a class="CGU" href="CGU.php">CGU</a>
    <a class="MentionsLegales" href="MentionsLegales.php">Mentions Légales</a>
    <a class="support" href="contact.php">Support</a>
    <a class="deconnecter" href="../transition/logout.php">Se Deconnecter</a>

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
        echo "<table id='users'>
            <tr>
                          <th colspan='7'>Ajouter un utilisateur</th>
                          
                          </tr>";

        echo "<tr>
<form action='../transition/admin_validate.php' method='post'>
                        <td><input class='zone' type='text' name='prenom' placeholder='Prénom' required/></td>
                        <td><input class='zone' type='text' name='nom' placeholder='Nom' required/></td>
                        <td><input type='text' name='email' placeholder='Email' required/></td>
                        <td><input class='zone' type='password' name='mdp1' placeholder='Mot de passe' required/></td>
                        <td><input class='zone' type='text' name='ecurie' placeholder='Ecurie' required/></td>
                        <td><input class='zone' type='text' name='role' placeholder='Rôle' required/></td>
                       
                        
<td>
<input type='submit' value='Ajouter' name='add'>
</td>
</form>
                      </tr>";

        echo "<table id='users'>
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
                        <td><input type='radio' name='role' value='inconnu' $check_inconnu/>Inconnu
                        <input type='radio' name='role' value='pilote' $check_pilote/>Pilote
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