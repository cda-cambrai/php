<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
            // Ne pas oublier le session_start()
            session_start();

            if (!empty($_POST)) { // On vérifie que le formulaire est soumis
                $pseudo = $_POST['pseudo'];
                $password = $_POST['password'];

                // @todo Corriger cet exercice avec la partie inscription

                // Aide pour la slide 2
                $_SESSION['users'][] = ['pseudo' => $pseudo, 'password' => $password];

                // On vérifie que le login et le mot de passe soient corrects
                if ($pseudo === 'admin' && $password === 'admin') {
                    // On peut se connecter
                    $_SESSION['pseudo'] = $pseudo;
                    // Rediriger vers la page connecte.php
                    header('Location: connecte.php');
                } else {
                    // Erreur de mot de passe
                    echo 'Votre mot de passe n\'est pas correct...';
                }
            }
        ?>

        <form method="POST">
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo" class="form-control"> <br />

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control"> <br />

            <button class="btn btn-primary">Connexion</button>
        </form>
    </div>
</body>
</html>
