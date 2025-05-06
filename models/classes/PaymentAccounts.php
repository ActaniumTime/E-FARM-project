<?php

    class PaymentAccounts{
        private $connection;
        private $PaymentID;
        private $UserID;
        private $Type;
        private $CardNumber;
        private $Iban;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function loadByID($PaymentID){
            $query = "SELECT * FROM paymentaccounts WHERE PaymentID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $PaymentID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->PaymentID = $row['PaymentID'];
                $this->UserID = $row['UserID'];
                $this->Type = $row['Type'];
                $this->CardNumber = $row['CardNumber'];
                return true;
            } else {
                return false;
            }
        }
    }

?>