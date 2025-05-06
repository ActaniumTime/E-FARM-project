<?php include './partials/header.php'; ?>
<section class="cart-section">
    <div class="container">
        <div class="cart-header">
            <h1 class="cart-title">Кошик</h1>
            <div class="cart-steps">
                <div class="cart-step active">
                    <div class="step-number">1</div>
                    <div class="step-text">Кошик</div>
                </div>
                <div class="step-divider"></div>
                <div class="cart-step">
                    <div class="step-number">2</div>
                    <div class="step-text">Оформлення</div>
                </div>
                <div class="step-divider"></div>
                <div class="cart-step">
                    <div class="step-number">3</div>
                    <div class="step-text">Підтвердження</div>
                </div>
            </div>
        </div>

        <div class="cart-content" id="cart-content">
            <!-- Cart items will be loaded here via JavaScript -->
        </div>

        <div class="cart-empty" id="cart-empty" style="display: none;">
            <svg class="icon icon-lg" viewBox="0 0 24 24">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
            <h3>Ваш кошик порожній</h3>
            <p>Додайте товари з каталогу, щоб продовжити покупки</p>
            <a href="catalog.php" class="btn btn-primary">Перейти до каталогу</a>
        </div>

        <div class="cart-summary" id="cart-summary" style="display: none;">
            <div class="summary-header">
                <h3>Разом</h3>
            </div>
            <div class="summary-content">
                <div class="summary-row">
                    <span>Товарів:</span>
                    <span id="cart-total-items">0</span>
                </div>
                <div class="summary-row">
                    <span>Сума:</span>
                    <span id="cart-subtotal">0 грн</span>
                </div>
                <div class="summary-row">
                    <span>Доставка:</span>
                    <span id="cart-shipping">0 грн</span>
                </div>
                <div class="summary-divider"></div>
                <div class="summary-row total">
                    <span>До сплати:</span>
                    <span id="cart-total">0 грн</span>
                </div>
                <div class="summary-actions">
                    <a href="checkout.php" class="btn btn-primary btn-block">Оформити замовлення</a>
                    <a href="catalog.php" class="btn btn-outline btn-block">Продовжити покупки</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="assets/js/cart.js"></script>
<?php include './partials/footer.php'; ?>
