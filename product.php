<form action="index.php">

  <input type="submit" value="Go Back to the index">

</form>

<?php
include_once 'header.php';

require_once 'database.php';
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
$db_name = 'books';
$db_found = mysqli_select_db($connect, $db_name);




$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
//$id = $_GET['id'];


if ($id > 0 && $db_found) {





  $querry = 'SELECT * FROM book b
  inner join author a
  on b.authorID = a.author_id WHERE book_id = ' . $id;

  $results = mysqli_query($connect, $querry);


  $db_record = mysqli_fetch_assoc($results);


  echo '<section style ="display:flex; margin:1rem">';
  echo '<div>';
  echo "<img src=" . $db_record['cover'] . " alt=\"\" width=100px/>" . '<br>';
  echo '</div>';
  echo '<div style ="margin:1rem">';
  echo '<strong>' . 'TITLE:' . '</strong>' . '<br>';
  echo '<strong>' . $db_record['title'] . '</strong>' . '<br>';
  echo '<strong>' . 'Author:' . '</strong>' . '<br>';
  echo '<strong>' . $db_record['name'] . ' ' . '</strong>' . '<br>';
  echo '<strong>' . 'Released in:' . '</strong>' . '<br>';
  echo '<strong>' . $db_record['release_date'] . '</strong>' . '<br>';
  echo '<strong>' . 'Biography:' . ' ' . '</strong>';
  echo '<strong>' . $db_record['biography'] . '</strong>' . '<br>';
  echo '</div>';
  echo '</section>';
  echo "<hr>";
  echo '<section style ="display:flex; margin:1rem">';
  echo '<div style ="margin:1rem">';
  echo '<h2>Description:</h2>' . '<br>';
  echo '<p>' . $db_record['biography'] . '</p>' . '<br>';
  echo "<hr>";
  echo '<h2>Review:</h2>' . '<br>';
  echo '<p>' . $db_record['biography'] . '</p>' . '<br>';
  echo '</div>';
  echo '</section>';
}

//else
// echo "$db_name not found<br>";



mysqli_close($connect);


echo "<br>";


?>