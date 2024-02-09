<?php

$db;

/***
 * Check if the movie is already in the database
 * I have to check getMovie's function
 */
function checkAlreadyExistMovie(): mixed
{
    global $db;
    if (!empty($_GET['id'])) {

        $title = getMovie()->title;
        if ($title === $_POST['title']) {
            return false;
        }
    }


    $sql = 'SELECT title FROM movie WHERE title = :title';
    $query = $db->prepare($sql);
    $query->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $query->execute();

    return $query->fetch();
}

/**
 * Add a user in the database
 */
function addMovie()
{
    global $db;
    $data = [
        'title' => $_POST['title'],
        'synopsis' => $_POST['synopsis'],
        'casting' => $_POST['casting'],
        'director' => $_POST['director'],
        'release_date' => $_POST['date'],
        'duration' => $_POST['duration'],
        'photo' => $_POST['photo'],
        'notePress' => $_POST['notePress']
        
    ];

    try {
        $sql = 'INSERT INTO movie (title, synopsis, casting, director, release_date, duration, photo, notePress) VALUES (:title, :synopsis, :casting, :director, :release_date, :duration, :photo, :notePress)';
        $query = $db->prepare($sql);
        $query->execute($data);
        alert('Un film a bien été ajouté.', 'success');
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        }
    }
}


function addMovieCategorie()
{
    global $db;
    $data = [
       'id' => $_GET['id']
        
    ];

    try {
       $sql = 'SELECT categorie.categorie_id, categorie.catName FROM categorie
               JOIN movie_categorie ON categorie.categorie_id = movie_categorie.categorie_id
               JOIN movie ON movie_categorie.movie_id = movie.movie_id WHERE movie.movie_id = ';

        alert('Un film a bien été ajouté.', 'success');
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        }
    }  
}

function updateMovie()
{

    global $db;
    $data = [
        'title' => $_POST['title'],
        'synopsis' => $_POST['synopsis'],
        'casting' => $_POST['casting'],
        'director' => $_POST['director'],
        'release_date' => $_POST['date'],
        'duration' => $_POST['duration'],
        'photo' => $_POST['photo'],
        'notePress' => $_POST['notePress'],
        'category' => $_POST['category'],
        'id' => $_GET['id']
    ];

    try {
        $sql = 'UPDATE movie SET title = :title, synopsis = :synopsis, duration = :duration, release_date = :release_date, director = :director, casting = :casting, notePress = :notePress, photo = :photo, category = :category, modified = NOW() WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute($data);
        alert('Un film a bien été modifié.', 'success');
    } catch (PDOException $e) {

        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        }
    }
}

function getMovie()
{


    global $db;

    try {
        $sql = 'SELECT title, synopsis, duration, director, release_date, casting, notePress, photo, category FROM movie WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' => $_GET['id']]);

        return $query->fetch();
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            Alert('Une ereur est survenue. Merci de réessayer plus tard', 'danger');
        }
    }
}

