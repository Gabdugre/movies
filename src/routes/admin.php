<?php
$admin = '/' . $_ENV['ADMIN_FOLDER'];

$router->addMatchTypes(['uuid' => '[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}']);

// Users
$router->map( 'GET|POST', $admin . '/connexion', 'users/login', 'login'); // 3
$router->map( 'GET', $admin . '/deconnexion', 'users/admin_logout', 'logout'); // 4
$router->map( 'GET', $admin . '/mot-de-passe-oublie', '', 'lostPassword'); // 7
$router->map( 'GET', $admin . '/utilisateurs', 'users/admin_index', 'users'); // 1
$router->map( 'GET|POST', $admin . '/utilisateurs/editer', 'users/admin_edit', 'addUser'); // 2 / 5
$router->map( 'GET|POST', $admin . '/utilisateurs/editer/[uuid:id]', 'users/admin_edit', 'editUser'); // 2 / 5
$router->map( 'GET', $admin . '/utilisateurs/supprimer/[uuid:id]', 'users/admin_delete', 'deleteUser'); // 6

// Movies
$router->map( 'GET', $admin . '/movies', '', '');
$router->map( 'GET', $admin . '/movies/liste', 'movies/admin_movie_index', 'moviesLi');
$router->map( 'GET|POST', $admin . '/movies/editer/[i:id]', 'movies/admin_movie_edit', 'editMovie');
$router->map( 'GET|POST', $admin . '/movies/editer', 'movies/admin_movie_edit', 'addMovie');
$router->map( 'GET', $admin . '/movies/supprimer/[i:id]', 'movies/admin_movie_delete', 'deleteMovie');

// Categories
$router->map( 'GET', $admin . '/categories', '', '');
$router->map( 'GET', $admin . '/liste', 'categories/admin_categorie_index', 'categoriesEd');
$router->map( 'GET|POST', $admin . '/categories/editer/[i:id]', 'categories/admin_categorie_edit', 'editCat');
$router->map( 'GET|POST', $admin . '/categories/editer', 'categories/admin_categorie_edit', 'addCat');
$router->map( 'GET', $admin . '/categories/supprimer/[i:id]', 'categories/admin_categorie_delete', 'deleteCat');











