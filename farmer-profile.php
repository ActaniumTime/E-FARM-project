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

    // Опціонально: Якщо ID має мати певний формат (наприклад, "farmer" + число)
    // Можна додати перевірку регулярним виразом.
    // Наприклад, якщо ID завжди "farmer" + одна або більше цифр:
    /*
    if (!preg_match('/^farmer\d+$/', $farmerID)) {
        http_response_code(400);
        echo "<h1>Ошибка 400</h1><p>Некорректный формат ID фермера. Ожидался формат 'farmerX'.</p>";
        include './partials/footer.php';
        exit;
    }
    */

    // Тепер $farmerID це рядок, наприклад "farmer4"
    // ВАЖЛИВО: Функція getFarmerById() повинна бути адаптована для роботи з рядковим ID
    $FarmerData = getFarmerById($farmerID);

    if (!$FarmerData) {
        http_response_code(404);
        echo "<h1>Ошибка 404</h1><p>Фермер с ID \"" . htmlspecialchars($farmerID) . "\" не найден.</p>";
        // Не забувайте підключити футер, якщо він потрібен на сторінці помилки
        include './partials/footer.php';
        exit; // Важливо вийти після відображення помилки
    }
} else {
    http_response_code(405);
    echo "<h1>Ошибка 405</h1><p>Недопустимый метод запроса.</p>";
    // Не забувайте підключити футер
    include './partials/footer.php';
    exit; // Важливо вийти
}

// Решта вашого коду для відображення профілю фермера залишається без змін,
// за умови, що $FarmerData успішно отримано
if ($FarmerData):
?>

<!-- ... ваш HTML для відображення профілю фермера ... -->
<div class="farmer-profile-container" id="farmer-profile-container">
    <h2>Профіль фермера: <?= htmlspecialchars($FarmerData['name'] ?? 'Ім\'я не вказано') ?></h2>
    <div>
        <?php if (!empty($FarmerData['image'])):?>
            <img src="<?= htmlspecialchars($FarmerData['image']) ?>" alt="Фото <?= htmlspecialchars($FarmerData['name'] ?? '') ?>" style="max-width: 300px; margin-bottom: 20px;">
        <?php endif; ?>

        <p><strong>Ім'я:</strong> <?= htmlspecialchars($FarmerData['name'] ?? 'Не вказано') ?></p>
        <p><strong>Опис:</strong> <?= nl2br(htmlspecialchars($FarmerData['description'] ?? 'Немає опису')) ?></p>
        <p><strong>Локація:</strong> <?= htmlspecialchars($FarmerData['location'] ?? 'Не вказано') ?></p>
        <?php if (!empty($FarmerData['since'])): ?>
            <p><strong>Рік початку діяльності:</strong> <?= htmlspecialchars($FarmerData['since']) ?></p>
        <?php endif; ?>
        <?php if (!empty($FarmerData['bio'])): ?>
            <p><strong>Біографія:</strong> <?= nl2br(htmlspecialchars($FarmerData['bio'])) ?></p>
        <?php endif; ?>
        <?php if (!empty($FarmerData['phone'])): ?>
            <p><strong>Телефон:</strong> <?= htmlspecialchars($FarmerData['phone']) ?></p>
        <?php endif; ?>
        <?php if (!empty($FarmerData['email'])): ?>
            <p><strong>Email:</strong> <a href="mailto:<?= htmlspecialchars($FarmerData['email']) ?>"><?= htmlspecialchars($FarmerData['email']) ?></a></p>
        <?php endif; ?>
        <?php if (!empty($FarmerData['website'])): ?>
            <p><strong>Сайт:</strong> <a href="<?= htmlspecialchars($FarmerData['website']) ?>" target="_blank"><?= htmlspecialchars($FarmerData['website']) ?></a></p>
        <?php endif; ?>
        <?php if (isset($FarmerData['rating']) && isset($FarmerData['ratingCount'])): ?>
            <p><strong>Рейтинг:</strong> <?= number_format((float)$FarmerData['rating'], 1) ?> (<?= (int)$FarmerData['ratingCount'] ?> голосів)</p>
        <?php endif; ?>

        <?php if (!empty($FarmerData['categories']) && is_array($FarmerData['categories'])): ?>
            <h3>Категорії:</h3>
            <ul>
                <?php foreach ($FarmerData['categories'] as $category): ?>
                    <li><?= htmlspecialchars($category['name'] ?? 'Без назви') ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <?php if (!empty($FarmerData['images']) && is_array($FarmerData['images'])): ?>
            <h3>Галерея:</h3>
            <div style="display: flex; flex-wrap: wrap; gap: 10px;">
            <?php foreach ($FarmerData['images'] as $img): ?>
                <img src="<?= htmlspecialchars($img) ?>" alt="Зображення фермера" width="150" style="border: 1px solid #ddd; padding: 3px;">
            <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($FarmerData['products']) && is_array($FarmerData['products'])): ?>
            <h3>Продукти:</h3>
            <ul>
                <?php foreach ($FarmerData['products'] as $product): ?>
                    <li>
                        <strong><?= htmlspecialchars($product['name'] ?? 'Без назви') ?></strong><br>
                        <?php if (isset($product['price'])): ?>
                            Ціна: <?= htmlspecialchars($product['price']) ?><br>
                        <?php endif; ?>
                        <?php if (isset($product['rating'])): ?>
                            Рейтинг: <?= htmlspecialchars($product['rating']) ?><br>
                        <?php endif; ?>
                        <?php if (isset($product['categoryId'])): ?>
                            Категорія ID: <?= htmlspecialchars($product['categoryId']) ?><br>
                        <?php endif;  // Обычно ID категории не показывают пользователю ?>
                        <?php if (!empty($product['image'])): ?>
                            <img src="<?= htmlspecialchars($product['image']) ?>" alt="Зображення продукту" width="100" style="margin-top: 5px;">
                        <?php endif; ?>
                    </li>
                    <hr>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>

<section class="related-farmers-section">
    <div class="container">
        <h2 class="section-title">Інші фермери</h2>
        <div class="related-farmers-grid" id="related-farmers-grid">
            <!-- Сюда можно загрузить несколько случайных фермеров, кроме текущего, через JS или PHP -->
            <p>Тут можуть бути інші фермери...</p>
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