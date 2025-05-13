<?php include './partials/header.php'; ?>
<?php include './models/GetData/catalogData.php'; ?>
<?php 
require_once './models/GetData/products.php'; 
$productsData = getProducts();
?>



<section class="catalog-section">
    <div class="container">
        <div class="catalog-header">
            <h1 class="catalog-title">Каталог продуктів</h1>
            <div class="catalog-tools">
                <div class="catalog-search">
                    <div class="search-input-wrapper">
                        <svg class="search-icon" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <input type="text" id="catalog-search-input" placeholder="Пошук продуктів...">
                        <button class="search-clear" id="search-clear">
                            <svg class="icon" viewBox="0 0 24 24">
                                <path d="M18 6L6 18M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="catalog-view-options">
                    <button class="view-option active" data-view="grid">
                        <svg class="icon" viewBox="0 0 24 24">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                        </svg>
                    </button>
                </div>
                <div class="catalog-filter-toggle">
                    <button class="filter-toggle-btn">
                        <svg class="icon" viewBox="0 0 24 24">
                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                        </svg>
                        <span>Фільтри</span>
                    </button>
                </div>
                <div class="catalog-favorites-toggle">
                    <button class="favorites-toggle-btn" id="show-favorites">
                        <svg class="icon" viewBox="0 0 24 24">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                        <span>Обране</span>
                        <span class="favorites-count">0</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="catalog-container">
            <div class="catalog-sidebar">
                <div class="filter-section">
                    <h3 class="filter-title">Категорії</h3>
                    <div class="filter-options" id="categories-filter">
                        <?php foreach ($categories as $category): ?>
                            <label class="filter-option">
                                <input type="checkbox" name="category" value="<?= htmlspecialchars($category['slug']) ?>">
                                <span class="checkmark"></span>
                                <span><?= htmlspecialchars($category['name']) ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="filter-section">
                    <h3 class="filter-title">Ціна</h3>
                    <div class="price-range">
                        <div class="price-inputs">
                            <div class="price-input">
                                <label>Від</label>
                                <input type="number" id="price-min" min="0" value="0">
                            </div>
                            <div class="price-input">
                                <label>До</label>
                                <input type="number" id="price-max" min="0" value="1000">
                            </div>
                        </div>
                        <div class="range-slider">
                            <div class="slider-track"></div>
                            <input type="range" min="0" max="1000" value="0" id="slider-min">
                            <input type="range" min="0" max="1000" value="1000" id="slider-max">
                        </div>
                    </div>
                </div>

                <div class="filter-section">
                    <h3 class="filter-title">Рейтинг</h3>
                    <div class="filter-options">
                        <label class="filter-option">
                            <input type="radio" name="rating" value="4">
                            <span class="radio-mark"></span>
                            <div class="stars">
                                <div class="stars-filled" style="width: 80%"></div>
                            </div>
                            <span>і вище</span>
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="rating" value="3">
                            <span class="radio-mark"></span>
                            <div class="stars">
                                <div class="stars-filled" style="width: 60%"></div>
                            </div>
                            <span>і вище</span>
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="rating" value="2">
                            <span class="radio-mark"></span>
                            <div class="stars">
                                <div class="stars-filled" style="width: 40%"></div>
                            </div>
                            <span>і вище</span>
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="rating" value="1">
                            <span class="radio-mark"></span>
                            <div class="stars">
                                <div class="stars-filled" style="width: 20%"></div>
                            </div>
                            <span>і вище</span>
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="rating" value="0" checked>
                            <span class="radio-mark"></span>
                            <span>Всі товари</span>
                        </label>
                    </div>
                </div>

                <div class="filter-section">
                <h3 class="filter-title">Фермери</h3>
                <div class="filter-options" id="farmers-filter">
                    <?php foreach ($farmers as $farmer): ?>
                        <label class="filter-option">
                            <input type="checkbox" name="farmer" value="<?= htmlspecialchars($farmer['id']) ?>">
                            <span class="checkmark"></span>
                            <span><?= htmlspecialchars($farmer['name']) ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>

                </div>


                <div class="filter-actions">
                    <button class="btn btn-primary" id="apply-filters">Застосувати</button>
                    <button class="btn btn-outline" id="reset-filters">Скинути</button>
                </div>
            </div>

            <div class="catalog-content">
                <div class="catalog-results">
                    <div class="results-info">
                        <span class="results-count">Знайдено: <strong id="products-count">16</strong> товарів</span>
                        <div class="results-sort">
                            <label for="sort-select">Сортувати:</label>
                            <select id="sort-select">
                                <option value="popular">За популярністю</option>
                                <option value="price-asc">За ціною (зростання)</option>
                                <option value="price-desc">За ціною (спадання)</option>
                                <option value="rating">За рейтингом</option>
                                <option value="new">Спочатку нові</option>
                            </select>
                        </div>
                    </div>

                    <div class="products-grid" id="products-container">
                        <!-- Products will be loaded here via JavaScript -->
                    </div>

                    <div class="no-results" style="display: none;">
                        <svg class="icon icon-lg" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            <line x1="11" y1="8" x2="11" y2="14"></line>
                            <line x1="8" y1="11" x2="14" y2="11"></line>
                        </svg>
                        <h3>Товари не знайдені</h3>
                        <p>Спробуйте змінити параметри пошуку або фільтри</p>
                        <button class="btn btn-primary" id="reset-search">Скинути пошук</button>
                    </div>

                    <div class="pagination">
                        <button class="pagination-btn" disabled>
                            <svg class="icon" viewBox="0 0 24 24">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                        </button>
                        <div class="pagination-pages">
                            <button class="pagination-page active">1</button>
                            <button class="pagination-page">2</button>
                            <button class="pagination-page">3</button>
                        </div>
                        <button class="pagination-btn">
                            <svg class="icon" viewBox="0 0 24 24">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Reviews Modal -->
    <div class="modal" id="reviews-modal">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h3 class="modal-title">Відгуки про товар</h3>
                <button class="modal-close">
                    <svg class="icon" viewBox="0 0 24 24">
                        <path d="M18 6L6 18M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="product-reviews-info">
                    <img src="/placeholder.svg" alt="" class="reviews-product-image">
                    <div class="reviews-product-details">
                        <h4 class="reviews-product-name"></h4>
                        <p class="reviews-product-farmer"></p>
                        <div class="product-rating">
                            <div class="stars">
                                <div class="stars-filled" id="reviews-product-rating"></div>
                            </div>
                            <span class="rating-count" id="reviews-rating-count"></span>
                        </div>
                    </div>
                </div>
                
                <div class="reviews-list-container">
                    <h4>Відгуки покупців</h4>
                    <div class="reviews-list" id="reviews-list">
                        <!-- Reviews will be loaded here via JavaScript -->
                    </div>
                </div>
                
                <div class="add-review-container">
                    <h4>Залишити відгук</h4>
                    <form id="review-form">
                        <div class="form-group">
                            <label for="review-name">Ваше ім'я</label>
                            <input type="text" id="review-name" required placeholder="Введіть ваше ім'я">
                        </div>
                        
                        <div class="form-group">
                            <label>Ваша оцінка</label>
                            <div class="star-rating">
                                <input type="radio" id="review-star5" name="review-rating" value="5" required>
                                <label for="review-star5"></label>
                                <input type="radio" id="review-star4" name="review-rating" value="4">
                                <label for="review-star4"></label>
                                <input type="radio" id="review-star3" name="review-rating" value="3">
                                <label for="review-star3"></label>
                                <input type="radio" id="review-star2" name="review-rating" value="2">
                                <label for="review-star2"></label>
                                <input type="radio" id="review-star1" name="review-rating" value="1">
                                <label for="review-star1"></label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="review-text">Ваш відгук</label>
                            <textarea id="review-text" rows="4" required placeholder="Поділіться вашими враженнями про товар"></textarea>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" class="btn btn-outline" id="cancel-review">Скасувати</button>
                            <button type="submit" class="btn btn-primary" id="submit-review">Відправити відгук</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Quick View Modal -->
    <div class="modal" id="product-modal">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h3 class="modal-title">Перегляд товару</h3>
                <button class="modal-close">
                    <svg class="icon" viewBox="0 0 24 24">
                        <path d="M18 6L6 18M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="product-modal-content">
                    <div class="product-modal-gallery">
                        <div class="product-modal-main-image">
                            <img src="/placeholder.svg" alt="" id="modal-product-image">
                        </div>
                        <div class="product-modal-thumbnails">
                            <!-- Thumbnails will be loaded here via JavaScript -->
                        </div>
                    </div>
                    <div class="product-modal-info">
                        <h2 id="modal-product-name"></h2>
                        <div class="product-modal-meta">
                            <div class="product-modal-farmer" id="modal-product-farmer"></div>
                            <div class="product-modal-rating">
                                <div class="stars">
                                    <div class="stars-filled" id="modal-product-rating"></div>
                                </div>
                                <span class="rating-count" id="modal-rating-count"></span>
                                <button class="btn btn-sm btn-outline reviews-btn" id="view-reviews-btn">
                                    <svg class="icon icon-sm" viewBox="0 0 24 24">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                    <span>Відгуки</span>
                                </button>
                            </div>
                        </div>
                        <div class="product-modal-price" id="modal-product-price"></div>
                        <div class="product-modal-description" id="modal-product-description"></div>
                        <div class="product-modal-actions">
                            <div class="product-quantity">
                                <button class="quantity-btn minus">-</button>
                                <input type="number" value="1" min="1" max="99" class="quantity-input">
                                <button class="quantity-btn plus">+</button>
                            </div>
                            <button class="btn btn-primary add-to-cart-btn add-to-cart" data-id="3">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <path d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>
                                    <path d="M20 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                <span>Додати в кошик</span>
                            </button>
                            <button class="btn btn-outline favorite-btn" id="modal-favorite-btn">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="product-modal-details">
                            <div class="detail-item">
                                <span class="detail-label">Категорія:</span>
                                <span class="detail-value" id="modal-product-category"></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Вага/об'єм:</span>
                                <span class="detail-value" id="modal-product-weight"></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Термін придатності:</span>
                                <span class="detail-value" id="modal-product-expiry"></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Наявність:</span>
                                <span class="detail-value in-stock" id="modal-product-stock">В наявності</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pass PHP data to JavaScript -->
<script>
    window.productsData = <?= json_encode($productsData, JSON_UNESCAPED_UNICODE); ?>;
</script>



<?php include './partials/footer.php'; ?>
