<?php
include("connection.php");

// Récupérer les spécifications de la carte graphique en fonction de son identifiant
// $id = "\"" . basename(dirname(__FILE__,4)) . "_" . basename(dirname(__FILE__,3)) . "_" . basename(dirname(__FILE__,2)) . basename(dirname(__FILE__,1)) . "\"";
//$id est récup sur le fichier de la page
$sql = "SELECT * FROM graphics_cards WHERE card_id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Aucune carte graphique trouvée avec cet identifiant.";
}

$conn->close();
