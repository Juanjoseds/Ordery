$(() =>{
    initBuscador();
    initSwiperTiendas();
});


function initSwiperTiendas(){
    new Swiper(".mySwiper", {
        slidesPerView: "4",
        spaceBetween: 60,
        // pagination: {
        //     el: ".swiper-pagination",
        //     clickable: true,
        // },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
            navigationVerticalAlign: 'center'
        },
    });
    console.log('INIT SWIPER');
}

