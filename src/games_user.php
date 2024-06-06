<?php
session_start();
require 'functions_admin.php';

if (!is_logged_in()){
    header("Location: login.php");
    die;
}

// Conectare la baza de date
$con = mysqli_connect("mysql_db", "root", "toor", "games");
if (!$con) {
    die("Failed to connect to database: " . mysqli_connect_error());
}

// Adăugați jocuri în coșul de cumpărături
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $game_id = $_POST['game_id'];
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $_SESSION['cart'][] = $game_id;
}

// Finalizați cumpărăturile
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    unset($_SESSION['cart']);
    echo "Cumpărături finalizate!";
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blog - Șablon Bootstrap Moderna</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Moderna
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Updated: May 7 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazin Jocuri</title>
    <!-- CSS pentru a redimensiona imaginile -->
    <style>
        table img {
            width: 100px; /* Lățimea imaginii */
            height: auto; /* Înălțimea se ajustează automat pentru a păstra proporțiile originale */
        }
    </style>
</head>
<body>
    <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="index.php"><span>GM.store</span></a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Acasă</a></li>
          <li><a href="produse.php">Produse</a></li>
          <li><a href="games_user.php">Jocuri</a></li>
          <li><a class="active" href="canal.php">Canal</a></li>
          <li><a href="poo.php">POO</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <h1>Magazin Jocuri</h1>

    <!-- Tabel pentru afișarea jocurilor -->
    <h2>Jocuri disponibile</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Imagine</th>
            <th>Nume</th>
            <th>Gen</th>
            <th>Consolă</th>
            <th>Preț</th>
            <th>Acțiuni</th>
        </tr>
        <?php
        // Selectați toate jocurile din baza de date și afișați-le în tabel
        $result = query("SELECT * FROM games");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td><img src='".$row['image']."' alt='Imagine'></td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['genre']."</td>";
            echo "<td>".$row['console']."</td>";
            echo "<td>".$row['price']."</td>";
            echo "<td>
                    <form method='POST' action=''>
                        <input type='hidden' name='game_id' value='".$row['id']."'>
                        <button type='submit' name='add_to_cart'>Adaugă în coș</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <!-- Afișare coș de cumpărături -->
    <h2>Coș de cumpărături</h2>
    <?php
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        echo "<ul>";
        foreach ($_SESSION['cart'] as $game_id) {
            $result = query("SELECT * FROM games WHERE id = '$game_id'");
            $game = mysqli_fetch_assoc($result);
            echo "<li>".$game['name']." - ".$game['price']." RON</li>";
        }
        echo "</ul>";
    } else {
        echo "Coșul de cumpărături este gol.";
    }
    ?>

    <!-- Formular pentru finalizarea cumpărăturilor -->
    <form method="POST" action="">
        <button type="submit" name="checkout">Finalizare cumpărături</button>
    </form>
    </main>
    <!-- ======= Subsol ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Link-uri utile</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Acasă</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Despre noi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Servicii</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="canal.php">Canal</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Termeni și condiții</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Politica de confidențialitate</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contactează-ne</h4>
            <p>
              Bulevardul Carol I 11, Iași 700506 <br>
              Strada Pacurari Nr 124 Bl 583 sc a et 1 ap 1<br>
              Romania <br><br>
              <strong>Telefon:</strong>+40737239477<br>
              <strong>Email:</strong> mircea.parmac@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Despre GM.store</h3>
            <p>GM.store este un magazin online care vinde jocuri video și accesorii pentru gaming.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="https://www.facebook.com/mircea.parmac.5/" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              <a href="https://www.youtube.com/channel/UCptMiaCBWuFe9g_WJsrSFeA" class="youtube"><i class="bx bxl-youtube"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
    <div class="copyright">
        &copy; Drepturi de autor <strong><span>GM.store</span></strong>. Toate drepturile rezervate
      </div>
      <div class="credits">
        <!-- Toate linkurile din subsol trebuie să rămână intacte. -->
        <!-- Poți șterge linkurile doar dacă ai achiziționat versiunea Pro. -->
        <!-- Informații despre licențiere: https://bootstrapmade.com/license/ -->
        <!-- Achiziționează versiunea Pro cu formularul de contact PHP/AJAX funcțional: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/ -->
        Proiectat de <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- Sfârșitul Subsolului -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>
