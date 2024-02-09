<?php 
function deleteCat () {

global $db;
$sql = 'DELETE FROM categorie WHERE id = :id';
$query = $db->prepare($sql);
$query->execute(['id' => $_GET['id']]);

try {
    $query->execute(['id' => $_GET['id']]);
    alert('La categorie a bien été supprimé.', 'success');
}  catch (PDOException $e) {
    if ($_ENV['DEBUG'] == 'true') {
        dump($e->getMessage());
        die;
    }else {
        alert('Une erreur est survenue. Merci de réessayer plus tard.', 'danger');
    }
}

}

function getAlreadyExistIdCat()
{

    try {

        global $db;
        $sql = 'SELECT id FROM categorie WHERE id = :id';
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
function countCat()
{

    global $db;
    $sql = 'SELECT COUNT(*) FROM categorie';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchColumn();

}