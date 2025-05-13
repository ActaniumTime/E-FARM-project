<?php

require_once __DIR__ . '/../../config/databaseConn.php';

$conn = getConnection();
/**
 * Get all products with their related data from the database
 * 
 * @return array Array of products with all related data
 */
function getProducts() {
    $conn = getConnection();
    $products = [];
    
    $sql = "SELECT p.*, c.name as category_name, f.name as farmer_name 
            FROM products p
            JOIN categories c ON p.category_id = c.id
            JOIN farmers f ON p.farmer_id = f.id
            ORDER BY p.id";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productId = $row['id'];
            
            $product = [
                'id' => (int)$productId,
                'name' => $row['name'],
                'category' => $row['category_name'],
                'categoryId' => $row['category_id'],
                'farmer' => $row['farmer_name'],
                'farmerId' => $row['farmer_id'],
                'price' => (float)$row['price'],
                'oldPrice' => $row['old_price'] ? (float)$row['old_price'] : null,
                'rating' => (float)$row['rating'],
                'ratingCount' => (int)$row['rating_count'],
                'image' => $row['image'],
                'description' => $row['description'],
                'isNew' => (bool)$row['is_new'],
                'isSale' => (bool)$row['is_sale'],
                'inStock' => (bool)$row['in_stock'],
                'weight' => $row['weight'],
                'expiry' => $row['expiry'],
                'images' => [],
                'reviews' => []
            ];
            
            $imgSql = "SELECT image_url FROM product_images WHERE product_id = ?";
            $imgStmt = $conn->prepare($imgSql);
            $imgStmt->bind_param("i", $productId);
            $imgStmt->execute();
            $imgResult = $imgStmt->get_result();
            
            while ($imgRow = $imgResult->fetch_assoc()) {
                $product['images'][] = $imgRow['image_url'];
            }
            
            $reviewSql = "SELECT id, author, date, rating, text FROM reviews WHERE product_id = ?";
            $reviewStmt = $conn->prepare($reviewSql);
            $reviewStmt->bind_param("i", $productId);
            $reviewStmt->execute();
            $reviewResult = $reviewStmt->get_result();
            
            while ($reviewRow = $reviewResult->fetch_assoc()) {
                $product['reviews'][] = [
                    'id' => (int)$reviewRow['id'],
                    'author' => $reviewRow['author'],
                    'date' => $reviewRow['date'],
                    'rating' => (int)$reviewRow['rating'],
                    'text' => $reviewRow['text']
                ];
            }
            
            $products[] = $product;
        }
    }
    
    $conn->close();
    return $products;
}

/**
 * Get a single product by ID with all related data
 * 
 * @param int $id Product ID
 * @return array|null Product data or null if not found
 */
function getProductById($id) {
    $conn = getConnection();
    
    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT p.*, c.name as category_name, f.name as farmer_name 
                           FROM products p
                           JOIN categories c ON p.category_id = c.id
                           JOIN farmers f ON p.farmer_id = f.id
                           WHERE p.id = ?");
    
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        $conn->close();
        return null;
    }
    
    $row = $result->fetch_assoc();
    $productId = $row['id'];
    
    // Initialize product array
    $product = [
        'id' => (int)$productId,
        'name' => $row['name'],
        'category' => $row['category_name'],
        'categoryId' => $row['category_id'],
        'farmer' => $row['farmer_name'],
        'farmerId' => $row['farmer_id'],
        'price' => (float)$row['price'],
        'oldPrice' => $row['old_price'] ? (float)$row['old_price'] : null,
        'rating' => (float)$row['rating'],
        'ratingCount' => (int)$row['rating_count'],
        'image' => $row['image'],
        'description' => $row['description'],
        'isNew' => (bool)$row['is_new'],
        'isSale' => (bool)$row['is_sale'],
        'inStock' => (bool)$row['in_stock'],
        'weight' => $row['weight'],
        'expiry' => $row['expiry'],
        'images' => [],
        'reviews' => []
    ];
    
    // Get product images
    $imgSql = "SELECT image_url FROM product_images WHERE product_id = ?";
    $imgStmt = $conn->prepare($imgSql);
    $imgStmt->bind_param("i", $productId);
    $imgStmt->execute();
    $imgResult = $imgStmt->get_result();
    
    while ($imgRow = $imgResult->fetch_assoc()) {
        $product['images'][] = $imgRow['image_url'];
    }
    
    // Get product reviews
    $reviewSql = "SELECT id, author, date, rating, text FROM reviews WHERE product_id = ?";
    $reviewStmt = $conn->prepare($reviewSql);
    $reviewStmt->bind_param("i", $productId);
    $reviewStmt->execute();
    $reviewResult = $reviewStmt->get_result();
    
    while ($reviewRow = $reviewResult->fetch_assoc()) {
        $product['reviews'][] = [
            'id' => (int)$reviewRow['id'],
            'author' => $reviewRow['author'],
            'date' => $reviewRow['date'],
            'rating' => (int)$reviewRow['rating'],
            'text' => $reviewRow['text']
        ];
    }
    
    $conn->close();
    return $product;
}

