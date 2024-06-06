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

// Verifică dacă a fost transmis un ID valid prin parametrul GET
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ID invalid de joc.";
    exit;
}

$id = $_GET['id'];

// Interogare pentru a obține detaliile jocului pentru editare
$query = "SELECT * FROM games WHERE id = '$id'";
$result = mysqli_query($con, $query);

// Verifică dacă jocul există în baza de date
if (!$result || mysqli_num_rows($result) == 0) {
    echo "Jocul nu a fost găsit.";
    exit;
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editare joc</title>
</head>
<body>
    <h1>Editare joc</h1>

    <form method="POST" action="games_admin.php" enctype="multipart/form-data">
        <input type="hidden" name="game_id" value="<?php echo $row['id']; ?>">
        <input type="file" name="image"><br><br>
        <input type="text" name="name" placeholder="Nume joc" value="<?php echo $row['name']; ?>" required><br><br>
        <input type="text" name="genre" placeholder="Gen" value="<?php echo $row['genre']; ?>" required><br><br>
        <select name="console" required>
            <option value="Playstation" <?php if ($row['console'] == 'Playstation') echo 'selected'; ?>>Playstation</option>
            <option value="Xbox" <?php if ($row['console'] == 'Xbox') echo 'selected'; ?>>Xbox</option>
            <option value="PC" <?php if ($row['console'] == 'PC') echo 'selected'; ?>>PC</option>
        </select><br><br>
        <input type="text" name="price" placeholder="Preț" value="<?php echo $row['price']; ?>" required><br><br>
        <button type="submit" name="edit_game">Salvează modificările</button>
    </form>
</body>
</html>
