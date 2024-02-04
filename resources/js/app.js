window.addEventListener('scroll', function () {
    const header = document.querySelector('header');

    if (window.scrollY > 1) {
        header.classList.add('sticky');
    } else {
        header.classList.remove('sticky');
    }
});

// Navigation arrows
/* Swiper */
const swiper = new Swiper('.swiper', {
    direction: 'horizontal',
    loop: true,

    breakpoints: {
        320: {
            slidesPerView: 1.2,
            spaceBetween: 20,
            effect: 'fade',
            fadeEffect: {
                crossFade: true,
            },
        },
        414: {
            slidesPerView: 1.2,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 2,
            spaceBetween: 40,
        },
        1280: {
            slidesPerView: 2,
            spaceBetween: 40,
        },
    },

    allowTouchMove: false,

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

new Swiper('.hero-slider', {
    loop: true,
    speed: 1000,
    allowTouchMove: false,
    autoplay: {
        delay: 5000,
    },
    navigation: {
        nextEl: '.hero-slider__button-next',
        prevEl: '.hero-slider__button-prev',
    },

});

// Modal windows
!(function (e) {
    'function' != typeof e.matches &&
    (e.matches =
        e.msMatchesSelector ||
        e.mozMatchesSelector ||
        e.webkitMatchesSelector ||
        function (e) {
            for (
                var t = this,
                    o = (t.document || t.ownerDocument).querySelectorAll(e),
                    n = 0;
                o[n] && o[n] !== t;

            )
                ++n;
            return Boolean(o[n]);
        }),
    'function' != typeof e.closest &&
    (e.closest = function (e) {
        for (var t = this; t && 1 === t.nodeType; ) {
            if (t.matches(e)) return t;
            t = t.parentNode;
        }
        return null;
    });
})(window.Element.prototype);

document.addEventListener('DOMContentLoaded', function () {
    var modalButtons = document.querySelectorAll('.js-open-modal'),
        overlay = document.querySelector('.js-overlay-modal'),
        closeButtons = document.querySelectorAll('.js-modal-close');

    modalButtons.forEach(function (item) {
        item.addEventListener('click', function (e) {
            e.preventDefault();

            var modalId = this.getAttribute('data-modal'),
                modalElem = document.querySelector(
                    '.modal[data-modal="' + modalId + '"]'
                );

            modalElem.classList.add('active');
            overlay.classList.add('active');
        });
    });

    closeButtons.forEach(function (item) {
        item.addEventListener('click', function (e) {
            var parentModal = this.closest('.modal');

            parentModal.classList.remove('active');
            overlay.classList.remove('active');
        });
    });

    document.body.addEventListener(
        'keyup',
        function (e) {
            var key = e.keyCode;

            if (key == 27) {
                document.querySelector('.modal.active').classList.remove('active');
                document.querySelector('.overlay.active').classList.remove('active');
            }
        },
        false
    );

    overlay.addEventListener('click', function () {
        document.querySelector('.modal.active').classList.remove('active');
        this.classList.remove('active');
    });
});
