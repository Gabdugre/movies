<?php

if (!empty($_GET['id'])) {
    if (!empty($_GET['id']) && !empty(getAlreadyExistIdCat()->id) && countCat() > 1) {
        deleteCat();
    }
} else {
   
    alert('Impossible de supprimer cet catégorie');
    die;
}
header('Location: ' . $router->generate('categoriesEd'));

