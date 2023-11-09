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
        function terugOfDoor($afgelegdeAfstand, $totaleAfstand) {
            $helftafstand = $totaleAfstand / 2;

            if ($afgelegdeAfstand >= $helftafstand) {
                print("nog " . ($totaleAfstand - $afgelegdeAfstand) . " kilometer doorlopen\n");
            } else {
                print("$afgelegdeAfstand kilometer teruglopen\n");
            }
        }
            terugOfDoor(5, 11);
        /* Einde uitwerking */
        ?>
    </body>
</html>