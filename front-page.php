<?php
/**
 * 
 * Description: Displays a full-width front page. The front page template provides an optional
 * featured section that allows for highlighting a key message. It can contain up to 2 widget areas,
 * in one or two columns. These widget areas are dynamic so if only one widget is used, it will be
 * displayed in one column. If two are used, then they will be displayed over 2 columns.
 * There are also four front page only widgets displayed just beneath the two featrued widgets. Like the
 * featured widgets, they will be displayed in anywhere from one to four columns, depending on
 * how many widgets are active.
 * 
 * The front page template also displays EDD featured products and featured posts 
 * depending on the settings from Theme Customizer 
 *
 * @package Passion
 * @since Passion 1.0
 */
get_header();
?>


<section class="slider-wrapper clearfix" >
    <div id="main-slider">
        <?php if ( get_theme_mod('slider_title_one') =='' || get_theme_mod('slider_one_url') =='' || get_theme_mod('slider_one_description') =='' ) {  ?>
                <div class="featured-content">
                    <div class="slider-text-container">
                     <h2 class="slider-title animated fadeInLeftBig"><a href="#"><?php esc_html_e('Showcase Your Restaurant Services', 'passion') ?></a></h2>
                          <p class="animated fadeInRightBig"><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'passion') ?> </p>
                          <a class="slider-button animated fadeInUp" href="#">
                            <?php esc_html_e('Start Building Your Website Now', 'passion') ?>
                        </a>
                    </div>
                </div>
        <?php } ?>
        
        <?php if ( get_theme_mod('slider_title_one') !='' || get_theme_mod('slider_one_url') !='' || get_theme_mod('slider_one_description') !='' ) {  ?>
                        <div class="featured-content">
                            <div class="slider-text-container">
                                   
                                   <h2 class="slider-title"><?php echo esc_html(get_theme_mod('slider_title_two')); ?></h2>
                                   
                                       <p><?php echo esc_html(get_theme_mod('slider_one_description')); ?></p>
                                       <?php if ( get_theme_mod('slider_one_link_url') !='' && get_theme_mod('slider_one_link_text') !=''  ) {  ?>
                                   <a class="slider-button" href="<?php echo esc_url(get_theme_mod('slider_one_link_url')); ?>">
                                     <?php echo esc_html(get_theme_mod('slider_one_link_text')); ?>
                                       <?php } ?>
                                   </a>
                            </div>
                         </div>
            <?php } ?>
              
    </div>
