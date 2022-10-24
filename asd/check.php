<?php
    $firstname = filter_var(trim($_POST['username']),
    FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']),
    FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']),
    FILTER_SANITIZE_STRING);

    if (mb_strlen($firstname) == 0 || mb_strlen($firstname) > 15) {
      echo "Введите имя";
      exit();
    }


    $mysql = new mysqli('localhost','root','','asd');
    $mysql->query("INSERT INTO `users` (`username`,  `email`, `password`, )
    VALUES('$firstname', '$email', '$password')");
    $mysql->close();
    header('location:index.html')
 ?>
