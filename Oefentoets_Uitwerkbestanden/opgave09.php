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
        $maximum = 50;
        $getal1 = 1;
        $getal2 = 2;
        $huidigGetal = $getal1 + $getal2;
        /* Begin uitwerking */
        while ($huidigGetal < $maximum) {
            print($huidigGetal . "<br>");

            $getal1 = $getal2;
            $getal2 = $huidigGetal;

            $huidigGetal = $getal1 + $getal2;
        }

        /* Einde uitwerking */
        ?>
    </body>
</html>