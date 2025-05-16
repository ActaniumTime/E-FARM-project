<?php
include './partials/header.php';
require_once './models/GetData/farmers_data.php';

$FarmerData = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['id'])) {
        http_response_code(400);
        echo "<h1>Ошибка 400</h1><p>Некорректный запрос: ID фермера не указан.</p>";
        include './partials/footer.php';
        exit;
    }

    // Отримуємо ID як рядок і видаляємо зайві пробіли
    $farmerID = trim($_GET['id']);

    // Перевіряємо, чи ID не порожній після очищення
    if (empty($farmerID)) {
        http_response_code(400);
        echo "<h1>Ошибка 400</h1><p>Некорректный запрос: ID фермера не может быть пустым.</p>";
        include './partials/footer.php';
        exit;
    }

    // Тепер $farmerID це рядок, наприклад "farmer4"
    $FarmerData = getFarmerById($farmerID);

    if (!$FarmerData) {
        http_response_code(404);
        echo "<h1>Ошибка 404</h1><p>Фермер с ID \"" . htmlspecialchars($farmerID) . "\" не найден.</p>";
        include './partials/footer.php';
        exit;
    }
} else {
    http_response_code(405);
    echo "<h1>Ошибка 405</h1><p>Недопустимый метод запроса.</p>";
    include './partials/footer.php';
    exit;
}

// Функция для получения первого изображения из массива или изображения по умолчанию
function getFirstImageOrDefault($images, $default = '/assets/images/default-farmer.jpg') {
    if (!empty($images) && is_array($images) && !empty($images[0])) {
        return $images[0];
    }
    return $default;
}

if ($FarmerData):
    // Получаем основное изображение фермера
    $mainImage = !empty($FarmerData['image']) ? $FarmerData['image'] : getFirstImageOrDefault($FarmerData['images'] ?? []);
?>

<link rel="stylesheet" href="farmer-profile-styles.css">

