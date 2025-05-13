<?php
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'efarm');

// Функция подключения
function getConnection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Проверка соединения
    if ($conn->connect_error) {
        die("Помилка підключення: " . $conn->connect_error);
    }

    // Установка кодировки
    $conn->set_charset("utf8mb4");

    return $conn;
}
