<h1>Filtrez votre recherche</h1>
<?php
//create filters in relation to db
foreach ($flts as $flt) {

    $sql_flt = "SELECT DISTINCT $flt[0], $flt[3] FROM graphics_cards WHERE $flt[0] IS NOT NULL ORDER BY $flt[0] DESC";
    $result_flt = $conn->query($sql_flt);

    //print chaque catégorie (filtres)
    if ($result_flt->num_rows > 0) {
        echo "<div class=\"filter\"><h2 class=\"flt-name\">" . $flt[1] . "</h2>";

        //print chaque valeur de filtre (chaque checkbox)
        while ($row_flt = $result_flt->fetch_assoc()) {
            echo
            "<div class=\"flt-item\"><div>
                    <label class=\"checkbox\">
                        <input type=\"checkbox\" name=\"" . $flt[0] . "-" . $row_flt[$flt[0]] . "\" class=\"ckbx-flt\" data-flt=\"" . $flt[0] . "\" data-value=\"" . $row_flt[$flt[0]] . "\"";

            // Vérifie si le filtre est présent dans les paramètres de l'URL
            if (isset($_GET[$flt[0]]) && in_array($row_flt[$flt[0]], explode(',', $_GET[$flt[0]]))) {
                echo ' checked';
            }

            echo "><div class=\"transition\"></div></div></label>
                <h3 class=\"flt-item-name\">" . $row_flt[$flt[3]] . $flt[2] . "</h3></div>";
        }

        echo "</div>";
    }
}

//SELECT DISTINCT $flt[0] FROM graphics_cards WHERE `graphics_cards`.$flt[0] = $row_flt[$flt[0]] ORDER BY $flt[0] DESC
?>
<a class="button" id="flts-apply">Appliquer</a>
<script type="text/javascript" src="/assets/js/filters.js"></script>