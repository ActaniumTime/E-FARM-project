<?php include './partials/header.php'; ?>

<section class="farmers-hero">
    <div class="container">
        <div class="farmers-hero-content">
            <h1 class="farmers-hero-title">Наші фермери</h1>
            <p class="farmers-hero-subtitle">Познайомтеся з людьми, які вирощують для вас найкращі продукти</p>
        </div>
    </div>
</section>

<section class="farmers-section">
    <div class="container">
        <div class="farmers-filters">
            <div class="farmers-search">
                <div class="search-input-wrapper">
                    <svg class="search-icon" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="text" id="farmers-search-input" placeholder="Пошук фермерів...">
                    <button class="search-clear" id="farmers-search-clear">
                        <svg class="icon" viewBox="0 0 24 24">
                            <path d="M18 6L6 18M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="farmers-filter-container">
                <label for="farmers-filter">Фільтрувати за:</label>
                <select id="farmers-filter" class="farmers-filter">
                    <option value="all">Всі категорії</option>
                    <option value="dairy">Молочні продукти</option>
                    <option value="meat">М'ясо та птиця</option>
                    <option value="vegetables">Овочі та фрукти</option>
                    <option value="honey">Мед та продукти бджільництва</option>
                    <option value="bakery">Хлібобулочні вироби</option>
                </select>
            </div>
        </div>

        <div class="farmers-grid" id="farmers-grid">
            <!-- Farmers will be loaded here via JavaScript -->
        </div>

        <div class="farmers-empty" id="farmers-empty" style="display: none;">
            <svg class="icon icon-lg" viewBox="0 0 24 24">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <h3>Фермерів не знайдено</h3>
            <p>Спробуйте змінити параметри пошуку або фільтри</p>
            <button class="btn btn-primary" id="reset-farmers-search">Скинути пошук</button>
        </div>
    </div>
</section>

<section class="join-farmers-section">
    <div class="container">
        <div class="join-farmers-content">
            <div class="join-farmers-text">
                <h2>Приєднуйтесь до нашої спільноти фермерів</h2>
                <p>Ви фермер і хочете продавати свої продукти на нашій платформі? Ми завжди раді новим партнерам!</p>
                <ul class="join-benefits">
                    <li>
                        <svg class="icon" viewBox="0 0 24 24">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>Прямий доступ до клієнтів</span>
                    </li>
                    <li>
                        <svg class="icon" viewBox="0 0 24 24">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>Справедливі ціни на ваші продукти</span>
                    </li>
                    <li>
                        <svg class="icon" viewBox="0 0 24 24">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>Підтримка у логістиці та маркетингу</span>
                    </li>
                    <li>
                        <svg class="icon" viewBox="0 0 24 24">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>Частина спільноти однодумців</span>
                    </li>
                </ul>
                <a href="#" class="btn btn-primary btn-lg">Стати партнером</a>
            </div>
        </div>
    </div>
</section>
<?php include './partials/footer.php'; ?>
