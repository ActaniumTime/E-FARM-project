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
        private $ProductPic;

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
                $this->ProductPic = $row['ProductPic'];
                return true;
            } else {
                return false;
            }
        }

        public function AddProduct(){
            $query = "INSERT INTO products (CategoryID, FarmerID, Name, Price, StockQuantity, CreatedAt, ProductPic) VALUES (?, ?, ?, ?, ?, ?,? )";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("iississ",
                $this->CategoryID, 
                $this->FarmerID, 
                $this->Name, 
                $this->Price, 
                $this->StockQuantity,
                $this->CreatedAt,
                $this->ProductPic);
                
                if($stmt->execute()){
                    return true;
                } else {
                    return false;
                }
        }

        public function UpdateProduct(){
            $query = "UPDATE products SET CategoryID = ?, FarmerID = ?, Name = ?, Price = ?, StockQuantity = ?, ProductPic = ? WHERE ProductID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("iissiis",
                $this->CategoryID, 
                $this->FarmerID, 
                $this->Name, 
                $this->Price, 
                $this->StockQuantity,
                $this->ProductID,
                $this->ProductPic);
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function DeleteProduct(){
            $query = "DELETE FROM products WHERE ProductID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $this->ProductID);
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function GetAllProducts(){
            $query = "SELECT * FROM products";
            $result = $this->connection->query($query);
            $products = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $products[] = $row;
                }
            }
            return $products;
        }

        public function getProductByCategory($CategoryID){
            $query = "SELECT * FROM products WHERE CategoryID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $CategoryID);
            $stmt->execute();
            $result = $stmt->get_result();
            $products = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $products[] = $row;
                }
            }
            return $products;
        }

        public function setCategoryID($CategoryID) {
            $this->CategoryID = $CategoryID;
        }

        public function setFarmerID($FarmerID) {
            $this->FarmerID = $FarmerID;
        }

        public function setName($Name) {
            $this->Name = $Name;
        }

        public function setPrice($Price) {
            $this->Price = $Price;
        }

        public function setStockQuantity($StockQuantity) {
            $this->StockQuantity = $StockQuantity;
        }

        public function setCreatedAt($CreatedAt) {
            $this->CreatedAt = $CreatedAt;
        }

        public function setProductID($ProductID) {
            $this->ProductID = $ProductID;
        }

        public function setProductPic($ProductPic) {
            $this->ProductPic = $ProductPic;
        }

        public function getCategoryID() {
            return $this->CategoryID;
        }

        public function getFarmerID() {
            return $this->FarmerID;
        }

        public function getName() {
            return $this->Name;
        }

        public function getPrice() {
            return $this->Price;
        }

        public function getStockQuantity() {
            return $this->StockQuantity;
        }

        public function getCreatedAt() {
            return $this->CreatedAt;
        }

        public function getProductID() {
            return $this->ProductID;
        }

        public function getProductPic() {
            return $this->ProductPic;
        }
    }

?>