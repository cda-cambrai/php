<?php

// Attention de bien faire le démarrage des sessions
session_start();

// Si on est connecté, on peut afficher le
// message de bienvenue
// <?= équivaut à <?php echo
if (isset($_SESSION['pseudo'])) { ?>

    <h1>Bienvenue <?= $_SESSION['pseudo']; ?></h1>
    <a href="admin.php?logout=1">Déconnexion</a>

<?php }

// On vérifie si l'utilisateur veut se déconnecter
if (isset($_GET['logout'])) {
    // On va supprimer le pseudo de la session
    unset($_SESSION['pseudo']);
    // Détruit tout le fichier de session (!!! Pas conseillé !!!)
    // session_destroy();
    // On redirige vers le formulaire de connexion
    header('Location: index.php');
}
