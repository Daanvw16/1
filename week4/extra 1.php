<!DOCTYPE HTML>
<link rel="stylesheet" href="extra1.css">
    <html>
    <body>
    <form action="extra%201.php" method="post">
        Uurloon<br> <input type="text" name="uur"><br>
        aantal uur<br> <input type="text" name="aantal"><br>
        <input type="submit">
    </form>


    </body>
    </html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $uurloon = $_POST["uur"];
    $aantalUur = $_POST["aantal"];

    $salaris = $uurloon * $aantalUur;


    echo "Uurloon: €" . $uurloon . "<br>";
    echo "Aantal uur: " . $aantalUur . "<br>";
    echo "Salaris: €" . $salaris;
}
?>