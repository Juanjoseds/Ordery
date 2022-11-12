$(() =>{
    // AO
    // AOS.init({
    //     disable: function() {
    //         var maxWidth = 800;
    //         return window.innerWidth < maxWidth;
    //     }
    // });

    initBuscador();
    initSwiperTiendas();
});





function initSwiperTiendas(){
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: "4",
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
    console.log('INIT SWIPER');
}

