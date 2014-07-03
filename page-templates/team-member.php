<?php
/**
 * Template Name: Team Member Archive
 * A custom Team page template to display Team members grid
 * Requires Our Team by Woothemes plugin to be activated
 * 
 * @package : Passion
 * @version : 1.0
 * @since : 1.0 
 * 
 */
get_header(); ?>

<div id="maincontentcontainer">

	<div id="primary" class="site-content row" role="main">
		<div class="col grid_12_of_12">
                    <div class="main-content"> 
        <?php
        
        $current_page = get_query_var('paged');
        $per_page = intval(9);
        $offset = $current_page > 0 ? $per_page * ($current_page - 1) : 0;
        $team_args = array(
            'post_type' => 'team-member',
            'posts_per_page' => $per_page,
            'offset' => $offset
        );
        $team_member = new WP_Query($team_args);
        ?>
        <?php if ($team_member->have_posts()) : $i = 1; ?>
            <?php while ($team_member->have_posts()) : $team_member->the_post(); ?>
                        <?php $team_member_email 	= esc_attr( get_post_meta( $post->ID, '_gravatar_email', true ) ); ?>
                <div id="post-<?php the_ID(); ?>" class="col grid_4_of_12 team-member<?php if ($i % 4 == 0) { echo ' last'; } ?>">


                    <a href="<?php the_permalink(); ?>">
                        <h2 class="title"><?php the_title(); ?></h2>
                    </a>
                    <div class="team-member-image">
                        <a href="<?php the_permalink(); ?>">
                            <?php if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				} elseif ( isset( $team_member_email ) && ( '' != $team_member_email ) ) {
					echo '<div itemprop="image">' .  get_avatar( $team_member_email, 224 ) . '</div>';
				} ?>
                           </a>
                         <div class="team-member-buttons">
          
                            <a href="<?php the_permalink(); ?>"><?php _e('View Details','passion'); ?></a>
                        </div><!--end .team-member-buttons-->
                          
                    </div>
                      
                       
          
                </div><!--end .team-member-->
                    <?php $i+=1; ?>
                <?php endwhile; ?>

            <div class="pagination">
                <?php
                $big = 999999999; // need an unlikely intege					
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $team_member->max_num_pages
                ));
                ?>
            </div>
        <?php else : ?>
                <h2 class="title"><?php _e('Not Found', 'passion'); ?></h2>
                <p><?php _e('Sorry, but you are looking for something that is not here.', 'passion'); ?></p>
                <?php get_search_form(); ?>

<?php endif; ?>
    </div> <!-- /.main-content -->
		</div> <!-- /.col.grid_12_of_12 -->
	</div><!-- /#primary.site-content.row -->
</div> <!-- /#maincontentcontainer -->

<?php get_footer(); ?>
