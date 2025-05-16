
<?php
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    include './partials/header.php';
    require_once __DIR__ . '/models/CRUD-oper/farmer.php';
?>



<style>
    /* Order Details Page Styles */
.dashboard-container {
  padding: 20px;
  max-width: 1200px;
  margin: 0 auto;
}

.section-header {
  margin-bottom: 30px;
  text-align: center;
}

.section-header h2 {
  font-size: 28px;
  color: #2c3e50;
  margin-bottom: 10px;
}

.section-description {
  font-size: 16px;
  color: #7f8c8d;
  max-width: 800px;
  margin: 0 auto;
}

/* Order Information */
.order-info {
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  padding: 20px;
  margin-bottom: 20px;
}

.order-info h3 {
  font-size: 20px;
  color: #2c3e50;
  margin-top: 0;
  margin-bottom: 15px;
  padding-bottom: 10px;
  border-bottom: 1px solid #eee;
}

.order-meta {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  margin-bottom: 15px;
}

.order-meta-item {
  display: flex;
  align-items: center;
  gap: 8px;
}

.order-meta-item .icon {
  color: #27ae60;
}

.order-meta-item span {
  font-size: 14px;
  color: #34495e;
}

.order-meta-item strong {
  font-weight: 600;
}

/* Order Items */
.order-items {
  margin-bottom: 30px;
}

.order-item {
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  margin-bottom: 20px;
  overflow: hidden;
}

.order-item-header {
  background-color: #f8f9fa;
  padding: 15px 20px;
  border-bottom: 1px solid #eee;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.order-item-title {
  font-size: 18px;
  font-weight: 600;
  color: #2c3e50;
  margin: 0;
}

.order-item-id {
  font-size: 14px;
  color: #7f8c8d;
}

.order-item-content {
  padding: 20px;
}

.order-item-details {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  gap: 15px;
  margin-bottom: 20px;
}

.detail-item {
  display: flex;
  flex-direction: column;
}

.detail-label {
  font-size: 12px;
  color: #7f8c8d;
  margin-bottom: 5px;
}

.detail-value {
  font-size: 14px;
  color: #2c3e50;
  font-weight: 500;
}

/* Product Information */
.product-info {
  background-color: #f1f8e9;
  border-left: 4px solid #8bc34a;
  border-radius: 4px;
  padding: 15px;
  margin-top: 15px;
}

.product-info h4 {
  font-size: 16px;
  color: #2c3e50;
  margin-top: 0;
  margin-bottom: 15px;
  display: flex;
  align-items: center;
  gap: 8px;
}

.product-info h4 .icon {
  color: #8bc34a;
}

.product-details {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  gap: 15px;
}

.product-detail-item {
  margin-bottom: 10px;
}

.product-detail-label {
  font-size: 12px;
  color: #7f8c8d;
  margin-bottom: 3px;
}

.product-detail-value {
  font-size: 14px;
  color: #2c3e50;
}

/* Status Badges */
.status-badge {
  display: inline-block;
  padding: 4px 10px;
  border-radius: 20px;
  font-size: 12px;
  font-weight: 500;
  text-align: center;
}

.status-pending {
  background-color: #fff8e1;
  color: #ffa000;
}

.status-processing {
  background-color: #e1f5fe;
  color: #0288d1;
}

.status-completed {
  background-color: #e8f5e9;
  color: #388e3c;
}

.status-cancelled {
  background-color: #ffebee;
  color: #d32f2f;
}

/* Actions */
.order-actions {
  display: flex;
  gap: 10px;
  margin-top: 20px;
  flex-wrap: wrap;
}

.btn {
  padding: 8px 16px;
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
  cursor: pointer;
  transition: background-color 0.3s, color 0.3s;
  border: none;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 8px;
}

.btn-primary {
  background-color: #27ae60;
  color: white;
}

.btn-primary:hover {
  background-color: #219653;
}

.btn-secondary {
  background-color: #ecf0f1;
  color: #2c3e50;
}

.btn-secondary:hover {
  background-color: #dfe6e9;
}

.btn-danger {
  background-color: #e74c3c;
  color: white;
}

.btn-danger:hover {
  background-color: #c0392b;
}

/* Icons */
.icon {
  width: 18px;
  height: 18px;
  stroke: currentColor;
  stroke-width: 2;
  stroke-linecap: round;
  stroke-linejoin: round;
  fill: none;
}

.icon-sm {
  width: 16px;
  height: 16px;
}

