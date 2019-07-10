<?php
session_start();

?>
<section class='header'>
  <h1>Bookstore</h1>
  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="products.php">Books</a></li>
      <li><a href="contact.php">Contact</a></li>


    </ul>
  </nav>

  <?php

  if (isset($_SESSION['login_user']) != '') {

    echo '<nav>' . ' <ul>';
    echo '<li><a href="myaccount.php">My Account</a></li>';
    echo '<li><a href="cart.php">Cart</a></li>';
    echo '</ul>' . '</nav>';
  }

  ?>










</section>