<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>

<body>
  <?php
  include_once 'header.php';
  require_once 'database.php';
  var_dump($_SESSION);
  $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
  $db_name = 'books';
  $db_found = mysqli_select_db($connect, $db_name);

  if ($db_found) {
    echo "<h2>Our Bestsellers</h2><br>";
    $querry = 'SELECT sold, cover, book_id, title, release_date, category, format FROM book ORDER BY sold DESC LIMIT 3';
    $results = mysqli_query($connect, $querry);
    while ($db_record = mysqli_fetch_assoc($results)) {
      echo '<hr>';
      echo '<section style ="display:flex; margin:1rem">';
      echo '<div>';
      echo "<img src=" . $db_record['cover'] . " alt=\"\" width=100px/>";
      echo '</div>';
      echo '<div style ="margin-left:1rem">';
      echo '<h2>' . $db_record['title'] . '</h2>' . '<br>';
      echo '<strong>' . $db_record['release_date'] . '</strong>' . '<br>';
      echo '<strong>' . 'Category: ' . $db_record['category'] . '</strong>' . '<br>';
      $idm = $db_record['book_id'];
      echo "<a href=product.php?id=$idm>Click here for more information</a>";
      echo '</div>';
      echo '</section>';
    }
  } else
    echo "$db_name not found<br>";


  mysqli_close($connect);

  ?>
</body>

</html>