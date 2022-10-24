<?php

function connect_to_car_database()
{

    $host = 'localhost'; // адрес сервера
    $database = 'cart_test'; // имя базы данных
    $user = 'root'; // имя пользователя
    $password = ''; // пароль
    $connect = mysqli_connect($host, $user, $password, $database);

    return $connect;
}
