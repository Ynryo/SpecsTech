<?php
include('connection.php');
$sql = "SELECT action FROM server_actions ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (isset($row["action"]) && $row["action"] == "maintenance_mode_on") {
        // echo $row["action"];
        header('Location: /maintenance/');
        exit(); // Assurez-vous de terminer le script après une redirection header
    }
}