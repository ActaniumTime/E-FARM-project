<?php

require_once __DIR__ . '/../../config/databaseConn.php';
require_once __DIR__ . '/farmer.php';

header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Метод не дозволено']);
    exit;
}

$title = $_POST['title'] ?? '';
$author_id = $_POST['author_id'] ?? 0;
$contentRaw = $_POST['content'] ?? '[]';
$Subtitle = $_POST['Subtitle'] ?? '';

$content = json_decode($contentRaw, true);
if (!is_array($content)) {
    echo json_encode(['success' => false, 'error' => 'Невірний формат контенту']);
    exit;
}

// Обработка изображений
$images = [];
if (!empty($_FILES['images']['name'][0])) {
    $uploadDir = __DIR__ . '/../../uploads/news/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    foreach ($_FILES['images']['tmp_name'] as $index => $tmpName) {
        $filename = basename($_FILES['images']['name'][$index]);
        $targetPath = $uploadDir . $filename;

        if (move_uploaded_file($tmpName, $targetPath)) {
            $images[] = $filename;
        }
    }
}

// Вставка в БД
$result = createNews($title, $content, (int)$author_id, $images, $Subtitle);
header('Content-Type: application/json');
echo json_encode($result);