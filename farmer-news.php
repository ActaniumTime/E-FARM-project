<?php 
include './partials/header.php';
require_once __DIR__ . '/models/CRUD-oper/farmer.php';
 ?>

<link rel="stylesheet" href="farmer-dashboard-styles.css">
<link rel="stylesheet" href="farmer-news-styles.css">

<div class="dashboard-container">
    <!-- Main Content -->
    <div class="dashboard-content">
        <div class="section-header">
            <h2>Новини та оновлення</h2>
            <p class="section-description">Останні новини, події та корисна інформація для фермерів</p>
        </div>

        <div class="news-filter">
            <div class="news-search">
                <input type="text" id="news-search-input" placeholder="Пошук новин...">
                <button class="btn-search">
                    <svg class="icon" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </div>
            <div class="news-categories">
                <select id="news-category-filter">
                    <option value="all">Всі категорії</option>
                    <option value="events">Події</option>
                    <option value="updates">Оновлення</option>
                    <option value="tips">Поради</option>
                    <option value="market">Ринок</option>
                </select>
            </div>
        </div>

        
        <div class="news-grid">
            <?php 
            $newsList = getAllNews();
            if ($newsList && count($newsList) > 0): 
            ?>
                <?php foreach ($newsList as $news): ?>
                    <div class="news-card" data-category="news">
                        <div class="news-image">
                            <img src="<?= htmlspecialchars($news['images'][0]) ?>" alt="<?= htmlspecialchars($news['title']) ?>">
                            <div class="news-category-badge">Новини</div>
                        </div>
                        <div class="news-content">
                            <div class="news-date">
                                <?= date("d F Y", strtotime($news['created_at'])) ?>
                            </div>
                            <h3 class="news-title">
                                <?= htmlspecialchars($news['title']) ?>
                            </h3>
                            <p class="news-excerpt">
                                <?= htmlspecialchars(mb_strimwidth($news['content'][0], 0, 300, '...')) ?>
                            </p>
                            <a href="farmer-news-article.php?id=<?= $news['id'] ?>" class="btn-read-more">Читати далі</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Новини не знайдено.</p>
            <?php endif; ?>
        </div>

        <div class="pagination">
            <button class="pagination-btn" disabled>
                <svg class="icon" viewBox="0 0 24 24">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
                <span>Попередня</span>
            </button>
            <div class="pagination-numbers">
                <a href="#" class="pagination-number active">1</a>
                <a href="#" class="pagination-number">2</a>
                <a href="#" class="pagination-number">3</a>
            </div>
            <button class="pagination-btn">
                <span>Наступна</span>
                <svg class="icon" viewBox="0 0 24 24">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </button>
        </div>
    </div>
</div>

<?php include './partials/footer.php'; ?>
