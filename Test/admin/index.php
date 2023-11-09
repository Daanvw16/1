<?php
require_once('../classes/Authentication.php');
require_once('../classes/Database.php');
require_once('../classes/TeamManager.php');

if (! Authentication::isLoggedIn()) {
    echo 'Je bent niet ingelogd. <a href="../index.php">Nu inloggen</a>.';
    exit;
}

class Database
{
    public mysqli $connection;

    function __construct() {
        $mysqli = new mysqli("localhost","root","","bijles-php");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }

        $this->connection = $mysqli;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <a href="teams.php">Teams</a>
    <a href="competities.php">Competities</a>

</body>
</html>

