<?php
session_start();
require 'functions.php';

// Verifică dacă utilizatorul este autentificat și are rolul de admin
if (!is_logged_in() || !is_admin()) {
    header("Location: login.php");
    die;
}

// Verifică dacă există un ID în URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: inregistrari.php");
    die;
}

// Conectare la baza de date
$con = mysqli_connect("mysql_db", "root", "toor", "Login");
if (!$con) {
    die("Failed to connect to database: " . mysqli_connect_error());
}

// Evită injecția SQL folosind prepared statements
$id = mysqli_real_escape_string($con, $_GET['id']);

// Interogare pentru ștergerea înregistrării cu ID-ul specificat
$query = "DELETE FROM Login WHERE id = '$id'";
$result = mysqli_query($con, $query);

// Verifică dacă ștergerea a fost efectuată cu succes
if ($result) {
    $_SESSION['success_message'] = "Înregistrarea a fost ștearsă cu succes.";
} else {
    $_SESSION['error_message'] = "Eroare la ștergerea înregistrării: " . mysqli_error($con);
}

// Redirectează înapoi la pagina de înregistrări
header("Location: inregistrari.php");
exit;
?>
