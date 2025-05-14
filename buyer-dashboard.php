<!-- Buyer Dashboard -->
<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include './partials/header.php';
    require_once __DIR__ . '/models/CRUD-oper/farmer.php';

?>

<style>.cards-container {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    margin: 20px 0;
}

.order-card {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    padding: 15px;
    width: 300px;
    border-radius: 8px;
    box-shadow: 1px 1px 6px rgba(0,0,0,0.1);
    transition: transform 0.2s;
}

.order-card:hover {
    transform: scale(1.02);
}

.order-card h3 {
    margin-top: 0;
}

.view-button {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 12px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.view-button:hover {
    background-color: #45a049;
}
</style>

<link rel="stylesheet" href="buyer-dashboard-styles.css">

<div class="dashboard-container">
    <!-- Sidebar -->
    <div class="dashboard-sidebar">
        <div class="farmer-avatar">
            <?php 
                $avatarPath = getSpecificUserDataByID($_SESSION['user_id'], 'avatar_path'); 
                $userName = getSpecificUserDataByID($_SESSION['user_id'], 'username');
            ?>
            <img src="<?php echo './public/img/' . htmlspecialchars($avatarPath); ?>" alt="Іван Петренко" >

        </div>
        <h3 class="farmer-name" style="text-align: center;"> <? echo htmlspecialchars($userName); ?></h3>
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
                <li>
                    <?php  
                        echo '<a href="farmer-dashboard.php?id=' . $_SESSION['user_id'] . '" class="dashboard-nav-item" data-section="external">Перейти до кабинету фермера</a>';
                    ?>
                    
                </li>
            </ul>
        </nav>
        
    </div>


    <div class="dashboard-content">
    <div class="dashboard-section active" id="profile-section">
        <h2>Мій профіль</h2>
        <form class="profile-form">
            <div class="form-group">
                <label for="profile-image">Фото профілю (Аватарка)</label>
                <input type="file" id="profileImage" name="profileImage">
            </div>

            <div class="form-group">
                <label for="userID">UserID</label>
                <input type="text" id="userID" name="userID" placeholder="Ваш унікальний ID">
            </div>

            <div class="form-group">
                <label for="userName">Ім'я користувача</label>
                <input type="text" id="userName" name="userName" placeholder="Введіть ім'я користувача">
            </div>

            <div class="form-group">
                <label for="age">Вік</label>
                <input type="number" id="age" name="age" placeholder="Введіть ваш вік">
            </div>

            <div class="form-group">
                <label for="dateOfBD">Дата народження</label>
                <input type="date" id="dateOfBD" name="dateOfBD">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="example@example.com">
            </div>

            <div class="form-group">
                <label for="cardNumber">Номер картки</label>
                <input type="text" id="cardNumber" name="cardNumber" placeholder="XXXX XXXX XXXX XXXX">
            </div>

            <div class="form-group">
                <label for="address">Адреса</label>
                <input type="text" id="address" name="address" placeholder="м. Київ, вул. Хрещатик, 1">
            </div>

            <button type="submit" class="btn btn-primary">Зберегти зміни</button>
        </form>
    </div>

        <div class="dashboard-section" id="orders-section">
            <h2>Історія покупок</h2>

            <?php
                $orders = GetAllOrdersByUserID($_SESSION['user_id']); // передай ID текущего пользователя
            ?>

            <div class="cards-container">
                <?php foreach ($orders as $order): ?>
                    <div class="order-card">
                        <h3>Замовлення #<?= htmlspecialchars($order['OrderID']) ?></h3>
                        <p><strong>Сума:</strong> ₴<?= number_format($order['TotalAmount'], 2) ?></p>
                        <p><strong>Статус:</strong> <?= htmlspecialchars($order['Status']) ?></p>
                        <p><strong>Дата:</strong> <?= date('d.m.Y H:i', strtotime($order['CreatedAt'])) ?></p>
                        <a href="orderInfo.php?id=<?= urlencode($order['OrderID']) ?>" class="view-button">Переглянути</a>
                    </div>
                <?php endforeach; ?>
                <?php if (empty($orders)): ?>
                    <p>Немає замовлень.</p>
                <?php endif; ?>
            </div>



        </div>

        <div class="dashboard-section" id="favorites-section">
            <h2>Улюблені товари (А ИХ НЕТУ НАХУЙ)</h2>
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
    

    document.querySelectorAll('.dashboard-nav-item').forEach(item => {
        item.addEventListener('click', function(e) {
            const sectionId = this.getAttribute('data-section');
            if (sectionId === 'external') return; 

            e.preventDefault();
            document.querySelectorAll('.dashboard-nav-item').forEach(nav => nav.classList.remove('active'));
            this.classList.add('active');

            document.querySelectorAll('.dashboard-section').forEach(section => {
                section.classList.remove('active');
            });
            document.getElementById(sectionId).classList.add('active');
        });
    });

document.addEventListener('DOMContentLoaded', function () {
    const profileForm = document.querySelector('.profile-form');

    profileForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(profileForm);

        fetch('./models/updateBuyerData.php', {
            method: 'POST',
            body: formData, // НЕ указываем Content-Type вручную!
        })
        .then(async response => {
            const contentType = response.headers.get('content-type');
            const isJson = contentType && contentType.includes('application/json');
            const data = isJson ? await response.json() : await response.text();

            if (!response.ok) {
                const message = typeof data === 'string' ? data : (data.message || 'Невідома помилка');
                throw new Error(`Статус ${response.status}: ${message}`);
            }

            if (typeof data === 'object' && data.success) {
                alert('Профіль успішно оновлено!' + (data.message ? `\n${data.message}` : ''));
            } else {
                const message = typeof data === 'string' ? data : (data.message || 'Невідома помилка');
                alert('Помилка оновлення профілю: ' + message);
            }
        })
        .catch(error => {
            console.error('Помилка відправки форми:', error);
            alert('Виникла помилка: ' + error.message);
        });
    });
});


</script>
<?php include './partials/footer.php'; ?>