<?php

require_once __DIR__ . '/../../config/databaseConn.php';
    $conn = getConnection();
    
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

?>