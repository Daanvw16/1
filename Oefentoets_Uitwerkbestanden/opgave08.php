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
        $tafel = 5;

        /* Begin uitwerking */


            $num = $tafel;

            for ($i = 1; $i <= 10; $i++) {
                echo ("$i" . " X " . "$num" . " = " . $i * $num . "</p> 
        ");
        }

        /* Einde uitwerking */
        ?>
    </body>
</html>