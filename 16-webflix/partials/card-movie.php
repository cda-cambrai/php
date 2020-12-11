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
            <p class="card-text">
                <?= truncate($movie['description']); ?>
            </p>
            <a href="movie_single.php?id=<?= $movie['id']; ?>" class="btn btn-danger btn-block">Voir le film</a>

            <?php if (isAdmin()) { ?>
                <a href="movie_update.php?id=<?= $movie['id']; ?>" class="btn btn-secondary btn-block">Modifier le film</a>
                <a href="movie_delete.php?id=<?= $movie['id']; ?>"
                   class="btn btn-secondary btn-block"
                   onclick="/*return confirm('Voulez-vous supprimer le film ?');*/"
                   data-toggle="modal" data-target="#deleteModal<?= $movie['id']; ?>"
                >
                    Supprimer le film
                </a>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal<?= $movie['id']; ?>" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Supprimer <?= $movie['title']; ?></h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Êtes-vous sûr de vouloir supprimer le film ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                <a class="btn btn-danger"
href="movie_delete.php?id=<?= $movie['id']; ?>&token=<?= $_SESSION['token']; ?>">
                                    Oui
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="card-footer text-muted">
            ★★★☆☆
        </div>
    </div>
</div>
