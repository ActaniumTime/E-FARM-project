<?php

    class News{
        private $connection;
        private $NewsID;
        private $AuthorID;
        private $Title;
        private $Content;
        private $Media;

        private $PublishedAt;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function loadByID($NewsID){
            $query = "SELECT * FROM news WHERE NewsID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $NewsID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->NewsID = $row['NewsID'];
                $this->AuthorID = $row['AuthorID'];
                $this->Title = $row['Title'];
                $this->Content = $row['Content'];
                $this->Media = $row['Media'];
                return true;
            } else {
                return false;
            }
        }

        public function loadByAuthorID($AuthorID){
            $query = "SELECT * FROM news WHERE AuthorID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $AuthorID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->NewsID = $row['NewsID'];
                $this->AuthorID = $row['AuthorID'];
                return true;
            } else {
                return false;
            }
        }

        public function AddNews(){
            $query = "INSERT INTO news (AuthorID, Title, Content, Media) VALUES (?, ?, ?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("isss", 
                $this->AuthorID, 
                $this->Title, 
                $this->Content, 
                $this->Media);
            if($stmt->execute()){
                $this->NewsID = $stmt->insert_id;
                return true;
            } else {
                return false;
            }
        }

        public function UpdateNews(){
            $query = "UPDATE news SET Title = ?, Content = ?, Media = ? WHERE NewsID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("sssi", 
                $this->Title, 
                $this->Content, 
                $this->Media, 
                $this->NewsID);
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function DeleteNews(){
            $query = "DELETE FROM news WHERE NewsID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $this->NewsID);
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function setNewsID($NewsID) {
            $this->NewsID = $NewsID;
        }

        public function setAuthorID($AuthorID) {
            $this->AuthorID = $AuthorID;
        }

        public function setTitle($Title) {
            $this->Title = $Title;
        }

        public function setContent($Content) {
            $this->Content = $Content;
        }

        public function setMedia($Media) {
            $this->Media = $Media;
        }

        public function setPublishedAt($PublishedAt) {
            $this->PublishedAt = $PublishedAt;
        }

        public function getNewsID() {
            return $this->NewsID;
        }

        public function getAuthorID() {
            return $this->AuthorID;
        }

        public function getTitle() {
            return $this->Title;
        }

        public function getContent() {
            return $this->Content;
        }

        public function getMedia() {
            return $this->Media;
        }

        public function getPublishedAt() {
            return $this->PublishedAt;
        }
    }

?>