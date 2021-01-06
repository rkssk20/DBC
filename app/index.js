(function(){
  'use strict';
  
  var header = document.getElementById('header');
  var show = document.getElementById('show');
  var hide = document.getElementById('hide');
  var link = document.getElementById('link');
  var link2 = document.getElementById('link2');
  var link3 = document.getElementById('link3');
  var link4 = document.getElementById('link4');
  var link5 = document.getElementById('link5');
  var cover = document.getElementById('cover');
  var swiper = document.getElementById('swiper-text');
  var more = document.getElementById('more');
  var next = document.getElementById('next');



  // hedder show
  show.addEventListener('click',function(){
    header.className = 'menu-open';
    cover.className = 'cover';
    no_scroll();
  });



  // hedder hide
  hide.addEventListener('click',function(){
    header.className = '';
    cover.className = '';
    return_scroll();
  });

  cover.addEventListener('click',() => {
    hide.click();
  });

  link.addEventListener('click',() => {
    hide.click();
  });
  
  link2.addEventListener('click',() => {
    hide.click();
  });

  link3.addEventListener('click',() => {
    hide.click();
  });

  link4.addEventListener('click',() => {
    hide.click();
  });

  link5.addEventListener('click',() => {
    hide.click();
  });



  // スクロール禁止
  function no_scroll() {
    document.addEventListener("mousewheel", scroll_control, { passive: false });
    document.addEventListener("touchmove", scroll_control, { passive: false });
  }

  function return_scroll(){
    document.removeEventListener("mousewheel", scroll_control, { passive: false });
    document.removeEventListener('touchmove', scroll_control, { passive: false });
  }

  function scroll_control(event) {
    event.preventDefault();
  }



  // 続きを読む
  more.addEventListener('click',function(){
    swiper.className = 'swiper-show';
    more.className = 'swiper-none'
  });

  next.addEventListener('click',function(){
    swiper.className = 'swiper-hidden';
    more.className = 'swiper-more';
  })
})(); 