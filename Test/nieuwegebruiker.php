<?php
require_once('.../classes/Authentication.php');
require_once('classes/Database.php');

// Connect to Database
$database = new Database();

// Initialize authentication object (responsible for authentication flow)
$authentication = new Authentication($database->connection);

// Maak array aan voor errors
$errors = array();

// Detecteer POST request (form POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['username'])) {
        array_push($errors, "Geen gebruikersnaam ingevuld");
    }

    if (empty($_POST['fullname'])) {
        array_push($errors, "Geen volledige naam ingevuld");
    }

    if (empty($_POST['password_new'])) {
        array_push($errors, "Geen nieuw Wachtwoord ingevuld");
    }

    if (empty($_POST['password_new_check'])) {
        array_push($errors, "Geen controle Wachtwoord ingevuld");
    }

    if ($_POST['password_new'] != $_POST['password_new_check']) {
        array_push($errors, "Ingevulde (nieuwe) wachtwoorden komen niet overeen");
    }

    // Geen errors, dus alle velden correct ingevuld
    if (count($errors) == 0) {
        $user = $authentication->getUser($_POST['username']);
        if (!$user) {
            $insertGelukt = $authentication->addUser($_POST['username'], $_POST['fullname'], $_POST['password_new'] );
            if ($insertGelukt) {
                header("Location: index.php");
                exit;
            } else {
                array_push($errors, "Niet gelukt probeer het later opnieuw");
            }
        } else {
            array_push($errors, "De gebruikersnaam bestaat al");
        }
    }

    /*
    if (! empty($_POST['username']) && ! empty($_POST['password'])) {

        $user = $authentication->login($_POST['username'], $_POST['password']);
        if ($user) {
            header("Location: admin.php");
        }

    }
    */
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wachtwoord opnieuw instellen</title>
</head>
<body>

<?php

if (count($errors) > 0) {
    echo '<ul>';
    foreach ($errors as $error) {
        echo '<li>' . $error . '</li>';
    }
    echo '</ul>';
}

?>

<form action="nieuwegebruiker.php" method="post">

    Gebruikersnaam:<br>
    <input type="text" name="username" autocomplete="off" value=""><br>

    Volledige Naam:<br>
    <input type="text" name="fullname"><br>

    Nieuwe wachtwoord:<br>
    <input type="password" name="password_new"><br>

    Nieuwe wachtwoord controle:<br>
    <input type="password" name="password_new_check"><br>

    <input type="submit" name="submit" value="Instellen"><br><br>

    <a href="index.php">Terug naar inloggen</a>
</form>

</body>
</html>