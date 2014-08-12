<?php
/**
 * Passion Theme Customizer support
 *
 * @package WordPress
 * @subpackage Passion
 * @since Passion 1.0
 */

/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @since Passion 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function passion_customize_register($wp_customize) {

    $wp_customize->get_section('header_image')->priority = 29;
    $wp_customize->get_section('static_front_page')->priority = 31;
    $wp_customize->get_section('nav')->priority = 31;

    /** ===============
     * Extends CONTROLS class to add textarea
     */
    class passion_customize_textarea_control extends WP_Customize_Control {

        public $type = 'textarea';

        public function render_content() {
            ?>

            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="5" style="width:98%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>

            <?php
        }

    }

    // Displays a list of categories in dropdown
    class WP_Customize_Dropdown_Categories_Control extends WP_Customize_Control {

        public $type = 'dropdown-categories';

        public function render_content() {
            $dropdown = wp_dropdown_categories(
                    array(
                        'name' => '_customize-dropdown-categories-' . $this->id,
                        'echo' => 0,
                        'hide_empty' => false,
                        'show_option_none' => '&mdash; ' . __('Select', 'passion') . ' &mdash;',
                        'hide_if_empty' => false,
                        'selected' => $this->value(),
                    )
            );

            $dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown);

            printf(
                    '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>', $this->label, $dropdown
            );
        }

    }

    // Add new section for theme layout and color schemes
    $wp_customize->add_section('passion_theme_layout_settings', array(
        'title' => __('Color Scheme', 'passion'),
        'priority' => 32,
    ));


    // Add color scheme options

    $wp_customize->add_setting('passion_color_scheme', array(
        'default' => 'blue',
        'sanitize_callback' => 'passion_sanitize_color_scheme_option',
    ));

    $wp_customize->add_control('passion_color_scheme', array(
        'label' => 'Color Schemes',
        'section' => 'passion_theme_layout_settings',
        'default' => 'red',
        'type' => 'radio',
        'choices' => array(
            'blue' => __('Blue', 'passion'),
            'red' => __('Red', 'passion'),
            'green' => __('Green', 'passion'),
            'yellow' => __('Yellow', 'passion'),
        ),
    ));


    // Add new section for custom favicon settings
    $wp_customize->add_section('passion_custom_favicon_setting', array(
        'title' => __('Custom Favicon', 'passion'),
        'priority' => 62,
    ));


    $wp_customize->add_setting('custom_favicon');

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'custom_favicon', array(
        'label' => 'Custom Favicon',
        'section' => 'passion_custom_favicon_setting',
        'settings' => 'custom_favicon',
        'priority' => 1,
            )
            )
    );

    // Add new section for custom favicon settings
    $wp_customize->add_section('passion_tracking_code_setting', array(
        'title' => __('Tracking Code', 'passion'),
        'priority' => 61,
    ));

    $wp_customize->add_setting('tracking_code', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'sanitize_js_callback' => 'passion_sanitize_escaping',
    ));

    $wp_customize->add_control(new passion_customize_textarea_control($wp_customize, 'tracking_code', array(
        'label' => __('Tracking Code', 'passion'),
        'section' => 'passion_tracking_code_setting',
        'settings' => 'tracking_code',
        'priority' => 2,
    )));


    // Add new section for slider settings
    $wp_customize->add_section('home_slider_setting', array(
        'title' => __('Top Featured Settings', 'passion'),
        'priority' => 36,
    ));

    $wp_customize->add_setting('featured_background_image');

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'featured_background_image', array(
        'label' => 'Featured Background',
        'section' => 'home_slider_setting',
        'settings' => 'featured_background_image',
        'priority' => 1,
            )
            )
    );

    // slider Title
    $wp_customize->add_setting('slider_title_one', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_title_one', array(
        'label' => __('Title', 'passion'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_title_one',
        'priority' => 2,
    ));

    $wp_customize->add_setting('slider_one_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new passion_customize_textarea_control($wp_customize, 'slider_one_description', array(
        'label' => __('Description', 'passion'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_one_description',
        'priority' => 4,
    )));

    // link text
    $wp_customize->add_setting('slider_one_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_one_link_text', array(
        'label' => __('Link Text', 'passion'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_one_link_text',
        'priority' => 5,
    ));

    // link url
    $wp_customize->add_setting('slider_one_link_url', array('default' => __('', 'passion'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_one_link_url', array(
        'label' => __('Link URL', 'passion'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_one_link_url',
        'priority' => 6,
    ));



    // Add new section for Home Featured Title settings
    $wp_customize->add_section('home_featured_title_setting', array(
        'title' => __('Home Featured Settings', 'passion'),
        'priority' => 38,
    ));
    
    
    $wp_customize->add_setting('passion_featured_background_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'passion_sanitize_hex_color',
        'sanitize_js_callback' => 'passion_sanitize_escaping',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'passion_featured_background_color', array(
        'label' => 'Home Featured Background color',
        'section' => 'home_featured_title_setting',
        'settings' => 'passion_featured_background_color',
        'priority' => 1,
            )
    ));

    // home Title
    $wp_customize->add_setting('home_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title', array(
        'label' => __('Section Title', 'passion'),
        'section' => 'home_featured_title_setting',
        'settings' => 'home_title',
        'priority' => 2,
    ));


    // Add new section for Home Featured One settings
    $wp_customize->add_section('home_featured_one_setting', array(
        'title' => __('Home Featured #1', 'passion'),
        'priority' => 40,
    ));


    $wp_customize->add_setting('home_featured_one', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'home_featured_one', array(
        'label' => 'Featured Image',
        'section' => 'home_featured_one_setting',
        'settings' => 'home_featured_one',
        'priority' => 1,
            )
            )
    );

    // home Title
    $wp_customize->add_setting('home_title_one', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_one', array(
        'label' => __('Title', 'passion'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_title_one',
        'priority' => 2,
    ));

    $wp_customize->add_setting('home_description_one', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new passion_customize_textarea_control($wp_customize, 'home_description_one', array(
        'label' => __('Description', 'passion'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_description_one',
        'priority' => 3,
    )));

    // link text
    $wp_customize->add_setting('home_one_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_one_link_text', array(
        'label' => __('Link Text', 'passion'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_one_link_text',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('home_one_link_url', array('default' => __('', 'passion'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_one_link_url', array(
        'label' => __('Link URL', 'passion'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_one_link_url',
        'priority' => 5,
    ));

    // Add new section for Home Featured Two settings
    $wp_customize->add_section('home_featured_two_setting', array(
        'title' => __('Home Featured #2', 'passion'),
        'priority' => 42,
    ));


    $wp_customize->add_setting('home_featured_two', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'home_featured_two', array(
        'label' => 'Featured Image',
        'section' => 'home_featured_two_setting',
        'settings' => 'home_featured_two',
        'priority' => 1,
            )
            )
    );

    // home Title
    $wp_customize->add_setting('home_title_two', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_two', array(
        'label' => __('Title', 'passion'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_title_two',
        'priority' => 2,
    ));

    $wp_customize->add_setting('home_description_two', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new passion_customize_textarea_control($wp_customize, 'home_description_two', array(
        'label' => __('Description', 'passion'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_description_two',
        'priority' => 3,
    )));

    // link text
    $wp_customize->add_setting('home_two_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_two_link_text', array(
        'label' => __('Link Text', 'passion'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_two_link_text',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('home_two_link_url', array('default' => __('', 'passion'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_two_link_url', array(
        'label' => __('Link URL', 'passion'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_two_link_url',
        'priority' => 5,
    ));



    // Add new section for Home Featured Three settings
    $wp_customize->add_section('home_featured_three_setting', array(
        'title' => __('Home Featured #3', 'passion'),
        'priority' => 45,
    ));


    $wp_customize->add_setting('home_featured_three', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'home_featured_three', array(
        'label' => 'Featured Image',
        'section' => 'home_featured_three_setting',
        'settings' => 'home_featured_three',
        'priority' => 1,
            )
            )
    );

    // home Title
    $wp_customize->add_setting('home_title_three', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_three', array(
        'label' => __('Title', 'passion'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_title_three',
        'priority' => 2,
    ));

    $wp_customize->add_setting('home_description_three', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new passion_customize_textarea_control($wp_customize, 'home_description_three', array(
        'label' => __('Description', 'passion'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_description_three',
        'priority' => 3,
    )));

    // link text
    $wp_customize->add_setting('home_three_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_three_link_text', array(
        'label' => __('Link Text', 'passion'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_three_link_text',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('home_three_link_url', array('default' => __('', 'passion'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_three_link_url', array(
        'label' => __('Link URL', 'passion'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_three_link_url',
        'priority' => 5,
    ));


    // Add new section for displaying Featured Portfolio on Front Page
    $wp_customize->add_section('passion_front_page_portfolio_options', array(
        'title' => __('Portfolio Settings', 'passion'),
        'description' => __('Settings for displaying featured portfolio on Front Page', 'passion'),
        'priority' => 52,
    ));

    // enable featured portfolio on front page?
    $wp_customize->add_setting('passion_front_featured_portfolio_check', array(
        'default' => 0,
        'sanitize_callback' => 'passion_sanitize_checkbox',
    ));
    $wp_customize->add_control('passion_front_featured_portfolio_check', array(
        'label' => __('Show featured portfolio on Front Page', 'passion'),
        'section' => 'passion_front_page_portfolio_options',
        'priority' => 1,
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('passion_hide_sample_portfolio', array(
        'default' => 1,
        'sanitize_callback' => 'passion_sanitize_checkbox',
    ));
    $wp_customize->add_control('passion_hide_sample_portfolio', array(
        'label' => __('Hide sample portfolio on Front Page', 'passion'),
        'section' => 'passion_front_page_portfolio_options',
        'priority' => 2,
        'type' => 'checkbox',
    ));
    
    $wp_customize->add_setting('passion_portfolio_background_color', array(
        'default' => '#009cee',
        'sanitize_callback' => 'passion_sanitize_hex_color',
        'sanitize_js_callback' => 'passion_sanitize_escaping',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'passion_portfolio_background_color', array(
        'label' => 'Portfolio Background color',
        'section' => 'passion_front_page_portfolio_options',
        'settings' => 'passion_portfolio_background_color',
        'priority' => 3,
            )
    ));
    
    // post Title
    $wp_customize->add_setting('passion_portfolio_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('passion_portfolio_title', array(
        'label' => __('Section Title', 'passion'),
        'section' => 'passion_front_page_portfolio_options',
        'settings' => 'passion_portfolio_title',
        'priority' => 4,
    ));

    $wp_customize->add_setting('portfolio_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new passion_customize_textarea_control($wp_customize, 'portfolio_description', array(
        'label' => __('Description', 'passion'),
        'section' => 'passion_front_page_portfolio_options',
        'settings' => 'portfolio_description',
        'priority' => 5,
    )));



    // select number of posts for featured posts on front page
    $wp_customize->add_setting('passion_front_featured_portfolio_count', array(
        'default' => 3,
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('passion_front_featured_portfolio_count', array(
        'label' => __('Number of portfolio to display', 'passion'),
        'section' => 'passion_front_page_portfolio_options',
        'settings' => 'passion_front_featured_portfolio_count',
        'priority' => 20,
    ));


    $wp_customize->add_setting('passion_portfolio_front_count', array(
        'default' => 9,
        'sanitize_callback' => 'passion_sanitize_integer',
    ));
    $wp_customize->add_control('passion_portfolio_front_count', array(
        'label' => __('Portfolio Item Count', 'passion'),
        'section' => 'passion_front_page_portfolio_options',
        'settings' => 'passion_portfolio_front_count',
        'priority' => 40,
    ));


    // Add new section for blog settings
    $wp_customize->add_section('passion_blog_page_settings', array(
        'title' => __('Blog Settings', 'passion'),
        'description' => __('Settings for blog page', 'passion'),
        'priority' => 55,
    ));

    $wp_customize->add_setting('blog_featured_image', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'blog_featured_image', array(
        'label' => 'Blog Featured Image',
        'section' => 'passion_blog_page_settings',
        'settings' => 'blog_featured_image',
        'priority' => 1,
            )
            )
    );

    $wp_customize->add_setting('blog_page_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('blog_page_title', array(
        'label' => __('Section Title', 'passion'),
        'section' => 'passion_blog_page_settings',
        'settings' => 'blog_page_title',
        'priority' => 2,
    ));

    $wp_customize->add_setting('blog_page_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new passion_customize_textarea_control($wp_customize, 'blog_page_description', array(
        'label' => __('Description', 'passion'),
        'section' => 'passion_blog_page_settings',
        'settings' => 'blog_page_description',
        'priority' => 3,
    )));



    // Add new section for displaying Featured Posts on Front Page
    $wp_customize->add_section('passion_front_page_post_options', array(
        'title' => __('Featured Posts', 'passion'),
        'description' => __('Settings for displaying featured posts on Front Page', 'passion'),
        'priority' => 54,
    ));

    // enable featured posts on front page?
    $wp_customize->add_setting('passion_front_featured_posts_check', array(
        'default' => 1,
        'sanitize_callback' => 'passion_sanitize_checkbox',
    ));
    $wp_customize->add_control('passion_front_featured_posts_check', array(
        'label' => __('Show featured posts on Front Page', 'passion'),
        'section' => 'passion_front_page_post_options',
        'priority' => 1,
        'type' => 'checkbox',
    ));
    
    $wp_customize->add_setting('passion_blog_background_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'passion_sanitize_hex_color',
        'sanitize_js_callback' => 'passion_sanitize_escaping',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'passion_blog_background_color', array(
        'label' => 'Blog Background color',
        'section' => 'passion_front_page_post_options',
        'settings' => 'passion_blog_background_color',
        'priority' => 2,
            )
    ));
    
    // post Title
    $wp_customize->add_setting('passion_post_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('passion_post_title', array(
        'label' => __('Section Title', 'passion'),
        'section' => 'passion_front_page_post_options',
        'settings' => 'passion_post_title',
        'priority' => 3,
    ));


    // select number of posts for featured posts on front page
    $wp_customize->add_setting('passion_front_featured_posts_count', array(
        'default' => 3,
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('passion_front_featured_posts_count', array(
        'label' => __('Number of posts to display', 'passion'),
        'section' => 'passion_front_page_post_options',
        'settings' => 'passion_front_featured_posts_count',
        'priority' => 20,
    ));
    // select category for featured posts 
    $wp_customize->add_setting('passion_front_featured_posts_cat', array('default' => 0,));
    $wp_customize->add_control(new WP_Customize_Dropdown_Categories_Control($wp_customize, 'passion_front_featured_posts_cat', array(
        'label' => __('Post Category', 'passion'),
        'section' => 'passion_front_page_post_options',
        'type' => 'dropdown-categories',
        'settings' => 'passion_front_featured_posts_cat',
        'priority' => 30,
    )));

    // Add new section team setting
    $wp_customize->add_section('passion_team_settings', array(
        'title' => __('Team Settings', 'passion'),
        'description' => __('Settings for team', 'passion'),
        'priority' => 56,
    ));

    // enable team member on front page?
    $wp_customize->add_setting('passion_front_team_members_check', array(
        'default' => 0,
        'sanitize_callback' => 'passion_sanitize_checkbox',
    ));
    $wp_customize->add_control('passion_front_team_members_check', array(
        'label' => __('Show Team Members on Front Page', 'passion'),
        'section' => 'passion_team_settings',
        'priority' => 1,
        'type' => 'checkbox',
    ));
    
    $wp_customize->add_setting('passion_team_background_color', array(
        'default' => '#009cee',
        'sanitize_callback' => 'passion_sanitize_hex_color',
        'sanitize_js_callback' => 'passion_sanitize_escaping',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'passion_team_background_color', array(
        'label' => 'Team Background color',
        'section' => 'passion_team_settings',
        'settings' => 'passion_team_background_color',
        'priority' => 2,
            )
    ));

    $wp_customize->add_setting('passion_team_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('passion_team_title', array(
        'label' => __('Section Title', 'passion'),
        'section' => 'passion_team_settings',
        'settings' => 'passion_team_title',
        'priority' => 3,
    ));

    $wp_customize->add_setting('team_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new passion_customize_textarea_control($wp_customize, 'team_description', array(
        'label' => __('Description', 'passion'),
        'section' => 'passion_team_settings',
        'settings' => 'team_description',
        'priority' => 4,
    )));


    // select number of posts for featured posts on front page
    $wp_customize->add_setting('passion_front_team_members_count', array(
        'default' => 3,
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('passion_front_team_members_count', array(
        'label' => __('Number of Team Members to display', 'passion'),
        'section' => 'passion_team_settings',
        'settings' => 'passion_front_team_members_count',
        'priority' => 20,
    ));


    // Add new section for Social Icons
    $wp_customize->add_section('social_icon_setting', array(
        'title' => __('Social Icons', 'passion'),
        'priority' => 58,
    ));
    
    $wp_customize->add_setting('passion_front_social_icon_check', array(
        'default' => 0,
        'sanitize_callback' => 'passion_sanitize_checkbox',
    ));
    $wp_customize->add_control('passion_front_social_icon_check', array(
        'label' => __('Display Social Icons on Front Page', 'passion'),
        'section' => 'social_icon_setting',
        'priority' => 1,
        'type' => 'checkbox',
    ));
    
    // link url
    $wp_customize->add_setting('facebook_link_url', array('default' => __('', 'passion'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('facebook_link_url', array(
        'label' => __('Facebook URL', 'passion'),
        'section' => 'social_icon_setting',
        'settings' => 'facebook_link_url',
        'priority' => 2,
    ));

    // link url
    $wp_customize->add_setting('twitter_link_url', array('default' => __('', 'passion'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('twitter_link_url', array(
        'label' => __('Twitter URL', 'passion'),
        'section' => 'social_icon_setting',
        'settings' => 'twitter_link_url',
        'priority' => 3,
    ));

    // link url
    $wp_customize->add_setting('googleplus_link_url', array('default' => __('', 'passion'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('googleplus_link_url', array(
        'label' => __('Google Plus URL', 'passion'),
        'section' => 'social_icon_setting',
        'settings' => 'googleplus_link_url',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('pinterest_link_url', array('default' => __('', 'passion'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('pinterest_link_url', array(
        'label' => __('Pinterest URL', 'passion'),
        'section' => 'social_icon_setting',
        'settings' => 'pinterest_link_url',
        'priority' => 5,
    ));

    // link url
    $wp_customize->add_setting('github_link_url', array('default' => __('', 'passion'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('github_link_url', array(
        'label' => __('Github URL', 'passion'),
        'section' => 'social_icon_setting',
        'settings' => 'github_link_url',
        'priority' => 6,
    ));

    // link url
    $wp_customize->add_setting('youtube_link_url', array('default' => __('', 'passion'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('youtube_link_url', array(
        'label' => __('Youtube URL', 'passion'),
        'section' => 'social_icon_setting',
        'settings' => 'youtube_link_url',
        'priority' => 7,
    ));
    
    $wp_customize->add_setting('dribbble_link_url', array('default' => __('', 'passion'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('dribbble_link_url', array(
        'label' => __('Dribble URL', 'passion'),
        'section' => 'social_icon_setting',
        'settings' => 'dribbble_link_url',
        'priority' => 8,
    ));
    
    $wp_customize->add_setting('tumblr_link_url', array('default' => __('', 'passion'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('tumblr_link_url', array(
        'label' => __('Tumblr URL', 'passion'),
        'section' => 'social_icon_setting',
        'settings' => 'tumblr_link_url',
        'priority' => 9,
    ));
    
    $wp_customize->add_setting('flickr_link_url', array('default' => __('', 'passion'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('flickr_link_url', array(
        'label' => __('Flickr URL', 'passion'),
        'section' => 'social_icon_setting',
        'settings' => 'flickr_link_url',
        'priority' => 10,
    ));
    
    $wp_customize->add_setting('vimeo_link_url', array('default' => __('', 'passion'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('vimeo_link_url', array(
        'label' => __('Vimeo URL', 'passion'),
        'section' => 'social_icon_setting',
        'settings' => 'vimeo_link_url',
        'priority' => 11,
    ));
    
    $wp_customize->add_setting('linkedin_link_url', array('default' => __('', 'passion'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('linkedin_link_url', array(
        'label' => __('Linkedin URL', 'passion'),
        'section' => 'social_icon_setting',
        'settings' => 'linkedin_link_url',
        'priority' => 12,
    ));

    // Add new section for Home CTA settings
    $wp_customize->add_section('home_cta_setting', array(
        'title' => __('Footer CTA', 'passion'),
        'priority' => 57,
    ));
    
    $wp_customize->add_setting('passion_front_cta_check', array(
        'default' => 0,
        'sanitize_callback' => 'passion_sanitize_checkbox',
    ));
    $wp_customize->add_control('passion_front_cta_check', array(
        'label' => __('Show CTA on Front Page', 'passion'),
        'section' => 'home_cta_setting',
        'priority' => 1,
        'type' => 'checkbox',
    ));
    
    $wp_customize->add_setting('passion_cta_background_color', array(
        'default' => '#111111',
        'sanitize_callback' => 'passion_sanitize_hex_color',
        'sanitize_js_callback' => 'passion_sanitize_escaping',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'passion_cta_background_color', array(
        'label' => 'CTA Background color',
        'section' => 'home_cta_setting',
        'settings' => 'passion_cta_background_color',
        'priority' => 2,
            )
    ));
    
    $wp_customize->add_setting('cta_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('cta_title', array(
        'label' => __('Title', 'passion'),
        'section' => 'home_cta_setting',
        'settings' => 'cta_title',
        'priority' => 3,
    ));

    $wp_customize->add_setting('cta_text', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new passion_customize_textarea_control($wp_customize, 'cta_text', array(
        'label' => __('CTA Text', 'passion'),
        'section' => 'home_cta_setting',
        'settings' => 'cta_text',
        'priority' => 4,
    )));


    // link text
    $wp_customize->add_setting('home_cta_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_cta_link_text', array(
        'label' => __('Link Text', 'passion'),
        'section' => 'home_cta_setting',
        'settings' => 'home_cta_link_text',
        'priority' => 5,
    ));

    // link url
    $wp_customize->add_setting('home_cta_link_url', array('default' => __('', 'passion'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_cta_link_url', array(
        'label' => __('Link URL', 'passion'),
        'section' => 'home_cta_setting',
        'settings' => 'home_cta_link_url',
        'priority' => 6,
    ));


    // Add new section for Testimonial slider settings
    $wp_customize->add_section('testimonial_slider_setting', array(
        'title' => __('Testimonial Settings', 'passion'),
        'priority' => 53,
    ));

    $wp_customize->add_setting('testimonial_background_image', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'testimonial_background_image', array(
        'label' => 'Testimonial Background',
        'section' => 'testimonial_slider_setting',
        'settings' => 'testimonial_background_image',
        'priority' => 1,
            )
            )
    );

    // home Title
    $wp_customize->add_setting('feedback_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('feedback_title', array(
        'label' => __('Section Title', 'passion'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'feedback_title',
        'priority' => 2,
    ));

    $wp_customize->add_setting('testimonial_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new passion_customize_textarea_control($wp_customize, 'testimonial_description', array(
        'label' => __('Description', 'passion'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'testimonial_description',
        'priority' => 3,
    )));


    $wp_customize->add_setting('tslider_one', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'tslider_one', array(
        'label' => 'Slider 1',
        'section' => 'testimonial_slider_setting',
        'settings' => 'tslider_one',
        'priority' => 4,
            )
            )
    );


    $wp_customize->add_setting('tslider_one_description', array('default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new passion_customize_textarea_control($wp_customize, 'tslider_one_description', array(
        'label' => __('Description', 'passion'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'tslider_one_description',
        'priority' => 5,
    )));

    $wp_customize->add_setting('client_name_one', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_one', array(
        'label' => __('Client Name', 'passion'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_one',
        'priority' => 6,
    ));

    $wp_customize->add_setting('client_name_url_one', array('default' => __('', 'passion'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_url_one', array(
        'label' => __('URL', 'passion'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_url_one',
        'priority' => 7,
    ));

    $wp_customize->add_setting('tslider_two', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'tslider_two', array(
        'label' => 'Slider 2',
        'section' => 'testimonial_slider_setting',
        'settings' => 'tslider_two',
        'priority' => 8,
            )
            )
    );

    $wp_customize->add_setting('tslider_two_description', array('default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new passion_customize_textarea_control($wp_customize, 'tslider_two_description', array(
        'label' => __('Description', 'passion'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'tslider_two_description',
        'priority' => 9,
    )));

    $wp_customize->add_setting('client_name_two', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_two', array(
        'label' => __('Client Name', 'passion'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_two',
        'priority' => 10,
    ));

    $wp_customize->add_setting('client_name_url_two', array('default' => __('', 'passion'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_url_two', array(
        'label' => __('URL', 'passion'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_url_two',
        'priority' => 11,
    ));

    $wp_customize->add_setting('tslider_three', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'tslider_three', array(
        'label' => 'Slider 3',
        'section' => 'testimonial_slider_setting',
        'settings' => 'tslider_three',
        'priority' => 12,
            )
            )
    );

    $wp_customize->add_setting('tslider_three_description', array('default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new passion_customize_textarea_control($wp_customize, 'tslider_three_description', array(
        'label' => __('Description', 'passion'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'tslider_three_description',
        'priority' => 13,
    )));

    $wp_customize->add_setting('client_name_three', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_three', array(
        'label' => __('Client Name', 'passion'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_three',
        'priority' => 14,
    ));

    $wp_customize->add_setting('client_name_url_three', array('default' => __('', 'passion'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_url_three', array(
        'label' => __('URL', 'passion'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_url_three',
        'priority' => 15,
    ));

    $wp_customize->add_setting('tslider_four', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'tslider_four', array(
        'label' => 'Slider 4',
        'section' => 'testimonial_slider_setting',
        'settings' => 'tslider_four',
        'priority' => 16,
            )
            )
    );

    $wp_customize->add_setting('tslider_four_description', array('default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new passion_customize_textarea_control($wp_customize, 'tslider_four_description', array(
        'label' => __('Description', 'passion'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'tslider_four_description',
        'priority' => 17,
    )));

    $wp_customize->add_setting('client_name_four', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_four', array(
        'label' => __('Client Name', 'passion'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_four',
        'priority' => 18,
    ));

    $wp_customize->add_setting('client_name_url_four', array('default' => __('', 'passion'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('client_name_url_four', array(
        'label' => __('URL', 'passion'),
        'section' => 'testimonial_slider_setting',
        'settings' => 'client_name_url_four',
        'priority' => 19,
    ));



    // Add new section for Contact settings
    $wp_customize->add_section('contact_setting', array(
        'title' => __('Contact Details', 'passion'),
        'priority' => 59,
    ));
    
     $wp_customize->add_setting('passion_front_contact_details_check', array(
        'default' => 0,
        'sanitize_callback' => 'passion_sanitize_checkbox',
    ));
    $wp_customize->add_control('passion_front_contact_details_check', array(
        'label' => __('Display Contact Details on Front Page', 'passion'),
        'section' => 'contact_setting',
        'priority' => 1,
        'type' => 'checkbox',
    ));
    
    $wp_customize->add_setting('contact_email', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('contact_email', array(
        'label' => __('Email', 'passion'),
        'section' => 'contact_setting',
        'settings' => 'contact_email',
        'priority' => 2,
    ));

    $wp_customize->add_setting('contact_phone', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('contact_phone', array(
        'label' => __('Phone', 'passion'),
        'section' => 'contact_setting',
        'settings' => 'contact_phone',
        'priority' => 3,
    ));

    $wp_customize->add_setting('address_detail', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new passion_customize_textarea_control($wp_customize, 'address_detail', array(
        'label' => __('Address', 'passion'),
        'section' => 'contact_setting',
        'settings' => 'address_detail',
        'priority' => 4,
    )));

    
    // Add footer text section
    $wp_customize->add_section('passion_footer', array(
        'title' => 'Footer Text', // The title of section
        'priority' => 60,
    ));

    $wp_customize->add_setting('passion_footer_footer_text', array(
        'default' => null,
        'sanitize_js_callback' => 'passion_sanitize_escaping',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new passion_customize_textarea_control($wp_customize, 'passion_footer_footer_text', array(
        'section' => 'passion_footer', // id of section to which the setting belongs
        'settings' => 'passion_footer_footer_text',
    )));


    // Add custom CSS section
    $wp_customize->add_section('passion_custom_css', array(
        'title' => 'Custom CSS', // The title of section
        'priority' => 80,
    ));

    $wp_customize->add_setting('passion_custom_css', array(
        'default' => '',
        'sanitize_callback' => 'passion_sanitize_custom_css',
        'sanitize_js_callback' => 'passion_sanitize_escaping',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new passion_customize_textarea_control($wp_customize, 'passion_custom_css', array(
        'section' => 'passion_custom_css', // id of section to which the setting belongs
        'settings' => 'passion_custom_css',
    )));



    //remove default customizer sections
    $wp_customize->remove_section('background_image');
    $wp_customize->remove_section('colors');

    // add post message for various customizer settings 
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
}

add_action('customize_register', 'passion_customize_register');



/*
 * Sanitize numeric values 
 * 
 * @since Passion 1.0
 */

function passion_sanitize_integer($input) {
    if (is_numeric($input)) {
        return intval($input);
    }
}

/*
 * Escaping for input values
 * 
 * @since Passion 1.0
 */

function passion_sanitize_escaping($input) {
    $input = esc_attr($input);
    return $input;
}

/*
 * Sanitize Custom CSS 
 * 
 * @since Passion 1.0
 */

function passion_sanitize_custom_css($input) {
    $input = wp_kses_stripslashes($input);
    return $input;
}

/*
 * Sanitize Checkbox input values
 * 
 * @since Passion 1.0
 */

function passion_sanitize_checkbox($input) {
    if ($input) {
        $output = '1';
    } else {
        $output = false;
    }
    return $output;
}

/*
 * Sanitize color scheme options 
 * 
 * @since Passion 1.0
 */

function passion_sanitize_color_scheme_option($colorscheme_option) {
    if (!in_array($colorscheme_option, array('blue', 'red', 'green', 'yellow'))) {
        $colorscheme_option = 'blue';
    }

    return $colorscheme_option;
}

/*
 * Sanitize Hex Color for 
 * Background Color options
 * 
 * @since Passion 1.0
 */

function passion_sanitize_hex_color($color) {
    if ($unhashed = sanitize_hex_color_no_hash($color)) {
        return '#' . $unhashed;
    }
    return $color;
}

/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since Passion 1.0
 */
function passion_customize_preview_js() {
    wp_enqueue_script('passion_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), '20131205', true);
}

add_action('customize_preview_init', 'passion_customize_preview_js');

function passion_header_output() {
    ?>
    <!--Customizer CSS--> 
    <style type="text/css">
    <?php echo esc_attr(get_theme_mod('passion_custom_css')); ?>
    </style> 
    <!--/Customizer CSS-->
    <?php
}

// Output custom CSS to live site
add_action('wp_head', 'passion_header_output');

function passion_footer_tracking_code() {
    echo get_theme_mod('tracking_code');
}

add_action('wp_footer', 'passion_footer_tracking_code');

/**
 * Change theme colors based on theme options from customizer.
 *
 * @since Passion 1.0
 */
function passion_background_image() {

    $background_testimonial = get_theme_mod('testimonial_background_image');
    $background_featured = get_theme_mod('featured_background_image');

    // If we get this far, we have custom styles.
    ?>
    <style type="text/css" id="passion-background-css">
    <?php if (get_theme_mod('testimonial_background_image')) { ?>
            .testimonial-area{
                background-image:url('<?php echo $background_testimonial ?>');
            }
    <?php } ?>
    <?php if (get_theme_mod('featured_background_image')) { ?>
            .slider-wrapper{
                background-image:url('<?php echo $background_featured ?>');
            }
    <?php } ?>

    </style>

    <?php
}

add_action('wp_head', 'passion_background_image');

/**
 * Change theme background colors based on theme options from customizer.
 *
 * @since Passion 1.0
 */
function passion_background_color() {

    $background_featured = get_theme_mod('passion_featured_background_color');
    $background_portfolio = get_theme_mod('passion_portfolio_background_color');
    $background_blog = get_theme_mod('passion_blog_background_color');
    $background_team = get_theme_mod('passion_team_background_color');
    $background_cta = get_theme_mod('passion_cta_background_color');

    // If we get this far, we have custom styles.
    ?>

    <style type="text/css" id="passion-background-color-css">
    <?php if (get_theme_mod('passion_featured_background_color')) { ?>
            .home-featured-area{
                background:<?php echo $background_featured ?>;
            }
    <?php } ?>
                    
    <?php if (get_theme_mod('passion_portfolio_background_color')) { ?>
            .portfolio-area{
                background:<?php echo $background_portfolio ?>;
            }
    <?php } ?>
                
    <?php if (get_theme_mod('passion_blog_background_color')) { ?>
            .blog-area{
                background:<?php echo $background_blog ?>;
            }
    <?php } ?>
                
    <?php if (get_theme_mod('passion_team_background_color')) { ?>
            .team-member-area{
                background:<?php echo $background_team ?>;
            }
    <?php } ?>
                
    <?php if (get_theme_mod('passion_cta_background_color')) { ?>
            .home-cta-area{
                background:<?php echo $background_cta ?>;
            }
    <?php } ?>
           
    </style>

    <?php
}

add_action('wp_head', 'passion_background_color');
