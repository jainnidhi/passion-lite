<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Passion
 * @since Passion 1.0
 */

get_header(); ?>

<section id="maincontentcontainer">
    
     <div class="post-featured-image">
       <?php if ( has_post_thumbnail() && is_single() && !is_search() ) { ?>
				
					<?php the_post_thumbnail( 'post-thumb' ); ?>
			<?php } ?>
    </div>
    
	<div id="primary" class="site-content row" role="main">

			<div class="col grid_8_of_12">

                            <main class="main-content">
                                
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content/content', get_post_format() ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) {
						comments_template( '', true );
					}
					?>
                                <p class="nav-meta">
                                    <span class="nav-meta-title">
                                        More Posts
                                    </span>
                                </p><hr>
					<?php passion_content_nav( 'nav-below' ); ?>

				<?php endwhile; // end of the loop. ?>
                                
                            </main> <!-- /.main-content -->

			</div> <!-- /.col.grid_8_of_12 -->
			<?php get_sidebar(); ?>

	</div> <!-- /#primary.site-content.row -->

</section> <!-- /#maincontentcontainer -->

<?php get_footer(); ?>
