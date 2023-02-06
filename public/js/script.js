const user_login = document.querySelector('#user-btn');
const admin_login = document.querySelector('#admin-btn');
const container = document.querySelector('.container');

admin_login.addEventListener('click', () => {
    container.classList.add("admin-mode")
});

user_login.addEventListener('click', () => {
    container.classList.remove("admin-mode")
});