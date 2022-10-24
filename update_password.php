<?php
session_start();
require_once 'test.php';

$connect = connect_to_database();





if (isset($_REQUEST['doGo'])) {

    if ($_REQUEST['email']) {
        $email = $_REQUEST['email'];


        $hash = md5($email . time());


        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "To: <$email>\r\n";
        $headers .= "From: <mail@example.com>\r\n";

        $message = '
                <html>
                <head>
                <title>Подтвердите Email</title>
                </head>
                <body>
                <p>Что бы восстановить пароль перейдите по <a href="pass_gener.php?hash=' . $hash . '">ссылка</a></p>
                </body>
                </html>
                ';


        mysqli_query($connect, "UPDATE `user` SET hash='$hash' WHERE email='$email'");

        if (mail($email, "Восстановление пароля через Email", $message, $headers)) {

            echo 'Ссылка для восстановления пароля отправленная на вашу почту';
        } else {
            echo 'Произошла какая то ошибка, письмо отправилось';
        }
    } else {

        echo "Вы не ввели Email";
    }
}