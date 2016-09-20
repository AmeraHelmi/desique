(function($) {
    'use strict';

	
    /*-------------------------------------------------------------------------------
      DATE & TIME
      -------------------------------------------------------------------------------*/
    var datetime = null,
        date = null;

    var update = function() {
        date = moment(new Date())
        datetime.html(date.format('dddd, MMMM Do YYYY, h:mm:ss a'));
    };

    $(document).ready(function() {
        datetime = $('#datetime');
        update();
        setInterval(update, 1000);

    });

    
	 
    /*-------------------------------------------------------------------------------
      COUNTDOWN COUNTER
      -------------------------------------------------------------------------------*/

    $("#countdown").countdown({
        date: "8 September 2020 09:00:00", // Change this to your desired date to countdown to
        format: "on"
    });
    /*-------------------------------------------------------------------------------
      RECOGNIZE GESTURES MADE BY TOUCH - HAMMER JS
      -------------------------------------------------------------------------------*/

    $('#banner-carousel').carousel({
        interval: 4000,
        direction: 'right',
        pause: 'hover',

    });

    // handles the carousel thumbnails
    $('[id^=carousel-selector-]').click(function() {
        var id_selector = $(this).attr("id");
        var id = id_selector.substr(id_selector.length - 1);
        id = parseInt(id);
        $('#banner-carousel').carousel(id);
        $('[id^=carousel-selector-]').removeClass('selected');
        $(this).addClass('selected');
    });

    // when the carousel slides, auto update
    $('#banner-carousel').on('slid', function(e) {
        var id = $('.item.active').data('slide-number');
        id = parseInt(id);
        $('[id^=carousel-selector-]').removeClass('selected');
        $('[id=carousel-selector-' + id + ']').addClass('selected');
    });


  $("#owl-blog").owlCarousel({
         autoPlay: false, //Set AutoPlay to 3 seconds
		  rtl: true,
         navigation: true,
         pagination: true,
         items: 1,
         itemsDesktop: [1199,
             1
         ],
         itemsDesktopSmall: [
             979, 1
         ],
         itemsTablet: [768, 1],
         itemsMobile: [479, 1],
     });


    /*-------------------------------------------------------------------------------
      MAIN NEWS SLIDER
      -------------------------------------------------------------------------------*/


    $('#matches-board').owlCarousel({
        rtl: true,
		animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        loop: true,
        nav: true,
		    navText: [
      "<i class='icofont icofont-caret-left'></i>",
      "<i class='icofont icofont-caret-right'></i>"
      ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

		 /* -------------------------------------------------------------------------*
      * NICE SCROLL
      * -------------------------------------------------------------------------*/
     $("html").niceScroll({
         mousescrollstep: 70,
         cursorcolor: "#ff7e20 ",
         cursorwidth: "5px",
         cursorborderradius: "10px",
         cursorborder: "none",
     });
	  
	 /* -------------------------------------------------------------------------*
      * VIDEO DETAILS
      * -------------------------------------------------------------------------*/
     $('#video-info').sliphover({
         backgroundColor: '#ff7e20'
     });
    /*-------------------------------------------------------------------------------
      RECOGNIZE GESTURES MADE BY TOUCH - HAMMER JS
      -------------------------------------------------------------------------------*/

    var hammertime = new Hammer(myElement, myOptions);
    hammertime.on('pan', function(ev) {
        console.log(ev);
    });


})(jQuery);