<?php

    class ProductCategories{
        private $connection;   
        private $CategoryID;
        private $CategoryName;
        private $ParentCategoryID;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function loadByID($CategoryID){
            $query = "SELECT * FROM productcategories WHERE CategoryID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $CategoryID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->CategoryID = $row['CategoryID'];
                $this->CategoryName = $row['CategoryName'];
                $this->ParentCategoryID = $row['ParentCategoryID'];
                return true;
            } else {
                return false;
            }
        }

        public function loadByParentID($ParentCategoryID){
            $query = "SELECT * FROM productcategories WHERE ParentCategoryID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $ParentCategoryID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->CategoryID = $row['CategoryID'];
                $this->CategoryName = $row['CategoryName'];
                return true;
            } else {
                return false;
            }
        }

        public function AddCategory(){
            $query = "INSERT INTO productcategories (CategoryName, ParentCategoryID) VALUES (?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("si",
                $this->CategoryName, 
                $this->ParentCategoryID);
                if($stmt->execute()){
                    return true;
                } else {
                    return false;
                }
        }

        public function UpdateCategory(){
            $query = "UPDATE productcategories SET CategoryName = ?, ParentCategoryID = ? WHERE CategoryID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("sii",
                $this->CategoryName, 
                $this->ParentCategoryID, 
                $this->CategoryID);
                if($stmt->execute()){
                    return true;
                } else {
                    return false;
                }
        }

        public function DeleteCategory(){
            $query = "DELETE FROM productcategories WHERE CategoryID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $this->CategoryID);
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function setCategoryID($CategoryID) {
            $this->CategoryID = $CategoryID;
        }

        public function setCategoryName($CategoryName) {
            $this->CategoryName = $CategoryName;
        }

        public function setParentCategoryID($ParentCategoryID) {
            $this->ParentCategoryID = $ParentCategoryID;
        }

        public function getCategoryID() {
            return $this->CategoryID;
        }

        public function getCategoryName() {
            return $this->CategoryName;
        }

        public function getParentCategoryID() {
            return $this->ParentCategoryID;
        }
    }

?>