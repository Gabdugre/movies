<?php

function deleteMovie () {

global $db;
$sql = 'DELETE FROM movie WHERE id = :id';
$query = $db->prepare($sql);
$query->execute(['id' => $_GET['id']]);

try {
    $query->execute(['id' => $_GET['id']]);
    alert('Le film a bien été supprimé.', 'success');
}  catch (PDOException $e) {
    if ($_ENV['DEBUG'] == 'true') {
        dump($e->getMessage());
        die;
    }else {
        alert('Une erreur est survenue. Merci de réessayer plus tard.', 'danger');
    }
}

}


function getAlreadyExistIdMovie()
{

    try {

        global $db;
        $sql = 'SELECT id FROM movie WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' => $_GET['id']]);

        return $query->fetch();

    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            //dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard.', 'danger');
        }
    }


}

function countMovie()
{

    global $db;
    $sql = 'SELECT COUNT(*) FROM movie';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchColumn();

}