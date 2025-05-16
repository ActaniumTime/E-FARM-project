<?php  
    require_once __DIR__ . '/../../config/databaseConn.php';
    $conn = getConnection();

    $stmt = $conn->prepare('SELECT isFarmer FROM users WHERE id = ? LIMIT 1');
    $stmt->bind_param('i', $_SESSION['user_id']);
    $stmt->execute();
    $stmt->bind_result($isFarmer);
    $stmt->fetch();
    $stmt->close();

    if ($isFarmer == 1) {
        echo '<a href="farmer-dashboard.php?id=' . $_SESSION['user_id'] . '" class="dashboard-nav-item" data-section="external">Перейти до кабінету фермера</a>';
    }
?>
