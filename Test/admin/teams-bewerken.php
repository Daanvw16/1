<?php
require_once('../classes/Authentication.php');
require_once('../classes/Database.php');
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

if (empty($parameters['team'])){
    header('location: teams.php');
    exit();
}
$database = new Database();
$teamManager = new TeamManager($database->connection);
$errors = [];
$teamAangepast = false;
$team = $teamManager->getTeam($parameters['team']);

if ($team == NULL){
    header('location: teams.php');
    exit();
}

$imagesDirectory = "../uploads/team_" . $team['id'];
$images = glob("$imagesDirectory/*.{jpg,jpeg,png}", GLOB_BRACE);
$maxAmountOfImages = 5;

// Delete image
if (!empty($_GET['delete'])) {
    if(!str_starts_with($_GET['delete'], '.')) {
        unlink($imagesDirectory . '/' . $_GET['delete']);
    }

    header('location: teams-bewerken.php?team=' . $team['id']);
    exit();
}

// Formulier POST
if(isset($_POST['submit'])) {

   if (empty($_POST['name'])) {
       array_push($errors, 'Teamnaam mag niet leeg zijn.');
   } else if (empty($_POST['city'])) {
       array_push($errors, 'Plaatsnaam mag niet leeg zijn.');
   } else{
       $teamAangepast = $teamManager->update($_POST['team'], $_POST['name'], $_POST['city']);

       if ($teamAangepast == false) {
           array_push($errors, 'Er is iets misgegaan bij het opslaan.');
       }

       if (count($images) + count($_FILES) > $maxAmountOfImages) {
           array_push($errors, 'Er kunnen maximaal ' . $maxAmountOfImages . ' afbeeldingen worden geupload.');
       } else {
           foreach ($_FILES as $name => $file) {
               $pathInfo = pathinfo($file['name']);
               $allowedExtensions = ['jpeg', 'jpg', 'png'];

               if (!in_array($pathInfo['extension'], $allowedExtensions)) {
                   array_push($errors, 'Een of meer afbeeldingen is niet van het juiste type.');
                   break;
               }

               $directory = '../uploads/team_' . $team['id'];

               if (!is_dir($directory)) {
                   mkdir($directory);
               }

               rename($file['tmp_name'], $directory . '/' . $file['name']);
           }
       }

       if (count($errors) == 0) {
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
    <style>
        button, input[type=file] {
            margin: 10px 0 10px 0;
        }
        input[type=file] {
            width: 100%;
        }
    </style>
    <script>
        var aantalUploadTags = <?= count($images) ?>;

        document.addEventListener("DOMContentLoaded", function(){
            setButtonDisabledIfNeeded();
        });

        function addImageUploadTag() {
            var tag = document.createElement("input");
            tag.setAttribute('type', 'file');
            tag.setAttribute('accept', '.jpeg,.jpg,.png');
            tag.setAttribute('name', 'image_' + (aantalUploadTags+1));

            const element = document.getElementById("fileUploads");
            element.appendChild(tag);

            aantalUploadTags += 1;

            setButtonDisabledIfNeeded();

            return false;
        }

        function setButtonDisabledIfNeeded() {
            if (aantalUploadTags == <?= $maxAmountOfImages ?>) {
                const button = document.getElementById("addImageUpload");
                button.disabled = true;
            }
        }
    </script>
</head>
<body>
    <?php
        if (!empty($errors)){
            foreach ($errors as $error){
                echo $error . "<br>";
            }
        }
    ?>
    <form action="teams-bewerken.php" method="post" enctype="multipart/form-data">
        Team naam:<br>
        <input type="text" name="name" autocomplete="off" value="<?= $team['name'] ?>"><br>

        Plaatsnaam:<br>
        <input type="text" name="city" autocomplete="off" value="<?= $team['city'] ?>"><br>

        <input type="hidden" name="team" value="<?= $team['id'] ?>">

        <button onclick="return addImageUploadTag()" id="addImageUpload">Afbeelding toevoegen</button><br/>

        <?php foreach ($images as $image) { ?>
            <img src="<?= $image ?>" style="max-width: 200px"><br/>
            <a href="?team=<?= $team['id'] . '&delete=' . basename($image) ?>">Verwijder</a>
            <br/><br/>
        <?php } ?>

        <div id="fileUploads"></div>

        <br/>
        <input type="submit" name="submit" value="Bewerken">
    </form>
    <a href="teams.php">Terug naar overzicht</a>

</body> 
</html>

