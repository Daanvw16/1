<?php

$volwassenen = 2;
$kinderen = 1;
$hoogseizoen = false;

$basistarief = 10 + ($kinderen * 4) + ($volwassenen * 5);


if ($volwassenen == 2 && $kinderen >= 2) {
    $basistarief = 25;
    $tariefType = "familietarief (laagseizoen)";
} else {
    $tariefType = "$volwassenen + $kinderen (laagseizoen)";
}

if ($hoogseizoen) {
    $basistarief *= 1.2;
    $tariefType .= " (hoogseizoen)";
}