</section>

 <section class="home-featured-area">
    <div class="home-featured-title-area" id="featured-title">
            <div class="home-featured-title section-title">
                 <?php if ( get_theme_mod('home_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title')); ?></h3>
                  <?php } else {  ?> <h3 class="title"><?php esc_html_e('Theme Features', 'passion') ?></h3>
                           <?php } ?>
            </div>
        </div>
       
            <div class="home-featured clearfix">
                <div class="home-featured-one grid_4_of_12 col">
                    <?php if ( get_theme_mod('home_featured_one') !='' ) {  ?>
                     <div class="featured-image"><img src="<?php echo get_theme_mod('home_featured_one'); ?>" /></div>
                    <?php } else {  ?>
                     <div class="featured-image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/keyboard.jpg" /></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_one') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_one')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Our Products', 'passion') ?></h3>
                           <?php } ?>

                  <?php if ( get_theme_mod('home_description_one') !='' ) {  ?>
                  <p><?php echo esc_html(get_theme_mod('home_description_one')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('Showcase your best quality products on home page to grab visitor&rsquo;s attention.', 'passion') ?> </p>
                                           <?php } ?>

                      <a class="read-more" href="<?php if ( get_theme_mod('home_one_link_url') !='' ) { echo esc_url(get_theme_mod('home_one_link_url')); } ?>">
                           <?php if ( get_theme_mod('home_one_link_text') !='' ) {  ?><?php echo esc_html(get_theme_mod('home_one_link_text')); ?>

                  <?php } else {  ?> <?php esc_html_e('Read More', 'passion') ?>
                           <?php } ?></a>
                </div>

                <div class="home-featured-two grid_4_of_12 col">
                    <?php if ( get_theme_mod('home_featured_two') !='' ) {  ?>
                     <div class="featured-image"><img src="<?php echo get_theme_mod('home_featured_two'); ?>" /></div>
                    <?php } else {  ?>
                     <div class="featured-image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fall.jpg" /></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_two') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_two')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Our Services', 'passion') ?></h3>
                           <?php } ?>

                  <?php if ( get_theme_mod('home_description_two') !='' ) {  ?>
                  <p><?php echo esc_html(get_theme_mod('home_description_two')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('Show your multiple services that will explore your website among the audience.', 'passion') ?> </p>
                                           <?php } ?>

                      <a class="read-more" href="<?php if ( get_theme_mod('home_two_link_url') !='' ) { echo esc_url(get_theme_mod('home_two_link_url')); } ?>">
                           <?php if ( get_theme_mod('home_two_link_text') !='' ) {  ?><?php echo esc_html(get_theme_mod('home_two_link_text')); ?>

                  <?php } else {  ?> <?php esc_html_e('Read More', 'passion') ?>
                           <?php } ?></a>
                </div>


                <div class="home-featured-three grid_4_of_12 col">
                    <?php if ( get_theme_mod('home_featured_three') !='' ) {  ?>
                     <div class="featured-image"><img src="<?php echo get_theme_mod('home_featured_three'); ?>" /></div>
                    <?php } else {  ?>
                     <div class="featured-image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/beach.jpg" /></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_three') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_three')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Our Clients', 'passion') ?></h3>
                           <?php } ?>

                  <?php if ( get_theme_mod('home_description_three') !='' ) {  ?>
                  <p><?php echo esc_html(get_theme_mod('home_description_three')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('Show testimonials of your clients that will build the trust among the audience.', 'passion') ?> </p>
                                           <?php } ?>

                      <a class="read-more" href="<?php if ( get_theme_mod('home_three_link_url') !='' ) { echo esc_url(get_theme_mod('home_three_link_url')); } ?>">
                           <?php if ( get_theme_mod('home_three_link_text') !='' ) {  ?><?php echo esc_html(get_theme_mod('home_three_link_text')); ?>

                    <?php } else {  ?> <?php esc_html_e('Read More', 'passion') ?>
                           <?php } ?></a>
                </div>
               
            </div>
        </section><!-- end home featured area -->
        
        
     <?php  // Display featured portfolio on front page
            get_template_part('content/content', 'frontportfolio'); ?>

    <section class="testimonial-area" data-stellar-background-ratio="0.5"  data-stellar-horinzontal-offset="40">
        <div class="client-feedback-area" id="feedback-title">
            <div class="client-feedback-title section-title">
                 <?php if ( get_theme_mod('feedback_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('feedback_title')); ?></h3>
                  <?php } else {  ?> <h3 class="title"><?php esc_html_e('Our Clients Feedback', 'passion') ?></h3>
                           <?php } ?>
                  
                   <?php if ( get_theme_mod('testimonial_description') !='' ) {  ?>
                            <p><?php echo esc_html(get_theme_mod('testimonial_description')); ?></p>
                                     <?php } else { ?>
                                    <p id="address"><?php esc_html_e('This is the Testimonial Description block.', 'passion') ?> </p>
                                            <?php } ?>
            </div>
        </div>
        <!-- Home testimonial slider starts here --> 
  <?php if ( get_theme_mod('tslider_one') !='' && get_theme_mod('tslider_one_description') !='' ||
             get_theme_mod('tslider_two') !='' && get_theme_mod('tslider_two_description') !='' ||
             get_theme_mod('tslider_three') !='' && get_theme_mod('tslider_three_description') !='' ||
             get_theme_mod('tslider_four') !='' && get_theme_mod('tslider_four_description') !='') {  ?>
 <div class="testimonial-slider">
      <div class="slide-nav">
          <div class="testimonials component effect-fade">
              <div class="testimonials-list">
                  <?php if ( get_theme_mod('tslider_one') !='') { ?>
                  <div id="tslider1"><a href="#" class="avatar-link"><img alt='' src='<?php echo get_theme_mod('tslider_one'); ?>' class='avatar avatar-65 photo' height='65' width='65' /></a></div>
                  <?php } ?>
                  <?php if ( get_theme_mod('tslider_two') !='') { ?>
                  <div id="tslider2"><a href="#" class="avatar-link"><img alt='' src='<?php echo get_theme_mod('tslider_two'); ?>' class='avatar avatar-65 photo' height='65' width='65' /></a></div>
                 <?php } ?>
                  <?php if ( get_theme_mod('tslider_three') !='') { ?>
                  <div id="tslider3"><a href="#" class="avatar-link"><img alt='' src='<?php echo get_theme_mod('tslider_three'); ?>' class='avatar avatar-65 photo' height='65' width='65' /></a></div>
                  <?php } ?>
                  <?php if ( get_theme_mod('tslider_four') !='') { ?>
                  <div id="tslider4"><a href="#" class="avatar-link"><img alt='' src='<?php echo get_theme_mod('tslider_four'); ?>' class='avatar avatar-65 photo' height='65' width='65' /></a></div>
                  <?php } ?>
               </div>
          </div>
      </div>
        <div class="slides">
           <div class="testimonials component effect-fade">
            <div class="testimonials-list">
                <?php if ( get_theme_mod('tslider_one_description') !='') { ?>
                <div>
                    <div class="testimonial" id="tslider1">
                        <?php echo wpautop(esc_html(get_theme_mod('tslider_one_description'))); ?>
                       <?php if ( get_theme_mod('client_name_one') !='' || get_theme_mod('client_name_url_one') ) {  ?>
                        <div class="client-name">
                                <a href="<?php echo esc_url(get_theme_mod('client_name_url_one')); ?>">
                                    <?php echo esc_html(get_theme_mod('client_name_one')); ?>
                                </a>
                        </div>
                       <?php } ?>
                    </div><!-- end .testimonial -->
                </div>
                <?php } ?>
                
                <?php if ( get_theme_mod('tslider_two_description') !='') { ?>
                <div>
                    <div class="testimonial" id="tslider2">
                        <?php echo wpautop(esc_html(get_theme_mod('tslider_two_description'))); ?>
                       <?php if ( get_theme_mod('client_name_two') !='' || get_theme_mod('client_name_url_two') ) {  ?>
                        <div class="client-name">
                               <a href="<?php echo esc_url(get_theme_mod('client_name_url_two')); ?>">
                                   <?php echo esc_html(get_theme_mod('client_name_two')); ?>
                               </a>
                       </div>
                       <?php } ?>
                    </div><!-- end .testimonial -->
                </div>
                <?php } ?>
                
                <?php if ( get_theme_mod('tslider_three_description') !='') { ?>
                <div>
                    <div class="testimonial" id="tslider3">
                        <?php echo wpautop(esc_html(get_theme_mod('tslider_three_description'))); ?>
                       <?php if ( get_theme_mod('client_name_three') !='' || get_theme_mod('client_name_url_three') ) {  ?>
                        <div class="client-name">
                                <a href="<?php echo esc_url(get_theme_mod('client_name_url_three')); ?>">
                                    <?php echo esc_html(get_theme_mod('client_name_three')); ?>
                                </a>
                        </div>
                       <?php } ?>
                    </div><!-- end .testimonial -->
                </div>
                <?php } ?>
                
                <?php if ( get_theme_mod('tslider_four_description') !='') { ?>
                <div>
                    <div class="testimonial" id="tslider4">
                        <?php echo wpautop(esc_html(get_theme_mod('tslider_four_description'))); ?>
                        <?php if ( get_theme_mod('client_name_four') !='' || get_theme_mod('client_name_url_four') ) {  ?>
                        <div class="client-name">
                               <a href="<?php echo esc_url(get_theme_mod('client_name_url_four')); ?>">
                                   <?php echo esc_html(get_theme_mod('client_name_four')); ?>
                               </a>
                       </div>
                        <?php } ?>
                    </div><!-- end .testimonial -->
                </div>
                <?php } ?>
            </div><!--/.testimonials-list-->
            <div class="fix"></div>
            </div><!--/.testimonials-->
        </div><!-- end /.slides -->
     </div><!-- end .testimonial-slider -->
   <?php } else {  ?>
   <div class="testimonial-slider">
      <div class="slide-nav">
          <div class="testimonials component effect-fade">
              <div class="testimonials-list">
                  <div id="tslider1"><a href="#" class="avatar-link"><img alt='' src='<?php echo get_template_directory_uri(); ?>/assets/images/client1.jpeg' class='avatar avatar-65 photo' height='65' width='65' /></a></div>
                  
                  <div id="tslider2"><a href="#" class="avatar-link"><img alt='' src='<?php echo get_template_directory_uri(); ?>/assets/images/client2.jpeg' class='avatar avatar-65 photo' height='65' width='65' /></a></div>
                 
                  <div id="tslider3"><a href="#" class="avatar-link"><img alt='' src='<?php echo get_template_directory_uri(); ?>/assets/images/client3.jpeg' class='avatar avatar-65 photo' height='65' width='65' /></a></div>
                  
                  <div id="tslider4"><a href="#" class="avatar-link"><img alt='' src='<?php echo get_template_directory_uri(); ?>/assets/images/client4.jpeg' class='avatar avatar-65 photo' height='65' width='65' /></a></div>
               
               </div>
          </div>
      </div>
        <div class="slides">
           <div class="testimonials component effect-fade">
            <div class="testimonials-list">
                <div>
                    <div class="testimonial" id="tslider1">
                        <p>This is the first random text for testimonial slider.</p>
                       
                        <div class="client-name">
                                <a href="#"><?php esc_html_e('John', 'passion') ?>
                                         </a>
                        </div>
                    </div><!-- end .testimonial -->
                </div>
                
                <div>
                    <div class="testimonial" id="tslider2">
                        <p>This is the second random text for testimonial slider.</p>
                       
                        <div class="client-name">
                               <a href="#"><?php esc_html_e('Johny', 'passion') ?>
                                </a>
                       </div>
                    </div><!-- end .testimonial -->
                </div>
                
                <div>
                    <div class="testimonial" id="tslider3">
                        <p>This is the third random text for testimonial slider.</p>
                       
                        <div class="client-name">
                                <a href="#"><?php esc_html_e('Bob', 'passion') ?>
                                </a>
                        </div>
                    </div><!-- end .testimonial -->
                </div>
                
                <div>
                    <div class="testimonial" id="tslider4">
                        <p>This is the fourth random text for testimonial slider.</p>
                      
                        <div class="client-name">
                               <a href="#"><?php esc_html_e('Jack', 'passion') ?>
                                </a>
                       </div>
                    </div><!-- end .testimonial -->
                </div>
            </div><!--/.testimonials-list-->
            <div class="fix"></div>
            </div><!--/.testimonials-->
        </div><!-- end /.slides -->
     </div><!-- end .testimonial-slider -->
    <?php } ?>
 </section><!-- end .testimonial-area -->  
      
        
        <?php  // Display featured posts on front page
            get_template_part('content/content', 'frontposts'); ?>
      
      <?php  // Display featured posts on front page
            get_template_part('content/content', 'frontteam'); ?>
        
       <!-- start home CTA area -->
        <section class="home-cta-area">
                <div class="home-cta">
                     <?php if ( get_theme_mod('cta_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('cta_title')); ?></h3>
                          <?php } else {  ?> <h3><?php esc_html_e('CTA Title', 'passion') ?></h3>
                               <?php } ?>
                    <div class="home-cta-one">
                        <?php if ( get_theme_mod('cta_text') !='' ) {  ?>
                        <p><?php echo esc_html(get_theme_mod('cta_text')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('We have really amazing products that you would be amazed to see.', 'passion') ?> </p>
                                           <?php } ?>
                    </div>
                    <div class="home-cta-two">
                        <a class="cta-button" href="<?php if ( get_theme_mod('home_cta_link_url') !='' ) { echo esc_url(get_theme_mod('home_cta_link_url')); } ?>">
                           <?php if ( get_theme_mod('home_cta_link_text') !='' ) {  ?><?php echo esc_html(get_theme_mod('home_cta_link_text')); ?>

                    <?php } else {  ?> <?php esc_html_e('Read More', 'passion') ?>
                           <?php } ?></a>
                    </div>
                          
                          <div class="social-links">
                                <ul>
                                    <?php if (get_theme_mod('facebook_link_url')) { ?>
                                        <li class="passion-fb"><a href="<?php echo get_theme_mod('facebook_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('twitter_link_url')) { ?>
                                        <li class="passion-twitter"><a href="<?php echo  get_theme_mod('twitter_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('googleplus_link_url')) { ?>
                                        <li class="passion-gplus"><a href="<?php echo get_theme_mod('googleplus_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if( get_theme_mod('pinterest_link_url')) { ?>
                                        <li class="passion-pinterest"><a href="<?php echo get_theme_mod('pinterest_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if (get_theme_mod('github_link_url')) { ?>
                                        <li class="passion-github"><a href="<?php echo get_theme_mod('github_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('youtube_link_url')) { ?>
                                        <li class="passion-youtube"><a href="<?php echo get_theme_mod('youtube_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('dribbble_link_url')) { ?>
                                        <li class="passion-dribbble"><a href="<?php echo get_theme_mod('dribbble_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('tumblr_link_url')) { ?>
                                        <li class="passion-tumblr"><a href="<?php echo get_theme_mod('tumblr_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('flickr_link_url')) { ?>
                                        <li class="passion-flickr"><a href="<?php echo get_theme_mod('flickr_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('vimeo_link_url')) { ?>
                                        <li class="passion-vimeo"><a href="<?php echo get_theme_mod('vimeo_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('linkedin_link_url')) { ?>
                                        <li class="passion-linkedin"><a href="<?php echo get_theme_mod('linkedin_link_url'); ?>"></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                          <div class="contact-details">
                             
                                   <?php if ( get_theme_mod('address_detail') !='' ) {  ?>
                                   <p id="address"><?php echo esc_html(get_theme_mod('address_detail')); ?></p>
                                            <?php } else { ?>
                                           <p id="address"><?php esc_html_e('205, Gitanjali Mansion,
                                                                 Above ICICI Bank, Sector 11
                                                                 Udaipur, Rajasthan, India.', 'passion') ?> </p>
                                                   <?php } ?>

                                      <?php if ( get_theme_mod('contact_email') !='' ) {  ?><p id="email"><?php echo esc_html(get_theme_mod('contact_email')); ?>

                                   <?php } else {  ?> <p id="email"><?php esc_html_e('hello@ideaboxcreations.com', 'passion') ?></p>
                                            <?php } ?>

                                   <?php if ( get_theme_mod('contact_phone') !='' ) {  ?><p id="phone"><?php echo esc_html(get_theme_mod('contact_phone')); ?>

                                   <?php } else {  ?> <p id="phone"><?php esc_html_e('0294-678456', 'passion') ?></p>
                                            <?php } ?>
                          
                        </div>
                          
                          
                
                </div>
         </section>
       
         <span class="top"><a class="back-to-top"><i class="fa fa-arrow-up"></i></a></span>
            
  
<?php
get_footer();
?>