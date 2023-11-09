<?php
session_start();
$loggedInUser = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'inkoper' && $password === 'spekkoper') {
        $_SESSION['loggedInUser'] = $username; // Remember that "inkoper" is logged in
        $loggedInUser = $username;  // Set the logged-in user
    }
}


if (isset($_SESSION['loggedInUser']) && $_SESSION['loggedInUser'] === 'inkoper') {
    $loggedInUser = 'inkoper';
}


$discount = ($loggedInUser === 'inkoper') ? 0.50 : 0;

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<h1>Login</h1>

<?php
if ($loggedInUser === 'inkoper') {
    echo '<p>Welkom, ' . $loggedInUser . '!</p>';
} 
?>

<!-- Login Form -->
<form method="post">
    <label for="username">Gebruikersnaam:</label>
    <input type="text" name="username" id="username" required>
    <br>
    <label for="password">Wachtwoord:</label>
    <input type="password" name="password" id="password" required>
    <br>
    <input type="submit" value="Inloggen">
</form>

<p><a href="Cart.php">Bekijk winkelwagen</a></p>
</body>
</html>
