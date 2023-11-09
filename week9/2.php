<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evaluatie</title>
</head>
<body>
<form action="controleer.php" method="post">
    <label for="rcijfer">Rapportcijfer:</label>
    <input type="text" id="rcijfer" name="rcijfer"><br><br>
    <label for="ltijd">Leeftijd:</label>
    <input type="text" id="ltijd" name="ltijd"><br><br>

    <legend>Algemene indruk:</legend>

    <div>
        <input type="radio" id="super" name="indruk" value="super" checked />
        <label for="super">Super</label>
    </div>
    <div>
        <input type="radio" id="goed" name="indruk" value="goed" />
        <label for="goed">Goed</label>
    </div>
    <div>
        <input type="radio" id="matig" name="indruk" value="matig" />
        <label for="matig">Matig</label>
    </div>
    <div>
        <input type="radio" id="slecht" name="indruk" value="slecht" />
        <label for="slecht">Slecht</label>
    </div>

    <input type="submit" value="Submit">
</form>
</body>
</html>
