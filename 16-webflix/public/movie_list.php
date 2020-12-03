<?php require '../partials/header.php';

/**
 * 1. Poser le dropdown comme sur la maquette (Bootstrap)
 * 2. Définir un lien comme movie_list.php?sort=released_at
 * 3. Récupérer le paramètre sort de l'URL ($_GET)
 * 4. Grâce à ce paramètre, modifier la requête SQL... (Croissant)
 */

// On va récupèrer le paramètre sort de l'URL qui va nous permettre de trier la liste de films
if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
} else {
    $sort = 'id';
}

// On va récupèrer la liste des films
$movies = getMovies($sort);
?>

<div class="container">
    <div class="dropdown my-4">
        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
            Trier par
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="movie_list.php?sort=title">Nom</a>
            <a class="dropdown-item" href="movie_list.php?sort=duration">Durée</a>
            <a class="dropdown-item" href="movie_list.php?sort=released_at">Date</a>
        </div>
    </div>

    <div class="row">
        <?php foreach ($movies as $movie) {
            require '../partials/card-movie.php';
        } ?>
    </div>
</div>

<?php require '../partials/footer.php';
