<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__ . '../../classes/Orders.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $result = [];
        $temp = new Orders($connection);
        $AllOrders = $temp->GetAllOrders();

        foreach ($AllOrders as $order) {
            $result[] = [
                'OrderID' => $order->getOrderID(),
                'BuyerID' => $order->getBuyerID(),
                'Status' => $order->getStatus(),
                'TotalAmount' => $order->getTotalAmount(),
                'DeliveryAdress' => $order->getDeliveryAdress(),
                'CreatedAt' => $order->getCreatedAt(),
                'ConfirmedAt' => $order->getConfirmedAt()
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
    
    $connection->close();
?>