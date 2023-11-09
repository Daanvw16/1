<!DOCTYPE html>
<!--[Vul hier je naam en studentnummer in]-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Opgave 11</title>
    </head>
    <body>
        <h1>Hoofdstuk 1</h1>
        <?php

        /* Gebruik onderstaande variabelen in de uitwerking */
        $aantalHoofdstukken = 5;

        /* Begin uitwerking */

        for ($i = 2; $i <= $aantalHoofdstukken; $i++) {
            echo("<h1>Hoofdstuk $i</h1> ");
        }
        /* Einde uitwerking */

        ?>
    </body>
</html>