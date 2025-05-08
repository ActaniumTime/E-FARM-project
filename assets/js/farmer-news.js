document.addEventListener("DOMContentLoaded", () => {
    // Фільтрація новин за категорією
    const categoryFilter = document.getElementById("news-category-filter")
    const newsCards = document.querySelectorAll(".news-card")
  
    if (categoryFilter) {
      categoryFilter.addEventListener("change", function () {
        const selectedCategory = this.value
  
        newsCards.forEach((card) => {
          if (selectedCategory === "all" || card.dataset.category === selectedCategory) {
            card.style.display = "flex"
          } else {
            card.style.display = "none"
          }
        })
      })
    }
  
    // Пошук новин
    const searchInput = document.getElementById("news-search-input")
  
    if (searchInput) {
      searchInput.addEventListener("input", function () {
        const searchTerm = this.value.toLowerCase()
  
        newsCards.forEach((card) => {
          const title = card.querySelector(".news-title").textContent.toLowerCase()
          const excerpt = card.querySelector(".news-excerpt").textContent.toLowerCase()
  
          if (title.includes(searchTerm) || excerpt.includes(searchTerm)) {
            card.style.display = "flex"
          } else {
            card.style.display = "none"
          }
        })
      })
    }
  
    // Пагінація
    const paginationNumbers = document.querySelectorAll(".pagination-number")
    const paginationPrev = document.querySelector(".pagination-btn:first-child")
    const paginationNext = document.querySelector(".pagination-btn:last-child")
  
    if (paginationNumbers.length > 0) {
      paginationNumbers.forEach((number) => {
        number.addEventListener("click", function (e) {
          e.preventDefault()
  
          // Видаляємо активний клас з усіх номерів
          paginationNumbers.forEach((num) => num.classList.remove("active"))
  
          // Додаємо активний клас до поточного номера
          this.classList.add("active")
  
          // Оновлюємо стан кнопок "Попередня" та "Наступна"
          if (this.textContent === "1") {
            paginationPrev.disabled = true
          } else {
            paginationPrev.disabled = false
          }
  
          if (this.textContent === paginationNumbers.length.toString()) {
            paginationNext.disabled = true
          } else {
            paginationNext.disabled = false
          }
  
          // Тут можна додати логіку для завантаження нових новин
          // Наприклад, через AJAX-запит до сервера
        })
      })
  
      // Обробники для кнопок "Попередня" та "Наступна"
      if (paginationPrev) {
        paginationPrev.addEventListener("click", function () {
          if (!this.disabled) {
            const activeNumber = document.querySelector(".pagination-number.active")
            const prevNumber = activeNumber.previousElementSibling
  
            if (prevNumber) {
              prevNumber.click()
            }
          }
        })
      }
  
      if (paginationNext) {
        paginationNext.addEventListener("click", function () {
          if (!this.disabled) {
            const activeNumber = document.querySelector(".pagination-number.active")
            const nextNumber = activeNumber.nextElementSibling
  
            if (nextNumber) {
              nextNumber.click()
            }
          }
        })
      }
    }
  
    // Кнопки поширення в соціальних мережах
    const shareBtns = document.querySelectorAll(".share-btn")
  
    if (shareBtns.length > 0) {
      shareBtns.forEach((btn) => {
        btn.addEventListener("click", function (e) {
          e.preventDefault()
  
          const title = document.querySelector(".article-title").textContent
          const url = window.location.href
  
          let shareUrl = ""
  
          switch (this.title) {
            case "Facebook":
              shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`
              break
            case "Twitter":
              shareUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(title)}&url=${encodeURIComponent(url)}`
              break
            case "LinkedIn":
              shareUrl = `https://www.linkedin.com/shareArticle?mini=true&url=${encodeURIComponent(url)}&title=${encodeURIComponent(title)}`
              break
            case "Email":
              shareUrl = `mailto:?subject=${encodeURIComponent(title)}&body=${encodeURIComponent(url)}`
              break
          }
  
          if (shareUrl) {
            window.open(shareUrl, "_blank")
          }
        })
      })
    }
  })
  