<?php
// Connexion à la base de données
$conn = new mysqli("127.0.0.1:3306", "qgkenujx_admin", "c4;,pp9,^&pscpCbWC", "qgkenujx_main");

// Vérifier si la connexion a réussi
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
} else {
    echo "Connecté<br>";
}

// Requête SQL pour créer la table cartes_graphiques si elle n'existe pas
$sql = "CREATE TABLE IF NOT EXISTS cartes_graphiques (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    carte_id VARCHAR(255) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    fabricant VARCHAR(255) NOT NULL
    -- Ajoutez d'autres colonnes pour les spécifications techniques ici
)";

// Exécuter la requête SQL pour créer la table
if ($conn->query($sql) === TRUE) {
    echo "La table cartes_graphiques a été créée avec succès ou elle existe déjà.<br>";
} else {
    echo "Une erreur s'est produite lors de la création de la table : " . $conn->error . "<br>";
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $carte_id = $_POST["carte_id"];
    $nom = $_POST["nom"];
    $fabricant = $_POST["fabricant"];
    // Ajoutez d'autres variables pour les spécifications techniques ici

    // Vérifier si le carte_id existe déjà
    $check_stmt = $conn->prepare("SELECT carte_id FROM cartes_graphiques WHERE carte_id = ?");
    $check_stmt->bind_param("s", $carte_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        echo "Le carte_id existe déjà dans la base de données.";
    } else {
        // Préparer la requête SQL pour insérer les données dans la base de données
        $insert_stmt = $conn->prepare("INSERT INTO cartes_graphiques (carte_id, nom, fabricant) VALUES (?, ?, ?)");
        $insert_stmt->bind_param("sss", $carte_id, $nom, $fabricant);

        // Exécuter la requête SQL
        if ($insert_stmt->execute()) {
            echo "Les spécifications techniques de la carte graphique ont été ajoutées avec succès à la base de données.";
        } else {
            echo "Une erreur s'est produite lors de l'ajout des spécifications techniques à la base de données : " . $conn->error;
        }

        // Fermer la requête préparée pour l'insertion
        $insert_stmt->close();
    }

    // Fermer la requête préparée pour la vérification
    $check_stmt->close();
}

// Fermer la connexion à la base de données
$conn->close();
?>





<?php

// Connexion à la base de données (remplace les paramètres par les tiens)
$servername = "127.0.0.1:3306";
$username = "qgkenujx_admin";
$password = "c4;,pp9,^&pscpCbWC";
$dbname = "qgkenujx_main";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Vérifier si la table existe, sinon la créer
$table_name = "table_visiteurs";
$sql_check_table = "SHOW TABLES LIKE '$table_name'";
$result_check_table = $conn->query($sql_check_table);

if ($result_check_table->num_rows == 0) {
    $sql_create_table = "CREATE TABLE $table_name (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        adresse_ip VARCHAR(45) NOT NULL,
        page_visitee VARCHAR(255) NOT NULL,
        date_visite DATE NOT NULL,
        heure_visite TIME NOT NULL
    )";

    if ($conn->query($sql_create_table) === TRUE) {
        echo "La table '$table_name' a été créée avec succès !";
    } else {
        echo "Erreur lors de la création de la table : " . $conn->error;
        $conn->close();
        exit();
    }
}

// Fonction pour obtenir l'adresse IP du visiteur
function get_client_ip() {
    $ipaddress = '';

    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress;
}

// Enregistrement des informations du visiteur
$page_visitee = $_SERVER['REQUEST_URI']; // La page visitée
$ip_visiteur = get_client_ip(); // Adresse IP du visiteur
$date_visite = date("Y-m-d"); // Date de la visite
$heure_visite = date("H:i:s"); // Heure de la visite

// Requête SQL pour insérer les données dans la table
$sql = "INSERT INTO $table_name (adresse_ip, page_visitee, date_visite, heure_visite)
        VALUES ('$ip_visiteur', '$page_visitee', '$date_visite', '$heure_visite')";

if ($conn->query($sql) === TRUE) {
    echo "Enregistrement réussi !";
} else {
    echo "Erreur lors de l'enregistrement : " . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();
?>