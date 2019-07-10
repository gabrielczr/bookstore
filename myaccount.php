<?php
include_once 'header.php';
require_once 'database.php';
include_once 'db_load.php';




if (isset($_SESSION['login_user']) != '' && $db_found) {



  echo "<h2>Our Bestsellers</h2><br>";
  $userid = $_SESSION['login_user'];
  $querry = "SELECT * FROM users WHERE email='$userid'";
  $results = mysqli_query($connect, $querry);
  //var_dump($results);
  while ($db_record = mysqli_fetch_assoc($results)) {
    echo $db_record['last_name'] . '<br>';
    echo $db_record['first_name'] . '<br>';
    echo $db_record['email'] . '<br>';
  }
} else
  echo "$db_name not found<br>";


mysqli_close($connect);
