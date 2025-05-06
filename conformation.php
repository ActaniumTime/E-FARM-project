<?php include './partials/header.php'; ?>

<section class="confirmation-section">
    <div class="container">
        <div class="cart-header">
            <h1 class="cart-title">Замовлення підтверджено</h1>
            <div class="cart-steps">
                <div class="cart-step completed">
                    <div class="step-number">
                        <svg class="icon" viewBox="0 0 24 24">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <div class="step-text">Кошик</div>
                </div>
                <div class="step-divider completed"></div>
                <div class="cart-step completed">
                    <div class="step-number">
                        <svg class="icon" viewBox="0 0 24 24">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <div class="step-text">Оформлення</div>
                </div>
                <div class="step-divider completed"></div>
                <div class="cart-step completed">
                    <div class="step-number">
                        <svg class="icon" viewBox="0 0 24 24">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <div class="step-text">Підтверджено</div>
                </div>
            </div>
        </div>

        <div class="confirmation-content">
            <div class="confirmation-message">
                <div class="confirmation-icon">
                    <svg class="icon icon-lg" viewBox="0 0 24 24">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                </div>
                <h2>Дякуємо за ваше замовлення!</h2>
                <p>Ваше замовлення успішно оформлено. Номер вашого замовлення: <strong id="order-number">FFC-12345</strong></p>
            </div>

            <div class="order-details">
                <h3>Деталі замовлення</h3>
                
                <div class="order-info">
                    <div class="order-info-section">
                        <h4>Інформація про замовлення</h4>
                        <div class="info-row">
                            <span>Дата:</span>
                            <span id="order-date">01.05.2025</span>
                        </div>
                        <div class="info-row">
                            <span>Статус:</span>
                            <span class="order-status">Оплачено</span>
                        </div>
                        <div class="info-row">
                            <span>Спосіб оплати:</span>
                            <span id="order-payment-method">Оплата карткою</span>
                        </div>
                        <div class="info-row">
                            <span>Спосіб доставки:</span>
                            <span id="order-delivery-method">Нова Пошта</span>
                        </div>
                    </div>

                    <div class="order-info-section">
                        <h4>Адреса доставки</h4>
                        <div id="order-address">
                            <p>Іван Петренко</p>
                            <p>вул. Шевченка, 123, кв. 45</p>
                            <p>м. Київ, 01001</p>
                            <p>Україна</p>
                            <p>Телефон: +380 98 765 4321</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="confirmation-actions">
                <a href="catalog.php" class="btn btn-primary">Продовжити покупки</a>
                <button class="btn btn-outline" id="print-order">Роздрукувати замовлення</button>
            </div>
        </div>
    </div>
</section>

<?php include './partials/footer.php'; ?>
