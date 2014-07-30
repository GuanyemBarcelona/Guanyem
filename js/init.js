/*
* Guanyem init.js ver 1.0.0
* Open-source and loving manufacture by Guanyem Web Team
* Barcelona 2014
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
    // Signatures countdown
    //prepareSignatures();
    
  }); // window ready

  function prepareSignatures(){
    var $home_carousel = $('body.home .carousel');
    if ($home_carousel.length){
      var $first_slide = $home_carousel.find('> .carousel-inner > .item').eq(0);
      var request_url = config.HOST_URL + config.COUNTDOWN_URL;
      var request = $.get(request_url, function(data) {
        var count = parseInt(data);
        if (typeof count === 'number'){
          // find the number in the text, as long as we cannot put html in the slider's lead like <strong class="countdown">NUMBER</strong> which would be much appreciated :S
          var number_str = getLocalizedNumber(config.COUNTDOWN_MAX);
          var $lead = $first_slide.find('.carousel-caption .lead');
          var index = $lead.text().indexOf(number_str);
          var init_phrase = $lead.text().substring(0, index) + '<strong class="countdown">' + $lead.text().substring(index, index + number_str.length) + '</strong>' + $lead.text().substring(index + number_str.length);
          $lead.html(init_phrase);
          var $countdown = $lead.find('.countdown');
          $countdown.text(getLocalizedNumber(count));
        }
      })
      .fail(function() {
        console.log('Ooops... We found an error loading ' + request_url);
      });
    }
  }

  function getLocalizedNumber(num){
    return parseInt(num).toLocaleString('ca-ES');
  } 
})(jQuery);