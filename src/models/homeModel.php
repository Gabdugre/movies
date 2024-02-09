<?php

function getAllUsers ($db) {
	$sql = "SELECT * FROM users";
	$request = $db->prepare($sql);
	$request->execute();

	return $request->fetchAll();
}

function getMovie()
{
	global $db;
	$sql = 'SELECT slug, title, photo FROM movie';
	$query = $db->prepare($sql);
	$query->execute();

	return $query->fetchAll();

}