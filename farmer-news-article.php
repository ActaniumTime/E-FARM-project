<?php
include './partials/header.php';
require_once __DIR__ . '/models/CRUD-oper/farmer.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        echo "<div class='container mt-5'><div class='alert alert-warning'>Новину не знайдено.</div></div>";
        include './partials/footer.php';
        exit;
    }

    $id = (int) $_GET['id'];
    $article = getNewsById($id);

    if (!$article) {
        echo "<div class='container mt-5'><div class='alert alert-warning'>Новину не знайдено.</div></div>";
        include './partials/footer.php';
        exit;
    }
}
?>

<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Головна</a></li>
            <li class="breadcrumb-item"><a href="news.php">Новини</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($article['title']) ?></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8">
            <h1 class="mb-3"><?= htmlspecialchars($article['title']) ?></h1>
            <p class="text-muted">
                <i class="bi bi-calendar-event"></i> <?= htmlspecialchars($article['date']) ?> |
                <i class="bi bi-person"></i> <?= htmlspecialchars($article['author']) ?> |
                <span class="badge bg-success"><?= htmlspecialchars($article['category']) ?></span>
            </p>
            <?php if (!empty($article['images']) && is_array($article['images'])): ?>
                <div class="mb-4">
                    <?php foreach ($article['images'] as $img): ?>
                        <img src="<?= htmlspecialchars($img) ?>" class="img-fluid rounded mb-2" alt="Зображення новини">
                    <?php endforeach; ?>
                </div>
            <?php elseif (!empty($article['image'])): ?>
                <img src="<?= htmlspecialchars($article['image']) ?>" class="img-fluid rounded mb-4" alt="<?= htmlspecialchars($article['title']) ?>">
            <?php endif; ?>

            <div class="article-content">
                <?php
                if (isset($article['content']) && is_array($article['content'])) {
                    foreach ($article['content'] as $block) {
                        echo $block; // Контент уже содержит HTML-теги
                    }
                } else {
                    echo "<p>Контент недоступний.</p>";
                }
                ?>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="bg-light p-3 rounded">
                <h5 class="mb-3">Інші новини</h5>
                <ul class="list-unstyled">
                    <!-- Пример: сюда можно динамически вставить другие статьи -->
                    <li class="mb-2">
                        <a href="news-detail.php?id=2" class="text-decoration-none">Попередня новина</a>
                    </li>
                    <li class="mb-2">
                        <a href="news-detail.php?id=3" class="text-decoration-none">Наступна новина</a>
                    </li>
                    <!-- Подгрузку других новостей можешь реализовать отдельным запросом -->
                </ul>
            </div>
        </div>
    </div>
</div>


<?php include './partials/footer.php'; ?>
