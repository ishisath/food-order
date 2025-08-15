<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spice Garden Restaurant</title>
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
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.php">Cart <span id="cart-count" class="badge bg-primary">0</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonials">Testimonials</a></li>
                    <li class="nav-item"><a class="nav-link" href="reservations.php">Reservations</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item" id="auth-nav">
                        <button class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-overlay">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 class="display-4 text-white mb-4 fade-in">Welcome to Spice Garden</h1>
                        <p class="lead text-white mb-4 fade-in">Authentic Indian & Sri Lankan Cuisine with Delicious Desserts</p>
                        <div class="fade-in">
                            <a href="menu.php" class="btn btn-primary btn-lg me-3">View Menu</a>
                            <a href="reservations.php" class="btn btn-outline-light btn-lg">Make Reservation</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="mb-4">About Spice Garden</h2>
                    <p class="text-muted mb-4">
                        Welcome to Spice Garden, where we bring you the authentic flavors of India and Sri Lanka. 
                        Our passionate chefs use traditional recipes passed down through generations, combined with 
                        the finest ingredients to create an unforgettable dining experience.
                    </p>
                    <p class="text-muted mb-4">
                        From aromatic biryanis to spicy curries and mouth-watering desserts, every dish is crafted 
                        with love and attention to detail. Join us for a culinary journey that will tantalize your taste buds.
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-leaf text-primary"></i>
                                <h5>Fresh Ingredients</h5>
                                <p class="text-muted">Sourced daily from local markets</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-award text-primary"></i>
                                <h5>Authentic Recipes</h5>
                                <p class="text-muted">Traditional family recipes</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.pexels.com/photos/1267320/pexels-photo-1267320.jpeg?auto=compress&cs=tinysrgb&w=600" 
                         alt="Restaurant Interior" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Menu Items -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Featured Dishes</h2>
                <p class="text-muted">Try our most popular items</p>
            </div>
            <div class="row" id="featured-items">
                <!-- Featured items will be loaded here -->
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2>What Our Customers Say</h2>
                <p class="text-muted">Read reviews from our valued customers</p>
            </div>
            <div class="row" id="testimonials-container">
                <!-- Testimonials will be loaded here -->
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5 bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="mb-4">Contact Us</h2>
                    <div class="contact-info mb-4">
                        <div class="d-flex mb-3">
                            <i class="fas fa-map-marker-alt me-3 mt-1"></i>
                            <div>
                                <h5>Address</h5>
                                <p>123 Spice Street, Flavor City, FC 12345</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <i class="fas fa-phone me-3 mt-1"></i>
                            <div>
                                <h5>Phone</h5>
                                <p>(555) 123-4567</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <i class="fas fa-envelope me-3 mt-1"></i>
                            <div>
                                <h5>Email</h5>
                                <p>info@spicegarden.com</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <i class="fas fa-clock me-3 mt-1"></i>
                            <div>
                                <h5>Hours</h5>
                                <p>Mon-Sun: 11:00 AM - 10:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="mb-4">Send us a Review</h3>
                    <form id="review-form">
                        <div class="mb-3">
                            <label for="reviewer-name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="reviewer-name" required>
                        </div>
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <select class="form-select" id="rating" required>
                                <option value="">Select Rating</option>
                                <option value="5">⭐⭐⭐⭐⭐ (5 stars)</option>
                                <option value="4">⭐⭐⭐⭐ (4 stars)</option>
                                <option value="3">⭐⭐⭐ (3 stars)</option>
                                <option value="2">⭐⭐ (2 stars)</option>
                                <option value="1">⭐ (1 star)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="review-text" class="form-label">Your Review</label>
                            <textarea class="form-control" id="review-text" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p>&copy; 2025 Spice Garden Restaurant. All rights reserved.</p>
        </div>
    </footer>

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
</body>
</html>