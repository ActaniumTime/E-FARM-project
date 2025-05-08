<?php

    class FarmProfiles{
        private $connection;
        private $ProfileID;
        private $UserID;
        private $PaymentID;
        private $Summary;
        private $Region;
        private $PhotoPath;
        private $FarmHistory;
        private $FarmerType;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function loadByID($ProfileID){
            $query = "SELECT * FROM farmprofiles WHERE ProfileID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $ProfileID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->ProfileID = $row['ProfileID'];
                $this->UserID = $row['UserID'];
                $this->PaymentID = $row['PaymentID'];
                $this->Summary = $row['Summary'];
                $this->Region = $row['Region'];
                $this->PhotoPath = $row['PhotoPath'];
                return true;
            } else {
                return false;
            }
        }

        public function loadByUserID($UserID){
            $query = "SELECT * FROM farmprofiles WHERE UserID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $UserID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->ProfileID = $row['ProfileID'];
                $this->UserID = $row['UserID'];
                return true;
            } else {
                return false;
            }
        }

        public function loadByPaymentID($PaymentID){
            $query = "SELECT * FROM farmprofiles WHERE PaymentID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $PaymentID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->ProfileID = $row['ProfileID'];
                $this->UserID = $row['UserID'];
                return true;
            } else {
                return false;
            }
        }

        public function loadByRegion($Region){
            $query = "SELECT * FROM farmprofiles WHERE Region = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("s", $Region);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->ProfileID = $row['ProfileID'];
                return true;
            } else {
                return false;
            }
        }

        public function loadByFarmerType($FarmerType){
            $query = "SELECT * FROM farmprofiles WHERE FarmerType = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("s", $FarmerType);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->ProfileID = $row['ProfileID'];
                return true;
            } else {
                return false;
            }
        }

        public function AddFarmProfile(){
            $query = "INSERT INTO farmprofiles (UserID, PaymentID, Summary, Region, PhotoPath, FarmHistory, FarmerType) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("iisssss", 
                $this->UserID, 
                $this->PaymentID, 
                $this->Summary, 
                $this->Region,
                $this->PhotoPath,
                $this->FarmHistory,
                $this->FarmerType);
            if($stmt->execute()){
                $this->ProfileID = $stmt->insert_id;
                return true;
            } else {
                return false;
            }
        }

        public function UpdateFarmProfile(){
            $query = "UPDATE farmprofiles SET UserID = ?, PaymentID = ?, Summary = ?, Region = ?, PhotoPath = ?, FarmHistory = ?, FarmerType = ? WHERE ProfileID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("iisssssi", 
                $this->UserID, 
                $this->PaymentID, 
                $this->Summary, 
                $this->Region,
                $this->PhotoPath,
                $this->FarmHistory,
                $this->FarmerType,
                $this->ProfileID);
            return $stmt->execute();
        }

        public function DeleteFarmProfile(){
            $query = "DELETE FROM farmprofiles WHERE ProfileID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $this->ProfileID);
            return $stmt->execute();
        }

        public function setProfileID($ProfileID) {
            $this->ProfileID = $ProfileID;
        }

        public function setUserID($UserID) {
            $this->UserID = $UserID;
        }

        public function setPaymentID($PaymentID) {
            $this->PaymentID = $PaymentID;
        }

        public function setSummary($Summary) {
            $this->Summary = $Summary;
        }

        public function setRegion($Region) {
            $this->Region = $Region;
        }

        public function setPhotoPath($PhotoPath) {
            $this->PhotoPath = $PhotoPath;
        }

        public function setFarmHistory($FarmHistory) {
            $this->FarmHistory = $FarmHistory;
        }

        public function setFarmerType($FarmerType) {
            $this->FarmerType = $FarmerType;
        }

        public function getProfileID() {
            return $this->ProfileID;
        }

        public function getUserID() {
            return $this->UserID;
        }

        public function getPaymentID() {
            return $this->PaymentID;
        }

        public function getSummary() {
            return $this->Summary;
        }

        public function getRegion() {
            return $this->Region;
        }

        public function getPhotoPath() {
            return $this->PhotoPath;
        }

        public function getFarmHistory() {
            return $this->FarmHistory;
        }

        public function getFarmerType() {
            return $this->FarmerType;
        }
    }

?>