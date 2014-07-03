<?php
/**
 * The template for displaying featured portfolio on Front Page 
 *
 * @package Passion
 * @since Passion 1.0
 */
?>

<?php
// Start a new query for displaying featured posts on Front Page

if (get_theme_mod('passion_front_featured_portfolio_check')) {
    $featured_count = intval(get_theme_mod('passion_front_featured_portfolio_count'));

    $featured_portfolio_args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => $featured_count,
        'post__not_in' => get_option('sticky_posts'),
    );
    $featuredportfolio = new WP_Query($featured_portfolio_args);
    ?>
<section class="portfolio-area">
    <div class="home-portfolio-title-area" id="portfolio-title">
            <div class="home-portfolio-title section-title">
                 <?php if ( get_theme_mod('passion_portfolio_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('passion_portfolio_title')); ?></h3>
                  <?php } else {  ?> <h3 class="title"><?php esc_html_e('Recent Portfolio', 'passion') ?></h3>
                           <?php } ?>
                  
                   <?php if ( get_theme_mod('portfolio_description') !='' ) {  ?>
                            <p><?php echo esc_html(get_theme_mod('portfolio_description')); ?></p>
                                     <?php } else { ?>
                                    <p><?php esc_html_e('This is the Portfolio Description block.', 'passion') ?> </p>
                                            <?php } ?>
            </div>
    </div>
   

            <div id="featured-portfolio" class="clearfix">
                <div class="portfolio-wrap">
                
                <?php if ($featuredportfolio->have_posts()) : $i = 1; ?>

                    <?php while ($featuredportfolio->have_posts()) : $featuredportfolio->the_post(); ?>

                  
                        <div class="home-featured-portfolio grid_4_of_12 col">

                            <div class="featured-portfolio-content">

                                <a href="<?php the_permalink(); ?>">
                                    <div class="portfolio-featured-image">
                                    <?php the_post_thumbnail('post_feature_thumb'); ?>
                                    </div>
                                    <span>

                                         <h4 class="home-featured-portfolio-title"><?php the_title(); ?></h4>

                                        </span>
                                </a>
                               
                            </div> <!--end .featured-post-content -->

                           
                        </div><!--end .home-featured-portfolio-->
                  
                        <?php $i+=1; ?>

                    <?php endwhile; ?>

                <?php else : ?>

                    <h2 class="center"><?php esc_html_e('Not Found', 'passion'); ?></h2>
                    <p class="center"><?php esc_html_e('Sorry, but you are looking for something that is not here', 'passion'); ?></p>
                    <?php get_search_form(); ?>
                <?php endif; ?>
           </div>         
        </div> <!-- /#featured-portfolio -->
</section>
      
<?php
} 

 if (!get_theme_mod('passion_front_featured_portfolio_check') && !get_theme_mod('passion_hide_sample_portfolio')) 
    { // end Featured portfolio query  ?>
    
<section class="portfolio-area">
    <div class="home-portfolio-title-area" id="portfolio-title">
            <div class="home-portfolio-title section-title">
                <h3 class="title"><?php esc_html_e('Recent Portfolio', 'passion') ?></h3>
                    <p><?php esc_html_e('This is the Portfolio Description block.', 'passion') ?> </p>
            </div>
    </div>
   

            <div id="featured-portfolio" class="clearfix">
                <div class="portfolio-wrap">
                  
                        <div class="home-featured-portfolio grid_4_of_12 col" id="portfolio-one">
                             <div class="featured-portfolio-content">
                                <a href="#">
                                    <img class="attachment-post_feature_thumb" src="<?php echo get_template_directory_uri(); ?>/assets/images/beach.jpg" alt=""/>
                                    <span>
                                         <h4 class="home-featured-portfolio-title">Portfolio #1</h4>
                                        </span>
                                </a>
                            </div> <!--end .featured-post-content -->
                        </div><!--end .home-featured-portfolio-->
                        
                        
                        <div class="home-featured-portfolio grid_4_of_12 col" id="portfolio-two">
                            <div class="featured-portfolio-content">
                                <a href="#">
                                    <img class="attachment-post_feature_thumb" src="<?php echo get_template_directory_uri(); ?>/assets/images/keyboard.jpg" alt=""/>
                                    <span>
                                         <h4 class="home-featured-portfolio-title">Portfolio #2</h4>
                                        </span>
                                </a>
                            </div> <!--end .featured-post-content -->
                        </div><!--end .home-featured-portfolio-->
                        
                        <div class="home-featured-portfolio grid_4_of_12 col" id="portfolio-three">
                            <div class="featured-portfolio-content">
                                <a href="#">
                                    <img class="attachment-post_feature_thumb" src="<?php echo get_template_directory_uri(); ?>/assets/images/fall.jpg" alt=""/>
                                    <span>
                                         <h4 class="home-featured-portfolio-title">Portfolio #3</h4>
                                        </span>
                                </a>
                            </div> <!--end .featured-post-content -->
                        </div><!--end .home-featured-portfolio-->
                  
           </div>         
        </div> <!-- /#featured-portfolio -->
</section>
<?php } ?>
