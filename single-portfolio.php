<?php
/**
 * The Template for displaying all single portfolio items.
 *
 * @package Passion
 * @since Passion 1.0
 */

get_header(); ?>

<section id="maincontentcontainer">

	<div id="primary" class="site-content row" role="main">

			<div class="col grid_12_of_12">

                            <main class="main-content">
                                
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content/content', 'portfolio' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) {
						comments_template( '', true );
					}
					?>

					<?php passion_content_nav( 'nav-below' ); ?>

				<?php endwhile; // end of the loop. ?>
                                
                            </main> <!-- /.main-content -->

			</div> <!-- /.col.grid_12_of_12 -->
			

	</div> <!-- /#primary.site-content.row -->

</section> <!-- /#maincontentcontainer -->

<?php get_footer(); ?>
