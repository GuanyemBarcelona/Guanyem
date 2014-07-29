/*
* Guanyem init.js ver 1.0.0
* Open-source and loving manufacture by Guanyem Web Team
* Barcelona 2014
*/

var config = {
  HOST_URL: '', //'http://localhost/guanyem',
  COUNTDOWN_URL: '/apoyos/countdown.php'
};

(function($){
  $(window).ready(function(){

  // Signatures countdown
  var $home_carousel = $('body.home .carousel');
  if ($home_carousel.length){
    var $first_slide = $home_carousel.find('> .carousel-inner > .item').eq(0);
    var request_url = config.HOST_URL + config.COUNTDOWN_URL;
    var request = $.get(request_url, function(data) {
      var count = parseInt(data);
      if (typeof count === 'number'){
        /*var $countdown_number = $first_slide.find('.carousel-caption .countdown');
        $countdown_number.text(count);*/
        console.log(count);
      }
    })
    .fail(function() {
      console.log('Ooops... We found an error loading ' + request_url);
    });
  }

  }); // window ready
})(jQuery);