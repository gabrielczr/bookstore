<?php
include_once 'header.php';



require_once 'database.php';
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
$db_name = 'books';
$db_found = mysqli_select_db($connect, $db_name);
echo "<h2>Your orders</h2><br>";
//var_dump($_SESSION['sessinBookId']);




$userMail = $_SESSION['login_user'];
//var_dump($_SESSION);
if (isset($_SESSION['sessinBookId']) != '') {
  foreach ($_SESSION['sessinBookId'] as  $value) {

    if ($db_found) {
      $querry = "SELECT * FROM book where book_id = '$value'";

      $queryUserAddress = "SELECT * FROM users WHERE email = '$userMail'";
      $results = mysqli_query($connect, $querry);
      // this are the books ordered
      while ($db_record = mysqli_fetch_assoc($results)) {

        echo '<p>' . 'Selected book : ' . $db_record['title'] . '</p>' . '<br>';
        foreach ($_SESSION as $key => $value) {
          $key == $db_record['book_id'];
        }
      }
      //user address selection


    }
  }



  $results2 = mysqli_query($connect, $queryUserAddress);
  while ($db_record = mysqli_fetch_assoc($results2)) {

    $usermail = $db_record['address'];
    echo ('Delivery Address : ' . $usermail);
    $_SESSION['userAddress'] = $usermail;
  }
} else ("dghfg");


?>

<form action="" method="post">
  <input type="button" name="send_order" value="send order">
</form>