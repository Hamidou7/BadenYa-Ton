<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login2.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1 class="my-5">Salut, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenue sur Badenya-Ton.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Réinitialiser votre mot de passe</a>
        <a href="logout2.php" class="btn btn-danger ml-3">Déconnectez-vous de votre compte</a>
        <a href="accueil.php" class="btn btn-success">Aller au Dasbord</a>
    </p>
</body>

</html>