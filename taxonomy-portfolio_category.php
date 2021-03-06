<?php
/**
 * 
 * A custom portfolio category page template to display portfolio category archives
 * Requires Portfolio Custom Post Type plugin to be activated
 * 
 * @package : Passion
 * @version : 1.0
 * @since : 1.0 
 * 
 */
get_header(); ?>

<section id="maincontentcontainer">

	<div id="primary" class="site-content row" role="main">
		<div class="col grid_12_of_12">
                    <main class="main-content"> 
        
        <?php if (have_posts()) : $i = 1; ?>
            <?php while (have_posts()) : the_post(); ?>

                <div id="post-<?php the_ID(); ?>" class="col grid_4_of_12 portfolio<?php if ($i % 4 == 0) { echo ' last'; } ?>">


                    <a href="<?php the_permalink(); ?>">
                        <h2 class="title"><?php the_title(); ?></h2>
                    </a>
                    <div class="portfolio-image">
                        <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('post_feature_thumb'); ?>
                             <span><i class="fa fa-link"></i></span>
                        </a>
                          
                    </div>
                      
                        <div class="portfolio-buttons">
          
                            <a href="<?php the_permalink(); ?>"><?php _e('View Details','passion'); ?></a>
                        </div><!--end .product-buttons-->
          
                </div><!--end .product-->
                    <?php $i+=1; ?>
                <?php endwhile; ?>

            <div class="pagination">
                <?php
                $big = 999999999; // need an unlikely intege					
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $products->max_num_pages
                ));
                ?>
            </div>
        <?php else : ?>
                <h2 class="title"><?php _e('Not Found', 'passion'); ?></h2>
                <p><?php _e('Sorry, but you are looking for something that is not here.', 'passion'); ?></p>
                <?php get_search_form(); ?>

<?php endif; ?>
                 </main> <!-- /.main-content -->
		</div> <!-- /.col.grid_12_of_12 -->
	</div><!-- /#primary.site-content.row -->
</section> <!-- /#maincontentcontainer -->

<?php get_footer(); ?>
