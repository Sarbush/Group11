<?php

$page_title = "Search results";
require 'includes/header.php';
require_once('includes/database.php');

/*
//Handle errors
if (!$query) {
    $errno = $conn->errno;
    $error = $conn->error;
    $conn->close();
    require 'includes/footer.php';
    die("Selection failed: ($errno) $error.");
}*/
?>

<h2>Search Results</h2>
<table id="booklist" class="booklist">
    <tr>
        <th>Title</th>
        <th class="col2">Author</th>
        <th class="col3">Year Published</th>
        <th class="col4">Genre</th>
        <th class="col5">Reading Level</th>
    </tr>
    <!-- add PHP code here to list all books from the "books" table -->
<?php
require 'includes/database.php';
//retrieve and sanatize search text
$search = '';
if(filter_has_var(INPUT_GET, 'search ')) {
    $search = filter_input(INPUT_GET, 'search', FILTER_SANATIZE_STRING);
}

//SQL query
$sql = "SELECT * FROM books WHERE title LIKE '%$search%' ";

//execute the query
$query = $conn->query($sql);

//handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    $conn->close();
    echo "Selection failed with:($errno) $errmsg";
    $conn->close();
    exit;
}

while($row = $query->fetch_assoc()){
    echo "Title:", $row['Title'], "<br>" ;
    echo "Author:",$row['Author'], "<br>" ;
    echo "Year Published:",$row['YearPublished'], "<br>" ;
    echo "Genre:",$row['Genre'], "<br>" ;
    echo "Reading Level:",$row['Reading Level'], "<br>" ;
    echo "<br><br>";
    
}

?>
</table>

    <?php
    require 'includes/footer.php';

