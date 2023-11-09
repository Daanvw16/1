<?php
$aantal = 8; // Verander dit getal naar het gewenste aantal miljard euro's dat wordt bezuinigd
$gebied = "zorg"; // Verander dit naar het gewenste gebied van bezuiniging ("onderwijs", "zorg", of iets anders)

if ($aantal < 3) {
    echo "Mark is boos";
} elseif ($aantal >= 3 && $aantal <= 5) {
    echo "Mark is humeurig";
} elseif ($aantal > 5) {
    if ($gebied === "onderwijs" || $gebied === "zorg") {
        if ($gebied === "onderwijs") {
            echo "Mark is boos";
        } elseif ($gebied === "zorg") {
            echo "Mark is verdrietig";
        }
    } else {
        echo "Mark is blij";
    }
}
?>