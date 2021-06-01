<?php
include("connect.php");

$bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");

$faq = $bdd->query('
SELECT * FROM faq
');
$m = $faq->fetch();

// Create connection
$conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];

if (isset($_POST['edit'])) {
    $sql = 'UPDATE faq SET 
    question = "'.mysqli_escape_string($conn, $_POST['question']).'",
    reponse = "'.mysqli_escape_string($conn, $_POST['reponse']).'"
    WHERE id="'.$id.'"';
}

if (isset($_POST['delete'])) {
    $sql = 'DELETE FROM faq
    WHERE id="'.$id.'"';
}

if (isset($_POST['add'])) {
    $sql = 'INSERT INTO faq (question, reponse)
    VALUES 
    ("'.mysqli_escape_string($conn, $_POST['question']).'",
    "'.mysqli_escape_string($conn, $_POST['reponse']).'")';
}


if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
    header('Location:../views/FAQ_admin.php');
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>



