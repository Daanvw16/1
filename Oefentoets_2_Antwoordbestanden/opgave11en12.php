<!DOCTYPE html>
<!--[Vul hier je naam en studentnummer in]-->
<html>
    <head>
        <style>
            .zwart{background-color: black;
                   color: white;}
            td{border: solid black;}
        </style>
    </head>
    <body>
        <h1>Opgave 11 en 12</h1>
        <form action="" method="post">
            Hoeveel rijen wil je zien? <input type="number" name="aantal" min="1">
            <input type="submit" value="Verzenden">
        </form>
        <?php
        if (isset($_POST['aantal']) && is_numeric($_POST['aantal'])) {
            $aantal = intval($_POST['aantal']);
            echo '<table>';
            for ($i = 0; $i < $aantal; $i++) {
                echo '<tr>';
                for ($j = 0; $j < 2; $j++) {
                    $klasse = ($i % 2 == $j) ? 'zwart' : '';
                    echo "<td class='$klasse'>X</td>";
                }
                echo '</tr>';
            }
            echo '</table>';
        }
        echo '</table>';
        /* Einde uitwerking */
        ?>
        <br>
    </body>
</html>
