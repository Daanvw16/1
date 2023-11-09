<?php
require_once('classes/Authentication.php');

if (! Authentication::isLoggedIn()) {
    echo 'Je bent niet ingelogd. <a href="index.php">Nu inloggen</a>.';
    exit;
}

// Vanaf hier ben je altijd ingelogd

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
<a href="admin/teams.php"></a>
</body>
</html>

