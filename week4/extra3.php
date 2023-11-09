<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="extra1.css">
</head>
<body>
<form action="extra3.php" method="post">
    Eerste naam<br> <input type="text" name="naam1"><br>
    Tweede naam<br> <input type="text" name="naam2"><br>
    <input type="submit">
</form>

<?php
$naam1 = ""; // Standaardwaarde instellen voor $vraag1
$naam2 = ""; // Standaardwaarde instellen voor $vraag2

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam1 = $_POST["naam1"];
    $naam2 = $_POST["naam2"];
}

if (isset($_POST['submit'])) {
    echo "<p>Beste " . $naam1 ." en ". $naam2 . "<br>". "Bedankt voor uw email. DIt berich is in goede orde ontvangen"."</p>";
}

?>
</body>
</html>
