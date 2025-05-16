<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../config/databaseConn.php';
$conn = getConnection();

$res = $conn->query('SELECT id, name FROM categories ORDER BY name');
$cats = [];
while ($row = $res->fetch_assoc()) {
    $cats[] = $row;
}
echo json_encode($cats);
