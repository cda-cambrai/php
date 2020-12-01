-- Ecrire un INSERT qui permet d'ajouter les films suivants
-- title, released_at, description, duration, cover, category_id
-- Le parrain, '1972-01-01', Lorem ipsum, 186, null, 1
-- Die Hard, '1988-01-01', Lorem ipsum, 124, 'die-hard.jpg', 2
-- Attention, le category_id doit correspondre à un VRAI id de category

-- Ce code évite les doublons
SET FOREIGN_KEY_CHECKS = 0;
-- Supprime tous les films et remets les IDs à zéro
TRUNCATE TABLE webflix.movie;
SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO `webflix`.`movie` (`title`, `released_at`, `description`, `duration`, `cover`, `category_id`) VALUES
('Le Parrain', '1972-01-01', 'Lorem ipsum', 186, 'le-parrain.jpg', 1),
('Scarface', '1983-01-01', 'Lorem ipsum', 120, 'scarface.jpg', 1),
('Les Affranchis', '1990-01-01', 'Lorem ipsum', 145, 'les-affranchis.jpg', 1),
('Heat', '1995-01-01', 'Lorem ipsum', 146, 'heat.jpg', 1),
('Die Hard', '1988-01-01', 'Lorem ipsum', 124, 'die-hard.jpg', 2),
('Demolition Man', '1993-01-01', 'Lorem ipsum', 89, 'demolition-man.jpg', 2),
('Taken', '2008-01-01', 'Lorem ipsum', 96, 'taken.jpg', 2),
('Deadpool', '2016-01-01', 'Lorem ipsum', 97, 'deadpool.jpg', 2),
('The Expandables', '2010-01-01', 'Lorem ipsum', 132, 'the-expandables.jpg', 2),
('Scream', '1996-01-01', 'Lorem ipsum', 78, 'scream.jpg', 3),
('Vendredi 13', '1980-01-01', 'Lorem ipsum', 97, 'vendredi-13.jpg', 3),
('Saw', '2005-01-01', 'Lorem ipsum', 102, 'saw.jpg', 3),
('Scary Movie', '2000-01-01', 'Lorem ipsum', 79, 'scary-movie.jpg', 3),
('Star Wars IV Un nouvel espoir', '1977-01-01', 'Lorem ipsum', 160, 'star-wars-iv-un-nouvel-espoir.jpg', 4),
('Alien', '1979-01-01', 'Lorem ipsum', 145, 'alien.jpg', 4),
('ET', '1982-01-01', 'Lorem ipsum', 95, 'et.jpg', 4),
('Robocop', '1987-01-01', 'Lorem ipsum', 98, 'robocop.jpg', 4),
('The Game', '1997-01-01', 'Lorem ipsum', 96, 'the-game.jpg', 5),
('Sixième Sens', '1999-01-01', 'Lorem ipsum', 120, 'sixieme-sens.jpg', 5),
('Usual Suspects', '1995-01-01', 'Lorem ipsum', 114, 'usual-suspects.jpg', 5),
('Fight Club', '1999-01-01', 'Lorem ipsum', 108, 'fight-club.jpg', 5),
('Inception', '2010-01-01', 'Lorem ipsum', 107, 'inception.jpg', 5),
('Deadpool 2', '1019-02-19', 'Lorem ipsum', 93, 'deadpool-2.jpg', 2);
