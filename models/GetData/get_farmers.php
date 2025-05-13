<?php
require_once 'farmers_data.php';

// Get query parameters
$category = isset($_GET['category']) ? $_GET['category'] : null;
$search = isset($_GET['search']) ? $_GET['search'] : null;

// Determine which function to call based on parameters
if ($search) {
    $farmers = searchFarmers($search);
} elseif ($category && $category !== 'all') {
    $farmers = getFarmersByCategory($category);
} else {
    $farmers = getFarmers();
}

header('Content-Type: application/json');
echo json_encode($farmers, JSON_UNESCAPED_UNICODE);