<?php

    class Orders{
        private $connection;
        private $OrderID;
        private $BuyerID;
        private $Status;
        private $TotalAmount;
        private $DeliveryAdress;
        private $CreatedAt;
        private $ConfirmedAt;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function Show(){
            echo "OrderID: " . $this->OrderID . "<br>";
            echo "BuyerID: " . $this->BuyerID . "<br>";
            echo "Status: " . $this->Status . "<br>";
            echo "TotalAmount: " . $this->TotalAmount . "<br>";
            echo "DeliveryAdress: " . $this->DeliveryAdress . "<br>";
            echo "CreatedAt: " . $this->CreatedAt . "<br>";
            echo "ConfirmedAt: " . $this->ConfirmedAt . "<br>";
        }

        public function loadByID($OrderID){
            $query = "SELECT * FROM orders WHERE OrderID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $OrderID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->OrderID = $row['OrderID'];
                $this->BuyerID = $row['BuyerID'];
                $this->Status = $row['Status'];
                $this->TotalAmount = $row['TotalAmount'];
                return true;
            } else {
                return false;
            }
        }

        public function loadByBuyerID($BuyerID){
            $query = "SELECT * FROM orders WHERE BuyerID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $BuyerID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->OrderID = $row['OrderID'];
                $this->BuyerID = $row['BuyerID'];
                $this->Status = $row['Status'];
                return true;
            } else {
                return false;
            }
        }

        public function addOrder(){
            $query = "INSERT INTO orders (BuyerID, Status, TotalAmount, DeliveryAdress, CreatedAt, ConfirmedAt) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("issssi",
                $this->BuyerID, 
                $this->Status, 
                $this->TotalAmount, 
                $this->DeliveryAdress,
                $this->CreatedAt,
                $this->ConfirmedAt);
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function updateOrder(){
            $query = "UPDATE orders SET BuyerID = ?, Status = ?, TotalAmount = ?, DeliveryAdress = ? WHERE OrderID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("issii",
                $this->BuyerID, 
                $this->Status, 
                $this->TotalAmount, 
                $this->DeliveryAdress,
                $this->OrderID);
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function deleteOrder(){
            $query = "DELETE FROM orders WHERE OrderID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $this->OrderID);
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function setOrderID($OrderID) {
            $this->OrderID = $OrderID;
        }
        public function setBuyerID($BuyerID) {
            $this->BuyerID = $BuyerID;
        }
        public function setStatus($Status) {
            $this->Status = $Status;
        }
        public function setTotalAmount($TotalAmount) {
            $this->TotalAmount = $TotalAmount;
        }
        public function setDeliveryAdress($DeliveryAdress) {
            $this->DeliveryAdress = $DeliveryAdress;
        }
        public function setCreatedAt($CreatedAt) {
            $this->CreatedAt = $CreatedAt;
        }
        public function setConfirmedAt($ConfirmedAt) {
            $this->ConfirmedAt = $ConfirmedAt;
        }

        public function getOrderID(){
            return $this->OrderID;
        }
        public function getBuyerID(){
            return $this->BuyerID;
        }
        public function getStatus(){
            return $this->Status;
        }
        public function getTotalAmount(){
            return $this->TotalAmount;
        }
        public function getDeliveryAdress(){
            return $this->DeliveryAdress;
        }
        public function getCreatedAt(){
            return $this->CreatedAt;
        }
        public function getConfirmedAt(){
            return $this->ConfirmedAt;
        }

    }

?>