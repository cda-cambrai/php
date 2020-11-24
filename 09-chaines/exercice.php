<?php

/**
 * Acronyme : Créer une fonction qui prend en argument une chaine (World of Warcraft)
 * et qui retourne les initiales de chaque mot en majuscule (WOW).
 */

function acronym($sentence) {
    // World of Warcraft ===> WOW
    // Transformer la phrase en tableau de mots ?
    $words = explode(' ', $sentence);

    $acronym = '';
    // Parcourir le tableau
    foreach ($words as $word) {
        // Pour chaque mot du tableau, on récupère la première lettre
        $acronym .= substr($word, 0, 1); // On incrémente la chaine $acronym avec chaque lettre
    }

    return strtoupper($acronym);
}

echo acronym('World of Warcraft') . '<br />'; // WOW
echo acronym('PHP: Hypertext Preprocessor') . '<br />'; // PHP
echo acronym('Cascade Style Sheet') . '<br />'; // CSS

/**
 * Conjugaison : Créer une fonction qui permet
 * de conjuguer un verbe (chercher par exemple).
 * Cela doit renvoyer toutes les conjugaisons au présent.
 */

function conjugate($verb) {
    // Je récupère le radical et la terminaison
    $radical = substr($verb, 0, -2); // cherch
    // $group = 'er';

    // Préparer un tableau avec les pronoms et les terminaisons
    $subjects = [
        'Je' => 'e',
        'Tu' => 'es',
        'Il / Elle / On' => 'e',
        'Nous' => 'ons',
        'Vous' => 'ez',
        'Ils' => 'ent'
    ];

    // Est-ce que le radical se termine par un g ?
    if (substr($radical, -1) === 'g') {
        // Modifier la valeur d'un tableau
        $subjects['Nous'] = 'eons'; // On REMPLACE ons dans le tableau car la clé existe déjà
    }

    // Exception du j'
    $voyelles = ['a', 'e', 'h', 'i', 'o', 'u', 'y']; // Toute les voyelles
    $firstLetter = substr($radical, 0, 1); // Je récupére la première lettre du radical
    if (in_array($firstLetter, $voyelles)) { // Si la première lettre est une voyelle
        unset($subjects['Je']); // Je supprime l'index Je
        // $subjects['J\''] = 'e'; // J'ajoute une valeur e dans le tableau (à la fin) avec l'index J'
        // On peut fusionner 2 tableaux en PHP (C'est comme une concaténation)
        $subjects = array_merge(['J\'' => 'e'], $subjects); // On ajoute le J' au début du tableau
    }

    $result = '';
    foreach ($subjects as $index => $value) {
        $result .= $index . ' ' . $radical . $value . '<br />';
    }

    return $result;
}

$tableau = ['A', 'B', 'C'];
// On peut fusionner 2 tableaux en PHP
$tableau = array_merge(['A'], ['B', 'C']); // Renvoie ['A', 'B', 'C']

// développer
echo conjugate('chercher') . '<br />';
echo conjugate('ajouter') . '<br />';
echo conjugate('manger') . '<br />';

/*
Je cherche
Tu cherches
Il cherche
Nous cherchons
Vous cherchez
Ils cherchent
*/

// Attention aux exceptions => ajouter, manger

// @todo Corriger l'exo des statistiques

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conjugaison et acronyme</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
            // Vérification et traitement du formulaire
            if (!empty($_POST['acronym'])) {
                echo '<h3>Génération acronyme</h3>';
                // Avec la fonction précédente, on doit juste passer la valeur dans $_POST
                echo acronym($_POST['acronym']);
            }
            
            // S'il a saisi un verbe dans le 2ème champ, on conjugue la valeur
            if (!empty($_POST['verb'])) {
                echo '<h3>Génération verbe</h3>';
                // Idem, on utilise la fonction qui a été créee juste au dessus
                echo conjugate($_POST['verb']);
            }
        ?>

        <form method="POST">
            <label for="acronym">Acronyme</label>
            <input type="text" name="acronym" id="acronym" class="form-control"> <br />

            <label for="verb">Verbe</label>
            <input type="text" name="verb" id="verb" class="form-control"> <br />

            <!-- On aurait pu aussi ajouter un select ou un radio pour choisir acronyme ou conjugaison -->

            <button class="btn btn-primary">Exécuter</button>
        </form>
    </div>
</body>
</html>
