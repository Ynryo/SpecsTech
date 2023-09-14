<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <title>SpecsTech - Spécifications techniques</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="SpecsTech, specs tech, carte graphique, cartes graphiques, nvidia, amd" />
    <meta name="description" content="Retrouvez toutes les informations techniques des dernières cartes graphiques">
    <meta property="og:title" content="Accueil ǀ SpecsTech" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://specstech.fr" />
    <meta property="og:description" content="Retrouvez toutes les informations techniques des dernières cartes graphiques">
    <link rel="canonical" href="https://specstech.fr">
    <link rel="stylesheet" type="text/css" href="/assets/css/modal.css">
    <?php include(dirname(__FILE__, 1) . '/assets/src/assets.php') ?>
</head>

<body>
    <?php include(dirname(__FILE__, 1) . '/assets/src/header.php') ?>

    <section class="hero">
        <div class="hero-content">
            <h2>Bienvenue sur <span class="colored-logo">SpecsTech</span></h2>
            <img src="/assets/svg/header-line.svg" alt="" srcset="/assets/svg/header-line.svg">
            <p>Découvrez les spécifications techniques des dernières cartes graphiques.</p>
            <a class="cta-button" id="cta-button-open">En savoir plus</a>
            <div class="modal-overlay">
                <div class="modal">
                    <h3>En savoir plus</h3>
                    <p>SpecsTech à pour but de fournir des informations détaillés pour les cartes graphiques. Le site
                        étant jeune, toutes les cartes graphiques ne sont pas répertoriés mais cela ne saurait tarder.
                        N'hésitez pas à me contacter pour s'il manque certaines cartes graphiques.</p>
                    <br>
                    <p>Pour retrouver les spécifications techniques de vos cartes graphiques, vous pouvez rechercher le
                        nom de celle-ci dans la barre de recherche ou fouiller dans la section <a href="/articles/" class="link">articles</a>.</p>
                    <a class="button" id="cta-button-close">Fermer</a>
                </div>
            </div>
        </div>
    </section>

    <section class="main">
        <h2>Dernières cartes graphiques</h2>
        <?php
        include(dirname(__FILE__, 1) . '/assets/src/connection.php');
        $sql = "SELECT * FROM `graphics_cards` ORDER BY `graphics_cards`.`release_date` DESC LIMIT 5";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $img_link = $row["card_id"];
                $card_id_split = explode("/", "/" . str_replace("_", "/", $row["card_id"]) . "/");
                $card_link = "/" . $card_id_split[1] . "/" . $card_id_split[2] . "/" . substr($card_id_split[3], 0, 2) . "/" . substr($card_id_split[3], 2) . "/";
                echo '<a href="/articles' . $card_link . '" class="frame nolink">
                        <div class="content">
                            <div class="desc">
                                <h3>' . $row["card_name"] . '</h3>
                                <p>Décrouvrez les spécifications techniques de la ' . $row["card_name"] . '.</p>
                            <div href="/articles' . $card_link . '" class="button">Voir les spécifications</div>
                            </div>
                            <img class="articles-img" src=/assets/images/' . $img_link . '.png alt="' . $row["card_name"] . '"></img>
                        </div>
                    </a>';
            }
        } else {
            echo "Aucun article.";
        }
        $conn->close();
        ?>
    </section>

    <?php include(dirname(__FILE__, 1) . '/assets/src/footer.php') ?>
    <script type="text/javascript" src="/assets/js/modal.js"></script>
</body>

</html>