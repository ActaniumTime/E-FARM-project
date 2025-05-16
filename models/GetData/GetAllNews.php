<?php

function getAllNews() {
    $conn = getConnection();
    $sql = "SELECT * FROM news ORDER BY created_at DESC";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $news = [];

        while ($row = $result->fetch_assoc()) {
            // Преобразуем JSON-поля в массивы
            $row['content'] = json_decode($row['content'], true);
            $row['images'] = json_decode($row['images'], true);
            $news[] = $row;
        }

        $stmt->close();
        return $news;
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