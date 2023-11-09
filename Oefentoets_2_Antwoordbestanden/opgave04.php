<!DOCTYPE html>
<!--[Vul hier je naam en studentnummer in]-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Opgave 4</title>
    </head>
    <body>
        <h1>Opgave 4</h1>
        <?php
        /* Gebruik onderstaande variabelen in de uitwerking */
        $minimum = 3;
        $maximum = 5;
        $aantalPersonen = 7;

        /* Begin uitwerking */
        if ($aantalPersonen < $minimum or $aantalPersonen > $maximum){
            echo $aantalPersonen.' personen komt niet goed uit';
        }else{
            echo $aantalPersonen.' personen kunnen samen in een groep';
        }
        /* Einde uitwerking */
        ?>
    </body>
</html>