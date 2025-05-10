<?php

    class BuyerProfiles{
        private $connection;
        private $ProfileID;
        private $UserID;
        private $PhotoPath;
        private $DeliveryAddress;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function loadByID($ProfileID){
            $query = "SELECT * FROM buyerprofiles WHERE ProfileID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $ProfileID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->ProfileID = $row['ProfileID'];
                $this->UserID = $row['UserID'];
                $this->DeliveryAddress = $row['DeliveryAddress'];
                return true;
            } else {
                return false;
            }
        }

        public function loadByUserID($UserID){
            $query = "SELECT * FROM buyerprofiles WHERE UserID = ? LIMIT 1";
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

        public function AddBuyerProfile(){
            $query = "INSERT INTO buyerprofiles (UserID, DeliveryAddress, PhotoPath) VALUES (?, ?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("iss", 
                $this->UserID, 
                $this->DeliveryAddress,
                $this->PhotoPath
            );
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function UpdateBuyerProfile(){
            $query = "UPDATE buyerprofiles SET DeliveryAddress = ?, PhotoPath = ? WHERE ProfileID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("ssi", 
                $this->DeliveryAddress,
                $this->PhotoPath,
                $this->ProfileID
            );
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function DeleteBuyerProfile(){
            $query = "DELETE FROM buyerprofiles WHERE ProfileID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $this->ProfileID);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

    public function getProfileByID($id) {
        $stmt = $this->connection->prepare("SELECT * FROM buyerprofiles WHERE ProfileID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function getAllProfiles() {
        $sql = "SELECT * FROM buyerprofiles";
        $result = $this->connection->query($sql);
        $profiles = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $profiles[] = $row;
            }
        }
        return $profiles;
    }


        public function setProfileID($ProfileID){
            $this->ProfileID = $ProfileID;
        }
        public function setUserID($UserID){
            $this->UserID = $UserID;
        }
        public function setPhotoPath($PhotoPath){
            $this->PhotoPath = $PhotoPath;
        }
        public function setDeliveryAddress($DeliveryAddress){
            $this->DeliveryAddress = $DeliveryAddress;
        }

        public function getProfileID(){
            return $this->ProfileID;
        }
        public function getUserID(){
            return $this->UserID;
        }
        public function getPhotoPath(){
            return $this->PhotoPath;
        }
        public function getDeliveryAddress(){
            return $this->DeliveryAddress;
        }

        
    }

?>