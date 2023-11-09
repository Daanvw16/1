<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Opgave 7</title>
</head>
<body>
<h1>Opgave 7</h1>
<?php
/* Gebruik onderstaande variabelen in de uitwerking */
$lengtemetingen = array(
    '0' => 120,
    '1' => 122,
    '2' => 122,
    '3' => 127
);
/* Begin uitwerking */
$total_groei = 0;
$count = 0;
for ($i = 0; $i < count($lengtemetingen) - 1; $i++) {
    $groei = $lengtemetingen[$i + 1] - $lengtemetingen[$i];
    if ($groei > 0) {
        $total_groei += $groei;
        $count++;
        print($groei. " cm gegroeid<br>");
    } else {
        print("0 cm gegroeid X<br>");
    }
}
$average_growth = $total_groei / $count;
print("Gemiddeld ". $average_growth. " cm<br>");
/* Einde uitwerking */
?>
</body>
</html>
