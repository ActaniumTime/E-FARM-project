<?php include './partials/header.php'; 
require_once './models/GetData/farmers_data.php';

// Чтение параметров (если нужны фильтры)
$farmers = array_slice(getFarmers(), 0, 3);

?>



<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h2 class="hero-title">Свіжа фермерська продукція прямо до вашого столу</h2>
            <p class="hero-subtitle">Натуральні продукти від місцевих фермерів з доставкою</p>
            <div class="hero-buttons">
                <a href="#" class="btn btn-primary btn-lg btn-icon">
                    <span onclick="window.location.href='catalog.php'">Перейти в каталог</span>
                    <svg class="icon" viewBox="0 0 24 24">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="categories section">
    <div class="container">
        <h2 class="section-title">Категорії товарів</h2>
        <div class="categories-grid">
            <div class="category-card">
                <div class="category-image">
                    <img src="https://images.unsplash.com/photo-1518843875459-f738682238a6?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Овочі">
                </div>
                <div class="category-content">
                    <h3 class="category-title">Овочі</h3>
                    <p class="category-description">Свіжі сезонні овочі від місцевих фермерів</p>
                </div>
            </div>
            
            <div class="category-card">
                <div class="category-image">
                    <img src="https://images.unsplash.com/photo-1519996529931-28324d5a630e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Фрукти">
                </div>
                <div class="category-content">
                    <h3 class="category-title">Фрукти</h3>
                    <p class="category-description">Соковиті та ароматні фрукти з власних садів</p>
                </div>
            </div>
            
            <div class="category-card">
                <div class="category-image">
                    <img src="https://images.unsplash.com/photo-1607623814075-e51df1bdc82f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="М'ясо">
                </div>
                <div class="category-content">
                    <h3 class="category-title">М'ясо</h3>
                    <p class="category-description">Натуральне м'ясо від перевірених господарств</p>
                </div>
            </div>
            
            <div class="category-card">
                <div class="category-image">
                    <img src="https://images.unsplash.com/photo-1628088062854-d1870b4553da?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Молочні продукти">
                </div>
                <div class="category-content">
                    <h3 class="category-title">Молочні продукти</h3>
                    <p class="category-description">Свіжі молочні продукти без консервантів</p>
                </div>
            </div>
        </div>
        
    </div>
</section>

<!-- Farmers Section -->
<section class="farmers section">
    <div class="container">
        <h2 class="section-title">Наші фермери</h2>
        <div class="farmers-grid">
            <?php if (empty($farmers)): ?>
                <p>Фермерів не знайдено.</p>
            <?php else: ?>
                <?php foreach ($farmers as $farmer): ?>
                    <div class="farmer-card">
                        <div class="farmer-image">
                            <img src="<?= htmlspecialchars($farmer['image']) ?>" alt="<?= htmlspecialchars($farmer['name']) ?>">
                        </div>
                        <div class="farmer-content">
                            <h3 class="farmer-name"><?= htmlspecialchars($farmer['name']) ?></h3>
                            <div class="farmer-location">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <span><?= htmlspecialchars($farmer['location']) ?></span>
                            </div>
                            <p class="farmer-description"><?= htmlspecialchars($farmer['description']) ?></p>
                            <a href="farmer-profile.php?id=<?= $farmer['id'] ?>" class="btn btn-outline">Переглянути товари</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>


<!-- Products Section -->
<section class="products section">
    <div class="container">
        <div class="products-header">
            <h2 class="products-title">Новинки та найпопулярніші</h2>
            <div class="products-nav">
                <div class="products-nav-item active">Всі</div>
            </div>
        </div>
        
        <div class="products-grid">
            <div class="product-card">
                <div class="product-badge badge-new">Новинка</div>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1563636619-e9143da7973b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Фермерське Молоко">
                </div>
                <div class="product-content">
                    <div class="product-category">Молочна продукція</div>
                    <h3 class="product-title">Фермерське Молоко 3,4% від Олександри Харченко, 1000г</h3>
                    <div class="product-farmer">від Олександри Харченко</div>
                    <div class="product-footer">
                        <div class="product-price">51 грн</div>
                    </div>
                </div>
            </div>
            
            <div class="product-card">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1587593810167-a84920ea0781?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Тушка Тапака">
                </div>
                <div class="product-content">
                    <div class="product-category">М'ясо та птиця</div>
                    <h3 class="product-title">Тушка Тапака Домашньої курки від Віктора Литвинчука</h3>
                    <div class="product-farmer">від Віктора Литвинчука</div>
                    <div class="product-footer">
                        <div class="product-price">185 грн</div>
                    </div>
                </div>
            </div>
            
            <div class="product-card">
                <div class="product-badge badge-sale">-14%</div>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1542901031-ec5eeb518e83?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Ковбаса Салямі">
                </div>
                <div class="product-content">
                    <div class="product-category">Ковбаси та делікатеси</div>
                    <h3 class="product-title">Ковбаса Салямі Італійська №13 (т/к) від Олександра Орлова</h3>
                    <div class="product-farmer">від Олександра Орлова</div>
                    <div class="product-footer">
                        <div class="product-price">
                            <span class="product-price-old">210 грн</span>
                            180 грн
                        </div>
                        <!-- <div class="product-status status-sold">Закінчився</div> -->
                    </div>
                </div>
            </div>
            
            <div class="product-card">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1486297678162-eb2a19b0a32d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Сир кисломолочний">
                </div>
                <div class="product-content">
                    <div class="product-category">Молочна продукція</div>
                    <h3 class="product-title">Сир кисломолочний 5% від Олександри Харченко, ваговий</h3>
                    <div class="product-farmer">від Олександри Харченко</div>
                    <div class="product-footer">
                        <div class="product-price">69 грн</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include './partials/footer.php'; ?>
