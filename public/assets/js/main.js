document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    if(toggle) {
        toggle.addEventListener('click', () => sidebar.classList.toggle('active'));
    }
});
function closeModal(id) { document.getElementById(id).style.display = 'none'; }