<?php

    class Projects{
        private $connection;   
        private $ProjectID;
        private $InitiatorID;
        private $Title;
        private $Description;
        private $Media;
        private $Participants;
        private $CreatedAt;
        private $Deadline;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function loadByID($ProjectID){
            $query = "SELECT * FROM projects WHERE ProjectID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $ProjectID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->ProjectID = $row['ProjectID'];
                $this->InitiatorID = $row['InitiatorID'];
                $this->Title = $row['Title'];
                $this->Description = $row['Description'];
                $this->Media = $row['Media'];
                $this->Participants = $row['Participants'];
                return true;
            } else {
                return false;
            }
        }
    }

?>