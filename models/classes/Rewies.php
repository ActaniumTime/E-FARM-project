<?php

    class Rewies{
        private $connection;
        private $RewiesID;
        private $ProductID;
        private $UserID;
        private $Rating;
        private $Comment;
        private $PublishedAt;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function loadByID($RewiesID){
            $query = "SELECT * FROM rewies WHERE RewiesID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $RewiesID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->RewiesID = $row['RewiesID'];
                $this->ProductID = $row['ProductID'];
                $this->UserID = $row['UserID'];
                $this->Rating = $row['Rating'];
                $this->Comment = $row['Comment'];
                return true;
            } else {
                return false;
            }
        }
    }

?>