(function(){
  'use strict';

  function swiperSwitch(){
    if(window.matchMedia('(max-width: 767px)').matches){
      var mySwiper = new Swiper('.swiper1', {
        slidesPerView: 1,
        navigation: {
          nextEl: '.next1',
          prevEl: '.prev1'
        },
        pagination: {
          el: '.swiper-pagination',
          type: 'bullets',
          clickable: true
        }
      });
    }else if(window.matchMedia('(min-width: 768px)').matches){
      var mySwiper = new Swiper('.swiper1', {
        slidesPerView: 3,
        navigation: {
          nextEl: '.next1',
          prevEl: '.prev1'
        },
        pagination: {
          el: '.swiper-pagination',
          type: 'bullets',
          clickable: true
        }
      });
    }
  }

  window.onload = swiperSwitch;
  window.onresize = swiperSwitch;

  var swiper = new Swiper('.swiper2', {
    navigation: {
      nextEl: '.next2',
      prevEl: '.prev2',
    },
  });

  var sliderThumbnail = new Swiper('.slider-thumbnail', {
    slidesPerView: 4,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
  });

  var slider = new Swiper('.swiper3', {
    navigation: {
      nextEl: '.next3',
      prevEl: '.prev3',
    },
    thumbs: {
      swiper: sliderThumbnail
    }
  });
})(); 