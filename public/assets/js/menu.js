const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");
const overlay = document.querySelector(".overlay");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
    if (overlay.style.visibility == 'visible') {
        overlay.style.visibility = 'hidden';
    } else {
        overlay.style.visibility = 'visible';
    }

    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
}

