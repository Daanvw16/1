<!DOCTYPE html>
<html>
<head>
    <style>
        /* Begin opdracht 2: CSS - Vul hieronder de kleuren in voor de pagina */
        h1 {
            color: #6699CC;
        }
        h3 {
            color: green;
        }
        body {
            background-color: ;
        }
        /* Einde opdracht 2: CSS - Vul hierboven de kleuren in voor de pagina */
        img {
            float: right;
        }
        a {
            font-style: italic;
        }
        table,th,td{
            border-style: solid;
            border-color: black;
        }
        p{
            color: DimGrey;
        }
    </style>
</head>
<body>
<h1><img alt="Logo" src="https://i.pinimg.com/originals/77/0b/80/770b805d5c99c7931366c2e84e88f251.png" width="200" height="200">Weerbericht 15 september</h1>

<div>
    <!-- Begin opdracht 1: HTML -->
    <p>
        Met 28,7 graden in de omgeving van Den Haag, meetpunt Voorschoten/Valkenburg, is er een evenaring van warmste Prinsjesdagen ooit. Het record staat ook op 28,7 graden en werd gemeten op 19 september 1961. In 1963 werd het op Prinsjesdag 24,8 graden.
    </p>
    <p>
        Het is ook officieel de warmste 15 september. In De Bilt is het momenteel 29,5 graden. Daarmee is het het
        negende warmterecord van 2020. De vorige keer dat het officieel tot een warmterecord kwam was op 11
        augustus tijdens de intense hittegolf.
    </p>
    <h3>Komende dagen langzaam minder warm</h3>
    <p>
        De komende dagen neemt de hitte af. De temperatuur stijgt morgen naar 23-29 graden, vanaf donderdag
        liggen de maxima tussen 19 en 24 graden. Het weerbeeld laat veel zonneschijn zien en het blijft droog.
    </p>
    <p>
        Klik <a href="https://www.knmi.nl/nederland-nu/klimatologie/maand-en-seizoensoverzichten/2023/winter" target="_blank">hier</a> voor het weeroverzicht van de winter van 2023.
    </p>
    <!-- Einde opdracht 1: HTML -->
</div>

<h3>Temperatuuroverzicht komende week</h3>
<table>
    <thead>
    <tr>
        <th>Dag</th>
        <th>Temperatuur</th>
        <th>Opmerkingen</th>
    </tr>
    </thead>
    <tbody>
    <?php
    /* Begin opdracht 5: PHP */
    $templist = array(
        "maandag" => 28,
        "dinsdag" => 27,
        "woensdag" => 24,
        "donderdag" => 20,
        "vrijdag" => 22,
        "zaterdag" => 21,
        "zondag" => 19
    );

    foreach($templist as $dag => $temp){?>
        <tr>
            <td> <?php print $temp; ?> </td>
            <td> <?php print $temp; ?> </td>
            <td> <?php if ((array($templist =>25)))
                echo 'warm';
                } ?></td>
        </tr>
        <?php
        /* Einde opdracht 5: PHP*/
     // N.B.  Dit is de afsluitende accolade van de foreach-structuur
    ?>
    </tbody>
</table>
<p>
    Het wordt woensdag warmer dan donderdag.
</p>
<p>
    <?php
    /* Begin opdracht 3a: PHP */
    $maandag = 28;
    $dinsdag = 27;

    print($maandag);

    /* Eind opdracht 3a: PHP */

    print("<br>"); /* Hiermee kunnen we ervoor zorgen
    			    dat de output van de volgende print-opdracht
                      op een nieuwe regel wordt weergegeven. */

    /* Begin opdracht 3b: PHP */

    $gemiddelde = 0;
    print("Het gemiddelde van de temperaturen op maandag en dinsdag is: ");
    print($gemiddelde);

    /* Eind opdracht 3b: PHP */
    ?>
</p>
<p>
    <?php
    /* Begin opdracht 4: PHP */

    if ($maandag > $dinsdag) {
        print("Het wordt maandag warmer dan dinsdag.");
    } else {
        print("Het wordt maandag niet warmer dan dinsdag.");
    }

    /* Eind opdracht 4: PHP */
    ?>
</p>
<br/>
<p>
    <?php
    /* Begin opdracht 6: PHP */
    date_default_timezone_set('Europe/Amsterdam');
    $tijdstip = date("H:i");

    print("Het is nu " . $tijdstip . " uur.");

    /* Eind opdracht 6: PHP */
    ?>
</p>

</body>
</html>