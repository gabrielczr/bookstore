<p>Signup page</p>
<form action="" method="POST">
  <input type="text" name="firstname" placeholder="firstname">
  <input type="text" name="lastname" placeholder="lastname">
  <input type="text" name="address" placeholder="address">
  <input type="password" name="password" placeholder="password">
  <input type="email" name="email" placeholder="email">
  <input type="submit" name="sendSubmit" value="Submit">
</form>
<a href="index.php">Back to the main page</a>

<?php
include_once 'header.php';
var_dump($_SESSION);

include_once('database.php');;
include_once 'db_load.php';



if (isset($_POST['sendSubmit'])) {
  //$hashedPass = password_hash($_POST['password'],PASSWORD_DEFAULT);

  $usersFirstNamePost = $_POST['firstname'];
  $usersLastNamePost = $_POST['lastname'];
  $userEmailPost = $_POST['email'];
  //$usersPasswordPost = $_POST['password'];
  $usersPasswordPost = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $userAddressPost = $_POST['address'];
  //echo($usersPasswordPost);

  $queryInsert = "
    INSERT INTO users(email,first_name,last_name, password, address) VALUES('$userEmailPost','$usersFirstNamePost','$usersLastNamePost','$usersPasswordPost', '$userAddressPost');";

  $querySelect =
    "
    SELECT * FROM users;
    ";

  $vaidation = "";


  if ($db_found) {
    $resultSQL = mysqli_query($connect, $querySelect);


    while ($db_record = mysqli_fetch_assoc($resultSQL)) {
      $usersEmail = $db_record['email'];
      $usersFirstName = $db_record['first_name'];
      $usersLastName = $db_record['last_name'];
      $usersPassword = $db_record['password'];
      $usersAddress = $db_record['address'];
      // $lengthOfusersFirstName = strlen($usersFirstName);


      if ($usersEmail == $userEmailPost) {
        $vaidation = "true";
        break;
      } else {
        $vaidation = "false";
      }
    }
  } else {
    echo ("$db_name NOT found");
  }

  if ($vaidation == "true") {
    echo ("Email already exist");
  } else {
    echo ("Registration is done");
    echo ('<br>');
    var_dump(mysqli_query($connect, $queryInsert));
  }
}
?>