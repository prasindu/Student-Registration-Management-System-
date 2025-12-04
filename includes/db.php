<?php
$host = "127.0.0.1"; // Using IP is often safer with custom ports
$user = "root";
$pass = "root";      // Matches your config.inc.php
$dbname = "student_db";
$port = 3307;        // Matches your config.inc.php

// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // We add the $port variable at the end
    $conn = new mysqli($host, $user, $pass, $dbname, $port);
} catch (mysqli_sql_exception $e) {
    die("Connection failed: " . $e->getMessage());
}
?>