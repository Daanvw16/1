<!DOCTYPE html>
<!--[Vul hier je naam en studentnummer in]-->
<html>
<head>
    <meta charset="utf-8">
    <title>Opgave 5</title>
</head>
<body>
<h1>Opgave 5</h1>
<?php
/* Gebruik onderstaande variabelen in de uitwerking */
$prijsPerStuk = 3;
$aantal = 30;
$vasteKlant = true;
$verzendkosten = $aantal * 0.05;
$bedrag = $prijsPerStuk * $aantal;

// Bepaal korting
if ($vasteKlant || $aantal >= 50) {
    $bedrag *= 0.9; // 10% korting
}

// Bepaal verzendkosten
if ($bedrag >= 100) {
    $verzendkosten = 0;
    $verzendNotitie = "gratis";
} else {
    $verzendNotitie = $verzendkosten;
}

$totaal = $verzendkosten + $bedrag;

/* Begin uitwerking */
echo "totaalprijs: " . $bedrag . "<br>";
echo "verzending: " . $verzendNotitie . "<br>";
echo "totaal: " . $totaal;
/* Einde uitwerking */
?>
</body>
</html>
