<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package Passion
 * @since Passion 1.0
 */
?>
            <?php 
            $team_member_email 	= esc_attr( get_post_meta( $post->ID, '_gravatar_email', true ) );
            $role = esc_attr( get_post_meta( $post->ID, '_byline', true ) );
            $twitter 			= esc_attr( get_post_meta( $post->ID, '_twitter', true ) );
            $facebook                         = esc_attr( get_post_meta( $post->ID, '_facebook', true ) );
            ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
           <p class="post-meta">
               <span class="team-member-role">
                                    <?php if($role) {
                                        echo $role;
                                    } else { 
                                        
                                        echo _e('Profile','passion');
                                        
                                    }
?>
                                    
               </span><hr></p>
           <div id="post-content">
            <header class="entry-header">
                 
                <div class="member-details">
                     <div class="team-member-image">
                        <?php if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				} elseif ( isset( $team_member_email ) && ( '' != $team_member_email ) ) {
					echo '<div itemprop="image">' .  get_avatar( $team_member_email, 250 ) . '</div>';
				} ?>
                     </div>
                    <div class="member-title">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    
                    <div class="team-meta">
                                        <?php
                                        echo '<ul class="author-details">';
 
				if ( '' != $twitter && apply_filters( 'woothemes_our_team_member_twitter', true ) ) {
					echo '<li class="our-team-twitter twitter" itemprop="contactPoint"><a href="//twitter.com/' . esc_html( $twitter ) . '"class="our-team-twitter" ><span>' . esc_html( $twitter ) . '</span></a></li>'  . "\n";
				}
 
                                if ( '' != $facebook ) {
					echo '<li class="our-team-facebook facebook" itemprop="contactPoint"><a href="//facebook.com/' . esc_html( $facebook ) . '" class="our-team-facebook" > <span>' . esc_html( $facebook ) . '</span></a></li>'  . "\n";
				}
				
				echo '</ul>';
 
                                        
                                ?>
                            </div><!-- .team-meta -->
                    
                    
                 </div>
			
		</header> <!-- /.entry-header -->
                
                <?php if ( is_home() ) { ?>
                                    
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                                         <?php the_post_thumbnail('post-thumb'); ?> 
                                    
                                </a>
				
			<?php } // is_single() ?>

		<?php if ( is_search() || is_home() || is_archive()) { // Only display Excerpts for Search ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div> <!-- /.entry-summary -->
		<?php }
		else { ?>
			<div class="entry-content">
				<?php the_content( wp_kses( __( 'Read more ', 'passion' ), array( 'span' => array( 
					'class' => array() ) ) )
					); ?>
				<?php wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'passion' ),
					'after' => '</div>',
					'link_before' => '<span class="page-numbers">',
					'link_after' => '</span>'
				) ); ?>
			</div> <!-- /.entry-content -->
		<?php } ?>
              </div>
          
		<footer class="entry-meta">
			<?php if ( is_singular() ) {
				// Only show the tags on the Single Post page
				passion_entry_meta();
			} ?>
			
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) {
				// If a user has filled out their description and this is a multi-author blog, show their bio
				get_template_part( 'author-bio' );
			} ?>
		</footer> <!-- /.entry-meta -->
          
	</article> <!-- /#post -->
