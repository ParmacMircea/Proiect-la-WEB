<?php
session_start();
session_destroy();

setcookie('SES', '', time() - 3600, "/");

header("Location: login.php");
die;
?>
