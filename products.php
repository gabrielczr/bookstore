<?php
include_once 'header.php';
require_once 'database.php';
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
$db_name = 'books';
$db_found = mysqli_select_db($connect, $db_name);


if ($db_found) {
  echo "<h2>Our Books to sell</h2><br>";
  $querry = 'SELECT * FROM book ';
  $results = mysqli_query($connect, $querry);
  $db_record = mysqli_fetch_assoc($results);

  while ($db_record = mysqli_fetch_assoc($results)) {

    echo '<h2>' . $db_record['title'] . '</h2>' . '<br>';
    echo '<input type="checkbox" name="addtocart">Add to cart';
  }
} else
  echo "$db_name not found<br>";



mysqli_close($connect);

?>
<hr>
<input type="button" value="Add items to cart">