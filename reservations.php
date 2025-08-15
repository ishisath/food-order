<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations - Spice Garden Restaurant</title>
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
                    <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.php">Cart <span id="cart-count" class="badge bg-primary">0</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#testimonials">Testimonials</a></li>
                    <li class="nav-item"><a class="nav-link active" href="reservations.php">Reservations</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#contact">Contact</a></li>
                    <li class="nav-item" id="auth-nav">
                        <button class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Reservation Header -->
    <section class="reservation-header">
        <div class="container">
            <div class="text-center text-white">
                <h1 class="display-4 mb-4">Make a Reservation</h1>
                <p class="lead">Book your table for an unforgettable dining experience</p>
            </div>
        </div>
    </section>

    <!-- Reservation Content -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Reserve Your Table</h3>
                        </div>
                        <div class="card-body">
                            <div id="reservation-message" class="alert alert-warning">
                                <i class="fas fa-info-circle"></i>
                                You must be logged in to make a reservation. Please <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">login</a> or register first.
                            </div>
                            
                            <form id="reservation-form" style="display: none;">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="res-name" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="res-name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="res-email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="res-email" required>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="res-phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="res-phone" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="res-guests" class="form-label">Number of Guests</label>
                                        <select class="form-select" id="res-guests" required>
                                            <option value="">Select guests</option>
                                            <option value="1">1 Guest</option>
                                            <option value="2">2 Guests</option>
                                            <option value="3">3 Guests</option>
                                            <option value="4">4 Guests</option>
                                            <option value="5">5 Guests</option>
                                            <option value="6">6 Guests</option>
                                            <option value="7">7 Guests</option>
                                            <option value="8">8 Guests</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="res-date" class="form-label">Preferred Date</label>
                                        <input type="date" class="form-control" id="res-date" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="res-time" class="form-label">Preferred Time</label>
                                        <select class="form-select" id="res-time" required>
                                            <option value="">Select time</option>
                                            <option value="11:00">11:00 AM</option>
                                            <option value="11:30">11:30 AM</option>
                                            <option value="12:00">12:00 PM</option>
                                            <option value="12:30">12:30 PM</option>
                                            <option value="13:00">1:00 PM</option>
                                            <option value="13:30">1:30 PM</option>
                                            <option value="14:00">2:00 PM</option>
                                            <option value="14:30">2:30 PM</option>
                                            <option value="17:00">5:00 PM</option>
                                            <option value="17:30">5:30 PM</option>
                                            <option value="18:00">6:00 PM</option>
                                            <option value="18:30">6:30 PM</option>
                                            <option value="19:00">7:00 PM</option>
                                            <option value="19:30">7:30 PM</option>
                                            <option value="20:00">8:00 PM</option>
                                            <option value="20:30">8:30 PM</option>
                                            <option value="21:00">9:00 PM</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="res-occasion" class="form-label">Special Occasion (Optional)</label>
                                    <select class="form-select" id="res-occasion">
                                        <option value="">No special occasion</option>
                                        <option value="birthday">Birthday</option>
                                        <option value="anniversary">Anniversary</option>
                                        <option value="business">Business Meeting</option>
                                        <option value="date">Date Night</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="res-requests" class="form-label">Special Requests (Optional)</label>
                                    <textarea class="form-control" id="res-requests" rows="3" placeholder="Any dietary restrictions or special requests..."></textarea>
                                </div>
                                
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-calendar-check"></i> Make Reservation
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Restaurant Info -->
                    <div class="row mt-5">
                        <div class="col-md-4 text-center">
                            <i class="fas fa-clock text-primary" style="font-size: 2rem;"></i>
                            <h5 class="mt-3">Opening Hours</h5>
                            <p class="text-muted">Mon-Sun: 11:00 AM - 10:00 PM</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <i class="fas fa-utensils text-primary" style="font-size: 2rem;"></i>
                            <h5 class="mt-3">Cuisine</h5>
                            <p class="text-muted">Indian, Sri Lankan & Desserts</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <i class="fas fa-users text-primary" style="font-size: 2rem;"></i>
                            <h5 class="mt-3">Group Size</h5>
                            <p class="text-muted">Up to 8 people per reservation</p>
                        </div>
                    </div>
                </div>
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

    <!-- Reservation Success Modal -->
    <div class="modal fade" id="reservationSuccessModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reservation Confirmed!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fas fa-calendar-check text-success" style="font-size: 3rem;"></i>
                        <h4 class="mt-3">Thank you for your reservation!</h4>
                        <p>Your table has been reserved successfully. You will receive a confirmation email shortly.</p>
                        <div id="reservation-details"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script src="reservations.js"></script>
</body>
</html>