<?php
require 'functions.php';
$connection = connection('gallery', 'root', '');
if (!$connection) {
    // header('Location: error.php')
    die();
}
// Check submit data (upload image)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    // print_r($_FILES); // Access to input-file name (pic) and extract all info from uploaded image
    $check = @getimagesize(($_FILES['pic']['tmp_name'])); // check and validate the file is an image
    // print_r($check); // Store all properties image in an array otherwise is not an image file
    if ($check !== false) {
        // Create a save images path and the new file final path
        $final_path = 'pics/';
        $file_uploaded = $final_path . $_FILES['pic']['name']; // New file path
        // echo 'Final path: ' . $file_uploaded; // This is the file uploaded path
        // Upload the new file into selected path
        move_uploaded_file($_FILES['pic']['tmp_name'], $file_uploaded);
        // 
        $statement = $connection->prepare('INSERT INTO images (id, title, image, text) VALUES ("null", :title, :image, :text)');
        // 'title', 'text' refers to inputs id's and $_FILES['pic']['name'] is the 'array' created when upload a file
        $statement->execute((array('title' => $_POST['title'], 'text' => $_POST['text'], 'image' => $_FILES['pic']['name'])));
        header('Location: index.php');
    } else {
        $error = 'No supported image, choose another one';
    }
}
require 'views/upload.view.php';
