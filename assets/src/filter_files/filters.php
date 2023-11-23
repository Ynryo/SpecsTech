<h1>Filtrez votre recherche</h1>
<?php

$flts = [["manufacturer", "Fabricant", ""], ["vram", "Mémoire vidéo", " Go"], ["memory_type", "Type de mémoire", ""], ["max_display_size", "Définition maximale d'affichage", " pixels"], ["max_screens", "Nombre d'écran maximum", ""], ["cooling", "Refroidissement", ""]];

foreach ($flts as $flt) {
    if (!isset($flt[0])){
        echo $flt[0];
    }
}


foreach ($flts as $flt) {
    $sql_flt = "SELECT DISTINCT $flt[0] FROM graphics_cards ORDER BY $flt[0] DESC";
    $result_flt = $conn->query($sql_flt);
    if ($result_flt->num_rows > 0) {
        echo "<div class=\"filter\"><h2 class=\"flt-name\">" . $flt[1] . "</h2>";
        while ($row_flt = $result_flt->fetch_assoc()) {
            echo "<div class=\"flt-item\"><input type=\"checkbox\" name=\"" . $flt[0] . "-" . $row_flt[$flt[0]] . "\" class=\"ckbx-flt\" data-flt=\"" . $flt[0] . "\" data-value=\"" . $row_flt[$flt[0]] . "\"><h3 class=\"flt-item-name\">" . $row_flt[$flt[0]] . $flt[2] . "</h3></div>";
        }
        echo "</div>";
    }
}
?>
<a class="button btn-small" id="flts-apply">Appliquer</a>
<script type="text/javascript" src="/assets/js/filters.js"></script>