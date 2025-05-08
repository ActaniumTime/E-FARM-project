<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '../../config/databaseConn.php';
    require_once __DIR__ . '../../models/classes/EncryptSystem.php';
    require_once __DIR__ . '../../models/classes/Users.php';
    
    $testUser = new User($connection);

    $testUser->loadByID(1);
    $testUser->Show();
    echo "<br>";
    echo "<br>";

    // $testUser->setFullName('Test User');
    // $testUser->setEmail('');
    // $testUser->setPasswordHash('1234567890');
    // $testUser->setBirthDay('2000-01-01');
    // $testUser->setPhone('1234567890');
    // $testUser->setAddress('Test Address');
    // $testUser->setRole('Farmer');
    // $testUser->setRegistrationDate('2023-10-01 12:00:00');
    // $testUser->setAuthToken('Test Auth Token');
    // $testUser->addUser(); // Добавление пользователя в базу данных

    // echo "<br>";
    // echo "<br>";

    // $testUser->loadByID(2);
    // $testUser->Show(); // Отображение информации о пользователе после добавления
    // echo "<br>";
    // echo "<br>";

    $testUser->deleteUser();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>