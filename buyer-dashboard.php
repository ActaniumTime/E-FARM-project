<!-- Buyer Dashboard -->
<?php include './partials/header.php'; ?>

<link rel="stylesheet" href="buyer-dashboard-styles.css">

<div class="dashboard-container">
    <!-- Sidebar -->
    <div class="dashboard-sidebar">
    <div class="farmer-avatar">
                <img src="https://images.unsplash.com/photo-1500937386664-56d1dfef3854?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Іван Петренко">
            </div>
            <h3 class="farmer-name" style="text-align: center;">Іван Петренко</h3>
            <a style="text-align: center;" href="farmer-profile.php?farmer=ivan-petrenko" class="view-public-profile">
                <svg class="icon icon-sm" viewBox="0 0 24 24">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                    <polyline points="15 3 21 3 21 9"></polyline>
                    <line x1="10" y1="14" x2="21" y2="3"></line>
                </svg>
            </a>

        <nav class="dashboard-nav">
            <ul>
                <li><a href="#" class="dashboard-nav-item active" data-section="profile-section">Профіль</a></li>
                <li><a href="#" class="dashboard-nav-item" data-section="orders-section">Мої покупки</a></li>
                <li><a href="#" class="dashboard-nav-item" data-section="favorites-section">Улюблені товари</a></li>
                <li><a href="farmer-dashboard.php" class="dashboard-nav-item" data-section="external">Перейти до кабинету фермера</a></li>

            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="dashboard-content">
        <!-- Profile Section -->
        <div class="dashboard-section active" id="profile-section">
            <h2>Мій профіль</h2>
            <form class="profile-form">
                <div class="form-group">
                    <label for="profile-image">Фото профілю</label>
                    <input type="file" id="profile-image">
                </div>
                <div class="form-group">
                    <label for="first-name">Ім'я</label>
                    <input type="text" id="first-name" value="Олена">
                </div>
                <div class="form-group">
                    <label for="last-name">Прізвище</label>
                    <input type="text" id="last-name" value="Іванова">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" value="olena@example.com">
                </div>
                <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input type="tel" id="phone" value="+380 97 123 4567">
                </div>
                <div class="form-group">
                    <label for="address">Адреса доставки</label>
                    <input type="text" id="address" value="м. Львів, вул. Зеленa, 12">
                </div>
                <button type="submit" class="btn btn-primary">Зберегти зміни</button>
            </form>
        </div>

        <!-- Orders Section -->
        <div class="dashboard-section" id="orders-section">
            <h2>Історія покупок</h2>
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Дата</th>
                        <th>Продавець</th>
                        <th>Сума</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#ORD-00123</td>
                        <td>05.05.2025</td>
                        <td>Зелений сад</td>
                        <td>₴450</td>
                        <td>Доставлено</td>
                    </tr>
                    <tr>
                        <td>#ORD-00119</td>
                        <td>01.05.2025</td>
                        <td>Органік ферма</td>
                        <td>₴320</td>
                        <td>Скасовано</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Favorites Section -->
        <div class="dashboard-section" id="favorites-section">
            <h2>Улюблені товари</h2>
            <div class="favorites-grid">
                <div class="product-card">
                    <img src="/images/tomatoes.jpg" alt="Помідори">
                    <h3>Помідори органічні</h3>
                    <p>₴45 / кг</p>
                    <div class="buttons-acts">
                        <button class="btn btn-outline">Перейти до товару</button>
                        <button class="btn btn-sm btn-danger">Видалити</button>
                    </div>
                </div>
                <div class="product-card">
                    <img src="/images/apples.jpg" alt="Яблука">
                    <h3>Яблука органічні</h3>
                    <p>₴40 / кг</p>
                    <div class="buttons-acts">
                        <button class="btn btn-outline">Перейти до товару</button>
                        <button class="btn btn-sm btn-danger">Видалити</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Переключение разделов дашборда
    document.querySelectorAll('.dashboard-nav-item').forEach(item => {
        item.addEventListener('click', function(e) {
            const sectionId = this.getAttribute('data-section');
            if (sectionId === 'external') return; // Пропустить внешнюю ссылку

            e.preventDefault();
            document.querySelectorAll('.dashboard-nav-item').forEach(nav => nav.classList.remove('active'));
            this.classList.add('active');

            document.querySelectorAll('.dashboard-section').forEach(section => {
                section.classList.remove('active');
            });
            document.getElementById(sectionId).classList.add('active');
        });
    });
</script>


<script src="buyer-dashboard.js"></script>
<?php include './partials/footer.php'; ?>