<?php

    function GerFarmerDataByUserID($id){
        $conn = getConnection();
        $sql = "SELECT isFarmer FROM users WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id); 
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc();
                $temp = $data['isFarmer'];
                $sql2 = "SELECT * FROM farmers WHERE = id?";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->bind_param('i', $temp); 
                if ($stmt2->execute()) {
                    $data = $result->fetch_assoc();
                    $stmt->close();
                    return $data;
                } else {
                    $stmt->close();
                    return null;
                }
            } else{
                $stmt->close();
                return null;
            }
        }
        $stmt->close();
        return null;

    }

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        if(!isset($_GET['id'])){
            echo json_encode(['success' => true, 'message' => 'FAIL TO LOAD']);
        }

        $FarmerID = $_GET['id'];
        $result = GerFarmerDataByUserID($FarmerID);
        $json = json_encode($result);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo json_last_error_msg();
        } else {
            echo $json;
        }
    }

?>