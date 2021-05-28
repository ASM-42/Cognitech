<?php
session_start();
session_destroy();
header('Location: se_connecter.php');
?>
