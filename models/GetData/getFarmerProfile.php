<?php
session_start();
require_once __DIR__ . '/../../config/databaseConn.php';
header('Content-Type: application/json; charset=utf-8');
$conn = getConnection();

$userId = $_SESSION['user_id'] ?? null;
if (!$userId) {
    echo json_encode(['status'=>'error','message'=>'Авторизуйтесь']);
    exit;
}

$stmt = $conn->prepare('SELECT * FROM farmers WHERE UserID = ? LIMIT 1');
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();
if ($farmer = $result->fetch_assoc()) {
    echo json_encode(['status'=>'success', 'farmer'=>$farmer]);
} else {
    echo json_encode(['status'=>'error', 'message'=>'Профіль не знайдено']);
}
