<?php include(dirname(__FILE__, 2) . '/assets/src/files_top.php') ?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <title>SpecsTech - Lexique</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="SpecsTech, specs tech, carte graphique, cartes graphiques, nvidia, amd" />
    <meta name="description" content="Retrouvez toutes les informations techniques de vos cartes graphiques">
    <meta property="og:title" content="SpecsTech - Lexique" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://specstech.fr/glossary/" />
    <meta property="og:description" content="Retrouvez toutes les informations techniques de vos cartes graphiques">
    <link rel="canonical" href="https://specstech.fr/glossary/">
    <link rel="stylesheet" type="text/css" href="/assets/css/modal.css">
    <?php include(dirname(__FILE__, 2) . '/assets/src/assets.php') ?>
    <link rel="stylesheet" href="/assets/css/table-lines.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <?php include(dirname(__FILE__, 2) . '/assets/src/header.php') ?>

    <section class="hero">
        <div class="hero-content">
            <h2><span>Lexique</span></h2>
            <img src="/assets/svg/header-line.svg" alt="" srcset="/assets/svg/header-line.svg">
            <p>Retrouvez les définitions du vocabulaire utilisé sur le site.</p>
        </div>
    </section>

    <section class="main">
        <?php
        $sql = "SELECT * FROM `glossary`";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo
                '<div class="table-line" id="articles_lines">
                    <div class="line-top">'
                    . $row["title"] .
                    '<span class="material-symbols-rounded">
                    expand_more
                    </span>
                    </div>
                    <div class="line-content">' . $row["description"] . '</div>
                </div>';
            }
        }
        ?>

    </section>
    <script src="/assets/js/lines_expand_collapse.js"></script>

    <?php include(dirname(__FILE__, 2) . '/assets/src/footer.php') ?>
</body>

</html>