<?php
print("Er is er een jarig.<br>");
for ($aantal=0; $aantal<6; $aantal=$aantal+1){
    print("Hieperdepiep hoera!<br>");
}
print("Proost!");


$tafel = 1;

for ($b = 0; $b <= 10; $b++){
    echo $tafel. 'x'. $b.'='. $tafel * $b. '<br>';
}

$colors = array("red", "green", "blue", "yellow");

foreach
($colors as $x) {
    echo $x. '<br>' ;
}

$ster = '********';
for ($t = 1; $t <= 8; $t++){
    echo "$ster <br>";
}

for ($i = 1; $i <= 8; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}

for ($i = 8; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}




?>
