// main.js - Custom JavaScript for YOK Catering Service Website

document.addEventListener('DOMContentLoaded', function() {
    // Example: Show a welcome alert on the home page
    if (window.location.pathname.endsWith('index.php')) {
        // Uncomment the next line to enable a welcome alert
        // alert('Welcome to YOK Catering Service!');
    }

    // Example: Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // Log visit on every page load
    fetch('/admin/log_visit.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ page: window.location.pathname })
    });

    // Add more custom JS below as needed
});
