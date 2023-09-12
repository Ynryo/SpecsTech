<?php
$servername = "127.0.0.1:3306";
$username = "qgkenujx_admin";
$password = "&roF)gO&.gfr7%&4rt";
$dbname = "qgkenujx_main";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("<p class=\"error\">Connexion échouée : " . $conn->connect_error . "</p>");
}
mysqli_set_charset($conn, "utf8mb4");
?>