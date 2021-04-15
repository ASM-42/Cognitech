<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Inscription</title>
</head>
<body>
Inscription à l'espace membre :<br/>
<form action="../models/verification.php" method="post">
    Login&nbsp<input type="text" name="login" value=""><br />
    Prenom&nbsp;<input type="text" name="prenom" value=""><br />
    Nom&nbsp;<input type="text" name="nom" value=""><br />
    Date de naissance&nbsp;<input type="date" name="dateDeNaissance" value=""><br />
    Email&nbsp;<input type="email" name="email" value=""><br />
    Mot de passe&nbsp<input type="password" name="mdp1" value=""><br />
    Confirmation mdp&nbsp<input type="password" name="mdp2" value=""><br />
    <input type="submit" name="inscription" value="Inscription">
</form>
</body>
</html>
