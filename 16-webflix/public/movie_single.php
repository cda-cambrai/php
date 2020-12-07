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



require '../partials/footer.php';
