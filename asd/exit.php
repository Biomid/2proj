<?php
    session_start();
  unset($_SESSION['logged_user1']);
  unset($_SESSION['logged_user2']);
  unset($_SESSION['logged_user3']);
  $_SESSION['logged_user1']='';
    $_SESSION['logged_user2']='';
      $_SESSION['logged_user3']='';
  header('location:index.html');

 ?>
