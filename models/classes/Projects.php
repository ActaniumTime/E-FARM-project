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

        public function loadByInitiatorID($InitiatorID){
            $query = "SELECT * FROM projects WHERE InitiatorID = ? LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $InitiatorID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->ProjectID = $row['ProjectID'];
                $this->InitiatorID = $row['InitiatorID'];
                $this->Title = $row['Title'];
                $this->Description = $row['Description'];
                $this->Media = $row['Media'];
                return true;
            } else {
                return false;
            }
        }

        public function addProject(){
            $query = "INSERT INTO projects (InitiatorID, Title, Description, Media, Participants, CreatedAt, Deadline) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("issssis",
                $this->InitiatorID, 
                $this->Title, 
                $this->Description, 
                $this->Media, 
                $this->Participants,
                $this->CreatedAt,
                $this->Deadline);
                if($stmt->execute()){
                    return true;
                } else {
                    return false;
                }
        }

        public function updateProject(){
            $query = "UPDATE projects SET InitiatorID = ?, Title = ?, Description = ?, Media = ?, Participants = ? WHERE ProjectID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("issssi",
                $this->InitiatorID, 
                $this->Title, 
                $this->Description, 
                $this->Media, 
                $this->Participants,
                $this->ProjectID);
                if($stmt->execute()){
                    return true;
                } else {
                    return false;
                }
        }

        public function deleteProject(){
            $query = "DELETE FROM projects WHERE ProjectID = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("i", $this->ProjectID);
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function setProjectID($ProjectID) {
            $this->ProjectID = $ProjectID;
        }

        public function setInitiatorID($InitiatorID) {
            $this->InitiatorID = $InitiatorID;
        }

        public function setTitle($Title) {
            $this->Title = $Title;
        }

        public function setDescription($Description) {
            $this->Description = $Description;
        }

        public function setMedia($Media) {
            $this->Media = $Media;
        }

        public function setParticipants($Participants) {
            $this->Participants = $Participants;
        }

        public function setCreatedAt($CreatedAt) {
            $this->CreatedAt = $CreatedAt;
        }

        public function setDeadline($Deadline) {
            $this->Deadline = $Deadline;
        }

        public function getProjectID() {
            return $this->ProjectID;
        }

        public function getInitiatorID() {
            return $this->InitiatorID;
        }

        public function getTitle() {
            return $this->Title;
        }

        public function getDescription() {
            return $this->Description;
        }

        public function getMedia() {
            return $this->Media;
        }

        public function getParticipants() {
            return $this->Participants;
        }

        public function getCreatedAt() {
            return $this->CreatedAt;
        }

        public function getDeadline() {
            return $this->Deadline;
        }
    }

?>