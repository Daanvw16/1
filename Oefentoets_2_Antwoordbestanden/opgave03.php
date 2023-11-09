<!DOCTYPE html>
<!--[Vul hier je naam en studentnummer in]-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Opgave 3</title>
    </head>
    <body>
        <h1>Opgave 3</h1>
        <?php
        $seizoen = "lente"; // kies uit: zomer, lente, winter, herfst
        $temperatuur = 19;
        $neerslag = false;

        if ($seizoen == 'lente' and $temperatuur >18 and $neerslag == false or $seizoen =='zomer'
            /* vervang TRUE door je eigen uitwerking van de expressie */) {
            print ("korte broek");
        } else {
            print("lange broek");
        }
        ?>
    </body>
</html>