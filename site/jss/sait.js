document.querySelectorAll('.game-item').forEach(item => {
    item.addEventListener('mouseenter', () => {
      item.style.transform = 'translateY(-5px)'; // Поднимаем карточку
    });

    item.addEventListener('mouseleave', () => {
      item.style.transform = 'translateY(0)'; // Возвращаем карточку на место
    });
});