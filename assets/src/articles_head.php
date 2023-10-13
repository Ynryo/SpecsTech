<?php
$card_id_split = explode("/", "/" . str_replace("_", "/", $id) . "/");
$path = "/" . $card_id_split[1] . "/" . $card_id_split[2] . "/" . substr($card_id_split[3], 0, 2) . "/" . substr($card_id_split[3], 2) . "/";
?>
<title>SpecsTech - <?php echo $row['card_name'] ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="SpecsTech" />
<meta name="description" content="Retrouvez toutes les informations techniques de vos cartes graphiques">
<meta property="og:title" content="SpecsTech - <?php echo $row['card_name'] ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://<?php echo $_SERVER['SERVER_NAME'] . "/articles" . $path?>" />
<meta property="og:description" content="Retrouvez toutes les informations techniques de vos cartes graphiques">
<link rel="canonical" href="https://<?php echo $_SERVER['SERVER_NAME'] . "/articles" . $path ?>">
<link rel="stylesheet" type="text/css" href="/assets/css/specs-table.css">