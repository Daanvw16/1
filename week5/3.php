<?php

$startVermogen = 1000 ;
$rentePercentage = 4 ;

$renteDecimal = $rentePercentage / 100;


$huidigVermogen = $startVermogen;
$aantalJaren = 0;


while ($huidigVermogen < $startVermogen * 2) {

    $huidigVermogen *= (1 + $renteDecimal);

    $aantalJaren++;
}

echo 'Het startvermogen is: '. $startVermogen."<br>";
echo 'Het rentepercentage is: '. $rentePercentage."<br><br>";
echo "Het eindvermogen is: $huidigVermogen <br>";
echo "Het aantal jaren is: $aantalJaren<br>";
?>
