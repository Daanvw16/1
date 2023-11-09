<!DOCTYPE html>
<!--[Vul hier je naam en studentnummer in]-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Opgave 1</title>
    </head>
    <body>
        <h1>Opgave 1</h1>
        <?php
        /* Gebruik onderstaande variabele in de uitwerking */
        $woordje = "la";
        $aantal = 2;

        /* Begin uitwerking */
        $songtekst = str_repeat($woordje, $aantal);
        print $songtekst;
        /* Einde uitwerking */
        ?>
    </body>
</html>