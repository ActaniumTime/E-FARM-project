    <?php include './partials/header.php'; ?>
    <div class="dashboard-container">
        <!-- Main Content -->
        <div class="dashboard-content">
            <div class="section-header">
                <h2>Співпраця з фермерами</h2>
                <p class="section-description">Знаходьте проекти для співпраці з іншими фермерами, об'єднуйте зусилля та ресурси для досягнення спільних цілей</p>
            </div>

            <div class="collaboration-actions">
                <div class="collaboration-filters">
                    <div class="filter-group">
                        <label for="region-filter">Регіон:</label>
                        <select id="region-filter">
                            <option value="all">Всі регіони</option>
                            <option value="kyiv">Київська область</option>
                            <option value="lviv">Львівська область</option>
                            <option value="odesa">Одеська область</option>
                            <option value="kharkiv">Харківська область</option>
                            <option value="dnipro">Дніпропетровська область</option>
                            <option value="kherson">Херсонська область</option>
                            <option value="poltava">Полтавська область</option>
                            <option value="vinnytsia">Вінницька область</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="category-filter">Категорія:</label>
                        <select id="category-filter">
                            <option value="all">Всі категорії</option>
                            <option value="vegetables">Овочівництво</option>
                            <option value="fruits">Садівництво</option>
                            <option value="grain">Зернові культури</option>
                            <option value="dairy">Молочне господарство</option>
                            <option value="meat">М'ясне господарство</option>
                            <option value="poultry">Птахівництво</option>
                            <option value="beekeeping">Бджільництво</option>
                            <option value="other">Інше</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="status-filter">Статус:</label>
                        <select id="status-filter">
                            <option value="all">Всі статуси</option>
                            <option value="active">Активні</option>
                            <option value="planning">Планування</option>
                            <option value="completed">Завершені</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="projects-grid">
                <!-- Project 1 -->
                <div class="project-card" data-region="kherson" data-category="vegetables" data-status="active">
                    <div class="project-header">
                        <h3 class="project-title">Спільне вирощування органічних овочів</h3>
                        <div class="project-badge active">Активний</div>
                    </div>
                    <div class="project-info">
                        <div class="project-location">
                            <svg class="icon icon-sm" viewBox="0 0 24 24">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>Херсонська область</span>
                        </div>
                        <div class="project-participants">
                            <svg class="icon icon-sm" viewBox="0 0 24 24">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span>8 учасників</span>
                        </div>
                        <div class="project-deadline">
                            <svg class="icon icon-sm" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            <span>Термін: 30.09.2025</span>
                        </div>
                    </div>
                    <p class="project-description">
                        Проект з вирощування органічних овочів на спільній земельній ділянці. Мета - об'єднати ресурси для створення ефективного органічного господарства та спільного виходу на ринок.
                    </p>
                    <div class="project-media">
                        <div class="media-scroll">
                            <img src="https://images.unsplash.com/photo-1523741543316-beb7fc7023d8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Органічні овочі">
                            <img src="https://images.unsplash.com/photo-1582284540020-8acbe03f4924?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Поле з овочами">
                            <img src="https://images.unsplash.com/photo-1471193945509-9ad0617afabf?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Збір врожаю">
                            <img src="https://images.unsplash.com/photo-1470072768013-bf9532016c10?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Органічна ферма">
                        </div>
                        <div class="media-controls">
                            <button class="media-scroll-left">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg>
                            </button>
                            <button class="media-scroll-right">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="project-actions">
                        <a href="farmer-project-details.php?id=1" class="btn btn-primary">Детальніше</a>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="project-card" data-region="kyiv" data-category="fruits" data-status="planning">
                    <div class="project-header">
                        <h3 class="project-title">Спільний сад органічних ягід</h3>
                        <div class="project-badge planning">Планування</div>
                    </div>
                    <div class="project-info">
                        <div class="project-location">
                            <svg class="icon icon-sm" viewBox="0 0 24 24">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>Київська область</span>
                        </div>
                        <div class="project-participants">
                            <svg class="icon icon-sm" viewBox="0 0 24 24">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span>5 учасників</span>
                        </div>
                        <div class="project-deadline">
                            <svg class="icon icon-sm" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            <span>Термін: 15.10.2025</span>
                        </div>
                    </div>
                    <p class="project-description">
                        Проект зі створення спільного саду органічних ягід (полуниця, малина, лохина). Включає спільне придбання саджанців, обладнання для поливу та догляду за рослинами.
                    </p>
                    <div class="project-media">
                        <div class="media-scroll">
                            <img src="https://images.unsplash.com/photo-1501746877-14782df58970?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Ягідний сад">
                            <img src="https://images.unsplash.com/photo-1559181567-c3190ca9959b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Полуниця">
                            <img src="https://images.unsplash.com/photo-1563746924237-f81657aaf4af?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Малина">
                            <img src="https://images.unsplash.com/photo-1595231776515-ddffb1f4eb73?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Лохина">
                        </div>
                        <div class="media-controls">
                            <button class="media-scroll-left">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg>
                            </button>
                            <button class="media-scroll-right">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="project-actions">
                        <a href="farmer-project-details.php?id=2" class="btn btn-primary">Детальніше</a>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="project-card" data-region="lviv" data-category="dairy" data-status="active">
                    <div class="project-header">
                        <h3 class="project-title">Кооператив з виробництва органічних молочних продуктів</h3>
                        <div class="project-badge active">Активний</div>
                    </div>
                    <div class="project-info">
                        <div class="project-location">
                            <svg class="icon icon-sm" viewBox="0 0 24 24">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>Львівська область</span>
                        </div>
                        <div class="project-participants">
                            <svg class="icon icon-sm" viewBox="0 0 24 24">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span>12 учасників</span>
                        </div>
                        <div class="project-deadline">
                            <svg class="icon icon-sm" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            <span>Термін: 31.12.2025</span>
                        </div>
                    </div>
                    <p class="project-description">
                        Кооператив з виробництва органічних молочних продуктів. Спільне використання обладнання для переробки молока, створення спільного бренду та каналів збуту.
                    </p>
                    <div class="project-media">
                        <div class="media-scroll">
                            <img src="https://images.unsplash.com/photo-1528498033373-3c6c08e93d79?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Молочна ферма">
                            <img src="https://images.unsplash.com/photo-1563201515-adde2b9de97a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Молочні продукти">
                            <img src="https://images.unsplash.com/photo-1550583724-b2692b85b150?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Корови на пасовищі">
                            <img src="https://images.unsplash.com/photo-1628088062854-d1870b4553da?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Виробництво сиру">
                        </div>
                        <div class="media-controls">
                            <button class="media-scroll-left">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg>
                            </button>
                            <button class="media-scroll-right">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="project-actions">
                        <a href="farmer-project-details.php?id=3" class="btn btn-primary">Детальніше</a>
                    </div>
                </div>

                <!-- Project 4 -->
                <div class="project-card" data-region="odesa" data-category="grain" data-status="active">
                    <div class="project-header">
                        <h3 class="project-title">Спільне вирощування органічних зернових</h3>
                        <div class="project-badge active">Активний</div>
                    </div>
                    <div class="project-info">
                        <div class="project-location">
                            <svg class="icon icon-sm" viewBox="0 0 24 24">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>Одеська область</span>
                        </div>
                        <div class="project-participants">
                            <svg class="icon icon-sm" viewBox="0 0 24 24">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span>15 учасників</span>
                        </div>
                        <div class="project-deadline">
                            <svg class="icon icon-sm" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            <span>Термін: 15.08.2025</span>
                        </div>
                    </div>
                    <p class="project-description">
                        Проект зі спільного вирощування органічних зернових культур (пшениця, жито, ячмінь). Включає спільне використання техніки, закупівлю насіння та добрив, а також спільний збут продукції.
                    </p>
                    <div class="project-media">
                        <div class="media-scroll">
                            <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Пшеничне поле">
                            <img src="https://images.unsplash.com/photo-1535585209827-a15fcdbc4c2d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Збір врожаю">
                            <img src="https://images.unsplash.com/photo-1591086559393-b8e8726a8e5a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Органічне зерно">
                            <img src="https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Сільськогосподарська техніка">
                        </div>
                        <div class="media-controls">
                            <button class="media-scroll-left">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg>
                            </button>
                            <button class="media-scroll-right">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="project-actions">
                        <a href="farmer-project-details.php?id=4" class="btn btn-primary">Детальніше</a>
                    </div>
                </div>

                <!-- Project 5 -->
                <div class="project-card" data-region="kharkiv" data-category="beekeeping" data-status="planning">
                    <div class="project-header">
                        <h3 class="project-title">Кооператив бджолярів</h3>
                        <div class="project-badge planning">Планування</div>
                    </div>
                    <div class="project-info">
                        <div class="project-location">
                            <svg class="icon icon-sm" viewBox="0 0 24 24">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>Харківська область</span>
                        </div>
                        <div class="project-participants">
                            <svg class="icon icon-sm" viewBox="0 0 24 24">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span>7 учасників</span>
                        </div>
                        <div class="project-deadline">
                            <svg class="icon icon-sm" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            <span>Термін: 01.06.2026</span>
                        </div>
                    </div>
                    <p class="project-description">
                        Кооператив бджолярів для спільного виробництва та збуту органічного меду та продуктів бджільництва. Включає спільне використання обладнання для переробки меду та створення спільного бренду.
                    </p>
                    <div class="project-media">
                        <div class="media-scroll">
                            <img src="https://images.unsplash.com/photo-1587382923097-7ff4677e9a9d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Пасіка">
                            <img src="https://images.unsplash.com/photo-1566234212220-39228c89a4d2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Бджоли">
                            <img src="https://images.unsplash.com/photo-1471943311424-646960669fbc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Мед">
                            <img src="https://images.unsplash.com/photo-1558642891-54be180ea339?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Продукти бджільництва">
                        </div>
                        <div class="media-controls">
                            <button class="media-scroll-left">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg>
                            </button>
                            <button class="media-scroll-right">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="project-actions">
                        <a href="farmer-project-details.php?id=5" class="btn btn-primary">Детальніше</a>
                    </div>
                </div>

                <!-- Project 6 -->
                <div class="project-card" data-region="poltava" data-category="poultry" data-status="completed">
                    <div class="project-header">
                        <h3 class="project-title">Спільне виробництво органічних яєць</h3>
                        <div class="project-badge completed">Завершено</div>
                    </div>
                    <div class="project-info">
                        <div class="project-location">
                            <svg class="icon icon-sm" viewBox="0 0 24 24">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>Полтавська область</span>
                        </div>
                        <div class="project-participants">
                            <svg class="icon icon-sm" viewBox="0 0 24 24">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span>10 учасників</span>
                        </div>
                        <div class="project-deadline">
                            <svg class="icon icon-sm" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            <span>Завершено: 10.03.2025</span>
                        </div>
                    </div>
                    <p class="project-description">
                        Проект зі спільного виробництва органічних яєць. Включав спільне будівництво пташників, закупівлю кормів та створення спільних каналів збуту. Проект успішно завершено.
                    </p>
                    <div class="project-media">
                        <div class="media-scroll">
                            <img src="https://images.unsplash.com/photo-1548550023-2bdb3c5beed7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Органічні кури">
                            <img src="https://images.unsplash.com/photo-1569127959161-2b1297b2d9a5?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Органічні яйця">
                            <img src="https://images.unsplash.com/photo-1510520001634-6af954f45759?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Пташник">
                            <img src="https://images.unsplash.com/photo-1518214598173-1666bc921d66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Курячий корм">
                        </div>
                        <div class="media-controls">
                            <button class="media-scroll-left">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg>
                            </button>
                            <button class="media-scroll-right">
                                <svg class="icon icon-sm" viewBox="0 0 24 24">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="project-actions">
                        <a href="farmer-project-details.php?id=6" class="btn btn-primary">Детальніше</a>
                    </div>
                </div>
            </div>

            <div class="no-projects-message" style="display: none;">
                <svg class="icon icon-lg" viewBox="0 0 24 24">
                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                    <line x1="12" y1="9" x2="12" y2="13"></line>
                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                </svg>
                <p>Немає проектів, що відповідають вибраним критеріям</p>
                <button class="btn btn-primary reset-filters-btn">Скинути фільтри</button>
            </div>
        </div>
    </div>

    <script src="farmer-collaboration.js"></script>

    <?php include './partials/footer.php'; ?>
