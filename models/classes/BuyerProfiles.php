<?php

    class BuyerProfiles{
        private $connection;
        private $ProfileID;
        private $UserID;
        private $PhotoPath;
        private $DeliveryAddress;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function loadByID($ProfileID){
            $query = "SELECT * FROM buyerprofiles WHERE ProfileID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $ProfileID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->ProfileID = $row['ProfileID'];
                $this->UserID = $row['UserID'];
                $this->DeliveryAddress = $row['DeliveryAddress'];
                return true;
            } else {
                return false;
            }
        }
    }

?>