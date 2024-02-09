<?php
if (!empty($_GET['id'])) {
    if (!empty($_GET['id']) && !empty(getAlreadyExistIdMovie()->id) && countMovie() > 1) {
        deleteMovie();
    }
} else {
   
    alert('Impossible de supprimer ce film');
    die;
}
header('Location: ' . $router->generate('moviesLi'));