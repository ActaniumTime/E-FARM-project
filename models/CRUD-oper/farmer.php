<?php

    require_once __DIR__ . '/../../config/databaseConn.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);    

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
        return false; // SQL ошибка
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

?>