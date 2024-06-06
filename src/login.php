<?php
session_start();
require 'functions.php';

$loginError = ''; // Inițializează variabila pentru erorile de login

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nume = addslashes($_POST['nume']);
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);
    $remember = $_POST['remember'] ?? null;

    // Verifică reCAPTCHA
    $captcha = $_POST['g-recaptcha-response'];
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfGDO8pAAAAAH6IZ9f_R4pyiKEf1OF-6U11Y3TD&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
    $responseKeys = json_decode($response, true);
    if (intval($responseKeys["success"]) !== 1) {
        // Captcha incorectă
        $loginError = "Captcha incorect!";
    } else {
        // Continuă cu verificarea credențialelor utilizatorului
        $query = "SELECT * FROM Login WHERE nume = '$nume' AND email = '$email' AND parola = '$password' LIMIT 1";
        $row = query($query);

        if ($row) {
            $row = $row[0];
            $_SESSION['SES'] = $row;

            // Set a cookie
            if ($remember) {
                $expires = time() + ((60 * 60 * 24) * 7);
                $salt = "*&salt#@";
                
                $token_key = hash('sha256', (time() . $salt));
                $token_value = hash('sha256', ('Logged_in' . $salt));

                setcookie('SES', $token_key.':'.$token_value, $expires, "/");
                
                $id = $row['id'];
                $updateQuery = "UPDATE Login SET token_key = '$token_key', token = '$token_value' WHERE id = '$id' LIMIT 1";
                if (!query($updateQuery)) {
                    $loginError = "Failed to update login token.";
                }
            }

            if ($_SESSION['SES']['role'] == 'admin') {
                header("Location: admin.php");
                exit; // Opriți execuția ulterioară a scriptului
            } else {
                header("Location: index.php");
                exit;
            }
        } else {
            $loginError = "Nume, email sau parolă incorectă!";
        }
    }
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
          <li><a class="" href="index.php">Acasă</a></li>
          <li><a href="produse.php">Produse</a></li>
          <li><a href="games_user.php">Jocuri</a></li>
          <li><a href="canal.php">Canal</a></li>
          <li><a href="poo.php">POO</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a class="active" href="login.php">Login</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

<!-- ======= Login Section ======= -->
<section class="breadcrumbs">
  <div class="container">

	<div class="d-flex justify-content-between align-items-center">
	  <h2>Login</h2>

	  <ol>
		<li><a href="index.php">Acasă</a></li>
		<li>Login</li>
	  </ol>
	</div>

  </div>
</section><!-- End Canal Section -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<div style="text-align: center;">
<br><br>

    <form method="post" style="display: inline-block;margin: auto;"> 
        <h1>Login</h1>
        <input type="text" name="nume" placeholder="Nume" required><br><br>
        <input type="text" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <div class="g-recaptcha" data-sitekey="6LfGDO8pAAAAADiz5vYZ9mtB-R9ep4svRA-hvjzA" data-theme="light" data-size="normal"></div>
        <?php if(isset($loginError)) { ?>
            <p><?php echo $loginError; ?></p>
        <?php } ?>
        <input type="checkbox" name="remember"> Remember me<br><br>
        <button>Login</button>
    </form>
    <br>
    <a href="register.php">Register</a>
    <br><br>
</div>

</main><!-- End #main -->

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
