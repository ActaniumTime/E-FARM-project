<?php
include './partials/header.php';
require_once __DIR__ . '/models/CRUD-oper/farmer.php';
require_once __DIR__ . '/models/GetData/user.php';

$isFarmer = getSpecificUserDataByID($_SESSION['user_id'], 'isFarmer');
if(!$isFarmer){
    header('Location: buyer-dashboard.php');
}
?>

<style>
    .accordion {
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        background-color: #fff;
        overflow: hidden;
    }

    .accordion-header {
        padding: 15px 20px;
        background-color: #f8f9fa;
        border-bottom: 1px solid #eee;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: background-color 0.3s;
    }

    .accordion-header:hover {
        background-color: #f1f8e9;
    }

    .accordion-title {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .accordion-title .icon {
        color: #27ae60;
    }

    .accordion-toggle {
        transition: transform 0.3s;
    }

    .accordion-toggle.active {
        transform: rotate(180deg);
    }

    .accordion-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
        padding: 0 20px;
    }

    .accordion-content.active {
        max-height: 2000px;
        padding: 20px;
    }

    @media (max-width: 768px) {
        .accordion-header {
            padding: 12px 15px;
        }

        .accordion-title {
            font-size: 16px;
        }

        .accordion-content.active {
            padding: 15px;
        }
    }
</style>

<div class="dashboard-container">
    <div class="dashboard-sidebar">
        <div class="farmer-profile-summary">
            <div class="farmer-avatar">
                <?php
                $avatarPath = getSpecificUserDataByID($_SESSION['user_id'], 'avatar_path');
                $userName = getSpecificUserDataByID($_SESSION['user_id'], 'username');
                ?>
                <img src="<?php echo './public/img/' . htmlspecialchars($avatarPath); ?>" alt="Іван Петренко">

            </div>
            <h3 class="farmer-name"><?php echo htmlspecialchars($userName) ?></h3>
        </div>
        <nav class="dashboard-nav">
            <ul>
                <li>
                    <a href="#" class="dashboard-nav-item" data-section="customers">
                        <span onclick="window.location.href='buyer-dashboard.php'">Перейти до клиентського
                            профилю</span>
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
                <h2>Вітаємо!    </h2>
                <p class="section-description">Ось ваша фермерська панель</p>
            </div>


            <!-- Farmer Info Accordion -->
<div class="accordion">
    <div class="accordion-header">
        <h3 class="accordion-title">
            <svg class="icon" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M12 14c-4.418 0-8 1.79-8 4v2h16v-2c0-2.21-3.582-4-8-4z"/>
                <circle cx="12" cy="8" r="4"/>
            </svg>
            Інформація про фермера
        </h3>
        <svg class="icon accordion-toggle" viewBox="0 0 24 24">
            <polyline points="6 9 12 15 18 9"></polyline>
        </svg>
    </div>
    <div class="accordion-content">
        <form id="farmer-info-form" enctype="multipart/form-data" style="max-width: 600px;">
            <div class="form-group">
                <label>Головне фото</label><br>
                <img id="farmer-main-photo" src="" alt="Фото фермера" style="max-width:100px;border-radius:50%;margin-bottom:8px;display:none">
                <input type="file" name="image" id="farmer-image-input" accept="image/*">
            </div>
            <div class="form-row">
                <div class="form-group half">
                    <label for="farmer-name">Ім'я</label>
                    <input type="text" id="farmer-name" name="name" required>
                </div>
                <div class="form-group half">
                    <label for="farmer-location">Локація</label>
                    <input type="text" id="farmer-location" name="location">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group half">
                    <label for="farmer-since">З фермером з</label>
                    <input type="number" min="1900" max="2100" id="farmer-since" name="since" placeholder="2020">
                </div>
                <div class="form-group half">
                    <label for="farmer-phone">Телефон</label>
                    <input type="text" id="farmer-phone" name="phone">
                </div>
            </div>
            <div class="form-group">
                <label for="farmer-email">Email</label>
                <input type="email" id="farmer-email" name="email">
            </div>
            <div class="form-group">
                <label for="farmer-website">Веб-сайт</label>
                <input type="text" id="farmer-website" name="website" placeholder="https://">
            </div>
            <div class="form-group">
                <label for="farmer-description">Короткий опис</label>
                <textarea id="farmer-description" name="description" rows="2"></textarea>
            </div>
            <div class="form-group">
                <label for="farmer-bio">Про себе</label>
                <textarea id="farmer-bio" name="bio" rows="3"></textarea>
            </div>
            <div class="form-actions">
                <button type="button" class="btn btn-primary" onclick="updateFarmerProfile()">Зберегти</button>
            </div>
            <div id="farmer-info-response" style="margin-top:8px;"></div>
        </form>
    </div>
