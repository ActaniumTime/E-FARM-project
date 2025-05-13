<?php
require_once __DIR__ . '/../../config/databaseConn.php';

/**
 * Get all farmers with their related data from the database
 * 
 * @return array Array of farmers with all related data
 */
function getFarmers() {
    $conn = getConnection();
    $farmers = [];
    
    // Get all farmers
    $sql = "SELECT * FROM farmers ORDER BY name";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $farmerId = $row['id'];
            
            // Initialize farmer array
            $farmer = [
                'id' => $farmerId,
                'name' => $row['name'],
                'description' => $row['description'],
                'image' => $row['image'],
                'location' => $row['location'],
                'since' => (int)$row['since'],
                'bio' => $row['bio'],
                'phone' => $row['phone'],
                'email' => $row['email'],
                'website' => $row['website'],
                'rating' => (float)$row['rating'],
                'ratingCount' => (int)$row['rating_count'],
                'categories' => [],
                'images' => [],
                'products' => []
            ];
            
            $catSql = "SELECT c.id, c.name FROM categories c
                      JOIN farmer_categories fc ON c.id = fc.category_id
                      WHERE fc.farmer_id = ?";
            $catStmt = $conn->prepare($catSql);
            $catStmt->bind_param("s", $farmerId);
            $catStmt->execute();
            $catResult = $catStmt->get_result();
            
            while ($catRow = $catResult->fetch_assoc()) {
                $farmer['categories'][] = [
                    'id' => $catRow['id'],
                    'name' => $catRow['name']
                ];
            }
            
            $imgSql = "SELECT image_url FROM farmer_images WHERE farmer_id = ?";
            $imgStmt = $conn->prepare($imgSql);
            $imgStmt->bind_param("s", $farmerId);
            $imgStmt->execute();
            $imgResult = $imgStmt->get_result();
            
            while ($imgRow = $imgResult->fetch_assoc()) {
                $farmer['images'][] = $imgRow['image_url'];
            }
            
            $prodSql = "SELECT id, name, image, price, rating FROM products WHERE farmer_id = ? LIMIT 4";
            $prodStmt = $conn->prepare($prodSql);
            $prodStmt->bind_param("s", $farmerId);
            $prodStmt->execute();
            $prodResult = $prodStmt->get_result();
            
            while ($prodRow = $prodResult->fetch_assoc()) {
                $farmer['products'][] = [
                    'id' => (int)$prodRow['id'],
                    'name' => $prodRow['name'],
                    'image' => $prodRow['image'],
                    'price' => (float)$prodRow['price'],
                    'rating' => (float)$prodRow['rating']
                ];
            }
            
            $farmers[] = $farmer;
        }
    }
    
    $conn->close();
    return $farmers;
}

/**
 * Get a single farmer by ID with all related data
 * 
 * @param string $id Farmer ID
 * @return array|null Farmer data or null if not found
 */
function getFarmerById($id) {
    $conn = getConnection();
    
    $stmt = $conn->prepare("SELECT * FROM farmers WHERE id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        $conn->close();
        return null;
    }
    
    $row = $result->fetch_assoc();
    $farmerId = $row['id'];
    
    $farmer = [
        'id' => $farmerId,
        'name' => $row['name'],
        'description' => $row['description'],
        'image' => $row['image'],
        'location' => $row['location'],
        'since' => (int)$row['since'],
        'bio' => $row['bio'],
        'phone' => $row['phone'],
        'email' => $row['email'],
        'website' => $row['website'],
        'rating' => (float)$row['rating'],
        'ratingCount' => (int)$row['rating_count'],
        'categories' => [],
        'images' => [],
        'products' => []
    ];
    
    $catSql = "SELECT c.id, c.name FROM categories c
              JOIN farmer_categories fc ON c.id = fc.category_id
              WHERE fc.farmer_id = ?";
    $catStmt = $conn->prepare($catSql);
    $catStmt->bind_param("s", $farmerId);
    $catStmt->execute();
    $catResult = $catStmt->get_result();
    
    while ($catRow = $catResult->fetch_assoc()) {
        $farmer['categories'][] = [
            'id' => $catRow['id'],
            'name' => $catRow['name']
        ];
    }
    
    $imgSql = "SELECT image_url FROM farmer_images WHERE farmer_id = ?";
    $imgStmt = $conn->prepare($imgSql);
    $imgStmt->bind_param("s", $farmerId);
    $imgStmt->execute();
    $imgResult = $imgStmt->get_result();
    
    while ($imgRow = $imgResult->fetch_assoc()) {
        $farmer['images'][] = $imgRow['image_url'];
    }
    
    $prodSql = "SELECT id, name, image, price, rating, category_id FROM products WHERE farmer_id = ?";
    $prodStmt = $conn->prepare($prodSql);
    $prodStmt->bind_param("s", $farmerId);
    $prodStmt->execute();
    $prodResult = $prodStmt->get_result();
    
    while ($prodRow = $prodResult->fetch_assoc()) {
        $farmer['products'][] = [
            'id' => (int)$prodRow['id'],
            'name' => $prodRow['name'],
            'image' => $prodRow['image'],
            'price' => (float)$prodRow['price'],
            'rating' => (float)$prodRow['rating'],
            'categoryId' => $prodRow['category_id']
        ];
    }
    
    $conn->close();
    return $farmer;
}

/**
 * Get farmers by category
 * 
 * @param string $categoryId Category ID
 * @return array Array of farmers in the specified category
 */
