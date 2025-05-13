<?php include './partials/header.php'; ?>

<div class="dashboard-container">
    <div class="dashboard-content">
        <?php
        
        $projectId = isset($_GET['id']) ? intval($_GET['id']) : 0;
        
        // Фіктивні дані проектів
        $projects = [
            1 => [
                'title' => 'Спільне вирощування органічних овочів',
                'status' => 'active',
                'region' => 'Херсонська область',
                'category' => 'Овочівництво',
                'participants' => 8,
                'deadline' => '30.09.2025',
                'description' => 'Проект з вирощування органічних овочів на спільній земельній ділянці. Мета - об\'єднати ресурси для створення ефективного органічного господарства та спільного виходу на ринок. Проект передбачає спільну оренду земельної ділянки площею 5 га, закупівлю насіння та обладнання для поливу, а також спільний догляд за посівами та збір врожаю. Кожен учасник проекту отримує частку врожаю пропорційно своєму внеску. Також планується спільний вихід на ринок під єдиним брендом "Органічна долина".',
                'images' => [
                    'https://images.unsplash.com/photo-1523741543316-beb7fc7023d8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                    'https://images.unsplash.com/photo-1582284540020-8acbe03f4924?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                    'https://images.unsplash.com/photo-1471193945509-9ad0617afabf?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                    'https://images.unsplash.com/photo-1470072768013-bf9532016c10?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'
                ],
                'creator' => 'Олександр Петренко',
                'creatorId' => 123,
                'createdAt' => '15.03.2025',
                'participants_list' => [
                    ['id' => 123, 'name' => 'Олександр Петренко', 'role' => 'Організатор', 'avatar' => 'https://randomuser.me/api/portraits/men/1.jpg'],
                    ['id' => 124, 'name' => 'Марія Коваленко', 'role' => 'Учасник', 'avatar' => 'https://randomuser.me/api/portraits/women/2.jpg'],
                    ['id' => 125, 'name' => 'Іван Сидоренко', 'role' => 'Учасник', 'avatar' => 'https://randomuser.me/api/portraits/men/3.jpg'],
                    ['id' => 126, 'name' => 'Олена Шевченко', 'role' => 'Учасник', 'avatar' => 'https://randomuser.me/api/portraits/women/4.jpg'],
                    ['id' => 127, 'name' => 'Василь Мельник', 'role' => 'Учасник', 'avatar' => 'https://randomuser.me/api/portraits/men/5.jpg'],
                    ['id' => 128, 'name' => 'Наталія Бондаренко', 'role' => 'Учасник', 'avatar' => 'https://randomuser.me/api/portraits/women/6.jpg'],
                    ['id' => 129, 'name' => 'Михайло Ткаченко', 'role' => 'Учасник', 'avatar' => 'https://randomuser.me/api/portraits/men/7.jpg'],
                    ['id' => 130, 'name' => 'Тетяна Кравченко', 'role' => 'Учасник', 'avatar' => 'https://randomuser.me/api/portraits/women/8.jpg']
                ],
            ],
            2 => [
                'title' => 'Спільний сад органічних ягід',
                'status' => 'planning',
                'region' => 'Київська область',
                'category' => 'Садівництво',
                'participants' => 5,
                'deadline' => '15.10.2025',
                'description' => 'Проект зі створення спільного саду органічних ягід (полуниця, малина, лохина). Включає спільне придбання саджанців, обладнання для поливу та догляду за рослинами. Мета проекту - створення ефективного органічного ягідного господарства та спільний вихід на ринок. Проект передбачає спільну оренду земельної ділянки площею 3 га, закупівлю саджанців та обладнання для поливу, а також спільний догляд за рослинами та збір врожаю. Кожен учасник проекту отримує частку врожаю пропорційно своєму внеску. Також планується спільний вихід на ринок під єдиним брендом "Ягідний рай".',
                'images' => [
                    'https://images.unsplash.com/photo-1501746877-14782df58970?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                    'https://images.unsplash.com/photo-1559181567-c3190ca9959b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                    'https://images.unsplash.com/photo-1563746924237-f81657aaf4af?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                    'https://images.unsplash.com/photo-1595231776515-ddffb1f4eb73?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'
                ],

                'creator' => 'Ірина Мельник',
                'creatorId' => 145,
                'createdAt' => '10.04.2025',
                'participants_list' => [
                    ['id' => 145, 'name' => 'Ірина Мельник', 'role' => 'Організатор', 'avatar' => 'https://randomuser.me/api/portraits/women/12.jpg'],
                    ['id' => 146, 'name' => 'Андрій Ковальчук', 'role' => 'Учасник', 'avatar' => 'https://randomuser.me/api/portraits/men/15.jpg'],
                    ['id' => 147, 'name' => 'Оксана Литвин', 'role' => 'Учасник', 'avatar' => 'https://randomuser.me/api/portraits/women/18.jpg'],
                    ['id' => 148, 'name' => 'Сергій Бойко', 'role' => 'Учасник', 'avatar' => 'https://randomuser.me/api/portraits/men/22.jpg'],
                    ['id' => 149, 'name' => 'Юлія Шевчук', 'role' => 'Учасник', 'avatar' => 'https://randomuser.me/api/portraits/women/25.jpg']
                ],
            ],
        ];
        
        if (!isset($projects[$projectId])) {
            echo '<div class="error-message">Проект не знайдено</div>';
        } else {
            $project = $projects[$projectId];
        ?>
        
        <div class="project-details">
            <div class="project-details-header">
                <div class="back-link">
                    <a href="farmer-collaboration.php" class="btn btn-link">
                        <svg class="icon icon-sm" viewBox="0 0 24 24">
                            <path d="M19 12H5M12 19l-7-7 7-7"></path>
                        </svg>
                        Назад до списку проектів
                    </a>
                </div>
                
                <div class="project-title-container">
                    <h1 class="project-title"><?php echo $project['title']; ?></h1>
                    <div class="project-badge <?php echo $project['status']; ?>">
                        <?php 
                            if ($project['status'] === 'active') echo 'Активний';
                            elseif ($project['status'] === 'planning') echo 'Планування';
                            elseif ($project['status'] === 'completed') echo 'Завершено';
                        ?>
                    </div>
                </div>
                
                <div class="project-meta">
                    <div class="project-meta-item">
                        <svg class="icon icon-sm" viewBox="0 0 24 24">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span><?php echo $project['region']; ?></span>
                    </div>
                    <div class="project-meta-item">
                        <svg class="icon icon-sm" viewBox="0 0 24 24">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span><?php echo $project['participants']; ?> учасників</span>
                    </div>
                    <div class="project-meta-item">
                        <svg class="icon icon-sm" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        <span>Термін: <?php echo $project['deadline']; ?></span>
                    </div>
                    <div class="project-meta-item">
                        <svg class="icon icon-sm" viewBox="0 0 24 24">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        <span><?php echo $project['category']; ?></span>
                    </div>
                    <div class="project-meta-item">
                        <svg class="icon icon-sm" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span>Створено: <?php echo $project['creator']; ?></span>
                    </div>
                    <div class="project-meta-item">
                        <svg class="icon icon-sm" viewBox="0 0 24 24">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <span>Дата створення: <?php echo $project['createdAt']; ?></span>
                    </div>
                </div>
            </div>
            
            <div class="project-content">
                <div class="project-main">
                    <div class="project-section">
                        <h2 class="section-title">Опис проекту</h2>
                        <div class="project-description">
                            <?php echo nl2br($project['description']); ?>
                        </div>
                    </div>
                    
                    <div class="project-section">
                        <h2 class="section-title">Галерея проекту</h2>
                        <div class="project-gallery">
                            <?php foreach ($project['images'] as $image): ?>
                            <div class="gallery-item">
                                <img src="<?php echo $image; ?>" alt="Зображення проекту">
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
      
                </div>
                
                <div class="project-sidebar">
                    <div class="sidebar-section">
                        <h2 class="section-title">Учасники проекту</h2>
                        <div class="participants-list">
                            <?php foreach ($project['participants_list'] as $participant): ?>
                            <div class="participant">
                                <div class="participant-avatar">
                                    <img src="<?php echo $participant['avatar']; ?>" alt="<?php echo $participant['name']; ?>">
                                </div>
                                <div class="participant-info">
                                    <div class="participant-name"><?php echo $participant['name']; ?></div>
                                    <div class="participant-role"><?php echo $participant['role']; ?></div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <div class="sidebar-section">
                        <h2 class="section-title">Дії</h2>
                        <div class="project-actions">
                            <?php if ($project['status'] !== 'completed'): ?>
                            <button class="btn btn-primary btn-block">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                Редагувати проект
                            </button>
                            <?php endif; ?>
                            <button class="btn btn-secondary btn-block">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="7 10 12 15 17 10"></polyline>
                                    <line x1="12" y1="15" x2="12" y2="3"></line>
                                </svg>
                                Завантажити документи
                            </button>
                            <button class="btn btn-secondary btn-block">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="16"></line>
                                    <line x1="8" y1="12" x2="16" y2="12"></line>
                                </svg>
                                Додати завдання
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Модальне вікно для запрошення фермерів -->
        <div class="modal" id="invite-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Запросити фермерів до проекту</h3>
                    <button class="modal-close">
                        <svg class="icon" viewBox="0 0 24 24">
                            <path d="M18 6L6 18M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="search-container">
                        <input type="text" id="farmer-search" placeholder="Пошук фермерів...">
                        <button class="search-btn">
                            <svg class="icon icon-sm" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </button>
                    </div>
                    
                    <div class="farmers-list" id="farmers-list">
                        <!-- Список фермерів буде завантажено через JavaScript -->
                    </div>
                    
                    <div class="selected-farmers">
                        <h4>Вибрані фермери (<span id="selected-count">0</span>)</h4>
                        <div id="selected-farmers-list" class="selected-farmers-list">
                            <!-- Вибрані фермери будуть додані через JavaScript -->
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" id="cancel-invite-btn">Скасувати</button>
                        <button type="button" class="btn btn-primary" id="send-invites-btn">Надіслати запрошення</button>
                    </div>
                </div>
            </div>
        </div>
        
        <?php }?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Обробка запрошення фермерів
    const inviteBtn = document.getElementById('invite-btn');
    const inviteModal = document.getElementById('invite-modal');
    const modalClose = document.querySelector('#invite-modal .modal-close');
    const cancelInviteBtn = document.getElementById('cancel-invite-btn');
    const sendInvitesBtn = document.getElementById('send-invites-btn');
    const farmerSearch = document.getElementById('farmer-search');
    const farmersList = document.getElementById('farmers-list');
    const selectedFarmersList = document.getElementById('selected-farmers-list');
    const selectedCount = document.getElementById('selected-count');
    
    // Фіктивні дані фермерів для демонстрації
    const farmers = [
        { id: 201, name: 'Петро Іваненко', region: 'Київська область', avatar: 'https://randomuser.me/api/portraits/men/32.jpg' },
        { id: 202, name: 'Ольга Петренко', region: 'Львівська область', avatar: 'https://randomuser.me/api/portraits/women/33.jpg' },
        { id: 203, name: 'Микола Сидоренко', region: 'Одеська область', avatar: 'https://randomuser.me/api/portraits/men/34.jpg' },
        { id: 204, name: 'Анна Коваленко', region: 'Харківська область', avatar: 'https://randomuser.me/api/portraits/women/35.jpg' },
        { id: 205, name: 'Василь Шевченко', region: 'Дніпропетровська область', avatar: 'https://randomuser.me/api/portraits/men/36.jpg' },
        { id: 206, name: 'Марія Бондаренко', region: 'Херсонська область', avatar: 'https://randomuser.me/api/portraits/women/37.jpg' },
        { id: 207, name: 'Іван Мельник', region: 'Полтавська область', avatar: 'https://randomuser.me/api/portraits/men/38.jpg' },
        { id: 208, name: 'Юлія Ткаченко', region: 'Вінницька область', avatar: 'https://randomuser.me/api/portraits/women/39.jpg' }
    ];
    
    const selectedFarmers = new Set();
    
    // Функція для відображення списку фермерів
    function renderFarmersList(searchTerm = '') {
        farmersList.innerHTML = '';
        
        const filteredFarmers = farmers.filter(farmer => 
            farmer.name.toLowerCase().includes(searchTerm.toLowerCase()) || 
            farmer.region.toLowerCase().includes(searchTerm.toLowerCase())
        );
        
        if (filteredFarmers.length === 0) {
            farmersList.innerHTML = '<div class="no-results">Фермерів не знайдено</div>';
            return;
        }
        
        filteredFarmers.forEach(farmer => {
            const farmerItem = document.createElement('div');
            farmerItem.className = 'farmer-item';
            if (selectedFarmers.has(farmer.id)) {
                farmerItem.classList.add('selected');
            }
            
            farmerItem.innerHTML = `
                <div class="farmer-avatar">
                    <img src="${farmer.avatar}" alt="${farmer.name}">
                </div>
                <div class="farmer-info">
                    <div class="farmer-name">${farmer.name}</div>
                    <div class="farmer-region">${farmer.region}</div>
                </div>
                <div class="farmer-select">
                    <input type="checkbox" id="farmer-${farmer.id}" ${selectedFarmers.has(farmer.id) ? 'checked' : ''}>
                    <label for="farmer-${farmer.id}"></label>
                </div>
            `;
            
            farmerItem.addEventListener('click', function() {
                const checkbox = this.querySelector('input[type="checkbox"]');
                checkbox.checked = !checkbox.checked;
                
                if (checkbox.checked) {
                    selectedFarmers.add(farmer.id);
                    this.classList.add('selected');
                } else {
                    selectedFarmers.delete(farmer.id);
                    this.classList.remove('selected');
                }
                
                updateSelectedFarmersList();
            });
            
            farmersList.appendChild(farmerItem);
        });
    }
    
    // Функція для оновлення списку вибраних фермерів
    function updateSelectedFarmersList() {
        selectedFarmersList.innerHTML = '';
        selectedCount.textContent = selectedFarmers.size;
        
        if (selectedFarmers.size === 0) {
            selectedFarmersList.innerHTML = '<div class="no-selected">Не вибрано жодного фермера</div>';
            return;
        }
        
        farmers.forEach(farmer => {
            if (selectedFarmers.has(farmer.id)) {
                const selectedItem = document.createElement('div');
                selectedItem.className = 'selected-farmer';
                
                selectedItem.innerHTML = `
                    <div class="selected-farmer-info">
                        <img src="${farmer.avatar}" alt="${farmer.name}" class="selected-farmer-avatar">
                        <span>${farmer.name}</span>
                    </div>
                    <button class="remove-selected" data-id="${farmer.id}">×</button>
                `;
                
                selectedFarmersList.appendChild(selectedItem);
            }
        });
        
        // Додаємо обробники для кнопок видалення
        document.querySelectorAll('.remove-selected').forEach(button => {
            button.addEventListener('click', function(e) {
                e.stopPropagation();
                const farmerId = parseInt(this.dataset.id);
                selectedFarmers.delete(farmerId);
                updateSelectedFarmersList();
                renderFarmersList(farmerSearch.value);
            });
        });
    }
    
    // Відкриття модального вікна
    function openInviteModal() {
        inviteModal.style.display = 'block';
        document.body.style.overflow = 'hidden';
        renderFarmersList();
        updateSelectedFarmersList();
    }
    
    // Закриття модального вікна
    function closeInviteModal() {
        inviteModal.style.display = 'none';
        document.body.style.overflow = '';
    }
    
    // Надсилання запрошень
    function sendInvites() {
        if (selectedFarmers.size === 0) {
            alert('Виберіть хоча б одного фермера');
            return;
        }
        
        // Тут буде код для відправки запрошень на сервер
        // В реальному додатку тут буде AJAX запит
        
        alert(`Запрошення надіслано ${selectedFarmers.size} фермерам`);
        selectedFarmers.clear();
        closeInviteModal();
    }
    
    // Додавання обробників подій
    inviteBtn.addEventListener('click', openInviteModal);
    modalClose.addEventListener('click', closeInviteModal);
    cancelInviteBtn.addEventListener('click', closeInviteModal);
    sendInvitesBtn.addEventListener('click', sendInvites);
    
    farmerSearch.addEventListener('input', function() {
        renderFarmersList(this.value);
    });
    
    // Закриття модального вікна при кліку поза ним
    window.addEventListener('click', function(event) {
        if (event.target === inviteModal) {
            closeInviteModal();
        }
    });
    
    // Обробка форми коментарів
    const commentForm = document.getElementById('comment-form');
    if (commentForm) {
        commentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const commentText = document.getElementById('comment-text').value;
            if (!commentText.trim()) return;
            
            const commentsList = document.querySelector('.comments-list');
            const newComment = document.createElement('div');
            newComment.className = 'comment';
            
            newComment.innerHTML = `
                <div class="comment-avatar">
                    <img src="https://randomuser.me/api/portraits/men/99.jpg" alt="Ваш аватар">
                </div>
                <div class="comment-content">
                    <div class="comment-header">
                        <div class="comment-author">Ви</div>
                        <div class="comment-date">Щойно</div>
                    </div>
                    <div class="comment-text">
                        ${commentText.replace(/\n/g, '<br>')}
                    </div>
                </div>
            `;
            
            commentsList.appendChild(newComment);
            document.getElementById('comment-text').value = '';
        });
    }
});
</script>

<?php include './partials/footer.php'; ?>
