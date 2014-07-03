/* 
 * This file contains calls to various javascript files
 * 
 * Editing this file might lead to some broken theme features.
 * 
 */

/* Trigger testimonial slider */
/* Testimonial slider is powered by FlexSlider by WooThemes */
jQuery(window).load(function() {
    
    jQuery('.slide-nav .testimonials-list > div:first a').addClass('active');
	jQuery('.slide-nav .testimonials-list > div a').click(function(e) {
		e.preventDefault();
		var slide = jQuery( this ).parents( 'div' ).index();
		jQuery('.testimonial-area .slides').flexslider( slide );
		jQuery( '.slide-nav .testimonials-list > div a' ).removeClass('active');
		jQuery( this ).addClass('active');
	});
	jQuery( ".testimonial-area .slides" ).flexslider({
		selector: ".testimonials-list > div",
		animation: "fade",
		manualControls: ".slide-nav .testimonials-list",
		slideshow: false,
		controlNav: false,
		directionNav: false,
		smoothHeight: true
	});
   
});


/* Add a custom back to top button */
jQuery(document).ready(function() {
    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });


    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});

/* Trigger mobile responsive navigation powered by slicknav.js */
jQuery(document).ready(function($) {

    $('#site-navigation .menu>ul').slicknav({prependTo: '#mobile-menu'});
    $('#site-navigation .home-menu>ul').slicknav({prependTo: '#mobile-menu'});
    
    // trigger animation for content
    $('.hentry').addClass('animated fadeInDown');
    
});
