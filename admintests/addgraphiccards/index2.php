<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Spécifications de la carte graphique</title>
</head>
<body>
<input type="text" name="id" placeholder="ID">
<?php
// Connexion à la base de données
$servername = "127.0.0.1:3306";
$username = "qgkenujx_admin";
$password = "c4;,pp9,^&pscpCbWC";
$dbname = "qgkenujx_main";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
} else {
    echo "Connecté<br>";
}

// Récupérer les spécifications de la carte graphique en fonction de son identifiant
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM cartes_graphiques WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Afficher les spécifications de la carte graphique
        $row = $result->fetch_assoc();
        echo "<h1>" . $row['titre'] . "</h1>";
        echo "<p>Marque : " . $row['marque'] . "</p>";
        echo "<p>Mémoire : " . $row['memoire'] . " Go</p>";
        echo "<p>Fréquence : " . $row['frequence'] . " MHz</p>";
        // Ajoutez d'autres spécifications selon votre base de données
    } else {
        echo "Aucune carte graphique trouvée avec cet identifiant.";
    }
} else {
    echo "Identifiant de la carte graphique non spécifié.";
}

$conn->close();
?>

</body>
</html>