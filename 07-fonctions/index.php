<?php

$toto = 'titi';

// Déclarer une fonction
function hello($name, $lang = 'fr') {
    //if ($lang === 'en') {
    //    return 'Hello '.$name;
    //}
    // On peut utiliser la variable $toto dans la fonction
    global $toto;
    echo $toto;

    $translations = [
        'en' => 'Hello',
        'fr' => 'Bonjour',
        'es' => 'Hola',
    ];

    return $translations[$lang].' '.$name;
}

echo hello('Fiorella'); // J'affiche le retour de la fonction
echo '<br />';
echo strtoupper(hello('Matthieu', 'en'));
echo '<br />';
echo hello('Jean', 'es');