</div>
            <!-- Orders Accordion -->
            <div class="accordion">
                <div class="accordion-header">
                    <h3 class="accordion-title">
                        <svg class="icon" viewBox="0 0 24 24">
                            <path d="M22 12h-6l-2 3h-4l-2-3H2"></path>
                            <path
                                d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z">
                            </path>
                        </svg>
                        Замовлення від клієнтів
                    </h3>
                    <svg class="icon accordion-toggle" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </div>

                <?php
                $tempArrOrders = getAllFarmerOrdersByFarmerID($_SESSION['user_id']);


                ?>

                <div class="accordion-content">
                    <div class="customer-orders">
                        <table>
                            <thead>
                                <tr>
                                    <th>Номер</th>
                                    <th>Дата створення</th>
                                    <th>Підтверджено</th>
                                    <th>Статус</th>
                                    <th>Сума</th>
                                    <th>Адреса доставки</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($tempArrOrders)): ?>
                                    <?php foreach ($tempArrOrders as $order): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($order['BuyerID']) ?></td>
                                            <td><?= htmlspecialchars(date('d.m.Y H:i', strtotime($order['CreatedAt']))) ?></td>
                                            <td>
                                                <?= $order['ConfirmedAt'] ? htmlspecialchars(date('d.m.Y H:i', strtotime($order['ConfirmedAt']))) : 'Не підтверджено' ?>
                                            </td>
                                            <td><?= htmlspecialchars($order['Status']) ?></td>
                                            <td><?= number_format($order['TotalAmount'], 2, '.', ' ') ?> грн</td>
                                            <td><?= nl2br(htmlspecialchars($order['DeliveryAddress'])) ?></td>
                                            <td><a href="orderInfo.php?id=<?= urlencode($order['OrderID']) ?>"
                                                    class="view-button">Переглянути</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7">Немає замовлень.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Loyal Customers Accordion -->
            <!-- <div class="accordion">
                <div class="accordion-header">
                    <h3 class="accordion-title">
                        <svg class="icon" viewBox="0 0 24 24">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        Постійні клієнти
                    </h3>
                    <svg class="icon accordion-toggle" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </div>
                <div class="accordion-content">
                    <div class="loyal-customers">
                        <ul>
                            <li><strong>Марія Коваленко</strong> — 5 замовлень</li>
                            <li><strong>Олександр Шевченко</strong> — 3 замовлення</li>
                        </ul>
                    </div>
                </div>
            </div> -->



            <!-- Add Product Accordion -->
            <div class="accordion">
                <div class="accordion-header">
                    <h3 class="accordion-title">
                        <svg class="icon" viewBox="0 0 24 24">
                            <path d="M22 12h-6l-2 3h-4l-2-3H2"></path>
                            <path
                                d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z">
                            </path>
                        </svg>
                        Додати новий продукт
                    </h3>
                    <svg class="icon accordion-toggle" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </div>

                <div class="accordion-content">
                    <h2>Добавить новый товар</h2>

                    <form id="productForm" class="product-form" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group half">
                                <label for="name">Назва продукту*</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group half">
                                <label for="categorySelect">Категорія*</label>
                                <select id="categorySelect" name="category_id" required></select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group half">
                                <label for="price">Ціна (грн)*</label>
                                <input type="number" id="price" name="price" step="0.01" required>
                            </div>
                            <div class="form-group half">
                                <label for="old_price">Стара ціна (за наявності знижки)</label>
                                <input type="number" id="old_price" name="old_price" step="0.01">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group half">
                                <label for="weight">Вага / об'єм*</label>
                                <input type="text" id="weight" name="weight" placeholder="наприклад 1 кг" required>
                            </div>
                            <div class="form-group half">
                                <label for="expiry">Строк придатності*</label>
                                <input type="text" id="expiry" name="expiry" placeholder="14 днів" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Опис продукту*</label>
                            <textarea id="description" name="description" rows="4" required></textarea>
                        </div>

                        <div class="form-group">
                            <label><input type="checkbox" name="is_new"> Новинка</label>
                            <label><input type="checkbox" name="is_sale"> Знижка</label>
                            <label><input type="checkbox" name="in_stock" checked> В наявності</label>
                        </div>

                        <div class="form-group">
                            <label>Головне зображення*</label>
                            <input type="file" name="image" accept="image/*" required>
                        </div>

                        <div class="form-group">
                            <label>Галерея (можна декілька)</label>
                            <input type="file" name="gallery[]" accept="image/*" multiple>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn btn-secondary" id="cancel-product-btn">Скасувати</button>
                            <button type="button" class="btn btn-primary" onclick="submitProduct()">Додати
                                продукт</button>
                        </div>
                    </form>

                    <div id="productResponse"></div>

                    <div id="productResponse" style="margin-top: 10px; color: green;"></div>
                </div>
            </div>
        </div>

        <script>
            function submitProduct() {
                const form = document.getElementById('productForm');
                const formData = new FormData(form);

                fetch('/models/CRUD-oper/addProduct.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(res => res.json())
                    .then(res => {
                        document.getElementById('productResponse').textContent = res.message;
                    })
                    .catch(err => {
                        console.error(err);
                        document.getElementById('productResponse').textContent = 'Помилка під час відправки форми';
                    });
            }
        </script>

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
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const accordionHeaders = document.querySelectorAll(".accordion-header")

        accordionHeaders.forEach((header) => {
            header.addEventListener("click", function () {
                const toggle = this.querySelector(".accordion-toggle")
                toggle.classList.toggle("active")

                const content = this.nextElementSibling
                content.classList.toggle("active")

                if (content.classList.contains("active")) {
                    content.style.maxHeight = content.scrollHeight + "px"
                } else {
                    content.style.maxHeight = "0"
                }
            })
        })

        if (accordionHeaders.length > 0) {
            const firstToggle = accordionHeaders[0].querySelector(".accordion-toggle")
            const firstContent = accordionHeaders[0].nextElementSibling

            firstToggle.classList.add("active")
            firstContent.classList.add("active")
            firstContent.style.maxHeight = firstContent.scrollHeight + "px"
        }
    })

