document.addEventListener("DOMContentLoaded", () => {
  const products = window.productsData || []

  const productsContainer = document.getElementById("products-container")
  const searchInput = document.getElementById("catalog-search-input")
  const searchClear = document.getElementById("search-clear")
  const resetSearch = document.getElementById("reset-search")
  const noResults = document.querySelector(".no-results")
  const productsCount = document.getElementById("products-count")
  const viewOptions = document.querySelectorAll(".view-option")
  const sortSelect = document.getElementById("sort-select")
  const filterToggleBtn = document.querySelector(".filter-toggle-btn")
  const catalogSidebar = document.querySelector(".catalog-sidebar")
  const applyFiltersBtn = document.getElementById("apply-filters")
  const resetFiltersBtn = document.getElementById("reset-filters")
  const showFavoritesBtn = document.getElementById("show-favorites")
  const favoritesCount = document.querySelector(".favorites-count")

  const productModal = document.getElementById("product-modal")
  const modalProductImage = document.getElementById("modal-product-image")
  const modalProductName = document.getElementById("modal-product-name")
  const modalProductFarmer = document.getElementById("modal-product-farmer")
  const modalProductRating = document.getElementById("modal-product-rating")
  const modalRatingCount = document.getElementById("modal-rating-count")
  const modalProductPrice = document.getElementById("modal-product-price")
  const modalProductDescription = document.getElementById("modal-product-description")
  const modalProductCategory = document.getElementById("modal-product-category")
  const modalProductWeight = document.getElementById("modal-product-weight")
  const modalProductExpiry = document.getElementById("modal-product-expiry")
  const modalProductStock = document.getElementById("modal-product-stock")
  const modalFavoriteBtn = document.getElementById("modal-favorite-btn")
  const viewReviewsBtn = document.getElementById("view-reviews-btn")

  const reviewsModal = document.getElementById("reviews-modal")
  const reviewsProductImage = document.querySelector(".reviews-product-image")
  const reviewsProductName = document.querySelector(".reviews-product-name")
  const reviewsProductFarmer = document.querySelector(".reviews-product-farmer")
  const reviewsProductRating = document.getElementById("reviews-product-rating")
  const reviewsRatingCount = document.getElementById("reviews-rating-count")
  const reviewsList = document.getElementById("reviews-list")
  const reviewForm = document.getElementById("review-form")
  const reviewName = document.getElementById("review-name")
  const reviewText = document.getElementById("review-text")
  const submitReviewBtn = document.getElementById("submit-review")
  const cancelReviewBtn = document.getElementById("cancel-review")

  const modalCloseButtons = document.querySelectorAll(".modal-close")

  // Add a variable to track if product modal was open before reviews
  let productModalWasActive = false

  let currentView = "grid"
  let currentSort = "popular"
  let currentFilters = {
    category: [],
    farmer: [],
    rating: 0,
    priceMin: 0,
    priceMax: 1000,
    favorites: false,
  }
  const favorites = JSON.parse(localStorage.getItem("favorites")) || []
  let currentProductId = null

  // Declare cartManager and notification
  const cartManager = {
    addItem: (product, quantity) => {
      console.log(`Added ${quantity} of ${product.name} to cart`)
    },
  }
  const notification = document.createElement("div")

  renderProducts(products)
  updateFavoritesCount()

  searchInput.addEventListener("input", handleSearch)
  searchClear.addEventListener("click", clearSearch)
  resetSearch.addEventListener("click", clearSearch)

  viewOptions.forEach((option) => {
    option.addEventListener("click", () => {
      viewOptions.forEach((opt) => opt.classList.remove("active"))
      option.classList.add("active")
      currentView = option.dataset.view
      renderProducts(filterProducts(products))
    })
  })

  sortSelect.addEventListener("change", () => {
    currentSort = sortSelect.value
    renderProducts(filterProducts(products))
  })

  filterToggleBtn.addEventListener("click", () => {
    catalogSidebar.classList.toggle("active")
  })

  applyFiltersBtn.addEventListener("click", applyFilters)
  resetFiltersBtn.addEventListener("click", resetFilters)
  showFavoritesBtn.addEventListener("click", toggleFavorites)

  // Modify the modal close buttons event listener
  modalCloseButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
      // Stop event propagation to prevent the window click handler from firing
      e.stopPropagation()

      if (button.closest("#reviews-modal")) {
        // If closing the reviews modal
        reviewsModal.classList.remove("active")

        // If product modal was active before, restore it
        if (productModalWasActive) {
          productModal.classList.add("active")
          productModalWasActive = false // Reset the flag
        } else {
          document.body.style.overflow = ""
        }
      } else {
        // If closing the product modal
        productModal.classList.remove("active")
        document.body.style.overflow = ""
      }
    })
  })

  const sliderMin = document.getElementById("slider-min")
  const sliderMax = document.getElementById("slider-max")
  const priceMin = document.getElementById("price-min")
  const priceMax = document.getElementById("price-max")
  const sliderTrack = document.querySelector(".slider-track")

  function updateRangeSlider() {
    const min = Number.parseInt(sliderMin.value)
    const max = Number.parseInt(sliderMax.value)
    const percent1 = (min / Number.parseInt(sliderMin.max)) * 100
    const percent2 = (max / Number.parseInt(sliderMax.max)) * 100
    sliderTrack.style.left = percent1 + "%"
    sliderTrack.style.width = percent2 - percent1 + "%"
    priceMin.value = min
    priceMax.value = max
  }

  sliderMin.addEventListener("input", () => {
    const min = Number.parseInt(sliderMin.value)
    const max = Number.parseInt(sliderMax.value)
    if (min > max) {
      sliderMin.value = max
    }
    updateRangeSlider()
  })

  sliderMax.addEventListener("input", () => {
    const min = Number.parseInt(sliderMin.value)
    const max = Number.parseInt(sliderMax.value)
    if (max < min) {
      sliderMax.value = min
    }
    updateRangeSlider()
  })

  priceMin.addEventListener("input", () => {
    const min = Number.parseInt(priceMin.value)
    const max = Number.parseInt(priceMax.value)
    if (min > max) {
      priceMin.value = max
    }
    sliderMin.value = priceMin.value
    updateRangeSlider()
  })

  priceMax.addEventListener("input", () => {
    const min = Number.parseInt(priceMin.value)
    const max = Number.parseInt(priceMax.value)
    if (max < min) {
      priceMax.value = min
    }
    sliderMax.value = priceMax.value
    updateRangeSlider()
  })

  updateRangeSlider()

  function renderProducts(productsToRender) {
    productsContainer.innerHTML = ""

    if (productsToRender.length === 0) {
      noResults.style.display = "block"
      productsCount.textContent = "0"
      return
    }

    noResults.style.display = "none"
    productsCount.textContent = productsToRender.length

    productsToRender.forEach((product) => {
      const isFavorite = favorites.includes(product.id)
      const productCard = document.createElement("div")
      productCard.className = `product-card ${currentView === "list" ? "list-view" : ""}`
      productCard.dataset.id = product.id

      let badgeHtml = ""
      if (product.isNew) {
        badgeHtml = `<div class="product-badge badge-new">Новинка</div>`
      } else if (product.isSale) {
        badgeHtml = `<div class="product-badge badge-sale">-${Math.round(
          ((product.oldPrice - product.price) / product.oldPrice) * 100,
        )}%</div>`
      }

      productCard.innerHTML = `
            ${badgeHtml}
            <div class="product-image">
                <img src="${product.image}" alt="${product.name}" class="modal-click-open-product" data-id="${product.id}">
            </div>
            <div class="product-actions">
                <button class="product-action favorite-action ${isFavorite ? "favorited" : ""}" data-id="${product.id}">
                    <svg class="icon" viewBox="0 0 24 24">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                </button>

                <button class="product-action reviews-action" data-id="${product.id}">
                    <svg class="icon" viewBox="0 0 24 24">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                </button>
            </div>
              <div class="product-content">
                <div class="product-category">${product.category}</div>
                <h3 class="product-title modal-click-open-product" data-id="${product.id}" style="cursor: pointer;">${product.name}</h3>
                <div class="product-farmer">
                    <svg class="icon icon-sm" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span>${product.farmer}</span>
                </div>
                <div class="product-rating">
                    <div class="stars">
                        <div class="stars-filled" style="width: ${(product.rating / 5) * 100}%"></div>
                    </div>
                    <span class="rating-count">(${product.ratingCount})</span>

                </div>
                <div class="product-description">${product.description}</div>
                <div class="product-footer">
                    <div class="product-price">
                        ${product.oldPrice ? `<span class="product-price-old">${product.oldPrice} грн</span>` : ""}
                        ${product.price} грн
                    </div>
                    ${
                      product.inStock
                        ? `<button class="add-to-cart" data-id="${product.id}">
                            <svg class="icon" viewBox="0 0 24 24">
                                <path d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>
                                <path d="M20 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                        </button>`
                        : `<div class="product-status status-sold">Немає в наявності</div>`
                    }
                </div>
            </div>
          `

      productsContainer.appendChild(productCard)
    })

    // Add event listeners after rendering products
    document.querySelectorAll(".favorite-action").forEach((button) => {
      button.addEventListener("click", toggleFavorite)
    })

    document.querySelectorAll(".reviews-action").forEach((button) => {
      button.addEventListener("click", (e) => {
        const productId = Number.parseInt(e.currentTarget.dataset.id)
        showReviewsModal(productId)
      })
    })

    document.querySelectorAll(".add-to-cart").forEach((button) => {
      button.addEventListener("click", addToCart)
    })

    // Add event listeners for modal opening
    document.querySelectorAll(".modal-click-open-product").forEach((element) => {
      element.addEventListener("click", function (e) {
        e.stopPropagation() // Prevent event bubbling
        const productId = Number(this.dataset.id)
        showProductModal({ currentTarget: { dataset: { id: productId } } })
      })
    })
  }

  function handleSearch() {
    const searchValue = searchInput.value.trim().toLowerCase()

    if (searchValue) {
      searchClear.style.opacity = "1"
      searchClear.style.visibility = "visible"
    } else {
      searchClear.style.opacity = "0"
      searchClear.style.visibility = "hidden"
    }

    renderProducts(filterProducts(products))
  }

  function clearSearch() {
    searchInput.value = ""
    searchClear.style.opacity = "0"
    searchClear.style.visibility = "hidden"
    renderProducts(filterProducts(products))
  }

  function filterProducts(productsToFilter) {
    const searchValue = searchInput.value.trim().toLowerCase()

    return productsToFilter
      .filter((product) => {
        const matchesSearch =
          !searchValue ||
          product.name.toLowerCase().includes(searchValue) ||
          product.category.toLowerCase().includes(searchValue) ||
          product.farmer.toLowerCase().includes(searchValue) ||
          product.description.toLowerCase().includes(searchValue)

        const matchesCategory =
          currentFilters.category.length === 0 || currentFilters.category.includes(product.categoryId)

        const matchesFarmer = currentFilters.farmer.length === 0 || currentFilters.farmer.includes(product.farmerId)

        const matchesRating = product.rating >= currentFilters.rating

        const matchesPrice = product.price >= currentFilters.priceMin && product.price <= currentFilters.priceMax

        const matchesFavorites = !currentFilters.favorites || favorites.includes(product.id)

        return matchesSearch && matchesCategory && matchesFarmer && matchesRating && matchesPrice && matchesFavorites
      })
      .sort((a, b) => {
        switch (currentSort) {
          case "price-asc":
            return a.price - b.price
          case "price-desc":
            return b.price - a.price
          case "rating":
            return b.rating - a.rating
          case "new":
            return b.isNew ? 1 : -1
          default:
            return b.ratingCount - a.ratingCount
        }
      })
  }

  function applyFilters() {
    currentFilters.category = Array.from(document.querySelectorAll('input[name="category"]:checked')).map(
      (input) => input.value,
    )

    currentFilters.farmer = Array.from(document.querySelectorAll('input[name="farmer"]:checked')).map(
      (input) => input.value,
    )

    const ratingInput = document.querySelector('input[name="rating"]:checked')
    currentFilters.rating = ratingInput ? Number.parseInt(ratingInput.value) : 0

    currentFilters.priceMin = Number.parseInt(priceMin.value)
    currentFilters.priceMax = Number.parseInt(priceMax.value)

    if (window.innerWidth < 992) {
      catalogSidebar.classList.remove("active")
    }

    renderProducts(filterProducts(products))
  }

  function resetFilters() {
    document.querySelectorAll('input[name="category"]').forEach((input) => {
      input.checked = false
    })

    document.querySelectorAll('input[name="farmer"]').forEach((input) => {
      input.checked = false
    })

    document.querySelector('input[name="rating"][value="0"]').checked = true

    priceMin.value = 0
    priceMax.value = 1000
    sliderMin.value = 0
    sliderMax.value = 1000
    updateRangeSlider()

    currentFilters.favorites = false
    showFavoritesBtn.classList.remove("active")

    currentFilters = {
      category: [],
      farmer: [],
      rating: 0,
      priceMin: 0,
      priceMax: 1000,
      favorites: false,
    }

    renderProducts(filterProducts(products))
  }

  function toggleFavorites() {
    currentFilters.favorites = !currentFilters.favorites
    showFavoritesBtn.classList.toggle("active")
    renderProducts(filterProducts(products))
  }

  function toggleFavorite(e) {
    e.stopPropagation() // Prevent event bubbling
    const productId = Number.parseInt(e.currentTarget.dataset.id)
    const index = favorites.indexOf(productId)

    if (index === -1) {
      favorites.push(productId)
      e.currentTarget.classList.add("favorited")
    } else {
      favorites.splice(index, 1)
      e.currentTarget.classList.remove("favorited")
    }

    localStorage.setItem("favorites", JSON.stringify(favorites))
    updateFavoritesCount()

    if (currentProductId === productId && productModal.classList.contains("active")) {
      modalFavoriteBtn.classList.toggle("favorited", favorites.includes(productId))
    }

    if (currentFilters.favorites) {
      renderProducts(filterProducts(products))
    }
  }

  function updateFavoritesCount() {
    favoritesCount.textContent = favorites.length
  }

  function showProductModal(e) {
    const productId = Number.parseInt(e.currentTarget.dataset.id)
    const product = products.find((p) => p.id === productId)

    if (product) {
      currentProductId = productId
      modalProductImage.src = product.image
      modalProductName.textContent = product.name
      modalProductFarmer.textContent = `від ${product.farmer}`
      modalProductRating.style.width = `${(product.rating / 5) * 100}%`
      modalRatingCount.textContent = `(${product.ratingCount})`
      modalProductPrice.innerHTML = product.oldPrice
        ? `${product.price} грн <span style="text-decoration: line-through; color: var(--gray); font-size: 1rem;">${product.oldPrice} грн</span>`
        : `${product.price} грн`
      modalProductDescription.textContent = product.description
      modalProductCategory.textContent = product.category
      modalProductWeight.textContent = product.weight
      modalProductExpiry.textContent = product.expiry
      modalProductStock.textContent = product.inStock ? "В наявності" : "Немає в наявності"
      modalProductStock.className = product.inStock ? "detail-value in-stock" : "detail-value out-of-stock"

      modalFavoriteBtn.classList.toggle("favorited", favorites.includes(productId))

      // Update the add to cart button's data-id
      const addToCartBtn = document.querySelector(".add-to-cart-btn")
      if (addToCartBtn) {
        addToCartBtn.dataset.id = productId
      }

      // Hide all thumbnail containers first
      document.querySelectorAll(".product-thumbnails-container").forEach((container) => {
        container.style.display = "none"
      })

      // Show only the thumbnails for the current product
      const thumbnailsContainer = document.querySelector(
        `.product-thumbnails-container[data-product-id="${productId}"]`,
      )
      if (thumbnailsContainer) {
        thumbnailsContainer.style.display = "flex"

        // Add click event listeners to thumbnails
        thumbnailsContainer.querySelectorAll(".thumbnail").forEach((thumbnail) => {
          thumbnail.addEventListener("click", () => {
            // Remove active class from all thumbnails
            thumbnailsContainer.querySelectorAll(".thumbnail").forEach((t) => t.classList.remove("active"))
            // Add active class to clicked thumbnail
            thumbnail.classList.add("active")
            // Update main image
            modalProductImage.src = thumbnail.dataset.image
          })
        })
      }

      productModal.classList.add("active")
      document.body.style.overflow = "hidden"
    }
  }

  function addToCart(e) {
    e.stopPropagation() // Prevent event bubbling
    const productId = Number.parseInt(e.currentTarget.dataset.id)
    const product = products.find((p) => p.id === productId)

    if (product) {
      cartManager.addItem(product, 1)
      e.currentTarget.classList.add("added")
      setTimeout(() => {
        e.currentTarget.classList.remove("added")
      }, 1000)

      // Create a new notification element each time
      const notification = document.createElement("div")
      notification.textContent = `${product.name} додано в кошик`
      notification.style.position = "fixed"
      notification.style.bottom = "20px"
      notification.style.right = "20px"
      notification.style.backgroundColor = "var(--success)"
      notification.style.color = "var(--white)"
      notification.style.padding = "15px 20px"
      notification.style.borderRadius = "var(--border-radius-sm)"
      notification.style.boxShadow = "var(--box-shadow)"
      notification.style.zIndex = "1000"
      notification.style.opacity = "0"
      notification.style.transform = "translateY(20px)"
      notification.style.transition = "opacity 0.3s, transform 0.3s"

      document.body.appendChild(notification)

      setTimeout(() => {
        notification.style.opacity = "1"
        notification.style.transform = "translateY(0)"
      }, 10)

      setTimeout(() => {
        notification.style.opacity = "0"
        notification.style.transform = "translateY(20px)"
        setTimeout(() => {
          document.body.removeChild(notification)
        }, 300)
      }, 3000)
    }
  }

  const quantityInput = document.querySelector(".quantity-input")
  const minusBtn = document.querySelector(".quantity-btn.minus")
  const plusBtn = document.querySelector(".quantity-btn.plus")

  if (minusBtn && plusBtn && quantityInput) {
    minusBtn.addEventListener("click", () => {
      const value = Number.parseInt(quantityInput.value)
      if (value > 1) {
        quantityInput.value = value - 1
      }
    })

    plusBtn.addEventListener("click", () => {
      const value = Number.parseInt(quantityInput.value)
      if (value < 99) {
        quantityInput.value = value + 1
      }
    })
  }

  const addToCartBtn = document.querySelector(".add-to-cart-btn")

  if (addToCartBtn) {
    addToCartBtn.addEventListener("click", (e) => {
      if (currentProductId) {
        const product = products.find((p) => p.id === currentProductId)
        const quantity = Number.parseInt(quantityInput.value)

        if (product) {
          cartManager.addItem(product, quantity)

          // Create a new notification element
          const notification = document.createElement("div")
          notification.textContent = `${quantity} x ${product.name} додано в кошик`
          notification.style.position = "fixed"
          notification.style.bottom = "20px"
          notification.style.right = "20px"
          notification.style.backgroundColor = "var(--success)"
          notification.style.color = "var(--white)"
          notification.style.padding = "15px 20px"
          notification.style.borderRadius = "var(--border-radius-sm)"
          notification.style.boxShadow = "var(--box-shadow)"
          notification.style.zIndex = "1000"
          notification.style.opacity = "0"
          notification.style.transform = "translateY(20px)"
          notification.style.transition = "opacity 0.3s, transform 0.3s"

          document.body.appendChild(notification)

          setTimeout(() => {
            notification.style.opacity = "1"
            notification.style.transform = "translateY(0)"
          }, 10)

          setTimeout(() => {
            notification.style.opacity = "0"
            notification.style.transform = "translateY(20px)"
            setTimeout(() => {
              document.body.removeChild(notification)
            }, 300)
          }, 3000)
        }
      }
    })
  }

  if (modalFavoriteBtn) {
    modalFavoriteBtn.addEventListener("click", () => {
      if (currentProductId) {
        const index = favorites.indexOf(currentProductId)

        if (index === -1) {
          favorites.push(currentProductId)
          modalFavoriteBtn.classList.add("favorited")
        } else {
          favorites.splice(index, 1)
          modalFavoriteBtn.classList.remove("favorited")
        }

        localStorage.setItem("favorites", JSON.stringify(favorites))
        updateFavoritesCount()

        const favoriteBtn = document.querySelector(`.favorite-action[data-id="${currentProductId}"]`)
        if (favoriteBtn) {
          favoriteBtn.classList.toggle("favorited", favorites.includes(currentProductId))
        }

        if (currentFilters.favorites) {
          renderProducts(filterProducts(products))
        }
      }
    })
  }

  // Improved modal background click handlers with stopPropagation
  window.addEventListener("click", (e) => {
    if (e.target === reviewsModal) {
      reviewsModal.classList.remove("active")

      // If product modal was active before, restore it
      if (productModalWasActive) {
        productModal.classList.add("active")
        productModalWasActive = false // Reset the flag
      } else {
        document.body.style.overflow = ""
      }
    }

    if (e.target === productModal) {
      productModal.classList.remove("active")
      document.body.style.overflow = ""
    }
  })

  // Prevent clicks inside modal content from closing the modal
  document.querySelectorAll(".modal-content").forEach((content) => {
    content.addEventListener("click", (e) => {
      e.stopPropagation()
    })
  })

  function showReviewsModal(productId) {
    const product = products.find((p) => p.id === productId)

    if (product) {
      // Check if product modal is currently active
      if (productModal.classList.contains("active")) {
        productModalWasActive = true
        productModal.classList.remove("active")
      } else {
        productModalWasActive = false
      }

      currentProductId = productId
      reviewsProductImage.src = product.image
      reviewsProductName.textContent = product.name
      reviewsProductFarmer.textContent = `від ${product.farmer}`
      reviewsProductRating.style.width = `${(product.rating / 5) * 100}%`
      reviewsRatingCount.textContent = `(${product.ratingCount})`

      renderReviews(product.reviews || [])

      reviewForm.reset()

      reviewsModal.classList.add("active")
      document.body.style.overflow = "hidden"
    }
  }

  function renderReviews(reviews) {
    if (!reviews || reviews.length === 0) {
      reviewsList.innerHTML = `<div class="no-reviews-message">Поки що немає відгуків про цей товар. Будьте першим!</div>`
      return
    }

    const sortedReviews = [...reviews].sort((a, b) => new Date(b.date) - new Date(a.date))

    reviewsList.innerHTML = sortedReviews
      .map(
        (review) => `
          <div class="review-item">
            <div class="review-header">
              <div class="review-author">${review.author}</div>
              <div class="review-date">${formatDate(review.date)}</div>
            </div>
            <div class="review-rating">
              <div class="stars">
                <div class="stars-filled" style="width: ${(review.rating / 5) * 100}%"></div>
              </div>
            </div>
            <div class="review-text">${review.text}</div>
          </div>
        `,
      )
      .join("")
  }

  function formatDate(dateString) {
    const options = { year: "numeric", month: "long", day: "numeric" }
    return new Date(dateString).toLocaleDateString("uk-UA", options)
  }

  function submitReview(e) {
    e.preventDefault()

    const product = products.find((p) => p.id === currentProductId)
    if (!product) return

    const ratingValue = document.querySelector('input[name="review-rating"]:checked')
    if (!ratingValue) {
      alert("Будь ласка, виберіть оцінку")
      return
    }

    const rating = Number.parseInt(ratingValue.value)
    const name = reviewName.value.trim()
    const text = reviewText.value.trim()

    if (!name) {
      alert("Будь ласка, введіть ваше ім'я")
      return
    }

    if (!text) {
      alert("Будь ласка, напишіть відгук")
      return
    }

    const newReview = {
      id: Date.now(),
      author: name,
      date: new Date().toISOString().split("T")[0],
      rating: rating,
      text: text,
    }

    if (!product.reviews) {
      product.reviews = []
    }

    product.reviews.push(newReview)

    const newRatingCount = product.ratingCount + 1
    const newRating = (product.rating * product.ratingCount + rating) / newRatingCount
    product.rating = Number.parseFloat(newRating.toFixed(1))
    product.ratingCount = newRatingCount

    renderReviews(product.reviews)

    reviewForm.reset()

    const notification = document.createElement("div")
    notification.textContent = "Дякуємо за ваш відгук!"
    notification.style.position = "fixed"
    notification.style.bottom = "20px"
    notification.style.right = "20px"
    notification.style.backgroundColor = "var(--success)"
    notification.style.color = "var(--white)"
    notification.style.padding = "15px 20px"
    notification.style.borderRadius = "var(--border-radius-sm)"
    notification.style.boxShadow = "var(--box-shadow)"
    notification.style.zIndex = "1000"
    notification.style.opacity = "0"
    notification.style.transform = "translateY(20px)"
    notification.style.transition = "opacity 0.3s, transform 0.3s"

    document.body.appendChild(notification)

    setTimeout(() => {
      notification.style.opacity = "1"
      notification.style.transform = "translateY(0)"
    }, 10)

    setTimeout(() => {
      notification.style.opacity = "0"
      notification.style.transform = "translateY(20px)"
      setTimeout(() => {
        document.body.removeChild(notification)
      }, 300)
    }, 3000)

    renderProducts(filterProducts(products))
  }

  if (submitReviewBtn) {
    submitReviewBtn.addEventListener("click", submitReview)
  }

  // Update the cancel review button handler
  if (cancelReviewBtn) {
    cancelReviewBtn.addEventListener("click", (e) => {
      e.preventDefault() // Prevent form submission
      e.stopPropagation() // Prevent event bubbling

      reviewsModal.classList.remove("active")

      // If product modal was active before, restore it
      if (productModalWasActive) {
        productModal.classList.add("active")
        productModalWasActive = false // Reset the flag
      } else {
        document.body.style.overflow = ""
      }
    })
  }

  // Update the view reviews button handler
  if (viewReviewsBtn) {
    viewReviewsBtn.addEventListener("click", (e) => {
      e.stopPropagation() // Prevent event bubbling

      // Remember that product modal was active
      productModalWasActive = true
      // Hide product modal
      productModal.classList.remove("active")
      // Show reviews modal
      showReviewsModal(currentProductId)
    })
  }

  if (reviewForm) {
    reviewForm.addEventListener("submit", (e) => {
      e.preventDefault()
      submitReview(e)
    })
  }
})
