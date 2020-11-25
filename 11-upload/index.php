<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'upload</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="image">

            <button class="btn btn-primary">Uploader</button>
        </form>

        <?php
            var_dump($_FILES);

            // Le md5 génére un "hash" d'une chaine ou une signature
            // Un md5 ressemble à : 1fa4d7451a47d4f112d541dd41
            // echo md5(uniqid());

            // On vérifie si l'utilisateur est en train d'envoyer un fichier via le formulaire
            if (!empty($_FILES['image'])) {
                // Récupèrer l'emplacement temporaire du fichier
                // La première clé image est le name du input
                $file = $_FILES['image']['tmp_name']; // Le fichier sera C:\xampp\tmp\blabla.tmp ou /tmp/blabla.tmp
                // On va créer un dossier directement en PHP
                if (!is_dir('images')) { // On vérifie si le dossier images existe
                    mkdir('images'); // On crée le dossier images s'il n'existe pas
                }

                // On ne fait l'upload que si il n'y a eu aucune erreur lors de l'envoi du fichier au serveur
                if ($_FILES['image']['error'] === 0) {
                    // Récupèrer le nom du fichier uploadé
                    // chaton.jpg -> a3d45fe4_chaton.jpg
                    // chaton.jpg -> b3f4haez_chaton.jpg
                    $fileName = uniqid() . '_' . $_FILES['image']['name'];

                    // chaton.jpg -> chaton_b3f4haez.jpg
                    // Renvoie un tableau avec le nom du fichier et son extension
                    $info = pathinfo($_FILES['image']['name']);
                    // 'chaton_' . md5(???) . '.jpg';
                    $fileName = $info['filename'] . '_' . uniqid() . '.' . $info['extension'];

                    // Déplacer le fichier uploadé dans un dossier
                    move_uploaded_file($file, 'images/' . $fileName);
                } else {
                    // Le else est dans le cas où l'upload n'est pas correct (fichier non présent...)
                    echo 'Veuillez envoyer un fichier...';
                }
            }

        ?>
    </div>
</body>
