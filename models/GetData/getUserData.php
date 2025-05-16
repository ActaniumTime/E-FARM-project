<?php

    require_once __DIR__ . '/../../config/databaseConn.php';

    function getUserDataByID($id){
        $conn = getConnection();
        $sql = "SELECT * FROM users WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $id);
        if($stmt->execute()){
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc();
                $stmt->close();
                return $data;
            }
        } else {
            $stmt->close();
            return false;
        }

    }

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        if(!isset($_GET['id'])){   
            echo json_encode(['success' => true, 'message' => 'FAIL TO LOAD']);
        }

        $id = $_GET['id'];
        $data = getUserDataByID($id);
        $json = json_encode($data);
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo json_last_error_msg();
        } else {
            echo $json;
        }
    }

?>