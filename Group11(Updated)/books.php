<?php
$page_title = "PHP Library Rental-Books";

require_once ('includes/header.php');
require_once('includes/database.php');


//select statement
            $sql = "SELECT * FROM books";

//execute the query
$query = @$conn->query($sql);

//Handle errors
if (!$query) {
    $errno = $conn->errno;
    $error = $conn->error;
    $conn->close();
    require 'includes/footer.php';
    die("Selection failed: ($errno) $error.");
}
?>


<!-- Logo image and banner text --> 


<div class="hero-text2">
    <p>Books</p>
</div>




<!-- Main body of content -->
<div id="mainbody">
    <h2>Books available for rental:</h2>
    <table class="booklist">
        <tr>
            <th>Title</th>
            <th class="col2">Author</th>
            <th class="col3">Year Published</th>
            <th class="col4">Genre</th>
            <th class="col4">Reading Level</th>
        </tr>
        <!-- add PHP code here to list all books from the "books" table -->
        <?php
        while ($row = $query->fetch_assoc()) {
            echo "<tr>";
            echo "<td><a href='bookdetails.php?id=", $row['id'], "'>", $row['Title'], "</a></td>";
            echo "<td>", $row['Author'], "</td>";
            echo "<td>", $row['YearPublished'], "</td>";
            echo "<td>", $row['Genre'], "</td>";
            echo "<td>", $row['Reading Level'], "</td>";
            echo "</tr>";
        }
        ?>
     
    </table>
</div>
<br>
<input type="button" value="Add Book" onclick="window.location.href='addbooks.php'" />


<?php
include ('includes/footer.php');



