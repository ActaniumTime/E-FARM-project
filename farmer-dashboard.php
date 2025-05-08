<?php include './partials/header.php'; ?>

<link rel="stylesheet" href="farmer-dashboard-styles.css">

<div class="dashboard-container">
    <!-- Sidebar -->
    <div class="dashboard-sidebar">
        <div class="farmer-profile-summary">
            <div class="farmer-avatar">
                <img src="https://images.unsplash.com/photo-1500937386664-56d1dfef3854?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Іван Петренко">
            </div>
            <h3 class="farmer-name">Іван Петренко</h3>
            <a href="farmer-profile.php?farmer=ivan-petrenko" class="view-public-profile">
                <svg class="icon icon-sm" viewBox="0 0 24 24">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                    <polyline points="15 3 21 3 21 9"></polyline>
                    <line x1="10" y1="14" x2="21" y2="3"></line>
                </svg>
                <span>Переглянути публічний профіль</span>
            </a>
        </div>     
        <nav class="dashboard-nav">
            <ul>
                <li>
                    <a href="#" class="dashboard-nav-item" data-section="customers">
                        <!-- <svg class="icon" viewBox="0 0 24 24">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg> -->
                        <span onclick="window.location.href='buyer-dashboard.php'">Перейти до клиентського профилю</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="dashboard-content">
        <!-- Overview Section -->
        <div class="dashboard-section active" id="overview-section">
    <div class="section-header">
        <h2>Вітаємо, Іване!</h2>
        <p class="section-description">Ось ваша фермерська панель</p>
    </div>




    <div class="customer-orders">
        <h3>Замовлення від клієнтів</h3>
        <table>
            <thead>
                <tr>
                    <th>Номер</th>
                    <th>Клієнт</th>
                    <th>Дата</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#FFC-12345</td>
                    <td>Марія Коваленко</td>
                    <td>Сьогодні</td>
                    <td>Очікує</td>
                </tr>
                <tr>
                    <td>#FFC-12340</td>
                    <td>Олександр Шевченко</td>
                    <td>Вчора</td>
                    <td>Відправлено</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="loyal-customers">
        <h3>Постійні клієнти</h3>
        <ul>
            <li><strong>Марія Коваленко</strong> — 5 замовлень</li>
            <li><strong>Олександр Шевченко</strong> — 3 замовлення</li>
        </ul>
    </div>

    <div class="add-product-form">
        <h3>Додати новий продукт</h3>
        <form id="new-product-form">
            <label for="product-name">Назва продукту:</label>
            <input type="text" id="product-name" name="product-name" required>

            <label for="product-price">Ціна (₴):</label>
            <input type="number" id="product-price" name="product-price" step="0.01" required>

            <label for="product-description">Опис:</label>
            <textarea id="product-description" name="product-description" rows="3"></textarea>

            <button type="submit">Додати продукт</button>
        </form>
    </div>
