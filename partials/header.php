<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>НАШЕ.ВСЕ - Фермерська Кооперація</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Raleway:wght@700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/cart-styles.css">
    <link rel="stylesheet" href="assets/css/farmers-styles.css">
    <link rel="stylesheet" href="assets/css/farmer-profile-styles.css">
    <link rel="stylesheet" href="assets/css/farmer-dashboard-styles.css">
    <link rel="stylesheet" href="assets/css/farmer-news-style.css">
    <link rel="stylesheet" href="assets/css/farmer-colloboration-style.css">


</head>

<body>

<!-- Header -->
<header class="header">
    <div class="header-top">
        <div class="container header-container">
            <div class="logo">
                <div class="logo-text">
                    <h1 class="logo-title">FARMFRESH</h1>
                    <div class="logo-subtitle">Корпорація</div>
                </div>
            </div>

            <div class="header-actions">
                <a href="tel:+12345678901" class="phone-number">
                    <svg class="icon phone-icon" viewBox="0 0 24 24">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    <span>(+380) 98368-8901</span>
                </a>
                <div class="auth-buttons">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="buyer-dashboard.php" class="btn btn-sm profile-btn">Профіль</a>
                    <?php else: ?>
                        <a href="login.php" class="btn btn-sm login-btn">Увійти</a>
                        <a href="register.php" class="btn btn-sm register-btn">Зарегеструватися</a>
                    <?php endif; ?>
                </div>

                <div class="cart-icon-container">
                    <a href="cart.php" class="cart-icon">
                        <svg class="icon" viewBox="0 0 24 24">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <span class="cart-count" id="cart-count">0</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <nav class="nav">
        <div class="container nav-container">
            <button class="catalog-button">
                <svg class="icon catalog-icon" viewBox="0 0 24 24">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
                <span>КАТЕГОРІЇ</span>
            </button>

            <button class="mobile-menu-toggle">
                <svg class="icon" viewBox="0 0 24 24">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>

            <ul class="main-menu">
                <li><a href="index.php">Головна</a></li>
                <li><a href="about.php">Про нас</a></li>
                <li><a href="catalog.php">Каталог</a></li>
                <li><a href="farmers.php">Фермери</a></li>
                <li><a href="farmer-news.php">Новини</a></li>
                <li><a href="#">Контакти</a></li>
            </ul>
            

            <div class="social-links">
                <a href="#" class="social-link">
                    <svg class="icon" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                    </svg>
                </a>
                <a href="#" class="social-link">
                    <svg class="icon" viewBox="0 0 24 24">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                </a>
                <a href="#" class="social-link">
                    <svg class="icon" viewBox="0 0 24 24">
                        <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Catalog Dropdown -->
        <div class="catalog-dropdown">
            <div class="catalog-column">
                <div class="catalog-category">
                    <div class="catalog-category-title">
                        <span class="catalog-category-icon">
                            <svg class="icon" viewBox="0 0 24 24">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </span>
                        <span>Сири</span>
                    </div>
                    <ul>
                        <li class="catalog-subcategory"><a href="#">Сири з коров'ячого молока</a></li>
                        <li class="catalog-subcategory"><a href="#">Козячі сири</a></li>
                        <li class="catalog-subcategory"><a href="#">Сири з овечого молока</a></li>
                        <li class="catalog-subcategory"><a href="#">Блакитні сири</a></li>
                        <li class="catalog-subcategory"><a href="#">Набори сирів</a></li>
                        <li class="catalog-view-all"><a href="#">Переглянути всі</a></li>
                    </ul>
                </div>
                <div class="catalog-category">
                    <div class="catalog-category-title">
                        <span class="catalog-category-icon">
                            <svg class="icon" viewBox="0 0 24 24">
                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                            </svg>
                        </span>
                        <span>Заморожені продукти</span>
                    </div>
                    <ul>
                        <li class="catalog-subcategory"><a href="#">Овочі та фрукти</a></li>
                        <li class="catalog-subcategory"><a href="#">Вареники</a></li>
                        <li class="catalog-subcategory"><a href="#">Заморожені страви</a></li>
                        <li class="catalog-subcategory"><a href="#">Тефтелі</a></li>
                        <li class="catalog-view-all"><a href="#">Переглянути всі</a></li>
                    </ul>
                </div>
            </div>
            <div class="catalog-column">
                <div class="catalog-category">
                    <div class="catalog-category-title">
                        <span class="catalog-category-icon">
                            <svg class="icon" viewBox="0 0 24 24">
                                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <path d="M16 10a4 4 0 0 1-8 0"></path>
                            </svg>
                        </span>
                        <span>Молочні продукти</span>
                    </div>
                    <ul>
                        <li class="catalog-subcategory"><a href="#">Молоко</a></li>
                        <li class="catalog-subcategory"><a href="#">Йогурти та сметана</a></li>
                        <li class="catalog-subcategory"><a href="#">Кефір</a></li>
                        <li class="catalog-subcategory"><a href="#">Сир кисломолочний</a></li>
                        <li class="catalog-subcategory"><a href="#">Вершкове масло</a></li>
                        <li class="catalog-view-all"><a href="#">Переглянути всі</a></li>
                    </ul>
                    
                </div>
                <div class="catalog-category">
                    <div class="catalog-category-title">
                        <span class="catalog-category-icon">
                            <svg class="icon" viewBox="0 0 24 24">
                                <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                            </svg>
                        </span>
                        <span>Бакалія</span>
                    </div>
                    <ul>
                        <li class="catalog-subcategory"><a href="#">Макарони та локшина</a></li>
                        <li class="catalog-subcategory"><a href="#">Швидкі страви та сніданки</a></li>
                        <li class="catalog-subcategory"><a href="#">Рослинні олії</a></li>
                        <li class="catalog-subcategory"><a href="#">Крупи та борошно</a></li>
                        <li class="catalog-view-all"><a href="#">Переглянути всі</a></li>
                    </ul>
                    
                </div>
            </div>
            <div class="catalog-column">
                <div class="catalog-category">
                    <div class="catalog-category-title">
                        <span class="catalog-category-icon">
                            <svg class="icon" viewBox="0 0 24 24">
                                <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                                <line x1="7" y1="7" x2="7.01" y2="7"></line>
                            </svg>
                        </span>
                        <span>М'ясо та яйця</span>
                    </div>
                    <ul>
                        <li class="catalog-subcategory"><a href="#">Свіже та заморожене м'ясо</a></li>
                        <li class="catalog-subcategory"><a href="#">Фарш</a></li>
                        <li class="catalog-subcategory"><a href="#">Копчене м'ясо</a></li>
                        <li class="catalog-subcategory"><a href="#">Яйця</a></li>
                        <li class="catalog-view-all"><a href="#">Переглянути всі</a></li>
                    </ul>
                    
                </div>
                <div class="catalog-category">
                    <div class="catalog-category-title">
                        <span class="catalog-category-icon">
                            <svg class="icon" viewBox="0 0 24 24">
                                <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                            </svg>
                        </span>
                        <span>Крафтові вина</span>
                    </div>
                    <ul>
                        <li class="catalog-subcategory"><a href="#">Червоні сухі вина</a></li>
                        <li class="catalog-subcategory"><a href="#">Білі сухі вина</a></li>
                        <li class="catalog-subcategory"><a href="#">Рожеві вина</a></li>
                        <li class="catalog-view-all"><a href="#">Переглянути всі</a></li>
                    </ul>
                    
                </div>
            </div>
            <div class="catalog-column">
                <div class="catalog-category">
                    <div class="catalog-category-title">
                        <span class="catalog-category-icon">
                            <svg class="icon" viewBox="0 0 24 24">
                                <line x1="8" y1="6" x2="21" y2="6"></line>
                                <line x1="8" y1="12" x2="21" y2="12"></line>
                                <line x1="8" y1="18" x2="21" y2="18"></line>
                                <line x1="3" y1="6" x2="3.01" y2="6"></line>
                                <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                <line x1="3" y1="18" x2="3.01" y2="18"></line>
                            </svg>
                        </span>
                        <span>Ковбаси та делікатеси</span>
                    </div>
                    <ul>
                        <li class="catalog-subcategory"><a href="#">Ковбаси</a></li>
                        <li class="catalog-subcategory"><a href="#">М'ясні делікатеси</a></li>
                        <li class="catalog-subcategory"><a href="#">Хот-доги та варені ковбаси</a></li>
                        <li class="catalog-view-all"><a href="#">Переглянути всі</a></li>
                    </ul>
                    
                </div>
                <div class="catalog-category">
                    <div class="catalog-category-title">
                        <span class="catalog-category-icon">
                            <svg class="icon" viewBox="0 0 24 24">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                        </span>
                        <span>Фрукти, овочі та зелень</span>
                    </div>
                    <ul>
                        <li class="catalog-subcategory"><a href="#">Гриби</a></li>
                        <li class="catalog-subcategory"><a href="#">Зелень</a></li>
                        <li class="catalog-subcategory"><a href="#">Овочі</a></li>
                        <li class="catalog-subcategory"><a href="#">Фрукти</a></li>
                        <li class="catalog-view-all"><a href="#">Переглянути всі</a></li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- Mobile Menu -->
