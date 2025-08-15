// Cart page specific functionality
document.addEventListener('DOMContentLoaded', function() {
    loadCartItems();
    initializeCheckout();
});

function loadCartItems() {
    const cartItemsContainer = document.getElementById('cart-items');
    const subtotalElement = document.getElementById('subtotal');
    const taxElement = document.getElementById('tax');
    const deliveryFeeElement = document.getElementById('delivery-fee');
    const totalElement = document.getElementById('total');
    
    if (!cartItemsContainer) return;

    if (cart.length === 0) {
        cartItemsContainer.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-shopping-cart"></i>
                <h3>Your cart is empty</h3>
                <p>Add some delicious items from our menu to get started!</p>
                <a href="menu.html" class="btn btn-primary">Browse Menu</a>
            </div>
        `;
        updateOrderSummary(0, 0, 0, 0);
        return;
    }

    cartItemsContainer.innerHTML = cart.map(item => `
        <div class="cart-item d-flex align-items-center">
            <img src="${item.image}" alt="${item.name}" class="me-3">
            <div class="flex-grow-1">
                <h5 class="mb-1">${item.name}</h5>
                <p class="text-muted mb-2">$${item.price.toFixed(2)} each</p>
                <div class="quantity-controls">
                    <button class="quantity-btn" onclick="updateQuantity(${item.id}, ${item.quantity - 1})">
                        <i class="fas fa-minus"></i>
                    </button>
                    <input type="number" class="quantity-input" value="${item.quantity}" min="1" 
                           onchange="updateQuantity(${item.id}, this.value)">
                    <button class="quantity-btn" onclick="updateQuantity(${item.id}, ${item.quantity + 1})">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="text-end">
                <div class="fw-bold mb-2">$${(item.price * item.quantity).toFixed(2)}</div>
                <button class="btn btn-sm btn-outline-danger" onclick="removeFromCart(${item.id})">
                    <i class="fas fa-trash"></i> Remove
                </button>
            </div>
        </div>
    `).join('');

    updateOrderSummary();
}

function updateQuantity(itemId, newQuantity) {
    const quantity = parseInt(newQuantity);
    
    if (quantity <= 0) {
        removeFromCart(itemId);
        return;
    }

    const item = cart.find(item => item.id === itemId);
    if (item) {
        item.quantity = quantity;
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartCount();
        loadCartItems();
    }
}

function removeFromCart(itemId) {
    cart = cart.filter(item => item.id !== itemId);
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
    loadCartItems();
    showNotification('Item removed from cart', 'success');
}

function updateOrderSummary(subtotal = null, tax = null, deliveryFee = null, total = null) {
    const subtotalElement = document.getElementById('subtotal');
    const taxElement = document.getElementById('tax');
    const deliveryFeeElement = document.getElementById('delivery-fee');
    const totalElement = document.getElementById('total');

    if (subtotal === null) {
        subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    }
    
    if (tax === null) {
        tax = subtotal * 0.08; // 8% tax
    }
    
    if (deliveryFee === null) {
        deliveryFee = subtotal > 0 ? 3.99 : 0;
    }
    
    if (total === null) {
        total = subtotal + tax + deliveryFee;
    }

    if (subtotalElement) subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
    if (taxElement) taxElement.textContent = `$${tax.toFixed(2)}`;
    if (deliveryFeeElement) deliveryFeeElement.textContent = `$${deliveryFee.toFixed(2)}`;
    if (totalElement) totalElement.textContent = `$${total.toFixed(2)}`;
}

function initializeCheckout() {
    const checkoutBtn = document.getElementById('checkout-btn');
    if (!checkoutBtn) return;

    checkoutBtn.addEventListener('click', function() {
        if (!currentUser) {
            showNotification('Please login to place an order', 'error');
            return;
        }

        if (cart.length === 0) {
            showNotification('Your cart is empty', 'error');
            return;
        }

        // Simulate order processing
        const orderTotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0) + 
                          (cart.reduce((sum, item) => sum + (item.price * item.quantity), 0) * 0.08) + 3.99;

        // Clear cart
        cart = [];
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartCount();
        
        // Save order (in real app, this would be sent to backend)
        const orders = JSON.parse(localStorage.getItem('orders')) || [];
        orders.push({
            id: Date.now(),
            userId: currentUser.id,
            items: cart,
            total: orderTotal,
            date: new Date().toISOString(),
            status: 'confirmed'
        });
        localStorage.setItem('orders', JSON.stringify(orders));

        // Show success modal
        const successModal = new bootstrap.Modal(document.getElementById('orderSuccessModal'));
        successModal.show();

        // Reload cart display
        loadCartItems();
    });
}

// Override the checkUserLogin function for cart page
function checkUserLogin() {
    updateAuthUI();
    const checkoutBtn = document.getElementById('checkout-btn');
    
    if (currentUser && checkoutBtn) {
        checkoutBtn.disabled = false;
        checkoutBtn.innerHTML = '<i class="fas fa-credit-card"></i> Proceed to Checkout';
    } else if (checkoutBtn) {
        checkoutBtn.disabled = true;
        checkoutBtn.innerHTML = 'Login Required';
    }
}