</div>


        <!-- Orders Section -->
        <div class="dashboard-section" id="orders-section">
            <div class="section-header">
                <h2>Замовлення</h2>
                <p class="section-description">Управління замовленнями від клієнтів</p>
            </div>

            <div class="orders-filter">
                <select id="order-status-filter">
                    <option value="all">Всі статуси</option>
                    <option value="pending">В обробці</option>
                    <option value="processing">Обробляється</option>
                    <option value="shipped">Відправлено</option>
                    <option value="delivered">Доставлено</option>
                    <option value="cancelled">Скасовано</option>
                </select>
                <select id="order-date-filter">
                    <option value="all">Весь час</option>
                    <option value="today">Сьогодні</option>
                    <option value="week">Цей тиждень</option>
                    <option value="month">Цей місяць</option>
                    <option value="custom">Вибрати період</option>
                </select>
                <div class="date-range-picker" style="display: none;">
                    <input type="date" id="date-from" placeholder="Від">
                    <input type="date" id="date-to" placeholder="До">
                </div>
                <input type="text" placeholder="Пошук за номером замовлення або ім'ям клієнта">
            </div>

            <div class="orders-list">
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>№ замовлення</th>
                            <th>Дата</th>
                            <th>Клієнт</th>
                            <th>Сума</th>
                            <th>Статус</th>
                            <th>Дії</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="order-row" data-order-id="FFC-12345">
                            <td>#FFC-12345</td>
                            <td>01.05.2025</td>
                            <td>Марія Коваленко</td>
                            <td>₴450</td>
                            <td><span class="status-badge status-pending">В обробці</span></td>
                            <td>
                                <button class="btn-view-order view-order-btn" data-order-id="FFC-12345">Деталі</button>
                            </td>
                        </tr>
                        <tr class="order-row" data-order-id="FFC-12344">
                            <td>#FFC-12344</td>
                            <td>30.04.2025</td>
                            <td>Олександр Шевченко</td>
                            <td>₴780</td>
                            <td><span class="status-badge status-processing">Обробляється</span></td>
                            <td>
                                <button class="btn-view-order view-order-btn" data-order-id="FFC-12344">Деталі</button>
                            </td>
                        </tr>
                        <tr class="order-row" data-order-id="FFC-12343">
                            <td>#FFC-12343</td>
                            <td>29.04.2025</td>
                            <td>Ірина Мельник</td>
                            <td>₴320</td>
                            <td><span class="status-badge status-shipped">Відправлено</span></td>
                            <td>
                                <button class="btn-view-order view-order-btn" data-order-id="FFC-12343">Деталі</button>
                            </td>
                        </tr>
                        <tr class="order-row" data-order-id="FFC-12342">
                            <td>#FFC-12342</td>
                            <td>28.04.2025</td>
                            <td>Петро Коваль</td>
                            <td>₴560</td>
                            <td><span class="status-badge status-delivered">Доставлено</span></td>
                            <td>
                                <button class="btn-view-order view-order-btn" data-order-id="FFC-12342">Деталі</button>
                            </td>
                        </tr>
                        <tr class="order-row" data-order-id="FFC-12341">
                            <td>#FFC-12341</td>
                            <td>27.04.2025</td>
                            <td>Наталія Іванова</td>
                            <td>₴290</td>
                            <td><span class="status-badge status-cancelled">Скасовано</span></td>
                            <td>
                                <button class="btn-view-order view-order-btn" data-order-id="FFC-12341">Деталі</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Customers Section -->
        <div class="dashboard-section" id="customers-section">
            <div class="section-header">
                <h2>Постійні клієнти</h2>
                <p class="section-description">Перегляд та управління вашими постійними клієнтами</p>
            </div>

            <div class="customers-search">
                <input type="text" placeholder="Пошук клієнтів за ім'ям або email">
            </div>

            <div class="customers-list">
                <table class="customers-table">
                    <thead>
                        <tr>
                            <th>Клієнт</th>
                            <th>Email</th>
                            <th>Телефон</th>
                            <th>Замовлень</th>
                            <th>Сума покупок</th>
                            <th>Останнє замовлення</th>
                            <th>Дії</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Марія Коваленко</td>
                            <td>maria@example.com</td>
                            <td>+380 98 765 4321</td>
                            <td>12</td>
                            <td>₴5,450</td>
                            <td>01.05.2025</td>
                            <td>
                                <button class="btn-view-customer">Деталі</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Олександр Шевченко</td>
                            <td>oleksandr@example.com</td>
                            <td>+380 97 654 3210</td>
                            <td>8</td>
                            <td>₴3,780</td>
                            <td>30.04.2025</td>
                            <td>
                                <button class="btn-view-customer">Деталі</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Ірина Мельник</td>
                            <td>iryna@example.com</td>
                            <td>+380 96 543 2109</td>
                            <td>5</td>
                            <td>₴1,920</td>
                            <td>29.04.2025</td>
                            <td>
                                <button class="btn-view-customer">Деталі</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Петро Коваль</td>
                            <td>petro@example.com</td>
                            <td>+380 95 432 1098</td>
                            <td>3</td>
                            <td>₴1,560</td>
                            <td>28.04.2025</td>
                            <td>
                                <button class="btn-view-customer">Деталі</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Наталія Іванова</td>
                            <td>natalia@example.com</td>
                            <td>+380 94 321 0987</td>
                            <td>2</td>
                            <td>₴790</td>
                            <td>27.04.2025</td>
                            <td>
                                <button class="btn-view-customer">Деталі</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Products Section -->
        <div class="dashboard-section" id="products-section">
            <div class="section-header">
                <h2>Мої продукти</h2>
                <p class="section-description">Управління вашими продуктами на платформі</p>
            </div>

            <div class="products-actions">
                <div class="products-search">
                    <input type="text" placeholder="Пошук продуктів">
                </div>
                <button class="btn-primary" id="add-product-btn">
                    <svg class="icon icon-sm" viewBox="0 0 24 24">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>Додати новий продукт</span>
                </button>
            </div>

            <div class="products-grid">
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1518977822534-7049a61ee0c2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Помідори органічні">
                        <div class="product-badge active">Активний</div>
                    </div>
                    <div class="product-content">
                        <h3 class="product-title">Помідори органічні</h3>
                        <div class="product-category">Овочі</div>
                        <div class="product-price">₴45 / кг</div>
                        <div class="product-stock">В наявності: 120 кг</div>
                        <div class="product-actions">
                            <button class="btn btn-sm btn-outline edit-product-btn" data-product-id="1">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                <span>Редагувати</span>
                            </button>
                            <button class="btn btn-sm btn-outline delete-product-btn" data-product-id="1">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                                <span>Видалити</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1449300079323-02e209d9d3a6?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Огірки органічні">
                        <div class="product-badge active">Активний</div>
                    </div>
                    <div class="product-content">
                        <h3 class="product-title">Огірки органічні</h3>
                        <div class="product-category">Овочі</div>
                        <div class="product-price">₴35 / кг</div>
                        <div class="product-stock">В наявності: 80 кг</div>
                        <div class="product-actions">
                            <button class="btn btn-sm btn-outline edit-product-btn" data-product-id="2">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                <span>Редагувати</span>
                            </button>
                            <button class="btn btn-sm btn-outline delete-product-btn" data-product-id="2">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                                <span>Видалити</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1567306226416-28f0efdc88ce?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Яблука органічні">
                        <div class="product-badge active">Активний</div>
                    </div>
                    <div class="product-content">
                        <h3 class="product-title">Яблука органічні</h3>
                        <div class="product-category">Фрукти</div>
                        <div class="product-price">₴40 / кг</div>
                        <div class="product-stock">В наявності: 150 кг</div>
                        <div class="product-actions">
                            <button class="btn btn-sm btn-outline edit-product-btn" data-product-id="3">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                <span>Редагувати</span>
                            </button>
                            <button class="btn btn-sm btn-outline delete-product-btn" data-product-id="3">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                                <span>Видалити</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1576673442511-7e39b6545c87?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Сік яблучний натуральний">
                        <div class="product-badge out-of-stock">Немає в наявності</div>
                    </div>
                    <div class="product-content">
                        <h3 class="product-title">Сік яблучний натуральний</h3>
                        <div class="product-category">Напої</div>
                        <div class="product-price">₴65 / л</div>
                        <div class="product-stock">В наявності: 0 л</div>
                        <div class="product-actions">
                            <button class="btn btn-sm btn-outline edit-product-btn" data-product-id="4">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                <span>Редагувати</span>
                            </button>
                            <button class="btn btn-sm btn-outline delete-product-btn" data-product-id="4">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                                <span>Видалити</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Analytics Section -->
        <div class="dashboard-section" id="analytics-section">
            <div class="section-header">
                <h2>Аналітика</h2>
                <p class="section-description">Статистика та аналіз вашої діяльності на платформі</p>
            </div>

            <div class="analytics-filter">
                <select id="analytics-period">
                    <option value="week">Цей тиждень</option>
                    <option value="month" selected>Цей місяць</option>
                    <option value="quarter">Цей квартал</option>
                    <option value="year">Цей рік</option>
                    <option value="custom">Вибрати період</option>
                </select>
                <div class="analytics-date-range" style="display: none;">
                    <input type="date" id="analytics-date-from" placeholder="Від">
                    <input type="date" id="analytics-date-to" placeholder="До">
                </div>
            </div>

            <div class="analytics-grid">
                <div class="analytics-card">
                    <h3>Продажі за категоріями</h3>
                    <div class="chart-placeholder" id="categories-chart"></div>
                </div>
                <div class="analytics-card">
                    <h3>Топ продуктів</h3>
                    <div class="top-products">
                        <div class="top-product">
                            <div class="top-product-info">
                                <div class="top-product-name">Помідори органічні</div>
                                <div class="top-product-sales">₴2,250 (50 кг)</div>
                            </div>
                            <div class="top-product-progress">
                                <div class="progress-bar" style="width: 90%"></div>
                            </div>
                        </div>
                        <div class="top-product">
                            <div class="top-product-info">
                                <div class="top-product-name">Яблука органічні</div>
                                <div class="top-product-sales">₴2,000 (50 кг)</div>
                            </div>
                            <div class="top-product-progress">
                                <div class="progress-bar" style="width: 80%"></div>
                            </div>
                        </div>
                        <div class="top-product">
                            <div class="top-product-info">
                                <div class="top-product-name">Огірки органічні</div>
                                <div class="top-product-sales">₴1,750 (50 кг)</div>
                            </div>
                            <div class="top-product-progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                        </div>
                        <div class="top-product">
                            <div class="top-product-info">
                                <div class="top-product-name">Сік яблучний натуральний</div>
                                <div class="top-product-sales">₴1,300 (20 л)</div>
                            </div>
                            <div class="top-product-progress">
                                <div class="progress-bar" style="width: 52%"></div>
                            </div>
                        </div>
                        <div class="top-product">
                            <div class="top-product-info">
                                <div class="top-product-name">Картопля молода</div>
                                <div class="top-product-sales">₴1,125 (45 кг)</div>
                            </div>
                            <div class="top-product-progress">
                                <div class="progress-bar" style="width: 45%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="analytics-card">
                    <h3>Динаміка продажів</h3>
                    <div class="chart-placeholder" id="sales-trend-chart"></div>
                </div>
                <div class="analytics-card">
                    <h3>Географія замовлень</h3>
                    <div class="chart-placeholder" id="geography-chart"></div>
                </div>
            </div>
        </div>

        <!-- Settings Section -->
        <div class="dashboard-section" id="settings-section">
            <div class="section-header">
                <h2>Налаштування</h2>
                <p class="section-description">Управління налаштуваннями вашого профілю та магазину</p>
            </div>

            <div class="settings-container">
                <div class="settings-sidebar">
                    <ul class="settings-nav">
                        <li><a href="#" class="settings-nav-item active" data-settings="profile">Профіль</a></li>
                        <li><a href="#" class="settings-nav-item" data-settings="store">Магазин</a></li>
                        <li><a href="#" class="settings-nav-item" data-settings="payment">Оплата</a></li>
                        <li><a href="#" class="settings-nav-item" data-settings="shipping">Доставка</a></li>
                        <li><a href="#" class="settings-nav-item" data-settings="notifications">Сповіщення</a></li>
                        <li><a href="#" class="settings-nav-item" data-settings="security">Безпека</a></li>
                    </ul>
                </div>

                <div class="settings-content">
                    <!-- Profile Settings -->
                    <div class="settings-section active" id="profile-settings">
                        <h3>Налаштування профілю</h3>
                        <form class="settings-form">
                            <div class="form-group">
                                <label for="profile-image">Фото профілю</label>
                                <div class="profile-image-upload">
                                    <div class="profile-image-preview">
                                        <img id="profile-preview-image" src="https://images.unsplash.com/photo-1500937386664-56d1dfef3854?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Іван Петренко">
                                    </div>
                                    <div class="profile-image-actions">
                                        <input type="file" id="profile-image" accept="image/*">
                                        <button type="button" class="btn btn-sm btn-outline">Змінити фото</button>
                                        <button type="button" class="btn btn-sm btn-outline">Видалити</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group half">
                                    <label for="first-name">Ім'я</label>
                                    <input type="text" id="first-name" name="first-name" value="Іван">
                                </div>
                                <div class="form-group half">
                                    <label for="last-name">Прізвище</label>
                                    <input type="text" id="last-name" name="last-name" value="Петренко">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="ivan.petrenko@example.com">
                            </div>
                            <div class="form-group">
                                <label for="phone">Телефон</label>
                                <input type="tel" id="phone" name="phone" value="+380 98 765 4321">
                            </div>
                            <div class="form-group">
                                <label for="bio">Про себе</label>
                                <textarea id="bio" name="bio" rows="4">Органічне вирощування овочів та фруктів на родючих землях Херсонщини. Більше 15 років досвіду в органічному землеробстві.</textarea>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Зберегти зміни</button>
                            </div>
                        </form>
                    </div>

                    <!-- Store Settings -->
                    <div class="settings-section" id="store-settings">
                        <h3>Налаштування магазину</h3>
                        <form class="settings-form">
                            <div class="form-group">
                                <label for="store-name">Назва магазину</label>
                                <input type="text" id="store-name" name="store-name" value="Зелений сад">
                            </div>
                            <div class="form-group">
                                <label for="store-description">Опис магазину</label>
                                <textarea id="store-description" name="store-description" rows="4">Органічні овочі та фрукти, вирощені без використання хімічних добрив та пестицидів. Доставка по всій Україні.</textarea>
                            </div>
                            <div class="form-group">
                                <label for="store-location">Місцезнаходження</label>
                                <input type="text" id="store-location" name="store-location" value="Херсонська область, с. Зелений Гай">
                            </div>
                            <div class="form-group">
                                <label for="store-categories">Категорії продуктів</label>
                                <select id="store-categories" name="store-categories" multiple>
                                    <option value="vegetables" selected>Овочі</option>
                                    <option value="fruits" selected>Фрукти</option>
                                    <option value="dairy">Молочні продукти</option>
                                    <option value="meat">М'ясо та птиця</option>
                                    <option value="bakery">Хлібобулочні вироби</option>
                                    <option value="drinks" selected>Напої</option>
                                </select>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Зберегти зміни</button>
                            </div>
                        </form>
                    </div>

                    <!-- Payment Settings -->
                    <div class="settings-section" id="payment-settings">
                        <h3>Налаштування оплати</h3>
                        <form class="settings-form">
                            <div class="form-group">
                                <label for="payment-methods">Способи оплати</label>
                                <div class="checkbox-container">
                                    <input type="checkbox" id="payment-card" name="payment-methods" value="card" checked>
                                    <label for="payment-card">Оплата карткою</label>
                                </div>
                                <div class="checkbox-container">
                                    <input type="checkbox" id="payment-cash" name="payment-methods" value="cash" checked>
                                    <label for="payment-cash">Оплата при отриманні</label>
                                </div>
                                <div class="checkbox-container">
                                    <input type="checkbox" id="payment-bank" name="payment-methods" value="bank">
                                    <label for="payment-bank">Банківський переказ</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bank-account">Банківські реквізити</label>
                                <textarea id="bank-account" name="bank-account" rows="4">ПриватБанк
