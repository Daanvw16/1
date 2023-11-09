<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="extra1.css">
</head>
<body>
<form action="extra2.php" method="post">
    Vraag 1<br> <input type="text" name="vraag1"><br>
    Vraag 2 <br> <input type="text" name="vraag2"><br>
    <input type="submit">
</form>

<?php
$vraag1 = ""; // Standaardwaarde instellen voor $vraag1
$vraag2 = ""; // Standaardwaarde instellen voor $vraag2

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vraag1 = $_POST["vraag1"];
    $vraag2 = $_POST["vraag2"];
    echo "<p>Vraag 1: " . ucfirst($vraag1) . "</p>";
    echo "<p>Vraag 2: " . ucfirst($vraag2) . "</p>";

}


?>
</body>
</html>
