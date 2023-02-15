const toggle_sidebar = document.querySelector('#sidebar-toggle');
const sidebar = document.querySelector("#sidebar");

toggle_sidebar.addEventListener('click', () => {
    sidebar.classList.toggle("none");
});


