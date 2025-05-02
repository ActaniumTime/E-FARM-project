// SVG Icon definitions
const iconDefinitions = {
    home: '<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline>',
    search: '<circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>',
    settings:
      '<circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>',
    profile: '<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle>',
    cart: '<circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>',
    heart:
      '<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>',
    menu: '<line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line>',
    close: '<path d="M18 6L6 18M6 6l12 12"></path>',
    arrowRight: '<line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline>',
    arrowUp: '<line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline>',
    phone:
      '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>',
    location: '<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle>',
    mail: '<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline>',
    facebook: '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>',
    instagram:
      '<rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>',
    twitter:
      '<path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>',
    youtube:
      '<path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>',
    eye: '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>',
    eyeOff:
      '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line>',
  }
  
  // Mobile Menu Toggle
  const mobileMenuToggle = document.querySelector(".mobile-menu-toggle")
  const mobileMenu = document.querySelector(".mobile-menu")
  const mobileMenuClose = document.querySelector(".mobile-menu-close")
  const mobileMenuOverlay = document.querySelector(".mobile-menu-overlay")
  const mobileSubmenuToggles = document.querySelectorAll(".mobile-menu-toggle-submenu")
  
  mobileMenuToggle.addEventListener("click", () => {
    mobileMenu.classList.add("active")
    mobileMenuOverlay.classList.add("active")
    document.body.style.overflow = "hidden"
  })
  
  mobileMenuClose.addEventListener("click", () => {
    mobileMenu.classList.remove("active")
    mobileMenuOverlay.classList.remove("active")
    document.body.style.overflow = ""
  })
  
  mobileMenuOverlay.addEventListener("click", () => {
    mobileMenu.classList.remove("active")
    mobileMenuOverlay.classList.remove("active")
    document.body.style.overflow = ""
  })
  
  mobileSubmenuToggles.forEach((toggle) => {
    toggle.addEventListener("click", (e) => {
      e.preventDefault()
      e.stopPropagation()
      const submenu = toggle.closest(".mobile-menu-item").querySelector(".mobile-submenu")
      toggle.classList.toggle("active")
      submenu.classList.toggle("active")
    })
  })
  
  // Catalog Dropdown
  const catalogButton = document.querySelector(".catalog-button")
  const catalogDropdown = document.querySelector(".catalog-dropdown")
  
  catalogButton.addEventListener("click", () => {
    catalogDropdown.classList.toggle("active")
  })
  
  document.addEventListener("click", (e) => {
    if (!e.target.closest(".catalog-button") && !e.target.closest(".catalog-dropdown")) {
      catalogDropdown.classList.remove("active")
    }
  })
  
  // Products Navigation
  const productsNavItems = document.querySelectorAll(".products-nav-item")
  
  productsNavItems.forEach((item) => {
    item.addEventListener("click", () => {
      productsNavItems.forEach((navItem) => {
        navItem.classList.remove("active")
      })
      item.classList.add("active")
    })
  })
  
  // Add to Cart Animation
  const addToCartButtons = document.querySelectorAll(".add-to-cart")
  
  addToCartButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
      e.preventDefault()
  
      // Animation
      button.classList.add("added")
      setTimeout(() => {
        button.classList.remove("added")
      }, 1000)
  
      // Notification
      const notification = document.createElement("div")
      notification.textContent = "Товар додано до кошика!"
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
    })
  })
  
  // Icon hover effects
  const iconElements = document.querySelectorAll(".icon")
  
  iconElements.forEach((icon) => {
    if (icon.closest("a") || icon.closest("button")) {
      const parent = icon.closest("a") || icon.closest("button")
  
      parent.addEventListener("mouseenter", () => {
        icon.style.transition = "transform 0.3s ease"
        icon.style.transform = "scale(1.1)"
      })
  
      parent.addEventListener("mouseleave", () => {
        icon.style.transform = "scale(1)"
      })
    }
  })
  
  // Back to top button
  const backToTopButton = document.querySelector(".back-to-top")
  
  window.addEventListener("scroll", () => {
    if (window.pageYOffset > 300) {
      backToTopButton.classList.add("active")
    } else {
      backToTopButton.classList.remove("active")
    }
  })
  
  backToTopButton.addEventListener("click", (e) => {
    e.preventDefault()
    window.scrollTo({ top: 0, behavior: "smooth" })
  })
  
  // Password toggle functionality
  const passwordToggles = document.querySelectorAll(".password-toggle")
  
  passwordToggles.forEach((toggle) => {
    toggle.addEventListener("click", () => {
      const passwordInput = toggle.previousElementSibling
      const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
      passwordInput.setAttribute("type", type)
  
      // Toggle eye icon
      if (type === "text") {
        toggle.innerHTML = `<svg class="icon" viewBox="0 0 24 24">
          <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
          <line x1="1" y1="1" x2="23" y2="23"></line>
        </svg>`
      } else {
        toggle.innerHTML = `<svg class="icon" viewBox="0 0 24 24">
          <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
          <circle cx="12" cy="12" r="3"></circle>
        </svg>`
      }
    })
  })
  
  // Password strength meter
  const passwordInput = document.getElementById("password")
  if (passwordInput) {
    const strengthBar = document.querySelector(".strength-progress")
    const strengthText = document.querySelector(".strength-text")
  
    passwordInput.addEventListener("input", () => {
      const password = passwordInput.value
      let strength = 0
  
      if (password.length >= 8) strength += 25
      if (password.match(/[A-Z]/)) strength += 25
      if (password.match(/[0-9]/)) strength += 25
      if (password.match(/[^A-Za-z0-9]/)) strength += 25
  
      strengthBar.style.width = `${strength}%`
  
      if (strength <= 25) {
        strengthBar.style.backgroundColor = "#dc3545"
        strengthText.textContent = "Слабкий пароль"
      } else if (strength <= 50) {
        strengthBar.style.backgroundColor = "#ffc107"
        strengthText.textContent = "Середній пароль"
      } else if (strength <= 75) {
        strengthBar.style.backgroundColor = "#28a745"
        strengthText.textContent = "Хороший пароль"
      } else {
        strengthBar.style.backgroundColor = "#20c997"
        strengthText.textContent = "Надійний пароль"
      }
    })
  }
  
  // Form validation
  const authForms = document.querySelectorAll(".auth-form")
  
  authForms.forEach((form) => {
    form.addEventListener("submit", (e) => {
      e.preventDefault()
  
      // Simple validation example
      let isValid = true
      const inputs = form.querySelectorAll("input[required]")
  
      inputs.forEach((input) => {
        if (!input.value.trim()) {
          isValid = false
          input.classList.add("error")
  
          // Add error message if it doesn't exist
          let errorMessage = input.parentElement.nextElementSibling
          if (!errorMessage || !errorMessage.classList.contains("error-message")) {
            errorMessage = document.createElement("div")
            errorMessage.classList.add("error-message")
            errorMessage.style.color = "#dc3545"
            errorMessage.style.fontSize = "0.875rem"
            errorMessage.style.marginTop = "0.25rem"
            errorMessage.textContent = "Це поле обов'язкове"
            input.parentElement.after(errorMessage)
          }
        } else {
          input.classList.remove("error")
  
          // Remove error message if it exists
          const errorMessage = input.parentElement.nextElementSibling
          if (errorMessage && errorMessage.classList.contains("error-message")) {
            errorMessage.remove()
          }
        }
      })
  
      // Check password confirmation if it exists
      const password = form.querySelector("#password")
      const confirmPassword = form.querySelector("#confirm-password")
  
      if (password && confirmPassword && password.value !== confirmPassword.value) {
        isValid = false
        confirmPassword.classList.add("error")
  
        // Add error message if it doesn't exist
        let errorMessage = confirmPassword.parentElement.nextElementSibling
        if (!errorMessage || !errorMessage.classList.contains("error-message")) {
          errorMessage = document.createElement("div")
          errorMessage.classList.add("error-message")
          errorMessage.style.color = "#dc3545"
          errorMessage.style.fontSize = "0.875rem"
          errorMessage.style.marginTop = "0.25rem"
          errorMessage.textContent = "Паролі не співпадають"
          confirmPassword.parentElement.after(errorMessage)
        }
      }
  
      if (isValid) {
        // Here you would normally submit the form or make an AJAX request
        console.log("Form submitted successfully")
  
        // Show success message
        const successMessage = document.createElement("div")
        successMessage.style.backgroundColor = "#28a745"
        successMessage.style.color = "#fff"
        successMessage.style.padding = "1rem"
        successMessage.style.borderRadius = "var(--border-radius-sm)"
        successMessage.style.marginBottom = "1rem"
        successMessage.style.textAlign = "center"
  
        if (form.closest("#login-form")) {
          successMessage.textContent = "Вхід успішний!"
        } else {
          successMessage.textContent = "Реєстрація успішна!"
        }
  
        form.prepend(successMessage)
  
        // Reset form
        form.reset()
  
        // Remove success message after 3 seconds
        setTimeout(() => {
          successMessage.remove()
        }, 3000)
      }
    })
  })
  