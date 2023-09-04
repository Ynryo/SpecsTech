<?php
// Connexion à la base de données
$conn = new mysqli("127.0.0.1:3306", "qgkenujx_admin", "c4;,pp9,^&pscpCbWC", "qgkenujx_main");

// Vérifier si la connexion a réussi
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Récupérer le terme de recherche soumis par l'utilisateur
$terme_recherche = $_GET["carte"];

// Préparer la requête SQL pour rechercher la carte graphique dans la base de données
$stmt = $conn->prepare("SELECT * FROM cartes_graphiques WHERE nom LIKE ?");
$terme_recherche = '%' . $terme_recherche . '%';
$stmt->bind_param("s", $terme_recherche);
$stmt->execute();
$resultat = $stmt->get_result();

// Fermer la requête préparée
$stmt->close();

// Fermer la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Résultat de la recherche</title>
</head>
<body>
    <h1>Résultat de la recherche pour "<?php echo $terme_recherche; ?>" :</h1>
    <?php
    // Vérifier s'il y a des résultats de recherche
    if ($resultat->num_rows > 0) {
        while ($row = $resultat->fetch_assoc()) {
            // Afficher les informations de chaque carte graphique trouvée
            echo "<p>ID : " . $row["carte_id"] . "</p>";
            echo "<p>Nom : " . $row["nom"] . "</p>";
            echo "<p>Fabricant : " . $row["fabricant"] . "</p>";
            // Ajoutez d'autres colonnes pour les spécifications techniques ici
            echo "<hr>";
        }
    } else {
        echo "<p>Aucun résultat trouvé.</p>";
    }
    ?>
</body>
</html>