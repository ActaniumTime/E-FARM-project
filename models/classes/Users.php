<?php
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
        private $RegestationDate;
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
                $this->RegestationDate = $row['RegestationDate'];
                $this->AuthToken = $row['AuthToken'];
                return true;
            } else {
                return false;
            }
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
        
        public function setRegestationDate($RegestationDate) {
            $this->RegestationDate = $RegestationDate;
        }
        
        public function setAuthToken($AuthToken) {
            $this->AuthToken = $AuthToken;
        }
        
        public function setAvatar($Avatar) {
            $this->Avatar = $Avatar;
        }
        
        // ГЕТТЕРЫ
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
        
        public function getRegestationDate() {
            return $this->RegestationDate;
        }
        
        public function getAuthToken() {
            return $this->AuthToken;
        }
        
        public function getAvatar() {
            return $this->Avatar;
        }

    }
?>