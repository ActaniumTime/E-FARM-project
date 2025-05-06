<?php

    class Orders{
        private $connection;
        private $BuyerID;
        private $Status;
        private $TotalAmount;
        private $DeliveryAdress;
        private $CreatedAt;
        private $ConfirmedAt;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function loadByID($OrderID){
            $query = "SELECT * FROM orders WHERE OrderID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $OrderID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->BuyerID = $row['BuyerID'];
                $this->Status = $row['Status'];
                $this->TotalAmount = $row['TotalAmount'];
                $this->DeliveryAdress = $row['DeliveryAdress'];
                return true;
            } else {
                return false;
            }
        }
    }

?>