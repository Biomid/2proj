<?php
session_start();

require_once './connect.php';

$conn = connect_to_database();



if (isset($_REQUEST['go'])) {

    if ($_REQUEST['pass'] !== $_REQUEST['pass_rep']) {
        $error = 'Пароль не совпадает';
        die();
    }


    if (!$_REQUEST['pass_rep']) {
        $error = 'Введите повторный пароль';
        die();
    }


    if (!$_REQUEST['pass']) {
        $error = 'Введите пароль';
        die();
    }


    if (!$_REQUEST['email']) {
        $error = 'Введите email';
        die();
    }


    if (!$_REQUEST['login']) {
        $error = 'Введите login';
        die();
    }



        $login = $_REQUEST['login'];
        $email = $_REQUEST['email'];

        $pass = md5($_REQUEST['pass']);

        $hash = md5($login . time());


    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "To: <$email>\r\n";
    $headers .= "From: <Magazin@gmail.com>\r\n";

        $message = '
                <html>
                <head>
                <title>Подтвердите Email</title>
                </head>
                <body>
                <p>Что бы подтвердить Email, перейдите по <a href="http://localhost/diploma/confirm_reg.php?hash=' . $hash . '">ссылка</a></p>
                </body>
                </html>
                ';


        $insert_query = "INSERT INTO `users` (`login`, `email`, `password`, `hash`, `email_confirmed`, `chek_admin`) VALUES ('" . $login . "','" . $email . "','" . $pass . "', '" . $hash . "', 1,0)";
        $data = $conn->prepare($insert_query);
        $data->execute();

        if (mail($email,$login,$message,$headers)){
            echo "Ok";
        }
        else{
            echo "Error";
        }




    header("Location: http://localhost/diploma/asd/index.php");
}