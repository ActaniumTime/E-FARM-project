<!-- Buyer Dashboard -->
<?php 
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    include './partials/header.php';
    require_once __DIR__ . '/models/CRUD-oper/farmer.php';

?>


    <style>
        .section-title{
            font-size: 31px;
        }
    </style>

    <!-- Основной контент страницы -->
<main class="container">
    <!-- Секція "Про компанію" -->
    <section class="about-section">
        <div class="about-header">
            <h1 class="section-title">Ласкаво просимо до FarmFresh</h1>
            <p class="about-subtitle">З'єднуємо фермерів з споживачами з 2015 року</p>
        </div>
    </section>

    <!-- Секція "Наші принципи" -->
    <section class="values-section">
        <h2 class="section-title">Наші принципи</h2>

        <div class="advantages-grid">
            <div class="advantage-card">
                <h3 class="advantage-title">100% Органічно</h3>
                <p class="advantage-description">Жодних хімікатів та ГМО. Лише натуральні методи вирощування</p>
            </div>

            <div class="advantage-card">
                <h3 class="advantage-title">Прямо з ферми</h3>
                <p class="advantage-description">Скорочуємо ланцюг постачання — продукти надходять безпосередньо від виробника</p>
            </div>

            <div class="advantage-card">
                <h3 class="advantage-title">З турботою про природу</h3>
                <p class="advantage-description">Використовуємо екологічну упаковку та відновлювані джерела енергії</p>
            </div>

            <!-- Додані блоки -->
            <div class="advantage-card">
                <h3 class="advantage-title">Підтримка місцевих фермерів</h3>
                <p class="advantage-description">Надаємо перевагу регіональним виробникам та підтримуємо розвиток сільських громад</p>
            </div>

        </div>
    </section>

    <!-- Секція "Команда" -->
    <section class="team-section">
        <h2 class="section-title">Наша команда</h2>

        <div class="farmers-grid">
            <div class="farmer-card">
                <div class="farmer-image">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" 
                         alt="Іван Петров">
                </div>
                <div class="farmer-content">
                    <h3 class="farmer-name">Іван Петров</h3>
                    <p class="farmer-location">
                        Засновник компанії
                    </p>
                    <p class="farmer-description">Сільськогосподарський експерт з 15-річним досвідом роботи в органічному землеробстві</p>
                </div>
            </div>

            <div class="farmer-card">
                <div class="farmer-image">
                    <img src="https://images.unsplash.com/photo-1580894908361-967195033215?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                         alt="Марія Сидорова">
                </div>
                <div class="farmer-content">
                    <h3 class="farmer-name">Марія Сидорова</h3>
                    <p class="farmer-location">
                        Головний агроном
                    </p>
                    <p class="farmer-description">Спеціаліст із сталого розвитку та органічних технологій</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Секція контактів -->
    <section class="contact-section">
        <div class="footer-column">
            <h3 style="color: black;">Контакти</h3>
            <ul class="footer-contact">
                <li class="footer-contact-item">
                    <i class="icon">📞</i>
                    +38 (495) 123-45-67
                </li>
                <li class="footer-contact-item">
                    <i class="icon">✉️</i>
                    info@farmfresh.ru
                </li>
                <li class="footer-contact-item">
                    <i class="icon">🏢</i>
                    м. Київ, вул. Фермерська, 123
                </li>
            </ul>
        </div>
    </section>
</main>

</body>
</html>
<?php include './partials/footer.php'; ?>
