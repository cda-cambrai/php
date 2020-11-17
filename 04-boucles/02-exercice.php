<?php

/*
1. Créer une boucle qui affiche 10 étoiles (*)
2. Imbriquer la boucle dans une autre boucle afin d'afficher 10 lignes de 10 étoiles
3. Nous obtenons un carré. Trouver un moyen de modifier le code pour obtenir un triangle rectangle.
*/

echo '<h2>Créer une boucle qui affiche 10 étoiles (*)</h2>';

$star = '🌟';
for ($i = 0; $i < 10; $i++) {
    echo $star;
}

echo '<h2>Imbriquer la boucle dans une autre boucle afin d\'afficher 10 lignes de 10 étoiles</h2>';

// On a une boucle imbriquée dans une autre boucle
for ($j = 0; $j < 10; $j++) {
    for ($i = 0; $i < 10; $i++) {
        echo $star;
    }

    // Le retour à la ligne est dans la 1ère boucle !
    echo '<br />';
}

echo '<h2>Nous obtenons un carré. Trouver un moyen de modifier le code pour obtenir un triangle rectangle.</h2>';

for ($j = 0; $j < 10; $j++) {
    for ($i = 0; $i < $j + 1; $i++) {
        echo $star;
    }

    echo '<br />';
}
