<?php
include('connection.php');
$sql = "SELECT action FROM server_actions ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (isset($row["action"]) && $row["action"] == "maintenance_mode_on") {
        // echo $row["action"];
        http_response_code(503);
        header('Location: /maintenance/');
        exit(); // Assurez-vous de terminer le script après une redirection header
    }
}

if (str_contains($_SERVER["REQUEST_URI"], "/articles/") && $_SERVER["REQUEST_URI"] !== "/articles/") {
    $sql = "SELECT popularity FROM `graphics_cards` WHERE `graphics_cards`.`card_id` = \"$id\"";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $score = $row["popularity"] + 1;
    $sql = "UPDATE `graphics_cards` SET `popularity` = $score WHERE `graphics_cards`.`card_id` = \"$id\"";
    $conn->query($sql);
}
