<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validations en PHP</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
            /*
                En tant que développeur, il est super important de valider les données, c'est à dire valider
                les données que va saisir l'utilisateur.
                On imagine un formulaire :
                    - Son email (doit être valide et obligatoire)
                    - L'âge de l'utilisateur (doit être majeur)
                    - Son code postal (doit faire 5 caractères et doit exister)
            */
            // Avoir des informations sur la version PHP
            // phpinfo();

            $email = null;
            $age = null;
            $zip = null;
            // On prévoit un tableau avec les erreurs potentielles
            $errors = [];

            if (!empty($_POST)) {
                $email = $_POST['email'];
                $age = $_POST['age'];
                $zip = $_POST['zip'];

                // On vérifie que l'email n'est pas vide et aussi qu'il est valide
                if (strlen($email) === 0) {
                    // array_push($errors, 'L\'email est vide'); // Permet d'ajouter un élément dans le tableau
                    $errors['email'] = 'L\'email est vide'; // Fais la même chose (on définis l'index dans les crochets)
                } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    $errors['email'] = 'L\'email est invalide';
                }

                // On entre dans le if si $age n'est pas un nombre
                if (!ctype_digit($age)) {
                    $errors['age'] = 'Votre âge n\'est pas un nombre';
                } else if ($age < 18) { // On vérifie que l'âge est supérieur ou égal à 18
                    $errors['age'] = 'Vous êtes trop jeune';
                }

                // On vérifie si le zip est invalide (entre 00000 et 99999)
                // Une des 3 conditions suffit a rendre le zip invalide
                if (strlen($zip) !== 5 || !is_numeric($zip) || $zip < 0) {
                    $errors['zip'] = 'Le code postal est invalide';
                }

                var_dump($errors);
                var_dump($email);

                // S'il n'y a pas d'erreurs, on peut faire le traitement (Envoyer un email, ajouter l'utilisateur dans la BDD)
                if (empty($errors)) {
                    echo '<span class="text-success">Vous êtes bien inscrit !</span>';
                }
            }
        ?>

        <form method="post">
            <label for="email">Email</label>
            <!-- value permet de définir à l'avance la valeur affichée dans le champs. Utile quand le formulaire a été soumis -->
            <input type="text" name="email" id="email" class="form-control" value="<?php echo $email; ?>">
            <?php if (isset($errors['email'])) {
                echo '<span class="text-danger">'.$errors['email'].'</span>';
            } ?>
            <br />

            <label for="age">Âge</label>
            <input type="text" name="age" id="age" class="form-control" value="<?php echo $age; ?>">
            <?php if (isset($errors['age'])) {
                echo '<span class="text-danger">'.$errors['age'].'</span>';
            } ?>
            <br />

            <label for="zip">Code postal</label>
            <input type="text" name="zip" id="zip" class="form-control" value="<?php echo $zip; ?>">
            <?php if (isset($errors['zip'])) {
                echo '<span class="text-danger">'.$errors['zip'].'</span>';
            } ?>
            <br />

            <button class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</body>
</html>
