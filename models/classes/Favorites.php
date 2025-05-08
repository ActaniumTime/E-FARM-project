<?php

    class Favorites{
        private $connection;
        private $userID;
        private $productID;

        public function __construct($connection)
        {
            $this->connection = $connection;
        }
        
        public function loadByID($userID, $productID){
            $query = "SELECT * FROM favorites WHERE userID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("ii", $userID, $productID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->userID = $row['userID'];
                $this->productID = $row['productID'];
                return true;
            } else {
                return false;
            }
        }

        public function loadByUserID($userID){
            $query = "SELECT * FROM favorites WHERE userID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $userID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->userID = $row['userID'];
                return true;
            } else {
                return false;
            }
        }

        public function loadByProductID($productID){
            $query = "SELECT * FROM favorites WHERE productID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $productID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->productID = $row['productID'];
                return true;
            } else {
                return false;
            }
        }

        public function addToFavorites($userID, $productID){
            $query = "INSERT INTO favorites (userID, productID) VALUES (?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("ii", $userID, $productID);
            return $stmt->execute();
        }

        public function removeFromFavorites($userID, $productID){
            $query = "DELETE FROM favorites WHERE userID = ? AND productID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("ii", $userID, $productID);
            return $stmt->execute();
        }

        public function getFavoritesByUserID($userID) {
            $query = "SELECT * FROM favorites WHERE userID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $userID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        }

        public function setUserID($userID) {
            $this->userID = $userID;
        }

        public function setProductID($productID) {
            $this->productID = $productID;
        }

        public function getUserID() {
            return $this->userID;
        }

        public function getProductID() {
            return $this->productID;
        }
    }

?>