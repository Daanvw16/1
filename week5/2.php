<?php
$totalPoints = 0;

while (true) {
    $diceRoll = rand(1, 6);

    echo "Het getrokken getal is: $diceRoll<br>";

    if ($diceRoll % 2 == 0) {
        $cardsDrawn = $diceRoll;
        echo "Kaarten trekken...<br>";

        for ($i = 0; $i < $cardsDrawn; $i++) {
            $cardValue = rand(1, 52);
            echo "De waarde van de kaart is: $cardValue<br>";
            $totalPoints += $cardValue;
        }
    } else {
        echo "Er zijn totaal $totalPoints punten gescoord.<br>";
        break;
    }
}
?>
