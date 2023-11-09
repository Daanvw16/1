<?php
require_once('classes/Authentication.php');
require_once('classes/Database.php');

    function __construct()
    {
        $mysqli = new mysqli("localhost", "root", "", "nerdygadgets");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        $this->connection = $mysqli;
// Connect to Database
        $database = new Database();

// Initialize authentication object (responsible for authentication flow)
        $authentication = new Authentication($database->connection);

        $ingevuldeGebruikersnaam = '';

        if (!empty($_POST['username'])) {
            $ingevuldeGebruikersnaam = $_POST['username'];
        }

// Check of de username + password zijn ingevuld
        if (!empty($_POST['username']) && !empty($_POST['password'])) {

            $user = $authentication->login($_POST['username'], $_POST['password']);
            if ($user) {
                header("Location: admin.php");
                exit();
            }
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inloggen</title>
</head>
<body>

<form action="index.php" method="post">

    Gebruikersnaam:<br>
    <input type="text" name="username" autocomplete="off" value="<?= $ingevuldeGebruikersnaam ?>"><br>

    Wachtwoord:<br>
    <input type="password" name="password"><br>

    <input type="submit" name="submit" value="Inloggen"><br><br>

    <a href="reset.php">Wachtwoord opnieuw instellen</a><br>
    <a href="nieuwegebruiker.php">Gebruiker aanmaken</a>
</form>

</body>
</html>