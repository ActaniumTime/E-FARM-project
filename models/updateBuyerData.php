<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '/../config/databaseConn.php';
    require_once __DIR__ .'/../models/CRUD-oper/farmer.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        header('Content-Type: application/json');

        $uploadDir = __DIR__ . '/../public/img/';

    
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $newFileName = null;

        if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] === UPLOAD_ERR_OK){
            $fileTmpPath = $_FILES['profileImage']['tmp_name'];
            $fileName = $_FILES['profileImage']['name'];
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

            $newFileName = uniqid('profileImage_', true) . '.' . $fileExtension;
            $destinationPath = $uploadDir . $newFileName;

            if (!move_uploaded_file($fileTmpPath, $destinationPath)) {
                echo json_encode(['success' => false, 'message' => 'Failed to upload file']);
                exit;
            }
        }

        try{

            $id = $_POST['userID'] ?? '';
            $name = $_POST['userName'] ?? '';
            $cardNum = $_POST['cardNumber'] ?? '';
            $address = $_POST['address'] ?? '';
            $age = $_POST['age'] ?? '';
            $email = $_POST['email'];

            $avPath = $newFileName;

            $tempFlag = updateUser(
                $id, $name, 
                $email, $address, 
                $avPath, $cardNum, 
                $age);

            echo json_encode(['success' => true, 'message' => 'Дані успішно оновлені!']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'ПОМИЛКА : ' . $e->getMessage()]);
        }
    }
    else{
        echo json_encode(['success' => true, 'message' => 'FAIL TO LOAD']);
    }

?>