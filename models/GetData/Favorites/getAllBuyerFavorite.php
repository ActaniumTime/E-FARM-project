<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__ . '../../classes/Favorites.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        if(!isset($_GET['userID'])){
            http_response_code(400);
            echo "Некорректный запрос.";
            exit;
        }

        $UserID = $_GET['userID'];
        $result = [];
        $OrderArr = [];
        $tempOrderArr = new Favorites($connection);
        $OrderArr = $tempOrderArr->getFavoritesByUserID($UserID);
        
        foreach ($OrderArr as $order){
            $result[] = [
                'userID' => $order->getUserID(),
                'productID' => $order->getProductID()
            ];
        }

        header('Content-Type: application/json');
        $json = json_encode($result);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo json_last_error_msg();
        } else {
            echo $json;
        }
    }

?>