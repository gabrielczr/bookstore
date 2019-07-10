
<?php
if (isset($_SESSION['login_user']) != '') {
  echo '<a href="logout.php">Logout</a>';
} else {
  echo '<p>Login</p>';
  echo '<form action="" method="post">';
  echo '<input type="email" name="myemail" placeholder="input your email" id="">';
  echo '<input type="password" name="mypassword" placeholder="insert your password" id="">';
  echo '<input type="submit" name="submit" value="submit">
  ';
  echo '</form> ';
}

include_once 'header.php';
include_once 'db_load.php';


if ($db_found && isset($_POST['submit'])) {
  $querry = 'SELECT email, password FROM users';
  $check = false;


  $results = mysqli_query($connect, $querry);
  while ($db_record = mysqli_fetch_assoc($results)) {
    $usermail = $db_record['email'];
    $userpass = $db_record['password'];
    $inputemail = strip_tags($_POST['myemail']);
    $inputpassword = $_POST['mypassword'];


    if (trim($usermail) == trim($inputemail) && strlen($userpass) == strlen($inputpassword)) {
      echo 'Welcome, user' . $inputemail  .  ' < br>';

      $_SESSION['login_user'] = $inputemail;
      var_dump($_SESSION);
    } else {
      echo ' You\'re not registered';
      //header("Location:register.php");
    }
  }
}
