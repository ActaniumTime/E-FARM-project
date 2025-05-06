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
    }

?>