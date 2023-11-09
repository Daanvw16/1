<!DOCTYPE html>
<!--[Vul hier je naam en studentnummer in]-->
<html>
<head>
    <meta charset="utf-8">
    <title>Opgave 12</title>
</head>
<body>
<h1>Opgave 12</h1>

<?php
/* Begin uitwerking */
$beoordeling = ""; // This variable will hold the selected rating
$isSubmitted = false; // This will be true if the form was submitted

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isSubmitted = true;

    // Check if a rating was selected
    if (!empty($_POST["beoordeling"])) {
        $beoordeling = $_POST["beoordeling"];
        echo "<p>Je beoordeling is ontvangen: " . htmlspecialchars($beoordeling) . "!</p>";
    } else {
        echo "<p style='color: red;'>Selecteer een beoordeling!</p>";
    }
}

// HTML form
echo '<form method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">';
echo '<label for="beoordeling">Beoordeling:</label>';
echo '<select name="beoordeling" required>';
echo '<option value="">Selecteer een beoordeling</option>';
echo '<option value="Slecht" '.($beoordeling == "Slecht" ? 'selected' : '').'>Slecht</option>';
echo '<option value="Matig" '.($beoordeling == "Matig" ? 'selected' : '').'>Matig</option>';
echo '<option value="Gemiddeld" '.($beoordeling == "Gemiddeld" ? 'selected' : '').'>Gemiddeld</option>';
echo '<option value="Goed" '.($beoordeling == "Goed" ? 'selected' : '').'>Goed</option>';
echo '<option value="Uitstekend" '.($beoordeling == "Uitstekend" ? 'selected' : '').'>Uitstekend</option>';
echo '</select>';
echo '<input type="submit" value="Verzenden">';
echo '</form>';
/* Einde uitwerking */
?>



</body>
</html>
