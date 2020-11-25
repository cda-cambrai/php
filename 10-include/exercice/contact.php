<?php

require 'partials/header.php'; ?>

<main role="main" class="flex-shrink-0">
    <div class="container">
    <?php
        // On définit une variable pour chaque champs afin de les retrouver facilement
        $email = null;
        $subject = null;
        $message = null;
        $errors = [];

        // On vérifie si le formulaire a été soumis
        if (!empty($_POST)) {
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            // Vérifier l'email
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $errors['email'] = 'Email vide ou non valide';
            }

            // Vérifier le sujet
            if (empty($subject)) {
                $errors['subject'] = 'Le sujet est vide';
            }

            // BONUS: Vérifier le sujet (par rapport à un tableau)
            $validSubjects = ['Proposition de stage', 'Proposition d\'emploi', 'Demande de projet'];
            // En gros, on veut vérifier que le sujet saisi est dans le tableau
            if (!in_array($subject, $validSubjects)) {
                $errors['subject'] = 'Le sujet n\'est pas valide';
            }

            // Vérifier le message (15 caractères)
            if (strlen($message) < 15) {
                $errors['message'] = 'Le message est vide ou trop court';
            }
            var_dump($errors);

            // Si le tableau d'erreurs est vide, on affiche un messag de succès
            if (empty($errors)) {
                echo '<span class="text-success">Message envoyé</span>';
            }
        }
    ?>

        <form method="post">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="<?php echo $email; ?>">
            <?php if (isset($errors['email'])) {
                echo '<span class="text-danger">'.$errors['email'].'</span>';
            } ?>
            <br />

            <label for="subject">Sujet</label>
            <input type="text" name="subject" id="subject" class="form-control" value="<?php echo $subject; ?>">
            <?php if (isset($errors['subject'])) {
                echo '<span class="text-danger">'.$errors['subject'].'</span>';
            } ?>
            <br />

            <label for="message">Message</label>
            <textarea type="text" name="message" id="message" class="form-control"><?php echo $message; ?></textarea>
            <?php if (isset($errors['message'])) {
                echo '<span class="text-danger">'.$errors['message'].'</span>';
            } ?>
            <br />

            <div class="text-right">
                <button class="btn btn-primary">Envoyer</button>
            </div>
        </form>
    </div>
</main>

<?php require 'partials/footer.php';
