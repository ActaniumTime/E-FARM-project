<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__ . '../../classes/BuyerProfiles.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $tempOrderArr = new BuyerProfiles($connection);
        $BuyerData = $tempOrderArr->getAllProfiles();
        
        foreach ($BuyerData as $buyer){
            $result[] = [
                'ProfileID' => $buyer->getProfileID(),
                'UserID' => $buyer->getUserID(),
                'PhotoPath' => $buyer->getPhotoPath(),
                'DeliveryAddress' => $buyer->getDeliveryAddress()
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