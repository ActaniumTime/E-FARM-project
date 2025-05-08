<?php

    require_once __DIR__ . '/EncryptSystem.php';
    class User{
        private $connection;   
        private $UserID;
        private $FullName;
        private $BirthDate;
        private $Email;
        private $PasswordHash;
        private $Phone;         
        private $Address;
        private $Role;
        private $RegistrationDate;
        private $AuthToken;
        private $Avatar;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function loadByID($UserID){
            $query = "SELECT * FROM users WHERE UserID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $UserID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->UserID = $row['UserID'];
                $this->FullName = $row['FullName'];
                $this->BirthDate = $row['BirthDate'];
                $this->Email = $row['Email'];
                $this->PasswordHash = $row['PasswordHash'];
                $this->Phone = $row['Phone'];
                $this->Address = $row['Address'];
                $this->Role = $row['Role'];
                $this->RegistrationDate = $row['RegistrationDate'];
                $this->AuthToken = $row['AuthToken'];
                return true;
            } else {
                return false;
            }
        }

        public function loadByEmail($Email){
            $query = "SELECT * FROM users WHERE Email = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("s", $Email);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->UserID = $row['UserID'];
                $this->FullName = $row['FullName'];
                $this->BirthDate = $row['BirthDate'];
                $this->Email = $row['Email'];
                $this->PasswordHash = $row['PasswordHash'];
                $this->Phone = $row['Phone'];
                $this->Address = $row['Address'];
                $this->Role = $row['Role'];
                return true;
            } else {
                return false;
            }
        }
    
        public function addUser(){
            $query = "INSERT INTO users (FullName, BirthDate, Email, PasswordHash, Phone, Address, Role, RegistrationDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("ssssssss", 
            $this->FullName, 
            $this->BirthDate, 
            $this->Email, 
            $this->PasswordHash, 
            $this->Phone, 
            $this->Address, 
            $this->Role, 
            $this->RegistrationDate);
            if($stmt->execute()){
                $this->UserID = $stmt->insert_id;
                return true;
            } else {
                return false;
            }
        }

        public function updateUser(){
            $query = "UPDATE users SET FullName = ?, BirthDate = ?, Email = ?, PasswordHash = ?, Phone = ?, Address = ?, Role = ?, RegistrationDate = ? WHERE UserID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("ssssssssi", 
            $this->FullName, 
            $this->BirthDate, 
            $this->Email, 
            $this->PasswordHash, 
            $this->Phone, 
            $this->Address, 
            $this->Role, 
            $this->RegistrationDate,
            $this->UserID);
            
            return $stmt->execute();
        }

        public function deleteUser(){
            $query = "DELETE FROM users WHERE UserID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $this->UserID);
            return $stmt->execute();
        }

        public function Show(){
            echo "UserID: " . $this->UserID . "<br>";
            echo "FullName: " . $this->FullName . "<br>";
            echo "BirthDate: " . $this->BirthDate . "<br>";
            echo "Email: " . $this->Email . "<br>";
            echo "PasswordHash: " . $this->PasswordHash . "<br>";
            echo "Phone: " . $this->Phone . "<br>";
            echo "Address: " . $this->Address . "<br>";
            echo "Role: " . $this->Role . "<br>";
            echo "RegistrationDate: " . $this->RegistrationDate . "<br>";
            echo "AuthToken: " . $this->AuthToken . "<br>";
            echo "Avatar: " . $this->Avatar . "<br>";
        }

        public function verify($email, $password) {
            $query = "SELECT * FROM users WHERE email = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $enc = new Enigma();
    
            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc();
                if ($password === $enc->encrypt($data['password'])) 
                {
    
                    $_SESSION['employer_ID'] = $data['employerID'];
                    $token = bin2hex(random_bytes(32));
    
                    $uquery = "UPDATE users SET token = ? WHERE email = ?";
                    $ustmt = $this->connection->prepare($uquery);
                    $ustmt->bind_param("ss", $token, $email);
                    $ustmt->execute();
    
                    setcookie("token", $token, time() + 60 * 60 * 24 * 30, "/");
    
                    $this->UserID = $data['UserID'];
                    $this->FullName = $data['FullName'];
                    $this->BirthDate = $data['BirthDate'];
                    $this->Email = $data['Email'];
                    $this->PasswordHash = $data['PasswordHash'];
                    $this->Phone = $data['Phone'];
                    $this->Address = $data['Address'];
                    $this->Role = $data['Role'];
                    $this->RegistrationDate = $data['RegistrationDate'];
                    $this->AuthToken = $data['AuthToken'];
                    
                    
                    return true;
                }
            }
            return false;
        }


        public function setUserID($UserID) {
            $this->UserID = $UserID;
        }
        
        public function setFullName($FullName) {
            $this->FullName = $FullName;
        }
        
        public function setBirthDay($BirthDate) {
            $this->BirthDate = $BirthDate;
        }
        
        public function setEmail($Email) {
            $this->Email = $Email;
        }
        
        public function setPasswordHash($PasswordHash) {
            $this->PasswordHash = $PasswordHash;
        }
        
        public function setPhone($Phone) {
            $this->Phone = $Phone;
        }
        
        public function setAddress($Address) {
            $this->Address = $Address;
        }
        
        public function setRole($Role) {
            $this->Role = $Role;
        }
        
        public function setRegistrationDate($RegistrationDate) {
            $this->RegistrationDate = $RegistrationDate;
        }
        
        public function setAuthToken($AuthToken) {
            $this->AuthToken = $AuthToken;
        }
        
        public function setAvatar($Avatar) {
            $this->Avatar = $Avatar;
        }
        
        public function getUserID() {
            return $this->UserID;
        }
        
        public function getFullName() {
            return $this->FullName;
        }
        
        public function BirthDate() {
            return $this->BirthDate;
        }
        
        public function getEmail() {
            return $this->Email;
        }
        
        public function getPasswordHash() {
            return $this->PasswordHash;
        }
        
        public function getPhone() {
            return $this->Phone;
        }
        
        public function getAddress() {
            return $this->Address;
        }
        
        public function getRole() {
            return $this->Role;
        }
        
        public function getRegistrationDate() {
            return $this->RegistrationDate;
        }
        
        public function getAuthToken() {
            return $this->AuthToken;
        }
        
        public function getAvatar() {
            return $this->Avatar;
        }

    }
?>