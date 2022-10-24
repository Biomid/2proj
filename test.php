<?php
function connect_to_database()
{

    $host = 'localhost'; // адрес сервера
    $database = 'user-login'; // имя базы данных
    $user = 'root'; // имя пользователя
    $password = ''; // пароль
    $connect = mysqli_connect($host, $user, $password, $database);

    return $connect;
}