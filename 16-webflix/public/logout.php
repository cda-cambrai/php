<?php

// Cette page permet de se déconnecter

session_start();
// session_destroy(); // Détruit toute la session
unset($_SESSION['user']); // On déconnecte l'utilisateur

header('Location: index.php');
