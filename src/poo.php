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
          <li><a href="index.php">Acasă</a></li>
          <li><a href="produse.php">Produse</a></li>
          <li><a href="games_user.php">Jocuri</a></li>
          <li><a href="canal.php">Canal</a></li>
          <li><a class="active" href="poo.php">POO</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

  <?php
class Game {
    private $title;
    private $genre;
    private $price;
    private $platform;

    public function __construct($title, $genre, $price, $platform) {
        $this->title = $title;
        $this->genre = $genre;
        $this->price = $price;
        $this->platform = $platform;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function setGenre($genre) {
        $this->genre = $genre;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getPlatform() {
        return $this->platform;
    }

    public function setPlatform($platform) {
        $this->platform = $platform;
    }
}

class ShoppingCart {
    private $items = [];

    public function addItem(Game $game) {
        $this->items[] = $game;
    }

    public function removeItem(Game $game) {
        foreach ($this->items as $key => $item) {
            if ($item->getTitle() === $game->getTitle()) {
                unset($this->items[$key]);
                break;
            }
        }
    }

    public function calculateTotalPrice() {
        $totalPrice = 0;
        foreach ($this->items as $item) {
            $totalPrice += $item->getPrice();
        }
        return $totalPrice;
    }

    public function displayCart() {
        foreach ($this->items as $item) {
            echo "Title: " . $item->getTitle() . ", Genre: " . $item->getGenre() . ", Price: $" . $item->getPrice() . ", Platform: " . $item->getPlatform() . "<br>";
        }
    }
}

// Create game instances
$games = [
    new Game("The Witcher 3", "RPG", 49.99, "PC"),
    new Game("Grand Theft Auto V", "Action", 39.99, "PlayStation"),
    new Game("The Last of Us Part II", "Action-Adventure", 59.99, "PlayStation"),
    new Game("Red Dead Redemption 2", "Action-Adventure", 59.99, "Xbox"),
    new Game("Cyberpunk 2077", "Action-Adventure", 49.99, "PC"),
    new Game("Minecraft", "Sandbox", 29.99, "PC"),
    new Game("Fortnite", "Battle Royale", 0, "PC"),
    new Game("FIFA 21", "Sports", 49.99, "PlayStation"),
    new Game("NBA 2K21", "Sports", 59.99, "Xbox"),
    new Game("Call of Duty: Warzone", "Battle Royale", 0, "PC"),
    new Game("Among Us", "Social Deduction", 4.99, "PC"),
    new Game("League of Legends", "MOBA", 0, "PC"),
    new Game("Dota 2", "MOBA", 0, "PC"),
    new Game("Apex Legends", "Battle Royale", 0, "PC"),
    new Game("Valorant", "Hero Shooter", 0, "PC"),
    new Game("Overwatch", "Hero Shooter", 19.99, "PC"),
    new Game("Counter-Strike: Global Offensive", "First-Person Shooter", 0, "PC"),
    new Game("Genshin Impact", "Action RPG", 0, "PC"),
    new Game("Assassin's Creed Valhalla", "Action-Adventure", 59.99, "Xbox"),
    new Game("God of War", "Action-Adventure", 19.99, "PlayStation"),
];

// Add games to cart
$cart = new ShoppingCart();
foreach ($games as $game) {
    $cart->addItem($game);
}

echo "Total Price: $" . $cart->calculateTotalPrice() . "<br>";
echo "Items in Cart:<br>";
$cart->displayCart();

?>


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
