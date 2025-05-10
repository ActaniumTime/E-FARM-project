<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__ . '/../classes/Reviews.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        if(!isset($_GET['productID'])){
            http_response_code(400);
            echo "Некорректный запрос.";
            exit;
        }

        $productID = $_GET['productID'];
        $result = [];
        $reviewArr = [];
        $review = new Reviews($connection);
        $reviewArr = $review->GettAllByProductID($productID);

        foreach ($reviewArr as $review){
            $userName = $testEmp->getNameByID($review->getUserID()) ?? "???";
            $result[] = [
                'RewiesID' => $review->getReviewID(),
                'userName' => $userName,
                'ProductID' => $review->getProductID(),
                'Rating' => $review->getRating(),
                'Comment' => $review->getText(),
                'PublishedAt' => $review->getDate()
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