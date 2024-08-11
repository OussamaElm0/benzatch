import './bootstrap';

// JavaScript to toggle menu visibility
document.getElementById('menu-button').addEventListener('click', function() {
    const menu = document.getElementById('menu');
    menu.classList.toggle('hidden');
});
