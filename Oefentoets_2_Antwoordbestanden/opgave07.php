<!DOCTYPE html>
<!--[Vul hier je naam en studentnummer in]-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Opgave 7</title>
    </head>
    <body>
        <h1>Opgave 7</h1>
        <?php

        /* Gebruik onderstaande variabelen in de uitwerking */
        $gezochtInstrument = "harp";
        $muzikantenLijst = array(
            "Piet" => "viool",
            "Johanna" => "piano",
            "Hilly" => "viool",
            "Rachel" => "blokfluit",
            "Tamara" => "harp",
            "hassan" => "klarinet",
        );

        /* Begin uitwerking */
        $muzikantenMetInstrument = vindMuzikantenMetInstrument($gezochtInstrument, $muzikantenLijst);

        if (count($muzikantenMetInstrument) > 0) {
            echo implode(" ", array_keys($muzikantenMetInstrument)) . " (" . count($muzikantenMetInstrument) . ")";
        } else {
            echo "Niemand speelt " . $gezochtInstrument;
        }
        /* Einde uitwerking */

        function vindMuzikantenMetInstrument($gezochtInstrument, $muzikantenLijst) {
            return array_filter($muzikantenLijst, function ($instrument) use ($gezochtInstrument) {
                return $instrument === $gezochtInstrument;
            });
        }
        ?>

    </body>
</html>
