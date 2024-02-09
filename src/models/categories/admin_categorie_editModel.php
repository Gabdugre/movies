<?php

$db;

/***
 * Check if the email is already in the database
 */
function checkAlreadyExistCat (): mixed
{
 global $db;
 if (!empty($_GET['id'])) {

     $catName = getCat()->catName;
     if ($catName === $_POST['catName']) {
        return false;
     }
 }


$sql = 'SELECT catName FROM categorie WHERE catName = :catName';
$query = $db->prepare($sql);
$query->bindParam(':catName', $_POST['catName'], PDO::PARAM_STR);
$query->execute();

return $query->fetch();
}

/**
 * add a categorie in the database
 */
function addCat ()
{
    global $db;
    $data = [
       
        'catName' => $_POST['catName']
    ];

    try {
        $sql = 'INSERT INTO categorie (catName) VALUES (:catName)';
        $query = $db->prepare($sql);
        $query->execute($data);
        alert('Une catégorie a bien été ajouté.', 'success');
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        }
    }
}

function updateCat ()
{

    global $db;
    $data = [
        'id' => $_GET['id'],
        'catName'=> $_POST['catName']
    ];

try {
    $sql = 'UPDATE categorie SET catName = :catName, modified = NOW() WHERE id = :id';
    $query = $db->prepare($sql);
    $query->execute($data);
    alert('Une catégorie a bien été modifié.', 'success');
} catch (PDOException $e) {

    if ($_ENV['DEBUG'] == 'true') {
        dump($e->getMessage());
        die;
    } else {
        alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
    }

}
}

function getCat () 
{
    global $db;

    try {
        $sql = 'SELECT catName FROM categorie WHERE id = :id';
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
 
?>