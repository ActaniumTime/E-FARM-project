<?php

    class Products{
        private $connection;   
        private $ProductID;
        private $CategoryID;
        private $FarmerID;
        private $Name;
        private $Price;
        private $StockQuantity;
        private $CreatedAt;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function loadByID($ProductID){
            $query = "SELECT * FROM products WHERE ProductID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $ProductID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->ProductID = $row['ProductID'];
                $this->CategoryID = $row['CategoryID'];
                $this->FarmerID = $row['FarmerID'];
                $this->Name = $row['Name'];
                $this->Price = $row['Price'];
                $this->StockQuantity = $row['StockQuantity'];
                return true;
            } else {
                return false;
            }
        }
    }

?>