<div class="dashboard-container">
    <div class="section-header">
        <h2>Профіль фермера</h2>
        <p class="section-description">Детальна інформація про фермера та його продукцію</p>
    </div>

    <div class="farmer-profile">
        <div class="farmer-profile-header">
            <?php if (!empty($FarmerData['images']) && is_array($FarmerData['images']) && !empty($FarmerData['images'][0])): ?>
                <img src="<?= htmlspecialchars($FarmerData['images'][0]) ?>" alt="Фото господарства" class="farmer-profile-header-bg">
            <?php else: ?>
                <div class="farmer-profile-header-bg" style="background-color: #f1f8e9;"></div>
            <?php endif; ?>
            
            <img src="<?= htmlspecialchars($mainImage) ?>" alt="Фото <?= htmlspecialchars($FarmerData['name'] ?? '') ?>" class="farmer-profile-avatar">
        </div>
        
        <div class="farmer-profile-content">
            <h1 class="farmer-profile-name"><?= htmlspecialchars($FarmerData['name'] ?? 'Ім\'я не вказано') ?></h1>
            
            <div class="farmer-profile-location">
                <svg class="icon" viewBox="0 0 24 24">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
                <span><?= htmlspecialchars($FarmerData['location'] ?? 'Локація не вказана') ?></span>
            </div>
            
            <div class="farmer-profile-meta">
                <?php if (!empty($FarmerData['since'])): ?>
                <div class="farmer-profile-meta-item">
                    <svg class="icon" viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <span>Рік початку діяльності: <?= htmlspecialchars($FarmerData['since']) ?></span>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($FarmerData['categories']) && is_array($FarmerData['categories'])): ?>
                <div class="farmer-profile-meta-item">
                    <svg class="icon" viewBox="0 0 24 24">
                        <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <span>Категорій: <?= count($FarmerData['categories']) ?></span>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($FarmerData['products']) && is_array($FarmerData['products'])): ?>
                <div class="farmer-profile-meta-item">
                    <svg class="icon" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span>Продуктів: <?= count($FarmerData['products']) ?></span>
                </div>
                <?php endif; ?>
            </div>
            
            <?php if (!empty($FarmerData['description'])): ?>
            <div class="farmer-profile-description">
                <?= nl2br(htmlspecialchars($FarmerData['description'])) ?>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($FarmerData['bio'])): ?>
            <div class="farmer-profile-bio">
                <h3>Біографія</h3>
                <?= nl2br(htmlspecialchars($FarmerData['bio'])) ?>
            </div>
            <?php endif; ?>
            
            <div class="farmer-profile-contact">
                <?php if (!empty($FarmerData['phone'])): ?>
                <div class="contact-item">
                    <svg class="icon" viewBox="0 0 24 24">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    <span><?= htmlspecialchars($FarmerData['phone']) ?></span>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($FarmerData['email'])): ?>
                <div class="contact-item">
                    <svg class="icon" viewBox="0 0 24 24">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <a href="mailto:<?= htmlspecialchars($FarmerData['email']) ?>"><?= htmlspecialchars($FarmerData['email']) ?></a>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($FarmerData['website'])): ?>
                <div class="contact-item">
                    <svg class="icon" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                    </svg>
                    <a href="<?= htmlspecialchars($FarmerData['website']) ?>" target="_blank"><?= htmlspecialchars($FarmerData['website']) ?></a>
                </div>
                <?php endif; ?>
            </div>
            
            <?php if (!empty($FarmerData['categories']) && is_array($FarmerData['categories'])): ?>
            <div class="farmer-categories">
                <h3 class="section-title">Категорії</h3>
                <div class="categories-list">
                    <?php foreach ($FarmerData['categories'] as $category): ?>
                        <span class="category-tag"><?= htmlspecialchars($category['name'] ?? 'Без назви') ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($FarmerData['images']) && is_array($FarmerData['images']) && count($FarmerData['images']) > 1): ?>
            <div class="farmer-gallery">
                <h3 class="section-title">Галерея</h3>
                <div class="gallery-grid">
                    <?php 
                    // Пропускаем первое изображение, если оно используется как основное
                    $skipFirst = ($FarmerData['images'][0] === $mainImage);
                    $startIndex = $skipFirst ? 1 : 0;
                    
                    for ($i = $startIndex; $i < count($FarmerData['images']); $i++): 
                    ?>
                        <div class="gallery-item">
                            <img src="<?= htmlspecialchars($FarmerData['images'][$i]) ?>" alt="Зображення фермера">
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($FarmerData['products']) && is_array($FarmerData['products'])): ?>
            <div class="farmer-products">
                <h3 class="section-title">Продукти</h3>
                <div class="products-grid">
                    <?php foreach ($FarmerData['products'] as $product): ?>
                        <div class="product-card">
                            <?php if (!empty($product['image'])): ?>
                            <div class="product-image">
                                <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name'] ?? 'Продукт') ?>">
                            </div>
                            <?php endif; ?>
                            <div class="product-content">
                                <h4 class="product-title"><?= htmlspecialchars($product['name'] ?? 'Без назви') ?></h4>
                                <?php if (isset($product['price'])): ?>
                                <div class="product-price"><?= htmlspecialchars($product['price']) ?> грн</div>
                                <?php endif; ?>
                                
                                <?php 
                                // Находим категорию продукта по ID
                                $categoryName = '';
                                if (isset($product['categoryId']) && !empty($FarmerData['categories'])) {
                                    foreach ($FarmerData['categories'] as $category) {
                                        if (isset($category['id']) && $category['id'] == $product['categoryId']) {
                                            $categoryName = $category['name'];
                                            break;
                                        }
                                    }
                                }
                                if (!empty($categoryName)): 
                                ?>
                                <div class="product-category"><?= htmlspecialchars($categoryName) ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<section class="related-farmers-section">
    <div class="container">
        <h2 class="section-title">Інші фермери</h2>
        <div class="related-farmers-grid" id="related-farmers-grid">
            <!-- Здесь можно добавить карточки других фермеров -->
            <div class="related-farmer-card">
                <div class="related-farmer-image">
                    <img src="/assets/images/farmer1.jpg" alt="Фермер">
                </div>
                <div class="related-farmer-content">
                    <h3 class="related-farmer-name">Іван Петренко</h3>
                    <div class="related-farmer-location">
                        <svg class="icon icon-sm" viewBox="0 0 24 24">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span>Київська область</span>
                    </div>
                </div>
            </div>
            
            <div class="related-farmer-card">
                <div class="related-farmer-image">
                    <img src="/assets/images/farmer2.jpg" alt="Фермер">
                </div>
                <div class="related-farmer-content">
                    <h3 class="related-farmer-name">Марія Коваленко</h3>
                    <div class="related-farmer-location">
                        <svg class="icon icon-sm" viewBox="0 0 24 24">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span>Львівська область</span>
                    </div>
                </div>
            </div>
            
            <div class="related-farmer-card">
                <div class="related-farmer-image">
                    <img src="/assets/images/farmer3.jpg" alt="Фермер">
                </div>
                <div class="related-farmer-content">
                    <h3 class="related-farmer-name">Олег Сидоренко</h3>
                    <div class="related-farmer-location">
                        <svg class="icon icon-sm" viewBox="0 0 24 24">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span>Одеська область</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="farmers.php" class="btn btn-primary">Переглянути всіх фермерів</a>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Спробуйте продукти від наших фермерів</h2>
            <p>Натуральні та свіжі продукти від місцевих виробників з доставкою до вашого дому</p>
            <a href="catalog.php" class="btn btn-primary btn-lg">Перейти до каталогу</a>
        </div>
    </div>
</section>

<?php
endif; // Конец проверки if ($FarmerData)
include './partials/footer.php';
?>
