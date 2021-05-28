<?php
include("connect.php");

$role=$_POST['role'];
$bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");

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

/*if (isset($_POST['delete'])) {
    $sql = 'DELETE FROM users
    WHERE id="'.$m['id'].'"';
}*/


if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
    header('Location:../views/accueil_admin.php');
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>



