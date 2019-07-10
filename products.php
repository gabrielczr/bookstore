<?php
include_once 'header.php';
require_once 'database.php';
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
$db_name = 'books';
$db_found = mysqli_select_db($connect, $db_name);


if ($db_found) {
  echo "<h2>Our Books to sell</h2><br>";
  $querry = 'SELECT * FROM book';

  $results = mysqli_query($connect, $querry);
  $db_record = mysqli_fetch_assoc($results);
  //var_dump($db_record);
  //$f = array();
  //---------------------------
  echo '<form method="post" action="" >';

  while ($db_record = mysqli_fetch_assoc($results)) {

    echo '<h2>' . $db_record['title'] . '</h2>' . '<br>';
    //echo '<h2>' . $db_record['book_id'] . '</h2>' . '<br>';
    $checkboxBookIf = $db_record['book_id'];

    //$f[] = $db_record['title'];

    //echo "<input type='checkbox' id = '$checkboxBookIf' name ='addtocart[]. $checkboxBookIf'>Add to cart";
    echo "<input type='checkbox' id = '$checkboxBookIf' name ='$checkboxBookIf' value = '$checkboxBookIf'>Add to cart";
  }
} else
  echo "$db_name not found<br>";

if (isset($_POST['submitOrder'])) {

  //var_dump($_POST);

  $sessinBookId = $_POST;
  $_SESSION["sessinBookId"] = $_POST;

  var_dump($_SESSION);
  unset($_SESSION['submitOrder']);

  var_dump($_SESSION);
}


mysqli_close($connect);
?>

<hr>
<input type="submit" name="submitOrder" value="Add items to c art">

</form>