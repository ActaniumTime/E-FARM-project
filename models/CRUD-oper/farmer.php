<?php

    require_once __DIR__ . '/../../config/databaseConn.php';
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);    

function updateUser($id, $userName, $email, $address, $avPath, $cardnum, $age){
    $conn = getConnection();

    $sql = "UPDATE users SET 
        username = ?, 
        email = ?,  
        avatar_path = ?, 
        card_number = ?,
        address = ?,
        age = ?
        WHERE id = ?";
        
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        return false; 
    }

    $stmt->bind_param(
        "ssssssi",
        $userName,
        $email,
        $avPath,
        $cardnum,
        $address,
        $age,
        $id
    );

    if($stmt->execute()){
        $stmt->close();
        return true;
    }else{
        $stmt->close();
        return false;
    }

}

function getUserDataByID($id){
    $conn = getConnection();
    $sql = "SELECT * FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $id);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $stmt->close();
            return $data;
        }
    } else {
        $stmt->close();
        return false;
    }

}

function getSpecificUserDataByID($id, $fieldName){
    $conn = getConnection();
    $allowedFields = [
        'id', 'username', 'email', 'password_hash', 'registration_date',
        'isFarmer', 'isAdmin', 'address', 'age', 'avatar_path', 'card_number'
    ];

    if (!in_array($fieldName, $allowedFields)) {

        return null; 
    }
    $sql = "SELECT `$fieldName` FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        return false; 
    }

    $stmt->bind_param('i', $id); 

    if($stmt->execute()){
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $stmt->close();
            return $row[$fieldName];
        } else {
            $stmt->close();
            return null; 
        }
    } else {
        $stmt->close();
        return null; 
    }
}

function GetAllOrdersByUserID($id) {
    $conn = getConnection();
    $sql = "SELECT * FROM orders WHERE BuyerID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id); 
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $data;
        }
    }
    $stmt->close();
    return [];
}

function getAllOrderItemByOrderID($id){
     $conn = getConnection();
    $sql = "SELECT * FROM order_items WHERE OrderID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id); 
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $data;
        }
    }
    $stmt->close();
    return [];
}

function GetAllDataAboutProductByProductID($id){
    $conn = getConnection();
    $sql = "SELECT * FROM products WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id); 
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $stmt->close();
            return $data;
        }
    }
    $stmt->close();
    return [];
}

function GerFarmerDataByUserID($id){
    $conn = getConnection();
    $sql = "SELECT isFarmer FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id); 
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $temp = $data['isFarmer'];
            $sql2 = "SELECT * FROM farmers WHERE = id?";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param('i', $temp); 
            if ($stmt2->execute()) {
                $data = $result->fetch_assoc();
                $stmt->close();
                return $data;
            } else {
                $stmt->close();
                return null;
            }
        } else{
            $stmt->close();
            return null;
        }
    }
    $stmt->close();
    return null;

}


function getSpecificFarmerDataByID($id, $fieldName){
    $conn = getConnection();
    $allowedFields = [
        'id', 'name', 'description', 'image', 'registration_date',
        'location', 'since', 'bio', 'age', 'phone', 'email', 
        'website', 'rating', 'rating_count', 'UserID'
    ];

    if (!in_array($fieldName, $allowedFields)) {

        return null; 
    }
    $sql = "SELECT `$fieldName` FROM farmers WHERE UserID=?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        return false; 
    }

    $stmt->bind_param('i', $id); 

    if($stmt->execute()){
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $stmt->close();
            return $row[$fieldName];
        } else {
            $stmt->close();
            return null; 
        }
    } else {
        $stmt->close();
        return null; 
    }
}

function getAllFarmerOrdersByFarmerID($id){
    $conn = getConnection();
    $sql = "SELECT * FROM orders WHERE FarmerID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id); 
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $data;
        }
    }
    $stmt->close();
    return [];
}

    function getAllNews() {
        $conn = getConnection();
        $sql = "SELECT * FROM news";
        $stmt = $conn->prepare($sql);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $news = [];

            while ($row = $result->fetch_assoc()) {
                $row['content'] = json_decode($row['content'], true);
                $row['images'] = json_decode($row['images'], true);
                $news[] = $row;
            }

            $stmt->close();
            return $news;
        }

        $stmt->close();
        return null;
    }

    function getNewsById($id) {
    $conn = getConnection();
    $sql = "SELECT * FROM news WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $row['content'] = json_decode($row['content'], true);
            $row['images'] = json_decode($row['images'], true);
            $stmt->close();
            return $row;
        }
    }

    $stmt->close();
    return null;
}


function createNews($title, $content, $author_id, $images = [], $Subtitle) {
    $conn = getConnection();
    $sql = "INSERT INTO news (title, content, author_id, images, Subtitle)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        return ['success' => false, 'error' => $conn->error];
    }

    $contentJson = json_encode($content, JSON_UNESCAPED_UNICODE);
    $imagesJson = json_encode($images, JSON_UNESCAPED_UNICODE);

    $stmt->bind_param('ssiss', $title, $contentJson, $author_id, $imagesJson, $Subtitle);
    
    if ($stmt->execute()) {
        $insertedId = $stmt->insert_id;
        $stmt->close();
        return ['success' => true, 'id' => $insertedId];
    } else {
        $error = $stmt->error;
        $stmt->close();
        return ['success' => false, 'error' => $error];
    }
}



?>