<?php
require_once('../classes/Authentication.php');
require_once('../classes/Database.php');
require_once('../classes/CompetitionManager.php');

if (! Authentication::isLoggedIn()) {
    echo 'Je bent niet ingelogd. <a href="../index.php">Nu inloggen</a>.';
    exit;
}

if (empty($_GET['game'])){
    header('location: competities.php');
    exit();
}

$database = new Database();

$competitionManager = new CompetitionManager($database->connection);
$teamManager = new TeamManager($database->connection);
$game = $competitionManager->getGame($_GET['game']);

if (!$game){
    header('location: competities.php');
    exit();
}

$teamA = $teamManager->getTeam($game['team_id_home']);
$teamB = $teamManager->getTeam($game['team_id_away']);

if (!empty($_POST['game_id'])) {
    $competitionManager->createGoal($_POST['game_id'], $_POST['team_id'], $_POST['minute']);
    header('location: scheme.php?competition=' . $game['competition_id']);
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

<form action="doelpunt-invoeren.php?game=<?= $game['id'] ?>" method="post">
    <input type="hidden" name="game_id" value="<?= $game['id'] ?>">
    <table>
        <tr>
            <td>Team</td>
            <td>
                <select name="team_id" id="">
                    <option value="<?= $teamA['id'] ?>"><?= $teamA['name'] ?></option>
                    <option value="<?= $teamB['id'] ?>"><?= $teamB['name'] ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Minuut</td>
            <td><input type="number" name="minute" step="1" min="0" max="150" value="0"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Invoeren"></td>
        </tr>
    </table>
</form>

<a href="scheme.php?competition=<?= $game['competition_id'] ?>">Terug</a>

</body>
</html>