</script>

<script>
    fetch('models/GetData/getCategories.php')
        .then(r => r.json())
        .then(list => {
            const sel = document.getElementById('categorySelect');
            list.forEach(c => {
                const opt = document.createElement('option');
                opt.value = c.id;
                opt.textContent = c.name;
                sel.appendChild(opt);
            });
        });

    function submitProduct() {
        const form = document.getElementById('productForm');
        const data = new FormData(form);

        fetch('models/CRUD-oper/addProduct.php', {
            method: 'POST',
            body: data
        })
            .then(r => r.json())
            .then(r => {
                document.getElementById('productResponse').textContent = r.message;
                if (r.status === 'success') form.reset();
            })
            .catch(err => {
                console.error(err);
                document.getElementById('productResponse').textContent = 'Помилка під час відправки форми';
            });
    }

    
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    fetch('models/GetData/getFarmerProfile.php')
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                const f = data.farmer;
                document.getElementById('farmer-main-photo').src = f.image ? './public/img/' + f.image : './public/img/default-avatar.png';
                document.getElementById('farmer-name').value = f.name || '';
                document.getElementById('farmer-location').value = f.location || '';
                document.getElementById('farmer-since').value = f.since || '';
                document.getElementById('farmer-phone').value = f.phone || '';
                document.getElementById('farmer-email').value = f.email || '';
                document.getElementById('farmer-website').value = f.website || '';
                document.getElementById('farmer-description').value = f.description || '';
                document.getElementById('farmer-bio').value = f.bio || '';
            }
        });
});

function updateFarmerProfile() {
    const form = document.getElementById('farmer-info-form');
    const data = new FormData(form);

    fetch('models/CRUD-oper/updateFarmerProfile.php', {
        method: 'POST',
        body: data
    })
    .then(res => res.json())
    .then(res => {
        document.getElementById('farmer-info-response').textContent = res.message;
        if(res.status === 'success' && res.image){
            document.getElementById('farmer-main-photo').src = './public/img/' + res.image + '?' + Date.now();
        }
    })
    .catch(err => {
        document.getElementById('farmer-info-response').textContent = 'Помилка оновлення даних';
    });
}
</script>


<?php include './partials/footer.php'; ?>