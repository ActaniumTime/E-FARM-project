<?php

    session_start();

    $host = 'localhost';
    $port = 3306; 
    $username = 'root';
    $password = 'root';
    $database = 'farmproject';
    $table = 'users';

    $connection = new mysqli($host, $username, $password, $database, $port);

    if ($connection->connect_error) {
        die("Ошибка подключения: " . $connection->connect_error);
    }

?>
