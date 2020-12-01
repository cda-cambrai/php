-- Le SELECT permet de récupèrer des données dans une table
-- * signifie tous les champs (colonnes)
SELECT * FROM webflix.movie;
-- Je peux préciser certains champs (colonnes)
SELECT title, duration FROM webflix.movie;
-- FROM permet de dire à partir de quelle table on fait la requête
-- WHERE peut permettre de conditionner ou de filtrer la requête
-- On peut sélectionner les films qui durent plus de 3h
SELECT * FROM webflix.movie WHERE duration >= 180;
-- On peut sélectionner les films d'Action
SELECT * FROM webflix.movie WHERE category_id = 2;
-- On peut sélectionner les films des années 80
SELECT * FROM webflix.movie WHERE released_at < '1990-01-01' AND released_at >= '1970-01-01';
-- On peut trier les films par durée
SELECT * FROM webflix.movie ORDER BY duration;
SELECT * FROM webflix.movie ORDER BY duration DESC;
-- On peut sélectionner et trier
SELECT * FROM webflix.movie WHERE duration > 120 ORDER BY duration;
-- On peut limiter le nombre de résultat et choisir à partir de quelle ligne on démarre
-- Ici, on démarre à la ligne 1 (2ème film) et on affiche 1 film
SELECT * FROM webflix.movie LIMIT 1, 1;
