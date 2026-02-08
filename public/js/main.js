// Main JS for scroll behavior and mode toggle

document.addEventListener('DOMContentLoaded', () => {
    
    // Navbar Scroll Logic
    const navbar = document.getElementById('main-navbar');
    
    // If navbar is present
    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                // User scrolled down
                navbar.classList.add('nav-scrolled');
                navbar.classList.remove('bg-transparent');
            } else {
                // User is at top
                navbar.classList.remove('nav-scrolled');
                navbar.classList.add('bg-transparent');
            }
        });
    }

    // Invert mode logic (Dark Mode toggle requested via invert property)
    const toggleBtn = document.getElementById('mode-toggle');
    const html = document.documentElement;

    if (toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            html.classList.toggle('invert-mode');
            
            // Optional: Save preference
            // localStorage.setItem('theme', html.classList.contains('invert-mode') ? 'light' : 'dark');
        });
    }

    // Initialize state if needed (optional)
});
