-- Ceci est un commentaire en SQL
-- On va essayer d'ajouter des catégories
-- Films de gangsters, Action, Horreur, Science-fiction, Thriller

-- Supprime toutes les catégories avant de les insérer et réinitialise les IDs
-- On doit désactiver la vérification des clés étrangères
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE webflix.category;
SET FOREIGN_KEY_CHECKS = 1;

-- Ajouter une donnée dans la table category
INSERT INTO webflix.category (name) VALUES ('Films de gangsters');

-- On peut en ajouter plusieurs
INSERT INTO `webflix`.`category` (`name`) VALUES ('Action'),
('Horreur'),
('Science-fiction'),
('Thriller');
