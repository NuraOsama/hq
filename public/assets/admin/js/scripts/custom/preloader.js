(function ($) {

    "use strict";

    //preloader

    let  mainStatus  = $('.preloader-status');
    let mainBody = $('body');
    let mainPreloader  = $('.preloader');
    
     window.onload = function() {
     mainStatus.fadeOut();
     mainPreloader.delay(500).fadeOut('slow');
     mainBody.addClass('loaded').delay(500).css({
        'overflow': 'auto'
    });

    }

   //body fadeIn animation
   mainBody.fadeIn(500);

})(jQuery);   