<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultaat</title>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $rapportcijfer = isset($_POST['rcijfer']) ? $_POST['rcijfer'] : "";
    $leeftijd = isset($_POST['ltijd']) ? $_POST['ltijd'] : "";


    if (empty($rapportcijfer) || empty($leeftijd)) {
        echo "<p>Fout: Niet alle velden zijn ingevuld.</p>";
        echo '<a href="2.php">Terug naar de evaluatie</a>';
    } else {

        if (!is_numeric($rapportcijfer) || !is_numeric($leeftijd) || $rapportcijfer < 1 || $rapportcijfer > 10 || $leeftijd < 16 || $leeftijd > 120) {
            echo "<p>Fout: Ongeldige waarden voor rapportcijfer of leeftijd.</p>";
            echo '<a href="2.php">Terug naar de evaluatie</a>';
        } else {
            $indruk = isset($_POST['indruk']) ? $_POST['indruk'] : "Niet beoordeeld";


            $cijferIndrukMatch = true;
            if (($indruk === "super" && ($rapportcijfer < 9 || $rapportcijfer > 10))
                || ($indruk === "goed" && ($rapportcijfer < 6 || $rapportcijfer > 8))
                || ($indruk === "matig" && ($rapportcijfer < 4 || $rapportcijfer > 5))
                || ($indruk === "slecht" && ($rapportcijfer < 1 || $rapportcijfer > 3))) {
                $cijferIndrukMatch = false;
            }

            if (!$cijferIndrukMatch) {
                echo "Dus je wilde beweren dat " . $rapportcijfer . " gewoon " . $indruk . " is?<br>";
                echo '<a href="2.php">Terug naar het evaluatieformulier</a>';
            } else {
                echo "<p>Rapportcijfer: " . $rapportcijfer . "</p>";
                echo "<p>Leeftijd: " . $leeftijd . " jaar</p>";
                echo "<p>Algemene indruk: " . $indruk . "</p>";
                echo '<a href="2.php">Terug naar het evaluatieformulier</a>';
            }
        }
    }
}
?>
</body>
</html>
