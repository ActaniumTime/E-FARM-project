    <?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../config/databaseConn.php';
$conn = getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    $username         = trim($_POST['username'] ?? '');
    $email            = trim($_POST['email'] ?? '');
    $password         = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm-password'] ?? '';
    $termsAccepted    = isset($_POST['terms']);

    // Валидация
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        echo json_encode(["success" => false, "message" => "Будь ласка, заповніть всі поля."]);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["success" => false, "message" => "Некоректний email."]);
        exit;
    }

    if ($password !== $confirm_password) {
        echo json_encode(["success" => false, "message" => "Паролі не співпадають."]);
        exit;
    }

    if (!$termsAccepted) {
        echo json_encode(["success" => false, "message" => "Ви повинні прийняти умови використання."]);
        exit;
    }

        $check = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $check->bind_param("ss", $username, $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo json_encode(["success" => false, "message" => "Ім'я користувача або email вже зайняті."]);
        $check->close();
        exit;
    }
    $check->close();
    // Хешируем пароль
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Готовим SQL-запрос
    $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash, isFarmer, isAdmin) VALUES (?, ?, ?, 0, 0)");
    $stmt->bind_param("sss", $username, $email, $passwordHash);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Реєстрація пройшла успішно."]);
    } else {
        echo json_encode(["success" => false, "message" => "Помилка при реєстрації: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
