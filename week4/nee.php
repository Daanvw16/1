<?php
function printMail($geadresseerde_naam, $verzenddag, $isVerstuurd) {
    if ($isVerstuurd) {
        $actie = "is verzonden";
    } else {
        $actie = "wordt verzonden";
    }

    $standaard_tekst = "Je pakket $actie $verzenddag.\n\nVriendelijke groeten,\nSnelpakket.nl";
    $mail_tekst = "Beste $geadresseerde_naam,\n$standaard_tekst";
    echo $mail_tekst;
}

// Voorbeeldgebruik (pakket is al verzonden):
$geadresseerde_naam = "Onno de Vries";
$verzenddag = "maandag";
$isVerstuurd = true;

printMail($geadresseerde_naam, $verzenddag, $isVerstuurd);
