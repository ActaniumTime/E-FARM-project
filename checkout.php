<?php include './partials/header.php'; ?>

<section class="checkout-section">
    <div class="container">
        <div class="cart-header">
            <h1 class="cart-title">Оформлення замовлення</h1>
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
                <div class="cart-step active">
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

        <div class="checkout-content">
            <div class="checkout-form-container">
                <form id="checkout-form" class="checkout-form">
                    <div class="form-section">
                        <h3 class="section-title">Контактна інформація</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Ім'я та прізвище*</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Телефон*</label>
                                <input type="tel" id="phone" name="phone" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email*</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3 class="section-title">Доставка</h3>
                        <div class="form-group">
                            <label for="delivery-method">Спосіб доставки*</label>
                            <select id="delivery-method" name="delivery-method" required>
                                <option value="">Виберіть спосіб доставки</option>
                                <option value="nova-poshta">Нова Пошта</option>
                                <option value="ukrposhta">Укрпошта</option>
                                <option value="courier">Кур'єр</option>
                                <option value="self-pickup">Самовивіз</option>
                            </select>
                        </div>

                        <div id="delivery-address-container">
                            <div class="form-group">
                                <label for="city">Місто*</label>
                                <input type="text" id="city" name="city">
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="address">Адреса*</label>
                                    <input type="text" id="address" name="address">
                                </div>
                                <div class="form-group">
                                    <label for="postal-code">Поштовий індекс</label>
                                    <input type="text" id="postal-code" name="postal-code">
                                </div>
                            </div>
                        </div>

                        <div id="nova-poshta-container" style="display: none;">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="np-city">Місто*</label>
                                    <input type="text" id="np-city" name="np-city">
                                </div>
                                <div class="form-group">
                                    <label for="np-warehouse">Відділення*</label>
                                    <input type="text" id="np-warehouse" name="np-warehouse">
                                </div>
                            </div>
                        </div>

                        <div id="self-pickup-container" style="display: none;">
                            <div class="form-group">
                                <label for="pickup-location">Пункт самовивозу*</label>
                                <select id="pickup-location" name="pickup-location">
                                    <option value="">Виберіть пункт самовивозу</option>
                                    <option value="location-1">м. Київ, вул. Фермерська, 123</option>
                                    <option value="location-2">м. Львів, вул. Зелена, 45</option>
                                    <option value="location-3">м. Одеса, вул. Морська, 67</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3 class="section-title">Оплата</h3>
                        <div class="payment-methods">
                            <div class="payment-method">
                                <input type="radio" id="payment-card" name="payment-method" value="card" checked>
                                <label for="payment-card">
                                    <div class="payment-icon">
                                        <svg class="icon" viewBox="0 0 24 24">
                                            <rect x="2" y="5" width="20" height="14" rx="2"></rect>
                                            <line x1="2" y1="10" x2="22" y2="10"></line>
                                        </svg>
                                    </div>
                                    <div class="payment-info">
                                        <div class="payment-title">Оплата карткою</div>
                                        <div class="payment-description">Visa, Mastercard</div>
                                    </div>
                                </label>
                            </div>
                            <div class="payment-method">
                                <input type="radio" id="payment-cash" name="payment-method" value="cash">
                                <label for="payment-cash">
                                    <div class="payment-icon">
                                        <svg class="icon" viewBox="0 0 24 24">
                                            <rect x="2" y="6" width="20" height="12" rx="2"></rect>
                                            <circle cx="12" cy="12" r="3"></circle>
                                            <path d="M18.5 8.5a2.5 2.5 0 0 0 0 5"></path>
                                            <path d="M5.5 15.5a2.5 2.5 0 0 1 0-5"></path>
                                        </svg>
                                    </div>
                                    <div class="payment-info">
                                        <div class="payment-title">Оплата при отриманні</div>
                                        <div class="payment-description">Готівкою або карткою</div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div id="card-payment-container">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="card-number">Номер картки*</label>
                                    <input type="text" id="card-number" name="card-number" placeholder="XXXX XXXX XXXX XXXX">
                                </div>
                                <div class="form-group">
                                    <label for="card-name">Ім'я на картці*</label>
                                    <input type="text" id="card-name" name="card-name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="card-expiry">Термін дії*</label>
                                    <input type="text" id="card-expiry" name="card-expiry" placeholder="MM/РР">
                                </div>
                                <div class="form-group">
                                    <label for="card-cvv">CVV*</label>
                                    <input type="text" id="card-cvv" name="card-cvv" placeholder="XXX">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3 class="section-title">Коментар до замовлення</h3>
                        <div class="form-group">
                            <textarea id="order-comment" name="order-comment" rows="3" placeholder="Додаткова інформація щодо замовлення"></textarea>
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="cart.php" class="btn btn-outline">Назад до кошика</a>
                        <button onclick="window.location.href='conformation.php'" type="submit" class="btn btn-primary">Підтвердити замовлення</button>
                    </div>
                </form>
            </div>

            <div class="checkout-summary">
                <div class="summary-header">
                    <h3>Ваше замовлення</h3>
                </div>
                <div class="summary-products" id="checkout-products">
                    <!-- Products will be loaded here via JavaScript -->
                </div>
                <div class="summary-content">
                    <div class="summary-row">
                        <span>Товарів:</span>
                        <span id="checkout-total-items">0</span>
                    </div>
                    <div class="summary-row">
                        <span>Сума:</span>
                        <span id="checkout-subtotal">0 грн</span>
                    </div>
                    <div class="summary-row">
                        <span>Доставка:</span>
                        <span id="checkout-shipping">0 грн</span>
                    </div>
                    <div class="summary-divider"></div>
                    <div class="summary-row total">
                        <span>До сплати:</span>
                        <span id="checkout-total">0 грн</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include './partials/footer.php'; ?>
