// source : https://codepen.io/digitaltechne

const tabsCarousel = {
    init() {
        this.carousel = Array.prototype.slice.call(
            document.querySelectorAll(".carousel__tabs")
        );
        if (!this.carousel.length) {
            return;
        }
        this.enableCarousel();
    },
    enableCarousel() {
        this.carouselTabs = new Swiper(".carousel__tabs", {
            autoHeight: true,
            spaceBetween: 0,
            loop: true,
            effect: "fade",
            fadeEffect: {
                crossFade: true
            },
            breakpoints: {
                320: {
                    allowTouchMove: true,
                    slidesPerView: 1
                },
                768: {
                    allowTouchMove: false,
                    slidesPerView: 1
                }
            },
            pagination: {
                el: ".tabs-pagination",
                clickable: true
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            on: {
                breakpoint: function (swiper) {
                    if (swiper.navigation.nextEl !== undefined) {
                        tabsCarousel.setNavigation(swiper);
                    }
                }
            }
        });
    },
    setNavigation(swiper) {
        const mdBreakPoint = window.matchMedia("(min-width: 768px)").matches;
        if (mdBreakPoint === true) {
            swiper.navigation.update();
            swiper.navigation.nextEl.classList.add("swiper-button-hidden");
            swiper.navigation.nextEl.classList.remove("swiper-button-next");
        } else {
            swiper.navigation.update();
            swiper.navigation.nextEl.classList.remove("swiper-button-hidden");
            swiper.navigation.nextEl.classList.add("swiper-button-next");
        }
    }
};
tabsCarousel.init();
