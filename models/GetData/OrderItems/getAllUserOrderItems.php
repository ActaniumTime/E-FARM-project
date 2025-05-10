<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__ . '../../classes/OrderItems.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        if(!isset($_GET['OrderID'])){
            http_response_code(400);
            echo "Некорректный запрос.";
            exit;
        }

        $OrderID = $_GET['OrderID'];
        $result = [];
        $OrderArr = [];
        $tempOrderArr = new OrderItems($connection);
        $OrderArr = $tempOrderArr->GetAllOrderItemsByOrderID($OrderID);
        
        foreach ($OrderArr as $order){
            $result[] = [
                'OrderItemID' => $order->getOrderItemID(),
                'OrderID' => $order->getOrderID(),
                'ProductID' => $order->getProductID(),
                'Quantity' => $order->getQuantity(),
                'PurchasePrice' => $order->getPurchasePrice()
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