<?php

/**
 * Formulaire d'ajout de film
 * 
 * Ici, on va créer un formulaire permettant d'ajouter un film.
 * Le champ title devra faire 2 caractères minimum.
 * Le champ description devra faire 15 caractères minimum.
 * On pourra uploader une jaquette. Le nom du fichier uploadé doit être le nom du film "transformé", "Le Parrain" -> "le-parrain.jpg"
 * Le champ durée devra être un nombre entre 1 et 999.
 * Le champ released_at devra être une date valide.
 * Le champ category devra être un select généré dynamiquement avec les catégories de la BDD
 * On doit afficher les messages d'erreurs et s'il n'y a pas d'erreurs on ajoute le film et on redirige sur la page movie_list.php
 * BONUS : Il faudrait afficher un message de succès après la redirection. Il faudra utiliser soit la session, soit un paramètre dans l'URL
 */

require '../partials/header.php';

// On initialise toutes les valeurs à null pour pouvoir les utiliser dans le formulaire
$title = $description = $cover = $duration = $released_at = $categorySelected = null;

// Traitement du formulaire
if (!empty($_POST)) {
    $title = htmlspecialchars($_POST['title']); // On se protège des failles XSS
    $description = htmlspecialchars($_POST['description']);
    $cover = $_POST['cover'];
    $duration = $_POST['duration'];
    $released_at = $_POST['released_at'];
    $categorySelected = $_POST['category'];
    $errors = [];

    if (strlen($title) < 2) {
        $errors['title'] = 'Le titre est trop court';
    }

    if (strlen($description) < 15) {
        $errors['description'] = 'La description est trop courte';
    }

    if ($duration < 1 || $duration > 999) {
        $errors['duration'] = 'La durée n\'est pas valide';
    }

    // Vérification de la date (année bisextile etc...)
    // 2020-12-08
    $released_at = empty($released_at) ? '0000-00-00' : $released_at;
    $date = explode('-', $released_at); // ['2020', '12', '08'];

    if (!checkdate($date[1], $date[2], $date[0])) {
        $errors['released_at'] = 'La date n\'est pas valide';
    }

    // On fait la requête s'il n'y a pas d'erreurs
    if (empty($errors)) {

        $query = $db->prepare(
            'INSERT INTO `movie` (`title`, `description`, `cover`, `duration`, `released_at`, `category_id`)
             VALUES (:title, :description, :cover, :duration, :released_at, :category)'
        );
        $query->bindValue(':title', $title);
        $query->bindValue(':description', $description);
        $query->bindValue(':cover', $cover);
        $query->bindValue(':duration', $duration, PDO::PARAM_INT);
        $query->bindValue(':released_at', $released_at);
        $query->bindValue(':category', $categorySelected, PDO::PARAM_INT);
        $query->execute();

        // Si tout va bien, je redirige et je prévois un message de succès...
        header('Location: movie_single.php?id='.$db->lastInsertId().'&status=success');
        // lastInsertId() permet de récupèrer le dernier identifiant de la BDD donc
        // celui du nouveau film
        // header('Location: movie_list.php'); // On redirige vers la liste une fois que le film est ajouté

    } else {
        
        // Afficher les erreurs...
        echo '<div class="container alert alert-danger">';
        foreach ($errors as $error) {
            echo '<p class="text-danger m-0">'.$error.'</p>';
        }
        echo '</div>';

    }
}

?>

<div class="container my-4">
    <h1 class="text-center">Ajouter un film</h1>

    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <form method="POST">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" class="form-control" value="<?= $title; ?>"> <br />

                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"><?= $description; ?></textarea> <br />

                <label for="cover">Jaquette</label>
                <input type="text" name="cover" id="cover" class="form-control"> <br />

                <label for="duration">Durée</label>
                <input type="text" name="duration" id="duration" class="form-control" value="<?= $duration; ?>"> <br />

                <label for="released_at">Sortie</label>
                <input type="date" name="released_at" id="released_at" class="form-control" value="<?= $released_at; ?>"> <br />

                <label for="category">Catégorie</label>
                <select name="category" id="category" class="form-control">
                    <?php foreach (getCategories() as $category) { ?>
                        <option <?php if ($category['id'] === $categorySelected) { echo 'selected'; } ?>
                            value="<?= $category['id']; ?>">

                            <?= $category['name']; ?>
                        </option>
                    <?php } ?>
                </select> <br />

                <button class="btn btn-danger btn-block">Ajouter</button>
            </form>
        </div>
    </div>
</div>

<?php require '../partials/footer.php';
