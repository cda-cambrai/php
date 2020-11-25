<?php
// La variable est disponible dans tous les include...
$title = 'Accueil';
// Ici, j'inclus le contenu de header.php dans ma page
include 'partials/header.php'; ?>

<div class="container">
    <h1>Le titre de ma page</h1>
</div>

<?php require 'partials/footer.php'; ?>
