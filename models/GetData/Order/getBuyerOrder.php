<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__ . '../../classes/Orders.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        if(!isset($_GET['OrderID'])){
            http_response_code(400);
            echo "Некорректный запрос.";
            exit;
        }

        $BuyerID = $_GET['BuyerID'];
        $result = [];

        $tempOrder = new Orders($connection);
        $tempOrder->GetOrderByOrderID($OrderID);

        $result[] = [
            'OrderID' => $tempOrder->getOrderID(),
            'BuyerID' => $tempOrder->getBuyerID(),
            'Status' => $tempOrder->getStatus(),
            'TotalAmount' => $tempOrder->getTotalAmount(),
            'DeliveryAdress' => $tempOrder->getDeliveryAdress(),
            'CreatedAt' => $tempOrder->getCreatedAt(),
            'ConfirmedAt' => $tempOrder->getConfirmedAt()
        ];

        header('Content-Type: application/json');
        $json = json_encode($result);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo json_last_error_msg();
        } else {
            echo $json;
        }
    }
    
    $connection->close();
?>