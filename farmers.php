<?php 
include './partials/header.php';
require_once './models/GetData/farmers_data.php';

// Get all categories for the filter dropdown
$categories = getCategories();
?>

<section class="farmers-hero">
    <div class="container">
        <div class="farmers-hero-content">
            <h1 class="farmers-hero-title">Наші фермери</h1>
            <p class="farmers-hero-subtitle">Познайомтеся з людьми, які вирощують для вас найкращі продукти</p>
        </div>
    </div>
</section>

<section class="farmers-section">
    <div class="container">
        <div class="farmers-filters">
            <div class="farmers-search">
                <div class="search-input-wrapper">
                    <svg class="search-icon" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="text" id="farmers-search-input" placeholder="Пошук фермерів...">
                    <button class="search-clear" id="farmers-search-clear">
                        <svg class="icon" viewBox="0 0 24 24">
                            <path d="M18 6L6 18M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="farmers-filter-container">
                <label for="farmers-filter">Фільтрувати за:</label>
                <select id="farmers-filter" class="farmers-filter">
                    <option value="all">Всі категорії</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo htmlspecialchars($category['id']); ?>"><?php echo htmlspecialchars($category['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="farmers-grid" id="farmers-grid">
            <!-- Farmers will be loaded here via JavaScript -->
        </div>

        <div class="farmers-empty" id="farmers-empty" style="display: none;">
            <svg class="icon icon-lg" viewBox="0 0 24 24">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <h3>Фермерів не знайдено</h3>
            <p>Спробуйте змінити параметри пошуку або фільтри</p>
            <button class="btn btn-primary" id="reset-farmers-search">Скинути пошук</button>
        </div>
    </div>
</section>

<section class="join-farmers-section">
    <div class="container">
        <div class="join-farmers-content">
            <div class="join-farmers-text">
                <h2>Приєднуйтесь до нашої спільноти фермерів</h2>
                <p>Ви фермер і хочете продавати свої продукти на нашій платформі? Ми завжди раді новим партнерам!</p>
                <ul class="join-benefits">
                    <li>
                        <svg class="icon" viewBox="0 0 24 24">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>Прямий доступ до клієнтів</span>
                    </li>
                    <li>
                        <svg class="icon" viewBox="0 0 24 24">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>Справедливі ціни на ваші продукти</span>
                    </li>
                    <li>
                        <svg class="icon" viewBox="0 0 24 24">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>Підтримка у логістиці та маркетингу</span>
                    </li>
                    <li>
                        <svg class="icon" viewBox="0 0 24 24">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span>Частина спільноти однодумців</span>
                    </li>
                </ul>
                <a href="#" class="btn btn-primary btn-lg">Стати партнером</a>
            </div>
        </div>
    </div>
</section>

<!-- Add JavaScript to load farmers from the API -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const farmersGrid = document.getElementById('farmers-grid');
    const farmersEmpty = document.getElementById('farmers-empty');
    const searchInput = document.getElementById('farmers-search-input');
    const searchClear = document.getElementById('farmers-search-clear');
    const categoryFilter = document.getElementById('farmers-filter');
    const resetSearchBtn = document.getElementById('reset-farmers-search');
    
    let currentSearch = '';
    let currentCategory = 'all';
    
    // Load farmers based on current filters
    function loadFarmers() {
        // Build query string
        let url = './models/GetData/get_farmers.php';
        const params = [];
        
        if (currentSearch) {
            params.push(`search=${encodeURIComponent(currentSearch)}`);
        }
        
        if (currentCategory !== 'all') {
            params.push(`category=${encodeURIComponent(currentCategory)}`);
        }
        
        if (params.length > 0) {
            url += '?' + params.join('&');
        }
        
        // Show loading state
        farmersGrid.innerHTML = '<div class="loading">Завантаження...</div>';
        
        // Fetch farmers
        fetch(url)
            .then(response => response.json())
            .then(farmers => {
                if (farmers.length === 0) {
                    // Show empty state
                    farmersGrid.innerHTML = '';
                    farmersEmpty.style.display = 'flex';
                } else {
                    // Render farmers
                    farmersEmpty.style.display = 'none';
                    renderFarmers(farmers);
                }
            })
            .catch(error => {
                console.error('Error loading farmers:', error);
                farmersGrid.innerHTML = '<div class="error">Помилка завантаження даних. Спробуйте пізніше.</div>';
            });
    }
    
    // Render farmers to the grid
    function renderFarmers(farmers) {
        farmersGrid.innerHTML = '';
        
        farmers.forEach(farmer => {
            // Create categories HTML
            const categoriesHtml = farmer.categories.map(cat => 
                `<span class="farmer-category">${cat.name}</span>`
            ).join('');
            
            // Create farmer card
            const farmerCard = document.createElement('div');
            farmerCard.className = 'farmer-card';
            farmerCard.innerHTML = `
                <div class="farmer-image">
                    <img src="${farmer.image}" alt="${farmer.name}">
                </div>
                <div class="farmer-content">
                    <h3 class="farmer-name">${farmer.name}</h3>
                    <div class="farmer-location">
                        <svg class="icon" viewBox="0 0 24 24">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span>${farmer.location}</span>
                    </div>
                    <div class="farmer-categories">
                        ${categoriesHtml}
                    </div>
                    <p class="farmer-description">${farmer.description}</p>
                    <a href="farmer-profile.php?id=${farmer.id}" class="btn btn-outline">Детальніше</a>
                </div>
            `;
            
            farmersGrid.appendChild(farmerCard);
        });
    }
    
    // Event listeners
    searchInput.addEventListener('input', function() {
        currentSearch = this.value.trim();
        if (currentSearch === '') {
            searchClear.style.display = 'none';
        } else {
            searchClear.style.display = 'block';
        }
        loadFarmers();
    });
    
    searchClear.addEventListener('click', function() {
        searchInput.value = '';
        currentSearch = '';
        this.style.display = 'none';
        loadFarmers();
    });
    
    categoryFilter.addEventListener('change', function() {
        currentCategory = this.value;
        loadFarmers();
    });
    
    resetSearchBtn.addEventListener('click', function() {
        searchInput.value = '';
        currentSearch = '';
        searchClear.style.display = 'none';
        categoryFilter.value = 'all';
        currentCategory = 'all';
        loadFarmers();
    });
    
    // Initial load
    loadFarmers();
});
</script>

<?php include './partials/footer.php'; ?>