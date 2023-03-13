(function ($) {
  "use strict";


  // Gallery slider
  var blog_gallery = new Swiper(".blog__gallery-slider", {
    effect: "cube",
    grabCursor: true,
    cubeEffect: {
      shadow: true,
      slideShadows: true,
      shadowOffset: 20,
      shadowScale: 0.94,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });


  // Hero SLider
  var hero_slider = new Swiper(".hero__slider", {
    loop: true,
    speed: 1500,
    spaceBetween: 0,
    effect: "fade",
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });


  // Popular Slider
  var popular_slider = new Swiper(".popular__slider", {
    loop: true,
    speed: 2000,
    freeMode: true,
    spaceBetween: 0,
    centeredSlides: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      640: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 40,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 50,
      },
    },
  });


  // Category Slider
  var category_slider = new Swiper(".category__slider", {
    effect: "cards",
    grabCursor: true,
  });


    // Go to Top
    let scroll_top = document.getElementById("scroll_top");

    if( scroll_top ) {
      window.onscroll = function() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
          scroll_top.classList.add('show');
        } else {
          scroll_top.classList.remove('show');
        }
      };
  
      scroll_top.addEventListener( 'click', function(e) {
        e.preventDefault();
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      } );
    }
    

    jQuery(document).ready(function () {
      // Mean Menu Active
      $('#mobile_menu').meanmenu({
        meanScreenWidth: '1199',
        meanMenuContainer: '.mobile-menu',
      });

      $('#menu_open').on('click', function(){
        $(this).hide();
        $('.mobile-menu').show();
        $('#menu_close').show();
        $('body').css('overflow', 'hidden');
      });

      $('#menu_close').on('click', function(){
        $(this).hide();
        $('.mobile-menu').hide();
        $('#menu_open').show();
        $('body').css('overflow', 'auto');
      });


    });


})(jQuery);