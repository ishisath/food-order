// Menu page specific functionality
let currentCategory = 'all';
let searchQuery = '';

document.addEventListener('DOMContentLoaded', function() {
    loadMenuItems();
    initializeSearch();
    initializeCategoryFilters();
});

function loadMenuItems() {
    const menuContainer = document.getElementById('menu-items');
    if (!menuContainer) return;

    const allItems = getAllMenuItems();
    let filteredItems = allItems;

    // Apply category filter
    if (currentCategory !== 'all') {
        filteredItems = allItems.filter(item => item.category === currentCategory);
    }

    // Apply search filter
    if (searchQuery) {
        filteredItems = filteredItems.filter(item => 
            item.name.toLowerCase().includes(searchQuery.toLowerCase()) ||
            item.description.toLowerCase().includes(searchQuery.toLowerCase())
        );
    }

    if (filteredItems.length === 0) {
        menuContainer.innerHTML = `
            <div class="col-12">
                <div class="empty-state">
                    <i class="fas fa-search"></i>
                    <h3>No items found</h3>
                    <p>Try adjusting your search or category filter.</p>
                </div>
            </div>
        `;
        return;
    }

    menuContainer.innerHTML = filteredItems.map(item => `
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card menu-item">
                <img src="${item.image}" class="card-img-top" alt="${item.name}">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-title">${item.name}</h5>
                        <span class="badge bg-secondary text-capitalize">${item.category.replace('-', ' ')}</span>
                    </div>
                    <p class="card-text">${item.description}</p>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="price">$${item.price}</span>
                        <span class="spice-level spice-${item.spiceLevel}">
                            ${item.spiceLevel.charAt(0).toUpperCase() + item.spiceLevel.slice(1)}
                        </span>
                    </div>
                    <button class="btn btn-primary w-100" onclick="addToCart(${item.id}, '${item.name}', ${item.price}, '${item.image}')">
                        <i class="fas fa-plus"></i> Add to Cart
                    </button>
                </div>
            </div>
        </div>
    `).join('');
}

function initializeSearch() {
    const searchInput = document.getElementById('search-input');
    const searchBtn = document.getElementById('search-btn');
    
    if (!searchInput || !searchBtn) return;

    // Search on button click
    searchBtn.addEventListener('click', performSearch);
    
    // Search on Enter key
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            performSearch();
        }
    });
    
    // Real-time search (optional)
    let searchTimeout;
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            searchQuery = searchInput.value.trim();
            loadMenuItems();
        }, 300);
    });

    function performSearch() {
        searchQuery = searchInput.value.trim();
        loadMenuItems();
    }
}

function initializeCategoryFilters() {
    const categoryButtons = document.querySelectorAll('[data-category]');
    
    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Update active button
            categoryButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Update current category
            currentCategory = this.getAttribute('data-category');
            
            // Reload items
            loadMenuItems();
        });
    });
}

// Override the checkUserLogin function for menu page
function checkUserLogin() {
    updateAuthUI();
}