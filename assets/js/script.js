document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.hp-listing-slider', {
        // Parámetros opcionales
        direction: 'horizontal',
        loop: true,
        spaceBetween: 0,
        effect: 'slide', // Puedes cambiar a 'fade' si prefieres

        // Paginación
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        // Flechas
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        
        // Autoplay opcional
        /*
        autoplay: {
            delay: 5000,
        },
        */
    });
});