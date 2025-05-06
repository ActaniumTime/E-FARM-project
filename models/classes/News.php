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
    }

?>