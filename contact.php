<?php
include_once 'header.php';
var_dump($_SESSION);
?>

<h2>hello</h2>

<form action="" method="post">

  <input type="email" name="email" placeholder="Email" id="">
  <br>
  <input type="text" name="name" id="" placeholder="Your name">
  <br>
  <input type="text" name="surname" id="" placeholder="your surname">
  <br>
  <textarea name="message" rows="10" cols="30">
Your message here.
</textarea>
  <input type="submit" value="SendMail" name="submit">
</form>