(function($) {
    $("#cssmenu").menumaker({
        title: " ",
        format: "multitoggle",
        breakpoint: 768,
    });


    $('.testimonial-slider').owlCarousel({
        items: 3,
        nav: false,
        loop: true,
        autoplay: true,
        smartSpeed: 700,
        margin: 30,
        responsive: {
            // breakpoint from 0 up
            0: {
                items: 1
            },
            // breakpoint from 480 up
            480: {
                items: 1,
            },
            // breakpoint from 768 up
            768: {
                items: 2
            },
            // breakpoint from 768 up
            992: {
                items: 3
            },
        }
    }); 
    $('.third-testimonial-slider').owlCarousel({
        items: 2,
        nav: false,
        loop: true,
        autoplay: true,
        smartSpeed: 700,
        margin: 30,
        responsive: {
            // breakpoint from 0 up
            0: {
                items: 1
            },
            // breakpoint from 480 up
            480: {
                items: 1,
            },
            // breakpoint from 768 up
            768: {
                items: 2
            },
          
        }
    }); 
    $('.third-services-slider').owlCarousel({
        items: 3,
        nav: false,
        loop: true,
        autoplay: true,
        smartSpeed: 700,
        margin: 30,
        responsive: {
            // breakpoint from 0 up
            0: {
                items: 1
            },
            // breakpoint from 480 up
            480: {
                items: 1,
            },
            // breakpoint from 768 up
            768: {
                items: 3
            },
            // breakpoint from 768 up
            992: {
                items: 3
            },
        }
    });
    $('.second-testimonial-slider').owlCarousel({
        items: 1,
        nav: false,
        loop: true,
        autoplay: true,
        smartSpeed: 700,
        margin: 30,
        animateIn: 'zoomIn',
        animateOut: 'zoomOut'
    });

    $('.brand-slider').owlCarousel({
        items: 5,
        nav: false,
        loop: true,
        autoplay: true,
        smartSpeed: 700,
        margin: 30,
        responsive: {
            // breakpoint from 0 up
            0: {
                items: 2
            },
            // breakpoint from 480 up
            480: {
                items: 3,
            },
            // breakpoint from 768 up
            768: {
                items: 4
            },
            // breakpoint from 768 up
            992: {
                items: 5
            },
        }
    });


    $('.brand-slider-two').owlCarousel({
        items: 5,
        nav: false,
        loop: true,
        autoplay: true,
        smartSpeed: 700,
        margin: 30,
        responsive: {
            // breakpoint from 0 up
            0: {
                items: 2
            },
            // breakpoint from 480 up
            480: {
                items: 3,
            },
            // breakpoint from 768 up
            768: {
                items: 4
            },
            // breakpoint from 768 up
            992: {
                items: 5
            },
        }
    });
    if ($.fn.magnificPopup) {
        $('.viewproject').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            },
        });
    }
    if ($.fn.isotope) {

        $(".grid").isotope({
            filter: '*',

        });
        $('.project-nav li').on('click', function() {

            $(".project-nav li").removeClass("active");
            $(this).addClass("active");

            var selector = $(this).attr('data-filter');
            $(".grid").isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'easeOutCirc',
                    queue: false,
                }
            });
            return false;
        });
    }


	$('.searchbtn').on('click', function(){
		$('.searchform').toggleClass('show');
	});
	$('.searchform button').on('click', function(){
		$('.searchform').removeClass('show');
	});
	
	if ($.fn.checkboxradio) {
		$( "input" ).checkboxradio();
	}
	
		jQuery(window).on('load', function() {
	
			$('#preloader').fadeOut('slow', function() {
				$(this).remove();
			});
	
		});
	})(jQuery);
	
	$(window).scroll(function() {
		if ($(this).scrollTop() > 200){  
			$('.menu-area').addClass("sticky");
		}
		else{
			$('.menu-area').removeClass("sticky");
		}
	});	