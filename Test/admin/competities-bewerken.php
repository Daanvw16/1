<?php
require_once('../classes/Authentication.php');
require_once('../classes/Database.php');
require_once('../classes/CompetitionManager.php');
require_once('../classes/TeamManager.php');

if (! Authentication::isLoggedIn()) {
    echo 'Je bent niet ingelogd. <a href="../index.php">Nu inloggen</a>.';
    exit;
}
if (!isset($_POST['submit'])){
    $parameters = $_GET;
}else{
    $parameters = $_POST;
}
//var_dump($parameters);
//exit();


if (empty($parameters['competition'])){
    header('location: competities.php');
    exit();
}
$database = new Database();
$competitionManager = new CompetitionManager($database->connection);
$teamManager = new TeamManager($database->connection);
$errors = [];
$competitionChanged = false;
$competition = $competitionManager->getCompetition($parameters['competition']);
$teams = $teamManager->getAllTeams();
$teamsInCompetition = $competitionManager->teamsInCompetitions($competition['id']);
if ($competition == NULL){
    header('location: competities.php');
    exit();
}

if(isset($_POST['submit'])) {

   if (empty($_POST['name'])){
       array_push($errors, 'Competitie naam mag niet leeg zijn.');
   } else{
       $competitionChanged = $competitionManager->update($_POST['competition'], $_POST['name'], $_POST['teams']);

        if ($competitionChanged == true){
           header('location: competities.php');
           exit();
       }
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
    <?php
        if (!empty($errors)){
            foreach ($errors as $error){
                echo $error . "<br>";
            }
        }
    ?>
    <form action="competities-bewerken.php" method="post">
        Team naam:<br>
        <input type="text" name="name" autocomplete="off" value="<?= $competition['name'] ?>" style="margin-bottom: 10px"><br>
        <input type="hidden" name="competition" value="<?= $competition['id'] ?>">
        Teams: <br>
        <select name="teams[]" style="width: 200px; clear:both; display: block; margin-bottom: 10px" multiple>
            <?php foreach ($teams as $team): ?>
                <?php
                $teamInCompetition = false;
                foreach($teamsInCompetition as $t)
                {
                    if ($t['id'] == $team['id'])
                    {
                       $teamInCompetition = true;
                       break;
                    }
                }
                ?>
                <?php if ($teamInCompetition): ?>
                    <option selected value="<?= $team['id'] ?>"><?= $team['name'] ?></option>
                <?php else:?>
                    <option value="<?= $team['id'] ?>"><?= $team['name'] ?></option>
                <?php endif; ?>
            <?php endforeach; ?>

        </select>
        <input type="submit" name="submit" value="bewerken">
    </form>
    <a href="competities.php">terug naar overzicht</a>

</body>
</html>

