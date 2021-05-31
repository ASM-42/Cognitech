<?php
include("connect_en.php");

$email=$_POST['email'];
$sexe=$_POST['sexe'];
$medecin=$_POST['medecin'];
$phone=$_POST['phone'];
$ecurie = $_POST['ecurie'];
$dateDeNaissance=$_POST['dateDeNaissance'];

// Create connection
$conn = mysqli_connect(SERVEUR, LOGIN, MDP, BDD);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = 'UPDATE users SET 
email= "'.mysqli_escape_string($conn, $_POST['email']).'", 
sexe = "'.mysqli_escape_string($conn, $_POST['sexe']).'", 
phone = "'.mysqli_escape_string($conn, $_POST['phone']).'",
medecin = "'.mysqli_escape_string($conn, $_POST['medecin']).'",
ecurie = "'.mysqli_escape_string($conn, $_POST['ecurie']).'",
dateDeNaissance = "'.mysqli_escape_string($conn, $_POST['dateDeNaissance']).'"
WHERE email="'.$email.'"';

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
    header('Location:../views/profil_en.php');
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>



