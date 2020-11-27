<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connecté</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php

            session_start(); // Attention à la session

            if (isset($_GET['logout'])) {
                unset($_SESSION['pseudo']); // Je supprime le user de la session
            }

            if (isset($_SESSION['pseudo'])) { ?>

                Salut <?= $_SESSION['pseudo']; ?>
                <a href="connecte.php?logout=1" class="btn btn-danger">Déconnexion</a>

            <?php } else {
                echo 'Vous devez vous connecter';
                header('Location: index.php');
            }

        ?>
    </div>
</body>
</html>
