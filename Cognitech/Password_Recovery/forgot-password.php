<?php
use Phppot\Member;

if (! empty($_POST["forgot-btn"])) {
    require_once __DIR__ . '/Model/Member.php';
    $member = new Member();
    $displayMessage = $member->handleForgot();
}
?>
<HTML>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" type="text/css" href="../css/connexion.css">
<HEAD>
    <i class="material-icons colorWhite" style="font-size: 10em; padding-left: 44.7%; padding-top: 4.5%">person_outline</i>
    <title>Forgot Password</title>
    <link href="assets/css/phppot-style.css" type="text/css"
          rel="stylesheet" />
    <link href="assets/css/user-registration.css" type="text/css"
          rel="stylesheet" />
    <script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
</HEAD>
<BODY>
<div class="phppot-container" style="margin-left: 44.7%; padding-top: 1%">
    <div class="sign-up-container">
        <div class="signup-align">
            <form name="login" action="" method="post"
                  onsubmit="return loginValidation()">
                <div class="signup-heading" style="margin-left: -8%; color: white; font-size: 2em; font-family: 'Roboto'">Mot de Passe oublié</div>
                <?php
                if (! empty($displayMessage["status"])) {
                    if ($displayMessage["status"] == "error") {
                        ?>
                        <div class="server-response error-msg"><?php echo $displayMessage["message"]; ?></div>
                        <?php
                    } else if ($displayMessage["status"] == "success") {
                        ?>
                        <div class="server-response success-msg"><?php echo $displayMessage["message"]; ?></div>
                        <?php
                    }
                }
                ?>
                <div class="row" style="margin-left: -6%; padding-top: 2%;">
                    <br class="inline-block">
                        <div class="form-label">
                            <span class="required error" id="username-info"></span>
                        </div>
                        <input type="username" class="container" name="username" id="username" placeholder="Username" required><br> </br>
                    </div>
                </div>
                <div class="row">
                    <input
                    <button type="submit" name="forgot-btn" class="envoyer" id="forgot-btn" value="Réinitialiser"></button>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function loginValidation() {
        var valid = true;
        $("#username").removeClass("error-field");
        var UserName = $("#username").val();
        $("#username-info").html("").hide();

        if (UserName.trim() == "") {
            $("#username-info").html("required.").css("color", "#ee0000").show();
            $("#username").addClass("error-field");
            valid = false;
        }
        if (valid == false) {
            $('.error-field').first().focus();
            valid = false;
        }
        return valid;
    }
</script>

<div class="topleft">
    <a href="../index.html"><i class="material-icons colorYellow" style="font-size: 3em;">home</i></a>
</div>
</BODY>
</HTML>