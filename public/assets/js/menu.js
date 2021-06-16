const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");
const overlay = document.querySelector(".overlay");

hamburger.addEventListener("click", mobileMenu);

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

async function mobileMenu() {
    if (overlay.style.visibility == 'visible') {
        overlay.style.visibility = 'hidden';
 //       await sleep(300);
 //       navMenu.style.transition = 'none';
    } else {
        navMenu.style.transition = '0.3s';
        overlay.style.visibility = 'visible';
    }

    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");

}

/*
$(window).bind('scroll', function () {
    if ($(window).scrollTop() > 0) {
        $('.app-header').addClass('active');
    } else {
        $('.app-header').removeClass('active');
    }
})*/