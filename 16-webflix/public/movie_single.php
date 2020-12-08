<?php

/**
 * Récupèrer les informations du film
 * 1. Sur chaque lien "Voir le film", on doit ajouter un lien vers
 *    movie_single.php?id=5
 * 2. Sur cette page, on va récupèrer l'id dans l'URL
 * 3. On doit vérifier si l'id est présent ou non (404)
 * 4. On doit récupèrer le film dans la BDD avec l'id
 *    (404 s'il n'existe pas)
 * 5. On affiche les informations du film
 *    (Jaquette + titre, durée, date, description)
 * Entre 45min et 1h
 * 6. On va aussi afficher le nom de la catégorie du film
 */

require '../partials/header.php';

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

?>

<div class="container my-4">
    <div class="row">
        <div class="col-lg-6">
            <img class="img-fluid" src="assets/uploads/<?= $movie['cover']; ?>" alt="<?= $movie['title']; ?>">
        </div>
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <h1><?= $movie['title']; ?></h1>
                    <p>Durée: <?= convertToHours($movie['duration']); ?></p>
                    <p>Sorti le <?= formatDate($movie['released_at']); ?></p>

                    <div>
                        <?= $movie['description']; ?>
                    </div>
                </div> <!-- Fin .card-body -->
                <div class="card-footer text-muted">
                    ★★★☆☆
                </div>
            </div>

            <!-- Bloc commentaires -->
            <div class="card shadow mt-5">
                <div class="card-body">
                    <?php
                        // Récupèrer les commentaires
                        $comments = getCommentsByMovie($movie['id']);

                        foreach ($comments as $comment) {
                            // var_dump($comment);
                    ?>

                        <div class="mb-3">
                            <p class="mb-0">
                                <strong><?= $comment['nickname']; ?></strong>
                                <span class="small-text">
                                    le <?= formatDate($comment['created_at'], 'd/m/Y à H\hi'); ?>
                                </span>
                            </p>
                            <p>
                                <?= $comment['message']; ?>
                                <?= $comment['note']; ?>/5
                            </p>
                        </div>
                        <hr />

                    <?php } ?>

                    <?php
                        // Traitement du formulaire
                        if (!empty($_POST)) {
                            $nickname = htmlspecialchars($_POST['nickname']); // Transforme <script> en &gt;script&lt
                            $message = strip_tags($_POST['message']); // Supprime <script> de la chaine
                            $note = $_POST['note'];
                            $errors = [];

                            // On vérifie la validité des champs...
                            if (empty($nickname)) {
                                $errors['nickname'] = 'Le pseudo est vide';
                            }

                            // Le message doit faire 15 caractères minimum
                            if (strlen($message) < 15) {
                                $errors['message'] = 'Le message est trop court';
                            }

                            // La note doit être entre 0 et 5
                            if ($note < 0 || $note > 5) {
                                $errors['note'] = 'La note n\'est pas correcte';
                            }

                            // On fait la requête s'il n'y a pas d'erreurs
                            if (empty($errors)) {

                                // Requête SQL...
                                $query = $db->prepare(
                                    'INSERT INTO `comment` (`nickname`, `message`, `note`, `created_at`, `movie_id`)
                                     VALUES (:nickname, :message, :note, NOW(), :movie_id)'
                                );
                                // On lie les paramètres à la requête préparée
                                $query->bindValue(':nickname', $nickname);
                                $query->bindValue(':message', $message);
                                $query->bindValue(':note', $note, PDO::PARAM_INT);
                                $query->bindValue(':movie_id', $movie['id'], PDO::PARAM_INT);

                                $query->execute(); // On exécute la requête et c'est tout...

                                // On redirige pour éviter que l'utilisateur ne renvoie le formulaire
                                // header('Location: movie_single.php?id='.$movie['id']);
                                echo '<meta http-equiv="refresh" content="0;URL=\'movie_single.php?id='.$movie['id'].'\'">';

                            } else {

                                // Afficher les erreurs...
                                echo '<div class="container alert alert-danger">';
                                foreach ($errors as $error) {
                                    echo '<p class="text-danger m-0">'.$error.'</p>';
                                }
                                echo '</div>';

                            }
                        } // Fin du premier if
                    ?>

                    <form method="POST">
                        <label for="nickname">Pseudo</label>
                        <input type="text" name="nickname" id="nickname" class="form-control"> <br />

                        <label for="message">Message</label>
                        <textarea name="message" id="message" class="form-control" rows="3"></textarea> <br />

                        <label for="note">Note</label>
                        <select name="note" id="note" class="form-control">
                            <?php for ($i = 0; $i <= 5; $i++) { ?>
                                <option value="<?= $i; ?>"><?= $i; ?>/5</option>
                            <?php } ?>
                        </select> <br />

                        <button class="btn btn-danger btn-block">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require '../partials/footer.php';
