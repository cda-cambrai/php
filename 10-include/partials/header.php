<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - Mon super site</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <header class="container">
        Le header et le menu
    </header>

    <?php
    echo __DIR__; // Renvoie le repertoire du script actuel

    // PHP est capable de chercher le fichier "menu.php" dans le dossier
    // de index.php et aussi dans le dossier partials
    // _once permet d'être sûr d'inclure le fichier UNE seule fois
    include_once __DIR__.'/menu.php';
    include_once 'partials/menu.php';

    // Cette fonction permet de lister tous les fichiers qui sont "include"
    // dans le script
    var_dump(get_included_files());
    ?>
