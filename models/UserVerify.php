<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '../config/databaseConn.php';

    require_once __DIR__ . '/classes/User.php';

    if (isset($_COOKIE['user_ID']) && !isset($_SESSION['user_ID'])) {
        $_SESSION['user_ID'] = $_COOKIE['user_ID'];
    }

    if (!isset($_SESSION['user_ID'])) {
         echo "User not logged in. Redirecting to login page...";
         header('Location: G:\Job\MAMP\htdocs\E-FARM PROJECT\index.php');
         exit();
    }

    $emp = new user($connection);
    $emp->loadByID($_SESSION['user_ID']);

    $testEmp = new user($connection);
    
?>