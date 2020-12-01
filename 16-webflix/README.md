# Webflix PHP SQL

On va créer un clone de Netflix afin d'apprendre à créer un projet en PHP / SQL.

## Fonctionalités attendues

Le client nous a donné une liste de maquettes, ce qui va nous permettre de déduire les fonctionnalités à développer sur le site. Etant donné que nous sommes stagiaire dans l'entreprise, notre tuteur nous a également donné quelques informations pour la réalisation technique.

Optionnellement, on pourra réaliser un back office pour que l'administrateur puisse gérer les films.

## Partie Back

- `config/database.php` : Contiendra la connexion à la BDD. A inclure dans tous les fichiers.
- `config/config.php` : Contiendra les variables de configuration du projet.
- `config/functions.php` : Contiendra des fonctions utiles pour le projet.
- `partials/header.php` : Le header du site à inclure sur toutes les pages.
- `partials/footer.php` : Le footer du site à inclure sur toutes les pages.

## Partie Front

- `public/assets` : Dossier qui contient le CSS, le JS et les images.
- `public/assets/css`
- `public/assets/js`
- `public/assets/img`
- `public/assets/uploads` : Dossier qui contient les images uploadées (Films, avatars).

## Les pages

- `public/index.php` : Page d'accueil du site qui affiche 4 films aléatoires de la BDD ainsi qu'un carousel.
- `public/movie_list.php` : Lister tous les films de la BDD. On peut filter les films par durée, nom etc.
- `public/movie_single.php` : La page d'un seul film.
- `public/movie_add.php` : Permet d'ajouter un film. On doit vérifier que l'utilisateur soit connecté.
- `public/movie_update.php` : Permet de modifier un film. On doit vérifier que l'utilisateur soit connecté.
- `public/movie_delete.php` : Permet de supprimer un film. On doit vérifier que l'utilisateur soit connecté.
- `public/actor_single.php` : La page d'un acteur avec ses films.
- `public/register.php` : Page d'inscription.
- `public/login.php` : Page de connexion.
- `public/account.php` : Page du compte utilisateur. Lui permet de modifier ses informations.

## Options

- `public/movie_api.php` : Permet de rendre disponible nos films sur une api pour une appli mobile par exemple.

## Base de données

Voici les tables à créer :

- movie
    - id
    - title
    - released_at
    - description
    - duration
    - cover
    - category_id

- comment
    - id
    - nickname
    - message
    - note
    - created_at
    - movie_id

- category
    - id
    - name

- actor
    - id
    - name
    - firstname
    - birthday

- movie_has_actor
    - movie_id
    - actor_id

- user
    - id
    - email
    - username
    - password
    - token
    - requested_at

- payment
    - id
    - stripe_id
    - status
    - amount
    - user_id
    - movie_id
