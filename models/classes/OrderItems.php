<?php

    class OrderItems{
        private $connection;
        private $OrderItemID;
        private $OrderID;
        private $ProductID;
        private $Quantity;
        private $PurchasePrice;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function loadByID($OrderID){
            $query = "SELECT * FROM order_items WHERE OrderID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $OrderID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->OrderItemID = $row['OrderItemID'];
                $this->OrderID = $row['OrderID'];
                $this->ProductID = $row['ProductID'];
                $this->Quantity = $row['Quantity'];
                $this->PurchasePrice = $row['PurchasePrice'];
                return true;
            } else {
                return false;
            }
        }

        public function loadByOrderID($OrderID){
            $query = "SELECT * FROM order_items WHERE OrderID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $OrderID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->OrderItemID = $row['OrderItemID'];
                $this->OrderID = $row['OrderID'];
                $this->ProductID = $row['ProductID'];
                return true;
            } else {
                return false;
            }
        }

        public function loadByProductID($ProductID){
            $query = "SELECT * FROM order_items WHERE ProductID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $ProductID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->OrderItemID = $row['OrderItemID'];
                $this->OrderID = $row['OrderID'];
                return true;
            } else {
                return false;
            }
        }

        public function loadByOrderItemID($OrderItemID){
            $query = "SELECT * FROM order_items WHERE OrderItemID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $OrderItemID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->OrderItemID = $row['OrderItemID'];
                return true;
            } else {
                return false;
            }
        }

                public function getOrderItemsByOrderID($OrderID) {
            $query = "SELECT * FROM order_items WHERE OrderID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $OrderID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        }

        public function addOrderItem(){
            $query = "INSERT INTO order_items (OrderID, ProductID, Quantity, PurchasePrice) VALUES (?, ?, ?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("iiid",
                $this->OrderID, 
                $this->ProductID, 
                $this->Quantity, 
                $this->PurchasePrice);
                if($stmt->execute()){
                    return true;
                } else {
                    return false;
                }
        }

        public function updateOrderItem(){
            $query = "UPDATE order_items SET OrderID = ?, ProductID = ?, Quantity = ?, PurchasePrice = ? WHERE OrderItemID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("iiidi",
                $this->OrderID, 
                $this->ProductID, 
                $this->Quantity, 
                $this->PurchasePrice,
                $this->OrderItemID);
                if($stmt->execute()){
                    return true;
                } else {
                    return false;
                }
        }

        public function deleteOrderItem(){
            $query = "DELETE FROM order_items WHERE OrderItemID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $this->OrderItemID);
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function setOrderItemID($OrderItemID) {
            $this->OrderItemID = $OrderItemID;
        }

        public function setOrderID($OrderID) {
            $this->OrderID = $OrderID;
        }

        public function setProductID($ProductID) {
            $this->ProductID = $ProductID;
        }

        public function setQuantity($Quantity) {
            $this->Quantity = $Quantity;
        }

        public function setPurchasePrice($PurchasePrice) {
            $this->PurchasePrice = $PurchasePrice;
        }

        public function getOrderItemID(){
            return $this->OrderItemID;
        }

        public function getOrderID(){
            return $this->OrderID;
        }

        public function getProductID(){
            return $this->ProductID;
        }

        public function getQuantity(){
            return $this->Quantity;
        }

        public function getPurchasePrice(){
            return $this->PurchasePrice;
        }

    }

?>