<?php
session_start();
include("connect.php");

$role=$_POST['role'];

$bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");

$email = $_SESSION['email'];
$sql = $bdd -> query('SELECT * FROM users WHERE email="'.$email.'"');
$result = $sql -> fetch();
$role_utilisateur = $result['role'];



$membres = $bdd->query('
SELECT * FROM users
');
$m = $membres->fetch();

// Create connection
$conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];

if (isset($_POST['edit'])) {
    $sql = 'UPDATE users SET 
    role = "'.mysqli_escape_string($conn, $_POST['role']).'"
    WHERE id="'.$id.'"';
}

if (isset($_POST['delete'])) {
    $sql = 'DELETE FROM users
    WHERE id="'.$id.'"';
}

if (isset($_POST['add'])) {
    $sql = 'INSERT INTO users (md5, prenom, nom, email, role, ecurie) VALUES("'.mysqli_escape_string($connexion, md5($_POST['mdp1'])).'", 
                "'.mysqli_escape_string($conn, $_POST['prenom']).'", 
                "'.mysqli_escape_string($conn, $_POST['nom']).'", 
                "'.mysqli_escape_string($conn, $_POST['email']).'",
                "'.mysqli_escape_string($conn, $_POST['role']).'", 
                "'.mysqli_escape_string($conn, $_POST['ecurie']).'"
                )';
}


/*if (isset($_POST['delete'])) {
    $sql = 'DELETE FROM users
    WHERE id="'.$m['id'].'"';
}*/


if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
    if ($role_utilisateur == 'admin') {
        header('Location:../views/accueil_admin.php');
    } else {
        header('Location:../views/accueil_gestionnaire.php');
    }

} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>



