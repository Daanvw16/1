<!DOCTYPE html>
<!--[Vul hier je naam en studentnummer in]-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Opgave 2</title>
    </head>
    <body>
        <h1>Opgave 2</h1>
        <?php
        /* Gebruik onderstaande variabele in de uitwerking */

        $min = 3;
        $max = 8;

        /* Begin uitwerking */
            $totaal = range($min, $max);
            echo array_sum($totaal);

        /* Einde uitwerking */
        ?>
    </body>
</html>