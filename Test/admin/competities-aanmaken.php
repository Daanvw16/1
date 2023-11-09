<?php
require_once('../classes/Authentication.php');
require_once('../classes/Database.php');
require_once('../classes/CompetitionManager.php');

if (! Authentication::isLoggedIn()) {
    echo 'Je bent niet ingelogd. <a href="../index.php">Nu inloggen</a>.';
    exit;
}

$database = new Database();
$competionManager = new CompetitionManager($database->connection);
$errors = [];
$competitionCreated = false;

if(isset($_POST['submit'])) {

   if (empty($_POST['competition'])){
       array_push($errors, 'Competitie naam mag niet leeg zijn.');
   } else{
        $competitionCreated = $competionManager->create($_POST['competition']);

        if ($competitionCreated == true){
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
    <form action="competities-aanmaken.php" method="post">
        Competitie naam:<br>
        <input type="text" name="competition" autocomplete="off" value=""><br>

        <input type="submit" name="submit" value="Aanmaken">
    </form>
    <a href="competities.php">terug naar overzicht</a>
</body>
</html>

