<?php
$card_id_split = explode("/", "/" . str_replace("_", "/", $row["card_id"]) . "/");
if ($row["manufacturer"] == "NVIDIA") {
    $card_link = "/" . $card_id_split[1] . "/" . $card_id_split[2] . "/" . substr($card_id_split[3], 0, 2) . "/" . substr($card_id_split[3], 2) . "/";
} else if ($row["manufacturer"] == "Intel") {
    $card_link = "/" . $card_id_split[1] . "/" . $card_id_split[2] . "/" . $card_id_split[3] . "/";
}