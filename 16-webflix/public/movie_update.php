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

// Vérifie que l'utilisateur a le droit d'accèder à la page
if (!isAdmin()) {
    // On affiche bien une 403 pour indiquer que la page est interdite d'accès
    display403();
}

// 2. Sur cette page, on va récupèrer l'id dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    // Si pas d'id dans l'url, on affiche une 404
    display404();
}

// On récupère le film concerné
$movie = getMovie($id);

// On renvoie une 404 si le film n'existe pas
if (!$movie) {
    display404();
}

// On initialise toutes les valeurs à ce qu'on récupère dans la BDD pour pouvoir les utiliser dans le formulaire
$title = $movie['title'];
$description = $movie['description'];
$cover = $movie['cover'];
$duration = $movie['duration'];
$released_at = $movie['released_at'];
$categorySelected = $movie['category_id'];

// Traitement du formulaire
if (!empty($_POST)) {
    $title = htmlspecialchars($_POST['title']); // On se protège des failles XSS
    $description = htmlspecialchars($_POST['description']);
    $cover = $_FILES['cover']; // Image uploadée
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

    // Ici, on peut faire l'upload...
    // On s'assure que le fichier fait moins de 10Mo...
    // On s'assure aussi que c'est bien une image...
    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
    $maxSize = 10 * 1024 * 1024;

    // S'il n'y a pas d'erreur, on fait l'upload...
    if ($cover['error'] === 0 && $cover['size'] < $maxSize && in_array($cover['type'], $allowedTypes)) {
        // On s'assure que le dossier existe...
        if (!is_dir('assets/uploads')) {
            mkdir('assets/uploads');
        }

        // On doit générer le nom de l'image
        $extension = pathinfo($cover['name'])['extension'];
        // Le super film => le-super-film.EXT
        $fileName = str_replace(' ', '-', strtolower($title)).'.'.$extension;

        // On doit déplacer le fichier temporaire dans le dossier
        move_uploaded_file($cover['tmp_name'], 'assets/uploads/'.$fileName);

    } else {
        // S'il y a une erreur avec le fichier...
        $errors['cover'] = 'Le fichier est trop lourd ou le format est incorrect...';
    }

    // On fait la requête s'il n'y a pas d'erreurs
    if (empty($errors)) {

        $query = $db->prepare(
            'INSERT INTO `movie` (`title`, `description`, `cover`, `duration`, `released_at`, `category_id`)
             VALUES (:title, :description, :cover, :duration, :released_at, :category)'
        );
        $query->bindValue(':title', $title);
        $query->bindValue(':description', $description);
        $query->bindValue(':cover', $fileName);
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
            <form method="POST" enctype="multipart/form-data">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" class="form-control" value="<?= $title; ?>"> <br />

                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"><?= $description; ?></textarea> <br />

                <label for="cover">Jaquette</label>
                <input type="file" name="cover" id="cover" class="form-control"> <br />

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
