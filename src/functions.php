<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!$con = mysqli_connect("mysql_db", "root", "toor", "Login")) {
    die("Failed to connect to database: " . mysqli_connect_error());
}

function query($query) {
    global $con;
    $result = mysqli_query($con, $query);
    if ($result === false) {
        die("Error in query: " . mysqli_error($con));
    }
    if (!is_bool($result) && mysqli_num_rows($result) > 0) {
        $res = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $res[] = $row;
        }
        return $res;
    }
    return false;
}

function is_logged_in() {
    if (!empty($_SESSION['SES']) && is_array($_SESSION['SES']) && !empty($_SESSION['SES']['id'])) {
        return true;
    }

    // Check for a cookie
    $cookie = $_COOKIE['SES'] ?? null;
    if ($cookie && strstr($cookie, ":")) {
        $parts = explode(":", $cookie);
        $token_key = $parts[0];
        $token_value = $parts[1];

        $query = "SELECT * FROM Login WHERE token_key = '$token_key' LIMIT 1";
        $row = query($query);
        if ($row) {
            $row = $row[0];
            if ($token_value == $row['token']) {
                $_SESSION['SES'] = $row;
                return true;
            }
        }
    }

    return false;
}

function is_admin() {
    if (is_logged_in() && $_SESSION['SES']['role'] == 'admin') {
        return true;
    }
    return false;
}
?>
