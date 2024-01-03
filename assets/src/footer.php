<footer>
    <div>
        <a class="icon nolink" href="/">
            <h1>SpecsTech</h1>
        </a>
        <div>
            <p><strong>Articles populaires</strong></p>
            <?php
            include("connection.php");
            $sql = "SELECT `card_id`,`card_name`,`manufacturer` FROM `graphics_cards` ORDER BY popularity DESC LIMIT 5";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    include('id_to_link.php');
                    echo "<a href=\"/articles" . $card_link . "\" class=\"link\">" . $row["card_name"] . "</a>";
                }
            }
            ?>
        </div>
        <div>
            <p><strong>Naviguer</strong></p>
            <a href="/articles/" class="link">Articles</a>
            <a href="/glossary/" class="link">Lexique</a>
            <a href="/about/" class="link">A propos</a>
            <a href="/contact/" class="link">Nous contacter</a>
        </div>
        <div>
            <p><strong>Nos réseaux</strong></p>
            <a href="https://instagram.com/specs.tech" class="link">Instagram</a>
            <a href="mailto:contact@specstech.fr" class="link">Mail</a>
        </div>
    </div>
    <p class="copy">&copy; <?php echo "2023 - " . date("Y") ?> SpecsTech. Tous droits réservés.
        <a href="/legal/" class="link">Mentions légales</a>
    </p>
</footer>

<script type="text/javascript" src="/assets/js/menu.js"></script>
<script type="text/javascript" src="/assets/js/search.js"></script>

<?php
include("connection.php");
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
$page_visitee = strip_tags($_SERVER['REQUEST_URI']); // La page visitée
$ip_visiteur = get_client_ip(); // Adresse IP du visiteur
$date_visite = date("Y-m-d"); // Date de la visite
$heure_visite = date("H:i:s"); // Heure de la visite

// Requête SQL pour insérer les données dans la table
$sql = "INSERT INTO table_visiteurs (adresse_ip, page_visitee, date_visite, heure_visite)
        VALUES ('$ip_visiteur', '$page_visitee', '$date_visite', '$heure_visite')";

$conn->query($sql);

// Fermer la connexion à la base de données
$conn->close();
?>