/**
 * Get products by category
 * 
 * @param string $categoryId Category ID
 * @return array Array of products in the specified category
 */
function getProductsByCategory($categoryId) {
    $conn = getConnection();
    $products = [];
    
    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT p.*, c.name as category_name, f.name as farmer_name 
                           FROM products p
                           JOIN categories c ON p.category_id = c.id
                           JOIN farmers f ON p.farmer_id = f.id
                           WHERE p.category_id = ?");
    
    $stmt->bind_param("s", $categoryId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productId = $row['id'];
            
            // Initialize product array
            $product = [
                'id' => (int)$productId,
                'name' => $row['name'],
                'category' => $row['category_name'],
                'categoryId' => $row['category_id'],
                'farmer' => $row['farmer_name'],
                'farmerId' => $row['farmer_id'],
                'price' => (float)$row['price'],
                'oldPrice' => $row['old_price'] ? (float)$row['old_price'] : null,
                'rating' => (float)$row['rating'],
                'ratingCount' => (int)$row['rating_count'],
                'image' => $row['image'],
                'description' => $row['description'],
                'isNew' => (bool)$row['is_new'],
                'isSale' => (bool)$row['is_sale'],
                'inStock' => (bool)$row['in_stock'],
                'weight' => $row['weight'],
                'expiry' => $row['expiry'],
                'images' => [],
                'reviews' => []
            ];
            
            $imgSql = "SELECT image_url FROM product_images WHERE product_id = ?";
            $imgStmt = $conn->prepare($imgSql);
            $imgStmt->bind_param("i", $productId);
            $imgStmt->execute();
            $imgResult = $imgStmt->get_result();
            
            while ($imgRow = $imgResult->fetch_assoc()) {
                $product['images'][] = $imgRow['image_url'];
            }
            
            $reviewSql = "SELECT id, author, date, rating, text FROM reviews WHERE product_id = ?";
            $reviewStmt = $conn->prepare($reviewSql);
            $reviewStmt->bind_param("i", $productId);
            $reviewStmt->execute();
            $reviewResult = $reviewStmt->get_result();
            
            while ($reviewRow = $reviewResult->fetch_assoc()) {
                $product['reviews'][] = [
                    'id' => (int)$reviewRow['id'],
                    'author' => $reviewRow['author'],
                    'date' => $reviewRow['date'],
                    'rating' => (int)$reviewRow['rating'],
                    'text' => $reviewRow['text']
                ];
            }
            
            $products[] = $product;
        }
    }
    
    $conn->close();
    return $products;
}

/**
 * Get products by farmer
 * 
 * @param string $farmerId Farmer ID
 * @return array Array of products from the specified farmer
 */
function getProductsByFarmer($farmerId) {
    $conn = getConnection();
    $products = [];
    
    $stmt = $conn->prepare("SELECT p.*, c.name as category_name, f.name as farmer_name 
                           FROM products p
                           JOIN categories c ON p.category_id = c.id
                           JOIN farmers f ON p.farmer_id = f.id
                           WHERE p.farmer_id = ?");
    
    $stmt->bind_param("s", $farmerId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productId = $row['id'];
            
            $product = [
                'id' => (int)$productId,
                'name' => $row['name'],
                'category' => $row['category_name'],
                'categoryId' => $row['category_id'],
                'farmer' => $row['farmer_name'],
                'farmerId' => $row['farmer_id'],
                'price' => (float)$row['price'],
                'oldPrice' => $row['old_price'] ? (float)$row['old_price'] : null,
                'rating' => (float)$row['rating'],
                'ratingCount' => (int)$row['rating_count'],
                'image' => $row['image'],
                'description' => $row['description'],
                'isNew' => (bool)$row['is_new'],
                'isSale' => (bool)$row['is_sale'],
                'inStock' => (bool)$row['in_stock'],
                'weight' => $row['weight'],
                'expiry' => $row['expiry'],
                'images' => [],
                'reviews' => []
            ];
            
            $imgSql = "SELECT image_url FROM product_images WHERE product_id = ?";
            $imgStmt = $conn->prepare($imgSql);
            $imgStmt->bind_param("i", $productId);
            $imgStmt->execute();
            $imgResult = $imgStmt->get_result();
            
            while ($imgRow = $imgResult->fetch_assoc()) {
                $product['images'][] = $imgRow['image_url'];
            }
            
            // Get product reviews
            $reviewSql = "SELECT id, author, date, rating, text FROM reviews WHERE product_id = ?";
            $reviewStmt = $conn->prepare($reviewSql);
            $reviewStmt->bind_param("i", $productId);
            $reviewStmt->execute();
            $reviewResult = $reviewStmt->get_result();
            
            while ($reviewRow = $reviewResult->fetch_assoc()) {
                $product['reviews'][] = [
                    'id' => (int)$reviewRow['id'],
                    'author' => $reviewRow['author'],
                    'date' => $reviewRow['date'],
                    'rating' => (int)$reviewRow['rating'],
                    'text' => $reviewRow['text']
                ];
            }
            
            $products[] = $product;
        }
    }
    
    $conn->close();
    return $products;
}