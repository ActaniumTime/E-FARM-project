<?php
require_once __DIR__ . '/../../config/databaseConn.php';
$conn = getConnection();

$sql = "SELECT id, name, slug FROM categories";
$result = $conn->query($sql);

$categories = [];

while ($row = $result->fetch_assoc()) {
    $categories[] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'slug' => $row['slug']
    ];
}

header('Content-Type: application/json');
echo json_encode($categories);
?>
