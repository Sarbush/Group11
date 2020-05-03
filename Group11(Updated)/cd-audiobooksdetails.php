<?php
$page_title = "CD & Audiobook Details";
require_once ('includes/header.php');
require_once('includes/database.php');

//if book id cannot retrieved, terminate the script.
if (!filter_has_var(INPUT_GET, "id")) {
    $conn->close();
    require_once ('includes/footer.php');
    die("Your request cannot be processed since there was a problem retrieving cd or audiobook id.");
}

//retrieve book id from a query string variable.
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//MySQL SELECT statement
$sql = "SELECT * FROM audiobooksandcds WHERE id=$id";

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

if (!$row = $query->fetch_assoc()) {
    $conn->close();
    require 'includes/footer.php';
    die("CD or Audiobook not found.");
}
?>

<h2>CD and Audiobook Details</h2>
<table id="bookdetails" class="bookdetails">
    <tr>
        <td class="col1">
            <img src="<?php echo $row['image'] ?>" alt="" width="150" />
        </td>
        <td class="col2">
            <h4>Title:</h4>
            <h4>Author:</h4>
            <h4>Year Published:</h4>
            <h4>Genre:</h4>
            <h4>Reading Level:</h4>
            <h4>Description:</h4>
        </td>
        <td class="col3">
            <p><?php echo $row['Title'] ?></p>
            <p><?php echo $row['Author'] ?></p>
            <p><?php echo $row['Year Published'] ?></p>
            <p><?php echo $row['Genre'] ?></p>
            <p><?php echo $row['Reading Level'] ?></p>
            <p><?php echo $row['description'] ?></p>
        </td>
    </tr>
</table>
<script src="www/js/main.js"></script>
<p id="delete-buttons">
    <input type="button" value="  Delete CD or Audio Book  " onclick="confirm_deletion(<?php echo $id ?>)" >
</p>


<?php
require_once ('includes/footer.php');

