<?php
include_once 'header.php';

/*
$cart = array(
  1 => array(
    "name" => "",
    "price" => 
  ),
  4 => array(
    "name" => "Jaws",
    "price" => 20
  )
);
*/


require_once 'database.php';
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
$db_name = 'books';
$db_found = mysqli_select_db($connect, $db_name);
echo "<h2>Your orders</h2><br>";

foreach ($_SESSION['sessinBookId'] as  $value) {

  if ($db_found) {
    $querry = "SELECT * FROM book where book_id = '$value'";
    $results = mysqli_query($connect, $querry);
    while ($db_record = mysqli_fetch_assoc($results)) {

      echo '<h2>' . $db_record['title'] . '</h2>' . '<br>';
      foreach ($_SESSION as $key => $value) {
        $key == $db_record['book_id'];
      }
    }
  }
}
