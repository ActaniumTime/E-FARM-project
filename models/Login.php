<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../config/databaseConn.php';
$conn = getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    $identifier = trim($_POST['username'] ?? '');
    $password   = $_POST['password'] ?? '';

    if (empty($identifier) || empty($password)) {
        echo json_encode(["success" => false, "message" => "Заповніть всі поля."]);
        exit;
    }

    // Поиск по username или email
    $stmt = $conn->prepare("SELECT id, username, email, password_hash FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $identifier, $identifier);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            echo json_encode(["success" => true, "message" => "Вхід виконано успішно."]);
        } else {
            echo json_encode(["success" => false, "message" => "Невірний пароль."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Користувача не знайдено."]);
    }

    $stmt->close();
    $conn->close();
}
