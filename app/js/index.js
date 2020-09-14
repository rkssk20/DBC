(function(){
  'use strict';
  
  var header = document.getElementById('header');
  var show = document.getElementById('show');
  var hide = document.getElementById('hide');
  var cover = document.getElementById('cover');

  // hamburger icon
  show.addEventListener('click',function(){
    if(header.className === ''){
      header.className = 'menu-open';
      no_scroll();
    }else{
      header.className = '';
      return_scroll();
    }
  });

  // hamburger close
  hide.addEventListener('click',() => {
    show.click();
  });

  // hamburger close
  cover.addEventListener('click',() => {
    show.click();
  });

  // スクロール禁止
  function no_scroll() {
    document.addEventListener("mousewheel", scroll_control, { passive: false });
    document.addEventListener("touchmove", scroll_control, { passive: false });
  }

  function return_scroll() {
    document.removeEventListener("mousewheel", scroll_control, { passive: false });
    document.removeEventListener('touchmove', scroll_control, { passive: false });
  }

  function scroll_control(event) {
    event.preventDefault();
  }

  // open form
  var login = document.getElementById('login');
  var form = document.getElementById('form');

  login.addEventListener('click',function(){
    if(form.className === 'login-open'){
      form.className = 'form';
    }else{
      form.className = 'login-open';
    }
  });
})();