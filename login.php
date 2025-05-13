<?php include './partials/header.php'; ?>

<section class="auth-section">
    <div class="container">
        <div class="auth-container">
            <div class="auth-card">
                <h2 class="auth-title">Вхід в аккаунт</h2>
                <p class="auth-subtitle">Увійдіть, щоб отримати доступ до своїх замовлень та особистих даних</p>
                
                <form class="auth-form" id="login-form">
                    <div class="form-group">
                        <label for="username">Ім'я користувача або Email</label>
                        <div class="input-wrapper">
                            <svg class="input-icon" viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <input type="text" id="username" name="username" placeholder="Введіть ім'я користувача або email" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <div class="input-wrapper">
                            <svg class="input-icon" viewBox="0 0 24 24">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            <input type="password" id="password" name="password" placeholder="Введіть пароль" required>
                            <button type="button" class="password-toggle">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <div class="form-options">
                        <div class="remember-me">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Запам'ятати мене</label>
                        </div>
                        <a href="#" class="forgot-password">Забули пароль?</a>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block">Увійти</button>
                </form>
                
                <div class="auth-divider">
                    <span>або</span>
                </div>
                
                <div class="auth-footer">
                    <p>Якщо не маєте аккаунта.Вм можете <a href="register.php">Зареєструватися</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
document.querySelector('.auth-form').addEventListener('submit', async (e) => {
    e.preventDefault();

    const form = e.target; // 🔴 Этого не хватает
    const formData = new FormData(form);

    const response = await fetch("models/Login.php", {
        method: "POST",
        body: formData
    });

    const result = await response.json();

    // Очистка предыдущих сообщений
    form.querySelectorAll(".success-message, .error-message").forEach(el => el.remove());

    const message = document.createElement("div");
    message.style.padding = "1rem";
    message.style.borderRadius = "var(--border-radius-sm)";
    message.style.marginBottom = "1rem";
    message.style.textAlign = "center";
    message.style.fontWeight = "bold";

    if (result.success) {
        message.classList.add("success-message");
        message.style.backgroundColor = "#28a745";
        message.style.color = "#fff";
        message.textContent = result.message;
        form.prepend(message);
        setTimeout(() => window.location.href = "buyer-dashboard.php", 1000);
    } else {
        message.classList.add("error-message");
        message.style.backgroundColor = "#dc3545";
        message.style.color = "#fff";
        message.textContent = result.message;
        form.prepend(message);
    }
});

</script>

<?php include './partials/footer.php'; ?>
