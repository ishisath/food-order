<?php
$host = "localhost";
$user = "root"; // XAMPP default
$pass = "";     // XAMPP default password is empty
$db   = "restaurant_db"; // the DB name you created

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
