<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__ . '../../classes/Products.php';
    require_once __DIR__ . '../../classes/FarmProfiles.php';
    require_once __DIR__ . '../../classes/Products.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $result = [];
        $productArr = [];
        $product = new Products($connection);
        $productArr = $product->GetAllProducts();

        foreach ($productArr as $product) {
            $tempFarmer = new FarmProfiles($connection);
            $farmerName = $tempFarmer->GetFarmerNameByID($product->getFarmerID());
            $result[] = [
                'ProductID' => $product->getProductID(),
                'CategoryID' => $product->getCategoryID(),
                'FarmerID' => $product->getFarmerID(),
                'Name' => $product->getName(),
                'Price' => $product->getPrice(),
                'StockQuantity' => $product->getStockQuantity(),
                'CreatedAt' => $product->getCreatedAt(),
                'FarmerName' => $farmerName,
                'ProductPic' => $product->getProductPic()

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