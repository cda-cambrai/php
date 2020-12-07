<div class="col-12 col-md-6 col-lg-4 col-xl-3">
    <div class="card shadow mb-4">
        <img src="assets/uploads/<?= $movie['cover']; ?>" class="card-img-top" alt="<?= $movie['title']; ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $movie['title']; ?></h5>
            <!-- Pour l'année, on a la solution en PHP -->
            <p>Sorti en <?= substr($movie['released_at'], 0, 4); ?></p>
            <!-- On a aussi la solution en SQL (La clé du tableau est l'alias) -->
            <!-- Attention entre commentaire HTML et commentaire PHP -->
            <!-- Le commentaire HTML se voit dans le code source, pas le PHP -->
            <!-- <p>Sorti en <?= $movie['year']; ?></p> -->
            <p class="card-text"><?= $movie['description']; ?></p>
            <a href="movie_single.php?id=<?= $movie['id']; ?>" class="btn btn-danger btn-block">Voir le film</a>
        </div>
        <div class="card-footer text-muted">
            ★★★☆☆
        </div>
    </div>
</div>
