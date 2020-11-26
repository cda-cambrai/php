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
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-control"> <br /> <br />

            <div class="custom-file">
                <input type="file" name="cv" class="custom-file-input">
                <label class="custom-file-label">Choisir votre CV</label>
            </div> <br /> <br />

            <div class="custom-file">
                <input type="file" name="image" class="custom-file-input">
                <label class="custom-file-label">Choisir votre Image</label>
            </div> <br /> <br />

            <button class="btn btn-primary">Uploader</button>
        </form>

        <?php
            var_dump($_FILES);

            // Vérifier que le formulaire d'upload a été soumis
            if (!empty($_FILES['cv'])) {

                // Si l'utilisateur n'a pas saisi de prénom, on lui indique ce qu'il doit faire
                // Le trim permet d'enlever les espaces en début et en fin de chaine
                $prenom = trim($_POST['prenom']);
                if (empty($prenom)) {
                    echo 'Veuillez saisir un prénom...';
                }

                // Vérifier que le fichier est un PDF et qu'il ne fait pas plus de 5Mo
                // On vérifie également si une erreur est présente
                if ($_FILES['cv']['type'] === 'application/pdf' && $_FILES['cv']['size'] < 5 * 1024 * 1024 && $_FILES['cv']['error'] === 0 && !empty($prenom)) {

                    // On récupére les infos du fichiers
                    $cheminTemporaireDuFichier = $_FILES['cv']['tmp_name'];

                    // Je récupère l'extension du fichier
                    $extension = pathinfo($_FILES['cv']['name'])['extension'];
                    // Je dois récupérer le prénom saisi
                    // Le nom du fichier va être matthieu-123456.pdf
                    $nomDuFichier = $_POST['prenom'] . '-' . uniqid() . '.' . $extension;
                    // $nomDuFichier = $_FILES['cv']['name'];

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

            // Vérifier qu'une image a été uploadé
            if (!empty($_FILES['image'])) {

                // On vérifie qu'il n'y a pas d'erreurs
                if ($_FILES['image']['error'] === 0) {

                    // On crée le dossier images s'il n'existe pas
                    if (!is_dir('images')) {
                        mkdir('images');
                    }

                    // On récupére les infos du fichiers
                    $cheminTemporaireDuFichier = $_FILES['image']['tmp_name'];
                    $nomDuFichier = $_FILES['image']['name'];

                    // On upload l'image dans le dossier images
                    move_uploaded_file($cheminTemporaireDuFichier, 'images/'.$nomDuFichier);

                    // Resizer l'image ????
                    // Créer une "resource" à partir du fichier
                    $imageOriginale = imagecreatefromjpeg('images/'.$nomDuFichier);
                    $nouvelleImage = imagecreatetruecolor(300, 300); // Créer une image avec fond noir

                    $width = imagesx($imageOriginale); // Largeur de l'image source
                    $height = imagesy($imageOriginale); // Hauteur de l'image source

                    // Permet de redimensionner l'image dans un nouveau fichier
                    imagecopyresized($nouvelleImage, $imageOriginale, 0, 0, 0, 0, 300, 300, $width, $height);

                    // Enregistrer l'image dans le fichier
                    imagejpeg($nouvelleImage, 'images/sortie.jpg');

                }

            }
        ?>
    </div>
</body>
</html>
