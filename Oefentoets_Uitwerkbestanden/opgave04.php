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
        $weekend = false;
        $afstand = 10;

        /* Begin uitwerking */
        if ($weekend = true and $afstand <= 10){
            echo 'fiets';
        }else{
            echo 'auto';
        }

        /* Einde uitwerking */
        ?>
    </body>
</html>