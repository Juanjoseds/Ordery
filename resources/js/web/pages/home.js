$(() =>{
    // AO
    // AOS.init({
    //     disable: function() {
    //         var maxWidth = 800;
    //         return window.innerWidth < maxWidth;
    //     }
    // });
    // $(function() {
    //     var header = $(".start-style");
    //     $(window).scroll(function() {
    //         var scroll = $(window).scrollTop();
    //
    //         if (scroll >= 10) {
    //             header.removeClass('start-style').addClass("scroll-on");
    //         } else {
    //             header.removeClass("scroll-on").addClass('start-style');
    //         }
    //     });
    // });
    //
    // //Animation
    //
    // $(document).ready(function() {
    //     $('#main-header.hero-anime').removeClass('hero-anime');
    // });
    //
    // //Menu On Hover
    //
    // $('body').on('mouseenter mouseleave','.nav-item',function(e){
    //     if ($(window).width() > 750) {
    //         var _d=$(e.target).closest('.nav-item');_d.addClass('show');
    //         setTimeout(function(){
    //             _d[_d.is(':hover')?'addClass':'removeClass']('show');
    //         },1);
    //     }
    // });

    initBuscador();
    initSwiperTiendas();
});

function initBuscador(){
    let search = document.getElementById('search');
    let button = document.getElementById('button');
    let input = document.getElementById('input');

    function loading() {
        search.classList.add('loading');

        setTimeout(function() {
            search.classList.remove('loading');
        }, 1500);
    }

    button.addEventListener('click', loading);

    input.addEventListener('keydown', function() {
        if(event.keyCode == 13) loading();
    });
}

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

