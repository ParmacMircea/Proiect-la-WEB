<?php
session_start();
require 'functions_admin.php';

// Verifică dacă utilizatorul este autentificat și are rolul de admin
if (!is_logged_in() || !is_admin()) {
    header("Location: login.php");
    exit;
}

// Conectare la baza de date
$con = mysqli_connect("mysql_db", "root", "toor", "games");
if (!$con) {
    die("Failed to connect to database: " . mysqli_connect_error());
}

// Funcție pentru a executa interogările SQL și a returna rezultatele

// Adăugați un joc nou
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_game'])) {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imageNameCmps = explode(".", $imageName);
        $imageExtension = strtolower(end($imageNameCmps));
        $allowedfileExtensions = ['jpg', 'gif', 'png'];

        if (in_array($imageExtension, $allowedfileExtensions)) {
            $uploadFileDir = './uploaded_images/';
            $dest_path = $uploadFileDir . $imageName;

            if (move_uploaded_file($imageTmpPath, $dest_path)) {
                $image = $dest_path;
            } else {
                die('There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.');
            }
        } else {
            die('Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions));
        }
    } else {
        die('There was some error with the image upload.');
    }

    $name = $_POST['name'];
    $genre = $_POST['genre'];
    $console = $_POST['console'];
    $price = $_POST['price'];

    $query = "INSERT INTO games (image, name, genre, console, price) VALUES ('$image', '$name', '$genre', '$console', '$price')";
    query($query);
}

// Ștergeți un joc
if (isset($_GET['delete_game'])) {
    $id = $_GET['delete_game'];
    $query = "DELETE FROM games WHERE id = '$id'";
    query($query);
}

// Editați un joc
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_game'])) {
    $id = $_POST['game_id'];
    $name = $_POST['name'];
    $genre = $_POST['genre'];
    $console = $_POST['console'];
    $price = $_POST['price'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imageNameCmps = explode(".", $imageName);
        $imageExtension = strtolower(end($imageNameCmps));
        $allowedfileExtensions = ['jpg', 'gif', 'png'];

        if (in_array($imageExtension, $allowedfileExtensions)) {
            $uploadFileDir = './uploaded_images/';
            $dest_path = $uploadFileDir . $imageName;

            if (move_uploaded_file($imageTmpPath, $dest_path)) {
                $image = $dest_path;
                $query = "UPDATE games SET image='$image', name='$name', genre='$genre', console='$console', price='$price' WHERE id='$id'";
            } else {
                die('There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.');
            }
        } else {
            die('Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions));
        }
    } else {
        $query = "UPDATE games SET name='$name', genre='$genre', console='$console', price='$price' WHERE id='$id'";
    }

    query($query);
}

?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Games</title>
    <!-- CSS pentru a redimensiona imaginile -->
    <style>
        table img {
            width: 100px; /* Lățimea imaginii */
            height: auto; /* Înălțimea se ajustează automat pentru a păstra proporțiile originale */
        }
    </style>
</head>
<body>
    <li><a href="admin.php">Admin page</a></li>
    <li><a href="games_admin.php">Jocuri</a></li>
    <li><a href="inregistrari.php">Inregistrari</a></li> 
    <li><a href="logout.php">Logout</a></li>
    <h1>Admin Panel - Games</h1>

    <!-- Formular pentru adăugarea unui joc nou -->
    <h2>Adăugare joc nou</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="file" name="image" required><br><br>
        <input type="text" name="name" placeholder="Nume joc" required><br><br>
        <input type="text" name="genre" placeholder="Gen" required><br><br>
        <select name="console" required>
            <option value="Playstation">Playstation</option>
            <option value="Xbox">Xbox</option>
            <option value="PC">PC</option>
        </select><br><br>
        <input type="text" name="price" placeholder="Preț" required><br><br>
        <button type="submit" name="add_game">Adăugare joc</button>
    </form>

    <!-- Tabel pentru afișarea jocurilor existente -->
    <h2>Jocuri existente</h2>
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
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td><img src='".$row['image']."' alt='Imagine'></td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['genre']."</td>";
                echo "<td>".$row['console']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>
                        <a href='edit_game.php?id=".$row['id']."'>Editează</a> |
                        <a href='?delete_game=".$row['id']."' onclick='return confirm(\"Ești sigur că vrei să ștergi acest joc?\")'>Șterge</a>
                        </td>";
                echo "</tr>";
            }
        } else {
            echo "Nu există jocuri în baza de date.";
        }
        ?>
    </table>
</body>
</html>
