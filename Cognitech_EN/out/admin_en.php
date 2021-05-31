<?php
$bdd = new PDO("mysql:host=localhost;dbname=cognitech", "root", "");

$membres = $bdd->query('SELECT * FROM users');

?>
<html>
<head>
    <title>Interface Administrateur</title>
</head>

<body>
    <ul>
        <?php while($m = $membres->fetch()) { ?>
            <form action="../admin_validate.php" method="post">
        <li><?= $m['id'] ?> : <?= $m['prenom'].' '.$m['nom'] ?>
                <input type="text" class="boutonRole" name="role" value="<?php echo $m['role']; ?>">
                <input type="submit" name="edit">
        </li>
            </form>
        <?php } ?>
    </ul>

</body>
</html>

