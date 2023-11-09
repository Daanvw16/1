<?php
// 3a
$rondetijden = [5, 5, 6, 6, 7];

foreach ($rondetijden as $index => $tijd) {
    echo "ronde " . ($index + 1) . ": $tijd minuten<br>";
}

// 3b
$aantalRonden = count($rondetijden);
$totaalTijd = array_sum($rondetijden);

echo "aantal ronden: $aantalRonden<br>";
echo "totale tijd: $totaalTijd minuten<br>";

// 3c
$snelsteRonde = min($rondetijden);
$langzaamsteRonde = max($rondetijden);

echo "snelste ronde: $snelsteRonde minuten<br>";
echo "langzaamste ronde: $langzaamsteRonde minuten<br>";
?>
