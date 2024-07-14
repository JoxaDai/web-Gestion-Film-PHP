<?php
session_start();

// Récupérer les informations du formulaire
$login = $_POST['login'];
$password = $_POST['password'];

// Simuler une vérification (pour l'utilisateur test)
if ($login === 'admin' && $password === 'password') {
    // Utilisateur connecté avec succès
    $_SESSION['username'] = $login;
    header('Location: loginok.php');
} else {
    // Identifiant ou mot de passe incorrect
    header('Location: connexion.php?erreur=1');
}
?>
