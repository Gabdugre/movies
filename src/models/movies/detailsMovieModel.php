<?php

function detailsMovie ()
{
global $db;

$sql = 'SELECT * FROM movie where slug = :slug';
    $query = $db->prepare($sql);
    $query->execute(['slug' => $_GET['slug']]);

    return $query->fetch();

}