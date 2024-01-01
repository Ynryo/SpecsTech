<?php include(dirname(__FILE__, 2) . '/assets/src/files_top.php') ?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <title>SpecsTech - Articles</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="SpecsTech" />
    <meta name="description" content="Retrouvez toutes les informations techniques de vos cartes graphiques">
    <meta property="og:title" content="SpecsTech - Articles" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://specstech.fr/articles/" />
    <meta property="og:description" content="Retrouvez toutes les informations techniques de vos cartes graphiques">
    <link rel="canonical" href="https://specstech.fr/articles/">
    <link rel="stylesheet" type="text/css" href="/assets/css/cards.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/utils.css">
    <?php include(dirname(__FILE__, 2) . '/assets/src/assets.php') ?>
</head>

<body>
    <?php include(dirname(__FILE__, 2) . '/assets/src/header.php') ?>
    <section class="hero">
        <div class="hero-content">
            <h2><span>Articles</span></h2>
            <img src="/assets/svg/header-line.svg" alt="" srcset="/assets/svg/header-line.svg">
            <p>Retrouvez les informations techniques de chaque carte graphique.</p>
        </div>
    </section>
    <?php
    include(dirname(__FILE__, 2) . "/assets/src/connection.php");

    $sort = "";
    $flts = [
        ["manufacturer", "Fabricant", "", "manufacturer"],
        ["vram", "Mémoire vidéo", " Go", "vram"],
        ["memory_type", "Type de mémoire", "", "memory_type"],
        ["max_display_size", "Définition maximale d'affichage", " pixels", "max_display_size_displayed"],
        ["max_screens", "Nombre d'écran maximum", "", "max_screens"],
        ["cooling", "Refroidissement", "", "cooling"]
    ];

    if (isset($_GET["sort"])) {
        $sort = $_GET["sort"];
        if ($sort !== "default" and $sort !== "") {
            if ($sort == "date-asc") {
                $sort_column = "release_date";
                $order = "DESC";
            } elseif ($sort == "date-desc") {
                $sort_column = "release_date";
                $order = "ASC";
            } elseif ($sort == "name-asc") {
                $sort_column = "card_name";
                $order = "ASC";
            } elseif ($sort == "name-desc") {
                $sort_column = "card_name";
                $order = "DESC";
            }
            $sql_srt = " ORDER BY `$sort_column` $order";
        } else {
            $sql_srt = "";
        }
    } else {
        $sql_srt = "";
    }
    $sql_art = "SELECT * FROM `graphics_cards`";

    $sql_insert_where = "";
    foreach ($flts as $flt) {
        if (isset($_GET[$flt[0]])) {
            $value = $_GET[$flt[0]];
            if (str_contains($value, ",")) {
                $values_array = explode(',', $value);
                $values_array = array_map(function ($val) {
                    return '"' . $val . '"';
                }, $values_array);
                $value = '(' . implode(',', $values_array) . ')';
                if ($sql_insert_where !== "") {
                    $sql_insert_where .= " AND " . $flt[0] . " IN " . $value;
                } else {
                    $sql_insert_where = " WHERE " . $flt[0] . " IN " . $value;
                }
            } else {
                $value = "\"" . $value . "\"";
                if ($sql_insert_where !== "") {
                    $sql_insert_where .= " AND " . $flt[0] . " = " . $value;
                } else {
                    $sql_insert_where = " WHERE " . $flt[0] . " = " . $value;
                }
            }
        }
    }
    $sql_art = $sql_art . $sql_insert_where . $sql_srt;
    $result_art = $conn->query($sql_art);
    ?>
    <section class="main">
        <div class="cards-section-top">
            <select id="cards-sort">
                <optgroup>
                    <option value="default">Trier les produits</option>
                    <option value="date-asc" <?php if ($sort == "date-asc") echo "selected"; ?>>Date de sortie (récente/ancienne)</option>
                    <option value="date-desc" <?php if ($sort == "date-desc") echo "selected"; ?>>Date de sortie (ancienne/récente)</option>
                    <option value="name-asc" <?php if ($sort == "name-asc") echo "selected"; ?>>Nom (A/Z)</option>
                    <option value="name-desc" <?php if ($sort == "name-desc") echo "selected"; ?>>Nom (Z/A)</option>
                </optgroup>
            </select>
            <script text="text/javascript" src="/assets/js/sorting.js"></script>
        </div>

        <div class="cards-section-main">
            <div class="cards-filter frame">
                <?php include(dirname(__FILE__, 2) . '/assets/src/filter_files/filters.php')
                ?>
            </div>
            <div class="cards">
                <?php
                if ($result_art->num_rows > 0) {
                    while ($row_art = $result_art->fetch_assoc()) {
                        $card_id_split = explode("/", "/" . str_replace("_", "/", $row_art["card_id"]) . "/");
                        if ($row_art["manufacturer"] == "NVIDIA") {
                            $card_link = "/" . $card_id_split[1] . "/" . $card_id_split[2] . "/" . substr($card_id_split[3], 0, 2) . "/" . substr($card_id_split[3], 2) . "/";
                        } else if ($row_art["manufacturer"] == "Intel") {
                            $card_link = "/" . $card_id_split[1] . "/" . $card_id_split[2] . "/" . $card_id_split[3] . "/";
                        }
                        echo "<a href=\"/articles" . $card_link . "\" class=\"card\"><div class=\"card-img-container\"><img src=\"" . $row_art["card_img_link"] . "\" alt=\"Image de la " . $row_art["card_name"] . "\" srcset=\"" . $row_art["card_img_link"] . "\" class=\"cards-img\"></div><img src=\"/assets/svg/cards-line.svg\" alt=\"Trait de séparation en forme de vague irrégulière\" srcset=\"/assets/svg/cards-line.svg\" class=\"cards-line\"><h3>" . $row_art["card_name"] . "</h3></a>";
                    }
                } else {
                    echo "Aucune carte graphique ne correspond à votre recherche.";
                }
                $conn->close();
                ?>
            </div>

        </div>
    </section>


    <?php include(dirname(__FILE__, 2) . '/assets/src/footer.php') ?>
</body>

</html>