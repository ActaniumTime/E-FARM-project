<?php

    require_once __DIR__ . 'classes/Users.php';
    require_once __DIR__ . 'classes/EncryptSystem.php';

    if($_SERVER['REQUEST_METHOD']=== "POST"){
        header('Content-Type: application/json');

        $user = new User($connection);

        $data = json_decode(file_get_contents("php://input"), true);

        if($user->verify($data['email'], $data['password'])){
            $user->loadByEmail($data['email']);
            $_SESSION['user_ID'] = $user->getUserID();
            setcookie('user_ID', $user->getUserID(), time() + (86400 * 30), "/"); // 86400 = 1 day
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid email or password.']);
        }
    }

?>