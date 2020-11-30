-- Ecrire un INSERT qui permet d'ajouter les films suivants
-- title, released_at, description, duration, cover, category_id
-- Le parrain, '1972-01-01', Lorem ipsum, 186, null, 1
-- Die Hard, '1988-01-01', Lorem ipsum, 124, 'die-hard.jpg', 2
-- Attention, le category_id doit correspondre à un VRAI id de category

-- Ce code évite les doublons
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE webflix.movie;
SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO `webflix`.`movie` (`title`, `released_at`, `description`, `duration`, `cover`, `category_id`)
VALUES ('Le parrain', '1972-01-01', 'Lorem ipsum', 186, null, 1),
       ('Die Hard', '1988-01-01', 'Lorem ipsum', 124, 'die-hard.jpg', 2);
