<?php include './partials/header.php'; ?>

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
            <!-- Новина 1 -->
            <div class="news-card" data-category="events">
                <div class="news-image">
                    <img src="https://images.unsplash.com/photo-1523741543316-beb7fc7023d8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Фермерський ярмарок">
                    <div class="news-category-badge">Події</div>
                </div>
                <div class="news-content">
                    <div class="news-date">15 травня 2025</div>
                    <h3 class="news-title">Весняний фермерський ярмарок у Києві</h3>
                    <p class="news-excerpt">
                        Запрошуємо всіх фермерів взяти участь у весняному ярмарку органічної продукції, який відбудеться 25-26 травня на Контрактовій площі в Києві. Це чудова можливість представити свою продукцію, знайти нових клієнтів та обмінятися досвідом з колегами.
                    </p>
                    <a href="farmer-news-article.php?id=1" class="btn-read-more">Читати далі</a>
                </div>
            </div>

            <!-- Новина 2 -->
            <div class="news-card" data-category="updates">
                <div class="news-image">
                    <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Оновлення платформи">
                    <div class="news-category-badge">Оновлення</div>
                </div>
                <div class="news-content">
                    <div class="news-date">10 травня 2025</div>
                    <h3 class="news-title">Нові функції на платформі Farm Fresh</h3>
                    <p class="news-excerpt">
                        Ми раді повідомити про запуск нових функцій на нашій платформі, які допоможуть фермерам ефективніше керувати своїм бізнесом. Тепер ви можете створювати автоматичні звіти про продажі, налаштовувати сповіщення про низький рівень запасів та багато іншого.
                    </p>
                    <a href="farmer-news-article.php?id=2" class="btn-read-more">Читати далі</a>
                </div>
            </div>

            <!-- Новина 3 -->
            <div class="news-card" data-category="tips">
                <div class="news-image">
                    <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Органічне землеробство">
                    <div class="news-category-badge">Поради</div>
                </div>
                <div class="news-content">
                    <div class="news-date">5 травня 2025</div>
                    <h3 class="news-title">5 порад для успішного органічного землеробства</h3>
                    <p class="news-excerpt">
                        Органічне землеробство стає все популярнішим серед споживачів, які дбають про своє здоров'я та навколишнє середовище. У цій статті ми зібрали 5 найважливіших порад, які допоможуть вам досягти успіху в органічному вирощуванні.
                    </p>
                    <a href="farmer-news-article.php?id=3" class="btn-read-more">Читати далі</a>
                </div>
            </div>

            <!-- Новина 4 -->
            <div class="news-card" data-category="market">
                <div class="news-image">
                    <img src="https://images.unsplash.com/photo-1543083477-4f785aeafaa9?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Тренди ринку">
                    <div class="news-category-badge">Ринок</div>
                </div>
                <div class="news-content">
                    <div class="news-date">1 травня 2025</div>
                    <h3 class="news-title">Тренди ринку органічної продукції на 2025 рік</h3>
                    <p class="news-excerpt">
                        Ринок органічної продукції в Україні продовжує зростати. Які продукти будуть найбільш популярними цього року? Які нові тенденції з'являються у споживчих уподобаннях? Дізнайтеся про це в нашому огляді трендів ринку органічної продукції.
                    </p>
                    <a href="farmer-news-article.php?id=4" class="btn-read-more">Читати далі</a>
                </div>
            </div>

            <!-- Новина 5 -->
            <div class="news-card" data-category="events">
                <div class="news-image">
                    <img src="https://images.unsplash.com/photo-1475483768296-6163e08872a1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Конференція">
                    <div class="news-category-badge">Події</div>
                </div>
                <div class="news-content">
                    <div class="news-date">25 квітня 2025</div>
                    <h3 class="news-title">Міжнародна конференція з органічного землеробства</h3>
                    <p class="news-excerpt">
                        15-16 червня у Львові відбудеться міжнародна конференція з органічного землеробства. Провідні експерти з України та Європи поділяться своїм досвідом та знаннями. Не пропустіть можливість дізнатися про найновіші технології та методи.
                    </p>
                    <a href="farmer-news-article.php?id=5" class="btn-read-more">Читати далі</a>
                </div>
            </div>

            <!-- Новина 6 -->
            <div class="news-card" data-category="tips">
                <div class="news-image">
                    <img src="https://images.unsplash.com/photo-1589923188900-85dae523342b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Зберігання продукції">
                    <div class="news-category-badge">Поради</div>
                </div>
                <div class="news-content">
                    <div class="news-date">20 квітня 2025</div>
                    <h3 class="news-title">Як правильно зберігати органічну продукцію</h3>
                    <p class="news-excerpt">
                        Правильне зберігання органічної продукції - ключ до збереження її якості та свіжості. У цій статті ми розповімо про оптимальні умови зберігання різних видів органічних продуктів та поділимося корисними порадами.
                    </p>
                    <a href="farmer-news-article.php?id=6" class="btn-read-more">Читати далі</a>
                </div>
            </div>
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
