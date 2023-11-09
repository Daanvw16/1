<!DOCTYPE html>
<!--[Vul hier je naam en studentnummer in]-->
<html>
<head>
    <meta charset="utf-8">
    <title>Opgave 3</title>
</head>
<body>
<h1>Opgave 3</h1>
<?php
/* Gebruik onderstaande variabelen in de uitwerking */
$elektriciteit = false;
$gas = FALSE;
$ikHebHetDruk = true;
$prijsVakman = 101;
/* vervang TRUE door je eigen uitwerking van de expressie */
if ($ikHebHetDruk == true and $prijsVakman <= 100 OR $elektriciteit == true or $gas == true) {
    print("vakman");
} else {
    print("ik doe het zelf");
}
?>
</body>
</html>