IBAN: UA123456789012345678901234567
ЄДРПОУ/ІПН: 1234567890</textarea>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Зберегти зміни</button>
                            </div>
                        </form>
                    </div>

                    <!-- Shipping Settings -->
                    <div class="settings-section" id="shipping-settings">
                        <h3>Налаштування доставки</h3>
                        <form class="settings-form">
                            <div class="form-group">
                                <label for="shipping-methods">Способи доставки</label>
                                <div class="checkbox-container">
                                    <input type="checkbox" id="shipping-nova-poshta" name="shipping-methods" value="nova-poshta" checked>
                                    <label for="shipping-nova-poshta">Нова Пошта</label>
                                </div>
                                <div class="checkbox-container">
                                    <input type="checkbox" id="shipping-ukrposhta" name="shipping-methods" value="ukrposhta" checked>
                                    <label for="shipping-ukrposhta">Укрпошта</label>
                                </div>
                                <div class="checkbox-container">
                                    <input type="checkbox" id="shipping-courier" name="shipping-methods" value="courier">
                                    <label for="shipping-courier">Кур'єрська доставка</label>
                                </div>
                                <div class="checkbox-container">
                                    <input type="checkbox" id="shipping-self-pickup" name="shipping-methods" value="self-pickup" checked>
                                    <label for="shipping-self-pickup">Самовивіз</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="free-shipping-threshold">Безкоштовна доставка від суми (грн)</label>
                                <input type="number" id="free-shipping-threshold" name="free-shipping-threshold" value="500">
                            </div>
                            <div class="form-group">
                                <label for="shipping-cost">Вартість доставки (грн)</label>
                                <input type="number" id="shipping-cost" name="shipping-cost" value="50">
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Зберегти зміни</button>
                            </div>
                        </form>
                    </div>

                    <!-- Notifications Settings -->
                    <div class="settings-section" id="notifications-settings">
                        <h3>Налаштування сповіщень</h3>
                        <form class="settings-form">
                            <div class="form-group">
                                <label>Сповіщення електронною поштою</label>
                                <div class="checkbox-container">
                                    <input type="checkbox" id="email-new-order" name="email-notifications" value="new-order" checked>
                                    <label for="email-new-order">Нове замовлення</label>
                                </div>
                                <div class="checkbox-container">
                                    <input type="checkbox" id="email-order-status" name="email-notifications" value="order-status" checked>
                                    <label for="email-order-status">Зміна статусу замовлення</label>
                                </div>
                                <div class="checkbox-container">
                                    <input type="checkbox" id="email-new-review" name="email-notifications" value="new-review" checked>
                                    <label for="email-new-review">Новий відгук</label>
                                </div>
                                <div class="checkbox-container">
                                    <input type="checkbox" id="email-low-stock" name="email-notifications" value="low-stock" checked>
                                    <label for="email-low-stock">Низький рівень запасів</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>SMS сповіщення</label>
                                <div class="checkbox-container">
                                    <input type="checkbox" id="sms-new-order" name="sms-notifications" value="new-order" checked>
                                    <label for="sms-new-order">Нове замовлення</label>
                                </div>
                                <div class="checkbox-container">
                                    <input type="checkbox" id="sms-order-status" name="sms-notifications" value="order-status">
                                    <label for="sms-order-status">Зміна статусу замовлення</label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Зберегти зміни</button>
                            </div>
                        </form>
                    </div>

                    <!-- Security Settings -->
                    <div class="settings-section" id="security-settings">
                        <h3>Налаштування безпеки</h3>
                        <form class="settings-form">
                            <div class="form-group">
                                <label for="current-password">Поточний пароль</label>
                                <input type="password" id="current-password" name="current-password">
                            </div>
                            <div class="form-group">
                                <label for="new-password">Новий пароль</label>
                                <input type="password" id="new-password" name="new-password">
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Підтвердження нового пароля</label>
                                <input type="password" id="confirm-password" name="confirm-password">
                            </div>
                            <div class="form-group">
                                <label>Двофакторна аутентифікація</label>
                                <div class="checkbox-container">
                                    <input type="checkbox" id="two-factor-auth" name="two-factor-auth">
                                    <label for="two-factor-auth">Увімкнути двофакторну аутентифікацію</label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Зберегти зміни</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Order Details Modal -->
