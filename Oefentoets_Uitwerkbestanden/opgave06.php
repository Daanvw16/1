<!DOCTYPE html>
<!--[Vul hier je naam en studentnummer in]-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Opgave 6</title>
    </head>
    <body>
        <h1>Opgave 6</h1>
        <?php
        /* Gebruik onderstaande variabelen in de uitwerking */
        $maaltijd = 'diner';
        $reserveringen = array(
            'ontbijt' => 10,
            'lunch' => 40,
            'diner' => 51
        );

        /* Begin uitwerking */
        if (array_key_exists($maaltijd, $reserveringen)) {
            $aantalReserveringen = $reserveringen[$maaltijd];
            echo "$maaltijd: $aantalReserveringen reserveringen" ;
        } else {
            echo "Maaltijd '$maaltijd' niet gevonden in de reserveringen.";
        }
        /* Einde uitwerking */
        ?>
    </body>
</html>