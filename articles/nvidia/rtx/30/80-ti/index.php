<?php include(dirname(__FILE__, 6) . '/assets/src/files_top.php') ?>
<?php
$id = basename(dirname(__FILE__, 4)) . "_" . basename(dirname(__FILE__, 3)) . "_" . basename(dirname(__FILE__, 2)) . basename(dirname(__FILE__, 1));
?>
<?php include(dirname(__FILE__, 6) . '/assets/src/get_properties.php') ?>

<!DOCTYPE html>
<html>

<head>
    <?php include(dirname(__FILE__, 6) . '/assets/src/articles_head.php') ?>
    <?php include(dirname(__FILE__, 6) . '/assets/src/assets.php') ?>
</head>

<body>
    <?php include(dirname(__FILE__, 6) . '/assets/src/header.php') ?>

    <section class="hero">
        <?php include(dirname(__FILE__, 6) . "/assets/src/specs_pages/main_banner.php") ?>
    </section>
    <section class="main">
        <?php include(dirname(__FILE__, 6) . "/assets/src/specs_pages/graphics_cards/main_nvidia.php") ?>
    </section>

    <?php include(dirname(__FILE__, 6) . '/assets/src/footer.php') ?>
</body>

</html>