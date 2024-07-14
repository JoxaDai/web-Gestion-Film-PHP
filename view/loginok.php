<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header('Location: connexion.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
</head>
<body>
    <h1>Bienvenue, <?php echo $username; ?>!</h1>
    <p>Vous êtes connecté au Back Office.</p>
    <a href="deconnexion.php">Se Déconnecter</a>
</body>
</html>
