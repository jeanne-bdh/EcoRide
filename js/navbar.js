const menuBurger = document.querySelector(".menu-burger");
const navList = document.querySelector(".nav-list");

menuBurger.addEventListener("click", () => {
    navList.classList.toggle("active");
});

const links = document.querySelectorAll("a");
links.forEach(link => {
    link.addEventListener("click", () => {
        navList.classList.remove("active");
    });
});