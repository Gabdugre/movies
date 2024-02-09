<?php

$errorsMessage = [
    'catName' => false,
];

if (!empty($_POST)) {
    // Check categorie already exist
    if (!empty($_POST['catName'])) {
     if (!empty(checkAlreadyExistCAt())) {
            $errorsMessage['catName'] = 'La Catégorie existe déjà';
        }
    }

    

    // Save categorie in database
    if (!empty($_POST['catName'])) {
        if (!$errorsMessage['catName']) {

            if (!empty($_GET['id'])) {
                updateCat();
            } else {
                addCat();
            }
            // Redirect to users list
            header('Location: ' . $router->generate('categoriesEd'));
            die;
        } else {
            alert('Erreur lors de l\'ajout de la catégorie.');
        }
    } else {
        alert('Merci de remplir tous les champs obligatoires.');
    }
} else if (!empty($_GET['id'])) {
    // Read user data and save to $_POST
   $_POST = (array) getCat();
}