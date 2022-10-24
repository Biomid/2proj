<?php
  session_start();
  $email = filter_var(trim($_POST['Email']),
  FILTER_SANITIZE_STRING);
  $password = filter_var(trim($_POST['Password']),
  FILTER_SANITIZE_STRING);

  $mysql = new mysqli('localhost','root','','asd');

  $result = $mysql->query("SELECT * FROM `users` where `email` = '$email' AND `pass` = '$password'");
  $name ='';
  $lastname ='';
  $email = '';
  if ($row = $result->fetch_assoc()) {
  $name = $row['firstname'];
  $lastname = $row['lastname'];
  $email = $row['email'];
  }

  $_SESSION['logged_user1'] = $name;
  $_SESSION['logged_user2'] = $lastname;
  $_SESSION['logged_user3'] = $email;

$mysql->close();
  header('location:index.html')
 ?>
