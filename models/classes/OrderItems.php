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
    }

?>