<?php
session_start();

require_once 'test.php';

$connect = connect_to_database();

$login = $_REQUEST['login'];
$password = md5($_REQUEST['password']);




$insert_query = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password' AND `email_confirmed` = 0";


$check_users = mysqli_query($connect, $insert_query);
    if(mysqli_num_rows($check_users) > 0){
        $user = mysqli_fetch_assoc($check_users);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "login" => $user['login'],
            "email" => $user['email'],
            "admin" => $user['chek_admin']
        ];
        header("Location: http://localhost/diploma/asd/index.php");
}
    else{
        header("Location: autoriz.php");
    }


?>
