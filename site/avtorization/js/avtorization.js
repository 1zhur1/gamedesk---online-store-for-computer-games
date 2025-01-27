document.addEventListener('DOMContentLoaded', function() {
    const registerForm = document.getElementById('register-form');
    const loginForm = document.getElementById('login-form');
    
    // Функция для переключения форм
    function toggleForms() {
        if (window.getComputedStyle(registerForm).display === 'none') {
            registerForm.style.display = 'block';
            loginForm.style.display = 'none';
        } else {
            registerForm.style.display = 'none';
            loginForm.style.display = 'block';
        }
    }

    // Добавляем обработчики событий на ссылки для переключения форм
    const toggleLinks = document.querySelectorAll('.toggle-form');
    toggleLinks.forEach(function(link) {
        link.addEventListener('click', toggleForms);
    });
});
