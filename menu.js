const abrirMenu = document.getElementById('abrir');
const nav = document.getElementById('nav');

abrirMenu.addEventListener('click', () => {
    nav.classList.toggle('active');
});