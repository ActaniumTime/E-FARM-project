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

        public function AddRewiew(){
            $query = "INSERT INTO rewies (ProductID, UserID, Rating, Comment, PublishedAt) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("iiiss",
                $this->ProductID, 
                $this->UserID, 
                $this->Rating, 
                $this->Comment, 
                $this->PublishedAt);
                if($stmt->execute()){
                    return true;
                } else {
                    return false;
                }
        }

        public function UpdateRewiew(){
            $query = "UPDATE rewies SET ProductID = ?, UserID = ?, Rating = ?, Comment = ? WHERE RewiesID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("iiisi",
                $this->ProductID, 
                $this->UserID, 
                $this->Rating, 
                $this->Comment, 
                $this->RewiesID);
                if($stmt->execute()){
                    return true;
                } else {
                    return false;
                }
        }

        public function DeleteRewiew(){
            $query = "DELETE FROM rewies WHERE RewiesID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $this->RewiesID);
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function setRewiesID($RewiesID) {
            $this->RewiesID = $RewiesID;
        }

        public function setProductID($ProductID) {
            $this->ProductID = $ProductID;
        }

        public function setUserID($UserID) {
            $this->UserID = $UserID;
        }

        public function setRating($Rating) {
            $this->Rating = $Rating;
        }

        public function setComment($Comment) {
            $this->Comment = $Comment;
        }

        public function setPublishedAt($PublishedAt) {
            $this->PublishedAt = $PublishedAt;
        }

        public function getRewiesID() {
            return $this->RewiesID;
        }

        public function getProductID() {
            return $this->ProductID;
        }

        public function getUserID() {
            return $this->UserID;
        }

        public function getRating() {
            return $this->Rating;
        }

        public function getComment() {
            return $this->Comment;
        }

        public function getPublishedAt() {
            return $this->PublishedAt;
        }
    }

?>