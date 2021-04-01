<?php
require 'functions.php'; // To use Database-connection
$pics_per_pagination = 6; // Set number of pics for each pagination
// To know the current page user is, 'page' refers to Url-Params, if exist ensure convert into INT type to prevent dangerous Scripts (?page=1,2,3)
$current_page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);
// Set where query will capture the current image, to extract the next images/rows depending on the pagination
$init = ($current_page > 1) ? $current_page * $pics_per_pagination - $pics_per_pagination : 0;

$connection = connection('gallery', 'root', ''); // connection() is a function from 'functions.php'

if (!$connection) {
    // If connections fails
    header('Location: error.php');
}
// Limit the searching data, where init is the first document to collect and $pics_per_pagination is the number of documents to extract
$statement = $connection->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM images LIMIT $init, $pics_per_pagination");
$statement->execute();
$pics = $statement->fetchAll(); // Capture all data
// Redirect if no founded pics
if (!$pics) {
    header('Location: index.php');
}
// print_r($pics); // store pics in array format (Info)
// Select/extract rows length as total_rows
$statement = $connection->prepare("SELECT FOUND_ROWS() as total_rows");
$statement->execute();

$total_post = $statement->fetch()['total_rows']; // Save in a var the result of total_rows (int)
// Calculate total pages(pagination)
$total_pages = ceil($total_post / $pics_per_pagination); // Return 3 If 16 pics are stored in Database
// echo $total_pages;
require 'views/index.view.php';