/* Summary Section */
.order-summary {
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  padding: 20px;
  margin-top: 20px;
}

.order-summary h3 {
  font-size: 18px;
  color: #2c3e50;
  margin-top: 0;
  margin-bottom: 15px;
  padding-bottom: 10px;
  border-bottom: 1px solid #eee;
}

.summary-items {
  margin-bottom: 15px;
}

.summary-item {
  display: flex;
  justify-content: space-between;
  padding: 8px 0;
  border-bottom: 1px dashed #eee;
}

.summary-item:last-child {
  border-bottom: none;
}

.summary-label {
  font-size: 14px;
  color: #7f8c8d;
}

.summary-value {
  font-size: 14px;
  color: #2c3e50;
  font-weight: 500;
}

.summary-total {
  display: flex;
  justify-content: space-between;
  padding-top: 15px;
  border-top: 2px solid #eee;
  font-weight: 600;
}

.summary-total .summary-label {
  font-size: 16px;
  color: #2c3e50;
}

.summary-total .summary-value {
  font-size: 16px;
  color: #27ae60;
}

/* Responsive Design */
@media (max-width: 768px) {
  .order-meta {
    flex-direction: column;
    gap: 10px;
  }

  .order-item-details,
  .product-details {
    grid-template-columns: 1fr;
  }

  .order-actions {
    flex-direction: column;
  }

  .btn {
    width: 100%;
    justify-content: center;
  }
}

</style>

