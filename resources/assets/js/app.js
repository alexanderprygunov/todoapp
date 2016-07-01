$(document).ready(function() {
    // main slider
    (function (){
        var $slider = $('.b-slider.slider-main');
        if (!$slider.length) return;
        $slider.slick({
            fade: true,
            slidesToScroll: 1,
            slidesToShow: 1,
            slide: '.slider-item',
            swipeToSlide: true,
            infinite: true,
            centerMode: false,
            dots: false,
            arrows: false,
            speed: 1200,
            autoplay: true,
            autoplaySpeed: 4000,
            pauseOnHover: false
        });
    })();
});