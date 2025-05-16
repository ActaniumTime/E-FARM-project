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

// Получить farmer id
$stmt = $conn->prepare('SELECT id FROM farmers WHERE UserID = ? LIMIT 1');
$stmt->bind_param('i', $userId);
$stmt->execute();
$stmt->bind_result($farmerId);
if (!$stmt->fetch()) {
    echo json_encode(['status'=>'error','message'=>'Профіль фермера не знайдено']);
    exit;
}
$stmt->close();

// Обработка полей
$name = $_POST['name'] ?? '';
$location = $_POST['location'] ?? '';
$since = $_POST['since'] ?? null;
$phone = $_POST['phone'] ?? '';
$email = $_POST['email'] ?? '';
$website = $_POST['website'] ?? '';
$description = $_POST['description'] ?? '';
$bio = $_POST['bio'] ?? '';
$imagePath = null;

// Обработка фото
if (!empty($_FILES['image']['name'])) {
    $file = $_FILES['image'];
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = 'farmer_' . $farmerId . '_' . time() . '.' . $ext;
    $target = __DIR__ . '/../../public/img/' . $filename;
    if (move_uploaded_file($file['tmp_name'], $target)) {
        $imagePath = $filename;
    }
}

$query = "UPDATE farmers SET name=?, location=?, since=?, phone=?, email=?, website=?, description=?, bio=?" .
    ($imagePath ? ", image=?" : "") . " WHERE id=?";

$params = [$name, $location, $since, $phone, $email, $website, $description, $bio];
$types = 'ssssssss';
if ($imagePath) {
    $params[] = $imagePath;
    $types .= 's';
}
$params[] = $farmerId;
$types .= 's';

// Подготовка и выполнение
$stmt = $conn->prepare($query);
$stmt->bind_param($types, ...$params);
if ($stmt->execute()) {
    echo json_encode(['status'=>'success','message'=>'Профіль оновлено','image'=>$imagePath]);
} else {
    echo json_encode(['status'=>'error','message'=>'Помилка при збереженні']);
}
