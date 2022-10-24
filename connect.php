<?php

function connect_to_database()
{
    try {
        $servername = "localhost";
        $dbname = "user-login";
        $username = "root";
        $password = "";

        $connect = new PDO(
            "mysql:host=$servername; dbname=$dbname",
            $username, $password
        );
        // echo "connection succesfull ";
        $connect->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return -1;
    }

    return $connect;
}

?>