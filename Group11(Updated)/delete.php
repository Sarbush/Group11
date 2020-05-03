<?php


$page_title = "PHP Rental Library Delete";
require_once 'includes/header.php';
require_once('includes/database.php');

//if there were problems retrieving book id, the script must end.
if(!filter_has_var(INPUT_GET, 'id')) {
    echo "Deletion cannot continue since there were problems retrieving id";
    include ('includes/footer.php');
    exit;
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
 

$sql="DELETE FROM books WHERE id=$id";
 
//execute the query
$query=@$conn->query($sql);


if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}



//display a confirmation message
echo "You have successfully deleted this item from the database.<br><br>";
//close database connection
$conn->close();
require_once 'includes/footer.php';

