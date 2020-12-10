<?php

require '../partials/header.php';

$email = $password = null;

if (!empty($_POST)) { // Traitement du login
    $email = $_POST['email']; // Peut aussi être le pseudo
    $password = trim($_POST['password']);
    $errors = [];

    // On va vérifier si l'utilisateur existe dans la base...
    $query = $db->prepare('SELECT * FROM `user` WHERE `email` = :email OR `username` = :email');
    $query->bindValue(':email', $email);
    $query->execute();
    // On récupère l'utilisateur qui se connecte
    $user = $query->fetch(); // Tableau contenant les infos de l'utilisateur en BDD

    if ($user) { // Le fetch renvoie false s'il n'y a pas d'user
        // On doit vérifier la validité du mot de passe entre la saisie et le hash de la BDD
        if (password_verify($password, $user['password'])) {

            // Pour garder l'utilisateur connecté, on va le mettre dans la session
            unset($user['password']); // On ne stocke pas le hash dans la session
            $_SESSION['user'] = $user;

            header('Location: index.php?status=success');

        } else {
            $errors[] = 'Email ou mot de passe incorrect';
        }
    } else {
        $errors[] = 'Email ou mot de passe incorrect';
    }

    // Afficher les erreurs...
    if (!empty($errors)) {
        echo '<div class="container alert alert-danger">';
        foreach ($errors as $error) {
            echo '<p class="text-danger m-0">'.$error.'</p>';
        }
        echo '</div>';
    }
}

?>

<div class="container">
    <h1 class="text-center">Connexion</h1>

    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <form method="POST">
                <div class="form-group">
                    <label for="email">Email ou pseudo</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?= $email; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <button class="btn btn-danger btn-block">Se connecter</button>
            </form>
        </div>
    </div>
</div>


<?php require '../partials/footer.php';
