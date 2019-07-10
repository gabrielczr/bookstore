<?php
include_once 'header.php';
var_dump($_SESSION);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
  //Server settings
  $mail->SMTPDebug = 2;                                       // Enable verbose debug output
  $mail->isSMTP();                                            // Set mailer to use SMTP
  $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
  $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
  $mail->Username   = 'xxx';                     // SMTP username
  $mail->Password   = 'secret';                               // SMTP password
  $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
  $mail->Port       = 587;                                    // TCP port to connect to

  //Recipients
  $mail->setFrom('from@example.com', 'Mailer');
  $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
  $mail->addAddress('ellen@example.com');               // Name is optional
  $mail->addReplyTo('info@example.com', 'Information');
  $mail->addCC('cc@example.com');
  $mail->addBCC('bcc@example.com');

  // Attachments
  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

  // Content
  $mail->isHTML(true);                                  // Set email format to HTML
  $mail->Subject = 'Here is the subject';
  $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
  echo 'Message has been sent';
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
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