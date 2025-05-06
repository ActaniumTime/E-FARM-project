
document.addEventListener("DOMContentLoaded", () => {
   
  
    function getStoredProducts() {
      try {
        return JSON.parse(localStorage.getItem("farmfresh_products") || "[]");
      } catch {
        return [];
      }
    }
  
    function findProductById(id) {
      if (typeof products !== "undefined") {
        const p = products.find((prod) => prod.id === id);
        if (p) return p;
      }
      return getStoredProducts().find((prod) => prod.id === id) || null;
    }
  
   
    const cartManager = {
      
      getCart() {
        const cart = localStorage.getItem("farmfresh_cart");
        return cart
          ? JSON.parse(cart)
          : { items: [], totalItems: 0, subtotal: 0 };
      },
  
      
      saveCart(cart) {
        localStorage.setItem("farmfresh_cart", JSON.stringify(cart));
        this.updateCartIcon();
      },
  
      
      addItem(product, quantity = 1) {
        const cart = this.getCart();
        const existing = cart.items.find((i) => i.id === product.id);
  
        if (existing) {
          existing.quantity += quantity;
        } else {
          cart.items.push({
            id: product.id,
            name: product.name,
            price: product.price,
            image: product.image,
            quantity,
            farmer: product.farmer,
          });
        }
  
        this.updateCartTotals(cart);
        this.saveCart(cart);
        this.showAddToCartNotification(product.name, quantity);
      },
  
      
      updateItemQuantity(productId, quantity) {
        const cart = this.getCart();
        const item = cart.items.find((i) => i.id === productId);
        if (!item) return;
  
        item.quantity = quantity;
        if (item.quantity <= 0) {
          this.removeItem(productId);
          return;
        }
  
        this.updateCartTotals(cart);
        this.saveCart(cart);
  
        if (document.getElementById("cart-content")) this.renderCart();
      },
  
      
      removeItem(productId) {
        const cart = this.getCart();
        cart.items = cart.items.filter((i) => i.id !== productId);
        this.updateCartTotals(cart);
        this.saveCart(cart);
  
        if (document.getElementById("cart-content")) this.renderCart();
      },
  
      
      clearCart() {
        localStorage.removeItem("farmfresh_cart");
        this.updateCartIcon();
        if (document.getElementById("cart-content")) this.renderCart();
      },
  
      
      updateCartTotals(cart) {
        cart.totalItems = cart.items.reduce(
          (t, i) => t + i.quantity,
          0,
        );
        cart.subtotal = cart.items.reduce(
          (t, i) => t + i.price * i.quantity,
          0,
        );
      },
  
      
      updateCartIcon() {
        const cnt = document.getElementById("cart-count");
        if (!cnt) return;
        const { totalItems } = this.getCart();
        cnt.textContent = totalItems;
        cnt.classList.toggle("has-items", totalItems > 0);
      },
  
     
      showAddToCartNotification(name, qty) {
        const n = document.createElement("div");
        n.className = "cart-notification";
        n.innerHTML = `
          <div class="notification-content">
            <svg class="icon icon-success" viewBox="0 0 24 24">
              <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
              <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
            <div class="notification-text">
              <p><strong>${name}</strong> додано до кошика (${qty} шт.)</p>
            </div>
          </div>
          <div class="notification-actions">
            <a href="cart.php" class="btn btn-sm btn-primary">Перейти до кошика</a>
          </div>
        `;
        document.body.appendChild(n);
        setTimeout(() => n.classList.add("active"), 10);
  
        
        n.querySelector(".notification-close").addEventListener("click", () => {
          n.classList.remove("active");
          setTimeout(() => n.remove(), 300);
        });
  
        setTimeout(() => {
          if (document.body.contains(n)) n.classList.remove("active");
          setTimeout(() => n.remove(), 300);
        }, 5000);
      },
  
      
      renderCart: function () {
        const cartContent = document.getElementById("cart-content")
        const cartEmpty = document.getElementById("cart-empty")
        const cartSummary = document.getElementById("cart-summary")
  
        if (!cartContent) return
  
        const cart = this.getCart()
  
        if (cart.items.length === 0) {
          cartContent.innerHTML = ""
          cartEmpty.style.display = "flex"
          cartSummary.style.display = "none"
          return
        }
  
        cartEmpty.style.display = "none"
        cartSummary.style.display = "block"
  
        
        cartContent.innerHTML = `
          <div class="cart-items">
            <div class="cart-header-row">
              <div class="cart-header-col product-col">Товар</div>
              <div class="cart-header-col price-col">Ціна</div>
              <div class="cart-header-col quantity-col">Кількість</div>
              <div class="cart-header-col total-col">Сума</div>
              <div class="cart-header-col action-col"></div>
            </div>
            ${cart.items
              .map(
                (item) => `
              <div class="cart-item" data-id="${item.id}">
                <div class="cart-item-col product-col">
                  <div class="cart-item-image">
                    <img src="${item.image}" alt="${item.name}">
                  </div>
                  <div class="cart-item-details">
                    <h4 class="cart-item-name">${item.name}</h4>
                    <p class="cart-item-farmer">${item.farmer}</p>
                  </div>
                </div>
                <div class="cart-item-col price-col">
                  <span class="cart-item-price">${item.price} грн</span>
                </div>
                <div class="cart-item-col quantity-col">
                  <div class="quantity-control">
                    <button class="quantity-btn minus" data-id="${item.id}">-</button>
                    <input type="number" class="quantity-input" value="${item.quantity}" min="1" max="99" data-id="${item.id}">
                    <button class="quantity-btn plus" data-id="${item.id}">+</button>
                  </div>
                </div>
                <div class="cart-item-col total-col">
                  <span class="cart-item-total">${(item.price * item.quantity).toFixed(2)} грн</span>
                </div>
                <div class="cart-item-col action-col">
                  <button class="remove-item" data-id="${item.id}">
                    <svg class="icon" viewBox="0 0 24 24">
                      <polyline points="3 6 5 6 21 6"></polyline>
                      <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                      <line x1="10" y1="11" x2="10" y2="17"></line>
                      <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg>
                  </button>
                </div>
              </div>
            `,
              )
              .join("")}
          </div>
        `
  
        
        document.getElementById("cart-total-items").textContent = cart.totalItems
        document.getElementById("cart-subtotal").textContent = `${cart.subtotal.toFixed(2)} грн`
  
        
        const shippingCost = cart.subtotal >= 500 ? 0 : 50
        document.getElementById("cart-shipping").textContent = shippingCost === 0 ? "Безкоштовно" : `${shippingCost} грн`
  
        
        const total = cart.subtotal + shippingCost
        document.getElementById("cart-total").textContent = `${total.toFixed(2)} грн`
  
        
        const minusButtons = document.querySelectorAll(".quantity-btn.minus")
        const plusButtons = document.querySelectorAll(".quantity-btn.plus")
        const quantityInputs = document.querySelectorAll(".quantity-input")
        const removeButtons = document.querySelectorAll(".remove-item")
  
        minusButtons.forEach((button) => {
          button.addEventListener("click", () => {
            const productId = Number.parseInt(button.dataset.id)
            const input = document.querySelector(`.quantity-input[data-id="${productId}"]`)
            let quantity = Number.parseInt(input.value) - 1
            if (quantity < 1) quantity = 1
            input.value = quantity
            this.updateItemQuantity(productId, quantity)
          })
        })
  
        plusButtons.forEach((button) => {
          button.addEventListener("click", () => {
            const productId = Number.parseInt(button.dataset.id)
            const input = document.querySelector(`.quantity-input[data-id="${productId}"]`)
            let quantity = Number.parseInt(input.value) + 1
            if (quantity > 99) quantity = 99
            input.value = quantity
            this.updateItemQuantity(productId, quantity)
          })
        })
  
        quantityInputs.forEach((input) => {
          input.addEventListener("change", () => {
            const productId = Number.parseInt(input.dataset.id)
            let quantity = Number.parseInt(input.value)
            if (isNaN(quantity) || quantity < 1) quantity = 1
            if (quantity > 99) quantity = 99
            input.value = quantity
            this.updateItemQuantity(productId, quantity)
          })
        })
  
        removeButtons.forEach((button) => {
          button.addEventListener("click", () => {
            const productId = Number.parseInt(button.dataset.id)
            this.removeItem(productId)
          })
        })
      },
  
      
      renderCheckout: function () {
        const checkoutProducts = document.getElementById("checkout-products")
        if (!checkoutProducts) return
  
        const cart = this.getCart()
  
        if (cart.items.length === 0) {
          window.location.href = "cart.php"
          return
        }
  
        
        checkoutProducts.innerHTML = cart.items
          .map(
            (item) => `
          <div class="summary-product">
            <div class="summary-product-image">
              <img src="${item.image}" alt="${item.name}">
              <span class="summary-product-quantity">${item.quantity}</span>
            </div>
            <div class="summary-product-details">
              <h4 class="summary-product-name">${item.name}</h4>
              <p class="summary-product-farmer">${item.farmer}</p>
            </div>
            <div class="summary-product-price">${(item.price * item.quantity).toFixed(2)} грн</div>
          </div>
        `,
          )
          .join("")
  
        
        document.getElementById("checkout-total-items").textContent = cart.totalItems
        document.getElementById("checkout-subtotal").textContent = `${cart.subtotal.toFixed(2)} грн`
  
        
        const shippingCost = cart.subtotal >= 500 ? 0 : 50
        document.getElementById("checkout-shipping").textContent =
          shippingCost === 0 ? "Безкоштовно" : `${shippingCost} грн`
  
        
        const total = cart.subtotal + shippingCost
        document.getElementById("checkout-total").textContent = `${total.toFixed(2)} грн`
      },
  
      
      renderConfirmation: function () {
        const confirmationProducts = document.getElementById("confirmation-products")
        if (!confirmationProducts) return
  
        
        const orderDetails = JSON.parse(sessionStorage.getItem("farmfresh_order"))
        if (!orderDetails) {
          // window.location.href = "catalog.php"
          return
        }
  
        
        document.getElementById("order-number").textContent = orderDetails.orderNumber
        document.getElementById("order-email").textContent = orderDetails.email
        document.getElementById("order-date").textContent = orderDetails.date
        document.getElementById("order-payment-method").textContent = orderDetails.paymentMethod
        document.getElementById("order-delivery-method").textContent = orderDetails.deliveryMethod
  
        
        const addressElement = document.getElementById("order-address")
        addressElement.innerHTML = `
          <p>${orderDetails.name}</p>
          <p>${orderDetails.address}</p>
          <p>${orderDetails.city}, ${orderDetails.postalCode}</p>
          <p>Україна</p>
          <p>Телефон: ${orderDetails.phone}</p>
        `
  
        
        confirmationProducts.innerHTML = orderDetails.items
          .map(
            (item) => `
          <div class="order-product">
            <div class="order-product-image">
              <img src="${item.image}" alt="${item.name}">
            </div>
            <div class="order-product-details">
              <h5 class="order-product-name">${item.name}</h5>
              <p class="order-product-farmer">${item.farmer}</p>
            </div>
            <div class="order-product-quantity">x${item.quantity}</div>
            <div class="order-product-price">${(item.price * item.quantity).toFixed(2)} грн</div>
          </div>
        `,
          )
          .join("")
  
        
        document.getElementById("confirmation-total-items").textContent = orderDetails.totalItems
        document.getElementById("confirmation-subtotal").textContent = `${orderDetails.subtotal.toFixed(2)} грн`
        document.getElementById("confirmation-shipping").textContent =
          orderDetails.shipping === 0 ? "Безкоштовно" : `${orderDetails.shipping} грн`
        document.getElementById("confirmation-total").textContent = `${orderDetails.total.toFixed(2)} грн`
  
        
        this.clearCart()
      },
  
      
      init: function () {
        this.updateCartIcon()
  
        
        if (document.getElementById("cart-content")) {
          this.renderCart()
        }
  
        
        if (document.getElementById("checkout-products")) {
          this.renderCheckout()
          this.initCheckoutForm()
        }
  
        
        if (document.getElementById("confirmation-products")) {
          this.renderConfirmation()
          this.initConfirmationPage()
        }
      },
  
      
      initCheckoutForm: function () {
        const checkoutForm = document.getElementById("checkout-form")
        if (!checkoutForm) return
  
        const deliveryMethodSelect = document.getElementById("delivery-method")
        const deliveryAddressContainer = document.getElementById("delivery-address-container")
        const novaPoshtaContainer = document.getElementById("nova-poshta-container")
        const selfPickupContainer = document.getElementById("self-pickup-container")
  
        const paymentCardRadio = document.getElementById("payment-card")
        const paymentCashRadio = document.getElementById("payment-cash")
        const cardPaymentContainer = document.getElementById("card-payment-container")
  
        
        deliveryMethodSelect.addEventListener("change", () => {
          const method = deliveryMethodSelect.value
  
          deliveryAddressContainer.style.display = "none"
          novaPoshtaContainer.style.display = "none"
          selfPickupContainer.style.display = "none"
  
          if (method === "nova-poshta") {
            novaPoshtaContainer.style.display = "block"
          } else if (method === "self-pickup") {
            selfPickupContainer.style.display = "block"
          } else if (method === "courier" || method === "ukrposhta") {
            deliveryAddressContainer.style.display = "block"
          }
        })
  
        
        paymentCardRadio.addEventListener("change", () => {
          cardPaymentContainer.style.display = "block"
        })
  
        paymentCashRadio.addEventListener("change", () => {
          cardPaymentContainer.style.display = "none"
        })
  
        
        checkoutForm.addEventListener("submit", (e) => {
          e.preventDefault()
  
          
          const formData = new FormData(checkoutForm)
          const cart = this.getCart()
  
          
          const shippingCost = cart.subtotal >= 500 ? 0 : 50
          const total = cart.subtotal + shippingCost
  
          
          const order = {
            orderNumber: "FFC-" + Math.floor(10000 + Math.random() * 90000),
            date: new Date().toLocaleDateString("uk-UA"),
            name: formData.get("name"),
            email: formData.get("email"),
            phone: formData.get("phone"),
            deliveryMethod: deliveryMethodSelect.options[deliveryMethodSelect.selectedIndex].text,
            city: formData.get("city") || formData.get("np-city") || "",
            address: formData.get("address") || formData.get("np-warehouse") || "",
            postalCode: formData.get("postal-code") || "",
            paymentMethod: formData.get("payment-method") === "card" ? "Оплата карткою" : "Оплата при отриманні",
            items: cart.items,
            totalItems: cart.totalItems,
            subtotal: cart.subtotal,
            shipping: shippingCost,
            total: total,
            comment: formData.get("order-comment"),
          }
  
          
          sessionStorage.setItem("farmfresh_order", JSON.stringify(order))
  
          
          const paymentProcessing = document.createElement("div")
          paymentProcessing.className = "payment-processing"
          paymentProcessing.innerHTML = `
            <div class="processing-content">
              <div class="spinner"></div>
              <h3>Обробка платежу</h3>
              <p>Будь ласка, зачекайте. Не закривайте цю сторінку.</p>
            </div>
          `
  
          document.body.appendChild(paymentProcessing)
  
          
          setTimeout(() => {
            document.body.removeChild(paymentProcessing)
            window.location.href = "confirmation.php"
          }, 2000)
        })
      },
  
      
      initConfirmationPage: () => {
        const printOrderButton = document.getElementById("print-order")
        if (!printOrderButton) return
  
        printOrderButton.addEventListener("click", () => {
          window.print()
        })
      },
    }
  
    window.cartManager = cartManager;

    
    cartManager.init()
  
    

  const addToCartButtons = document.querySelectorAll(
    ".add-to-cart, .add-to-cart-btn",
  );
  let currentProductId;

  addToCartButtons.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      const productId = Number.parseInt(btn.dataset.id, 10);
      let quantity = 1;

      
      const qtyInput = document.querySelector(".quantity-input");
      if (qtyInput) quantity = Number.parseInt(qtyInput.value, 10) || 1;

      const product = findProductById(productId);
      if (product) {
        cartManager.addItem(product, quantity);
      }
    });
  });

 
  const addToCartBtn = document.querySelector(".add-to-cart-btn");
  if (addToCartBtn) {
    addToCartBtn.addEventListener("click", () => {
      if (!currentProductId) return;
      const qty = Number.parseInt(
        document.querySelector(".quantity-input")?.value || "1",
        10,
      );
      const product = findProductById(currentProductId);
      if (product) cartManager.addItem(product, qty);
    });
  }
});
  