<?php
session_start();
require 'functions.php';

// Verifică dacă utilizatorul este autentificat și are rolul de admin
if (!is_logged_in() || !is_admin()) {
    header("Location: login.php");
    die;
}

// Conectare la baza de date
$con = mysqli_connect("mysql_db", "root", "toor", "Login");
if (!$con) {
    die("Failed to connect to database: " . mysqli_connect_error());
}

// Verificăm dacă s-a efectuat o căutare și preluăm valoarea introdusă
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM Login WHERE nume LIKE '%$search%' OR email LIKE '%$search%'";
} else {
    // Dacă nu s-a efectuat nicio căutare, afișăm toate înregistrările
    $query = "SELECT * FROM Login";
}

// Executăm interogarea și afișăm rezultatele în tabel
$result = mysqli_query($con, $query);
if (!$result) {
    die("Error in query: " . mysqli_error($con));
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

    <style>
        .center-table {
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center ">
        <div class="container d-flex justify-content-between align-items-center">

            <div class="logo">
                <h1 class="text-light"><a href="index.html"><span>GM.store</span></a></h1>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="admin.php">Admin page</a></li>
                    <li><a href="games_admin.php">Jocuri</a></li>
                    <li><a class="activ" href="inregistrari.php">Inregistrari</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Inregistrari</h2>
                    <ol>
                        <li><a href="admin.php">Admin</a></li>
                        <li>Inregistrari</li>
                    </ol>
                </div>

            </div>
        </section>

        <h2>Lista înregistrărilor</h2>

        <form method="GET" action="">
            <input type="text" name="search" placeholder="Caută după nume sau email">
            <button type="submit">Caută</button>
        </form>

        <table border="1" class="center-table">
            <tr>
                <th>Nume</th>
                <th>Email</th>
                <th>Parola</th>
                <th>Role</th>
            </tr>
            <?php
            // Afișăm fiecare înregistrare
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['nume'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['parola'] . "</td>";
                echo "<td>" . $row['role'] . "</td>";
                echo "<td><a href='delete.php?id=" . $row['id'] . "'>Șterge</a></td>"; // Buton pentru ștergere
                echo "</tr>";
            }
            ?>
        </table>

        <!-- ======= Subsol ======= -->
<footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Link-uri utile</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="admin.php">Admin Page</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="games_admin.php">Jocuri</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="inregistrari.php">Inregistrari</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
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
<?php
// Eliberare resurse
mysqli_free_result($result);
mysqli_close($con);
?>
