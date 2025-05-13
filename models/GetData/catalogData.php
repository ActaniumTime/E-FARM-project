<?php
require_once __DIR__ . '/../../config/databaseConn.php';
$conn = getConnection();
function getCategories($conn) {
    $result = $conn->query("SELECT * FROM categories");
    return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}

function getFarmers($conn) {
    $result = $conn->query("SELECT * FROM farmers");
    return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}

$categories = getCategories($conn);
$farmers = getFarmers($conn);
