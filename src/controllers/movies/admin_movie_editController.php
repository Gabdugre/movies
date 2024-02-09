<?php

$errorsMessage = [
    'title' => false,
    'synopsis' => false,
    'casting' => false,
    'director' => false,
    'date' => false,
    'duration' => false,
    'photo' => false,
    'notePress' => false,
    'category' => false
];

if (!empty($_POST)) {
    if (!empty($_POST['title'])){
        $title = $_POST['title'];
   if (!empty(checkAlreadyExistMovie())) {
        
        $errorsMessage['title'] = 'Le titre existe déjà';
    }
    }
    
    
    

    
    //code !empty répétitif, possibilitée d'imbriqué deux blocs de code ?
    
    //save user in database
if (!empty($_POST['title']) &&  !empty($_POST['synopsis']) && !empty($_POST['casting'])  && !empty($_POST['director']) && !empty($_POST['date']) && !empty($_POST['duration']) && !empty($_POST['photo']) && !empty($_POST['notePress']) && !empty($_POST['category'])) {
    if (!$errorsMessage['title'] &&  !$errorsMessage['synopsis'] && !$errorsMessage['casting'] && !$errorsMessage['director'] && !$errorsMessage['date'] && !$errorsMessage['duration'] && !$errorsMessage['photo'] && !$errorsMessage['notePress'] && !$errorsMessage['category']) {
       
      if (!empty($_GET['id'])) {
                updateMovie();
            } else {
                addMovie();
            }
            // Redirect to users list
            header('Location: ' . $router->generate('moviesLi'));
            die;
        } else {
            alert('Erreur lors de l\'ajout du film.');
        }
    } else {
        alert('Merci de remplir tous les champs obligatoires.');
    }
} else if (!empty($_GET['id'])) {
    // Read movie data and save to $_POST
   $_POST = (array) getMovie();
   
}

$dir = '../images/';
$nameFile = $_FILES['photo'];


    