<div class="modal" id="order-details-modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Деталі замовлення <span id="modal-order-id">FFC-12345</span></h3>
            <button class="modal-close">
                <svg class="icon" viewBox="0 0 24 24">
                    <path d="M18 6L6 18M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="modal-body">
            <div class="order-details-container">
                <div class="order-info">
                    <h4>Інформація про замовлення</h4>
                    <div class="order-info-grid">
                        <div class="info-row">
                            <span class="info-label">Дата замовлення:</span>
                            <span class="info-value">01.05.2025</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Клієнт:</span>
                            <span class="info-value">Марія Коваленко</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Email:</span>
                            <span class="info-value">maria@example.com</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Телефон:</span>
                            <span class="info-value">+380 98 765 4321</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Адреса доставки:</span>
                            <span class="info-value">м. Київ, вул. Шевченка, 123, кв. 45</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Спосіб доставки:</span>
                            <span class="info-value">Нова Пошта</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Спосіб оплати:</span>
                            <span class="info-value">Оплата карткою</span>
                        </div>
                    </div>
                </div>

                <div class="order-items">
                    <h4>Товари в замовленні</h4>
                    <table class="order-items-table">
                        <thead>
                            <tr>
                                <th>Товар</th>
                                <th>Ціна</th>
                                <th>Кількість</th>
                                <th class="text-right">Сума</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Помідори органічні</td>
                                <td>₴45 / кг</td>
                                <td>5 кг</td>
                                <td class="text-right">₴225</td>
                            </tr>
                            <tr>
                                <td>Огірки органічні</td>
                                <td>₴35 / кг</td>
                                <td>3 кг</td>
                                <td class="text-right">₴105</td>
                            </tr>
                            <tr>
                                <td>Яблука органічні</td>
                                <td>₴40 / кг</td>
                                <td>3 кг</td>
                                <td class="text-right">₴120</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">Сума</td>
                                <td class="text-right">₴450</td>
                            </tr>
                            <tr>
                                <td colspan="3">Доставка</td>
                                <td class="text-right">₴0</td>
                            </tr>
                            <tr>
                                <td colspan="3"><strong>Загальна сума</strong></td>
                                <td class="text-right"><strong>₴450</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="order-status-management">
                    <h4>Управління статусом замовлення</h4>
                    <div class="status-update">
                        <select id="modal-order-status">
                            <option value="pending" selected>В обробці</option>
                            <option value="processing">Обробляється</option>
                            <option value="shipped">Відправлено</option>
                            <option value="delivered">Доставлено</option>
                            <option value="cancelled">Скасовано</option>
                        </select>
                        <button class="btn btn-primary" id="save-order-btn">Зберегти</button>
                        <button class="btn btn-danger" id="cancel-order-btn">Скасувати замовлення</button>
                    </div>
                </div>

                <div class="order-notes">
                    <h4>Примітки до замовлення</h4>
                    <div class="notes-list">
                        <div class="note-item">
                            <div class="note-header">
                                <span class="note-author">Система</span>
                                <span class="note-date">01.05.2025, 10:45</span>
                            </div>
                            <div class="note-content">
                                Замовлення створено
                            </div>
                        </div>
                    </div>
                    <div class="add-note">
                        <textarea id="order-notes" placeholder="Додати примітку до замовлення..."></textarea>
                        <button class="btn btn-primary" id="add-note-btn">Додати</button>
                    </div>
                </div>

                <div class="customer-communication">
                    <h4>Комунікація з клієнтом</h4>
                    <div class="messages-list" id="communication-history">
                        <div class="message customer-message">
                            <div class="message-header">
                                <span class="message-sender">Марія Коваленко</span>
                                <span class="message-time">01.05.2025, 10:50</span>
                            </div>
                            <div class="message-content">
                                Доброго дня! Чи можливо доставити замовлення до 15:00?
                            </div>
                        </div>
                    </div>
                    <div class="send-message">
                        <textarea id="message-text" placeholder="Написати повідомлення клієнту..."></textarea>
                        <button class="btn btn-primary" id="send-message-btn">Надіслати</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Product Modal -->
