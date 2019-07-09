<?php
include_once 'header.php';
require_once 'database.php';
include_once 'db_load.php';




if (isset($_SESSION['login_user']) != '' && $db_found) {
  //echo '<a href="logout.php">Logout</a>';

  echo "<h2>My details</h2><br>";
  $querry = 'SELECT * FROM users';
  $results = mysqli_query($connect, $querry);

  while ($db_record = mysqli_fetch_assoc($results)) {
    echo '<h2>' . $db_record['first_name'] . '</h2>' . '<br>';
    echo '<h2>' . $db_record['last_name'] . '</h2>' . '<br>';
    echo '<h2>' . $db_record['email'] . '</h2>' . '<br>';
    echo '<h2>' . $db_record['address'] . '</h2>' . '<br>';
  }
}
mysqli_close($connect);
