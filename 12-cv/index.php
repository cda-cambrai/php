<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de candidature</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Votre CV</h1>

        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="cv"> <br /> <br />

            <button class="btn btn-primary">Uploader</button>
        </form>

        <?php
            var_dump($_FILES);

            // Vérifier que le formulaire d'upload a été soumis
            if (!empty($_FILES['cv'])) {

                // Vérifier que le fichier est un PDF et qu'il ne fait pas plus de 5Mo
                // On vérifie également si une erreur est présente
                if ($_FILES['cv']['type'] === 'application/pdf' && $_FILES['cv']['size'] < 5 * 1024 * 1024 && $_FILES['cv']['error'] === 0) {

                    // On récupére les infos du fichiers
                    $cheminTemporaireDuFichier = $_FILES['cv']['tmp_name'];
                    $nomDuFichier = $_FILES['cv']['name'];

                    // On crée le dossier cv s'il n'existe pas
                    if (!is_dir('cv')) {
                        mkdir('cv');
                    }

                    // On upload le CV dans le dossier cv
                    move_uploaded_file($cheminTemporaireDuFichier, 'cv/'.$nomDuFichier);

                } else {
                    echo 'Le fichier est trop lourd ou n\'est pas un PDF valide';
                }

            }
        ?>
    </div>
</body>
</html>
