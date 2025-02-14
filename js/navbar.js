document.addEventListener("DOMContentLoaded", () => {
    const burgerButton = document.querySelector(".menu-burger");
    const navList = document.querySelector(".nav-list");

    burgerButton.addEventListener("click", () => {
        navList.classList.toggle("active");
    });
});
