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
        $route = "Meppel Zwolle Amersfoort";

        /* Begin uitwerking */
        $route = strtoupper($route);
        $route = str_replace(" ","-",$route);
        print_r($route);
        /* Einde uitwerking */
        ?>
    </body>
</html>