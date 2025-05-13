<?php include './partials/header.php'; ?>

<section class="auth-section">
    <div class="container">
        <div class="auth-container">
            <div class="auth-card">
                <h2 class="auth-title">Створення аккаунта</h2>
                <p class="auth-subtitle">Зареєструйтесь, щоб отримати доступ до всіх можливостей платформи</p>
                
                <form class="auth-form">
                    <div class="form-group">
                        <label for="username">Ім'я користувача</label>
                        <div class="input-wrapper">
                            <svg class="input-icon" viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <input type="text" id="username" name="username" placeholder="Введіть ім'я користувача" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-wrapper">
                            <svg class="input-icon" viewBox="0 0 24 24">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <input type="email" id="email" name="email" placeholder="Введіть email" required>
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
                        <div class="password-strength">
                            <div class="strength-bar">
                                <div class="strength-progress" style="width: 0%"></div>
                            </div>
                            <span class="strength-text">Надійність паролю</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm-password">Підтвердження паролю</label>
                        <div class="input-wrapper">
                            <svg class="input-icon" viewBox="0 0 24 24">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            <input type="password" id="confirm-password" name="confirm-password" placeholder="Підтвердіть пароль" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="terms-checkbox">
                            <input type="checkbox" id="terms" name="terms" required>
                            <label for="terms">Я погоджуюсь з <a href="#">Умовами використання</a> та <a href="#">Політикою конфіденційності</a></label>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block">Зареєструватися</button>
                </form>
                
                <div class="auth-divider">
                    <span>або</span>
                </div>
                
                <div class="auth-footer">
                    <p>Якщо вже маєте аккаунт. Ви можете <a href="login.php">Увійти</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include './partials/footer.php'; ?>

<script>
document.querySelector('.auth-form').addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(e.target);
    const response = await fetch("models/Registration.php", {
        method: "POST",
        body: formData
    });

    const result = await response.json();

e.target.querySelectorAll(".success-message, .error-message").forEach(el => el.remove());

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
    message.textContent = result.message || "Реєстрація успішна!";
    e.target.prepend(message);

    setTimeout(() => {
        window.location.href = "login.php";
    }, 1500);
} else {
    message.classList.add("error-message");
    message.style.backgroundColor = "#dc3545";
    message.style.color = "#fff";
    message.textContent = result.message || "Щось пішло не так...";
    e.target.prepend(message);
}

});
</script>
