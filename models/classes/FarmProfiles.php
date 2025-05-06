<?php

    class FarmProfiles{
        private $connection;
        private $ProfileID;
        private $UserID;
        private $PaymentID;
        private $Summary;
        private $Region;
        private $PhotoPath;
        private $FarmHistory;
        private $FarmerType;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function loadByID($ProfileID){
            $query = "SELECT * FROM farmprofiles WHERE ProfileID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $ProfileID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->ProfileID = $row['ProfileID'];
                $this->UserID = $row['UserID'];
                $this->PaymentID = $row['PaymentID'];
                $this->Summary = $row['Summary'];
                $this->Region = $row['Region'];
                $this->PhotoPath = $row['PhotoPath'];
                return true;
            } else {
                return false;
            }
        }
    }

?>