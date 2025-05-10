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

        public function loadByUserID($UserID){
            $query = "SELECT * FROM paymentaccounts WHERE UserID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $UserID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->PaymentID = $row['PaymentID'];
                $this->UserID = $row['UserID'];
                $this->Type = $row['Type'];
                return true;
            } else {
                return false;
            }
        }

        public function AddPaymentAccount(){
            $query = "INSERT INTO paymentaccounts (UserID, Type, CardNumber, Iban) VALUES (?, ?, ?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("isss",
                $this->UserID, 
                $this->Type, 
                $this->CardNumber, 
                $this->Iban);
                if($stmt->execute()){
                    return true;
                } else {
                    return false;
                }
        }

        public function UpdatePaymentAccount(){
            $query = "UPDATE paymentaccounts SET UserID = ?, Type = ?, CardNumber = ?, Iban = ? WHERE PaymentID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("isssi",
                $this->UserID, 
                $this->Type, 
                $this->CardNumber, 
                $this->Iban, 
                $this->PaymentID);
                if($stmt->execute()){
                    return true;
                } else {
                    return false;
                }
        }

        public function DeletePaymentAccount(){
            $query = "DELETE FROM paymentaccounts WHERE PaymentID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $this->PaymentID);
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function GetPaymentAccountByUserID($UserID){
            $query = "SELECT * FROM paymentaccounts WHERE UserID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $UserID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        }

        public function setPaymentID($PaymentID) {
            $this->PaymentID = $PaymentID;
        }

        public function setUserID($UserID) {
            $this->UserID = $UserID;
        }

        public function setType($Type) {
            $this->Type = $Type;
        }

        public function setCardNumber($CardNumber) {
            $this->CardNumber = $CardNumber;
        }

        public function setIban($Iban) {
            $this->Iban = $Iban;
        }

        public function getPaymentID() {
            return $this->PaymentID;
        }

        public function getUserID() {
            return $this->UserID;
        }

        public function getType() {
            return $this->Type;
        }

        public function getCardNumber() {
            return $this->CardNumber;
        }

        public function getIban() {
            return $this->Iban;
        }
    }

?>