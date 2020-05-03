<?php

$page_title = "Add Board Game";
require_once 'includes/header.php';
?>

<h2>Add New Board Game</h2>
<form action="insertboardgames.php" method="post">
    <table cellspacing="0" cellpadding="3" style="border: 1px solid silver; padding:5px; margin-bottom: 10px">
        <tr>
            <td style="text-align: right; width: 100px">Title: </td>
            <td><input name="Title" type="text" size="100" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Author: </td>
            <td><input name="Author" type="text" size="40" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Publish date: </td>
            <td>
                <input name="year published" type="text" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" required />
                <span style="font-size: small">YYYY-MM-DD</span>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">Genre: </td>
            <td><input name="genre" type="text" size="40" required /></td>
        </tr>
        
          
            <td style="text-align: right">Image: </td>
            <td><input name="image" type="text" size="100" required /></td>
        </tr>
        <tr>
            <td style="text-align: right; vertical-align: top">Description:</td>
            <td><textarea name="description" rows="6" cols="65"></textarea></td>
        </tr>
    </table>
    <div class="bookstore-button">
        <input type="submit" value="Add Board Game" />
        <input type="button" value="Cancel" onclick="window.location.href='boardgames.php'" />
    </div>
</form>

<?php
require_once 'includes/footer.php';

