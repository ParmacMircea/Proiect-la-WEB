<!DOCTYPE html>
<html lang="ro">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GM.store - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Alte fonturi -->
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <?php
  $vendor_css_files = [
    "assets/vendor/animate.css/animate.min.css",
    "assets/vendor/aos/aos.css",
    "assets/vendor/bootstrap/css/bootstrap.min.css",
    "assets/vendor/bootstrap-icons/bootstrap-icons.css",
    "assets/vendor/boxicons/css/boxicons.min.css",
    "assets/vendor/glightbox/css/glightbox.min.css",
    "assets/vendor/swiper/swiper-bundle.min.css"
  ];

  foreach ($vendor_css_files as $css_file) {
    echo '<link href="' . $css_file . '" rel="stylesheet">';
  }
  ?>

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
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="index.php"><span>GM.store</span></a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active " href="index.php">Acasa</a></li>
          <li><a href="produse.php">Produse</a></li>
          <li><a href="games_user.php">Jocuri</a></li>
          <li><a href="canal.php">Canal</a></li>
          <li><a href="poo.php">POO</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Bine ați venit la <span>GM.store</span></h2>
          <p class="animate__animated animate__fadeInUp">Explorați o gamă largă de jocuri video și găsiți cele mai recente lansări, reduceri și oferte speciale!</p>
          <a href="products.php" class="btn-get-started animate__animated animate__fadeInUp">Vezi Produsele</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Descoperiți Noile Lansări</h2>
          <p class="animate__animated animate__fadeInUp">Fiți primul care experimentează cele mai noi jocuri video pe platforma noastră!</p>
          <a href="products.php" class="btn-get-started animate__animated animate__fadeInUp">Vezi Noile Lansări</a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Găsiți Oferte Speciale</h2>
          <p class="animate__animated animate__fadeInUp">Profită acum de reducerile noastre și bucură-te de jocuri video la prețuri incredibile!</p>
          <a href="products.php" class="btn-get-started animate__animated animate__fadeInUp">Vezi Ofertele</a>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box icon-box-pink">
              <div class="icon"><i class="fab fa-playstation"></i></div>
              <h4 class="title"><a href="#">Jocuri pentru PlayStation</a></h4>
              <p class="description">Descoperiți cele mai noi și cele mai populare jocuri pentru PlayStation.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
              <div class="icon"><i class="fab fa-xbox"></i></div>
              <h4 class="title"><a href="#">Jocuri pentru Xbox</a></h4>
              <p class="description">Explorați colecția noastră de jocuri pentru Xbox și bucurați-vă de experiența de gaming.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="fas fa-desktop"></i></div>
              <h4 class="title"><a href="#">Jocuri pentru PC</a></h4>
              <p class="description">Alegeți dintr-o gamă largă de jocuri pentru PC, disponibile pentru descărcare imediată.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-blue">
              <div class="icon"><i class="fas fa-gamepad"></i></div>
              <h4 class="title"><a href="#">Accesorii pentru Gaming</a></h4>
              <p class="description">Descoperiți cele mai bune accesorii pentru gaming pentru o experiență completă și captivantă.</p>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>GM.store</span></strong>. Toate drepturile rezervate.
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php
  $vendor_js_files = [
    "assets/vendor/aos/aos.js",
    "assets/vendor/bootstrap/js/bootstrap.bundle.min.js",
    "assets/vendor/glightbox/js/glightbox.min.js",
    "assets/vendor/isotope-layout/isotope.pkgd.min.js",
    "assets/vendor/swiper/swiper-bundle.min.js",
    "assets/vendor/php-email-form/validate.js"
  ];

  foreach ($vendor_js_files as $js_file) {
    echo '<script src="' . $js_file . '"></script>';
  }
  ?>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Scroll to Hero Section on Load -->
  <script>
    window.addEventListener('load', (event) => {
      var heroCarousel = document.getElementById('heroCarousel');
      if (heroCarousel) {
        heroCarousel.scrollIntoView({ behavior: 'smooth' });
      }
    });
  </script>

</body>

</html>
