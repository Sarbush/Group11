<?php

 
$page_title = "PHP Rental Library Add Board Game";
require_once 'includes/header.php';
require_once('includes/database.php');

//if the script did not received post data, display an error message and then terminite the script immediately
if (!filter_has_var(INPUT_POST, 'Title') ||
        !filter_has_var(INPUT_POST, 'Author') ||
        !filter_has_var(INPUT_POST, 'year published') ||
        !filter_has_var(INPUT_POST, 'genre') ||
        !filter_has_var(INPUT_POST, 'Reading Level') ||
        !filter_has_var(INPUT_POST, 'image') ||
        !filter_has_var(INPUT_POST, 'description')) {   
    echo "There were problems retrieving book details. New book cannot be added.";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

$title = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Title', FILTER_SANITIZE_STRING)));
$author = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Author', FILTER_SANITIZE_STRING)));
$yearpublished = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'year published', FILTER_SANITIZE_STRING)));
$genre = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'genre', FILTER_DEFAULT)));
$readinglevel = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Reading Level', FILTER_SANITIZE_STRING)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));


$sql="INSERT INTO boardgames VALUES (NULL,  '$title', '$author', '$yearpublished', '$genre', '$readinglevel', '$image', '$description')";
$query=@$conn->query($sql);

$id = $conn->insert_id;

// close the connection.
$conn->close();
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Connection Failed with: $errno, $errmsg<br/>\n";
    include ('includes/footer.php');
    exit;
}
echo "Your account has been updated.";
echo "You have successfully inserted the new board game into the database.";
echo "<p><a href='boardgamedetails.php?id=$id'>Board Game Details</a></p>";
require_once 'includes/footer.php';
