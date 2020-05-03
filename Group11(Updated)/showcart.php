<?php


$page_title = "Shopping Cart";
require_once ('includes/header.php');
require_once('includes/database.php');
?>
<h2>My Shopping Cart</h2>
<?php
if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
    echo "Your shopping cart is empty.<br><br>";
    include ('includes/footer.php');
    exit();
}

//proceed since the cart is not empty
$cart = $_SESSION['cart'];
?>
<table class="booklist">
    <tr>
        <th style="width: 500px">Title</th>
        <th style="width: 60px"></th>
        <th style="width: 60px">Quantity</th>
        <th style="width: 60px"></th>
    </tr>
    <?php
    //insert code to display the shopping cart content
    //select statement
    $sql = "SELECT id, title, price FROM books WHERE 0";
    foreach (array_keys($cart) as $id) {
        $sql .= " OR id=$id";
    }

    ?>
</table>
<br>
<div class="bookstore-button">
    <input type="button" value="Checkout" onclick="window.location.href = 'checkout.php'"/>
    <input type="button" value="Cancel" onclick="window.location.href = 'listbooks.php'" />
</div>
<br><br>

<?php
include ('includes/footer.php');

