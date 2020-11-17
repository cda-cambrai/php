<?php

// Afficher la table de multiplication du chiffre 5
echo '<h2>Afficher la table de multiplication du chiffre 5</h2>';

for ($i = 1; $i <= 10; $i++) {
    echo '5 x '.$i.' = '.(5 * $i).' <br />';
}

// Afficher l'ensemble des tables de multiplications de 1 à 10
echo '<h2>Afficher l\'ensemble des tables de multiplications de 1 à 10</h2>';

for ($table = 1; $table <= 10; $table++) {
    echo '<h2>Table de '.$table.'</h2>';

    for ($multiple = 1; $multiple <= 10; $multiple++) {
        echo $table.' x '.$multiple.' = '.($table * $multiple).' <br />';
    }
}

// Reproduire une table de multiplication en HTML
echo '<h2>Reproduire une table de multiplication en HTML</h2>';

echo '<table border="0px" cellspacing="0"><tbody>';
    // Ici, on a une première boucle pour afficher la légende du haut
    echo '<tr>';
    echo '<td class="gris-clair border-bottom border-right">x</td>';
    for ($i = 0; $i <= 10; $i++) {
        if ($i % 2 !== 0) { // Pour la première ligne, on met le fond gris clair pour un chiffre impair
            echo '<td class="gris-clair border-bottom"><strong>'.$i.'</strong></td>';
        } else {
            echo '<td class="border-bottom"><strong>'.$i.'</strong></td>';
        }
    }
    echo '</tr>';

    // Ici, on affiche les résultats des tables de multiplications
    for ($table = 0; $table <= 10; $table++) {
        echo '<tr>';

            if ($table % 2 !== 0) { // Pour la première colonne, on met le fond gris clair pour un chiffre impair
                echo '<td class="gris-clair border-right"><strong>'.$table.'</strong></td>';
            } else {
                echo '<td class="border-right"><strong>'.$table.'</strong></td>';
            }

            for ($multiple = 0; $multiple <= 10; $multiple++) {
                // Ici, on va vérifier si on doit mettre le td en fond gris foncé (Nombre carré)
                if ($table === $multiple) {
                    echo '<td class="gris-fonce">'.$table * $multiple.'</td>';
                } else if ($multiple % 2 === 0 && $table % 2 === 0) { // Si le multiple est pair et la table paire, on ajoute un gris clair
                    echo '<td class="gris-clair">'.$table * $multiple.'</td>';
                } else if ($multiple % 2 !== 0 && $table % 2 !== 0) { // Si le multiple est impair et la table impaire, on ajoute un gris clair
                    echo '<td class="gris-clair">'.$table * $multiple.'</td>';
                } else {
                    echo '<td>'.$table * $multiple.'</td>';
                }
            }

        echo '</tr>';
    }

echo '</tbody></table>';

?>

<style>
    table {
        border: 1px solid #000;
    }

    .border-bottom {
        border-bottom: 1px solid #000;
    }

    .border-right {
        border-right: 1px solid #000;
    }

    td {
        text-align: center;
        width: 60px;
    }

    .gris-fonce {
        background-color: #6d6d6d;
    }

    .gris-clair {
        background-color: #cecece;
    }
</style>

<table>
    <tbody>
        <tr>
            <td>0</td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            <td>9</td>
            <td>10</td>
        </tr>
    </tbody>
</table>