function getFarmersByCategory($categoryId) {
    $conn = getConnection();
    $farmers = [];
    
    $stmt = $conn->prepare("SELECT f.* FROM farmers f
                           JOIN farmer_categories fc ON f.id = fc.farmer_id
                           WHERE fc.category_id = ?
                           ORDER BY f.name");
    
    $stmt->bind_param("s", $categoryId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $farmerId = $row['id'];
            
            // Initialize farmer array
            $farmer = [
                'id' => $farmerId,
                'name' => $row['name'],
                'description' => $row['description'],
                'image' => $row['image'],
                'location' => $row['location'],
                'since' => (int)$row['since'],
                'bio' => $row['bio'],
                'phone' => $row['phone'],
                'email' => $row['email'],
                'website' => $row['website'],
                'rating' => (float)$row['rating'],
                'ratingCount' => (int)$row['rating_count'],
                'categories' => [],
                'images' => [],
                'products' => []
            ];
            
            $catSql = "SELECT c.id, c.name FROM categories c
                      JOIN farmer_categories fc ON c.id = fc.category_id
                      WHERE fc.farmer_id = ?";
            $catStmt = $conn->prepare($catSql);
            $catStmt->bind_param("s", $farmerId);
            $catStmt->execute();
            $catResult = $catStmt->get_result();
            
            while ($catRow = $catResult->fetch_assoc()) {
                $farmer['categories'][] = [
                    'id' => $catRow['id'],
                    'name' => $catRow['name']
                ];
            }
            
            $imgSql = "SELECT image_url FROM farmer_images WHERE farmer_id = ?";
            $imgStmt = $conn->prepare($imgSql);
            $imgStmt->bind_param("s", $farmerId);
            $imgStmt->execute();
            $imgResult = $imgStmt->get_result();
            
            while ($imgRow = $imgResult->fetch_assoc()) {
                $farmer['images'][] = $imgRow['image_url'];
            }
            
            $prodSql = "SELECT id, name, image, price, rating FROM products WHERE farmer_id = ? LIMIT 4";
            $prodStmt = $conn->prepare($prodSql);
            $prodStmt->bind_param("s", $farmerId);
            $prodStmt->execute();
            $prodResult = $prodStmt->get_result();
            
            while ($prodRow = $prodResult->fetch_assoc()) {
                $farmer['products'][] = [
                    'id' => (int)$prodRow['id'],
                    'name' => $prodRow['name'],
                    'image' => $prodRow['image'],
                    'price' => (float)$prodRow['price'],
                    'rating' => (float)$prodRow['rating']
                ];
            }
            
            $farmers[] = $farmer;
        }
    }
    
    $conn->close();
    return $farmers;
}

/**
 * Search farmers by name or description
 * 
 * @param string $query Search query
 * @return array Array of farmers matching the search query
 */
function searchFarmers($query) {
    $conn = getConnection();
    $farmers = [];
    
    $searchQuery = "%$query%";
    $stmt = $conn->prepare("SELECT * FROM farmers 
                           WHERE name LIKE ? OR description LIKE ? OR location LIKE ?
                           ORDER BY name");
    
    $stmt->bind_param("sss", $searchQuery, $searchQuery, $searchQuery);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $farmerId = $row['id'];
            
            // Initialize farmer array
            $farmer = [
                'id' => $farmerId,
                'name' => $row['name'],
                'description' => $row['description'],
                'image' => $row['image'],
                'location' => $row['location'],
                'since' => (int)$row['since'],
                'bio' => $row['bio'],
                'phone' => $row['phone'],
                'email' => $row['email'],
                'website' => $row['website'],
                'rating' => (float)$row['rating'],
                'ratingCount' => (int)$row['rating_count'],
                'categories' => [],
                'images' => [],
                'products' => []
            ];
            
            // Get farmer categories
            $catSql = "SELECT c.id, c.name FROM categories c
                      JOIN farmer_categories fc ON c.id = fc.category_id
                      WHERE fc.farmer_id = ?";
            $catStmt = $conn->prepare($catSql);
            $catStmt->bind_param("s", $farmerId);
            $catStmt->execute();
            $catResult = $catStmt->get_result();
            
            while ($catRow = $catResult->fetch_assoc()) {
                $farmer['categories'][] = [
                    'id' => $catRow['id'],
                    'name' => $catRow['name']
                ];
            }
            
            // Get farmer images
            $imgSql = "SELECT image_url FROM farmer_images WHERE farmer_id = ?";
            $imgStmt = $conn->prepare($imgSql);
            $imgStmt->bind_param("s", $farmerId);
            $imgStmt->execute();
            $imgResult = $imgStmt->get_result();
            
            while ($imgRow = $imgResult->fetch_assoc()) {
                $farmer['images'][] = $imgRow['image_url'];
            }
            
            // Get farmer products
            $prodSql = "SELECT id, name, image, price, rating FROM products WHERE farmer_id = ? LIMIT 4";
            $prodStmt = $conn->prepare($prodSql);
            $prodStmt->bind_param("s", $farmerId);
            $prodStmt->execute();
            $prodResult = $prodStmt->get_result();
            
            while ($prodRow = $prodResult->fetch_assoc()) {
                $farmer['products'][] = [
                    'id' => (int)$prodRow['id'],
                    'name' => $prodRow['name'],
                    'image' => $prodRow['image'],
                    'price' => (float)$prodRow['price'],
                    'rating' => (float)$prodRow['rating']
                ];
            }
            
            $farmers[] = $farmer;
        }
    }
    
    $conn->close();
    return $farmers;
}

/**
 * Get all available categories
 * 
 * @return array Array of categories
 */
function getCategories() {
    $conn = getConnection();
    $categories = [];
    
    $sql = "SELECT * FROM categories ORDER BY name";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $categories[] = [
                'id' => $row['id'],
                'name' => $row['name']
            ];
        }
    }
    
    $conn->close();
    return $categories;
}