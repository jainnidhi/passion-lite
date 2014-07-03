<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id #maincontentcontainer div and all content after.
 * There are also four footer widgets displayed. These will be displayed from
 * one to four columns, depending on how many widgets are active.
 *
 * @package Passion
 * @since Passion 1.0
 */
?>

<footer id="footercontainer">

    <?php
    // Count how many footer sidebars are active so we can work out how many containers we need
    $footerSidebars = 0;
    for ($x = 1; $x <= 4; $x++) {
        if (is_active_sidebar('sidebar-footer' . $x)) {
            $footerSidebars++;
        }
    }

    // If there's one or more one active sidebars, create a row and add them
    if ($footerSidebars > 0) {
        ?>
        <footer class="site-footer row" role="contentinfo">
            <?php
            // Work out the container class name based on the number of active footer sidebars
            $containerClass = "grid_" . 12 / $footerSidebars . "_of_12";

            // Display the active footer sidebars
            for ($x = 1; $x <= 4; $x++) {
                if (is_active_sidebar('sidebar-footer' . $x)) {
                    ?>
                    <div id="<?php echo 'footer-widget' . $x; ?>" class="col <?php echo $containerClass ?>">
                        <div class="widget-area" role="complementary">
                    <?php dynamic_sidebar('sidebar-footer' . $x); ?>
                        </div>
                    </div> <!-- /.col.<?php echo $containerClass ?> -->
            <?php }
        }
        ?>
        </footer> <!-- /.site-footer.row -->
<?php } ?>

    <div class="footer-wrap clearfix">
        <div class="footer-wrap-container">
        <?php if (get_theme_mod('passion_footer_footer_text') == '') { ?>
            <div class="smallprint">
                <p>
                    <a href="<?php $passion_theme = wp_get_theme(); echo $passion_theme->get( 'ThemeURI' ); ?>">
                        <?php _e('Passion WordPress theme by IdeaBox', 'passion'); ?>
                    </a>
                </p>
            </div>
        <?php } else { ?>   
                    <div class="smallprint"><?php echo wpautop(esc_html(get_theme_mod('passion_footer_footer_text'))); ?></div>
        <?php } ?> 
                     <div class="col grid_8_of_12 footer-extras last">
                            <nav id="site-navigation" class="main-navigation clearfix" role="navigation">
                                
                               <?php  wp_nav_menu(array('theme_location' => 'footer', 'menu_class' => 'footer-menu', 'container_class' => 'footer-wrap-menu')); ?>
                             
                              
                            </nav> <!-- /.site-navigation.main-navigation -->
                        </div><!-- /.header-extras -->
        </div>
    </div> <!-- /.footer-wrap -->
</div> <!-- /.footercontainer -->

</footer> <!-- /.#wrapper.hfeed.site -->

<?php wp_footer(); ?>
</body>

</html>
