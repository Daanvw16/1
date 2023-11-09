<?php
require_once('../classes/Authentication.php');
require_once('../classes/Database.php');
require_once('../classes/CompetitionManager.php');

if (! Authentication::isLoggedIn()) {
    echo 'Je bent niet ingelogd. <a href="../index.php">Nu inloggen</a>.';
    exit;
}

$database = new Database();

$competitionManager = new CompetitionManager($database->connection);
$competitions = $competitionManager->getAllCompetitions();

if (!empty($_GET['delete']))
{
    $competitionManager->delete($_GET['delete']);
    header("Location: competities.php");
    exit();
}

if (!empty($_GET['create_scheme']))
{
    $competition = $_GET['create_scheme'];
    $competitionManager->createScheme($competition);
    header("Location: scheme.php?competition=" . $_GET['create_scheme']);
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
            Teams
        </td>
        <td>
            Winnaar
        </td>
        <td>
            Bewerken
        </td>
        <td>
            Verwijderen
        </td>
        <td>
            Spelschema
        </td>
    </tr>
    <?php foreach ($competitions as $competition): ?>
        <tr>
            <td>
                <?= $competition['id'] ?>
            </td>
            <td>
                <?= $competition['name'] ?>
            </td>
            <td>
                <?= $competition['number_of_teams'] ?>
            </td>
            <td>
                <?php if(!empty($competition['team_name'])): ?>
                <?= $competition['team_name'] ?>
                <?php else: ?>
                -
                <?php endif ?>
            </td>
            <td>
                <a href="competities-bewerken.php?competition=<?= $competition['id'] ?>">Bewerken</a>
            </td>
            <td>
                <a href="competities.php?delete=<?= $competition['id'] ?>">Verwijderen</a>
            </td>
            <td>
                <?php if($competitionManager->creatingSchemeAvailable($competition['id'])): ?>
                <a href="competities.php?create_scheme=<?= $competition['id'] ?>">Spelschema maken</a>
                <?php else: ?>
                    <a href="scheme.php?competition=<?= $competition['id'] ?>">Open spelschema</a>
                <?php endif ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="competities-aanmaken.php">Competitie aanmaken</a><br>
<a href="index.php">Overzicht</a>

</body>
</html>