<div class="modal" id="product-modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="product-modal-title">Додати новий продукт</h3>
            <button class="modal-close">
                <svg class="icon" viewBox="0 0 24 24">
                    <path d="M18 6L6 18M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="modal-body">
            <form id="product-form" class="product-form">
                <div class="form-row">
                    <div class="form-group half">
                        <label for="product-name">Назва продукту*</label>
                        <input type="text" id="product-name" name="product-name" required>
                    </div>
                    <div class="form-group half">
                        <label for="product-category">Категорія*</label>
                        <select id="product-category" name="product-category" required>
                            <option value="">Виберіть категорію</option>
                            <option value="vegetables">Овочі</option>
                            <option value="fruits">Фрукти</option>
                            <option value="dairy">Молочні продукти</option>
                            <option value="meat">М'ясо та птиця</option>
                            <option value="bakery">Хлібобулочні вироби</option>
                            <option value="drinks">Напої</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group half">
                        <label for="product-status">Статус*</label>
                        <select id="product-status" name="product-status" required>
                            <option value="active">Активний</option>
                            <option value="inactive">Неактивний</option>
                            <option value="out-of-stock">Немає в наявності</option>
                        </select>
                    </div>
                    <div class="form-group half">
                        <label for="product-sku">Артикул</label>
                        <input type="text" id="product-sku" name="product-sku">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group half">
                        <label for="product-price">Ціна (грн)*</label>
                        <input type="number" id="product-price" name="product-price" min="0" step="0.01" required>
                    </div>
                    <div class="form-group half">
                        <label for="product-unit">Одиниця виміру*</label>
                        <select id="product-unit" name="product-unit" required>
                            <option value="kg">кг</option>
                            <option value="g">г</option>
                            <option value="l">л</option>
                            <option value="ml">мл</option>
                            <option value="pcs">шт</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group half">
                        <label for="product-stock">Кількість в наявності*</label>
                        <input type="number" id="product-stock" name="product-stock" min="0" required>
                    </div>
                    <div class="form-group half">
                        <label for="product-weight">Вага/об'єм одиниці</label>
                        <input type="text" id="product-weight" name="product-weight">
                    </div>
                </div>
                <div class="form-group">
                    <label for="product-description">Опис продукту*</label>
                    <textarea id="product-description" name="product-description" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label>Зображення продукту*</label>
                    <div class="image-preview" id="image-preview">
                        <img id="preview-image" src="/placeholder.svg" alt="" style="display: none;">
                        <div id="upload-placeholder" class="upload-placeholder">
                            <svg class="icon icon-lg" viewBox="0 0 24 24">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="17 8 12 3 7 8"></polyline>
                                <line x1="12" y1="3" x2="12" y2="15"></line>
                            </svg>
                            <p>Перетягніть зображення сюди або клікніть для вибору</p>
                        </div>
                        <input type="file" id="product-image" accept="image/*" style="display: none;" required>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" id="cancel-product-btn">Скасувати</button>
                    <button type="button" class="btn btn-primary" id="save-product-btn">Зберегти продукт</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="farmer-dashboard.js"></script>

<?php include './partials/footer.php'; ?>
