<?php
function isSpiegelwoord($woord) {
    $omgekeerd = strrev($woord);

    if ($woord == $omgekeerd) {
        return true;
    } else {
        return false;
    }
}

function zoekSpiegelwoorden($woorden, $spiegel = true) {
    $result = array();

    foreach ($woorden as $woord) {
        $isSpiegelwoord = isSpiegelwoord($woord);

        if ($spiegel && $isSpiegelwoord) {
            $result[] = $woord;
        } elseif (!$spiegel && !$isSpiegelwoord) {
            $result[] = $woord;
        }
    }

    return $result;
}

function testZoekSpiegelwoorden($woorden, $spiegel = true) {
    $result = zoekSpiegelwoorden($woorden, $spiegel);

    if ($spiegel) {
        if (count($result) > 0) {
            echo "De volgende woorden zijn spiegelwoorden:" . PHP_EOL;
            foreach ($result as $woord) {
                echo $woord . PHP_EOL;
            }
        } else {
            echo "Geen spiegelwoorden gevonden." . PHP_EOL;
        }
    } else {
        if (count($result) > 0) {
            echo "De volgende woorden zijn juist geen spiegelwoorden:" . PHP_EOL;
            foreach ($result as $woord) {
                echo $woord . PHP_EOL;
            }
        } else {
            echo "Alle woorden zijn spiegelwoorden." . PHP_EOL;
        }
    }
}

$woorden = array("lepel", "vork", "negen", "tien");

echo "Resultaten voor spiegelwoorden:" . PHP_EOL;
testZoekSpiegelwoorden($woorden, true);

echo PHP_EOL;

echo "Resultaten voor niet-spiegelwoorden:" . PHP_EOL;
testZoekSpiegelwoorden($woorden, false);
?>
