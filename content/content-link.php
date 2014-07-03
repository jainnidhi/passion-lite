<?php
/**
 * The template for displaying posts in the Link post format
 *
 * @package Passion
 * @since Passion 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<p class="post-meta"><span class="post-meta-date"><?php the_time(esc_html('j M Y','passion')); ?> <!-- by <?php the_author() ?> --></span>
               </p><hr>
           <div id="post-content">
               <header class="entry-header">
                 <?php if(is_single()) { ?>
                    <h1 class="entry-title">
			<?php the_title(); ?></h1>
                  <?php } else { ?>
                  <h2 class="entry-title"><a href="<?php the_permalink() ?>" >
			<?php the_title(); ?></a></h2>
                  <?php } ?>
		<div class="author-details">
                     <div class="image">
                         <?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
                     </div>
                    <div class="text">
                        <span class="by-author"><?php the_author_posts_link(); ?> </span>
                    </div>
                    
                 </div>
	</header> <!-- /.entry-header -->
	<div class="entry-content">
		<?php the_content( wp_kses( _e( 'Read more ', 'passion' ), array( 
			'span' => array( 
				'class' => array() )
			) ) ); ?>
		<?php wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html_e( 'Pages:', 'passion' ),
			'after' => '</div>',
			'link_before' => '<span class="page-numbers">',
			'link_after' => '</span>'
		) ); ?>
	</div> <!-- /.entry-content -->
           </div><!-- /.post-content -->

	<footer class="entry-meta">
		<?php if ( is_singular() ) {
			// Only show the tags on the Single Post page
			passion_entry_meta();
		} ?>
		<?php edit_post_link( esc_html_e( 'Edit', 'passion' ) . ' <i class="fa fa-angle-right"></i>', '<div class="edit-link">', '</div>' ); ?>
		<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) {
			// If a user has filled out their description and this is a multi-author blog, show their bio
			get_template_part( 'author-bio' );
		} ?>
	</footer> <!-- /.entry-meta -->
</article> <!-- /#post -->
