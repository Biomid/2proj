<?php

session_start();
if (@$_SESSION['user']){
    header("Location: profile.php");
}

require_once './connect.php';

$conn = connect_to_database();
?>

<head>
    <meta charset="utf-8">
    <title>Paper Stack</title>
    <link rel="stylesheet" type="text/css" href="style2.css" />
</head>
<body>

<form action="registration.php" method="post">
    <p>Логин: <input type="text" name="login"> <samp style="color:red">*</samp></p>
    <p>EMail: <input type="email" name="email"><samp style="color:red">*</samp></p>
    <p>Пароль: <input type="password" name="pass"><samp style="color:red">*</samp></p>
    <p>Повторите пароль: <input type="password" name="pass_rep"><samp style="color:red">*</samp></p>
    <p><input type="submit" value="Зарегистрироваться" name="go"></p>
    <a href="autoriz.php">Авторизация</a>
</form>
</body>
</html>
