<?php
$page_title = "PHP Library Rental-Home";

include ('includes/header.php');
?>

<!-- Logo image and banner text --> 
           
                <div class="hero-image">
                     <img src="www/img/bookshelf.jpg" alt="bookshelf"> 
                    <div class="hero-text">
                    <p>PHP Rental Library</p>
                    </div>
                </div> 
                       
            

            <!-- Main body of content -->
            <div id="mainbody">
                <h2>Welcome to PHP Library Rental</h2>
                <p>Hello, welcome to our website! This is your one-stop shop for books,
                    CDs, audiobooks, and board games to entertain yourself during 
                    these unprecedented times. The site works much the same as a regular
                    library. Click on any items you want, add them to your cart, and we’ll 
                    have you make an account with us to guarantee that your materials will
                    be shipped to your door within a week. At the end of the regular two-week
                    period, place your library items in your mailbox and we will take them back.</p>
                <p>Rentals include:</p>
                <ul>
                    <li><a href="books.php">Books</a></li>
                    <li><a href="cd-audiobooks.php">CD's</a></li>
                    <li><a href="cd-audiobooks.php">Audio Books</a></li>
                    <li><a href="boardgames.php">Board Games</a></li>
 
                </ul>
                <h4>Looking for something specific?</h4>
                <form action="searchresults.php" method="get">
    <input type="text" name="terms" size="30" required />&nbsp;&nbsp;
    <input type="submit" name="Submit" id="Submit" value="Search" />
</form>
            </div>


<?php
include ('includes/footer.php');

