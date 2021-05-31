<?php
session_start();
session_destroy();
header('Location: ../views/se_connecter.php');
?>
