document.addEventListener('DOMContentLoaded', function() {
    // Бургер-меню
    const menuToggle = document.getElementById('menuToggle');
    const mainNav = document.getElementById('mainNav');
    
    menuToggle.addEventListener('click', function() {
        this.classList.toggle('active');
        mainNav.classList.toggle('active');
    });
    
    // Фильтрация таблицы
    const applyFilters = document.getElementById('applyFilters');
    if (applyFilters) {
        applyFilters.addEventListener('click', function() {
            const disciplineFilter = document.getElementById('discipline').value.toLowerCase();
            const groupFilter = document.getElementById('group').value.toLowerCase();
            const rows = document.querySelectorAll('table tbody tr');
            
            rows.forEach(row => {
                const name = row.cells[1].textContent.toLowerCase();
                const group = row.cells[2].textContent.toLowerCase();
                
                const nameMatch = !disciplineFilter || name.includes(disciplineFilter);
                const groupMatch = !groupFilter || group.includes(groupFilter);
                
                row.style.display = (nameMatch && groupMatch) ? '' : 'none';
            });
        });
    }
});