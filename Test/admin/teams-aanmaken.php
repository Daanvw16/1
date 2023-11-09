<?php
require_once('../classes/Authentication.php');
require_once('../classes/Database.php');
require_once('../classes/TeamManager.php');

if (! Authentication::isLoggedIn()) {
    echo 'Je bent niet ingelogd. <a href="../index.php">Nu inloggen</a>.';
    exit;
}

$database = new Database();
$teamManager = new TeamManager($database->connection);
$errors = [];
$teamgemaakt = false;

if(isset($_POST['submit'])) {

   if (empty($_POST['team']) || empty($_POST['city'])){
       array_push($errors, 'Teamnaam en plaatsnaam mogen niet leeg zijn.');
   } else{
        $teamgemaakt = $teamManager->create($_POST['team'], $_POST['city']);

        if ($teamgemaakt == true){
           header('location: teams.php');
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
    <form action="teams-aanmaken.php" method="post">
        Team naam:<br>
        <input type="text" name="team" autocomplete="off" value="<?= !empty($_POST['team']) ? $_POST['team'] : '' ?>"><br>
        Plaatsnaam:<br>
        <input type="text" name="city" autocomplete="off" value="<?= !empty($_POST['city']) ? $_POST['city'] : '' ?>"><br>

        <input type="submit" name="submit" value="Aanmaken">
    </form>
    <a href="teams.php">terug naar overzicht</a>
</body>
</html>

