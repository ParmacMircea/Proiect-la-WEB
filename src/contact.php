<?php
// Verifică dacă s-a trimis un formular
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesează datele din formular
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Trimite un email la adresa de destinație cu datele formularului
    $to = "mircea.parmac@gmail.com";
    $email_subject = "Mesaj nou de la $name: $subject";
    $email_body = "Ai primit un nou mesaj de la $name ($email):\n\n$message";
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email";
    mail($to, $email_subject, $email_body, $headers);

    // Redirecționează utilizatorul înapoi pe pagina de contact cu un mesaj de confirmare
    header("Location: contact.html?mailsent=true");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ro">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Contact - Șablon Bootstrap Moderna</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Icoane favorite -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonturi Google -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Fișiere CSS ale furnizorilor -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Fișier CSS principal al șablonului -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Nume șablon: Moderna
  * URL șablon: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Actualizat: 7 mai 2024 cu Bootstrap v5.3.3
  * Autor: BootstrapMade.com
  * Licență: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Antet ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="index.php"><span>GM.store</span></a></h1>
        <!-- Decomentează mai jos dacă preferi să folosești un logo în imagine -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="" href="index.php">Acasă</a></li>
          <li><a href="produse.php">Produse</a></li>
          <li><a href="games_user.php">Jocuri</a></li>
          <li><a href="canal.php">Canal</a></li>
          <li><a href="poo.php">POO</a></li>
          <li><a class="active" href="contact.php">Contact</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      </div>
  </header><!-- Sfârșitul antetului -->

  <main id="main">

    <!-- ======= Secțiunea de Contact ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact</h2>
          <ol>
            <li><a href="index.php">Acasă</a></li>
            <li>Contact</li>
          </ol>
        </div>

      </div>
    </section><!-- Sfârșitul Secțiunii de Contact -->

    <!-- ======= Secțiunea de Contact ======= -->
    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">

        <div class="row">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Adresa noastră</h3>
                  <p>Bulevardul Carol I 11, Iași 700506<br>Strada Pacurari Nr 124 Bl 583 sc a et 1 ap 1</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bx bx-envelope"></i>
                  <h3>Trimiteți-ne un email</h3>
                  <p>mircea.parmac@gmail.com</p>
                </div>
              </div>
              <div class="col-md-6">
              <div class="col-md-6">
                  <div class="info-box">
                    <i class="bx bx-phone-call"></i>
                    <h3>Sunați-ne</h3>
                    <p>+40737239477</p>
                  </div>
                </div>
              </div>

            </div>

          </div>

          <div class="col-lg-6">
    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
        <div class="row">
            <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Numele tău" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Emailul tău" required>
            </div>
        </div>
        <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subiectul" required>
        </div>
        <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Mesajul" required></textarea>
        </div>
        <div class="my-3">
            <div class="loading">Se încarcă</div>
            <div class="error-message"></div>
            <div class="sent-message">Mesajul tău a fost trimis. Mulțumim!</div>
        </div>
        <div class="text-center"><button type="submit">Trimite Mesaj</button></div>
    </form>
  </div>


        </div>

      </div>
    </section><!-- Sfârșitul Secțiunii de Contact -->

    <!-- ======= Secțiunea Hartă ======= -->
    <section class="map mt-2">
      <div class="container-fluid p-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2724.884197647793!2d27.57350951580062!3d47.17425807916131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b25fee59e4c7f1%3A0x70ad63d54c55e1e8!2sAlexandru%20Ioan%20Cuza%20University%20of%20Ia%C8%99i!5e0!3m2!1sen!2sro!4v1620914392729!5m2!1sen!2sro" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </section><!-- Sfârșitul Secțiunii de Hartă -->


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
            <p>GM.store este un magazin online care vinde jocuri video si accesorii pentru gaming.</p>
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

  <!-- Fișiere JS ale furnizorilor -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Fișier JS principal -->
  <script src="assets/js/main.js"></script>

</body>

</html>
