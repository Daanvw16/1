<!DOCTYPE html>
<!--[Vul hier je naam en studentnummer in]-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Opgave 9</title>
    </head>
    <body>
        <h1>Opgave 9</h1>
        <?php
        /* Gebruik onderstaande variabelen in de uitwerking */

        $prijs = 17;

        /* Begin uitwerking */
        echo "U betaalt " . $prijs . " euro of:<br>";

        // Definieer de waarde van de korting per 100 bonuspunten.
        $kortingPerHonderdPunten = 5;

        // Bereken het aantal keer dat korting kan worden toegepast zonder dat de prijs negatief wordt.
        $maxKortingen = floor($prijs / $kortingPerHonderdPunten);

        for ($i = 1; $i <= $maxKortingen; $i++) {
            $korting = $i * $kortingPerHonderdPunten;
            $teBetalen = $prijs - $korting;
            // Voorkom dat het te betalen bedrag onder de 0 komt.
            if ($teBetalen >= 0) {
                echo $teBetalen . " euro + " . ($i * 100) . " punten<br>";
            }
        }

        /* Einde uitwerking */
        ?>
    </body>
</html>