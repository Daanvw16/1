<!DOCTYPE html>
<!--[Vul hier je naam en studentnummer in]-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Opgave 10</title>
    </head>
    <body>
        <h1>Opgave 10</h1>
        <?php
        /* Begin uitwerking */

        function feliciteer($startjaar) {
            $huidigJaar = 2016;
            $studiejaren = $huidigJaar - $startjaar;
            echo "Gefeliciteerd, je hebt je studie in $studiejaren jaar gehaald<br>";
        }

        // Voorbeeldaanroepen
        feliciteer(2012);
        feliciteer(2013);

        /* Einde uitwerking */
        ?>
    </body>
</html>