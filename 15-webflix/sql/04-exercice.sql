-- TP SQL

-- Voici quelques exercices SQL afin de pratiquer les commandes du language.

-- 1. Insèrer la liste de films suivants:

-- 'Le Parrain', '1972-01-01', 'Lorem ipsum', 186, 'le-parrain.jpg', 1
-- 'Scarface', '1983-01-01', 'Lorem ipsum', 120, 'scarface.jpg', 1
-- 'Les Affranchis', '1990-01-01', 'Lorem ipsum', 145, 'les-affranchis.jpg', 1
-- 'Heat', '1995-01-01', 'Lorem ipsum', 146, 'heat.jpg', 1
-- 'Die Hard', '1988-01-01', 'Lorem ipsum', 124, 'die-hard.jpg', 2
-- 'Demolition Man', '1993-01-01', 'Lorem ipsum', 89, 'demolition-man.jpg', 2
-- 'Taken', '2008-01-01', 'Lorem ipsum', 96, 'taken.jpg', 2
-- 'Deadpool', '2016-01-01', 'Lorem ipsum', 97, 'deadpool.jpg', 2
-- 'The Expandables', '2010-01-01', 'Lorem ipsum', 132, 'the-expandables.jpg', 2
-- 'Scream', '1996-01-01', 'Lorem ipsum', 78, 'scream.jpg', 3
-- 'Vendredi 13', '1980-01-01', 'Lorem ipsum', 97, 'vendredi-13.jpg', 3
-- 'Saw', '2005-01-01', 'Lorem ipsum', 102, 'saw.jpg', 3
-- 'Scary Movie', '2000-01-01', 'Lorem ipsum', 79, 'scary-movie.jpg', 3
-- 'Star Wars IV Un nouvel espoir', '1977-01-01', 'Lorem ipsum', 160, 'star-wars-iv-un-nouvel-espoir.jpg', 4
-- 'Alien', '1979-01-01', 'Lorem ipsum', 145, 'alien.jpg', 4
-- 'ET', '1982-01-01', 'Lorem ipsum', 95, 'et.jpg', 4
-- 'Robocop', '1987-01-01', 'Lorem ipsum', 98, 'robocop.jpg', 4
-- 'The Game', '1997-01-01', 'Lorem ipsum', 96, 'the-game.jpg', 5
-- 'Sixième Sens', '1999-01-01', 'Lorem ipsum', 120, 'sixieme-sens.jpg', 5
-- 'Usual Suspects', '1995-01-01', 'Lorem ipsum', 114, 'usual-suspects.jpg', 5
-- 'Fight Club', '1999-01-01', 'Lorem ipsum', 108, 'fight-club.jpg', 5
-- 'Inception', '2010-01-01', 'Lorem ipsum', 107, 'inception.jpg', 5
-- 'Deadpool 2', '1019-02-19', 'Lorem ipsum', 93, 'deadpool-2.jpg', 2

-- 2. Insèrer les acteurs suivants:

-- 'Pacino', 'Al', '1940-04-25'
-- 'Brando', 'Marlon', '1924-04-03'
-- 'de Niro', 'Robert', '1943-08-17'
-- 'Willis', 'Bruce', '1955-03-19'
-- 'Liotta', 'Ray', '1954-12-18'
-- 'Snipes', 'Wesley', '1962-07-31'
-- 'Stalone', 'Sylvester', '1946-07-06'
-- 'Norton', 'Edward', '1969-08-18'
-- 'Spacey', 'Kevin', '1959-07-26'
-- 'Kilmer', 'Val', '1959-12-31'
-- 'Milou', 'Tintin', '1999-12-25'

-- 3. Faire les requêtes en SELECT suivantes :

-- Récupère tous les films
-- Récupère tous les films dans la catégorie "Films de gangster"
-- Récupère tous les films dans la catégorie "Films de gangster" qui sont sortis avant 1990
-- Récupère tous les films du plus récent au plus vieux
-- Récupère les films dans l'ordre aléatoire
-- Récupère les 10 premiers films à partir du 4ème
-- Récupère le film le plus récent
-- Récupère le film le plus ancien
-- Récupère les acteurs nés avant 1960

-- BONUS Fonctions SQL et sous requêtes
-- Compte le nombre de films
-- Avoir la moyenne des années de sortie des films
-- Récupère le film le plus récent et le plus ancien (Sous requête)

-- 4. Corriger les acteurs

-- Tintin Milou n'est pas un acteur, écrire la requête permettant de le supprimer (DELETE) via son ID.
-- Deadpool 2 est sorti en 2019, vous pouvez le corriger (UPDATE) via son ID.
