<?php

/**
 * Inscription de l'utilisateur
 * 
 * 1. On récupère 4 champs : email, username, password, cf-password
 * 2. On vérifie l'email (valide et unique dans la bdd), le pseudo (pas vide et unique) et le mot de passe.
 *    password doit être la même valeur que cf-password (minimum 8 caractères dont un chiffre)
 * 3. On ajoute l'utilisateur dans la BDD et on fait quelque chose pour le mot de passe...
 */

require '../partials/header.php';

// Traitement
$email = $username = $password = $cfPassword = null;

// Pour sécuriser les mots de passe, on va utiliser la fonction password_hash
// Cette fonction utilise soit l'algo bcrypt ou argon2...
$password = 'test';
$hash = password_hash($password, PASSWORD_DEFAULT);
echo 'Le hash '.$hash.' correspond au mot de passe '.$password;

if (!empty($_POST)) { // Si on soumet le formulaire
    $email = $_POST['email']; // <script>@gmail.com
    $username = htmlspecialchars($_POST['username']);
    $password = trim($_POST['password']); // Enlève les espaces au début et à la fin
    $cfPassword = trim($_POST['cf-password']);
    $errors = [];

    // On vérifie les erreurs
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'L\'email n\'est pas valide';
    }

    if (empty($username)) {
        $errors['username'] = 'Le pseudo est obligatoire';
    }

    // Vérifie que l'utilisateur n'existe pas déjà
    $query = $db->prepare('SELECT * FROM `user` WHERE `email` = :email OR `username` = :username');
    $query->bindValue(':email', $email);
    $query->bindValue(':username', $username);
    $query->execute();
    $user = $query->fetch(); // Renvoie 1 tableau si le user existe ou false s'il n'existe pas
    if ($user) {
        $errors['user'] = 'Email ou pseudo déjà pris';
    }

    // Vérification du mot de passe
    if (strlen($password) < 8) {
        $errors['password_1'] = 'Votre mot de passe est trop court';
    }

    // Les Regex permettent de valider un "format" de chaine
    // (\+33 [1-9]|0[1-9])([.\- ]?[0-9]{2}){4} valide un téléphone :
    // 0612345678
    // 06.12.34.56.78
    // 06-12-34-56-78
    // 09 12 34 56 78
    // +33 6 12 34 58 64
    // 06 12 45 65 74
    // +33 7 45 74 14 45
    preg_match('/(\+33 [1-9]|0[1-9])([.\- ]?[0-9]{2}){4}/', '06-12-34-56-78'); // Renvoie true
    preg_match('/(\+33 [1-9]|0[1-9])([.\- ]?[0-9]{2}){4}/', '012-34-56-78'); // Renvoie false

    // [0-9]+ -> Vérifie qu'une chaine contient un nombre au moins une fois
    // [^a-zA-Z0-9]+ -> Vérifie qu'une chaine contient un caractère spécial au moins une fois

    // La regex doit être entouré du délimiteur /
    preg_match('/[0-9]+/', 'azerty'); // Renvoie false car azerty ne contient pas de chiffres
    preg_match('/[0-9]+/', 'azerty1'); // Renvoie true

    if (!preg_match('/[0-9]+/', $password)) {
        $errors['password_2'] = 'Le mot de passe doit contenir au moins un chiffre';
    }

    // On peut aussi utiliser /[[:punct:]]+/ dans la regex
    if (!preg_match('/[^a-zA-Z0-9]+/', $password)) {
        $errors['password_3'] = 'Le mot de passe doit contenir au moins un caractère spécial';
    }

    // On vérifie que les 2 mots de passe saisis correspondent
    if ($password !== $cfPassword) {
        $errors['password_4'] = 'Les mots de passe ne correspondent pas';
    }

    // On peut faire la requête SQL
    if (empty($errors)) {
        // On ajoute l'utilisateur dans la BDD
        $query = $db->prepare(
            'INSERT INTO `user` (`email`, `username`, `password`)
             VALUES (:email, :username, :password)'
        );
        $query->bindValue(':email', $email);
        $query->bindValue(':username', $username);
        $query->bindValue(':password', password_hash($password, PASSWORD_DEFAULT)); // On stocke le hash dans la BDD
        $query->execute();

        // On redirige et on cache le formulaire ?
        header('Location: register.php?status=success');
    } else {

        // Afficher les erreurs...
        echo '<div class="container alert alert-danger">';
        foreach ($errors as $error) {
            echo '<p class="text-danger m-0">'.$error.'</p>';
        }
        echo '</div>';

    }
} // Fin du traitement du formulaire

if (isset($_GET['status']) && $_GET['status'] === 'success') {
    echo '<div class="container alert alert-success">
        Vous êtes bien inscrit.
    </div>';
} else { ?>

    <div class="container my-4">
        <h1 class="text-center">Inscription</h1>

        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <form method="POST">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= $email; ?>"> <br />

                    <label for="username">Pseudo</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?= $username; ?>"> <br />

                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control"> <br />

                    <label for="cf-password">Confirmer le mot de passe</label>
                    <input type="password" name="cf-password" id="cf-password" class="form-control"> <br />

                    <button class="btn btn-danger btn-block">S'inscrire</button>
                </form>
            </div>
        </div>
    </div>

<?php }

require '../partials/footer.php';
