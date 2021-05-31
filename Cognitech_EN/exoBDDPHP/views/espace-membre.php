<?php
session_start();
if (!isset($_SESSION['login'])) {header ('Location: index.php');exit();}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Espace membre</title>
    <link href="../style.css" rel="stylesheet"/>
</head>
<body>
<main class="main">
<p><strong>ESPACE MEMBRES</strong><br/>
    Bienvenue <?php echo htmlentities(trim($_SESSION['login'])); ?> !<br/>
    <a href="../models/deconnexion.php">Déconnexion</a>
</p>
</main>

<div class="navbar">
    <a href="#item1">Accueil</a>
    <a href="tweet.php">Tweet</a>
    <a href="all.php">Utilisateurs</a>
    <a href="question1.php">1</a>
    <a href="question2.php">2</a>
    <a href="question5.php">5</a>
</div>
</body>
</html>