<div class="mobile-menu-overlay"></div>
<div class="mobile-menu">
    <div class="mobile-menu-header">
        <h3>Menu</h3>
        <button class="mobile-menu-close">
            <svg class="icon" viewBox="0 0 24 24">
                <path d="M18 6L6 18M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    <div class="mobile-auth-buttons">
        <a href="#" class="btn btn-primary">Увійти</a>
        <a href="#" class="btn btn-outline">Зарегеструватися</a>
    </div>
    <div class="mobile-menu-body">
        <div class="mobile-menu-item">
            <a href="#" class="mobile-menu-link">Головна</a>
        </div>
        <div class="mobile-menu-item">
            <a href="#" class="mobile-menu-link">КАТАЛОГ
                <button class="mobile-menu-toggle-submenu">
                    <svg class="icon icon-sm" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
            </a>
            <ul class="mobile-submenu">
                <li><a href="#" class="mobile-menu-link">Сири</a></li>
                <li><a href="#" class="mobile-menu-link">Молочні продукти</a></li>
                <li><a href="#" class="mobile-menu-link">М'ясо та яйця</a></li>
                <li><a href="#" class="mobile-menu-link">Ковбаси та делікатеси</a></li>
                <li><a href="#" class="mobile-menu-link">Заморожені продукти</a></li>
                <li><a href="#" class="mobile-menu-link">Бакалія</a></li>
                <li><a href="#" class="mobile-menu-link">Крафтові вина</a></li>
                <li><a href="#" class="mobile-menu-link">Фрукти, овочі та зелень</a></li>
            </ul>
            </div>
            <div class="mobile-menu-item">
                <a href="#" class="mobile-menu-link">Про нас</a>
            </div>
            <div class="mobile-menu-item">
                <a href="#" class="mobile-menu-link">Партнерство</a>
            </div>
            <div class="mobile-menu-item">
                <a href="#" class="mobile-menu-link">Фермери</a>
            </div>
            <div class="mobile-menu-item">
                <a href="#" class="mobile-menu-link">Блог</a>
            </div>
            <div class="mobile-menu-item">
                <a href="#" class="mobile-menu-link">Контакти</a>
            </div>
            <div class="mobile-menu-item">
                <a href="cart.php" class="mobile-menu-link">
                    <svg class="icon" viewBox="0 0 24 24">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <span>Кошик</span>
                    <span class="mobile-cart-count" id="mobile-cart-count">0</span>
                </a>
            </div>
    </div>
</div>
