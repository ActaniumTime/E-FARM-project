<?php
header('Content-Type: application/json; charset=utf-8');
if (session_status() === PHP_SESSION_NONE) session_start();

require_once __DIR__ . '/../../config/databaseConn.php';

function respondWithError($message, $code = 400) {
    http_response_code($code);
    echo json_encode(['status' => 'error', 'message' => $message]);
    exit;
}

$conn = getConnection();

if (!isset($_SESSION['user_id'])) {
    respondWithError('Авторизуйтесь как фермер', 401);
}
$userId = $_SESSION['user_id'];

$farmerStmt = $conn->prepare('SELECT id FROM farmers WHERE UserID = ? LIMIT 1');
$farmerStmt->bind_param('i', $userId);
$farmerStmt->execute();
$farmerStmt->bind_result($farmerId);
if (!$farmerStmt->fetch()) {
    $farmerStmt->close();
    respondWithError('У вас нет профиля фермера', 403);
}
$farmerStmt->close();

$required = ['product_id', 'name', 'category_id', 'price', 'description', 'weight', 'expiry'];
foreach ($required as $field) {
    if (empty($_POST[$field])) {
        respondWithError("Поле {$field} обязательно", 422);
    }
}

$productId = (int)$_POST['product_id'];
$getImgStmt = $conn->prepare('SELECT image FROM products WHERE id = ? AND farmer_id = ? LIMIT 1');
$getImgStmt->bind_param('is', $productId, $farmerId);
$getImgStmt->execute();
$getImgStmt->bind_result($currentImgUrl);
if (!$getImgStmt->fetch()) {
    $getImgStmt->close();
    respondWithError('Товар не найден', 404);
}
$getImgStmt->close();

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $imgName = uniqid('prod_') . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $imgPath = __DIR__ . '/../../uploads/' . $imgName;
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $imgPath)) {
        respondWithError('Не удалось сохранить главное изображение', 500);
    }
    $imgUrl = 'uploads/' . $imgName;
} else {
    $imgUrl = $currentImgUrl;
}

// Остальные поля
$name        = trim($_POST['name']);
$category_id = trim($_POST['category_id']);
$price       = (float)$_POST['price'];
$old_price   = isset($_POST['old_price']) && $_POST['old_price'] !== '' ? (float)$_POST['old_price'] : null;
$description = trim($_POST['description']);
$is_new      = isset($_POST['is_new']) ? 1 : 0;
$is_sale     = isset($_POST['is_sale']) ? 1 : 0;
$in_stock    = isset($_POST['in_stock']) ? 1 : 0;
$weight      = trim($_POST['weight']);
$expiry      = trim($_POST['expiry']);

// Обновляем товар
$updateStmt = $conn->prepare(
    'UPDATE products SET name=?, category_id=?, price=?, old_price=?, image=?, 
     description=?, is_new=?, is_sale=?, in_stock=?, weight=?, expiry=? 
     WHERE id=? AND farmer_id=?'
);
$updateStmt->bind_param(
    'ssdssssiiissi',
    $name, $category_id, $price, $old_price, $imgUrl,
    $description, $is_new, $is_sale, $in_stock,
    $weight, $expiry, $productId, $farmerId
);

if (!$updateStmt->execute()) {
    respondWithError('Ошибка при обновлении товара: ' . $updateStmt->error, 500);
}
$updateStmt->close();

// Пример: обработка галереи (добавляем новые, если есть)
if (!empty($_FILES['gallery']['name'][0])) {
    $imgStmt = $conn->prepare('INSERT INTO product_images (product_id, image_url) VALUES (?, ?)');
    $imgStmt->bind_param('is', $productId, $urlPlaceholder);

    foreach ($_FILES['gallery']['name'] as $idx => $origName) {
        if ($_FILES['gallery']['error'][$idx] !== UPLOAD_ERR_OK) continue;

        $galleryName = uniqid('prod_gallery_') . '.' . pathinfo($origName, PATHINFO_EXTENSION);
        $galleryPath = __DIR__ . '/../../uploads/' . $galleryName;

        if (!move_uploaded_file($_FILES['gallery']['tmp_name'][$idx], $galleryPath)) continue;

        $urlPlaceholder = 'uploads/' . $galleryName;
        $imgStmt->execute();
    }
    $imgStmt->close();
}

echo json_encode([
    'status' => 'success',
    'message' => 'Товар успешно обновлен',
    'product_id' => $productId
]);
