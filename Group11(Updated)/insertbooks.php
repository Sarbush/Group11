<?php

 
$page_title = "PHP Rental Library Add Book";
require_once 'includes/header.php';
require_once('includes/database.php');

//if the script did not received post data, display an error message and then terminite the script immediately
if (!filter_has_var(INPUT_GET, 'Title') ||
        !filter_has_var(INPUT_GET, 'Author') ||
        !filter_has_var(INPUT_GET, 'YearPublished') ||
        !filter_has_var(INPUT_GET, 'Genre') ||
        !filter_has_var(INPUT_GET, 'ReadingLevel') ||
        !filter_has_var(INPUT_GET, 'image') ||
        !filter_has_var(INPUT_GET, 'description')) {   
    echo "There were problems retrieving book details. New book cannot be added.";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

$title = filter_input(INPUT_GET, 'Title', FILTER_SANITIZE_STRING);
$author = filter_input(INPUT_GET, 'Author', FILTER_SANITIZE_STRING);
$yearpublished = filter_input(INPUT_GET, 'YearPublished', FILTER_SANITIZE_STRING);
$genre = filter_input(INPUT_GET, 'Genre', FILTER_DEFAULT);
$readinglevel = filter_input(INPUT_GET, 'ReadingLevel', FILTER_SANITIZE_STRING);
$image = filter_input(INPUT_GET, 'image', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_GET, 'description', FILTER_SANITIZE_STRING);


$sql="INSERT INTO books VALUES (NULL,  '$title', '$author', '$yearpublished', '$genre', '$readinglevel', '$image', '$description')";

echo $sql;
$query=@$conn->query($sql);

$id = $conn->insert_id;


if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Connection Failed with: $errno, $errmsg<br/>\n";
    include ('includes/footer.php');
    exit;
}


//echo "Your account has been updated.";
echo "You have successfully inserted the new book into the database.";
echo "<p><a href='bookdetails.php?id=$id'>Book Details</a></p>";

$conn->close();
require_once 'includes/footer.php';
