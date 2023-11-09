<!DOCTYPE html>
<!--[Vul hier je naam en studentnummer in]-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Opgave 8</title>
    </head>
    <body>
        <h1>Opgave 8</h1>
        <?php
        /* Gebruik onderstaande variabelen in de uitwerking */

        $aantalWeken = 2;

        /* Begin uitwerking */
        $output = "";
        for ($week = 1; $week <= $aantalWeken; $week++) {
            $dagen = $week * 7;
            $output .= "$dagen dagen, aantal weken is $week<br>";
        }
        print($output);
        /* Einde uitwerking */
        ?>
    </body>
</html>