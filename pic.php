<?php
require 'functions.php'; // To use database connection
$connection = connection('gallery', 'root', '');
if (!$connection) {
    // header('Location: error.php')
    die();
}
// Remember to reach this module is necessary click one iteration pic and it will redirect here, so Url-Params
// has a property ':id' to identify each pic, if exist extract that :id, else is false and redirect home.
// Each picture has 'id' property
$id = isset($_GET['id']) ? (int)$_GET['id'] : false;
if (!$id) {
    header('Location: index.php');
}
$statement = $connection->prepare('SELECT * FROM images WHERE id = :id'); // Select the document with :id (Url-Params)
$statement->execute(array(':id' => $id)); // Set :id value in query(params)
$pic = $statement->fetch(); // Get data/document/image IN ARRAY FORMAT
if (!$pic) {
    // If pic does not exist in database, then redirect
    header('Location: index.php');
}

require 'views/pic.view.php';
