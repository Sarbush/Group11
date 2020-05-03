<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$count = 0;

//retrieve cart content
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    if ($cart) {
        $count = array_sum($cart);
    }
}

//set shopping cart image
       $shoppingcart_img = (!$count) ? "shoppingcart_empty.gif":"shoppingcart_full.gif";
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- 
            Author: your name
            Date: today's date
        -->
        <meta charset="utf-8">
        <title>PHP Library Rental Home</title>
        <link type="text/css" rel="stylesheet" href="www/css/styles.css" />
    </head>

    <body>
        <div id="wrapper">
            <!-- navigation bar -->
            <div id="navbar">
                <a href="index.php">Home</a>
                <a href="books.php">Books</a>
                <a href="cd-audiobooks.php">CD's & Audiobooks</a>
                <a href="boardgames.php">Board Games</a>
                <a href="faqs.php">FAQS</a>

            </div>
            <div id="shoppingcart">
                         <a href="showcart.php">
       <img src="www/img/<?= $shoppingcart_img ?>" style="border:none; width:30px" />
       <br />
       <span><?php echo $count ?> item(s)</span>
       </div>
       </a>



