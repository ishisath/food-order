// Reservations page specific functionality
document.addEventListener('DOMContentLoaded', function() {
    checkUserLogin();
    initializeReservationForm();
    setMinDate();
});

function checkUserLogin() {
    const reservationMessage = document.getElementById('reservation-message');
    const reservationForm = document.getElementById('reservation-form');
    
    if (currentUser) {
        reservationMessage.style.display = 'none';
        reservationForm.style.display = 'block';
        
        // Pre-fill user information
        document.getElementById('res-name').value = currentUser.name;
        document.getElementById('res-email').value = currentUser.email;
    } else {
        reservationMessage.style.display = 'block';
        reservationForm.style.display = 'none';
    }
    
    updateAuthUI();
}

function setMinDate() {
    const dateInput = document.getElementById('res-date');
    if (!dateInput) return;
    
    // Set minimum date to today
    const today = new Date();
    const formattedDate = today.getFullYear() + '-' + 
                         String(today.getMonth() + 1).padStart(2, '0') + '-' + 
                         String(today.getDate()).padStart(2, '0');
    dateInput.min = formattedDate;
}

function initializeReservationForm() {
    const reservationForm = document.getElementById('reservation-form');
    if (!reservationForm) return;

    reservationForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (!currentUser) {
            showNotification('Please login to make a reservation', 'error');
            return;
        }

        const formData = {
            name: document.getElementById('res-name').value,
            email: document.getElementById('res-email').value,
            phone: document.getElementById('res-phone').value,
            guests: document.getElementById('res-guests').value,
            date: document.getElementById('res-date').value,
            time: document.getElementById('res-time').value,
            occasion: document.getElementById('res-occasion').value,
            requests: document.getElementById('res-requests').value
        };

        // Validate required fields
        if (!formData.name || !formData.email || !formData.phone || 
            !formData.guests || !formData.date || !formData.time) {
            showNotification('Please fill in all required fields', 'error');
            return;
        }

        // Validate date is not in the past
        const selectedDate = new Date(formData.date);
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        
        if (selectedDate < today) {
            showNotification('Please select a future date', 'error');
            return;
        }

        // Save reservation
        const reservations = JSON.parse(localStorage.getItem('reservations')) || [];
        const newReservation = {
            id: Date.now(),
            userId: currentUser.id,
            ...formData,
            status: 'confirmed',
            createdAt: new Date().toISOString()
        };
        
        reservations.push(newReservation);
        localStorage.setItem('reservations', JSON.stringify(reservations));

        // Show success modal with details
        showReservationSuccess(newReservation);
        
        // Reset form
        reservationForm.reset();
        document.getElementById('res-name').value = currentUser.name;
        document.getElementById('res-email').value = currentUser.email;
    });
}

function showReservationSuccess(reservation) {
    const successModal = new bootstrap.Modal(document.getElementById('reservationSuccessModal'));
    const reservationDetails = document.getElementById('reservation-details');
    
    const formatDate = new Date(reservation.date).toLocaleDateString('en-US', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
    
    const formatTime = reservation.time.length === 5 ? 
                      new Date(`2000-01-01T${reservation.time}:00`).toLocaleTimeString('en-US', {
                          hour: 'numeric',
                          minute: '2-digit',
                          hour12: true
                      }) : reservation.time;

    reservationDetails.innerHTML = `
        <div class="reservation-summary mt-3">
            <h5>Reservation Details:</h5>
            <p><strong>Date:</strong> ${formatDate}</p>
            <p><strong>Time:</strong> ${formatTime}</p>
            <p><strong>Guests:</strong> ${reservation.guests} ${reservation.guests == 1 ? 'person' : 'people'}</p>
            <p><strong>Name:</strong> ${reservation.name}</p>
            <p><strong>Phone:</strong> ${reservation.phone}</p>
            ${reservation.occasion ? `<p><strong>Occasion:</strong> ${reservation.occasion}</p>` : ''}
        </div>
    `;
    
    successModal.show();
}

// Override auth modal events for reservations page
document.addEventListener('DOMContentLoaded', function() {
    const loginModal = document.getElementById('loginModal');
    if (loginModal) {
        loginModal.addEventListener('hidden.bs.modal', function() {
            checkUserLogin();
        });
    }
});