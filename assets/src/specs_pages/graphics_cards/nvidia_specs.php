<div class="frame main-specs">
    <div class="spec">
        <img src="/assets/icons-assets/proccesor.png" alt="Architecture">
        <div>
            <strong class="block-name">Architecture</strong>
            <span class="block-value"><?php echo $row['architecture'] ?></span>
        </div>
    </div>
    <div class="spec">
        <img src="/assets/icons-assets/frequency.png" alt="Frequence">
        <div>
            <strong class="block-name">Fréquence de base</strong>
            <span class="block-value"><?php echo $row['frequency'] ?> GHz</span>
        </div>
    </div>
    <div class="spec">
        <img src="/assets/icons-assets/ram.png" alt="Mémoire vidéo">
        <div>
            <strong class="block-name">Mémoire vidéo</strong>
            <span class="block-value"><?php echo $row['vram'] ?> Go</span>
        </div>
    </div>
    <div class="spec">
        <img src="/assets/icons-assets/ram.png" alt="Type de mémoire">
        <div>
            <strong class="block-name">Type de mémoire</strong>
            <span class="block-value"><?php echo $row['memory_type'] ?></span>
        </div>
    </div>
</div>
<div class="product">
    <div class="specs">
        <?php
        $categories = ["Identité", "Performances", "Affichage", "Connectique", "Caractéristiques physiques", "Technologies"];
        $card_id_split = explode("/", "/" . str_replace("_", "/", $row["card_id"]) . "/");

        foreach ($categories as $category) {
            $sql = "SELECT * FROM nvidia_gc_properties WHERE categories = \"" . $category . "\"";
            $result = $conn->query($sql);

            echo
            "<div class=\"table\">
                <h3>" . $category . "</h3>";

            while ($row_property = $result->fetch_assoc()) {
                if (!str_contains($row_property['ids'], "not_displayed") && $row[$row_property['ids']] != NULL) {
                    echo
                    "<div class=\"table-row\">
                    <span class=\"block-name\">" . $row_property['names'] . "</span>
                    <span class=\"block-value\">";
                    if (str_contains($row_property['ids'], "date")) {
                        echo date_format(date_create($row['release_date']), "d/m/Y");
                    } else {
                        if (!str_contains($row[$row_property['ids']], "Varie")) {
                            echo $row[$row_property['ids']] . " " . $row_property["units"];
                        } else {
                            echo $row[$row_property['ids']];
                        }
                    }
                    echo
                    "</span>
                    </div>";
                }
            }
            if ($category == "Identité") {
                echo "
                <div class=\"table-row\">
                    <span class=\"block-name\">Série</span>
                    <span class=\"block-value\">" .  strtoupper($card_id_split[2]) . " " . substr($card_id_split[3], 0, 2) . "</span>
                </div>";
            }
            echo "</div>"; //close div .table
        }
        ?>
        <div class="product-img">
            <?php
            $card_link_split = explode("/", $row["card_img_link"]);
            $card_img_link_3d = "/" . $card_link_split[1] . "/" . $card_link_split[2] . "/" . $card_link_split[3] . "/3d/"  . $card_link_split[4];
            ?>
            <img srcset="<?php echo $card_img_link_3d ?>" src="<?php echo $card_img_link_3d ?>" alt="Image de la <?php echo $row['card_name'] ?>">
        </div>