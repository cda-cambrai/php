-- Requête pour insérer le lien entre un film et
-- un acteur

SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE webflix.movie_has_actor;
SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO webflix.movie_has_actor (movie_id, actor_id) VALUES
(1, 1), (1, 2),
(2, 1),
(3, 3), (3, 5),
(4, 1), (4, 3), (4, 10),
(5, 4),
(6, 6), (6, 7),
(9, 7),
(19, 4),
(20, 9),
(21, 8);
