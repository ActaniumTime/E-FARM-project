<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../../config/databaseConn.php';
$conn = getConnection();
$sql = "
  SELECT f.id, f.name, f.bio, f.image_url, c.slug AS categoryId
  FROM farmers f
  JOIN categories c ON f.category_id = c.id
";
$res = $conn->query($sql);

$farmers = [];
while ($row = $res->fetch_assoc()) {
    $farmers[] = $row;
}

echo json_encode($farmers, JSON_UNESCAPED_UNICODE);
$conn->close();
