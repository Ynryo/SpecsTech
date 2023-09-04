<?php
$servername = "127.0.0.1:3306";
$username = "qgkenujx_admin";
$password = "c4;,pp9,^&pscpCbWC";
$dbname = "qgkenujx_main";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("<p class=\"error\">Connexion échouée : " . $conn->connect_error . "</p>");
}
mysqli_set_charset($conn, "utf8mb4");
?>