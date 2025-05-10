<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__ . '../../classes/PaymentAccounts.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        if(!isset($_GET['user_ID'])){
            http_response_code(400);
            echo "Некорректный запрос.";
            exit;
        }

        $result = [];
        $paymentData = new PaymentAccounts($connection);
        $paymentData->GetPaymentAccountByUserID($_GET['user_ID']);

        $result[] = [
            'PaymentID' => $paymentData->getPaymentID(),
            'UserID' => $paymentData->getUserID(),
            'Type' => $paymentData->getType(),
            'CardNumber' => $paymentData->getCardNumber(),
            'IBAN' => $paymentData->getIban(),

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