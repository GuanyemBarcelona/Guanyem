/*
* Guanyem init.js ver 1.0.0
* Open-source and loving manufacture by GWT inc. (Guanyem Web Team)
* Barcelona 2014
* 
* For external (downloaded) scripts, please put them inside plugins.js :)
*/
var config = {
  LANGUAGE: 'ca',
  HOST_URL: '' //'http://localhost/guanyem'
};

var locale = {
  SEARCH: {
    ca: "Cerca",
    es: "Buscar"
  }
};

(function($){
  $(window).ready(function(){
    var lang = $('html').attr('lang');
    if (typeof lang !== typeof undefined && lang !== false) {
      config.LANGUAGE = lang;
      if (config.LANGUAGE == 'es-ES') config.LANGUAGE = 'es';
    }

    // For all links, if rel external open link in new tab
    $('body').on('click', 'a[rel="external"]', function(ev){
      ev.preventDefault();
      window.open($(this).attr('href'));
    });

    // sharing buttons
    prepareSharingButtons();

    // Translate crowdfunding
    translateCrowdfunding();

    // RWD menu button re-done
    $('.navbar .btn-navbar').click(function(e){
      var $main_menu_rwd = $('.navbar.resp .menu-menu-1-container, .navbar.resp .menu-menu-1-castellano-container');
      $main_menu_rwd.toggleClass('open');
    });
    
    // change search text
    $('.tc-header .search-form > label input[type="search"]').attr('placeholder', locale.SEARCH[config.LANGUAGE] + '...');

  }); // window ready

  function prepareSharingButtons(){
    var popup_measures = [580, 470];
    $('.sharing-buttons').on('click', 'a', function(e){
      e.preventDefault();
      popupCenter($(this).attr('href'), $(this).find('.text').html(), popup_measures);
    });
  }

  function popupCenter(url, title, measures) {
    var dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : screen.left;
    var dualScreenTop = window.screenTop !== undefined ? window.screenTop : screen.top;
    var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;
    var left = ((width / 2) - (measures[0] / 2)) + dualScreenLeft;
    var top = ((height / 3) - (measures[1] / 3)) + dualScreenTop;
    var newWindow = window.open(url, title, 'scrollbars=yes, width=' + measures[0] + ', height=' + measures[1] + ', top=' + top + ', left=' + left);
    if (window.focus) {
      newWindow.focus();
    }
  }
})(jQuery);