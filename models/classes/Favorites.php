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
    }

?>