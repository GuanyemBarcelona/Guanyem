/*
* Guanyem init.js ver 1.0.0
* Open-source and loving manufacture by GWT inc. (Guanyem Web Team)
* Barcelona 2014
* 
* For external (downloaded) scripts, please put them inside plugins.js :)
*/
var locale = {}
var config = {
  HOST_URL: '', //'http://localhost/guanyem',
  COUNTDOWN_URL: '/apoyos/countdown.php',
  COUNTDOWN_MAX: 30000,
  COUNTDOWN_MIN: 0
};

(function($){
  $(window).ready(function(){
    // sharing buttons
    prepareSharingButtons();

    // Signatures countdown
    prepareSignatures();
    
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

  function prepareSignatures(){
    var $home_carousel = $('body.home .carousel');
    if ($home_carousel.length){
      var $first_slide = $home_carousel.find('> .carousel-inner > .item').eq(0);
      var request_url = config.HOST_URL + config.COUNTDOWN_URL;
      var request = $.get(request_url, function(data) {
        var count = parseInt(data);
        if (typeof count === 'number'){
          // find the number in the text, as long as we cannot put html in the slider's lead like <strong class="countdown">NUMBER</strong> which would be much appreciated :S
          var number_str = getNumberSeparatedByThousands(config.COUNTDOWN_MAX);
          var $lead = $first_slide.find('.carousel-caption .lead');
          var index = $lead.text().indexOf(number_str);
          var init_phrase = $lead.text().substring(0, index) + '<strong class="countdown">' + $lead.text().substring(index, index + number_str.length) + '</strong>' + $lead.text().substring(index + number_str.length);
          $lead.html(init_phrase);
          var $countdown = $lead.find('.countdown');
          $countdown.text(getNumberSeparatedByThousands(count));
        }
      })
      .fail(function() {
        console.log('Ooops... We found an error loading ' + request_url);
      });
    }
  }

  function getNumberSeparatedByThousands(num, separator) {
    var sep = (separator == null)? '.' : separator.toString();
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, sep);
  }
})(jQuery);