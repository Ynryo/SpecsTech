<footer>
    <p>&copy; <?php echo date("Y") ?> SpecsTech. Tous droits réservés. <a href="/legal/" class="link">Mentions légales</a>
    </p>
</footer>

<script type="text/javascript" src="/assets/js/menu.js"></script>
<script type="text/javascript" src="/assets/js/search.js"></script>

<?php
include("connection.php");

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
function get_client_ip()
{
    $ipaddress = '';

    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
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

$conn->query($sql);

// $sql = "SELECT * FROM server_actions LIMIT 1";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     $row = $result->fetch_assoc();

//     if (isset($row["action"]) && $row["action"] == "maintenance_mode_on") {
//         echo $row["action"];
//         // include("htmls/")
//         header('Location: https://specstech.fr/maintenance/');
//         exit(); // Assurez-vous de terminer le script après une redirection header
//     }
// }
error_reporting(E_ALL);
ini_set('display_errors', true);

// header('Location: https://specstech.fr/maintenance.php');

// Fermer la connexion à la base de données
$conn->close();
?>