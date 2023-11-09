<!DOCTYPE html>
<!--[Vul hier je naam en studentnummer in]-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Opgave 5</title>
    </head>
    <body>
        <h1>Opgave 5</h1>
        <?php
        /* Gebruik onderstaande variabelen in de uitwerking */

        $volwassenen = 2;
        $kinderen = 4;
        $hoogseizoen = true;
        $basistarief = 10 +($kinderen * 4) + ($volwassenen * 5);

        /* Begin uitwerking */
        if ($volwassenen == 2 && $kinderen >= 2){
            $familietarief = 25;
            $tariefType = "familietarief (laagseizoen) $familietarief euro";
            } else{
            $tariefType = "$volwassenen + $kinderen (laagseizoen) $basistarief euro";
            }

        if ($hoogseizoen == true) {
            $basistarief *= 1.2;
            $tariefType = "$volwassenen + $kinderen (hoogseizoen) $basistarief euro";
        }

        echo " $tariefType 
      ";

        /* Einde uitwerking */
        ?>
    </body>
</html>