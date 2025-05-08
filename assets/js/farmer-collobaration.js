document.addEventListener("DOMContentLoaded", () => {
    // Елементи DOM
    const projectsGrid = document.querySelector(".projects-grid")
    const projectCards = document.querySelectorAll(".project-card")
    const noProjectsMessage = document.querySelector(".no-projects-message")
    const resetFiltersBtn = document.querySelector(".reset-filters-btn")
    const regionFilter = document.getElementById("region-filter")
    const categoryFilter = document.getElementById("category-filter")
    const statusFilter = document.getElementById("status-filter")
    const createProjectBtn = document.querySelector(".create-project-btn")
    const createProjectModal = document.getElementById("create-project-modal")
    const modalClose = document.querySelector(".modal-close")
    const cancelProjectBtn = document.getElementById("cancel-project-btn")
    const createProjectForm = document.getElementById("create-project-form")
    const uploadPlaceholder = document.getElementById("upload-placeholder")
    const projectImagesInput = document.getElementById("project-images")
    const uploadedImagesContainer = document.getElementById("uploaded-images")
  
    // Функція для фільтрації проектів
    function filterProjects() {
      const selectedRegion = regionFilter.value
      const selectedCategory = categoryFilter.value
      const selectedStatus = statusFilter.value
  
      let visibleCount = 0
  
      projectCards.forEach((card) => {
        const region = card.dataset.region
        const category = card.dataset.category
        const status = card.dataset.status
  
        const regionMatch = selectedRegion === "all" || region === selectedRegion
        const categoryMatch = selectedCategory === "all" || category === selectedCategory
        const statusMatch = selectedStatus === "all" || status === selectedStatus
  
        if (regionMatch && categoryMatch && statusMatch) {
          card.style.display = "flex"
          visibleCount++
        } else {
          card.style.display = "none"
        }
      })
  
      // Показати або приховати повідомлення про відсутність проектів
      if (visibleCount === 0) {
        noProjectsMessage.style.display = "block"
      } else {
        noProjectsMessage.style.display = "none"
      }
    }
  
    // Функція для скидання фільтрів
    function resetFilters() {
      regionFilter.value = "all"
      categoryFilter.value = "all"
      statusFilter.value = "all"
      filterProjects()
    }
  
    // Функція для прокрутки зображень
    function setupImageScrolling() {
      const scrollLeftButtons = document.querySelectorAll(".media-scroll-left")
      const scrollRightButtons = document.querySelectorAll(".media-scroll-right")
  
      scrollLeftButtons.forEach((button) => {
        button.addEventListener("click", function () {
          const mediaScroll = this.closest(".project-media").querySelector(".media-scroll")
          mediaScroll.scrollBy({ left: -210, behavior: "smooth" })
        })
      })
  
      scrollRightButtons.forEach((button) => {
        button.addEventListener("click", function () {
          const mediaScroll = this.closest(".project-media").querySelector(".media-scroll")
          mediaScroll.scrollBy({ left: 210, behavior: "smooth" })
        })
      })
    }
  
    // Функція для відкриття модального вікна
    function openModal() {
      createProjectModal.style.display = "block"
      document.body.style.overflow = "hidden" // Заборонити прокрутку сторінки
    }
  
    // Функція для закриття модального вікна
    function closeModal() {
      createProjectModal.style.display = "none"
      document.body.style.overflow = "" // Дозволити прокрутку сторінки
      createProjectForm.reset()
      uploadedImagesContainer.innerHTML = ""
    }
  
    // Функція для обробки завантаження зображень
    function handleImageUpload() {
      const files = projectImagesInput.files
  
      for (let i = 0; i < files.length; i++) {
        const file = files[i]
  
        // Перевірка, чи файл є зображенням
        if (!file.type.startsWith("image/")) {
          continue
        }
  
        const reader = new FileReader()
  
        reader.onload = (e) => {
          const imageContainer = document.createElement("div")
          imageContainer.className = "uploaded-image-container"
  
          const img = document.createElement("img")
          img.src = e.target.result
          img.className = "uploaded-image"
  
          const removeBtn = document.createElement("button")
          removeBtn.className = "remove-image"
          removeBtn.innerHTML = "×"
          removeBtn.addEventListener("click", () => {
            imageContainer.remove()
          })
  
          imageContainer.appendChild(img)
          imageContainer.appendChild(removeBtn)
          uploadedImagesContainer.appendChild(imageContainer)
        }
  
        reader.readAsDataURL(file)
      }
    }
  
    // Функція для створення нового проекту
    function createProject(event) {
      event.preventDefault()
  
      // Тут буде код для відправки даних на сервер
      // В реальному додатку тут буде AJAX запит для збереження проекту
  
      // Для демонстрації просто закриваємо модальне вікно
      closeModal()
  
      // Показуємо повідомлення про успішне створення проекту
      alert("Проект успішно створено!")
  
      // В реальному додатку тут буде перезавантаження списку проектів
    }
  
    // Додавання обробників подій
    regionFilter.addEventListener("change", filterProjects)
    categoryFilter.addEventListener("change", filterProjects)
    statusFilter.addEventListener("change", filterProjects)
    resetFiltersBtn.addEventListener("click", resetFilters)
    createProjectBtn.addEventListener("click", openModal)
    modalClose.addEventListener("click", closeModal)
    cancelProjectBtn.addEventListener("click", closeModal)
    createProjectForm.addEventListener("submit", createProject)
  
    // Обробка завантаження зображень
    uploadPlaceholder.addEventListener("click", () => {
      projectImagesInput.click()
    })
  
    projectImagesInput.addEventListener("change", handleImageUpload)
  
    // Обробка перетягування зображень
    const imagePreview = document.getElementById("image-preview")
  
    imagePreview.addEventListener("dragover", function (e) {
      e.preventDefault()
      this.style.borderColor = "#27ae60"
    })
  
    imagePreview.addEventListener("dragleave", function () {
      this.style.borderColor = "#ddd"
    })
  
    imagePreview.addEventListener("drop", function (e) {
      e.preventDefault()
      this.style.borderColor = "#ddd"
  
      if (e.dataTransfer.files.length) {
        projectImagesInput.files = e.dataTransfer.files
        handleImageUpload()
      }
    })
  
    // Ініціалізація
    setupImageScrolling()
  
    // Закриття модального вікна при кліку поза ним
    window.addEventListener("click", (event) => {
      if (event.target === createProjectModal) {
        closeModal()
      }
    })
  })
  