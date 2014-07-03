/**
 * Twenty Fourteen Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
        
        wp.customize( 'slider_title_one', function( value ) {
		value.bind( function( to ) {
			$( '.featured-content h2 a' ).text( to );
		} );
	} );
       
         wp.customize( 'slider_one_description', function( value ) {
		value.bind( function( to ) {
			$( '.featured-content p' ).text( to );
		} );
	} );
        wp.customize( 'slider_one_link_url', function( value ) {
		value.bind( function( to ) {
			$( '.featured-content .slider-button' ).attr('href', to );
		} );
	} );
         wp.customize( 'slider_one_link_text', function( value ) {
		value.bind( function( to ) {
			$( '.featured-content .slider-button' ).text( to );
		} );
	} );
        
         wp.customize( 'home_title', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-title h3' ).text( to );
		} );
	} );
        
         wp.customize( 'home_title_one', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-one h3' ).text( to );
		} );
	} );
        
         wp.customize( 'home_featured_one', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-one .featured-image img' ).attr('src', to );
		} );
	} );
        
         wp.customize( 'home_description_one', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-one p' ).text( to );
		} );
            } );
                
         wp.customize( 'home_one_link_url', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-one .read-more' ).attr('href', to );
		} );
	} );
        
        wp.customize( 'home_one_link_text', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-one .read-more' ).text( to );
		} );
	} );
        
         wp.customize( 'home_featured_two', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-two .featured-image img' ).attr('src', to );
		} );
	} );
        
        wp.customize( 'home_title_two', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-two h3' ).text( to );
		} );
	} );
        
         wp.customize( 'home_description_two', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-two p' ).text( to );
		} );
            } );
                
         wp.customize( 'home_two_link_url', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-two .read-more' ).attr('href', to );
		} );
	} );
        
        wp.customize( 'home_two_link_text', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-two .read-more' ).text( to );
		} );
	} );
        wp.customize( 'home_featured_three', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-three .featured-image img' ).attr('src', to );
		} );
	} );
        
        wp.customize( 'home_title_three', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-three h3' ).text( to );
		} );
	} );
        
         wp.customize( 'home_description_three', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-three p' ).text( to );
		} );
            } );
                
         wp.customize( 'home_three_link_url', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-three .read-more' ).attr('href', to );
		} );
	} );
        
        wp.customize( 'home_three_link_text', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-three .read-more' ).text( to );
		} );
	} );
       
         wp.customize( 'passion_post_title', function( value ) {
		value.bind( function( to ) {
			$( '.home-post-title h3' ).text( to );
		} );
	} );
       
        wp.customize( 'cta_title', function( value ) {
		value.bind( function( to ) {
			$( '.home-cta h3' ).text( to );
		} );
	} );
        wp.customize( 'cta_text', function( value ) {
		value.bind( function( to ) {
			$( '.home-cta p' ).text( to );
		} );
	} );
        
         wp.customize( 'home_cta_link_url', function( value ) {
		value.bind( function( to ) {
			$( '.home-cta .cta-button' ).attr('href', to );
		} );
            } );
                
         wp.customize( 'home_cta_link_text', function( value ) {
		value.bind( function( to ) {
			$( '.home-cta .cta-button' ).text( to );
		} );
	} );
       
        wp.customize( 'feedback_title', function( value ) {
		value.bind( function( to ) {
			$( '.client-feedback-title h3' ).text( to );
		} );
	} );
        
        wp.customize( 'testimonial_description', function( value ) {
		value.bind( function( to ) {
			$( '.client-feedback-title p' ).text( to );
		} );
	} );
        wp.customize( 'tslider_one', function( value ) {
		value.bind( function( to ) {
			$( '#tslider1 img' ).attr('src', to );
		} );
	} );
         wp.customize( 'tslider_one_description', function( value ) {
		value.bind( function( to ) {
			$( '#tslider1 p' ).text( to );
		} );
	} );
        
         wp.customize( 'client_name_one', function( value ) {
		value.bind( function( to ) {
			$( '#tslider1 .client-name a' ).text( to );
		} );
	} );
         wp.customize( 'client_name_url_one', function( value ) {
		value.bind( function( to ) {
			$( '#tslider1 .client-name a' ).attr('href', to );
		} );
            } );
        
         wp.customize( 'tslider_two', function( value ) {
		value.bind( function( to ) {
			$( '#tslider2 img' ).attr('src', to );
		} );
	} );
         wp.customize( 'tslider_two_description', function( value ) {
		value.bind( function( to ) {
			$( '#tslider2 p' ).text( to );
		} );
	} );
        wp.customize( 'client_name_two', function( value ) {
		value.bind( function( to ) {
			$( '#tslider2 .client-name a' ).text( to );
		} );
	} );
         wp.customize( 'client_name_url_two', function( value ) {
		value.bind( function( to ) {
			$( '#tslider2 .client-name a' ).attr('href', to );
		} );
            } );
         wp.customize( 'tslider_three', function( value ) {
		value.bind( function( to ) {
			$( '#tslider3 img' ).attr('src', to );
		} );
	} );
         wp.customize( 'tslider_three_description', function( value ) {
		value.bind( function( to ) {
			$( '#tslider3 p' ).text( to );
		} );
	} );
        wp.customize( 'client_name_three', function( value ) {
		value.bind( function( to ) {
			$( '#tslider3 .client-name a' ).text( to );
		} );
	} );
         wp.customize( 'client_name_url_three', function( value ) {
		value.bind( function( to ) {
			$( '#tslider3 .client-name a' ).attr('href', to );
		} );
            } );
        wp.customize( 'tslider_four', function( value ) {
		value.bind( function( to ) {
			$( '#tslider4 img' ).attr('src', to );
		} );
	} );
         wp.customize( 'tslider_four_description', function( value ) {
		value.bind( function( to ) {
			$( '#tslider4 p' ).text( to );
		} );
	} );
        wp.customize( 'client_name_four', function( value ) {
		value.bind( function( to ) {
			$( '#tslider4 .client-name a' ).text( to );
		} );
	} );
         wp.customize( 'client_name_url_four', function( value ) {
		value.bind( function( to ) {
			$( '#tslider4 .client-name a' ).attr('href', to );
		} );
            } );
        
         wp.customize( 'passion_portfolio_title', function( value ) {
		value.bind( function( to ) {
			$( '.home-portfolio-title h3' ).text( to );
		} );
	} );
         wp.customize( 'portfolio_description', function( value ) {
		value.bind( function( to ) {
			$( '.home-portfolio-title p' ).text( to );
		} );
	} );
        wp.customize( 'passion_team_title', function( value ) {
		value.bind( function( to ) {
			$( '.team-member-area h3' ).text( to );
		} );
	} );
        wp.customize( 'team_description', function( value ) {
		value.bind( function( to ) {
			$( '.team-member-area p' ).text( to );
		} );
	} );
        
        wp.customize( 'contact_title', function( value ) {
		value.bind( function( to ) {
			$( '.contact-details h3' ).text( to );
		} );
	} );
        
        wp.customize( 'address_detail', function( value ) {
		value.bind( function( to ) {
			$( '.contact-details #address' ).text( to );
		} );
	} );
        
        wp.customize( 'contact_email', function( value ) {
		value.bind( function( to ) {
			$( '.contact-details #email' ).text( to );
		} );
	} );
        
         wp.customize( 'contact_phone', function( value ) {
		value.bind( function( to ) {
			$( '.contact-details #phone' ).text( to );
		} );
	} );
        
         wp.customize( 'passion_footer_footer_text', function( value ) {
		value.bind( function( to ) {
			$( '.smallprint p' ).text( to );
		} );
	} );
        
        wp.customize( 'passion_featured_background_color', function( value ) {
		value.bind( function( to ) {
			
				$( '.home-featured-area' ).css( {
					'background': to
				} );
            } );
        });
        
        wp.customize( 'passion_portfolio_background_color', function( value ) {
		value.bind( function( to ) {
			
				$( '.portfolio-area' ).css( {
					'background': to
				} );
            } );
        });
        
        wp.customize( 'passion_blog_background_color', function( value ) {
		value.bind( function( to ) {
			
				$( '.blog-area' ).css( {
					'background': to
				} );
            } );
        });
        
        wp.customize( 'passion_team_background_color', function( value ) {
		value.bind( function( to ) {
			
				$( '.team-member-area' ).css( {
					'background': to
				} );
            } );
        });
        
        wp.customize( 'passion_cta_background_color', function( value ) {
		value.bind( function( to ) {
			
				$( '.home-cta-area' ).css( {
					'background': to
				} );
            } );
        });
       
} )( jQuery );