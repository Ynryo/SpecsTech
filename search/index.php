<?php include(dirname(__FILE__, 2) . '/assets/src/files_top.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>SpecsTech - Rechercher</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="SpecsTech" />
    <meta name="description" content="Retrouvez toutes les informations techniques de vos cartes graphiques">
    <meta property="og:title" content="SpecsTech - Rechercher" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://specstech.fr/search/" />
    <meta property="og:description" content="Retrouvez toutes les informations techniques de vos cartes graphiques">
    <link rel="canonical" href="https://specstech.fr/search/">
    <link rel="stylesheet" type="text/css" href="/assets/css/cards.css">
    <?php include(dirname(__FILE__, 2) . '/assets/src/assets.php') ?>
</head>

<body>
    <?php include(dirname(__FILE__, 2) . '/assets/src/header.php') ?>

    <section class="hero">
        <div class="hero-content">
            <h2><span>Rechercher</span></h2>
            <img src="/assets/svg/header-line.svg" alt="" srcset="/assets/svg/header-line.svg">
            <p>Trouvez votre carte graphique.</p>
        </div>
    </section>

    <section class="main cards">
        <?php
        include(dirname(__FILE__, 2) . "/assets/src/connection.php");

        // Récupérer la requête de recherche de l'utilisateur
        if (isset($_GET["q"])) {
            $recherche = $_GET["q"];
            // Échapper les caractères spéciaux pour éviter les failles SQL
            $recherche = mysqli_real_escape_string($conn, $recherche);

            // Requête SQL pour rechercher des articles
            $query = "SELECT * FROM `graphics_cards` WHERE card_name LIKE '%$recherche%' OR card_id LIKE '%$recherche%'";

            // Exécuter la requête
            $result = mysqli_query($conn, $query);
            // Afficher les résultats
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $card_id_split = explode("/", "/" . str_replace("_", "/", $row["card_id"]) . "/");
                    if ($row["manufacturer"] == "NVIDIA") {
                        $card_link = "/" . $card_id_split[1] . "/" . $card_id_split[2] . "/" . substr($card_id_split[3], 0, 2) . "/" . substr($card_id_split[3], 2) . "/";
                    } else if ($row["manufacturer"] == "Intel") {
                        $card_link = "/" . $card_id_split[1] . "/" . $card_id_split[2] . "/" . $card_id_split[3] . "/";
                    }
                    echo "<a href=\"/articles" . $card_link . "\" class=\"card\"><div class=\"card-img-container\"><img src=\"" . $row["card_img_link"] . "\" alt=\"Image de la " . $row["card_name"] . "\" srcset=\"" . $row["card_img_link"] . "\" class=\"cards-img\"></div><img src=\"/assets/svg/cards-line.svg\" alt=\"Trait de séparation en forme de vague irrégulière\" srcset=\"/assets/svg/cards-line.svg\" class=\"cards-line\"><h3>" . $row["card_name"] . "</h3></a>";
            }
            } else {
                echo "Aucune carte graphique trouvée avec cet identifiant.";
            }
            $conn->close();
        }
        ?>
    </section>

    <?php include(dirname(__FILE__, 2) . '/assets/src/footer.php') ?>
</body>

</html>