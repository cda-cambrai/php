<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon super site</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
    // Ici, j'inclus le contenu de header.php dans ma page
    include 'partials/header.php'; ?>

    <div class="container">
        <h1>Le titre de ma page</h1>
    </div>

    <?php require 'partials/footer.php'; ?>
</body>
</html>
