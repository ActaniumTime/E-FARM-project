<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../config/databaseConn.php';

$method = $_SERVER['REQUEST_METHOD'];
$productId = isset($_GET['product_id']) ? (int)$_GET['product_id'] : 0;

$conn = getConnection();

if (!$productId) {
    http_response_code(400);
    echo json_encode(['error' => 'product_id required']);
    exit;
}

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Authentication required']);
    exit;
}

$userId = (int)$_SESSION['user_id'];

// Получение имени пользователя
$stmtUser = $conn->prepare('SELECT username FROM users WHERE id = ? LIMIT 1');
$stmtUser->bind_param('i', $userId);
$stmtUser->execute();
$resultUser = $stmtUser->get_result();
$user = $resultUser->fetch_assoc();
$stmtUser->close();

if (!$user) {
    http_response_code(403);
    echo json_encode(['error' => 'User not found']);
    exit;
}

$author = $user['username'];

switch ($method) {
    case 'GET':
        $stmt = $conn->prepare('SELECT id, author, date, rating, text 
                                FROM reviews WHERE product_id = ? 
                                ORDER BY date DESC, id DESC');
        $stmt->bind_param('i', $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        $reviews = [];
        while ($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }
        echo json_encode($reviews, JSON_UNESCAPED_UNICODE);
        $stmt->close();
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $rating = (int)($data['rating'] ?? 0);
        $text   = trim($data['text'] ?? '');

        if (!$rating || !$text) {
            http_response_code(422);
            echo json_encode(['error' => 'rating and text required']);
            exit;
        }

        $stmt = $conn->prepare('INSERT INTO reviews (product_id, author, date, rating, text) 
                                VALUES (?, ?, CURDATE(), ?, ?)');
        $stmt->bind_param('isis', $productId, $author, $rating, $text);
        $stmt->execute();

        echo json_encode(['success' => true, 'id' => $stmt->insert_id]);
        $stmt->close();
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method Not Allowed']);
}

$conn->close();
