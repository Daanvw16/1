<?php
require_once('../classes/Authentication.php');
require_once('../classes/Database.php');
require_once('../classes/TeamManager.php');

require_once('../classes/models/Competition.php');
require_once('../classes/models/Game.php');

if (! Authentication::isLoggedIn()) {
    echo 'Je bent niet ingelogd. <a href="../index.php">Nu inloggen</a>.';
    exit;
}

$database = new Database();

$teamManager = new TeamManager($database->connection);
$teams = $teamManager->getAllTeams();

if (!empty($_GET['delete']))
{
    $teamManager->delete($_GET['delete']);
    header("Location: teams.php");
    exit();
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
    <table>
        <tr>
            <td>
                #
            </td>
            <td>
                Naam
            </td>
            <td>
                bewerken
            </td>
            <td>
                verwijderen
            </td>
        </tr>
        <?php foreach ($teams as $team): ?>
            <tr>
                <td>
                    <?= $team['id'] ?>
                </td>
                <td>
                    <?= $team['name'] ?>
                </td>
                <td>
                    <a href="teams-bewerken.php?team=<?= $team['id'] ?>">bewerken</a>
                </td>
                <td>
                    <a href="teams.php?delete=<?= $team['id'] ?>">Verwijderen</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="teams-aanmaken.php">Team aanmaken</a><br>
    <a href="index.php">Overzicht</a>

</body>
</html>