<div class="dashboard-container">
    <div class="section-header">
        <h2>Деталі замовлення</h2>
        <p class="section-description">Перегляд детальної інформації про замовлення та його товари</p>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $orderId = $_GET['id'];
        $orderItems = getAllOrderItemByOrderID($orderId);
        
        if (empty($orderItems)) {
            echo '<div class="empty-state">
                <svg class="icon icon-lg" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                <p>Замовлення не знайдено або не містить товарів</p>
                <a href="farmer-orders.php" class="btn btn-primary">Повернутися до списку замовлень</a>
            </div>';
        } else {
            // Display order information
            $firstItem = $orderItems[0]; // Get first item to display order info
            ?>
            
            <div class="order-info">
                <h3>Інформація про замовлення #<?php echo htmlspecialchars($orderId); ?></h3>
                <div class="order-meta">
                    <div class="order-meta-item">
                        <svg class="icon" viewBox="0 0 24 24">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <span>Дата замовлення: <strong><?php echo isset($firstItem['OrderDate']) ? htmlspecialchars($firstItem['OrderDate']) : 'Не вказано'; ?></strong></span>
                    </div>
                    <div class="order-meta-item">
                        <svg class="icon" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span>Замовник: <strong><?php echo isset($firstItem['CustomerName']) ? htmlspecialchars($firstItem['CustomerName']) : 'Не вказано'; ?></strong></span>
                    </div>
                    <div class="order-meta-item">
                        <svg class="icon" viewBox="0 0 24 24">
                            <path d="M22 12h-6l-2 3h-4l-2-3H2"></path>
                            <path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
                        </svg>
                        <span>Статус: 
                            <span class="status-badge <?php 
                                $status = isset($firstItem['Status']) ? $firstItem['Status'] : 'pending';
                                echo 'status-' . strtolower($status);
                                ?>">
                                <?php 
                                    if ($status === 'pending') echo 'Очікує обробки';
                                    elseif ($status === 'processing') echo 'В обробці';
                                    elseif ($status === 'completed') echo 'Виконано';
                                    elseif ($status === 'cancelled') echo 'Скасовано';
                                    else echo htmlspecialchars($status);
                                ?>
                            </span>
                        </span>
                    </div>
                    <div class="order-meta-item">
                        <svg class="icon" viewBox="0 0 24 24">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span>Адреса доставки: <strong><?php echo isset($firstItem['ShippingAddress']) ? htmlspecialchars($firstItem['ShippingAddress']) : 'Не вказано'; ?></strong></span>
                    </div>
                </div>
            </div>

            <div class="order-items">
                <?php 
                $totalAmount = 0;
                foreach ($orderItems as $index => $item): 
                    $productInfo = GetAllDataAboutProductByProductID($item['ProductID']);
                    $itemTotal = isset($item['Quantity']) && isset($item['Price']) ? $item['Quantity'] * $item['Price'] : 0;
                    $totalAmount += $itemTotal;
                ?>
                <div class="order-item">
                    <div class="order-item-header">
                        <h3 class="order-item-title">
                            <?php echo isset($productInfo['ProductName']) ? htmlspecialchars($productInfo['ProductName']) : 'Товар #' . htmlspecialchars($item['ProductID']); ?>
                        </h3>
                        <span class="order-item-id">ID: <?php echo htmlspecialchars($item['OrderItemID']); ?></span>
                    </div>
                    <div class="order-item-content">
                        <div class="order-item-details">
                            <div class="detail-item">
                                <span class="detail-label">Кількість</span>
                                <span class="detail-value"><?php echo isset($item['Quantity']) ? htmlspecialchars($item['Quantity']) : 'Не вказано'; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Ціна за одиницю</span>
                                <span class="detail-value"><?php echo isset($item['Price']) ? htmlspecialchars($item['Price']) . ' грн' : 'Не вказано'; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Загальна вартість</span>
                                <span class="detail-value"><?php echo $itemTotal . ' грн'; ?></span>
                            </div>
                        </div>

                        <?php if (!empty($productInfo)): ?>
       <div class="product-info">
    <h4>
        <svg class="icon" viewBox="0 0 24 24">
            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
        </svg>
        Інформація про товар
    </h4>
    <div class="product-details">
        <div class="product-detail-item">
            <div class="product-detail-label">Назва</div>
            <div class="product-detail-value"><?= htmlspecialchars($productInfo['name']) ?></div>
        </div>

        <div class="product-detail-item">
            <div class="product-detail-label">Ціна</div>
            <div class="product-detail-value"><?= htmlspecialchars($productInfo['price']) ?> грн</div>
        </div>

        <?php if (!empty($productInfo['old_price']) && $productInfo['old_price'] > $productInfo['price']): ?>
        <div class="product-detail-item">
            <div class="product-detail-label">Стара ціна</div>
            <div class="product-detail-value"><s><?= htmlspecialchars($productInfo['old_price']) ?> грн</s></div>
        </div>
        <?php endif; ?>

        <div class="product-detail-item">
            <div class="product-detail-label">Опис</div>
            <div class="product-detail-value"><?= htmlspecialchars($productInfo['description']) ?></div>
        </div>

        <div class="product-detail-item">
            <div class="product-detail-label">Вага</div>
            <div class="product-detail-value"><?= htmlspecialchars($productInfo['weight']) ?></div>
        </div>

        <div class="product-detail-item">
            <div class="product-detail-label">Термін придатності</div>
            <div class="product-detail-value"><?= htmlspecialchars($productInfo['expiry']) ?></div>
        </div>

        <div class="product-detail-item">
            <div class="product-detail-label">Рейтинг</div>
            <div class="product-detail-value">
                ⭐ <?= htmlspecialchars($productInfo['rating']) ?> (<?= htmlspecialchars($productInfo['rating_count']) ?> відгуків)
            </div>
        </div>
    </div>
</div>

                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="order-summary">
                <h3>Підсумок замовлення</h3>
                <div class="summary-items">
                    <div class="summary-item">
                        <span class="summary-label">Кількість товарів</span>
                        <span class="summary-value"><?php echo count($orderItems); ?></span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Вартість товарів</span>
                        <span class="summary-value"><?php echo $totalAmount; ?> грн</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Вартість доставки</span>
                        <span class="summary-value">100 грн</span>
                    </div>
                </div>
                <div class="summary-total">
                    <span class="summary-label">Загальна сума</span>
                    <span class="summary-value"><?php echo $totalAmount + 100; ?> грн</span>
                </div>
            </div>

            <div class="order-actions">
                <a href="farmer-orders.php" class="btn btn-secondary">
                    <svg class="icon icon-sm" viewBox="0 0 24 24">
                        <path d="M19 12H5M12 19l-7-7 7-7"></path>
                    </svg>
                    Повернутися до списку
                </a>
                <button class="btn btn-primary">
                    <svg class="icon icon-sm" viewBox="0 0 24 24">
                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                        <rect x="6" y="14" width="12" height="8"></rect>
                    </svg>
                    Роздрукувати замовлення
                </button>
                <button class="btn btn-primary">
                    <svg class="icon icon-sm" viewBox="0 0 24 24">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                    Експортувати в PDF
                </button>
                <button class="btn btn-danger">
                    <svg class="icon icon-sm" viewBox="0 0 24 24">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg>
                    Скасувати замовлення
                </button>
            </div>
        <?php
        }
    }
    ?>
</div>

<?php include './partials/footer.php'; ?>
