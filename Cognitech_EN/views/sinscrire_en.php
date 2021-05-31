<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="../css/connexion.css">
    <title>Inscription</title>
</head>
<body>
<main class="main">
    <div>
        <i class="material-icons colorWhite" style="font-size: 900%; margin: -5.7% 0 -2.5% 0">person_outline</i>
        <div class="formulaire">
            <form action="../transition/inscription_en.php" method="post" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please accept the Terms and Conditions'); return false; }">
                <input type="text" class="container2" name="prenom" placeholder="First Name" required><br>
                <input type="text" class="container2" name="nom" placeholder="Last Name" required><br>
                <input type="date" class="container2" name="dateDeNaissance" placeholder="Date of Birth" required><br>
                <input type="email" class="container2" name="email" placeholder="Email" required><br>
                <input type="text" class="container2" name="ecurie" placeholder="Team" required><br>
                <input type="password" class="container2" name="mdp1" placeholder="Password" required><br>
                <input type="password" class="container2" name="mdp2" placeholder="Confirm Password" required><br>

                <input type="checkbox" name="checkbox" class="checkbox" value="check" id="agree"/>
                <p class="CGU">I've read and accept the Terms and Conditions</p>
            </br>
                <button type="submit" name='inscription' class="envoyer2" value="Inscription">Sign In</button>
            </form>
            <a href="se_connecter_en.php" class="inscription2 colorWhite">Already have an account? Log in <b>here</b></a>
        </div>
    </div>


</main>
<div class="topleft">
    <a href="../index_en.html"><i class="material-icons colorYellow" style="font-size: 3em;">home</i></a>
</div>


<!--<div id="google_translate_element"></div>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'fr'}, 'google_translate_element');
    }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
-->
</body>
</html>