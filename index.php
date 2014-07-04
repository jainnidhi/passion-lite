<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Passion
 * @since Passion 1.0
 */

get_header(); ?>                             

<section id="maincontentcontainer">
     <div class="post-featured-image">
        <?php if ( get_theme_mod('blog_featured_image')) { ?>
		<img src="<?php echo get_theme_mod('blog_featured_image'); ?>" />
	<?php } else { ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide2.jpg" alt=""/>
        <?php  } ?>
                <div class="blog-content">
                     <?php if ( get_theme_mod('blog_page_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('blog_page_title')); ?></h3>

                            <?php } else {  ?> <h1><?php esc_html_e('Blog', 'passion') ?></h1>
                                     <?php } ?>
                            
                            <?php if ( get_theme_mod('blog_page_description') !='' ) {  ?>
                            <p><?php echo esc_html(get_theme_mod('blog_page_description')); ?></p>
                                     <?php } else { ?>
                                    <p><?php esc_html_e('Our Beautiful Blog', 'passion') ?> </p>
                                            <?php } ?>
                </div>
    </div>
	<div id="primary" class="site-content row" role="main">

		<div class="col grid_8_of_12">

                    <main class="main-content">
                        
			<?php if ( have_posts() ) : ?>

				<?php // Start the Loop ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content/content', get_post_format() ); // Include the Post-Format-specific template for the content ?>
				<?php endwhile; ?>

				<?php passion_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results' ); // Include the template that displays a message that posts cannot be found ?>

			<?php endif; // end have_posts() check ?>

                    </main>  <!-- /.main-content -->
                    
		</div> <!-- /.col.grid_8_of_12 -->
		<?php get_sidebar(); ?>

	</div> <!-- /#primary.site-content.row -->

</section> <!-- /#maincontentcontainer -->

<?php get_footer(); ?>
