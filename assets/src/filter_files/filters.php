<h1>Filtrez votre recherche</h1>
<?php
$flts = [["manufacturer", "Fabricant", ""], ["vram", "Mémoire vidéo", "Go"], ["memory_type", "Type de mémoire", ""], ["max_display_size", "Définition maximale d'affichage", "pixels"], ["max_screens", "Nombre d'écran maximum", ""], ["cooling", "Refroidissement", ""]];
foreach ($flts as $flt) {
    $sql_flt = "SELECT DISTINCT $flt[0] FROM graphics_cards ORDER BY $flt[0] DESC";
    $result_flt = $conn->query($sql_flt);
    if ($result_flt->num_rows > 0) {
        echo "<div class=\"filter\"><h2 class=\"flt-name\">" . $flt[1] . "</h2>";
        while ($row_flt = $result_flt->fetch_assoc()) {
            echo "<div class=\"flt-item\"><input type=\"checkbox\" name=\"manu-nvidia\" id=\"manu-nvidia\"><h3 class=\"flt-item-name\">" . $row_flt[$flt[0]] . " " . $flt[2] . "</h3></div>";
        }
        echo "</div>";
    }
}
?>
<script type="text/javascript" src="/assets/js/filters.js"></script>