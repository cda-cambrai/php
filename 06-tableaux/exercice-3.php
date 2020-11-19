<?php

$eleves = [
    0 => [
        'nom' => 'Matthieu',
        'notes' => [10, 8, 16, 5, 17, 16, 15, 2]
    ],
    1 => [
        'nom' => 'Thomas',
        'notes' => [4, 18, 12, 15, 13, 7]
    ],
    2 => [
        'nom' => 'Jean',
        'notes' => [17, 14, 6, 20, 18, 18, 9]
    ],
    3 => [
        'nom' => 'Enzo',
        'notes' => [1, 14, 6, 2, 1, 8, 9]
    ]
];

echo '<h2>Afficher la liste de tous les éléves avec leurs notes.</h2>';

// for ($i = 0; $i < count($eleves); $i++) {
//     echo $eleves[$i]['nom'];
// }
foreach ($eleves as $eleve) {
    // Afficher le nom de l'élève
    echo $eleve['nom'] . ' a eu ';

    // Parcourir toutes les notes de l'élève pour les afficher
    foreach ($eleve['notes'] as $index => $note) {
        echo $note;

        // Condition pour vérifier si on met une virgule ou non
        // On vérifie si on est sur la dernière note
        if ($index === count($eleve['notes']) - 1) {
            echo '';
        } else if ($index === count($eleve['notes']) - 2) { // On est sur l'avant dernière note
            echo ' et ';
        } else {
            echo ', ';
        }
    }

    echo '<br />';
}

echo '<h2>Calculer la moyenne de Jean. On part de $eleves[2][\'notes\']</h2>';

// Récupèrer les notes
$jeanNotes = $eleves[2]['notes'];
// Préparer la variable somme
$somme = 0;

foreach ($jeanNotes as $note) {
    // $somme = $somme + $note;
    $somme += $note;
}

var_dump($somme);

$moyenne = round($somme / count($jeanNotes), 2);
echo 'La moyenne de Jean est ' . $moyenne;

echo '<h2>Combien d\'élèves ont la moyenne ?</h2>';

$ontLaMoyenne = 0;
foreach ($eleves as $eleve) {
    // Calculer la moyenne
    $somme = 0;
    foreach ($eleve['notes'] as $note) {
        $somme += $note;
    }
    $moyenne = $somme / count($eleve['notes']);
    // $moyenne = array_sum($eleve['notes']) / count($eleve['notes']);

    // Vérifier si la moyenne est supérieure à 10
    if ($moyenne >= 10) {
        echo $eleve['nom'] . ' a la moyenne <br />';
        $ontLaMoyenne++; // On incrémente le compteur de personnes ayant la moyenne
    } else {
        echo $eleve['nom'] . ' n\'a pas la moyenne <br />';
    }
}

echo 'Nombre d\'élèves avec la moyenne: '.$ontLaMoyenne;

echo '<h2>Quel(s) éléve(s) a(ont) la meilleure note ?</h2>';

$bestNote = 0;
foreach ($eleves as $eleve) {
    foreach ($eleve['notes'] as $note) {
        if ($note > $bestNote) { // On cherche la meilleure note en comparant toutes les notes
            $bestNote = $note;
        }
    }
}

foreach ($eleves as $eleve) {
    foreach ($eleve['notes'] as $note) {
        if ($note === $bestNote) { // Si l'élève a eu la meilleure note
            echo $eleve['nom'] . ' a eu la meilleure note : ' . $bestNote . '<br />';
            break; // Le break arrête définitivement le foreach (ne se répète pas)
        }
    }
}

echo '<h2>Qui a eu au moins un 20 ?</h2>';

$aEu20 = false;
foreach ($eleves as $eleve) {
    foreach ($eleve['notes'] as $note) {
        if ($note === 20) {
            $aEu20 = true;
        }
    }
}

if ($aEu20) {
    echo 'Quelqu\'un a eu 20';
} else {
    echo 'Personne n\'a eu 20';
}
