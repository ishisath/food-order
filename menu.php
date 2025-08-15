<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Spice Garden Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-utensils"></i> Spice Garden
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#about">About</a></li>
                    <li class="nav-item"><a class="nav-link active" href="menu.php">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.php">Cart <span id="cart-count" class="badge bg-primary">0</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#testimonials">Testimonials</a></li>
                    <li class="nav-item"><a class="nav-link" href="reservations.php">Reservations</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#contact">Contact</a></li>
                    <li class="nav-item" id="auth-nav">
                        <button class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Menu Header -->
    <section class="menu-header">
        <div class="container">
            <div class="text-center text-white">
                <h1 class="display-4 mb-4">Our Menu</h1>
                <p class="lead">Discover our authentic flavors from India and Sri Lanka</p>
            </div>
        </div>
    </section>

    <!-- Menu Content -->
    <section class="py-5">
        <div class="container">
            <!-- Search Bar -->
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto">
                    <div class="search-bar">
                        <div class="input-group">
                            <input type="text" class="form-control" id="search-input" placeholder="Search for dishes...">
                            <button class="btn btn-primary" id="search-btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category Filters -->
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <div class="btn-group" role="group">
                        <button class="btn btn-outline-primary active" data-category="all">All Items</button>
                        <button class="btn btn-outline-primary" data-category="indian">Indian</button>
                        <button class="btn btn-outline-primary" data-category="sri-lankan">Sri Lankan</button>
                        <button class="btn btn-outline-primary" data-category="desserts">Desserts</button>
                    </div>
                </div>
            </div>

            <!-- Menu Items -->
            <div class="row" id="menu-items">
                <!-- Menu items will be loaded here -->
            </div>
        </div>
    </section>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="auth-form">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3" id="name-field" style="display: none;">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <button type="submit" class="btn btn-primary w-100" id="auth-submit">Login</button>
                    </form>
                    <hr>
                    <p class="text-center">
                        <span id="switch-text">Don't have an account?</span>
                        <a href="#" id="switch-mode">Register here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script src="menu.js"></script>
</body>
</html>