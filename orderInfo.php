<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include './partials/header.php';
    require_once __DIR__ . '/models/CRUD-oper/farmer.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $tempID = $_GET['id'];
    $tempArr = getAllOrderItemByOrderID($tempID);

    // Output all data from the array
    foreach ($tempArr as $item) {
        echo '<pre>';
        print_r($item);
        echo '</pre>';

        // Fetch and display product information
        $productInfo = GetAllDataAboutProductByProductID($item['ProductID']);
        if (!empty($productInfo)) {
            echo '<div style="background-color: gray; color: white; padding: 10px; margin-top: 10px;">';
            echo '<h3>Product Information:</h3>';
            foreach ($productInfo as $key => $value) {
                echo '<p><strong>' . htmlspecialchars($key) . ':</strong> ' . htmlspecialchars($value) . '</p>';
            }
            echo '</div>';
        }
    }
}
?>