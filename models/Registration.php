<?php

    require_once __DIR__ . 'classes/Users.php';
    require_once __DIR__ . 'classes/EncryptSystem.php';

    if($_SERVER['REQUEST_METHOD']=== "POST"){
        header('Content-Type: application/json');

        $user = new User($connection);

        $data = json_decode(file_get_contents("php://input"), true);

        $user->setFullName($data['username']);
        $user->setEmail($data['email']);

        $password = new Enigma();
        $passwordHash = $password->encrypt($data['password']);

        $user->setPasswordHash($passwordHash);
        $user->setBirthDay($data['birthday']);
        $user->setPhone($data['phone']);
        $user->setAddress(null);
        $user->setRole('Покупець');
        
        $user->setRegistrationDate(date('Y-m-d H:i:s'));
        $user->setAuthToken(null);
        $user->addUser();   
        

        $email = $data['email'];
        $password = $data['password'];

        $tempUser = new User($connection);
        if ($tempUser->verify($email, $password)) {
            $_SESSION['user_ID'] = $tempUser->getUserID();
            header('Location: ../index.php');
            exit;
        } else {
            $error = "Invalid email or password.";
            require_once 'app/views/auth/login.php';
        }
    }

?>