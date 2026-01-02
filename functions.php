<?php

/**
 * WP Bootstrap Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Bootstrap_Starter
 */
add_action('init', function () {
    if (!session_id()) {
        session_start();
    }
});

if (! function_exists('sigma_india_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function sigma_india_setup()
    {
        /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WP Bootstrap Starter, use a find and replace
	 * to change 'wp-bootstrap-starter' to the name of your theme in all the template files.
	 */
        load_theme_textdomain('wp-bootstrap-starter', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
        add_theme_support('title-tag');

        /*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
        add_theme_support('post-thumbnails');

        add_theme_support('woocommerce');

        // This theme uses wp_nav_menu() for menus Start//
        register_nav_menus(array(
            'primary' => esc_html__('Top Menu', 'sigma-india'),
            'secondary' => esc_html__('Footer One Menu', 'sigma-india'),
            'third' => esc_html__('Footer Two Menu', 'sigma-india'),
            'fourth' => esc_html__('Footer Three Menu', 'sigma-india'),
            'fifth' => esc_html__('Footer Fourth Menu', 'sigma-india'),
            'newprimary' => esc_html__('New Top Menu', 'sigma-india'),
            'newfooter' => esc_html__('New Footer Menu', 'sigma-india'),
            'newfootertwo' => esc_html__('New Footer Menu Two', 'sigma-india'),
            'newfooterthree' => esc_html__('New Footer Menu Three', 'sigma-india'),
            'newfooterfour' => esc_html__('New Footer Menu Four', 'sigma-india')
        ));
        // This theme uses wp_nav_menu() for menus End//



        /*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
        add_theme_support('html5', array(
            'comment-form',
            'comment-list',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('wp_bootstrap_starter_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        function wp_boostrap_starter_add_editor_styles()
        {
            add_editor_style('custom-editor-style.css');
        }
        add_action('admin_init', 'wp_boostrap_starter_add_editor_styles');
    }
endif;
add_action('after_setup_theme', 'sigma_india_setup');


add_filter('woocommerce_email_footer_text', 'custom_woocommerce_email_footer_text');
function custom_woocommerce_email_footer_text($footer_text)
{
    // Remove the "— Built with WooCommerce" part
    $footer_text = str_replace('&mdash; Built with {WooCommerce}', '', $footer_text);
    $footer_text = str_replace('— Built with {WooCommerce}', '', $footer_text); // fallback if &mdash; is converted
    return trim($footer_text);
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_bootstrap_starter_content_width()
{
    $GLOBALS['content_width'] = apply_filters('wp_bootstrap_starter_content_width', 1170);
}
add_action('after_setup_theme', 'wp_bootstrap_starter_content_width', 0);


/**
 * Register widget area Start.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sigma_india_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'wp-bootstrap-starter'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'wp-bootstrap-starter'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Footer 1', 'wp-bootstrap-starter'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here.', 'wp-bootstrap-starter'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'sigma_india_widgets_init');
//Register widget area End Here.


// Enqueue Scripts and Styles Start Here//
function sigma_india_scripts()
{

    // if (basename(get_page_template()) != 'template-bf.php'):

    wp_enqueue_style('sigma-india', get_stylesheet_uri());
    wp_enqueue_style('sigma-india-owl-carousel-min-cdn', '//owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css');
    wp_enqueue_style('sigma-india-photoswipe-min-cdn', '//cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.css');
    wp_enqueue_style('sigma-india-bootstrap-select-min-cdn', '//cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css');

    wp_enqueue_style('sigma-india-bootstrap-icon-cdn', '//cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css');

    wp_enqueue_style('sigma-india-default-skin-min-cdn', '//cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/default-skin/default-skin.min.css');
    wp_enqueue_style('sigma-india-swiper-min-cdn', '//cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css');

    wp_enqueue_style('sigma-india-slick-cdn', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css');
    wp_enqueue_style('sigma-india-slick-theme-cdn', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css');

    wp_enqueue_style('sigma-styles', get_template_directory_uri() . '/new-css/new-styles.css');
    wp_enqueue_style('sigma-india-custom-style', get_template_directory_uri() . '/new-css/new-custom-style.css', array('sigma-styles'));
    wp_enqueue_style('sigma-fonts', get_template_directory_uri() . '/new-css/fonts.css');
    wp_enqueue_style('sigma-layout', get_template_directory_uri() . '/new-css/layout.css');
    wp_enqueue_style('sigma-core', get_template_directory_uri() . '/new-css/core.css');
    wp_enqueue_style('sigma-india-responsive-styles', get_template_directory_uri() . '/new-css/new-responsive.css');



    wp_enqueue_script('jquery');

    wp_enqueue_script('sigma-india-3.3.1', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', array('jquery'), '', true);

    wp_enqueue_script('sigma-india-bootstrap-bundle-min', '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '', true);

    wp_enqueue_script('sigma-india-bootstrap-select-min', '//cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js', array('jquery'), '', true);
    wp_enqueue_script('sigma-india-owl-carousel-min', '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js', array('jquery'), '', true);
    wp_enqueue_script('sigma-india-photoswipe-min', '//cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.js', array('jquery'), '', true);

    wp_enqueue_script('sigma-india-photoswipe-ui-default-min', '//cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe-ui-default.min.js', array('jquery'), '', true);
    wp_enqueue_script('sigma-india-swiper-min', '//cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js', array('jquery'), '', true);

    wp_enqueue_script('sigma-india-mixitup', '//cdnjs.cloudflare.com/ajax/libs/mixitup/2.1.11/jquery.mixitup.min.js', array('jquery'), '', true);
    wp_enqueue_script('sigma-india-slick-cdn', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js', array('jquery'), '', true);
    // wp_enqueue_script('sigma-india-scripts-slider', get_template_directory_uri() . '/new-js/scripts-slider.js', array('jquery'), null, true);
    wp_enqueue_script('sigma-india-scripts-js', get_template_directory_uri() . '/new-js/scripts.js', array('jquery'), null, true);
    // Ensure this is enqueued

    if (is_product()) {
        wp_enqueue_script('wc-add-to-cart');
        wp_enqueue_script('wc-single-product');
        wp_enqueue_script('wc-add-to-cart-variation');
    }

    wp_localize_script('sigma-india-scripts-js', 'wc_cart_params ', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));



    //endif;
}
add_action('wp_enqueue_scripts', 'sigma_india_scripts');

//Enqueue Scripts and Styles End Here//

add_action('admin_enqueue_scripts', function () {
    // Bootstrap 5 CSS
    wp_enqueue_style('bootstrap-5', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css', [], '5.3.0');

    // DataTables Bootstrap 5 CSS
    wp_enqueue_style('datatables-bootstrap5', 'https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css', ['bootstrap-5'], '2.2.2');

    // jQuery (already included in WordPress, but if you want latest one from CDN, deregister default)
    // wp_deregister_script('jquery');
    // wp_register_script('jquery', 'https://code.jquery.com/jquery-3.7.1.js', [], '3.7.1', true);
    // wp_enqueue_script('jquery');

    // Bootstrap 5 Bundle JS (includes Popper.js)
    wp_enqueue_script('bootstrap-5', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js', ['jquery'], '5.3.0', true);

    // DataTables JS
    wp_enqueue_script('datatables', 'https://cdn.datatables.net/2.2.2/js/dataTables.js', ['jquery'], '2.2.2', true);

    // DataTables Bootstrap 5 JS
    wp_enqueue_script('datatables-bootstrap5', 'https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js', ['datatables', 'bootstrap-5'], '2.2.2', true);
});




/**
 * Add Preload for CDN scripts and stylesheet
 */
function wp_bootstrap_starter_preload($hints, $relation_type)
{
    if ('preconnect' === $relation_type && get_theme_mod('cdn_assets_setting') === 'yes') {
        $hints[] = [
            'href'        => 'https://cdn.jsdelivr.net/',
            'crossorigin' => 'anonymous',
        ];
        $hints[] = [
            'href'        => 'https://use.fontawesome.com/',
            'crossorigin' => 'anonymous',
        ];
    }
    return $hints;
}

add_filter('wp_resource_hints', 'wp_bootstrap_starter_preload', 10, 2);



function wp_bootstrap_starter_password_form()
{
    global $post;
    $label = 'pwbox-' . (empty($post->ID) ? rand() : $post->ID);
    $o = '<form action="' . esc_url(home_url('wp-login.php?action=postpass', 'login_post')) . '" method="post">
    <div class="d-block mb-3">' . __("To view this protected post, enter the password below:", "wp-bootstrap-starter") . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __("Password:", "wp-bootstrap-starter") . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__("Submit", "wp-bootstrap-starter") . '" class="btn btn-primary"/></div>
    </form>';
    return $o;
}
add_filter('the_password_form', 'wp_bootstrap_starter_password_form');



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load plugin compatibility file.
 */
require get_template_directory() . '/inc/plugin-compatibility/plugin-compatibility.php';

/**
 * Load custom WordPress nav walker.
 */
if (! class_exists('wp_bootstrap_navwalker')) {
    require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
}

if (! class_exists('Sigma_Custom_Walker_Nav_Menu')) {
    require_once(get_template_directory() . '/class-sigma-custom-walker-nav-menu.php');
}


// ACF Options Extended Start//	
if (function_exists('acf_add_options_page')) {

    acf_add_options_page();

    acf_add_options_sub_page('Common Header');
    acf_add_options_sub_page('Common Footer');
    acf_add_options_sub_page('Accessories Category Page');
    acf_add_options_sub_page('Camera Category Page');
    acf_add_options_sub_page('Lense Category Page');
    acf_add_options_sub_page('Cine Lenses Category Page');
    acf_add_options_sub_page('Lenses Category Product Details Page');
    acf_add_options_sub_page('After the sale/Lense loan');
}

// ACF Options Extended End//	


//Finding Youtube url in the post content//
function contains_youtube_url($content)
{
    $pattern = '/(https?:\/\/)?(www\.)?(youtube\.com|youtu\.?be)\/.+/';
    return preg_match($pattern, $content);
}

function enqueue_custom_scripts()
{
    wp_enqueue_script('custom-cart', get_template_directory_uri() . '/js/custom-cart.js', array('jquery'), null, true);
    wp_localize_script('custom-cart', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


// Handle AJAX request to remove a product from the cart
add_action('wp_ajax_remove_cart_item', 'remove_cart_item');
add_action('wp_ajax_nopriv_remove_cart_item', 'remove_cart_item');

function remove_cart_item()
{
    if (isset($_POST['product_id'])) {
        $cart_item_key = sanitize_text_field($_POST['product_id']);

        // Remove the item from the cart
        WC()->cart->remove_cart_item($cart_item_key);

        // Return success response
        wp_send_json_success(array('message' => 'Item removed'));
    }

    // Return error response if no product_id
    wp_send_json_error(array('message' => 'Product ID not provided'));
}

//Remove Default Breadcrumb From Woocommerce//
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

//Product Mount Attribute Showing By Call This Functions //
function populate_pa_mount_dropdown()
{
    $terms = get_terms(array(
        'taxonomy' => 'pa_mount',
        'hide_empty' => false,
    ));

    if (!empty($terms) && !is_wp_error($terms)) {
        echo '<label>DSLR mount</label>';
        echo '<select name="filter_attribute" class="form-select form__control">';
        echo '<option value="">Choose option</option>';
        foreach ($terms as $term) {

            echo '<option value="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</option>';
        }
        echo '</select>';
    } else {
        echo '<label>DSLR mount</label>';
        echo '<select name="filter_attribute" class="form-select form__control">';
        echo '<option value="">No options available</option>';
        echo '</select>';
    }
}

//Adding Gtag Script//
function gtag_script()
{
?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-377WJJ56X1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-377WJJ56X1');
    </script>
<?php
}
add_filter('wpcf7_form_elements', function ($content) {
    return str_replace('<br />', '', $content); // Remove <br /> tags
});


function custom_manage_points_and_membership_menu()
{
    // Parent Menu: Points Management
    add_menu_page(
        __('Membership & Rewards', 'woocommerce'),
        __('Membership & Rewards', 'woocommerce'),
        'manage_options',
        'points-management',
        'render_manage_points_table', // Optional: can be one of your tab views or a dashboard
        'dashicons-awards',
        26
    );

    // Submenu: Assign Points by Event under Manage Points
    add_submenu_page(
        'points-management',
        __('Add Code to User', 'woocommerce'),
        __('Add Point Code', 'woocommerce'),
        'manage_options',
        'manage-points-event',
        'render_points_by_event'
    );


    // Submenu: Manage Points under Membership & Rewards
    add_submenu_page(
        'points-management', // Parent menu slug
        __('Assigned Code to User', 'woocommerce'), // Page title
        __('Assigned Code', 'woocommerce'), // Menu title
        'manage_options', // Capability required
        'manage-points', // Slug for the submenu page
        'render_manage_points_table' // Callback function for this submenu page
    );



    // Submenu: Point Log
    add_submenu_page(
        'points-management',
        __('Point Log', 'woocommerce'),
        __('Point Log', 'woocommerce'),
        'manage_options',
        'manage-points-log',
        'render_points_log'
    );

    add_submenu_page(
        'points-management',
        __('User Log', 'woocommerce'),
        __('User Log', 'woocommerce'),
        'manage_options',
        'manage-user-log',
        'user_points_log'
    );

    // Submenu: Manage Membership
    add_submenu_page(
        'points-management',
        __('Manage Membership', 'woocommerce'),
        __('Manage Membership', 'woocommerce'),
        'manage_options',
        'manage-membership',
        'render_manage_membership_table'
    );
    // add_submenu_page(
    //     'edit.php?post_type=loyalty_products', // Parent slug (CPT menu)
    //     'Products Loyalty Points',             // Page title
    //     'Products Loyalty Points',             // Menu title
    //     'manage_options',                      // Capability
    //     'products-loyalty-points',             // Menu slug
    //     'render_loyalty_points_page'           // Callback function
    // );

    // Submenu: Product Model Points
    // add_submenu_page(
    //     'points-management',
    //     __('Points To Product Model', 'woocommerce'),
    //     __('Points To Product Model', 'woocommerce'),
    //     'manage_options',
    //     'product-model-points',
    //     'render_model_points_page'
    // );

    // Submenu: Referral  Points
    add_submenu_page(
        null,
        __('Points To Referral', 'woocommerce'),
        __('Points To Referral', 'woocommerce'),
        'manage_options',
        'product_referral_points',
        'render_product_referral_points_data'
    );
    add_submenu_page(
        'points-management',
        __('Manage Points To Referral', 'woocommerce'),
        __('Manage Points To Referral', 'woocommerce'),
        'manage_options',
        'manage_referral_points',
        'render_manage_referral_points_data'
    );
}

add_action('admin_menu', 'custom_manage_points_and_membership_menu');

add_action('admin_menu', function () {
    remove_submenu_page('points-management', 'points-management');
}, 999);
add_filter('nav_menu_link_attributes', 'custom_replace_href_for_void_menu_items', 10, 3);

function custom_replace_href_for_void_menu_items($atts, $item, $args)
{

    if ($args->theme_location === 'newprimary') {
        $void_titles = ['Products', 'Made In Aizu', 'Inspiration'];

        if (in_array($item->title, $void_titles) && isset($atts['href']) && $atts['href'] === '#') {
            $atts['href'] = 'javascript:void(0);';
        }
    }

    return $atts;
}


// Add new column for Loyalty Points
add_filter('manage_loyalty_products_posts_columns', 'add_loyalty_points_column');
function add_loyalty_points_column($columns)
{
    $new_columns = [];

    foreach ($columns as $key => $value) {

        if ($key === 'date') {
            $new_columns['loyalty_points'] = 'Loyalty Points';
        }

        $new_columns[$key] = $value;
    }

    return $new_columns;
}

// Populate the column with ACF field value
add_action('manage_loyalty_products_posts_custom_column', 'show_loyalty_points_column', 10, 2);
function show_loyalty_points_column($column, $post_id)
{
    if ($column === 'loyalty_points') {
        $points = get_field('loyalty_points', $post_id);
        echo $points !== false ? esc_html($points) : '—';
    }
}

function render_product_referral_points_data()
{
    global $wpdb;

    $points_log_table = $wpdb->prefix . 'points_log';

    $user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

    // Build the query
    $where = "WHERE reson LIKE '%Referr%'";
    if ($user_id > 0) {
        $where .= " AND user_id = $user_id";
    }

    $logs = $wpdb->get_results("
        SELECT * FROM $points_log_table 
        $where 
        ORDER BY created_at DESC
    ");

    echo '<div class="wrap">';
    echo '<h2>Referral Bonus Points</h2>';

    if (empty($logs)) {
        echo '<p>No referral points found for this user.</p>';
        echo '</div>';
        return;
    }

    echo '<table class="table table-striped" id="referral_log" style="width:100%">';
    echo '<thead>
        <tr style="background: #f0f0f0;">
            <th>Name</th>
            <th>Email</th>
            <th>Points</th>
            <th>Referral Code</th>
            <th>Date</th>
        </tr>
    </thead><tbody>';

    foreach ($logs as $log) {
        $user = get_userdata($log->user_id);
        if (!$user) continue;

        $user_name = $user->display_name;
        $user_email = $user->user_email;
        $referral_code = get_user_meta($log->user_id, 'referral_code', true);
        $used_referral_code = get_user_meta($log->user_id, 'used_referral_code', true);
        if (!empty($used_referral_code)) {
            $display_code = $used_referral_code;  // They used someone else's code
        } else {
            $display_code = $referral_code; // Otherwise, show their own referral code
        }
        $date = date('Y-m-d H:i:s', strtotime($log->created_at));

        echo '<tr>
            <td>' . esc_html($user_name) . '</td>
            <td>' . esc_html($user_email) . '</td>
            <td>' . intval($log->points) . '</td>
            <td>' . esc_html($display_code) . '</td>
            <td>' . esc_html($date) . '</td>
        </tr>';
    }

    echo '</tbody></table>';
    echo '</div>';
?>
    <script>
        jQuery(document).ready(function($) {
            $('#referral_log').DataTable();
        });
    </script>
<?php
}

//loyalty products

function render_loyalty_points_page()
{
?>
    <div class="wrap">
        <h1>Products Loyalty Points</h1>
        <p>Here you can manage loyalty points for your products.</p>
        <!-- Add your custom content/form/table here -->
    </div>
<?php
}

function render_manage_referral_points_data()
{

    if (isset($_POST['referral_points_settings_submit'])) {
        check_admin_referer('save_referral_points_settings');

        if (isset($_POST['existing_user_points'])) {
            update_option('existing_user_points', intval($_POST['existing_user_points']));
        }

        if (isset($_POST['new_user_points'])) {
            update_option('new_user_points', intval($_POST['new_user_points']));
        }

        echo '<div class="updated"><p>Settings saved.</p></div>';
    }


    $existing_points = get_option('existing_user_points', 0);
    $new_points = get_option('new_user_points', 0);
?>
    <div class="wrap">
        <h1>Referral Points Settings</h1>
        <form method="post">
            <?php wp_nonce_field('save_referral_points_settings'); ?>
            <style>
                .referral-points-fields {
                    margin-top: 15px;
                    padding: 15px;
                    background: #f9f9f9;
                    border: 1px solid #ddd;
                    border-radius: 6px;
                    max-width: 500px;
                }

                .referral-points-fields p {
                    margin-bottom: 15px;
                }

                .referral-points-fields label {
                    display: block;
                    font-weight: 600;
                    margin-bottom: 5px;
                }

                .referral-points-fields input[type="number"] {
                    width: 100%;
                    padding: 8px;
                    font-size: 14px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                }
            </style>
            <div class="referral-points-fields">
                <p>
                    <label for="existing_user_points">Referral Points for Existing User:</label>
                    <input type="number" id="existing_user_points" name="existing_user_points" value="<?php echo esc_attr($existing_points); ?>" min="0" step="1" />
                </p>
                <p>
                    <label for="new_user_points">Referral Points for New User:</label>
                    <input type="number" id="new_user_points" name="new_user_points" value="<?php echo esc_attr($new_points); ?>" min="0" step="1" />
                </p>
            </div>
            <p>
                <input type="submit" name="referral_points_settings_submit" class="button button-primary" value="Save Settings">
            </p>
        </form>
    </div>

<?php
}



// add menu for contact form7 data
add_action('admin_menu', 'contact_form7_data_menu');

function contact_form7_data_menu()
{
    // Parent Menu: Form Data
    add_menu_page(
        __('Form Data', 'woocommerce'),
        __('Form Data', 'woocommerce'),
        'manage_options',
        'form-data',
        'render_exchange_old_product_form_data',
        'dashicons-media-text',
        26
    );
    // Submenu: Excahnge old product form
    add_submenu_page(
        'form-data',
        __('Exchange Old Product Form Data', 'woocommerce'),
        __('Exchange Old Product Form Data', 'woocommerce'),
        'manage_options',
        'exchange_old_product_form',
        'render_exchange_old_product_form_data'
    );
    // Submenu: Excahnge old product form

    add_submenu_page(
        'form-data',
        __('Product Rental Form Data', 'woocommerce'),
        __('Product Rental Form Data', 'woocommerce'),
        'manage_options',
        'product_rental_from',
        'render_product_rental_form_data'
    );

    add_submenu_page(
        'form-data',
        __('Service Registration Form Data', 'woocommerce'),
        __('Service Registration Form Data', 'woocommerce'),
        'manage_options',
        'service_registration',
        'render_service_registration_form_data'
    );
}
add_action('admin_menu', function () {
    remove_submenu_page('form-data', 'form-data');
}, 999);
add_action('admin_menu', function () {
    add_menu_page(
        'Product Registration Logs',
        'Product Registrations',
        'manage_options',
        'product-registration-logs',
        'render_product_registration_logs_page',
        'dashicons-clipboard',
        26
    );
});
// Handle Excel export for product registration logs
function export_product_registration_logs_excel()
{
    if (!isset($_GET['export_excel']) || $_GET['export_excel'] !== '1' || !current_user_can('manage_options')) {
        return;
    }

    global $wpdb;
    $table = $wpdb->prefix . 'product_registration';

    // Get filter parameters
    $search = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';
    $from_date = isset($_GET['from_date']) ? sanitize_text_field($_GET['from_date']) : '';
    $to_date = isset($_GET['to_date']) ? sanitize_text_field($_GET['to_date']) : '';

    // Build WHERE clause
    $where_conditions = [];
    $where_values = [];

    if (!empty($search)) {
        $like = '%' . $wpdb->esc_like($search) . '%';
        $where_conditions[] = "(name LIKE %s OR email_address LIKE %s OR model LIKE %s OR serial_number LIKE %s OR dealers_name LIKE %s OR reason LIKE %s)";
        $where_values = array_merge($where_values, [$like, $like, $like, $like, $like, $like]);
    }

    if (!empty($from_date)) {
        $where_conditions[] = "DATE(created_at) >= %s";
        $where_values[] = $from_date;
    }

    if (!empty($to_date)) {
        $where_conditions[] = "DATE(created_at) <= %s";
        $where_values[] = $to_date;
    }

    $where = '';
    if (!empty($where_conditions)) {
        $where = 'WHERE ' . implode(' AND ', $where_conditions);
        if (!empty($where_values)) {
            $where = $wpdb->prepare($where, $where_values);
        }
    }

    // Get results
    $results = $wpdb->get_results("SELECT * FROM $table $where ORDER BY created_at DESC");

    // Set headers for Excel download (HTML format that Excel can open with colors)
    $filename = 'product_registration_logs_' . date('Y-m-d_His') . '.xls';
    header('Content-Type: application/vnd.ms-excel; charset=utf-8');
    header('Content-Disposition: attachment; filename=' . $filename);
    header('Pragma: no-cache');
    header('Expires: 0');

    // Start HTML output
    echo '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
    echo '<head>';
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
    echo '<!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>Product Registration Logs</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]-->';
    echo '</head>';
    echo '<body>';
    echo '<table border="1" cellpadding="5" cellspacing="0">';
    
    // Add header row
    echo '<tr style="background-color: #4472C4; color: #ffffff; font-weight: bold;">';
    echo '<th>Name</th>';
    echo '<th>Email Address</th>';
    echo '<th>Model</th>';
    echo '<th>Serial Number</th>';
    echo '<th>Vendor/Dealer</th>';
    echo '<th>Points Claimed</th>';
    echo '<th>Reason</th>';
    echo '<th>Date Created</th>';
    echo '</tr>';

    // Add data rows with conditional background color
    if ($results) {
        foreach ($results as $row) {
            $bg_color = ($row->commitment === 'Yes') ? '#d4edda' : '';
            $text_color = ($row->commitment === 'Yes') ? 'green' : 'red';
            
            echo '<tr style="background-color: ' . $bg_color . ';">';
            echo '<td>' . esc_html($row->name) . '</td>';
            echo '<td>' . esc_html($row->email_address) . '</td>';
            echo '<td>' . esc_html($row->model) . '</td>';
            echo '<td>' . esc_html($row->serial_number) . '</td>';
            echo '<td>' . esc_html($row->dealers_name) . '</td>';
            echo '<td style="color: ' . $text_color . '; font-weight: bold;">' . esc_html(ucfirst($row->commitment)) . '</td>';
            echo '<td>' . esc_html($row->reason) . '</td>';
            echo '<td>' . esc_html($row->created_at) . '</td>';
            echo '</tr>';
        }
    }

    echo '</table>';
    echo '</body>';
    echo '</html>';
    exit;
}
add_action('admin_init', 'export_product_registration_logs_excel');

function render_product_registration_logs_page()
{
    global $wpdb;

    $table = $wpdb->prefix . 'product_registration';
    $search = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';
    $from_date = isset($_GET['from_date']) ? sanitize_text_field($_GET['from_date']) : '';
    $to_date = isset($_GET['to_date']) ? sanitize_text_field($_GET['to_date']) : '';

    // Build WHERE clause
    $where_conditions = [];
    $where_values = [];

    if (!empty($search)) {
        $like = '%' . $wpdb->esc_like($search) . '%';
        $where_conditions[] = "(name LIKE %s OR email_address LIKE %s OR model LIKE %s OR serial_number LIKE %s OR dealers_name LIKE %s OR reason LIKE %s)";
        $where_values = array_merge($where_values, [$like, $like, $like, $like, $like, $like]);
    }

    if (!empty($from_date)) {
        $where_conditions[] = "DATE(created_at) >= %s";
        $where_values[] = $from_date;
    }

    if (!empty($to_date)) {
        $where_conditions[] = "DATE(created_at) <= %s";
        $where_values[] = $to_date;
    }

    $where = '';
    if (!empty($where_conditions)) {
        $where = 'WHERE ' . implode(' AND ', $where_conditions);
        if (!empty($where_values)) {
            $where = $wpdb->prepare($where, $where_values);
        }
    }

    $results = $wpdb->get_results("SELECT * FROM $table $where ORDER BY created_at DESC");

    // Build export URL
    $export_url = add_query_arg([
        'page' => 'product-registration-logs',
        'export_excel' => '1',
        's' => $search,
        'from_date' => $from_date,
        'to_date' => $to_date
    ], admin_url('admin.php'));

?>
    <div class="wrap">
        <h1>Product Registration Logs</h1>

        <form method="get" action="" style="margin: 20px 0; padding: 15px; background: #fff; border: 1px solid #ccd0d4; box-shadow: 0 1px 1px rgba(0,0,0,.04);">
            <input type="hidden" name="page" value="product-registration-logs">
            
            <div style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
                <div style="display: flex; align-items: center; gap: 5px;">
                    <label for="s" style="margin-right: 5px; font-weight: 600;">Search:</label>
                    <input type="text" id="s" name="s" value="<?php echo esc_attr($search); ?>" placeholder="Search..." style="width: 250px;">
                </div>
                
                <div style="display: flex; align-items: center; gap: 5px;">
                    <label for="from_date" style="margin-right: 5px; font-weight: 600;">From:</label>
                    <input type="date" id="from_date" name="from_date" value="<?php echo esc_attr($from_date); ?>" style="width: 150px;">
                </div>
                
                <div style="display: flex; align-items: center; gap: 5px;">
                    <label for="to_date" style="margin-right: 5px; font-weight: 600;">To:</label>
                    <input type="date" id="to_date" name="to_date" value="<?php echo esc_attr($to_date); ?>" style="width: 150px;">
                </div>
                
                <div style="display: flex; align-items: center; gap: 10px; margin-left: auto;">
                    <input type="submit" class="button button-primary" value="Filter">
                    <a href="<?php echo esc_url($export_url); ?>" class="button button-secondary">
                        <span class="dashicons dashicons-download" style="vertical-align: middle; margin-top: 3px;"></span> Export to Excel
                    </a>
                    <?php if (!empty($search) || !empty($from_date) || !empty($to_date)): ?>
                        <a href="<?php echo admin_url('admin.php?page=product-registration-logs'); ?>" class="button">Clear Filters</a>
                    <?php endif; ?>
                </div>
            </div>
        </form>

        <table class="table table-striped" id="product_registration_log" style="width:100%">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Model</th>
                    <th>Serial No</th>
                    <th>Vendor</th>
                    <th>Points Claimed</th>
                    <th>Reason</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($results): ?>
                    <?php foreach ($results as $row): ?>
                        <tr style="background-color: <?= $row->commitment === 'Yes' ? '#d4edda' : ''; ?>">
                            <td>
                                <?= esc_html($row->name); ?><br>
                                <small><?= esc_html($row->email_address); ?></small>
                            </td>
                            <td><?= esc_html($row->model); ?></td>
                            <td><?= esc_html($row->serial_number); ?></td>
                            <td><?= esc_html($row->dealers_name); ?></td>
                            <td>
                                <strong style="color: <?= $row->commitment === 'Yes' ? 'green' : 'red'; ?>">
                                    <?= esc_html(ucfirst($row->commitment)); ?>
                                </strong>
                            </td>
                            <td><?= esc_html($row->reason); ?></td>
                            <td><?= esc_html($row->created_at); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No logs found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        jQuery(document).ready(function($) {
            $('#product_registration_log').DataTable({
                pageLength: 25,
                order: [
                    [6, 'desc']
                ],
            });
        });
    </script>
<?php
}



function render_exchange_old_product_form_data() {
    if (!class_exists('Flamingo_Inbound_Message')) {
        echo '<p style="color:red;">Flamingo plugin is not active.</p>';
        return;
    }

    $messages = get_posts([
        'post_type'      => 'flamingo_inbound',
        'posts_per_page' => 50,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);

    if (empty($messages)) {
        echo '<p>No submissions found.</p>';
        return;
    }

    echo '<div class="exchange-table-wrapper" style="overflow-x:auto;">';
    echo '<table class="exchange-table" border="1" cellpadding="10" cellspacing="0" style="width:100%; border-collapse: collapse;">';
    echo '<thead>
            <tr style="background:#f5f5f5;">
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Product Name</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
          </thead>';
    echo '<tbody>';

    $i = 1;
    foreach ($messages as $message) {
        $meta_raw = get_post_meta($message->ID, '_meta', true);
        $meta = is_serialized($meta_raw) ? maybe_unserialize($meta_raw) : $meta_raw;

        // Filter by form page URL
        if (empty($meta['url']) || strpos($meta['url'], 'exchange-old-product') === false) {
            continue;
        }

        // Pull individual fields
        $name    = get_post_meta($message->ID, '_field_your-name', true);
        $email   = get_post_meta($message->ID, '_field_your-email', true);
        $number  = get_post_meta($message->ID, '_field_your-number', true);
        $product = get_post_meta($message->ID, '_field_exchange-product-name', true);
        $msg     = get_post_meta($message->ID, '_field_your-message', true);

        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . esc_html($name ?: '-') . '</td>';
        echo '<td>' . esc_html($email ?: '-') . '</td>';
        echo '<td>' . esc_html($number ?: '-') . '</td>';
        echo '<td>' . esc_html($product ?: '-') . '</td>';
        echo '<td>' . esc_html($msg ?: '-') . '</td>';
        echo '<td>' . get_the_date('Y-m-d H:i', $message) . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}



function render_product_rental_form_data() {
    if (!class_exists('Flamingo_Inbound_Message')) {
        echo '<p style="color:red;">Flamingo plugin is not active.</p>';
        return;
    }

    $messages = get_posts([
        'post_type'      => 'flamingo_inbound',
        'posts_per_page' => 50,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);

    if (empty($messages)) {
        echo '<p>No submissions found.</p>';
        return;
    }

    echo '<div class="rental-table-wrapper" style="overflow-x:auto;">';
    echo '<table class="rental-table" border="1" cellpadding="10" cellspacing="0" style="width:100%; border-collapse: collapse;">';
    echo '<thead>
            <tr style="background:#f5f5f5;">
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Product Name</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
          </thead>';
    echo '<tbody>';

    $i = 1;
    foreach ($messages as $message) {
        $meta_raw = get_post_meta($message->ID, '_meta', true);
        $meta = is_serialized($meta_raw) ? maybe_unserialize($meta_raw) : $meta_raw;

        if (empty($meta['url']) || strpos($meta['url'], 'product-rental') === false) {
            continue;
        }

        $name    = get_post_meta($message->ID, '_field_your-name', true);
        $email   = get_post_meta($message->ID, '_field_your-email', true);
        $number  = get_post_meta($message->ID, '_field_your-number', true);
        $product = get_post_meta($message->ID, '_field_product-name', true);
        $msg     = get_post_meta($message->ID, '_field_your-message', true);

        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . esc_html($name ?: '-') . '</td>';
        echo '<td>' . esc_html($email ?: '-') . '</td>';
        echo '<td>' . esc_html($number ?: '-') . '</td>';
        echo '<td>' . esc_html($product ?: '-') . '</td>';
        echo '<td>' . esc_html($msg ?: '-') . '</td>';
        echo '<td>' . get_the_date('Y-m-d H:i', $message) . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}


function render_service_registration_form_data()
{
    if (!class_exists('Flamingo_Inbound_Message')) {
        echo '<p style="color:red;">Flamingo plugin is not active.</p>';
        return;
    }

    $messages = get_posts([
        'post_type'      => 'flamingo_inbound',
        'posts_per_page' => 50,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);

    if (empty($messages)) {
        echo '<p>No submissions found.</p>';
        return;
    }

    echo '<div class="rental-table-wrapper" style="overflow-x:auto;">';
    echo '<table class="rental-table" border="1" cellpadding="10" cellspacing="0" style="width:100%; border-collapse: collapse;">';
    echo '<thead>
            <tr style="background:#f5f5f5;">
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
          </thead>';
    echo '<tbody>';

    $i = 1;
    foreach ($messages as $message) {
        $meta_raw = get_post_meta($message->ID, '_meta', true);
        $meta = is_serialized($meta_raw) ? maybe_unserialize($meta_raw) : $meta_raw;

        // Filter only for submissions from the service-registration page
        if (empty($meta['url']) || strpos($meta['url'], 'service-registration') === false) {
            continue;
        }

        $name    = get_post_meta($message->ID, '_field_your-name', true);
        $email   = get_post_meta($message->ID, '_field_your-email', true);
        $number  = get_post_meta($message->ID, '_field_your-number', true);
        $product = get_post_meta($message->ID, '_field_your-subject', true);
        $msg     = get_post_meta($message->ID, '_field_your-message', true);

        echo '<tr>';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . esc_html($name ?: '-') . '</td>';
        echo '<td>' . esc_html($email ?: '-') . '</td>';
        echo '<td>' . esc_html($number ?: '-') . '</td>';
        echo '<td>' . esc_html($product ?: '-') . '</td>';
        echo '<td>' . esc_html($msg ?: '-') . '</td>';
        echo '<td>' . get_the_date('Y-m-d H:i', $message) . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}


// Add image upload field to Add term screen
function add_popular_categories_image_field()
{
?>
    <div class="form-field term-group">
        <label for="popular_categories_image"><?php _e('Thumbnail Image', 'textdomain'); ?></label>
        <input type="text" id="popular_categories_image" name="popular_categories_image" value="">
        <button class="upload_image_button button"><?php _e('Upload/Add Image', 'textdomain'); ?></button>
    </div>
<?php
}
add_action('popular_categories_add_form_fields', 'add_popular_categories_image_field', 10, 2);

// Add image field to Edit term screen
function edit_popular_categories_image_field($term)
{
    $image_id = get_term_meta($term->term_id, 'popular_categories_image', true);
?>
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="popular_categories_image"><?php _e('Thumbnail Image', 'textdomain'); ?></label></th>
        <td>
            <input type="text" id="popular_categories_image" name="popular_categories_image" value="<?php echo esc_attr($image_id); ?>">
            <button class="upload_image_button button"><?php _e('Upload/Add Image', 'textdomain'); ?></button>
        </td>
    </tr>
<?php
}
add_action('popular_categories_edit_form_fields', 'edit_popular_categories_image_field', 10);

function save_popular_categories_image($term_id)
{
    if (isset($_POST['popular_categories_image'])) {
        update_term_meta($term_id, 'popular_categories_image', sanitize_text_field($_POST['popular_categories_image']));
    }
}
add_action('created_popular_categories', 'save_popular_categories_image', 10);
add_action('edited_popular_categories', 'save_popular_categories_image', 10);



// Enqueue scripts and localize user data
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_scripts');
function enqueue_custom_admin_scripts()
{

    // Get user data
    $users = get_users(['fields' => ['ID', 'display_name']]);

    // Localize script to pass user data to JavaScript
    wp_localize_script('manage-points-script', 'managePointsData', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'users' => $users
    ));
    if (isset($_GET['taxonomy']) && $_GET['taxonomy'] === 'popular_categories') {
        wp_enqueue_media(); // Enqueue WordPress media uploader

        // Add custom script inline or enqueued properly
        wp_add_inline_script('jquery', '
            jQuery(document).ready(function($){
                var mediaUploader;
                $(document).on("click", ".upload_image_button", function(e){
                    e.preventDefault();
                    var button = $(this);
                    if (mediaUploader) {
                        mediaUploader.open();
                        return;
                    }
                    mediaUploader = wp.media({
                        title: "Select Image",
                        button: { text: "Use this image" },
                        multiple: false
                    });
                    mediaUploader.on("select", function(){
                        var attachment = mediaUploader.state().get("selection").first().toJSON();
                        button.prev("input").val(attachment.id);
                    });
                    mediaUploader.open();
                });
            });
        ');
    }
}

add_action('wp_ajax_get_events_by_category', 'get_events_by_category_callback');
add_action('wp_ajax_nopriv_get_events_by_category', 'get_events_by_category_callback'); // For non-logged-in users

function get_events_by_category_callback()
{
    // Check if the category ID is set
    if (!isset($_POST['cat_id'])) {
        wp_send_json_error(['message' => 'Category ID missing']);
        return;
    }

    $cat_id = intval($_POST['cat_id']);  // Sanitize the category ID

    // Get events in the selected category
    $events = get_posts([
        'post_type' => 'tribe_events',  // Assuming you're using the Events plugin
        'tax_query' => [
            [
                'taxonomy' => 'tribe_events_cat',
                'terms' => $cat_id,
                'field' => 'term_id',
                'operator' => 'IN',
            ],
        ],
    ]);

    if ($events) {
        $output = '<option value="">Select Event</option>';
        foreach ($events as $event) {
            $output .= '<option value="' . esc_attr($event->ID) . '">' . esc_html($event->post_title) . '</option>';
        }
        wp_send_json_success($output);
    } else {
        wp_send_json_error(['message' => 'No events found']);
    }

    wp_die();  // Terminate the AJAX request
}

function get_valid_points_for_user($user_id)
{
    global $wpdb;

    $table = $wpdb->prefix . 'points_log';

    $today = current_time('Y-m-d');

    // Fetch the total and used points which are still valid (not expired)
    $results = $wpdb->get_row(
        $wpdb->prepare(
            "SELECT 
                SUM(cutoff_points) AS total_used_points,
                SUM(
                    CASE 
                        WHEN expiry_date >= %s AND cutoff_points < points
                        THEN points - cutoff_points
                        ELSE 0 
                    END
                ) AS available_points
             FROM {$wpdb->prefix}points_log
             WHERE user_id = %d",
            $today,
            $user_id
        ),
        ARRAY_A
    );

    $used_points = isset($results['total_used_points']) ? (int) $results['total_used_points'] : 0;

    $available_point = isset($results['available_points']) ? (int) $results['available_points'] : 0;
    $available_points = max(0, $available_point - $used_points);

    return $available_points;
}

function update_user_membership_tier($user_id)
{

    $available_points = get_valid_points_for_user($user_id); // ✅ new logic here

    $tier_args = [
        'post_type'      => 'membership_tier',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'meta_key'       => 'points_from',
        'orderby'        => 'meta_value_num',
        'order'          => 'ASC',
    ];

    $tier_query = new WP_Query($tier_args);


    $matched_tier_id = null;

    if ($tier_query->have_posts()) {
        while ($tier_query->have_posts()) {
            $tier_query->the_post();
            $tier_id     = get_the_ID();
            $points_from = (int) get_post_meta($tier_id, 'points_from', true);
            $points_to   = (int) get_post_meta($tier_id, 'points_to', true);


            if ($available_points >= $points_from && $available_points <= $points_to) {
                $matched_tier_id = $tier_id;

                break;
            }
        }
        wp_reset_postdata();
    }

    if ($matched_tier_id) {
        update_user_meta($user_id, 'assigned_membership_tier', $matched_tier_id);

        $assigned_date = current_time('Y-m-d');
        update_user_meta($user_id, 'membership_assigned_date', $assigned_date);

        $validity_days = intval(get_post_meta($matched_tier_id, 'validity_months', true)); // validity is in days
        $expiry_date = date('Y-m-d', strtotime("+$validity_days days", strtotime($assigned_date)));
        update_user_meta($user_id, 'membership_expiry_date', $expiry_date);
        return $matched_tier_id;
    }
}


function render_points_log()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'points_log';
    $search = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

    // WHERE clause
    $where = '';
    if (!empty($search)) {
        $where = $wpdb->prepare("WHERE user_id LIKE %s OR reason LIKE %s", '%' . $search . '%', '%' . $search . '%');
    }

    // Fetch all logs
    $results = $wpdb->get_results("SELECT * FROM $table_name $where ORDER BY created_at DESC");

    // Group by user_id
    $grouped = [];
    foreach ($results as $row) {
        // Skip gift-related rows (e.g., if reason contains "Gift purchase")
        if (stripos($row->reson, 'gift') !== false) {
            continue;
        }

        $grouped[$row->user_id][] = $row;
    }
?>
    <style>
        .user-detail-row {
            background: #f9f9f9;
        }
    </style>
    <div class="wrap">
        <h1>Points Log</h1>
        <table class="widefat fixed striped" id="grouped-points-log">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Total Earned Points</th>
                    <th>Total Redeemed Points</th>
                    <th>Membership Tier</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($grouped as $user_id => $logs): ?>
                    <?php
                    $user = get_userdata($user_id);
                    if (!$user) continue;

                    $total_earned = 0;
                    $total_redeemed = 0;

                    foreach ($logs as $log) {
                        if ((int) $log->points > 0) {
                            $total_earned += (int) $log->points;
                        } else {
                            $total_redeemed += abs((int) $log->points);
                        }
                    }

                    // Get membership tier post title
                    $tier_name = '';
                    if (!empty($logs[0]->membership_tier_id)) {
                        $tier = get_post($logs[0]->membership_tier_id);
                        $tier_name = $tier ? $tier->post_title : '';
                    }

                    ?>
                    <tr class="user-summary-row" data-user-id="<?php echo esc_attr($user_id); ?>">
                        <td><strong><?php echo esc_html($user->display_name . " (#$user_id)"); ?></strong></td>
                        <td><?php echo $total_earned; ?></td>
                        <td><?php echo $total_redeemed; ?></td>
                        <td><?php echo esc_html($tier_name); ?></td>
                        <td><button class="toggle-details button">View Details</button></td>
                    </tr>

                    <!-- Hidden Detail Rows -->
                    <?php foreach ($logs as $log): ?>
                        <tr class="user-detail-row user-<?php echo esc_attr($user_id); ?>" style="display:none;">
                            <td colspan="2">
                                <strong>Reason:</strong> <?php echo esc_html($log->reson); ?><br>
                                <strong>Cutoff Points:</strong> <?php echo !empty($log->cutoff_points) ? esc_html($log->cutoff_points) : '--'; ?>
                            </td>
                            <td><?php echo intval($log->points); ?></td>
                            <td><?php echo esc_html(date('Y-m-d H:i', strtotime($log->created_at))); ?></td>
                            <td>
                                <a href="<?php echo admin_url('admin.php?page=product_referral_points&user_id=' . $user_id); ?>" class="button">
                                    View Referral Points
                                </a>
                                <button class="button delete-points-record" 
                                        data-user-id="<?php echo esc_attr($log->user_id); ?>"
                                        data-points="<?php echo esc_attr($log->points); ?>"
                                        data-product-name="<?php echo esc_attr(!empty($log->product_name) ? $log->product_name : 'N/A'); ?>"
                                        data-log-id="<?php echo esc_attr(isset($log->id) ? $log->id : ''); ?>"
                                        data-serial-no="<?php echo esc_attr(!empty($log->serial_no) ? $log->serial_no : ''); ?>"
                                        data-reason="<?php echo esc_attr($log->reson); ?>">
                                    Delete Record
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        jQuery(document).ready(function($) {
            $('.toggle-details').on('click', function() {
                const row = $(this).closest('tr');
                const userId = row.data('user-id');
                $('.user-' + userId).toggle();
            });
            
            // Handle delete button click
            $('.delete-points-record').on('click', function(e) {
                e.preventDefault();
                
                const $button = $(this);
                const userId = $button.data('user-id');
                const points = $button.data('points');
                const productName = $button.data('product-name');
                const reason = $button.data('reason');
                const serialNo = $button.data('serial-no');
                const logId = $button.data('log-id');
                
                // Show confirmation dialog with details
                const confirmMessage = 'Are you sure you want to delete this record?\n\n' +
                    'Product Name: ' + productName + '\n' +
                    'User ID: ' + userId + '\n' +
                    'Points: ' + points + '\n' +
                    'Reason: ' + reason + 
                    (serialNo ? '\nSerial No: ' + serialNo : '');
                
                if (!confirm(confirmMessage)) {
                    return;
                }
                
                // Disable button during processing
                $button.prop('disabled', true).text('Deleting...');
                
                // Make AJAX call
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'delete_points_log_record',
                        user_id: userId,
                        points: points,
                        serial_no: serialNo,
                        log_id: logId,
                        nonce: '<?php echo wp_create_nonce("delete_points_log_nonce"); ?>'
                    },
                    success: function(response) {
                        if (response.success) {
                            // Remove the row from table
                            $button.closest('tr').fadeOut(300, function() {
                                $(this).remove();
                            });
                            alert('Record deleted successfully.');
                        } else {
                            alert('Error: ' + (response.data && response.data.message ? response.data.message : 'Failed to delete record'));
                            $button.prop('disabled', false).text('Delete Record');
                        }
                    },
                    error: function() {
                        alert('An error occurred while deleting the record.');
                        $button.prop('disabled', false).text('Delete Record');
                    }
                });
            });
        });
    </script>


<?php
}



function render_manage_points_table()
{
    $search = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

    $meta_query = [];
    if ($search) {
        $meta_query['relation'] = 'OR';
        $meta_query[] = [
            'key' => 'user_id',
            'value' => $search,
            'compare' => 'LIKE'
        ];
    }

    $args = [
        'post_type' => 'user_event_point',
        'posts_per_page' => -1, // get all posts
        'post_status' => 'publish',
        'meta_query' => $meta_query
    ];

    $query = new WP_Query($args);

?>

    <div class="wrap">
        <h2>Assigned Points by Event</h2>
        <table class="table table-striped" id="points_event" style="width:100%">
            <thead>
                <tr>
                    <th>UserID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Event Category</th>
                    <th>Event</th>
                    <th>Rank</th>
                    <th>Points</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        $user_id = get_post_meta(get_the_ID(), 'user_id', true);
                        $event_id = get_post_meta(get_the_ID(), 'event_id', true);
                        $rank = get_post_meta(get_the_ID(), 'rank', true);
                        $points = get_post_meta(get_the_ID(), 'points', true);
                        $event_cats = get_the_terms($event_id, 'tribe_events_cat');
                        $event_cat_name = $event_cats && !is_wp_error($event_cats) ? $event_cats[0]->name : '—';
                        $name = $user_id ? esc_html(get_the_author_meta('display_name', $user_id)) : '—';
                        $email = $user_id ? esc_html(get_the_author_meta('email', $user_id)) : '—';

                        echo '<tr>';
                        echo '<td>' . esc_html($user_id) . '</td>';
                        echo '<td>' . $name . '</td>';
                        echo '<td>' . $email . '</td>';
                        echo '<td>' . esc_html($event_cat_name) . '</td>';
                        echo '<td>' . esc_html(get_the_title($event_id)) . '</td>';
                        echo '<td>' . esc_html($rank) . '</td>';
                        echo '<td>' . esc_html($points) . '</td>';
                        echo '<td>' . esc_html(get_the_date('', get_the_ID())) . '</td>';
                        echo '</tr>';
                    endwhile;
                else : ?>
                    <tr>
                        <td colspan="8"><?php _e('No data found.', 'your-textdomain'); ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        jQuery(document).ready(function($) {
            $('#points_event').DataTable();
        });
    </script>

<?php
    wp_reset_postdata();
}

function render_points_by_event()
{
    $users = get_users(['fields' => ['ID', 'display_name']]);
    $event_categories = get_terms([
        'taxonomy' => 'tribe_events_cat',
        'hide_empty' => false
    ]);

    // Check for success/error messages
    $success_message = '';
    $error_message = '';

    if (isset($_GET['success']) && $_GET['success'] == '1') {
        $success_count = isset($_GET['count']) ? intval($_GET['count']) : 0;
        $success_message = "Successfully assigned points to {$success_count} user(s)!";
    }

    if (isset($_GET['error']) && $_GET['error'] == '1') {
        $error_message = isset($_GET['msg']) ? urldecode($_GET['msg']) : 'An error occurred while processing your request.';
    }
?>
    <div class="wrap">
        <h2>Assign Point Code</h2>

        <?php if ($success_message): ?>
            <div class="notice notice-success is-dismissible">
                <p><?php echo esc_html($success_message); ?></p>
            </div>
        <?php endif; ?>

        <?php if ($error_message): ?>
            <div class="notice notice-error is-dismissible">
                <p><?php echo esc_html($error_message); ?></p>
            </div>
        <?php endif; ?>

        <form method="post" id="manage-points-form">
            <?php wp_nonce_field('save_points_nonce', 'save_points'); ?>

            <label><strong>Activity Type:</strong></label>
            <select id="activity-type-selector" required>
                <option value="">Select One</option>
                <option value="Participation Type">Participation Type</option>
                <option value="Bonus Activity">Bonus Activity</option>
            </select>

            <div id="participation-type-wrapper" style="display:none; margin-top:15px;">
                <label><strong>Participation Type:</strong></label>
                <select id="event-cat-selector">
                    <option value="">Select Category</option>
                    <?php foreach ($event_categories as $cat): ?>
                        <option value="<?= esc_attr($cat->term_id); ?>"><?= esc_html($cat->name); ?></option>
                    <?php endforeach; ?>
                </select>

                <label><strong>Event:</strong></label>
                <select id="event-selector" name="selected_event_id">
                    <option value="">Select Event</option>
                </select>
            </div>

            <div id="bonus-activity-wrapper" style="display:none; margin-top:15px;">
                <label><strong>Bonus Activity:</strong></label>
                <select id="bonus-activity-selector">
                    <option value="">Select One</option>
                    <option value="Referral Bonus">Referral Bonus</option>
                    <option value="Social Media Engagement">Social Media Engagement</option>
                    <option value="Product Review">Product Review</option>
                </select>
            </div>

            <div id="point-entry-wrapper" style="display:none; margin-top:20px;">
                <h3>Assign Points</h3>
                <div id="points-repeater"></div>
                <button type="button" id="add-row" class="button">Add User/Rank/Points</button>
            </div>

            <p style="margin-top: 20px;"><button type="submit" class="button button-primary">Save</button></p>
        </form>
    </div>

    <script>
        jQuery(function($) {
            const users = <?php echo json_encode($users); ?>;
            let rowCount = 0;

            // Handle Activity Type selection
            $('#activity-type-selector').on('change', function() {
                const selectedType = $(this).val();

                // Hide all wrappers first
                $('#participation-type-wrapper, #bonus-activity-wrapper, #point-entry-wrapper').hide();

                if (selectedType === 'Participation Type') {
                    $('#participation-type-wrapper').slideDown();
                } else if (selectedType === 'Bonus Activity') {
                    $('#bonus-activity-wrapper').slideDown();
                }
            });

            // Handle Event Category selection (for Participation Type)
            $('#event-cat-selector').on('change', function() {
                const catId = $(this).val();
                $('#event-selector').html('<option>Loading...</option>');
                $.post(ajaxurl, {
                    action: 'get_events_by_category',
                    cat_id: catId
                }, function(res) {
                    if (res.success) {
                        $('#event-selector').html(res.data);
                    } else {
                        $('#event-selector').html('<option value="">No events found</option>');
                    }
                });
            });

            // Handle Event selection (for Participation Type)
            $('#event-selector').on('change', function() {
                if ($(this).val()) {
                    $('#point-entry-wrapper').slideDown();
                    $('#points-repeater').html('');
                    rowCount = 0;
                    $('#add-row').trigger('click');
                } else {
                    $('#point-entry-wrapper').hide();
                }
            });

            // Handle Bonus Activity selection
            $('#bonus-activity-selector').on('change', function() {
                if ($(this).val()) {
                    $('#point-entry-wrapper').slideDown();
                    $('#points-repeater').html('');
                    rowCount = 0;
                    $('#add-row').trigger('click');
                } else {
                    $('#point-entry-wrapper').hide();
                }
            });

            // Function to generate random alphanumeric code
            function generateCode() {
                const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                let result = '';
                for (let i = 0; i < 8; i++) {
                    result += chars.charAt(Math.floor(Math.random() * chars.length));
                }
                return result;
            }

            $('#add-row').on('click', function() {
                let index = rowCount;
                let eventId = $('#event-selector').val() || 0; // Use 0 for bonus activities
                let bonusActivity = $('#bonus-activity-selector').val() || '';
                let activityType = $('#activity-type-selector').val();
                let randomCode = generateCode();

                let rowHtml = `<div class="point-row" style="margin-bottom:15px; padding:10px; border:1px solid #ddd;">
                <label>User Type:</label>
                <select name="points[${index}][user_type]" class="user-type" data-index="${index}" required>
                    <option value="">Select Type</option>
                    <option value="existing">Existing</option>
                    <option value="new">New</option>
                </select>

                <div class="existing-user-wrapper" id="existing-${index}" style="display:none;">
                    <label>User:</label>
                    <select name="points[${index}][user_id]" required>
                        <option value="">Select User</option>`;
                users.forEach(user => {
                    rowHtml += `<option value="${user.ID}">${user.display_name}</option>`;
                });
                rowHtml += `</select>
                </div>

                <div class="new-user-wrapper" id="new-${index}" style="display:none;">
                    <label>User Email:</label>
                    <input type="email" name="points[${index}][user_email]" placeholder="Enter Email">
                </div>`;

                // Add rank field based on activity type
                if (activityType === 'Participation Type') {
                    rowHtml += `<label>Rank:</label>
                    <select name="points[${index}][rank]" required>
                        <option value="">Select Rank</option>
                        <option value="First">First</option>
                        <option value="Second">Second</option>
                        <option value="Third">Third</option>
                        <option value="Fourth">Fourth</option>
                        <option value="Fifth">Fifth</option>
                    </select>`;
                }

                rowHtml += `<label>Code:</label>
                <input type="text" name="points[${index}][code]" value="${randomCode}" readonly style="background-color: #f0f0f0;">

                <label>Points:</label>
                <input type="number" name="points[${index}][points]" required>

                <button type="button" class="button remove-row" style="background-color: #dc3545; color: white; margin-left: 10px;">Remove</button>

                <input type="hidden" name="points[${index}][event_id]" value="${eventId}">
                <input type="hidden" name="points[${index}][bonus_activity]" value="${bonusActivity}">
                <input type="hidden" name="points[${index}][activity_type]" value="${activityType}">
            </div>`;

                $('#points-repeater').append(rowHtml);
                rowCount++;
            });

            $(document).on('change', '.user-type', function() {
                const index = $(this).data('index');
                const selected = $(this).val();
                $(`#existing-${index}, #new-${index}`).hide().find('input, select').prop('required', false);

                if (selected === 'existing') {
                    $(`#existing-${index}`)
                        .css('display', 'inline-block')
                        .find('select').prop('required', true);
                } else if (selected === 'new') {
                    $(`#new-${index}`)
                        .css('display', 'inline-block')
                        .find('input').prop('required', true);
                }
            });

            // Remove row handler
            $(document).on('click', '.remove-row', function() {
                $(this).closest('.point-row').remove();
            });
        });
    </script>
<?php
}

add_action('admin_init', function () {
    global $wpdb;

    if (isset($_POST['save_points']) && wp_verify_nonce($_POST['save_points'], 'save_points_nonce')) {
        $points = $_POST['points'];
        $success_count = 0;
        $errors = [];

        foreach ($points as $entry) {
            $event_id = intval($entry['event_id']);
            $rank = isset($entry['rank']) ? sanitize_text_field($entry['rank']) : '';
            $point_val = intval($entry['points']);
            $bonus_activity = sanitize_text_field($entry['bonus_activity']);
            $activity_type = sanitize_text_field($entry['activity_type']);
            $code = sanitize_text_field($entry['code']);
            $user_id = 0;

            // 1. Handle User Type: Existing or New
            if ($entry['user_type'] === 'existing') {
                $user_id = intval($entry['user_id']);
            } elseif ($entry['user_type'] === 'new') {
                $email = sanitize_email($entry['user_email']);
                if (email_exists($email)) {
                    $user = get_user_by('email', $email);
                    $user_id = $user->ID;
                } else {
                    $user_id = wp_create_user($email, wp_generate_password(), $email);
                }
            }

            if (!$user_id) {
                $errors[] = "Invalid or missing user.";
                continue;
            }

            // 2. Check for duplicate rank for the same event/activity (only for participation type)
            if ($activity_type === 'Participation Type') {
                $existing_points = get_posts([
                    'post_type' => 'user_event_point',
                    'posts_per_page' => 1,
                    'meta_query' => [
                        'relation' => 'AND',
                        [
                            'key' => 'event_id',
                            'value' => $event_id,
                            'compare' => '='
                        ],
                        [
                            'key' => 'rank',
                            'value' => $rank,
                            'compare' => '='
                        ]
                    ]
                ]);

                if (!empty($existing_points)) {
                    $errors[] = "Rank '{$rank}' already assigned for this event.";
                    continue;
                }
            }

            // Check for duplicate code
            $existing_code = get_posts([
                'post_type' => 'user_event_point',
                'posts_per_page' => 1,
                'meta_query' => [
                    [
                        'key' => 'code',
                        'value' => $code,
                        'compare' => '='
                    ]
                ]
            ]);

            if (!empty($existing_code)) {
                $errors[] = "Code '{$code}' already exists. Please regenerate.";
                continue;
            }

            // 3. Insert user_event_point post
            $user = get_userdata($user_id);

            if ($activity_type === 'Participation Type') {
                $post_title = "{$user->user_login} - achieved {$rank} place in Event {$event_id} - Code: {$code}";
            } else {
                $post_title = "{$user->user_login} - {$bonus_activity} - Code: {$code}";
            }

            $meta_input = [
                'user_id' => $user_id,
                'points' => $point_val,
                'activity_type' => $activity_type,
                'code' => $code,
                'point_status' => 0
            ];

            if ($activity_type === 'Participation Type') {
                $meta_input['event_id'] = $event_id;
                $meta_input['rank'] = $rank;
            } else {
                $meta_input['bonus_activity'] = $bonus_activity;
            }

            $post_id = wp_insert_post([
                'post_type' => 'user_event_point',
                'post_status' => 'publish',
                'post_title' => $post_title,
                'meta_input' => $meta_input
            ]);

            if ($post_id && !is_wp_error($post_id)) {
                $success_count++;

                // 4. Insert into points_log table
                $reason = '';
                if ($activity_type === 'Participation Type') {
                    $reason = "Event Participation - Rank: {$rank}, Event ID: {$event_id}, Code: {$code}";
                } else {
                    $reason = "Bonus Activity: {$bonus_activity}, Code: {$code}";
                }
                // Calculate expiry date (1 year from now)
                $expiry_date = date('Y-m-d', strtotime('+1 year'));

                $log_inserted = $wpdb->insert(
                    $wpdb->prefix . 'points_log',
                    [
                        'user_id' => $user_id,
                        'points' => $point_val,
                        'reson' => $reason,
                        'expiry_date' => $expiry_date
                    ],
                    [
                        '%d', // user_id
                        '%d', // points
                        '%s',  // reson
                        '%s'
                    ]
                );

                if ($log_inserted === false) {
                    error_log("Failed to insert into points_log for user: {$user_id}, code: {$code}");
                }

                // Send email to user with the code
                $user = get_userdata($user_id);
                $user_email = $user->user_email;
                $user_name = $user->display_name;

                $subject = 'Points Code Assigned - Login to Redeem';

                $message = "Hi {$user_name},\n\n";
                $message .= "You have been assigned points for your activity!\n\n";
                $message .= "Your Code: {$code}\n\n";
                $message .= "Please use this code in your dashboard after login to get your assigned points.\n\n";
                $message .= "Points Value: {$point_val}\n";

                if ($activity_type === 'Participation Type') {
                    $message .= "Activity: Event Participation (Rank: {$rank})\n";
                } else {
                    $message .= "Activity: {$bonus_activity}\n";
                }

                $message .= "\nLogin to your dashboard to redeem your points.\n\n";
                $message .= "Best regards,\nThe Team";

                $headers = array('Content-Type: text/plain; charset=UTF-8');

                // Send email
                $mail_sent = wp_mail($user_email, $subject, $message, $headers);

                if (!$mail_sent) {
                    error_log("Failed to send email to user: {$user_email} for code: {$code}");
                }
            } else {
                $errors[] = "Failed to create point entry for user.";
            }
        }

        // Redirect with success or error messages
        $redirect_url = remove_query_arg(['success', 'error', 'count', 'msg']);

        if (!empty($errors)) {
            $error_msg = implode(' | ', $errors);
            $redirect_url = add_query_arg([
                'error' => '1',
                'msg' => urlencode($error_msg)
            ], $redirect_url);
        } elseif ($success_count > 0) {
            $redirect_url = add_query_arg([
                'success' => '1',
                'count' => $success_count
            ], $redirect_url);
        }

        wp_redirect($redirect_url);
        exit;
    }
});



// add_action('admin_init', function () {
//     if (
//         isset($_POST['save_points_product']) &&
//         wp_verify_nonce($_POST['save_points_product'], 'save_points_product_nonce')
//     ) {
//         $user_id = intval($_POST['user_id']);
//         $product_id = intval($_POST['product_id']);
//         $product_code = sanitize_text_field($_POST['product_code']);
//         $points = intval($_POST['points']);
//         $edit_post_id = intval($_POST['edit_post_id']);

//         $post_args = [
//             'post_type' => 'user_product_point',
//             'post_title' => "User $user_id Product Offline Product - $product_code",
//             'meta_input' => [
//                 'user_id' => $user_id,
//                 'product_id' => $product_id,
//                 'product_code' => $product_code,
//                 'points' => $points
//             ],
//         ];

//         if ($edit_post_id) {
//             $post_args['ID'] = $edit_post_id;
//             wp_update_post($post_args);
//         } else {
//             $post_args['post_status'] = 'publish';
//             wp_insert_post($post_args);
//         }

//         wp_redirect(admin_url('admin.php?page=manage-points-product')); // Change this slug
//         exit;
//     }
// });


// Showing total point to Users list

// Add new column to Users table
add_filter('manage_users_columns', function ($columns) {
    $columns['total_points'] = __('Total Points', 'your-textdomain');
    return $columns;
});

// Display content for the new column
add_filter('manage_users_custom_column', function ($value, $column_name, $user_id) {
    if ($column_name === 'total_points') {
        // Get total from event-based points
        // $event_args = [
        //     'post_type' => 'user_event_point',
        //     'post_status' => 'publish',
        //     'posts_per_page' => -1,
        //     'meta_query' => [[
        //         'key' => 'user_id',
        //         'value' => $user_id,
        //         'compare' => '='
        //     ]]
        // ];
        // $event_points = 0;
        // $event_posts = get_posts($event_args);
        // foreach ($event_posts as $post) {
        //     $event_points += intval(get_post_meta($post->ID, 'points', true));
        // }

        // // Get total from product-based points (if exists)
        // $product_args = [
        //     'post_type' => 'model_purchase_point',
        //     'post_status' => 'publish',
        //     'posts_per_page' => -1,
        //     'meta_query' => [[
        //         'key' => 'user_id',
        //         'value' => $user_id,
        //         'compare' => '='
        //     ]]
        // ];
        // $product_points = 0;
        // $product_posts = get_posts($product_args);
        // foreach ($product_posts as $post) {
        //     $product_points += intval(get_post_meta($post->ID, 'points', true));
        // }

        // $total_points = $event_points + $product_points;
        $total_points = get_valid_points_for_user($user_id);

        return $total_points;
    }
    return $value;
}, 10, 3);



function render_add_memebership()
{
    $edit_id = isset($_GET['edit_id']) ? intval($_GET['edit_id']) : 0;
    $is_edit = $edit_id > 0;

    $post_counts = wp_count_posts('membership_tier');
    $tier_count = isset($post_counts->publish) ? (int) $post_counts->publish : 0;

    // Load data for editing
    $tier_data = [
        'title' => '',
        'points_from' => '',
        'points_to' => '',
        'validity' => '',
        'gifting_products' => ''
    ];

    if ($is_edit) {
        $post = get_post($edit_id);
        if ($post && $post->post_type === 'membership_tier') {
            $tier_data['title'] = $post->post_title;
            $tier_data['points_from'] = get_post_meta($edit_id, 'points_from', true);
            $tier_data['points_to'] = get_post_meta($edit_id, 'points_to', true);
            $tier_data['validity'] = get_post_meta($edit_id, 'validity_months', true);
            $tier_data['gifting_products'] = get_post_meta($edit_id, 'gifting_products', true);
        } else {
            echo '<div class="notice notice-error"><p>Invalid Membership Tier ID.</p></div>';
            return;
        }
    }

    // Handle form submission
    if (
        isset($_POST['save_membership']) &&
        isset($_POST['save_membership_nonce']) &&
        wp_verify_nonce($_POST['save_membership_nonce'], 'save_membership_nonce')
    ) {
        $tier_name = sanitize_text_field($_POST['tier_name']);
        $points_from = intval($_POST['points_from']);
        $points_to = intval($_POST['points_to']);
        $validity = intval($_POST['validity']);
        $selected_gifting_products = isset($_POST['gifting_products']) ? array_map('intval', $_POST['gifting_products']) : [];

        $post_args = [
            'post_type'    => 'membership_tier',
            'post_title'   => $tier_name,
            'post_status'  => 'publish',
            'meta_input'   => [
                'points_from' => $points_from,
                'points_to' => $points_to,
                'validity_months' => $validity,
                'gifting_products' =>  $selected_gifting_products,
            ]
        ];

        if ($is_edit) {
            $post_args['ID'] = $edit_id;
            wp_update_post($post_args);
            update_post_meta($edit_id, 'benefits', $_POST['benefits']);
            echo '<div class="notice notice-success is-dismissible"><p>Membership Tier updated successfully.</p></div>';
            $users = get_users(['fields' => ['ID']]);
            foreach ($users as $user) {
                update_user_membership_tier($user->ID);
            }
        } else {
            if ($tier_count >= 3) {
                echo '<div class="notice notice-error is-dismissible"><p>You can only add up to 3 membership tiers.</p></div>';
            } else {
                $new_post_id = wp_insert_post($post_args);
                update_post_meta($new_post_id, 'benefits', $_POST['benefits']); // ✅ Add this line

                echo '<div class="notice notice-success is-dismissible"><p>Membership Tier saved successfully.</p></div>';
                $tier_count++; // Just to reflect UI
            }
        }

        // Refresh tier data
        if ($is_edit) {
            $tier_data['title'] = $tier_name;
            $tier_data['points_from'] = $points_from;
            $tier_data['points_to'] = $points_to;
            $tier_data['validity'] = $validity;
            $tier_data['gifting_products'] = $selected_gifting_products;
        }
    }
?>
    <style>
        input.benefit-input {
            max-width: 300px;
            width: 100%;
        }
    </style>
    <div class="wrap">
        <h1><?php echo $is_edit ? 'Edit Membership Tier' : 'Add Membership Tier'; ?></h1>

        <?php if (!$is_edit && $tier_count >= 3): ?>
            <div class="notice notice-warning is-dismissible">
                <p>You have already added 3 tiers. Delete one to add a new tier.</p>
            </div>
        <?php else: ?>
            <form method="post">
                <?php wp_nonce_field('save_membership_nonce', 'save_membership_nonce'); ?>

                <table class="form-table">
                    <tr>
                        <th><label for="tier_name">Tier Name</label></th>
                        <td><input type="text" name="tier_name" id="tier_name" required class="regular-text" value="<?php echo esc_attr($tier_data['title']); ?>"></td>
                    </tr>
                    <tr>
                        <th><label>Point Range</label></th>
                        <td>
                            From: <input type="number" name="points_from" required style="width: 100px;" value="<?php echo esc_attr($tier_data['points_from']); ?>"> &nbsp;
                            To: <input type="number" name="points_to" required style="width: 100px;" value="<?php echo esc_attr($tier_data['points_to']); ?>">
                        </td>
                    </tr>
                    <tr>

                        <th><label for="validity">Validity (in Days)</label></th>
                        <td>
                            <input type="number" name="validity" id="validity" min="0" max="1825" required value="<?php echo esc_attr($tier_data['validity']); ?>" />
                            <p class="description">Enter a value greater than 1.</p>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="tier_name">Merchandise Products</label></th>
                        <td>
                            <?php
                            // Get all products under 'gifting' category
                            $args = [
                                'post_type'      => 'product',
                                'posts_per_page' => -1,
                                'post_status'    => 'publish',
                                'orderby'        => 'title',
                                'order'          => 'ASC',
                                'tax_query'      => [
                                    [
                                        'taxonomy' => 'product_cat',
                                        'field'    => 'slug',
                                        'terms'    => 'gifting',
                                        'include_children' => true, // Include products from child categories
                                    ],
                                ],
                            ];

                            $gifting_products = get_posts($args);

                            // prepare saved selected products
                            $saved_gifting_products = is_array($tier_data['gifting_products']) ? $tier_data['gifting_products'] : explode(',', $tier_data['gifting_products']);

                            // Arrays to hold products
                            $merchandise_products = [];
                            $electronics_products = [];

                            if (!empty($gifting_products)) {
                                foreach ($gifting_products as $product) {
                                    $terms = wp_get_post_terms($product->ID, 'product_cat', ['fields' => 'slugs']);
                                    $points = get_post_meta($product->ID, '_points_id', true);

                                    if (in_array('electronics-gift-item', $terms)) {
                                        $electronics_products[] = [
                                            'id'    => $product->ID,
                                            'title' => $product->post_title,
                                            'points' => $points,
                                        ];
                                    } else {
                                        $merchandise_products[] = [
                                            'id'    => $product->ID,
                                            'title' => $product->post_title,
                                            'points' => $points,
                                        ];
                                    }
                                }

                                // Output Merchandise Products
                                if (!empty($merchandise_products)) {
                                    echo '<strong>Merchandise Gifting</strong>';
                                    foreach ($merchandise_products as $item) {
                            ?>
                                        <label style="display:block; margin-bottom:5px;">
                                            <input type="checkbox" name="gifting_products[]" value="<?php echo esc_attr($item['id']); ?>"
                                                <?php checked(in_array($item['id'], $saved_gifting_products)); ?>>
                                            <?php echo esc_html($item['title']) . ' (' . $item['points'] . ' Points)'; ?>
                                        </label>
                                    <?php
                                    }
                                }

                                // Output Electronics Products
                                if (!empty($electronics_products)) {
                                    echo '<strong style="margin-top: 15px; display: inline-block;">Electronics Gift Items</strong>';
                                    foreach ($electronics_products as $item) {
                                    ?>
                                        <label style="display:block; margin-bottom:5px;">
                                            <input type="checkbox" name="gifting_products[]" value="<?php echo esc_attr($item['id']); ?>"
                                                <?php checked(in_array($item['id'], $saved_gifting_products)); ?>>
                                            <?php echo esc_html($item['title']) . ' (' . $item['points'] . ' Points)'; ?>
                                        </label>
                            <?php
                                    }
                                }
                            } else {
                                echo '<p>No gifting products found.</p>';
                            }
                            ?>
                        </td>


                    </tr>
                    <?php
                    $benefits = get_post_meta($edit_id, 'benefits', true);
                    if (!is_array($benefits)) $benefits = [];

                    $current_tier_name = strtolower(trim($tier_data['title']));

                    ?>
                    <tr>
                        <th>Benefits</th>
                        <td>
                            <div id="benefits-wrapper">
                                <?php foreach ($benefits as $index => $benefit) : ?>
                                    <div class="benefit-row" style="margin-bottom: 10px;">
                                        <input type="text" class="benefit-input" name="benefits[<?php echo $index; ?>][title]" placeholder="Benefit Title" value="<?php echo esc_attr($benefit['title']); ?>" />

                                        <?php if (strpos($current_tier_name, 'bronze') !== false): ?>
                                            <input type="text" name="benefits[<?php echo $index; ?>][bronze]" placeholder="Bronze" value="<?php echo esc_attr($benefit['bronze']); ?>" />
                                        <?php elseif (strpos($current_tier_name, 'silver') !== false): ?>
                                            <input type="text" name="benefits[<?php echo $index; ?>][silver]" placeholder="Silver" value="<?php echo esc_attr($benefit['silver']); ?>" />
                                        <?php elseif (strpos($current_tier_name, 'gold') !== false): ?>
                                            <input type="text" name="benefits[<?php echo $index; ?>][gold]" placeholder="Gold" value="<?php echo esc_attr($benefit['gold']); ?>" />
                                        <?php endif; ?>

                                        <button type="button" class="remove-benefit button">Remove</button>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <button type="button" id="add-benefit" class="button">+ Add Benefit</button>
                        </td>
                    </tr>



                </table>

                <p><button type="submit" name="save_membership" class="button button-primary"><?php echo $is_edit ? 'Update Tier' : 'Save Tier'; ?></button></p>
            </form>
        <?php endif; ?>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let wrapper = document.getElementById('benefits-wrapper');
            let addButton = document.getElementById('add-benefit');

            // Pass PHP tier name to JS
            let currentTier = "<?php echo esc_js(strtolower(trim($tier_data['title']))); ?>";

            addButton.addEventListener('click', function() {
                const index = wrapper.children.length;
                let inputFields = `
                <input type="text" class="benefit-input" name="benefits[${index}][title]" placeholder="Benefit Title" />
            `;

                if (currentTier.includes('bronze')) {
                    inputFields += `<input type="text" name="benefits[${index}][bronze]" placeholder="Bronze" />`;
                } else if (currentTier.includes('silver')) {
                    inputFields += `<input type="text" name="benefits[${index}][silver]" placeholder="Silver" />`;
                } else if (currentTier.includes('gold')) {
                    inputFields += `<input type="text" name="benefits[${index}][gold]" placeholder="Gold" />`;
                }

                const html = `
                <div class="benefit-row" style="margin-bottom: 10px;">
                    ${inputFields}
                    <button type="button" class="remove-benefit button">Remove</button>
                </div>
            `;

                wrapper.insertAdjacentHTML('beforeend', html);
            });

            wrapper.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-benefit')) {
                    e.target.parentElement.remove();
                }
            });
        });
    </script>

<?php

}

function user_points_log()
{
    global $wpdb;
    $table = $wpdb->prefix . 'points_log';

    // Get all rows
    $results = $wpdb->get_results("
        SELECT pl.*, u.display_name 
        FROM {$table} pl 
        LEFT JOIN {$wpdb->users} u ON pl.user_id = u.ID 
        ORDER BY pl.created_at DESC
    ");

    // Load DataTables

    echo '<div class="wrap"><h1>User Points Log</h1>';

    echo '<table id="points-log-table" class="display" style="width:100%">';
    echo '<thead>
            <tr>
                <th>User Name</th>
                <th>Product Name</th>
                <th>Points</th>
                <th>Membership Tier</th>
                <th>Expiry Date</th>
                <th>Created At</th>
            </tr>
          </thead>';
    echo '<tbody>';

    foreach ($results as $row) {
        // Filter only those where reason starts with "Online product purchase points:"
        if (strpos($row->reson, 'Online product purchase points:') === 0) {
            // Extract product name only
            $product_name = trim(str_replace('Online product purchase points:', '', $row->reson));
            $post_title = get_the_title($row->membership_tier_id);
            $date_expire = date('d-m-Y', strtotime($row->expiry_date));
            $created_at = date('d-m-Y', strtotime($row->created_at));
            if (strtolower($post_title) === 'bronze') {
                $date_expire = 'No Expiry';
            } else {
                $date_expire = date('d-m-Y', strtotime($row->expiry_date));
            }
            echo '<tr>';
            echo '<td>' . esc_html($row->display_name) . '</td>';
            echo '<td>' . esc_html($product_name) . '</td>'; // only the product name
            echo '<td>' . intval($row->points) . '</td>';
            echo '<td>' . esc_html($post_title) . '</td>';
            echo '<td>' . esc_html($date_expire) . '</td>';
            echo '<td>' . esc_html($created_at) . '</td>';
            echo '</tr>';
        }
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';

    // Init DataTable
    echo "
    <script>
    jQuery(document).ready(function($) {
        $('#points-log-table').DataTable({
            pageLength: 25,
            order: [[5, 'desc']]
        });
    });
    </script>
    ";
}


function render_manage_membership_table()
{
    global $wpdb;

    // Detect action
    $action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : '';

    if ($action === 'add' || $action === 'edit') {
        render_add_memebership();
        return;
    }


    // Normal list view
    $search = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

    // Pagination settings
    $paged = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;
    $posts_per_page = 10;
    $offset = ($paged - 1) * $posts_per_page;

    // Prepare query args
    $args = [
        'post_type'      => 'membership_tier',
        'post_status'    => 'publish',
        'posts_per_page' => $posts_per_page,
        'offset'         => $offset,
        's'              => $search,
    ];

    $query = new WP_Query($args);
    $total_posts = $query->found_posts;
    $total_pages = ceil($total_posts / $posts_per_page);
?>
    <div class="wrap">
        <h1 class="wp-heading-inline">Manage Membership Tiers</h1>

        <a href="<?php echo admin_url('admin.php?page=manage-membership&action=add'); ?>" class="page-title-action">Add New</a>

        <form method="get">
            <input type="hidden" name="page" value="manage-membership" />
            <p class="search-box">
                <label class="screen-reader-text" for="membership-search-input">Search Membership Tiers:</label>
                <input type="search" id="membership-search-input" name="s" value="<?php echo esc_attr($search); ?>" />
                <input type="submit" id="search-submit" class="button" value="Search Membership Tiers" />
            </p>
        </form>

        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>Tier Name</th>
                    <th>Points From</th>
                    <th>Points To</th>
                    <th>Validity (Days)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($query->have_posts()): ?>
                    <?php while ($query->have_posts()): $query->the_post(); ?>
                        <?php
                        $points_from = get_post_meta(get_the_ID(), 'points_from', true);
                        $points_to = get_post_meta(get_the_ID(), 'points_to', true);
                        $validity = get_post_meta(get_the_ID(), 'validity_months', true);
                        ?>
                        <tr>
                            <td><?php the_title(); ?></td>
                            <td><?php echo esc_html($points_from); ?></td>
                            <td><?php echo esc_html($points_to); ?></td>
                            <td><?php echo esc_html($validity); ?></td>
                            <td>
                                <a href="<?php echo admin_url('admin.php?page=manage-membership&action=edit&edit_id=' . get_the_ID()); ?>" class="button">Edit</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No membership tiers found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <?php
        // Pagination
        if ($total_pages > 1) {
            echo '<div class="tablenav"><div class="tablenav-pages">';
            echo paginate_links([
                'base' => add_query_arg('paged', '%#%'),
                'format' => '',
                'prev_text' => __('«'),
                'next_text' => __('»'),
                'total' => $total_pages,
                'current' => $paged
            ]);
            echo '</div></div>';
        }

        wp_reset_postdata();
        ?>
    </div>
<?php
}


// Memebership Assign to User

add_action('show_user_profile', 'add_membership_field_to_user');
add_action('edit_user_profile', 'add_membership_field_to_user');

function add_membership_field_to_user($user)
{
    $current_tier = get_user_meta($user->ID, 'assigned_membership_tier', true);

    $tiers = get_posts([
        'post_type' => 'membership_tier',
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'title',
        'order' => 'DSC'
    ]);
?>
    <h2>Membership Tier</h2>
    <table class="form-table">
        <tr>
            <th><label for="assigned_membership_tier">Assign Membership Tier</label></th>
            <td>
                <select name="assigned_membership_tier" id="assigned_membership_tier">
                    <option value="">— No Membership —</option>
                    <?php foreach ($tiers as $tier): ?>
                        <option value="<?php echo $tier->ID; ?>" <?php selected($current_tier, $tier->ID); ?>>
                            <?php echo esc_html($tier->post_title); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php wp_nonce_field('save_membership_tier', 'membership_tier_nonce'); ?>
                <p class="description">Assign a membership tier to this user. Can be changed at any time.</p>
            </td>
        </tr>
    </table>
<?php
}
add_action('show_user_profile', 'add_points_to_user');
add_action('edit_user_profile', 'add_points_to_user');

function add_points_to_user($user)
{
    $current_tier = get_user_meta($user->ID, 'assigned_membership_tier', true);
    $points = get_valid_points_for_user($user->ID);
    $last_assigned_points = get_user_meta($user->ID, '_last_admin_assigned_points', true);

?>
    <h2> User Points</h2>
    <table class="form-table">
        <tr>
            <th><label for="assigned_membership_tier">Assign Points</label></th>
            <td>
                <input type="number" id="user_points" name="user_points" value="">
                <p class="description">Assign points to this user. Can be changed at any time.</p>
            </td>
        </tr>
    </table>
<?php
}
// Save the user points
add_action('personal_options_update', 'save_points_to_user');
add_action('edit_user_profile_update', 'save_points_to_user');

function save_points_to_user($user_id)
{
    global $wpdb;

    // Only allow admins to update
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }

    if (isset($_POST['user_points']) && intval($_POST['user_points']) > 0) {
        $points = intval($_POST['user_points']);

        // Avoid inserting the same points again by checking against a temporary meta
        $last_assigned_points = get_user_meta($user_id, '_last_admin_assigned_points', true);

        if ($points !== intval($last_assigned_points)) {
            $earned_at = current_time('Y-m-d');
            $current_membership = get_user_meta($user_id, 'assigned_membership_tier', true);
            $validity_days = get_post_meta($current_membership, 'validity_months', true); // stored as days
            $calculated_expiry_date = date('Y-m-d', strtotime("+$validity_days days", strtotime($earned_at)));
            $user = get_userdata($user_id);
            $refs_post_title = "$user->first_name  have earned points - By Admin";

            $wpdb->insert(
                $wpdb->prefix . 'points_log',
                [
                    'user_id'             => $user_id,
                    'points'              => $points,
                    'reson'               => $refs_post_title,
                    'membership_tier_id'  => $current_membership,
                    'expiry_date'         => $calculated_expiry_date,
                    'created_at'    => current_time('mysql'),

                ],
                ['%d', '%d', '%s', '%s', '%s', '%s']
            );

            // Store the last assigned points to prevent duplicate insertions
            update_user_meta($user_id, '_last_admin_assigned_points', $points);
        }
    }
}

// reheral code assign to the user

add_action('show_user_profile', 'add_referal_code_to_user');
add_action('edit_user_profile', 'add_referal_code_to_user');

function add_referal_code_to_user($user)
{
    $ref_code = get_user_meta($user->ID, 'referral_code', true);
?>
    <h3>Referral Code</h3>
    <table class="form-table">
        <tr>
            <th><label for="referral_code">Referral Code</label></th>
            <td>
                <input type="text" name="referral_code" id="referral_code" value="<?php echo esc_attr($ref_code); ?>" class="regular-text" />
                <button type="button" class="button" id="generate_ref_code">Generate Code</button>
                <button type="button" class="button button-primary" id="send_ref_code">Send to Email</button>
                <p class="description">Click "Generate Code" to create a new referral code. Then "Send to Email" to notify the user.</p>
                <p id="referral_status"></p>
            </td>
        </tr>
    </table>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const generateBtn = document.getElementById('generate_ref_code');
            const sendBtn = document.getElementById('send_ref_code');
            const codeInput = document.getElementById('referral_code');
            const statusText = document.getElementById('referral_status');

            generateBtn.addEventListener('click', () => {
                const code = 'REF-' + Math.random().toString(36).substr(2, 8).toUpperCase();
                codeInput.value = code;
            });

            sendBtn.addEventListener('click', () => {
                statusText.textContent = 'Sending...';
                fetch(ajaxurl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: new URLSearchParams({
                            action: 'send_referral_code_email',
                            user_id: <?php echo $user->ID; ?>,
                            referral_code: codeInput.value
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        statusText.textContent = data.success ? 'Email sent!' : 'Failed to send email.';
                    });
            });
        });
    </script>
<?php
}


add_action('personal_options_update', 'save_referral_code');
add_action('edit_user_profile_update', 'save_referral_code');

function save_referral_code($user_id)
{
    if (current_user_can('edit_user', $user_id)) {
        update_user_meta($user_id, 'referral_code', sanitize_text_field($_POST['referral_code']));
    }
}

add_action('wp_ajax_send_referral_code_email', 'send_referral_code_email');

function send_referral_code_email()
{
    $user_id = intval($_POST['user_id']);
    $code = sanitize_text_field($_POST['referral_code']);
    $user = get_userdata($user_id);

    if ($user && $code) {
        $subject = 'Your Referral Code';
        $message = "Hi {$user->display_name},\n\nHere is your referral code: $code\n\nThank you!";
        $headers = ['Content-Type: text/plain; charset=UTF-8'];

        $sent = wp_mail($user->user_email, $subject, $message, $headers);
        wp_send_json(['success' => $sent]);
    } else {
        wp_send_json(['success' => false]);
    }
}


function save_membership_field_to_user($user_id)
{

    if (!isset($_POST['membership_tier_nonce']) || !wp_verify_nonce($_POST['membership_tier_nonce'], 'save_membership_tier')) {
        return;
    }

    if (!current_user_can('edit_user', $user_id)) return;

    $new_tier_id = isset($_POST['assigned_membership_tier']) ? intval($_POST['assigned_membership_tier']) : '';
    $old_tier_id = get_user_meta($user_id, 'assigned_membership_tier', true);

    update_user_meta($user_id, 'assigned_membership_tier', $new_tier_id);

    if ($new_tier_id && $new_tier_id !== $old_tier_id) {
        $assigned_date = current_time('Y-m-d');
        update_user_meta($user_id, 'membership_assigned_date', $assigned_date);

        $validity_months = intval(get_post_meta($new_tier_id, 'validity_months', true));
        $expiry_date = date('Y-m-d', strtotime("+$validity_months days", strtotime($assigned_date)));

        update_user_meta($user_id, 'membership_expiry_date', $expiry_date);
    }
}

add_action('personal_options_update', 'save_membership_field_to_user'); // when a user edits their own profile
add_action('edit_user_profile_update', 'save_membership_field_to_user'); // when an admin edits another user


add_filter('manage_users_columns', 'add_membership_columns_to_user_table');
function add_membership_columns_to_user_table($columns)
{
    $columns['membership_tier'] = 'Membership Tier';
    $columns['membership_issued'] = 'Issue Date';
    $columns['membership_expiry'] = 'Expiry Date';
    return $columns;
}


add_action('manage_users_custom_column', 'show_membership_columns_data', 10, 3);
function show_membership_columns_data($value, $column_name, $user_id)
{
    if ($column_name == 'membership_tier') {
        $tier_id = get_user_meta($user_id, 'assigned_membership_tier', true);
        $tier_name = $tier_id ? get_the_title($tier_id) : '—';
        return esc_html($tier_name);
    }

    if ($column_name == 'membership_issued') {
        $date = get_user_meta($user_id, 'membership_assigned_date', true);
        return $date ? esc_html($date) : '—';
    }

    if ($column_name == 'membership_expiry') {
        $date = get_user_meta($user_id, 'membership_expiry_date', true);
        return $date ? esc_html($date) : '—';
    }

    return $value;
}


add_filter('manage_users_sortable_columns', 'make_membership_columns_sortable');
function make_membership_columns_sortable($columns)
{
    $columns['membership_issued'] = 'membership_assigned_date';
    $columns['membership_expiry'] = 'membership_expiry_date';
    return $columns;
}

add_action('pre_get_users', 'sort_users_by_membership_meta');
function sort_users_by_membership_meta($query)
{
    if (!is_admin() || !$query->is_main_query()) return;

    if ($orderby = $query->get('orderby')) {
        if (in_array($orderby, ['membership_assigned_date', 'membership_expiry_date'])) {
            $query->set('meta_key', $orderby);
            $query->set('orderby', 'meta_value');
        }
    }
}

add_action('woocommerce_account_dashboard', 'custom_dashboard_content');

function custom_dashboard_content()
{
    $user_id = get_current_user_id();
    //$membership_id = get_user_meta($user_id, 'assigned_membership_tier', true);


    $membership_id = update_user_membership_tier($user_id);
    $membership_name = get_the_title($membership_id);
    global $wpdb;
    $table = $wpdb->prefix . 'points_log';
    $today = current_time('Y-m-d');
    $available_points = get_valid_points_for_user($user_id);

?>
    <style>
        .btn.active {
            pointer-events: none !important;
            cursor: default !important;
            opacity: 0.7;
        }
    </style>
    <div class="woocommerce-custom-dashboard" style="margin-top: -50px;">
        <h2 class="f__h3 spacing__20">Your Account Summary</h2>

        <div style="display: flex; flex-wrap: wrap; border: 1px solid #ccc; border-radius: 8px; overflow: hidden; margin-bottom: 30px;">
            <!-- Membership -->
            <div style="flex: 1 1 50%; padding: 15px; background-color: #ffffff; border-right: 1px solid #ccc;">
                <strong>Membership</strong>
                <div style="margin-top: 8px;"><?php echo esc_html($membership_name); ?></div>
            </div>

            <!-- Total Points -->
            <div style="flex: 1 1 50%; padding: 15px; background-color: #ffffff;">
                <strong>Total Points</strong>
                <div style="margin-top: 8px;"><?php echo esc_html($available_points); ?></div>
            </div>
        </div>

        <!-- New Section: Quick Access Boxes -->
        <h5 class="f__h3">Quick Access</h5>

        <div class="spacing__20" style="display: flex; flex-wrap: wrap; gap: 20px;">
            <!-- Product Registration Box -->
            <a href="<?php echo esc_url(wc_get_account_endpoint_url('offline-verify')); ?>" style="flex: 1 1 30%; text-align: center; padding: 20px; background-color: #f9f9f9; border: 1px solid #ccc; border-radius: 8px; text-decoration: none; color: inherit; transition: all 0.3s;">
                <strong>Product Registration for loyalty program</strong>
                <div style="margin-top: 10px;">Register your offline product easily.</div>
            </a>

            <!-- My Points Box -->
            <a href="<?php echo esc_url(wc_get_account_endpoint_url('points-history')); ?>" style="flex: 1 1 30%; text-align: center; padding: 20px; background-color: #f9f9f9; border: 1px solid #ccc; border-radius: 8px; text-decoration: none; color: inherit; transition: all 0.3s;">
                <strong>My Points</strong>
                <div style="margin-top: 10px;">View your point history.</div>
            </a>

            <!-- My Referral Box -->
            <a href="<?php echo esc_url(wc_get_account_endpoint_url('referral-code')); ?>" style="flex: 1 1 30%; text-align: center; padding: 20px; background-color: #f9f9f9; border: 1px solid #ccc; border-radius: 8px; text-decoration: none; color: inherit; transition: all 0.3s;">
                <strong>My Referral</strong>
                <div style="margin-top: 10px;">Share and earn rewards.</div>
            </a>
            <!-- My membership Benefit -->
            <?php
            $user_id = get_current_user_id();

            // Step 1: Get the user's assigned membership tier (assume saved in user meta)
            $membership_tier_id  = get_user_meta($user_id, 'assigned_membership_tier', true);
            if (!$membership_tier_id) return;

            $tier_post = get_post($membership_tier_id);
            if (!$tier_post || $tier_post->post_type !== 'membership_tier') return;

            $tier_name = strtolower(trim($tier_post->post_title)); // bronze, silver, gold

            // Step 2: Get the benefit rows
            $benefits = get_post_meta($membership_tier_id, 'benefits', true);
            if (!is_array($benefits) || empty($benefits)) return;
            ?>

            <div style="flex: 1 1 100%; padding: 20px; background-color: #f9f9f9; border: 1px solid #ccc; border-radius: 8px; transition: all 0.3s;">
                <div class="container__fluid__wrap">

                    <p class="align__center fit__content f__uppercase spacing__32">Membership BENEFITS</p>
                    <div class="table__wrapp spacing__32">
                        <div class="table-responsive">
                            <table class="table" style="width: 100%; border-collapse: collapse;">
                                <thead class="thead__dark" style="background: #333; color: white;">
                                    <tr>
                                        <th scope="col" style="padding: 10px;">BENEFITS</th>
                                        <th scope="col" style="padding: 10px;">
                                            <?php if ($tier_name == 'bronze') : ?>
                                                <i class="icon__box"></i> BRONZE
                                            <?php elseif ($tier_name == 'silver') : ?>
                                                <i class="icon__box silver__icon"></i> SILVER
                                            <?php elseif ($tier_name == 'gold') : ?>
                                                <i class="icon__box gold__icon"></i> GOLD
                                            <?php endif; ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table__body">
                                    <?php foreach ($benefits as $benefit) : ?>
                                        <tr>
                                            <td scope="col" style="padding: 10px;"><?php echo esc_html($benefit['title']); ?></td>
                                            <td scope="col" style="padding: 10px; text-align: left;">
                                                <?php
                                                if ($tier_name === 'bronze') {
                                                    echo esc_html($benefit['bronze'] ?? '-');
                                                } elseif ($tier_name === 'silver') {
                                                    echo esc_html($benefit['silver'] ?? '-');
                                                } elseif ($tier_name === 'gold') {
                                                    echo esc_html($benefit['gold'] ?? '-');
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Unified Merchandise Box -->
            <div style="flex: 1 1 100%; padding: 20px; background-color: #f9f9f9; border: 1px solid #ccc; border-radius: 8px; transition: all 0.3s;">

                <!-- Clickable title only -->

                <strong class="f__h4 f__uppercase spacing__32" style="text-align: center; display: block; text-decoration: none; color: inherit;">Merchandise Products</strong>


                <?php
                $user_id = get_current_user_id();
                $tier_post_id  = get_user_meta($user_id, 'assigned_membership_tier', true);

                if (!$tier_post_id) {
                    echo '<p class="text__center">No membership tier assigned.</p>';
                    return;
                }

                $tier_name = strtolower(get_the_title($tier_post_id));
                $product_ids = get_post_meta($tier_post_id, 'gifting_products', true);

                if (!is_array($product_ids)) {
                    $product_ids = explode(',', $product_ids);
                }

                if (empty($product_ids)) {
                    echo '<p class="text__center">No merchandise assigned to your tier.</p>';
                    return;
                }

                // 🔍 Filter only products assigned directly to 'gifting' parent category
                $taxonomy = 'product_cat';
                $gifting_term = get_term_by('slug', 'gifting', $taxonomy);
                $filtered_ids = [];

                if ($gifting_term) {
                    $gifting_id = $gifting_term->term_id;
                    $child_terms = get_term_children($gifting_id, $taxonomy);

                    foreach ($product_ids as $pid) {
                        $product_terms = wp_get_post_terms($pid, $taxonomy, ['fields' => 'ids']);

                        $has_gifting = in_array($gifting_id, $product_terms);
                        $has_child = !empty(array_intersect($child_terms, $product_terms));

                        if ($has_gifting && !$has_child) {
                            $filtered_ids[] = $pid;
                        }
                    }
                }

                if (empty($filtered_ids)) {
                    echo '<p class="text__center">No eligible products found in your gifting tier.</p>';
                    return;
                }

                $args = [
                    'post_type' => 'product',
                    'post__in' => $filtered_ids,
                    'posts_per_page' => -1,
                    'orderby' => 'title',
                    'order' => 'ASC',
                ];

                $products = get_posts($args);
                if (empty($products)) {
                    echo '<p class="text__center">Products not found.</p>';
                    return;
                }

                $filter_class = 'category1';
                if (strpos($tier_name, 'silver') !== false) {
                    $filter_class = 'category2';
                } elseif (strpos($tier_name, 'gold') !== false) {
                    $filter_class = 'category3';
                }
                ?>

                <!-- Merchandise Product Grid -->
                <div class="large__block container__fluid__wrap spacing__32" style="margin-top: 20px;">
                    <div class="gallery">
                        <div class="l__panel__grid content__between align__center__item">
                            <div class="filter__wrapp">
                                <button class="btn active" data-filter="<?php echo esc_attr($filter_class); ?>">
                                    <i class="icon__box">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/new-assets/images/<?php echo esc_attr($tier_name); ?>.svg" alt="" />
                                    </i>
                                    <?php echo ucfirst($tier_name); ?>
                                </button>
                            </div>
                            <a href="<?php echo esc_url(wc_get_account_endpoint_url('merchandise-products')); ?>"> View All</a>
                        </div>

                        <div class="items__wrapp">
                            <?php foreach ($products as $product):
                                $points = get_post_meta($product->ID, '_points_id', true);
                                $image = get_the_post_thumbnail_url($product->ID, 'medium');
                            ?>
                                <div class="item__card <?php echo esc_attr($filter_class); ?>">
                                    <a href="<?php echo get_permalink($product->ID); ?>">
                                        <div class="card__image">
                                            <figure>
                                                <?php if ($image): ?>
                                                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($product->post_title); ?>" />
                                                <?php else: ?>
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/new-assets/images/default.jpg" alt="No Image" />
                                                <?php endif; ?>
                                            </figure>
                                        </div>
                                        <div class="card__content">
                                            <p class="f__uppercase"><?php echo esc_html($product->post_title); ?></p>
                                            <div class="points__wrap">
                                                <i class="icon__box">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/new-assets/images/point-coin.svg" alt="Points" />
                                                </i>
                                                <p class="f__uppercase"><?php echo esc_html($points); ?> Points</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

<?php
}



function register_offline_verify_endpoint()
{
    add_rewrite_endpoint('dashboard', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('offline-verify', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('verify-activity-code', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('points-history', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('exchange-old-product', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('product-rental', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('service-registration', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('referral-code', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('merchandise-products', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('after-sale', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('lense-loan', EP_ROOT | EP_PAGES);
}
add_action('init', 'register_offline_verify_endpoint');

add_filter('woocommerce_account_menu_items', function ($items) {

    // Remove downloads first
    unset($items['downloads']);

    $new_items = [];

    // Section: Account Settings
    $new_items['dashboard'] = __('Dashboard', 'woocommerce');
    $new_items['edit-account'] = __('Profile Information', 'woocommerce');
    $new_items['account_settings_title'] = __('Account Settings', 'woocommerce');

    $new_items['edit-address'] = __('Manage Address', 'woocommerce');

    // Section: My Orders
    $new_items['my_orders_title'] = __('My Orders', 'woocommerce');
    $new_items['orders'] = __('Orders', 'woocommerce');

    // Section: My Stuff
    $new_items['my_stuff_title'] = __('My Stuff', 'woocommerce');
    $new_items['offline-verify'] = __('Product Registration', 'woocommerce');
    $new_items['verify-activity-code'] = __('Verify Activity Code', 'woocommerce');
    $new_items['points-history'] = __('My Point', 'woocommerce');
    $new_items['referral-code'] = __('My Referral', 'woocommerce');
    $new_items['merchandise-products'] = __('Merchandise Products', 'woocommerce');


    // Section: Other
    $new_items['other_title'] = __('Other', 'woocommerce');
    $new_items['after-sale'] = __('After Sales Support', 'woocommerce');
    $new_items['lense-loan'] = __('Lense Finance', 'woocommerce');
    $new_items['exchange-old-product'] = __('Exchange', 'woocommerce');
    $new_items['product-rental'] = __('Rental', 'woocommerce');
    $new_items['service-registration'] = __('Service Registration', 'woocommerce');

    // Logout
    $new_items['customer-logout'] = __('Logout', 'woocommerce');

    return $new_items;
}, 99);
// Make section titles non-clickable
add_filter('woocommerce_account_menu_item_classes', function ($classes, $endpoint) {
    if (strpos($endpoint, '_title') !== false) {
        $classes[] = 'account-menu-title';
    }
    return $classes;
}, 10, 2);

add_filter('woocommerce_get_endpoint_url', function ($url, $endpoint, $value, $permalink) {
    if (strpos($endpoint, '_title') !== false) {
        return '#';
    }
    return $url;
}, 10, 4);


// referral codes function

function referral_code_assign_register()
{

    $user_id = get_current_user_id();
    $used_code = get_user_meta($user_id, 'used_referral_code', true);
    $ref_code = get_user_meta($user_id, 'referral_code', true);


    // If referral code is already used, just show the used message and return
    if ($used_code) {
        echo '<p><strong>You have already used a referral code:</strong> ' . esc_html($used_code) . '</p>';
        return;
    }

    // Only show this if user has NOT used a referral code yet
    echo '<h2 class="referral-bonus-code f__h3">Please Enter Referral Code</h2><br>';

    if ($ref_code) {
        echo '<h2 class="referral-bonus-code f__h4">Your Referral Code: ' . esc_html($ref_code) . '</h2><br>';
    } else {
        echo '<p class="referral-code-message">You have not get any referral code yet.</p>';
    }

?>
    <form class="referral-bonus-form" method="post">
        <!-- <label for="referral_code">Referral Code:</label>
        <input type="text" name="referral_code" id="referral_code" required> -->
        <div class="form-group form__group">
            <label for="referral_code" class="f__ul spacing__20">
                <?php esc_html_e('Referral Code', 'woocommerce'); ?> <span class="required">*</span>
            </label>
            <div class="input__group">
                <input type="text"
                    name="referral_code"
                    id="referral_code"
                    autocomplete="off"
                    class="form-control form__control" required />
            </div>
        </div>

        <input type="hidden" name="action" value="submit_referral_code">
        <?php wp_nonce_field('submit_referral_code_action', 'submit_referral_code_nonce'); ?>
        <input class="submit__btn" type="submit" value="Apply Referral Code">
    </form>
<?php
}
add_action('woocommerce_account_referral-code_endpoint', 'referral_code_assign_register');

//Merchandise Products
function merchandise_products_assign_register()
{
    $user_id = get_current_user_id();

    // Assume user's tier is stored as user meta (e.g., 'user_membership_tier')
    $tier_post_id  = get_user_meta($user_id, 'assigned_membership_tier', true);

    if (!$tier_post_id) {
        echo '<p class="text__center">No membership tier assigned.</p>';
        return;
    }

    $tier_name = strtolower(get_the_title($tier_post_id));
    $product_ids = get_post_meta($tier_post_id, 'gifting_products', true);

    if (!is_array($product_ids)) {
        $product_ids = explode(',', $product_ids);
    }

    if (empty($product_ids)) {
        echo '<p class="text__center">No merchandise assigned to your tier.</p>';
        return;
    }

    $args = [
        'post_type' => 'product',
        'post__in' => $product_ids,
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
    ];

    $products = get_posts($args);
    if (empty($products)) {
        echo '<p class="text__center">Products not found.</p>';
        return;
    }

    // Determine filter class
    $filter_class = 'category1'; // Default to Bronze
    if (strpos($tier_name, 'silver') !== false) {
        $filter_class = 'category2';
    } elseif (strpos($tier_name, 'gold') !== false) {
        $filter_class = 'category3';
    }
?>
    <style>
        .btn.active {
            pointer-events: none !important;
            cursor: default !important;
            opacity: 0.7;
        }
    </style>
    <div class="container__fluid__wrap">
        <div class="content__wid1024 text__center spacing__32">
            <h1 class="f__h4 f__uppercase">Merchandise Products</h1>
        </div>
        <div class="gallery">
            <div class="filter__wrapp">
                <button class="btn active" data-filter="<?php echo esc_attr($filter_class); ?>">
                    <i class="icon__box"><img src="<?php echo get_stylesheet_directory_uri(); ?>/new-assets/images/<?php echo $tier_name; ?>.svg" alt="" /></i>
                    <?php echo ucfirst($tier_name); ?>
                </button>
            </div>

            <div class="items__wrapp spacing__32">
                <?php foreach ($products as $product):
                    $points = get_post_meta($product->ID, '_points_id', true);
                    $image = get_the_post_thumbnail_url($product->ID, 'medium');
                ?>
                    <div class="item__card <?php echo esc_attr($filter_class); ?>">
                        <a href="<?php echo get_permalink($product->ID); ?>">
                            <div class="card__image">
                                <figure>
                                    <?php if ($image): ?>
                                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($product->post_title); ?>" />
                                    <?php else: ?>
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/new-assets/images/default.jpg" alt="No Image" />
                                    <?php endif; ?>
                                </figure>
                            </div>
                            <div class="card__content">
                                <p class="f__uppercase"><?php echo esc_html($product->post_title); ?></p>
                                <div class="points__wrap">
                                    <i class="icon__box">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/new-assets/images/point-coin.svg" alt="Points" />
                                    </i>
                                    <p class="f__uppercase"><?php echo esc_html($points); ?> Points</p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

<?php
}


add_action('woocommerce_account_merchandise-products_endpoint', 'merchandise_products_assign_register');



// Process the form submission
add_action('template_redirect', 'handle_referral_code_submission');

function handle_referral_code_submission()
{
    if (
        is_user_logged_in() &&
        isset($_POST['action']) && $_POST['action'] === 'submit_referral_code' &&
        isset($_POST['referral_code']) &&
        wp_verify_nonce($_POST['submit_referral_code_nonce'], 'submit_referral_code_action')
    ) {
        global $wpdb;

        $new_user_id = get_current_user_id();
        $entered_code = sanitize_text_field($_POST['referral_code']);

        // Prevent reuse
        if (get_user_meta($new_user_id, 'used_referral_code', true)) {
            wc_add_notice('You have already used a referral code.', 'error');
            wp_redirect(wc_get_account_endpoint_url('referral-code'));
            exit;
        }

        $existing_user_points = (int) get_option('existing_user_points', 0);
        $new_user_points = (int) get_option('new_user_points', 0);

        // Find user who owns the code
        $ref_user_query = new WP_User_Query([
            'meta_key'   => 'referral_code',
            'meta_value' => $entered_code,
            'number'     => 1,
            'fields'     => ['ID'],
        ]);

        $ref_users = $ref_user_query->get_results();

        if (!empty($ref_users)) {
            $ref_user_id = $ref_users[0]->ID;

            if ($ref_user_id == $new_user_id) {
                wc_add_notice("You can't use your own referral code.", 'error');
                wp_redirect(wc_get_account_endpoint_url('referral-code'));
                exit;
            }

            // Save code so it can't be reused
            update_user_meta($new_user_id, 'used_referral_code', $entered_code);

            // Insert post for referring user
            //$user_displayname = get_user_by( 'id',$new_user_id )->display_name ;

            $referral_code = get_user_meta($ref_user_id, 'referral_code', true);

            // Post titles (optional)



            $ref_post_title = "User $ref_user_id - Referred User $new_user_id";
            wp_insert_post([
                'post_type'   => 'referral_point',
                'post_status' => 'publish',
                'post_title'  => $ref_post_title,
                'meta_input'  => [
                    'user_id' => $ref_user_id,
                    'points'  => $existing_user_points,
                    'referral_code' => $entered_code,
                ],
            ]);

            // Insert points log for referring user
            $current_membership = get_user_meta($ref_user_id, 'assigned_membership_tier', true);
            $earned_at = current_time('Y-m-d');
            $current_membership = get_user_meta($ref_user_id, 'assigned_membership_tier', true);
            $validity_days = get_post_meta($current_membership, 'validity_months', true); // actually days
            $calculated_expiry_date = date('Y-m-d', strtotime("+$validity_days days", strtotime($earned_at)));


            $refs_post_title = "User $ref_user_id earned points - referred code:  $referral_code";
            $wpdb->insert(
                $wpdb->prefix . 'points_log',
                [
                    'user_id'    => $ref_user_id,
                    'points'     => $existing_user_points,
                    'reson'      => $refs_post_title,
                    'membership_tier_id' => $current_membership,
                    'expiry_date' => $calculated_expiry_date,
                    'created_at' => current_time('mysql'),
                ],
                ['%d', '%d', '%s', '%s', '%s', '%s']
            );
            update_user_membership_tier($ref_user_id);
            // Insert post for new user
            $new_post_title = "User $new_user_id - Referral Signup Bonus";
            wp_insert_post([
                'post_type'   => 'referral_point',
                'post_status' => 'publish',
                'post_title'  => $new_post_title,
                'meta_input'  => [
                    'user_id' => $new_user_id,
                    'points'  => $new_user_points,
                    'referral_code' => $entered_code,
                ],
            ]);

            // Insert points log for new user
            $current_membership = get_user_meta($new_user_id, 'assigned_membership_tier', true);
            $validity_days = get_post_meta($current_membership, 'validity_months', true); // actually days
            $calculated_expiry_date = date('Y-m-d', strtotime("+$validity_days days", strtotime($earned_at)));
            $news_post_title = "User $new_user_id earned points - used code:  $entered_code";
            $wpdb->insert(
                $wpdb->prefix . 'points_log',
                [
                    'user_id'    => $new_user_id,
                    'points'     => $new_user_points,
                    'reson'      => $news_post_title,
                    'membership_tier_id' => $current_membership,
                    'expiry_date' => $calculated_expiry_date,
                    'created_at' => current_time('mysql'),
                ],
                ['%d', '%d', '%s', '%s', '%s', '%s']
            );
            update_user_membership_tier($new_user_id);
            wc_add_notice('Referral code applied! Points awarded.', 'success');
        } else {
            wc_add_notice('Invalid referral code.', 'error');
        }

        wp_redirect(wc_get_account_endpoint_url('referral-code'));
        exit;
    }
}

// after the sale 
add_action('woocommerce_account_after-sale_endpoint', 'after_sale_content');

function after_sale_content()
{
    echo '<h2 class="woocommerce-after-sale title f__h3">After Sale Contact</h2>';
    $sale_email = get_field('sale_email', 'option');
    $sale_phone = get_field('sale_phone_number', 'option');

    // Check if either field is available before displaying
    if ($sale_email || $sale_phone) {
        echo '<div class="after-sale-contact-info spacing__12">';

        if ($sale_email) {
            echo '<p><strong>Email:</strong> <a href="mailto:' . esc_attr($sale_email) . '">' . esc_html($sale_email) . '</a></p>';
        }

        if ($sale_phone) {
            echo '<p><strong>Phone:</strong> <a href="tel:' . esc_attr($sale_phone) . '">' . esc_html($sale_phone) . '</a></p>';
        }

        echo '</div>';
    }
}

// after the sale 
add_action('woocommerce_account_lense-loan_endpoint', 'lense_loan_content');

function lense_loan_content()
{
    echo '<h2 class="woocommerce-after-sale title f__h3">Lense Loan Contact Details</h2>';

    $leans_email = get_field('lense_loan_email', 'options');
    $leans_phone = get_field('lense_loan_phone_number', 'options');

    // Check if either field is available before displaying
    if ($leans_email || $leans_phone) {
        echo '<div class="after-sale-contact-info spacing__12">';

        if ($leans_email) {
            echo '<p><strong>Email:</strong> <a href="mailto:' . esc_attr($leans_email) . '">' . esc_html($leans_email) . '</a></p>';
        }

        if ($leans_phone) {
            echo '<p><strong>Phone:</strong> <a href="tel:' . esc_attr($leans_phone) . '">' . esc_html($leans_phone) . '</a></p>';
        }

        echo '</div>';
    }
}


function offline_verify_content()
{
    echo '<h2 class="woocommerce-Address-title title f__h3">Product Registration is for the loyalty program</h2>';
    echo '<br>';
    echo '<p>Enter your product category, product name, Vendor name and serial number for product registration.</p>';
    echo '<br>';

    $product_titles = [];

    $args = [
        'post_type'      => 'loyalty_products',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    ];

    $products = get_posts($args);

    foreach ($products as $prod) {
        $product_titles[] = get_the_title($prod->ID);
    }
    // print_r( $product_titles);
    $product_code = [];
    $taxonomies = get_terms([
        'taxonomy' => 'brands',
        'hide_empty' => false
    ]);

?>

    <form id="offline-verify-form" class="woocommerce-EditAccountForm" method="post">
        <div class="form-group form__group">
            <label for="product_brand" class="f__ul spacing__20">Product Category:</label>
            <div class="m__select">
                <select name="product_brand" id="product_brand" class="form-control form__control" required>
                    <option value="">Select Brand</option>
                    <?php
                    $brands = get_terms([
                        'taxonomy' => 'brands',
                        'hide_empty' => false
                    ]);
                    foreach ($brands as $brand) {
                        echo '<option value="' . esc_attr($brand->term_id) . '">' . esc_html($brand->name) . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group form__group">
            <label for="product_name" class="f__ul spacing__20">Product Name:</label>
            <div class="m__select">
                <select name="product_name" id="product_name" class="form-control form__control" required>
                    <option value="">Select Product</option>
                </select>
            </div>
        </div>
        <div class="form-group form__group">
            <label for="vendor_name" class="f__ul spacing__20">Vendor Name:</label>
            <div class="input__group">
                <input type="text" name="vendor_name" id="vendor_name" placeholder="Enter Vendor Name" class="form-control form__control" required />
            </div>
        </div>
        <div class="form-group form__group">
            <label for="product_code" class="f__ul spacing__20">Serial No:</label>
            <div class="input__group">
                <input type="text" name="product_code" id="product_code" placeholder="Enter Serial No..." class="form-control form__control" required />
            </div>
        </div>

        <button type="submit" name="offlineProdpoint" class="submit__btn">Verify</button>

    </form>


    <script>
        jQuery(document).ready(function($) {
            $('#product_brand').on('change', function() {
                var brandId = $(this).val();

                if (brandId) {
                    $.ajax({
                        url: '<?php echo admin_url("admin-ajax.php"); ?>',
                        type: 'POST',
                        data: {
                            action: 'get_products_by_brand',
                            brand_id: brandId
                        },
                        success: function(response) {
                            $('#product_name').html('<option value="">Select Product</option>');
                            if (response.success) {
                                $.each(response.data, function(index, item) {
                                    var displayText = item.title + (item.part_no ? ' (' + item.part_no + ')' : '');

                                    $('#product_name').append('<option value="' + item.id + '">' + displayText + '</option>');
                                });
                            }
                        }
                    });
                } else {
                    $('#product_name').html('<option value="">Select Product</option>');
                }
            });
        });
    </script>
    <script>
        jQuery(document).ready(function($) {
            $('#offline-verify-form').on('submit', function(e) {
                e.preventDefault();
                var $form = $(this);
                var formData = {
                    action: 'handle_loyalty_product_submission',
                    product_brand: $('#product_brand').val(),
                    product_name: $('#product_name').val(),
                    vendor_name: $('#vendor_name').val(),
                    product_code: $('#product_code').val()
                };
                // Disable the button and show loader
                var $button = $form.find('button[type="submit"]');
                $button.prop('disabled', true).text('Verifying...');
                $('#form-loader').show();

                $.ajax({
                    url: '<?php echo admin_url("admin-ajax.php"); ?>', // or 
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    success: function(response) {
                        $('.alert').remove(); // Clear old alerts
                        if (response.success) {
                            $('#offline-verify-form').after('<div class="alert alert-success mt-3">' + response.data.message + '</div>');
                            $('#offline-verify-form')[0].reset(); // Optional: reset form
                        } else {
                            $('#offline-verify-form').after('<div class="alert alert-danger mt-3">' + response.data.message + '</div>');
                        }
                    },
                    error: function() {
                        $('.alert').remove();
                        $('#offline-verify-form').after('<div class="alert alert-danger mt-3">Something went wrong. Please try again.</div>');
                    },
                    complete: function() {
                        // Re-enable button and hide loader
                        $button.prop('disabled', false).text('Verify');
                        $('#form-loader').hide();
                    }
                });
            });
        });
    </script>

<?php

}
add_action('woocommerce_account_offline-verify_endpoint', 'offline_verify_content');

add_action('woocommerce_account_verify-activity-code_endpoint', 'verify_activity_code_content');

function verify_activity_code_content()
{
    echo '<h2 class="woocommerce-Address-title title f__h3">Verify Activity Code</h2>';
    echo '<br>';
    echo '<p>Enter the code and verify to claim your points.</p>';
    echo '<br>';

?>
    <form id="verify-code-form" class="woocommerce-EditAccountForm" method="post">

        <div class="form-group form__group">
            <label for="product_code" class="f__ul spacing__20">Enter Assigned Code:</label>
            <div class="input__group">
                <input type="text" name="assigned_code" id="assigned_code" placeholder="Enter Assigned Code" class="form-control form__control" required />
            </div>
        </div>

        <button type="submit" name="verifycode" class="submit__btn">Verify</button>

    </form>
<?php

}

add_action('template_redirect', 'handle_verify_activity_code_form');
function handle_verify_activity_code_form()
{
    if (
        isset($_POST['verifycode']) &&
        isset($_POST['assigned_code']) &&
        is_user_logged_in()
    ) {
        $submitted_code = strtoupper(trim(sanitize_text_field($_POST['assigned_code'])));
        $user_id = get_current_user_id();

        // Step 1: Find post with matching code in user_event_point
        $posts = get_posts([
            'post_type'      => 'user_event_point',
            'posts_per_page' => 1,
            'meta_query'     => [
                [
                    'key'     => 'code',
                    'value'   => $submitted_code,
                    'compare' => '='
                ]
            ],
            'fields' => 'ids',
        ]);

        if (!empty($posts)) {
            $post_id = $posts[0];

            $saved_user_id = (int) get_post_meta($post_id, 'user_id', true);
            $point_status  = (int) get_post_meta($post_id, 'point_status', true);

            if ($saved_user_id !== $user_id) {
                wc_add_notice('Invalid code. This code is not assigned to you.', 'error');
            } elseif ($point_status === 1) {
                wc_add_notice('This code has already been verified.', 'error');
            } elseif ($point_status === 0) {
                update_post_meta($post_id, 'point_status', 1);
                wc_add_notice('Code verified successfully. Points claimed!', 'success');

                // 1. Get point value and reason
                $points         = (int) get_post_meta($post_id, 'points', true);
                $reason         = get_post_meta($post_id, 'activity_type', true); // or use 'activity_type'
                $earned_at      = current_time('Y-m-d');
                $current_membership = get_user_meta($user_id, 'assigned_membership_tier', true);
                $validity_days  = (int) get_post_meta($current_membership, 'validity_months', true); // actually days
                $expiry_date    = date('Y-m-d', strtotime("+$validity_days days", strtotime($earned_at)));

                // 2. Insert into wp_points_log table
                global $wpdb;
                $wpdb->insert(
                    $wpdb->prefix . 'points_log',
                    [
                        'user_id'           => $user_id,
                        'points'            => $points,
                        'reson'             => $reason,
                        'membership_tier_id' => (int) $current_membership,
                        'expiry_date'       => $expiry_date,
                        'created_at'        => current_time('mysql')
                    ],
                    ['%d', '%d', '%s', '%d', '%s', '%s']
                );

                // 3. Update user membership
                update_user_membership_tier($user_id);
            } else {
                wc_add_notice('Unexpected point status.', 'error');
            }
        } else {
            wc_add_notice('Invalid code. Please try again.', 'error');
        }

        wp_redirect(wc_get_account_endpoint_url('verify-activity-code'));
        exit;
    }
}


function log_product_registration_attempt($user_id, $model, $serial, $vendor, $brand, $status, $reason)
{
    global $wpdb;
    $wpdb->insert(
        $wpdb->prefix . 'product_registration',
        [
            'name'            => $user_id ? get_userdata($user_id)->display_name : 'Guest',
            'email_address'   => $user_id ? get_userdata($user_id)->user_email : '',
            'model'           => $model,
            'serial_number'   => $serial,
            'dealers_name'    => $vendor,
            'commitment'      => $status,
            'reason'          => $reason,
            'date'            => date('Y-m-d'),
            'created_at'      => current_time('mysql'),
        ],
        [
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s'
        ]
    );
}

add_action('wp_ajax_handle_loyalty_product_submission', 'handle_loyalty_product_submission');
add_action('wp_ajax_nopriv_handle_loyalty_product_submission', 'handle_loyalty_product_submission');

function handle_loyalty_product_submission()
{

    if (!is_user_logged_in()) {
        wp_send_json_error(['message' => 'You must be logged in to verify a product.']);
    }

    $user_id      = get_current_user_id();
    $term_id      = sanitize_text_field($_POST['product_brand']);
    $product_id = sanitize_text_field($_POST['product_name']);
    
    $partno = get_field('part_no', $product_id);
    
    $product_name = get_the_title($product_id);
    $product_name_part = $product_name . ' (' . $partno . ')';
    
    

    $serial_no    = sanitize_text_field($_POST['product_code']);
    $vendor_name  = sanitize_text_field($_POST['vendor_name']);
    $term         = get_term($term_id);

    if (!$term || is_wp_error($term)) {
        wp_send_json_error(['message' => 'Invalid brand selected.']);
    }

    global $wpdb;

    // Check if product already claimed by this user
    $already_claimed = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(*) FROM {$wpdb->prefix}points_log 
         WHERE user_id = %d AND reson LIKE %s",
        $user_id,
        '%' . $wpdb->esc_like($product_name) . '%'
    ));

    if ($already_claimed > 0) {
        $response_msg = $body['responseMessage'] ?? 'Product verified, but already claimed.';
        log_product_registration_attempt($user_id, $product_name, $serial_no, $vendor_name, $term->name, 'No', $response_msg);
        wp_send_json_error(['message' => 'You have already claimed this product.']);
    }
    
    $someone_claimed = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(*) FROM {$wpdb->prefix}points_log 
         WHERE serial_no = %d AND reson LIKE %s",
        $serial_no,
        '%' . $wpdb->esc_like($product_name) . '%'
    ));

    if ($someone_claimed > 0) {
        $response_msg = $body['responseMessage'] ?? 'Someone is already claimed.';
        log_product_registration_attempt($user_id, $product_name, $serial_no, $vendor_name, $term->name, 'No', $response_msg);
        wp_send_json_error(['message' => 'Someone have already claimed this product.']);
    }

    // Call external API
    $response = wp_remote_post('https://sales.shetalastock.com/api/productVerifications', [
        'headers' => [
            'api_key' => '2VDHKC1hLM9Pt0WKvbeHr0n7g',
        ],
        'body' => [
            'product_category' => $term->name,
            'product_name'     => $product_name_part,
            'serial_no'        => $serial_no,
            'vendor_name'      => $vendor_name,
        ],
        'timeout' => 15,
    ]);

    if (is_wp_error($response)) {
        wp_send_json_error(['message' => 'Verification failed. ' . $response->get_error_message()]);
    }

    $body = json_decode(wp_remote_retrieve_body($response), true);

    if (!isset($body['responseStatus']) || $body['responseStatus'] != 0) {
        $error_msg = $body['responseMessage'] ?? 'Invalid serial number or product details.';
        log_product_registration_attempt($user_id, $product_name, $serial_no, $vendor_name, $term->name, 'No', $error_msg);

        wp_send_json_error(['message' => $error_msg]);
    }

    // API succeeded, insert into database
    $points = get_field('loyalty_points', $product_id);

    $reason = 'Product Registration: ' . $product_name;
    $current_membership     = get_user_meta($user_id, 'assigned_membership_tier', true);
    $calculated_expiry_date = date('Y-m-d', strtotime('+1 year'));

    // Insert into custom post type log
    wp_insert_post([
        'post_type'   => 'model_purchase_point',
        'post_status' => 'publish',
        'post_title'  => "Points for Product Registration - User #$user_id",
        'meta_input'  => [
            'user_id'      => $user_id,
            'product_name' => $product_name,
            'points'       => $points,
            'reason'       => $reason,
            'vendor_name'  => 'Vendor Name: ' . $vendor_name,
            'serial_no'    => $serial_no,
            'source'       => 'offline_purchase'
        ]
    ]);

    // Insert into points_log table
    $wpdb->insert(
        $wpdb->prefix . 'points_log',
        [
            'user_id'            => $user_id,
            'points'             => $points,
            'serial_no'          => $serial_no,
            'product_name'       => $product_name,
            'reson'              => $reason,
            'membership_tier_id' => $current_membership,
            'expiry_date'        => $calculated_expiry_date,
        ],
        ['%d', '%d', '%s', '%s', '%s', '%s', '%s']
    );
    $response_msg = $body['responseMessage'] ?? 'Product successfully verified.';

    log_product_registration_attempt($user_id, $product_name, $serial_no, $vendor_name, $term->name, 'Yes', $response_msg);

    // Update user membership tier
    if (function_exists('update_user_membership_tier')) {
        update_user_membership_tier($user_id);
    }

    wp_send_json_success([
        'message' => "Thank you! Product has been registered and you earned {$points} points."
    ]);
}







// AJAX handler for deleting points log records
add_action('wp_ajax_delete_points_log_record', 'delete_points_log_record');

function delete_points_log_record() {
    // Verify nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'delete_points_log_nonce')) {
        wp_send_json_error(['message' => 'Security check failed.']);
        return;
    }

    // Check user capabilities (only admins should be able to delete)
    if (!current_user_can('manage_options')) {
        wp_send_json_error(['message' => 'You do not have permission to delete records.']);
        return;
    }

    // Get and sanitize input
    $user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0;
    $points = isset($_POST['points']) ? intval($_POST['points']) : 0;
    $serial_no = isset($_POST['serial_no']) ? sanitize_text_field($_POST['serial_no']) : '';
    $log_id = isset($_POST['log_id']) ? intval($_POST['log_id']) : 0;

    // Validate user_id and serial_no (both are required)
    if (!$user_id || empty($serial_no)) {
        wp_send_json_error(['message' => 'Invalid user ID or serial number.']);
        return;
    }

    global $wpdb;

    // 1. Find posts from model_purchase_point post type matching user_id and serial_no
    $meta_query = [
        'relation' => 'AND',
        [
            'key' => 'user_id',
            'value' => $user_id,
            'compare' => '='
        ],
        [
            'key' => 'serial_no',
            'value' => $serial_no,
            'compare' => '='
        ]
    ];

    $posts = get_posts([
        'post_type' => 'model_purchase_point',
        'posts_per_page' => -1,
        'post_status' => 'any',
        'meta_query' => $meta_query
    ]);

    $deleted_posts = 0;
    $found_matching_post = false;
    
    foreach ($posts as $post) {
        // Get serial_no and user_id from post meta to verify they match
        $post_serial_no = get_post_meta($post->ID, 'serial_no', true);
        $post_user_id = get_post_meta($post->ID, 'user_id', true);
        
        // Verify post meta serial_no and user_id match the provided values
        if ($post_serial_no === $serial_no && intval($post_user_id) === $user_id) {
            $found_matching_post = true;
            // Delete post (this will also delete all postmeta automatically)
            wp_delete_post($post->ID, true);
            $deleted_posts++;
        }
    }

    // 2. Delete from points_log table only if:
    //    - We found a matching post with serial_no and user_id that match
    //    - user_id matches in points_log
    //    - serial_no from post meta matches serial_no in points_log table
    $table_name = $wpdb->prefix . 'points_log';
    $deleted_rows = 0;
    
    // Only delete from points_log if we found matching posts with matching serial_no and user_id
    if ($found_matching_post) {
        // Verify that points_log has a record with matching user_id and serial_no
        $log_exists = $wpdb->get_var($wpdb->prepare(
            "SELECT COUNT(*) FROM $table_name 
             WHERE user_id = %d AND serial_no = %s",
            $user_id,
            $serial_no
        ));

        if ($log_exists > 0) {
            // Delete from points_log where user_id and serial_no match
            $deleted_rows = $wpdb->delete(
                $table_name,
                [
                    'user_id' => $user_id,
                    'serial_no' => $serial_no
                ],
                [
                    '%d', // user_id
                    '%s'  // serial_no
                ]
            );

            if ($deleted_rows === false) {
                wp_send_json_error(['message' => 'Failed to delete from points_log table.']);
                return;
            }
        } else {
            wp_send_json_error(['message' => 'No matching record found in points_log table with the provided user_id and serial_no.']);
            return;
        }
    } else {
        // No matching posts found or serial_no/user_id mismatch
        wp_send_json_error(['message' => 'No matching posts found with the provided user_id and serial_no.']);
        return;
    }

    wp_send_json_success([
        'message' => "Successfully deleted record. Removed {$deleted_posts} post(s) and {$deleted_rows} row(s) from points_log table."
    ]);
}









add_action('wp_ajax_get_products_by_brand', 'get_products_by_brand');
add_action('wp_ajax_nopriv_get_products_by_brand', 'get_products_by_brand');

function get_products_by_brand()
{
    $brand_id = intval($_POST['brand_id']);

    $args = [
        'post_type' => 'loyalty_products',
        'posts_per_page' => -1,
        'tax_query' => [
            [
                'taxonomy' => 'brands',
                'field'    => 'term_id',
                'terms'    => $brand_id,
            ],
        ],
    ];

    $products = get_posts($args);
    $result = [];

    foreach ($products as $product) {
        $result[] = [
            'id' => $product->ID,
            'title' => get_the_title($product->ID),
            'part_no' => get_field('part_no', $product->ID),
        ];
    }

    wp_send_json_success($result);
}



function points_history_content()
{
    global $wpdb;

    echo '<h2 class="woocommerce-Address-title title f__h3">Points History</h2>';

    $user_id = get_current_user_id();

    // Fetch points log from custom table
    $results = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM {$wpdb->prefix}points_log WHERE user_id = %d ORDER BY created_at DESC",
            $user_id
        )
    );


    // if (!empty($results)) {
    //     echo '<div class="woocommerce-account-points-history spacing__12">';
    //     echo '<table class="shop_table shop_table_responsive my_account_points_history table">';
    //     echo '<thead>
    //             <tr>
    //                 <th>Date</th>
    //                 <th>Points</th>  
    //                 <th>Cutt Off Points</th>              
    //                 <th>Reason</th>
    //                 <th>Membership Tier</th>
    //                 <th>Points Expiry</th>

    //             </tr>
    //           </thead>';
    //     echo '<tbody>';

    //     foreach ($results as $row) {
    //         $post_title = get_the_title($row->membership_tier_id);

    //         // Default expiry date
    //         $date_expire = date('d-m-Y', strtotime($row->expiry_date));

    //         // Override logic
    //         if (strtolower($post_title) === 'bronze') {
    //             $date_expire = 'No Expiry';
    //         } elseif (!empty($row->cutoff_points)) {
    //             $date_expire = '--';
    //         }

    //         echo '<tr>';
    //         echo '<td>' . esc_html(date('d-m-Y', strtotime($row->created_at))) . '</td>';
    //         echo '<td>' . esc_html($row->points) . '</td>';
    //         echo '<td>' . esc_html($row->cutoff_points) . '</td>';
    //         echo '<td>' . esc_html($row->reson) . '</td>';
    //         echo '<td><a href="http://103.191.209.121/sigma/loyalty-program/#loyalty-section" class="haver__cl" target="_blank">' . esc_html($post_title) . '</a></td>';
    //         echo '<td>' . esc_html($date_expire) . '</td>';
    //         echo '</tr>';
    //     }

    //     echo '</tbody>';
    //     echo '</table>';
    //     echo '</div>';
    // } else {
    //     echo '<p>You have no point history yet.</p>';
    // }

    if (!empty($results)) {
        echo '<div class="woocommerce-account-points-history points__history">';

        // Check if mobile and apply table class accordingly
        if (wp_is_mobile()) {
            echo '<table class="table">';
        } else {
            echo '<table class="shop_table shop_table_responsive my_account_points_history table">';
        }

        echo '<thead>
            <tr>
                <th>Date</th>
                <th>Points</th>  
                <th>Cut Off Points</th>              
                <th>Reason</th>
                <th>Membership Tier</th>
                <th>Points Expiry</th>
            </tr>
          </thead>';
        echo '<tbody>';

        foreach ($results as $row) {
            $post_title = get_the_title($row->membership_tier_id);
            $date_expire = date('d-m-Y', strtotime($row->expiry_date));

            // Custom expiry logic
            if (strtolower($post_title) === 'bronze') {
                $date_expire = 'No Expiry';
            } elseif (!empty($row->cutoff_points)) {
                $date_expire = '--';
            }

            echo '<tr>';
            echo '<td>' . esc_html(date('d-m-Y', strtotime($row->created_at))) . '</td>';
            echo '<td>' . esc_html($row->points) . '</td>';
            echo '<td>' . esc_html($row->cutoff_points) . '</td>';
            echo '<td>' . esc_html($row->reson) . '</td>';
            echo '<td><a href="http://103.191.209.121/sigma/loyalty-program/#loyalty-section" class="haver__cl" target="_blank">' . esc_html($post_title) . '</a></td>';
            echo '<td>' . esc_html($date_expire) . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo '<p>You have no point history yet.</p>';
    }
}

add_action('woocommerce_account_points-history_endpoint', 'points_history_content');

//exchange old product

function exchange_old_product_content()
{
    echo '<div class="container">';
    echo '<h2 class="section__title f__h3">Exchange Your Old Product</h2>';
    echo do_shortcode('[contact-form-7 id="fca21eb" title="Exchange old product Form"]');
    echo '</div>';
}

add_action('woocommerce_account_exchange-old-product_endpoint', 'exchange_old_product_content');

//product rental

function product_rental_content()
{
    echo '<div class="container">';
    echo '<h2 class="section__title f__h3">Rent Product</h2>';
    echo do_shortcode(' [contact-form-7 id="965a835" title="Product Rental Form"]');
    echo '</div>';
}

add_action('woocommerce_account_product-rental_endpoint', 'product_rental_content');

//service registration

function service_registration_content()
{
    echo '<div class="container">';
    echo '<h2 class="section__title f__h3">Service Registration</h2>';
    echo do_shortcode('  [contact-form-7 id="dfaf7ed" title="Service registration Form"]');
    echo '</div>';
}

add_action('woocommerce_account_service-registration_endpoint', 'service_registration_content');


// genre taxonomy user section

function register_user_genre_taxonomy()
{
    register_taxonomy(
        'genre_of_photography',
        'user',
        array(
            'public'        => true,
            'hierarchical'  => true,
            'show_ui'       => true,
            'show_in_menu'  => false,
            'labels'        => array(
                'name'              => 'Genres of Photography',
                'singular_name'     => 'Genre of Photography',
                'menu_name'         => 'Genres of Photography',
                'all_items'         => 'All Genres',
                'edit_item'         => 'Edit Genre',
                'view_item'         => 'View Genre',
                'update_item'       => 'Update Genre',
                'add_new_item'      => 'Add New Genre',
                'new_item_name'     => 'New Genre Name',
                'search_items'      => 'Search Genres',
            ),
            'capabilities' => array(
                'manage_terms' => 'edit_users',
                'edit_terms'   => 'edit_users',
                'delete_terms' => 'edit_users',
                'assign_terms' => 'read',
            ),
        )
    );
}
add_action('init', 'register_user_genre_taxonomy', 0);

function add_genre_taxonomy_to_user_menu()
{
    add_users_page(
        'Genres of Photography',
        'Genres of Photography',
        'edit_users',
        'edit-tags.php?taxonomy=genre_of_photography'
    );
}
add_action('admin_menu', 'add_genre_taxonomy_to_user_menu');

// return false genereate password link
add_filter('woocommerce_registration_generate_password', '__return_false');

add_action('woocommerce_created_customer', 'custom_save_user_registration_fields');

function custom_save_user_registration_fields($customer_id)
{
    // Save Name
    if (! empty($_POST['fullname'])) {
        update_user_meta($customer_id, 'name', sanitize_text_field($_POST['fullname']));
        wp_update_user(array(
            'ID'           => $customer_id,
            'display_name' => sanitize_text_field($_POST['fullname']),
        ));
    }

    // Save Occupation
    if (! empty($_POST['occupation'])) {
        update_user_meta($customer_id, 'occupation', sanitize_text_field($_POST['occupation']));
    }

    // Save Genre of Photography (as taxonomy)
    if (! empty($_POST['genre_pic'])) {
        $term_id = intval($_POST['genre_pic']);
        wp_set_object_terms($customer_id, array($term_id), 'genre_of_photography');
    }

    // Update Password
    if (! empty($_POST['password'])) {
        wp_set_password($_POST['password'], $customer_id);
    }
    update_user_meta($customer_id, 'account_activation_pending', 1);

    // Generate activation key
    $activation_key = wp_generate_password(20, false);
    update_user_meta($customer_id, 'account_activation_key', $activation_key);

    update_user_meta($customer_id, 'assigned_membership_tier', 2383);

    $assigned_date = current_time('Y-m-d');
    update_user_meta($customer_id, 'membership_assigned_date', $assigned_date);

    $validity_months = intval(get_post_meta(2383, 'validity_months', true));

    $expiry_date = date('Y-m-d', strtotime("+$validity_months days", strtotime($assigned_date)));

    update_user_meta($customer_id, 'membership_expiry_date', $expiry_date);
}


add_action('woocommerce_registration_redirect', 'redirect_after_registration_based_on_activation', 10, 1);

function redirect_after_registration_based_on_activation($redirect)
{
    $user_id = get_current_user_id();
    $is_pending = get_user_meta($user_id, 'account_activation_pending', true);

    if ($is_pending) {
        // Log them out immediately
        wp_logout();

        // Redirect to a notice page or login page with message
        return wc_get_page_permalink('myaccount') . '?activation_required=1';
    }

    // If activated, continue to default redirect
    return $redirect;
}


add_filter('authenticate', 'block_login_if_not_activated', 30, 3);

function block_login_if_not_activated($user, $username, $password)
{
    if (is_wp_error($user)) {
        return $user;
    }

    $pending = get_user_meta($user->ID, 'account_activation_pending', true);
    if ($pending) {
        return new WP_Error('activation_required', __('Please activate your account via the email we sent you.', 'woocommerce'));
    }

    return $user;
}

add_action('init', 'handle_account_activation_link');

function handle_account_activation_link()
{
    if (isset($_GET['activate_account'], $_GET['key'])) {
        $user_id = absint($_GET['activate_account']);
        $key     = sanitize_text_field($_GET['key']);

        $saved_key = get_user_meta($user_id, 'account_activation_key', true);

        if ($saved_key && hash_equals($saved_key, $key)) {

            update_user_meta($user_id, 'account_activated', 1);
            delete_user_meta($user_id, 'account_activation_key');
            delete_user_meta($user_id, 'account_activation_pending');


            wp_redirect(wc_get_page_permalink('myaccount') . '?activated=1');
            exit;
        } else {

            wp_redirect(wc_get_page_permalink('myaccount') . '?activation_failed=1');
            exit;
        }
    }
}


add_action('woocommerce_register_post', 'custom_validate_registration_fields', 10, 3);


function custom_validate_registration_fields($username, $email, $validation_errors)
{
    if (empty($_POST['fullname'])) {
        $validation_errors->add('name_error', __('Please enter your name.', 'woocommerce'));
    }
    if (empty($_POST['occupation'])) {
        $validation_errors->add('occupation_error', __('Please enter your occupation.', 'woocommerce'));
    }
    if (empty($_POST['genre_pic'])) {
        $validation_errors->add('genre_error', __('Please select a genre of photography.', 'woocommerce'));
    }
    return $validation_errors;
}

add_action('woocommerce_before_customer_login_form', 'show_activation_success_notice');
function show_activation_success_notice()
{
    if (isset($_GET['activation_required'])) {
        wc_print_notice(__('Please check your email and activate your account before logging in.', 'woocommerce'), 'notice');
    }
    if (isset($_GET['activated'])) {
        wc_print_notice(__('Your account has been activated. You may now log in.', 'woocommerce'), 'success');
    }

    if (isset($_GET['activation_failed'])) {
        wc_print_notice(__('Activation failed. The link may be invalid or expired.', 'woocommerce'), 'error');
    }
}

add_action('woocommerce_product_options_advanced', 'add_points_field_for_gifting_category');
function add_points_field_for_gifting_category()
{
    global $post;

    // Check if product has 'gifting' category
    $product_id = $post->ID;
    $has_gifting = has_term('gifting', 'product_cat', $product_id);

    if ($has_gifting) {
        woocommerce_wp_text_input(array(
            'id'          => '_points_id',
            'label'       => __('Give Away Points', 'woocommerce'),
            'placeholder' => esc_html__('Enter a value', 'woocommerce'),
            'desc_tip'    => true,
            'description' => esc_html__('Add Give Away Points on Products.', 'woocommerce'),
        ));
    }
}

add_action('woocommerce_process_product_meta', 'save_points_field');
function save_points_field($post_id)
{
    if (isset($_POST['_points_id'])) {
        update_post_meta($post_id, '_points_id', sanitize_text_field($_POST['_points_id']));
    }
}

add_action('woocommerce_single_product_summary', 'show_points_cart_section');

function show_points_cart_section()
{
    global $product;
    $product_id = $product->get_id();
    $points = get_post_meta($product_id, '_points_id', true);
    if ($points) {
        echo '<p class="purchase-with-points" style="font-weight:bold; color:#d35400;">You can purchase this product with ' . esc_html($points) . ' redeem points.</p>';
    }
}


add_filter('woocommerce_get_price_html', 'wk_show_points_next_to_price', 20, 2);

function wk_show_points_next_to_price($price_html, $product)
{
    if (is_product() && $product->is_type('simple')) {
        $points = get_post_meta($product->get_id(), '_points_id', true);

        if (!empty($points)) {
            $points_text = '<span class="product-points"> + ' . esc_html($points) . ' points</span>';
            $price_html .= $points_text;
        }
    }
    return $price_html;
}

// 2. Add custom cart item data
add_filter('woocommerce_add_cart_item_data', 'wk_add_cart_item_data', 10, 3);
function wk_add_cart_item_data($cart_item_data, $product_id, $variation_id)
{
    $points = get_post_meta($product_id, '_points_id', true);

    if (!empty($points)) {
        $cart_item_data['points'] = (int) sanitize_text_field($points);
    }
    $product = wc_get_product($product_id);
    $online_purchase_points = (int) $product->get_meta('_online_purchase_points');
    if ($online_purchase_points > 0) {
        $cart_item_data['online_purchase_points'] = $online_purchase_points;
    }
    return $cart_item_data;
}

add_filter('woocommerce_add_to_cart_validation', 'validate_points_or_price_before_add_to_cart', 10, 3);

function validate_points_or_price_before_add_to_cart($passed, $product_id, $quantity)
{
    $product = wc_get_product($product_id);
    // Basic checks
    if (!$product || !$product->exists()) {
        wc_add_notice(__('Invalid product.'), 'error');
        return false;
    }
    // Check if product is in stock and quantity > 0
    if (!$product->is_in_stock() || $product->get_stock_quantity() <= 0) {
        wc_add_notice(__('This product is currently out of stock.'), 'error');
        return false;
    }
    $price = $product->get_price();
    $points = get_post_meta($product_id, '_points_id', true);

    if ($price === '' && empty($points)) {
        wc_add_notice(__('This product cannot be purchased — it must have a price or redeem points assigned.'), 'error');
        return false;
    }

    if (!empty($points)) {
        $user_id = get_current_user_id();
        $user_points = (int) get_valid_points_for_user($user_id);

        if ($user_points < ($points * $quantity)) {
            wc_add_notice(__('You do not have enough points to redeem this product.'), 'error');
            return false;
        }
    }

    return $passed;
}



add_filter('woocommerce_is_purchasable', 'make_points_only_products_purchasable', 10, 2);

function make_points_only_products_purchasable($purchasable, $product)
{
    // Only override if price is empty and points are set
    if ($product->get_price() === '' || $product->get_price() === null) {
        $points = get_post_meta($product->get_id(), '_points_id', true);
        if (!empty($points)) {
            return true; // Allow purchase
        }
    }
    return $purchasable;
}

// 3. Restore cart item data from session (necessary for Woo Blocks)
add_filter('woocommerce_cart_loaded_from_session', function ($cart) {
    foreach ($cart->get_cart() as $cart_item_key => $cart_item) {
        if (isset($cart_item['points'])) {
            $cart->cart_contents[$cart_item_key]['points'] = $cart_item['points'];
        }
    }
    return $cart;
}, 10, 1);

// 4. Show custom item data in cart
add_filter('woocommerce_get_item_data', 'wk_get_item_data', 10, 2);
function wk_get_item_data($item_data, $cart_item_data)
{
    if (isset($cart_item_data['points'])) {
        $item_data[] = array(
            'key'   => __('Redeem Points', 'woocommerce'),
            'value' => wc_clean($cart_item_data['points']),
        );
    }
    return $item_data;
}


add_action('woocommerce_checkout_create_order_line_item', 'wc_add_points_to_order_item_meta', 10, 4);
function wc_add_points_to_order_item_meta($item, $cart_item_key, $values, $order)
{

    if (isset($values['online_purchase_points'])) {
        $item->add_meta_data('online_purchase_points', $values['online_purchase_points'], true);
    }
}

function exclude_gifting_category_from_shop($q)
{
    if (! is_admin() && $q->is_main_query() && is_shop()) {
        $tax_query = (array) $q->get('tax_query');
        $tax_query[] = array(
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => array('gifting'), // Slug of the category to hide
            'operator' => 'NOT IN',
        );
        $q->set('tax_query', $tax_query);
    }
}
add_action('pre_get_posts', 'exclude_gifting_category_from_shop');


//gift product display
add_action('woocommerce_product_query', function ($q) {
    if (is_shop() || is_product_category() || is_product_tag()) {
        $user_id = get_current_user_id();
        $current_membership_id = get_user_meta($user_id, 'assigned_membership_tier', true);

        if ($current_membership_id) {
            $allowed_products = get_post_meta($current_membership_id, 'gifting_products', true);

            if (!empty($allowed_products)) {
                // Force shop page to only show allowed products
                $q->set('post__in', $allowed_products);
            }
        }
    }
});

add_action('woocommerce_review_order_before_submit', 'validate_user_points_before_order', 10, 0);


function validate_user_points_before_order()
{

    if (is_user_logged_in()) {
        $user_id = get_current_user_id();

        // Get the user's points balance
        global $wpdb;
        $table = $wpdb->prefix . 'points_log';
        $results = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT SUM(points) as total_points, SUM(cutoff_points) as used_points 
                 FROM $table 
                 WHERE user_id = %d",
                $user_id
            ),
            ARRAY_A
        );

        $total_points = isset($results['total_points']) ? (int) $results['total_points'] : 0;
        $used_points  = isset($results['used_points'])  ? (int) $results['used_points']  : 0;
        $available_points = max(0, $total_points - $used_points);

        $required_points = 0;

        // Calculate the required points from cart items
        foreach (WC()->cart->get_cart() as $cart_item) {
            $points = (int) $cart_item['data']->get_meta('points');  // Assuming you store points as product meta
            $qty = $cart_item['quantity'];
            $required_points += $points * $qty;
        }

        // If the user doesn't have enough points, show an error and prevent checkout
        if ($required_points > $available_points) {
            wc_add_notice(
                sprintf('You do not have enough points to proceed with this purchase. Required: %d, Available: %d', $required_points, $available_points),
                'error'
            );
        }
    }
}

// purchase products by points

add_action('woocommerce_store_api_checkout_order_processed', 'online_purchase_products_points');

function online_purchase_products_points($order=5313)
{
    
    //echo "Hello";
    
    
    if (is_numeric($order)) {
        $order = wc_get_order($order);
    }

    if (!$order || !is_a($order, 'WC_Order')) return;

    $user_id = $order->get_user_id();
    if (!$user_id) return;

    global $wpdb;
    $table = $wpdb->prefix . 'points_log';
    $total_used_points = 0;

    // Calculate the total points required for this order
    foreach ($order->get_items() as $item) {
        //$points = (int) $item->get_meta('_points_id');
        $product_id = $item->get_product_id();
        $points = get_post_meta($product_id, '_points_id', true);
        $qty = $item->get_quantity();
        $total_used_points += ($points * $qty);
    }
    
    
    if ($total_used_points <= 0) return;
    
    $today = current_time('Y-m-d');

    // Get only valid, unexpired, and unused points
    $results = $wpdb->get_row(
        $wpdb->prepare(
            "SELECT 
            SUM(points) as total_points, 
            SUM(cutoff_points) as used_points 
         FROM $table 
         WHERE user_id = %d
           AND expiry_date >= %s
           AND cutoff_points < points",
            $user_id,
            $today
        ),
        ARRAY_A
    );

    $total_points = isset($results['total_points']) ? (int) $results['total_points'] : 0;
    $used_points  = isset($results['used_points'])  ? (int) $results['used_points']  : 0;
    $available_points = max(0, $total_points - $used_points);

    // Check if user has enough points for the order
    if ($total_used_points > $available_points) {

        wc_add_notice(
            sprintf('You do not have enough points to proceed with this purchase. Required: %d, Available: %d', $total_used_points, $available_points),
            'error'
        );
        return; // Stop the order process
    }

    // Save used points to order meta
    $order->update_meta_data('_used_reward_points', $total_used_points);
    $order->save();

    // Get user points (FIFO)
    $rows = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT id, points, cutoff_points FROM $table WHERE user_id = %d AND cutoff_points < points ORDER BY created_at ASC",
            $user_id
        )
    );
    $current_membership = get_user_meta($user_id, 'assigned_membership_tier', true);
    $earned_at = current_time('d-m-Y');
    $validity_days = get_post_meta($current_membership, 'validity_months', true); // actually days
    $calculated_expiry_date = date('d-m-Y', strtotime("+$validity_days days", strtotime($earned_at)));
    $order_id = $order->get_id();
    $post_title = "User $user_id - Purchase Products By Points -$order_id";
    $post_id = wp_insert_post([
        'post_type' => 'purchase_product_by_points',
        'post_status' => 'publish',
        'post_title' => $post_title,
        'meta_input' => [
            'user_id' => $user_id,
            'order_id' => $order->get_id(),
            'points' => $total_used_points,
            'membership_tier_id' => $current_membership,
            'expiry_date'   => $calculated_expiry_date,
        ]
    ]);

    foreach ($rows as $row) {
        if ($total_used_points <= 0) break;

        $available = $row->points - $row->cutoff_points;
        $to_deduct = min($available, $total_used_points);

        // Get product names from the order
        $product_names = [];
        foreach ($order->get_items() as $item) {
            $product_names[] = $item->get_name();
        }
        $reason_text = 'Online Purchase of model using points: ' . implode(', ', $product_names);
        $current_membership = get_user_meta($user_id, 'assigned_membership_tier', true);
        $earned_at = current_time('Y-m-d');
        $validity_days = get_post_meta($current_membership, 'validity_months', true); // actually days
        $calculated_expiry_date = date('Y-m-d', strtotime("+$validity_days days", strtotime($earned_at)));

        $wpdb->insert(
            $table,
            [
                'user_id'       => $user_id,
                'points'        => 0,
                'cutoff_points' => $to_deduct,
                'reson'         => $reason_text,
                'membership_tier_id' => $current_membership,
                'expiry_date'   => $calculated_expiry_date,
                'created_at'    => current_time('mysql'),
            ],
            ['%d', '%d', '%d', '%s', '%s', '%s', '%s']
        );

        $total_used_points -= $to_deduct;
        update_user_membership_tier($user_id);
    }
}


// add_action('init', function() {
//     // Call the function with default or custom parameter
//     online_purchase_products_points(5313);
// });














if (!wp_next_scheduled('check_expiring_points_daily')) {
    wp_schedule_event(time(), 'daily', 'check_expiring_points_daily');
}

add_action('check_expiring_points_daily', 'check_points_expiring_soon');

function check_points_expiring_soon()
{
    global $wpdb;

    $table = $wpdb->prefix . 'points_log';
    $today = current_time('Y-m-d');
    $target_date = date('Y-m-d', strtotime('+7 days', strtotime($today)));

    // Get all points expiring in exactly 7 days
    $results = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM $table WHERE expiry_date = %s",
            $target_date
        )
    );

    foreach ($results as $entry) {
        $user_id = $entry->user_id;
        $points = $entry->points;

        $user_info = get_userdata($user_id);
        if ($user_info && !empty($user_info->user_email)) {
            $to = $user_info->user_email;
            $subject = "Your points are about to expire!";
            $message = "Hi {$user_info->display_name},\n\nYou have $points points that will expire on {$entry->expiry_date}. Be sure to use them soon!";
            wp_mail($to, $subject, $message);
        }
    }
}

add_action('woocommerce_checkout_create_order_line_item', 'save_points_to_order_item', 10, 4);
function save_points_to_order_item($item, $cart_item_key, $values, $order)
{

    if (isset($values['data'])) {
        $points = (int) $values['data']->get_meta('points');
        if ($points > 0) {
            $item->add_meta_data('points', $points, true);
        }
    }
}

// add user role 

// Create sub-admin and pending user roles
// 1. Add Custom Roles
function custom_add_roles() {
    add_role('sub_admin', 'Sub Admin', [
        'read' => true,
        'list_users' => true,
        'edit_users' => true,
    ]);

    add_role('pending_user', 'Pending User', [
        'read' => false
    ]);
}
add_action('init', 'custom_add_roles');

// 2. Set pending_user role on registration
add_action('user_register', function ($user_id) {
    $user = get_user_by('ID', $user_id);
    if ($user) {
        $user->set_role('pending_user');
    }
});

// 3. Add Verify Users Admin Menu
add_action('admin_menu', function () {
    if (current_user_can('sub_admin') || current_user_can('administrator')) {
        add_menu_page(
            'Verify Users',
            'Verify Users',
            'read',
            'verify-users',
            'render_verify_users_page',
            'dashicons-yes',
            26
        );
    }
});

// 4. Render Verify Users Page
function render_verify_users_page() {
    $args = [
        'role__in' => ['pending_user', 'subscriber'],
        'orderby'  => 'registered',
        'order'    => 'DESC'
    ];

    $users = get_users($args);

    echo '<div class="wrap"><h1>Pending User Verifications</h1>';
    if (empty($users)) {
        echo '<p>No users found.</p>';
    } else {
        echo '<table class="widefat"><thead><tr><th>Email</th><th>Registered</th><th>Status</th></tr></thead><tbody>';
        foreach ($users as $user) {
            $role = $user->roles[0];

            echo '<tr>';
            echo '<td>' . esc_html($user->user_email) . '</td>';
            echo '<td>' . esc_html($user->user_registered) . '</td>';
            echo '<td>';

            if ($role === 'pending_user') {
                echo '<form method="post">
                        <input type="hidden" name="verify_user_id" value="' . esc_attr($user->ID) . '">
                        <input type="submit" name="verify_user" class="button button-primary" value="Accept">
                        ' . wp_nonce_field('verify_user_action_' . $user->ID, '_verify_nonce', true, false) . '
                      </form>';
            } else {
                echo '<span style="color: green; font-weight: bold;">Accepted</span>';
            }

            echo '</td></tr>';
        }
        echo '</tbody></table>';
    }
    echo '</div>';
}

// 5. Handle Verification + Email
add_action('admin_init', function () {
    if (isset($_POST['verify_user'], $_POST['verify_user_id'], $_POST['_verify_nonce']) && current_user_can('sub_admin')) {
        $user_id = intval($_POST['verify_user_id']);

        if (!wp_verify_nonce($_POST['_verify_nonce'], 'verify_user_action_' . $user_id)) {
            wp_die('Security check failed');
        }

        $user = get_user_by('ID', $user_id);
        if ($user) {
            // Approve user by setting role
            $user->set_role('subscriber');

            // Send password reset email
            $reset_link = wp_lostpassword_url();

            wp_mail(
                $user->user_email,
                'Your Account Has Been Approved',
                "Hello,\n\nYour account has been approved. Please click the link below to set your password and log in:\n\n" . $reset_link . "\n\nThank you!"
            );

            add_action('admin_notices', function () {
                echo '<div class="notice notice-success is-dismissible"><p>User verified and notified by email.</p></div>';
            });
        }
    }
});

// 6. Optional: Handle Custom Login Form (if used)
function handle_custom_login_form() {
    if (!isset($_POST['custom_login_form'])) {
        return;
    }

    $creds = array(
        'user_login'    => sanitize_user($_POST['log']),
        'user_password' => $_POST['pwd'],
        'remember'      => true
    );

    $user = wp_signon($creds, is_ssl());

    if (is_wp_error($user)) {
        wp_redirect(add_query_arg('login', 'failed', wp_get_referer()));
        exit;
    } else {
        wp_redirect(home_url('/my-account/'));
        exit;
    }
}
add_action('init', 'handle_custom_login_form');


// Add checkbox field to Add Category form
add_action('product_cat_add_form_fields', function () {
?>
    <div class="form-field">
        <label for="cat_visibility">Visible</label>
        <input type="checkbox" name="cat_visibility" id="cat_visibility" value="yes" checked />
        <p class="description">Check to make this category visible.</p>
    </div>
<?php
});

// Add checkbox field to Edit Category form
add_action('product_cat_edit_form_fields', function ($term) {
    $value = get_term_meta($term->term_id, 'cat_visibility', true);
?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="cat_visibility">Visible</label></th>
        <td>
            <input type="checkbox" name="cat_visibility" id="cat_visibility" value="yes" <?php checked($value, 'yes'); ?> />
            <p class="description">Check to make this category visible.</p>
        </td>
    </tr>
    <?php
});

// Save checkbox value
add_action('created_product_cat', 'save_cat_visibility');
add_action('edited_product_cat', 'save_cat_visibility');
function save_cat_visibility($term_id)
{
    $is_visible = isset($_POST['cat_visibility']) ? 'yes' : 'no';

    update_term_meta($term_id, 'cat_visibility', $is_visible);
}

add_action('pre_get_posts', 'restrict_search_to_posts_only');
function restrict_search_to_posts_only($query)
{
    if ($query->is_search() && $query->is_main_query() && !is_admin()) {
        $query->set('post_type', 'post');
    }
}

function track_search_queries()
{
    if (is_search() && !is_admin()) {
        $search_term = sanitize_text_field(get_search_query());
        $normalized_term = strtolower(trim($search_term)); // normalize

        if (!empty($normalized_term)) {
            $hash = md5($normalized_term);
            $count = get_option('popular_search_' . $hash, 0);
            update_option('popular_search_' . $hash, $count + 1);

            // Only store the first display version (original case)
            if ($count === 0) {
                update_option('popular_search_term_' . $hash, $search_term);
            }
        }
    }
}

add_action('template_redirect', 'track_search_queries');

function get_popular_searches($limit = 5)
{
    global $wpdb;
    $options = wp_load_alloptions();
    $search_terms = [];

    foreach ($options as $key => $value) {
        if (strpos($key, 'popular_search_') === 0 && strpos($key, 'term_') === false) {
            $hash = str_replace('popular_search_', '', $key);
            $term = get_option('popular_search_term_' . $hash);
            if ($term) {
                $search_terms[$term] = (int) $value;
            }
        }
    }

    arsort($search_terms);
    return array_slice($search_terms, 0, $limit, true);
}

add_action('wp_ajax_filter_posts_paginated', 'handle_filtered_posts_paginated');
add_action('wp_ajax_nopriv_filter_posts_paginated', 'handle_filtered_posts_paginated');

function handle_filtered_posts_paginated()
{
    $paged = isset($_POST['page']) ? max(1, intval($_POST['page'])) : 1;
    $year = isset($_POST['year']) ? intval($_POST['year']) : '';
    $cat = isset($_POST['category']) ? intval($_POST['category']) : '';

    $args = [
        'post_type' => 'post',
        'posts_per_page' => 10,
        'paged' => $paged,
    ];

    if ($year) $args['year'] = $year;
    if ($cat) $args['cat'] = $cat;

    $query = new WP_Query($args);

    ob_start();
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $category = get_the_category();
    ?>
            <li>
                <a href="<?php the_permalink(); ?>" class="c__news__list__item l__grid">
                    <p class="f__ul c__news__list__date"><?php echo get_the_date('Y.m.d'); ?></p>
                    <p class="f__ul c__news__list__ttl"><?php the_title(); ?></p>
                    <p class="f__ul c__news__list__cat f__uppercase"><?php echo esc_html($category[0]->name ?? ''); ?></p>
                </a>
            </li>
        <?php
        endwhile;
    else :
        echo '<li><p>No posts found.</p></li>';
    endif;
    $posts_html = ob_get_clean();

    ob_start();
    $total_pages = $query->max_num_pages;
    if ($total_pages > 1) {
        $current = max(1, $paged);
        ?>
        <div class="c__pagenation__side">
            <a class="m__btnsquare arw__backward <?= $current == 1 ? 'disabled' : '' ?>" href="#" data-page="<?= $current - 1 ?>"></a>
        </div>
        <div class="c__pagenation__center">
            <ul class="c__pagenation__list numWrap">
                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <li class="num">
                        <a class="m__btnsquare <?= $i == $current ? 'disabled' : '' ?>" href="#" data-page="<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </div>
        <div class="c__pagenation__side">
            <a class="m__btnsquare arw__forward <?= $current == $total_pages ? 'disabled' : '' ?>" href="#" data-page="<?= $current + 1 ?>"></a>
        </div>
        <?php
    }
    $pagination_html = ob_get_clean();

    wp_send_json([
        'posts' => $posts_html,
        'pagination' => $pagination_html,
    ]);
}
function sigma_encrypt($data)
{
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function sigma_decrypt($data)
{
    return base64_decode(strtr($data, '-_', '+/'));
}
add_action('template_redirect', function () {

    if (is_product_category('lenses')) {
        $term = get_queried_object();
        $cat_id = $term->term_id;
        $encrypted = sigma_encrypt($cat_id);
        wp_redirect(home_url('/sigma/product-listing-lenses/?cat_id=' . $encrypted), 301);
        exit;
    }
    if (is_product_category('accessories')) {
        $term = get_queried_object();
        $cat_id = $term->term_id;
        $encrypted = sigma_encrypt($cat_id);

        wp_redirect(home_url('/sigma/product-listing-accessories/?cat_id=' . $encrypted), 301);
        exit;
    }
    if (is_product_category('cameras')) {
        $term = get_queried_object();
        $cat_id = $term->term_id;
        $encrypted = sigma_encrypt($cat_id);

        wp_redirect(home_url('/sigma/product-listing-cameras/?cat_id=' . $encrypted), 301);
        exit;
    }
    if (is_product_category('cine-lenses')) {
        $term = get_queried_object();
        $cat_id = $term->term_id;
        $encrypted = sigma_encrypt($cat_id);

        wp_redirect(home_url('/sigma/product-listing-cine-lenses/?cat_id=' . $encrypted), 301);
        exit;
    }
    if (is_product_category('discontinued-models')) {
        $term = get_queried_object();
        $cat_id = $term->term_id;
        $encrypted = sigma_encrypt($cat_id);

        wp_redirect(home_url('/sigma/product-listing-discountiue-models/?cat_id=' . $encrypted), 301);
        exit;
    }
    if (is_product_category('stills')) {
        $term = get_queried_object();
        $cat_id = $term->term_id;
        $encrypted = sigma_encrypt($cat_id);

        wp_redirect(home_url('/sigma/stills/?cat_id=' . $encrypted), 301);
        exit;
    }
});
function register_product_feature_taxonomies()
{
    $taxonomies = [
        'format' => 'Format',
        'mount' => 'Mount',
        'sensor' => 'Sensor Size',
        'type' => 'Lens Type',
        'angle' => 'Angle of View',
    ];

    foreach ($taxonomies as $slug => $label) {
        register_taxonomy($slug, 'product', [
            'labels' => [
                'name' => $label,
                'singular_name' => $label,
            ],
            'public' => true,
            'hierarchical' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'rewrite' => ['slug' => $slug],
        ]);
    }
}
add_action('init', 'register_product_feature_taxonomies');

add_action('wp_ajax_filter_products', 'handle_filter_products');
add_action('wp_ajax_nopriv_filter_products', 'handle_filter_products');

function handle_filter_products()
{
    $tax_query = ['relation' => 'AND'];
    $cat_id = isset($_POST['cat_id']) ? intval($_POST['cat_id']) : 0;

    // $is_filtered = !empty($_POST['concept']) || !empty($_POST['format']) || !empty($_POST['mount']) || !empty($_POST['sensor']) || !empty($_POST['type']) || !empty($_POST['angle']);

    // $taxonomies = ['format', 'mount', 'sensor', 'type', 'angle'];
    $image1 = get_field('image1', 2649);
    $image2 = get_field('image2', 2649);
    $image3 = get_field('image3', 2649);
    $exclude_taxonomies = [
        'product_type',
        'product_visibility',
        'pa_mount',
        'product_model',
        'popular_categories',
        'product_cat',
        'product_tag',
        'product_shipping_class',
    ];

    $all_taxonomies = get_object_taxonomies('product', 'objects');
    $taxonomies = [];

    foreach ($all_taxonomies as $taxonomy) {
        if (!in_array($taxonomy->name, $exclude_taxonomies)) {
            $taxonomies[$taxonomy->name] = $taxonomy->label;
        }
    }

    // Detect if any filter is applied
    $is_filtered = false;
    foreach (array_keys($taxonomies) as $taxonomy_name) {
        if (!empty($_POST[$taxonomy_name])) {
            $is_filtered = true;
            break;
        }
    }
    if (!empty($_POST['concept'])) {
        $is_filtered = true;
    }

    $tax_query = ['relation' => 'AND'];

    // Add dynamic taxonomy filters
    foreach (array_keys($taxonomies) as $taxonomy_slug) {
        if (!empty($_POST[$taxonomy_slug])) {
            $tax_query[] = [
                'taxonomy' => $taxonomy_slug,
                'field'    => 'slug',
                'terms'    => array_map('sanitize_text_field', (array) $_POST[$taxonomy_slug]),
            ];
        }
    }

    // Handle product_cat via 'concept'
    if (!empty($_POST['concept'])) {
        $child_term_slugs = array_map('sanitize_text_field', (array) $_POST['concept']);
        $child_terms = get_terms([
            'taxonomy'   => 'product_cat',
            'slug'       => $child_term_slugs,
            'hide_empty' => false,
        ]);
        $child_term_ids = wp_list_pluck($child_terms, 'term_id');

        if (!empty($child_term_ids)) {
            $tax_query[] = [
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $child_term_ids,
            ];
        }
    } elseif (!empty($_POST['cat_id']) && intval($_POST['cat_id']) > 0) {
        $cat_id = intval($_POST['cat_id']);
        $tax_query[] = [
            'taxonomy'         => 'product_cat',
            'field'            => 'term_id',
            'terms'            => $cat_id,
            'include_children' => true,
        ];
    }

    $args = [
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'tax_query'      => $tax_query,
        'order'          => 'ASC'
    ];

    $query = new WP_Query($args);

    $count = 0;
    ob_start();

    if ($query->have_posts()) {
        $count = 0;
        while ($query->have_posts()) {
            $query->the_post();
            global $product;
            $product_id = get_the_ID();
            $cat_id     = isset($_POST['cat_id']) ? intval($_POST['cat_id']) : 0;
            $encrypted  = sigma_encrypt($cat_id);
        ?>
            <div class="m__product__card listing__card min__height__pc">
                <a href="<?php the_permalink(); ?>">
                    <figure class="m__product__card__img">
                        <?php if (has_post_thumbnail()) :
                            the_post_thumbnail('medium');
                        else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/new-assets/images/product_list_img01.png" alt="">
                        <?php endif; ?>
                    </figure>
                    <p class="f__uppercase spacing__auto">
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'product_cat');
                        if ($terms && !is_wp_error($terms)) {
                            echo esc_html($terms[0]->name);
                        }
                        ?>
                    </p>
                    <p><?php the_title(); ?></p>
                    <p>
                        <?php
                        $product = wc_get_product($product_id);
                        // echo $product ? wc_price($product->get_price()) : '';
                        ?>
                    </p>
                </a>
            </div>

            <?php
            // Insert mood product cards only when not filtered
            if (!$is_filtered) {
                if ($count === 1) : ?>
                    <div class="m__product__card m__mood__product min__height__pc">
                        <figure class="m__product__card__img">
                            <img src="<?php echo esc_url($image1['url']); ?>" alt="">
                        </figure>
                        <div class="m__product__card__body">
                            <p class="f__uppercase"><?php echo get_field('about_lense', 2649); ?></p>
                            <a href="<?php echo esc_url(home_url('/our-lenses/?cat_id=' . $encrypted)); ?>" class="m__txt__link spacing__24" target="_blank"><?php echo get_field('explore_cat', 2649); ?></a>
                        </div>
                    </div>
                <?php elseif ($count === 4) : ?>
                    <div class="m__product__card m__mood__product min__height__pc">
                        <figure class="m__product__card__img">
                            <img src="<?php echo esc_url($image2['url']); ?>" alt="">
                        </figure>
                    </div>
                <?php elseif ($count === 15) : ?>
                    <div class="m__product__card m__mood__product large__mood__product">
                        <figure class="m__product__card__img">
                            <img src="<?php echo esc_url($image3['url']); ?>" alt="">
                        </figure>
                    </div>
            <?php endif;
                $count++;
            }
        }
        wp_reset_postdata();
    } else {
        echo '<p class="medium__block heading__medium text__center">No products found with selected filters.</p>';
    }

    echo ob_get_clean();
    wp_die();
}

add_action('wp_ajax_firm_ware_filter_products', 'handle_firm_ware_filter_products');
add_action('wp_ajax_nopriv_firm_ware_filter_products', 'handle_firm_ware_filter_products');

function handle_firm_ware_filter_products()
{
    $tax_query = ['relation' => 'AND'];
    $cat_id = isset($_POST['cat_id']) ? intval($_POST['cat_id']) : 0;

    $taxonomies = ['format', 'mount', 'sensor', 'type', 'angle'];

    foreach ($taxonomies as $taxonomy) {
        if (!empty($_POST[$taxonomy])) {
            $tax_query[] = [
                'taxonomy' => $taxonomy,
                'field'    => 'slug',
                'terms'    => array_map('sanitize_text_field', $_POST[$taxonomy]),
            ];
        }
    }

    if (!empty($_POST['concept'])) {
        $child_term_slugs = array_map('sanitize_text_field', (array) $_POST['concept']);
        $child_terms = get_terms([
            'taxonomy' => 'product_cat',
            'slug'     => $child_term_slugs,
            'hide_empty' => false,
        ]);
        $child_term_ids = wp_list_pluck($child_terms, 'term_id');

        if (!empty($child_term_ids)) {
            $tax_query[] = [
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $child_term_ids,
            ];
        }
    } elseif ($cat_id > 0) {
        $tax_query[] = [
            'taxonomy'         => 'product_cat',
            'field'            => 'term_id',
            'terms'            => $cat_id,
            'include_children' => true,
        ];
    }

    $args = [
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'tax_query'      => $tax_query,
        'order'          => 'ASC'
    ];

    $query = new WP_Query($args);
    ob_start();

    if ($query->have_posts()) {
        echo '<div class="medium__block">';
        echo '<div class="accordion" id="accordionExample">';

        $count = 0;
        while ($query->have_posts()) {
            $query->the_post();
            $product_id = get_the_ID();
            $product = wc_get_product($product_id);
            $product_cats = wp_get_post_terms($product_id, 'product_cat');
            $subtitle = !empty($product_cats) ? $product_cats[0]->name : '';
            $title = $product->get_title();
            //$subtitle = get_field('lens_series'); // Or another ACF field

            echo '<div class="accordion-item accordion__item body__bgcolor">';
            echo '<h2 class="accordion-header accordion__header" id="heading-' . $count . '">';
            echo '<button class="accordion-button accordion__button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-' . $count . '" aria-expanded="false" aria-controls="collapse-' . $count . '">';
            echo '<p><span class="f__uppercase">' . esc_html($subtitle) . '</span><br>' . esc_html($title) . '</p>';
            echo '</button>';
            echo '</h2>';

            echo '<div id="collapse-' . $count . '" class="accordion-collapse collapse" aria-labelledby="heading-' . $count . '" data-bs-parent="#accordionExample">';
            echo '<div class="accordion-body accordion__body">';

            echo '<ul class="c__bg__card__Panel panel__4__pc spacing__08">';

            // Example data (replace with actual ACF repeater fields)
            if (have_rows('firmware_main_page_repeter', $product_id)) {
                while (have_rows('firmware_main_page_repeter', $product_id)) {
                    the_row();
                    $mount   = get_sub_field('mount_name');
                    $version = get_sub_field('version_txt');

                    $view    = get_sub_field('view_btn') ?: 'VIEW';
                    $product_id = get_the_ID(); // or your actual product ID
                    $mount_slug = sanitize_title($mount);
                    $link    = get_sub_field('view_link');
                    $final_link = add_query_arg([
                        'product_id' => $product_id,
                        'mount' => $mount
                    ], $link);
                    echo '<li class="m__bg__card">';
                    echo '<a class="m__bg__card__inr" href="' . esc_url($final_link) . '">';
                    echo '<p class="f__ul">' . esc_html($mount) . '<br>' . esc_html($version) . '</p>';
                    echo '<div class="spacing__32"><p class="f__uppercase f__ul m__txt__link"> ' . esc_html($view) . '</p></div>';
                    echo '</a>';
                    echo '</li>';
                }
            }

            echo '</ul>';
            echo '</div>'; // .accordion-body
            echo '</div>'; // .collapse
            echo '</div>'; // .accordion-item

            $count++;
        }

        echo '</div>'; // .accordion
        echo '</div>'; // .medium__block
    } else {
        echo '<p class="medium__block heading__medium text__center">No products found with selected filters.</p>';
    }

    wp_reset_postdata();
    echo ob_get_clean();
    wp_die();
}
add_action('wp_ajax_catalog_filter_products', 'handle_catalog_filter_products');
add_action('wp_ajax_nopriv_catalog_filter_products', 'handle_catalog_filter_products');

function handle_catalog_filter_products()
{
    $tax_query = ['relation' => 'AND'];
    $cat_id = isset($_POST['cat_id']) ? intval($_POST['cat_id']) : 0;

    $taxonomies = ['format', 'mount', 'sensor', 'type', 'angle'];

    foreach ($taxonomies as $taxonomy) {
        if (!empty($_POST[$taxonomy])) {
            $tax_query[] = [
                'taxonomy' => $taxonomy,
                'field'    => 'slug',
                'terms'    => array_map('sanitize_text_field', $_POST[$taxonomy]),
            ];
        }
    }

    if (!empty($_POST['concept'])) {
        $child_term_slugs = array_map('sanitize_text_field', (array) $_POST['concept']);
        $child_terms = get_terms([
            'taxonomy' => 'product_cat',
            'slug'     => $child_term_slugs,
            'hide_empty' => false,
        ]);
        $child_term_ids = wp_list_pluck($child_terms, 'term_id');

        if (!empty($child_term_ids)) {
            $tax_query[] = [
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $child_term_ids,
            ];
        }
    } elseif ($cat_id > 0) {
        $tax_query[] = [
            'taxonomy'         => 'product_cat',
            'field'            => 'term_id',
            'terms'            => $cat_id,
            'include_children' => true,
        ];
    }

    $args = [
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'tax_query'      => $tax_query,
        'order'          => 'ASC'
    ];

    $query = new WP_Query($args);
    ob_start();

    if ($query->have_posts()) {
        echo '<div class="medium__block">';
        echo '<div class="accordion" id="accordionExample">';

        $count = 0;
        while ($query->have_posts()) {
            $query->the_post();
            $product_id = get_the_ID();
            $product = wc_get_product($product_id);
            $product_cats = wp_get_post_terms($product_id, 'product_cat');
            $subtitle = !empty($product_cats) ? $product_cats[0]->name : '';
            $title = $product->get_title();

            echo '<div class="accordion-item accordion__item body__bgcolor">';
            echo '<h2 class="accordion-header accordion__header" id="heading-' . $count . '">';
            echo '<button class="accordion-button accordion__button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-' . $count . '" aria-expanded="false" aria-controls="collapse-' . $count . '">';
            echo '<p><span class="f__uppercase">' . esc_html($subtitle) . '</span><br>' . esc_html($title) . '</p>';
            echo '</button>';
            echo '</h2>';

            echo '<div id="collapse-' . $count . '" class="accordion-collapse collapse" aria-labelledby="heading-' . $count . '" data-bs-parent="#accordionExample">';
            echo '<div class="accordion-body accordion__body">';

            echo '<ul class="c__bg__card__Panel panel__4__pc spacing__08">';

            // Updated repeater field name and subfields
            if (have_rows('catalog_repeter', $product_id)) {
                while (have_rows('catalog_repeter', $product_id)) {
                    the_row();
                    $guide = get_sub_field('guide');
                    $pdf = get_sub_field('pdf');
                    $pdf_file = get_sub_field('pdf_file'); // file field
                    $download_txt = get_sub_field('download_txt');

                    if ($pdf_file) {
                        echo '<li class="m__bg__card">';
                        echo '<a class="m__bg__card__inr" href="' . esc_url($pdf_file['url']) . '" target="_blank" rel="noopener noreferrer">';
                        echo '<p class="f__ul">' . esc_html($guide) . '<br>' . esc_html($pdf) . '</p>';
                        echo '<div class="spacing__32"><p class="f__uppercase f__ul m__txt__link">' . esc_html($download_txt) . '</p></div>';
                        echo '</a>';
                        echo '</li>';
                    }
                }
            }

            echo '</ul>';
            echo '</div>'; // .accordion-body
            echo '</div>'; // .collapse
            echo '</div>'; // .accordion-item

            $count++;
        }

        echo '</div>'; // .accordion
        echo '</div>'; // .medium__block
    } else {
        echo '<p class="medium__block heading__medium text__center">No products found with selected filters.</p>';
    }


    wp_reset_postdata();
    echo ob_get_clean();
    wp_die();
}


add_action('wp_ajax_cine_filter_products', 'cine_filter_products');
add_action('wp_ajax_nopriv_cine_filter_products', 'cine_filter_products');

function cine_filter_products()
{
    $cat_id = isset($_POST['cat_id']) ? intval($_POST['cat_id']) : 0;
    $args = [
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => [
            [
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $cat_id,
            ]
        ]
    ];

    $tax_query = [];
    foreach ($_POST as $key => $value) {
        if (in_array($key, ['concept', 'productline'])) {
            $tax_query[] = [
                'taxonomy' => $key === 'concept' ? 'product_cat' : $key,
                'field'    => 'slug',
                'terms'    => (array) $value,
            ];
        }
    }

    if (!empty($tax_query)) {
        $args['tax_query'] = array_merge($args['tax_query'], $tax_query);
        $is_filtered = true;
    } else {
        $is_filtered = false;
    }

    $query = new WP_Query($args);
    $count = 0;

    ob_start();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            global $product;
            ?>
            <div class="m__product__card listing__card min__height__pc">
                <a href="<?php the_permalink(); ?>">
                    <figure class="m__product__card__img">
                        <?php echo $product->get_image('medium'); ?>
                    </figure>
                    <p class="f__uppercase spacing__auto">
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'product_cat');
                        if ($terms && !is_wp_error($terms)) {
                            echo esc_html($terms[0]->name);
                        }
                        ?>
                    </p>
                    <p><?php the_title(); ?></p>
                    <p><?php //echo wc_price($product->get_price()); 
                        ?></p>
                </a>
            </div>
            <?php
            if (!$is_filtered && $count === 1) {

                while (have_rows('explore_category', 2748)) {

                    the_row();
                    $name = get_sub_field('name');
                    $description = get_sub_field('description');
                    $image = get_sub_field('image');
            ?>
                    <div class="m__product__card m__mood__product min__height__pc explore__category__block">
                        <?php if ($image): ?>
                            <figure>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                            </figure>
                        <?php endif; ?>
                        <div class="m__product__card__body">
                            <p class="f__uppercase"><?php echo esc_html($description); ?></p>
                            <a href="<?php echo home_url('/cine-lenses/'); ?>" class="m__txt__link spacing__24"><?php echo esc_html($name); ?></a>
                        </div>
                    </div>
            <?php
                    break;
                }
            }
            $count++;
        }
        wp_reset_postdata();
    } else {
        echo '<p class="medium__block heading__medium text__center">No products found with selected filters.</p>';
    }
    echo ob_get_clean();
    wp_die();
}
add_action('wp_ajax_still_filter_products', 'still_filter_products');
add_action('wp_ajax_nopriv_still_filter_products', 'still_filter_products');

function still_filter_products()
{
    $tax_query = ['relation' => 'AND'];
    $cat_id = isset($_POST['cat_id']) ? intval($_POST['cat_id']) : 0;

    $is_filtered = !empty($_POST['concept']) || !empty($_POST['format']) || !empty($_POST['mount']) || !empty($_POST['sensor']) || !empty($_POST['type']) || !empty($_POST['angle']);

    $taxonomies = ['format', 'mount', 'sensor', 'type', 'angle'];

    foreach ($taxonomies as $taxonomy) {
        if (!empty($_POST[$taxonomy])) {
            $tax_query[] = [
                'taxonomy' => $taxonomy,
                'field'    => 'slug',
                'terms'    => array_map('sanitize_text_field', $_POST[$taxonomy]),
            ];
        }
    }

    // Optional: filter by category if needed
    if (!empty($_POST['concept'])) {
        $child_term_slugs = array_map('sanitize_text_field', (array) $_POST['concept']);
        $child_terms = get_terms([
            'taxonomy' => 'product_cat',
            'slug'     => $child_term_slugs,
            'hide_empty' => false,
        ]);
        $child_term_ids = wp_list_pluck($child_terms, 'term_id');

        if (!empty($child_term_ids)) {
            $tax_query[] = [
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $child_term_ids,
            ];
        }
    } elseif ($cat_id > 0) {
        $tax_query[] = [
            'taxonomy'         => 'product_cat',
            'field'            => 'term_id',
            'terms'            => $cat_id,
            'include_children' => true,
        ];
    }



    $args = [
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'tax_query'      => $tax_query,
        'order'       => 'ASC'
    ];

    $query = new WP_Query($args);

    $count = 0;
    ob_start();
    if ($query->have_posts()) {
        $count = 0;
        while ($query->have_posts()) {
            $query->the_post();
            global $product;
            $cat_id = isset($_POST['cat_id']) ? intval($_POST['cat_id']) : 0;
            $encrypted = sigma_encrypt($cat_id);

            ?>
            <div class="m__product__card listing__card min__height__pc">
                <a href="<?php the_permalink(); ?>">
                    <figure class="m__product__card__img">
                        <?php if (has_post_thumbnail()) :
                            the_post_thumbnail('medium');
                        else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/new-assets/images/product_list_img01.png" alt="">
                        <?php endif; ?>
                    </figure>
                    <p class="f__uppercase spacing__auto">
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'product_cat');
                        if ($terms && !is_wp_error($terms)) {
                            echo esc_html($terms[0]->name);
                        }
                        ?>
                    </p>
                    <p><?php the_title(); ?></p>
                    <p>
                        <?php
                        $product = wc_get_product(get_the_ID());
                        //echo $product ? wc_price($product->get_price()) : '';
                        ?>
                    </p>
                </a>
            </div>
        <?php

        }
        wp_reset_postdata();
    } else {
        echo '<p class="medium__block heading__medium text__center">No products found with selected filters.</p>';
    }

    echo ob_get_clean();
    wp_die();
}

add_action('wp_ajax_accessories_filter_products', 'accessories_filter_products');
add_action('wp_ajax_nopriv_accessories_filter_products', 'accessories_filter_products');

function accessories_filter_products()
{
    $cat_id = isset($_POST['cat_id']) ? intval($_POST['cat_id']) : 0;
    $args = [
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => [
            [
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $cat_id,
            ]
        ]
    ];

    $tax_query = [];
    foreach ($_POST as $key => $value) {
        if (in_array($key, ['concept', 'productline'])) {
            $tax_query[] = [
                'taxonomy' => $key === 'concept' ? 'product_cat' : $key,
                'field'    => 'slug',
                'terms'    => (array) $value,
            ];
        }
    }

    if (!empty($tax_query)) {
        $args['tax_query'] = array_merge($args['tax_query'], $tax_query);
        $is_filtered = true;
    } else {
        $is_filtered = false;
    }

    $query = new WP_Query($args);


    ob_start();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            global $product;
        ?>
            <div class="m__product__card listing__card min__height__pc">
                <a href="<?php the_permalink(); ?>">
                    <figure class="m__product__card__img">
                        <?php echo $product->get_image('full'); ?>
                    </figure>
                    <p class="f__uppercase spacing__auto">
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'product_cat');
                        if ($terms && !is_wp_error($terms)) {
                            echo esc_html($terms[0]->name);
                        }
                        ?>
                    </p>
                    <p><?php the_title(); ?></p>
                    <p><?php //echo wc_price($product->get_price()); 
                        ?></p>
                </a>
            </div>
        <?php

        }
        wp_reset_postdata();
    } else {
        echo '<p class="medium__block heading__medium text__center">No products found with selected filters.</p>';
    }
    echo ob_get_clean();
    wp_die();
}
add_action('wp_ajax_discontinued_filter_products', 'discontinued_filter_products');
add_action('wp_ajax_nopriv_discontinued_filter_products', 'discontinued_filter_products');

// function discontinued_filter_products()
// {
//     $cat_id = isset($_POST['cat_id']) ? intval($_POST['cat_id']) : 0;

//     $tax_query = [
//         'relation' => 'AND',
//         [
//             'taxonomy' => 'product_cat',
//             'field'    => 'term_id',
//             'terms'    => $cat_id,
//         ]
//     ];

//     if (!empty($_POST['concept'])) {
//         $tax_query[] = [
//             'taxonomy' => 'product_cat',
//             'field'    => 'slug',
//             'terms'    => array_map('sanitize_text_field', $_POST['concept']),
//         ];
//     }

//     $filter_keys = ['format', 'mount', 'sensor', 'type', 'angle'];
//     foreach ($filter_keys as $key) {
//         if (!empty($_POST[$key])) {
//             $tax_query[] = [
//                 'taxonomy' => $key,
//                 'field'    => 'slug',
//                 'terms'    => array_map('sanitize_text_field', $_POST[$key]),
//             ];
//         }
//     }

//     $args = [
//         'post_type' => 'product',
//         'posts_per_page' => -1,
//         'post_status' => 'publish',
//         'tax_query' => $tax_query,
//     ];

//     $query = new WP_Query($args);

//     if ($query->have_posts()) {
//         while ($query->have_posts()) {
//             $query->the_post();
//             $product = wc_get_product(get_the_ID());
//             $permalink = get_permalink();
//             $image_url = get_the_post_thumbnail_url(get_the_ID(), 'medium'); // or your preferred size
//             $title = get_the_title();

//             // You can customize these values further if needed
//             $product_cat = wp_get_post_terms(get_the_ID(), 'product_cat', ['fields' => 'names']);
//             $category = !empty($product_cat) ? esc_html($product_cat[0]) : '';

//             echo '
//         <div class="m__product__card listing__card min__height__pc">
//             <a href="' . esc_url($permalink) . '">
//                 <figure class="m__product__card__img">
//                     <img src="' . esc_url($image_url) . '" alt="' . esc_attr($title) . '">
//                 </figure>
//                 <p class="f__uppercase spacing__auto">' . $category . '</p>
//                 <p>' . esc_html($title) . '</p>
//             </a>
//         </div>';
//         }
//     } else {
//         echo '<p class="f__h4">No products found with selected filters.</p>';
//     }

//     wp_die();
// }
function discontinued_filter_products()
{
    // Get all top-level product categories
    $exclude_term = get_term_by('slug', 'discontinued-models', 'product_cat');
    $exclude_id = $exclude_term ? $exclude_term->term_id : 0;
    $main_categories = get_terms([
        'taxonomy' => 'product_cat',
        'parent' => 0,
        'hide_empty' => false,
        'exclude' => [$exclude_id],
    ]);
    $filter_keys = ['format', 'mount', 'sensor', 'type', 'angle'];

    foreach ($main_categories as $main_term) {
        $tax_query = [
            'relation' => 'AND',
            [
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => [$main_term->term_id],
                'include_children' => true,
            ],
            [
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => ['discontinued-models'],
            ]
        ];

        // Concept filters
        if (!empty($_POST['concept'])) {
            $tax_query[] = [
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => array_map('sanitize_text_field', $_POST['concept']),
            ];
        }

        // Custom taxonomy filters
        foreach ($filter_keys as $key) {
            if (!empty($_POST[$key])) {
                $tax_query[] = [
                    'taxonomy' => $key,
                    'field'    => 'slug',
                    'terms'    => array_map('sanitize_text_field', $_POST[$key]),
                ];
            }
        }

        $args = [
            'post_type'      => 'product',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'tax_query'      => $tax_query,
        ];

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            echo '<div class="large__block">';
            echo '<h2 class="heading__medium f__uppercase font text__center">' . esc_html($main_term->name) . '</h2>';
            echo '<div class="c__product__listing l__grid">';

            while ($query->have_posts()) {
                $query->the_post();
                $product = wc_get_product(get_the_ID());
                $permalink = get_permalink();
                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                $title = get_the_title();

                $product_cat = wp_get_post_terms(get_the_ID(), 'product_cat', ['fields' => 'names']);
                $category = !empty($product_cat) ? esc_html($product_cat[0]) : '';

                echo '
                <div class="m__product__card listing__card min__height__pc">
                    <a href="' . esc_url($permalink) . '">
                        <figure class="m__product__card__img">
                            <img src="' . esc_url($image_url) . '" alt="' . esc_attr($title) . '">
                        </figure>
                        <p class="f__uppercase spacing__auto">' . $category . '</p>
                        <p>' . esc_html($title) . '</p>
                    </a>
                </div>';
            }

            echo '</div></div>'; // close .c__product__listing and .heading__wrap
        }

        wp_reset_postdata();
    }

    wp_die();
}


add_action('wp_ajax_update_sidecart_quantity', 'custom_update_sidecart_quantity');
add_action('wp_ajax_nopriv_update_sidecart_quantity', 'custom_update_sidecart_quantity');

function custom_update_sidecart_quantity()
{



    if (! isset($_POST['cart_item_key'], $_POST['quantity'])) {
        wp_send_json_error(['message' => 'Invalid data sent']);
    }

    $cart_item_key = sanitize_text_field($_POST['cart_item_key']);
    $quantity = max(1, intval($_POST['quantity']));

    // Check if cart item exists
    $cart = WC()->cart->get_cart();
    if (! isset($cart[$cart_item_key])) {
        wp_send_json_error(['message' => 'Cart item not found']);
    }

    $result = WC()->cart->set_quantity($cart_item_key, $quantity, true);
    WC()->cart->calculate_totals();

    if ($result) {
        $cart_item = WC()->cart->get_cart_item($cart_item_key);
        $_product = wc_get_product($cart_item['product_id']);

        wp_send_json_success([
            'subtotal' => WC()->cart->get_product_subtotal($_product, $quantity),
            'cart_subtotal' => WC()->cart->get_cart_subtotal(),
        ]);
    } else {
        wp_send_json_error(['message' => 'Failed to update cart']);
    }

    wp_die();
}


add_action('wp_ajax_nopriv_custom_ajax_login', 'handle_custom_ajax_login');

function handle_custom_ajax_login()
{
    $info = [];
    $info['user_login'] = sanitize_text_field($_POST['log'] ?? '');
    $info['user_password'] = $_POST['pwd'] ?? '';
    $info['remember'] = true;

    $user = wp_signon($info, is_ssl());

    if (is_wp_error($user)) {
        wp_send_json([
            'success' => false,
            'message' => 'Incorrect username or password.'
        ]);
    } else {
        wp_send_json([
            'success' => true
        ]);
    }

    wp_die();
}
// ajax call for brand filter in camera category

add_action('wp_ajax_get_types_and_models_from_brand', 'handle_brand_filter');
add_action('wp_ajax_nopriv_get_types_and_models_from_brand', 'handle_brand_filter');

function handle_brand_filter()
{
    $brand = sanitize_text_field($_POST['brand']);

    // Get all models for brand
    $args = [
        'post_type' => 'camera_model',
        'posts_per_page' => -1,
        'tax_query' => [[
            'taxonomy' => 'camera_brand',
            'field' => 'slug',
            'terms' => $brand
        ]]
    ];
    $posts = get_posts($args);

    // Build Types
    $types_arr = [];
    foreach ($posts as $post) {
        $terms = wp_get_post_terms($post->ID, 'camera_type');
        foreach ($terms as $term) {
            $types_arr[$term->term_id] = $term->name;
        }
    }

    $type_html = '<option value="">Select</option>';
    foreach ($types_arr as $term_id => $name) {
        $type_html .= "<option value='{$term_id}'>{$name}</option>";
    }

    $model_html = '<option value="">Select</option>';
    foreach ($posts as $post) {
        $model_html .= '<option value="' . $post->ID . '">' . esc_html($post->post_title) . '</option>';
    }

    wp_send_json(['types' => $type_html, 'models' => $model_html]);
}

// ajax call for brand type filter in camera category

add_action('wp_ajax_get_models_from_brand_and_type', 'handle_brand_type_filter');
add_action('wp_ajax_nopriv_get_models_from_brand_and_type', 'handle_brand_type_filter');

function handle_brand_type_filter()
{
    $brand = sanitize_text_field($_POST['brand']);
    $type = intval($_POST['type']);

    $args = [
        'post_type' => 'camera_model',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'tax_query' => [
            [
                'taxonomy' => 'camera_brand',
                'field' => 'slug',
                'terms' => $brand
            ],
            [
                'taxonomy' => 'camera_type',
                'field' => 'term_id',
                'terms' => $type
            ]
        ]
    ];
    $posts = get_posts($args);
    $model_html = '<option value="">Select</option>';
    foreach ($posts as $post) {
        $model_html .= '<option value="' . $post->ID . '">' . esc_html($post->post_title) . '</option>';
    }

    echo $model_html;
    wp_die();
}

add_action('wp_ajax_filter_camera_models_accordion', 'filter_camera_models_accordion');
add_action('wp_ajax_nopriv_filter_camera_models_accordion', 'filter_camera_models_accordion');

function filter_camera_models_accordion()
{
    $brand = sanitize_text_field($_POST['brand']);
    $type = intval($_POST['type']);
    $model = intval($_POST['model']);

    $tax_query = [];

    if (!empty($brand)) {
        $tax_query[] = [
            'taxonomy' => 'camera_brand',
            'field' => 'slug',
            'terms' => $brand
        ];
    }

    if (!empty($type)) {
        $tax_query[] = [
            'taxonomy' => 'camera_type',
            'field' => 'term_id',
            'terms' => $type
        ];
    }

    $args = [
        'post_type' => 'camera_model',
        'posts_per_page' => -1,
        'order' => 'ASC',
    ];

    if (!empty($tax_query)) {
        $args['tax_query'] = $tax_query;
    }

    if (!empty($model)) {
        $args['p'] = $model;
    }

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) :
        $acc_count = 0;
        while ($query->have_posts()) : $query->the_post();
            $model_title = get_the_title();
            $group = get_field('lenses_structure');
            $acc_id = 'collapse' . $acc_count;
            $heading_id = 'heading' . $acc_count;
        ?>
            <div class="accordion-item accordion__item body__bgcolor">
                <h2 class="accordion-header accordion__header" id="<?php echo esc_attr($heading_id); ?>">
                    <button class="accordion-button accordion__button collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($acc_id); ?>"
                        aria-expanded="false" aria-controls="<?php echo esc_attr($acc_id); ?>">
                        <span><?php echo esc_html($model_title); ?></span>
                    </button>
                </h2>
                <div id="<?php echo esc_attr($acc_id); ?>" class="accordion-collapse collapse"
                    aria-labelledby="<?php echo esc_attr($heading_id); ?>" data-bs-parent="#accordionExample">
                    <div class="accordion-body accordion__body">
                        <?php if (!empty($group['compatible_txt'])): ?>
                            <p class="f__ul spacing__08"><?php echo esc_html($group['compatible_txt']); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($group['lenses_structure'])): ?>
                            <ul class="c__bg__card__Panel panel__4__pc">
                                <?php foreach ($group['lenses_structure'] as $lens): ?>
                                    <li class="m__bg__card">
                                        <div class="m__bg__card__inr">
                                            <p class="f__uppercase f__ul"><?php echo esc_html($lens['category_name']); ?></p>
                                            <p class="f__ul"><?php echo esc_html($lens['model_name']); ?></p>
                                            <div class="spacing__32 l__grid">
                                                <p class="f__ul"><?php echo esc_html($lens['o_txt']); ?></p>
                                                <p class="f__ul"><?php echo esc_html($lens['uses']); ?></p>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if (!empty($group['general_repeater'])): ?>
                            <ul class="l__grid panel__1__pc">
                                <?php foreach ($group['general_repeater'] as $gen): ?>
                                    <li class="c__txt__card__txt"><?php echo $gen['text']; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
    <?php
            $acc_count++;
        endwhile;
        wp_reset_postdata();
    endif;

    echo ob_get_clean();
    wp_die();
}
add_action('wp_ajax_get_product_specification', 'ajax_get_product_specification');
add_action('wp_ajax_nopriv_get_product_specification', 'ajax_get_product_specification');

function ajax_get_product_specification()
{
    $product_id = intval($_POST['product_id']);
    if (!$product_id) {
        wp_send_json_error('Invalid product');
    }

    ob_start();

    $product = wc_get_product($product_id);
    $product_title = $product->get_name();
    $product_img = get_the_post_thumbnail_url($product_id, 'full');
    $categories = wp_get_post_terms($product_id, 'product_cat', ['fields' => 'names']);

    ?>
    <ul class="m__spec">
        <li style="height: 58px;">
            <p class="m__spec__ttl"><?php echo esc_html($categories[0] ?? ''); ?><br><?php echo esc_html($product_title); ?></p>
        </li>
        <li style="height: 631px;">
            <figure class="m__spec__img">
                <img src="<?php echo esc_url($product_img); ?>" alt="">
            </figure>
        </li>
        <?php if (have_rows('specifications', $product_id)) :
            while (have_rows('specifications', $product_id)) : the_row();
                if (have_rows('label_type')) :
                    while (have_rows('label_type')) : the_row();
                        $type_name = get_sub_field('type_name');
                        $type_value = get_sub_field('type_value'); ?>
                        <li style="height: 66.5px;">
                            <dl class="m__spec__normal">
                                <dt><?php echo esc_html($type_name); ?></dt>
                                <dd>
                                    <p class="f__ul"><?php echo esc_html($type_value); ?></p>
                                </dd>
                            </dl>
                        </li>
        <?php endwhile;
                endif;
            endwhile;
        endif; ?>
        <li>
            <div class="btn__full__width spacing__40 product__overview__block__body">
                <a class="m__btn" href="<?php echo get_permalink($product_id); ?>">View Product</a>
            </div>
        </li>
    </ul>
<?php

    wp_send_json_success(ob_get_clean());
}

function membership_benefits_all_shortcode()
{
    $tier_posts = get_posts([
        'post_type'      => 'membership_tier',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ]);

    if (empty($tier_posts)) return '';

    foreach ($tier_posts as $tier_post) {
        $tier_name = strtolower(trim($tier_post->post_title)); // bronze, silver, gold
        $benefits = get_post_meta($tier_post->ID, 'benefits', true);

        if (!empty($benefits) && is_array($benefits)) {
            foreach ($benefits as $benefit) {
                $title = trim($benefit['title'] ?? '');
                if (!$title) continue;

                // Initialize the row if not present
                if (!isset($merged_benefits[$title])) {
                    $merged_benefits[$title] = [
                        'title'  => $title,
                        'bronze' => '-',
                        'silver' => '-',
                        'gold'   => '-',
                    ];
                }

                // Add value if not already set
                foreach (['bronze', 'silver', 'gold'] as $tier) {
                    if (!empty($benefit[$tier]) && $merged_benefits[$title][$tier] === '-') {
                        $merged_benefits[$title][$tier] = $benefit[$tier];
                    }
                }
            }
        }
    }

    ob_start();
?>
    <div class="table__wrapp table__wrapp__small">
        <div class="table-responsive">
            <table class="table">
                <thead class="thead__dark">
                    <tr>
                        <th scope="col">BENEFITS</th>
                        <th scope="col"><i class="icon__box"></i>BRONZE</th>
                        <th scope="col"><i class="icon__box silver__icon"></i>SILVER</th>
                        <th scope="col"><i class="icon__box gold__icon"></i>GOLD</th>
                    </tr>
                </thead>
                <tbody class="table__body">
                    <?php foreach ($merged_benefits as $benefit): ?>
                        <tr>
                            <td scope="col"><?php echo esc_html($benefit['title']); ?></td>
                            <td scope="col"><?php echo esc_html($benefit['bronze']); ?></td>
                            <td scope="col"><?php echo esc_html($benefit['silver']); ?></td>
                            <td scope="col"><?php echo esc_html($benefit['gold']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
    return ob_get_clean();
}
add_shortcode('membership_benefits_all', 'membership_benefits_all_shortcode');


function custom_footer_menu_new_tab($item_output, $item, $depth, $args)
{
    if (isset($args->theme_location) && $args->theme_location === 'newfooterfour') {
        $item_output = str_replace('<a ', '<a target="_blank" ', $item_output);
    }
    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'custom_footer_menu_new_tab', 10, 4);

// online purchase points for user
// Add custom field under Sale Price
function add_online_purchase_points_field()
{
    woocommerce_wp_text_input(array(
        'id'          => '_online_purchase_points',
        'label'       => 'Online Purchase Points',
        'placeholder' => 'Enter points',
        'desc_tip'    => true,
        'description' => 'Reward points customer will earn for purchasing this product.',
        'type'        => 'number',
        'custom_attributes' => array(
            'step' => '1',
            'min'  => '0',
        )
    ));
}
add_action('woocommerce_product_options_advanced', 'add_online_purchase_points_field');

function save_online_purchase_points_field($post_id)
{
    if (isset($_POST['_online_purchase_points'])) {
        $points = intval($_POST['_online_purchase_points']);
        update_post_meta($post_id, '_online_purchase_points', $points);
    }
}
add_action('woocommerce_process_product_meta', 'save_online_purchase_points_field');
add_action('woocommerce_order_status_completed', 'assign_online_purchase_points_to_user');
function assign_online_purchase_points_to_user($order_id)
{

    if (!$order_id) return;

    $order = wc_get_order($order_id);
    $user_id = $order->get_user_id();
    if (!$user_id) return;

    global $wpdb;
    $table = $wpdb->prefix . 'points_log'; // Adjust table name as per your actual table

    $total_earned_points = 0;
    $product_names = [];

    // Loop through each product in order
    foreach ($order->get_items() as $item) {
        $product_id = $item->get_product_id();
        $product_names[] = $item->get_name();

        $product_points = intval(get_post_meta($product_id, '_online_purchase_points', true));
        $total_earned_points += $product_points;
    }

    // If no points, stop
    if ($total_earned_points <= 0) return;

    // Get user's membership tier and calculate expiry
    $current_membership = get_user_meta($user_id, 'assigned_membership_tier', true);
    $earned_at = current_time('Y-m-d');
    $validity_days = intval(get_post_meta($current_membership, 'validity_months', true)); // actually in days
    $calculated_expiry_date = date('Y-m-d', strtotime("+$validity_days days", strtotime($earned_at)));


    // Create a post log entry
    $post_title = "User $user_id - online product purchase points - $order_id";
    wp_insert_post([
        'post_type'   => 'online_product_purchase_point',
        'post_status' => 'publish',
        'post_title'  => $post_title,
        'meta_input'  => [
            'user_id'           => $user_id,
            'order_id'          => $order_id,
            'points'            => $total_earned_points,
            'membership_tier_id' => $current_membership,
            'expiry_date'       => $calculated_expiry_date,
        ]
    ]);

    // Insert into your custom points log table
    $reason_text = 'Online product purchase points: ' . implode(', ', $product_names);
    $wpdb->insert(
        $table,
        [
            'user_id'           => $user_id,
            'points'            => $total_earned_points,
            'cutoff_points'     => 0,
            'reson'             => $reason_text,
            'membership_tier_id' => $current_membership,
            'expiry_date'       => $calculated_expiry_date,
            'created_at'        => current_time('mysql'),
        ],
        ['%d', '%d', '%d', '%s', '%s', '%s', '%s']
    );

    // Optional: update total points meta (if you maintain it)
    $existing_total = (int)get_user_meta($user_id, 'total_reward_points', true);
    update_user_meta($user_id, 'total_reward_points', $existing_total + $total_earned_points);

    // Optional: re-evaluate membership tier
    if (function_exists('update_user_membership_tier')) {
        update_user_membership_tier($user_id);
    }
}



//search page
function sigma_search_main_query($query)
{
    if (! is_admin() && $query->is_main_query() && $query->is_search()) {
        $query->set('post_type', ['post', 'page', 'product', 'ambassador', 'our_community', 'shooting_with_sigma']);
        $query->set('posts_per_page', 10);
    }
}
add_action('pre_get_posts', 'sigma_search_main_query');


//Calculate the point for Loyalty Product

add_action('acf/input/admin_footer', function() {
    global $post;
    if ($post && $post->post_type === 'loyalty_products') :
?>
<script>
(function($){
    // Replace with your actual field keys
    const mrpFieldKey   = 'field_68ca5483de3bc'; // ACF key for mrpprice
    const coefFieldKey  = 'field_68ca54adde3bd'; // ACF key for movement_coefficient
    const pointsFieldKey= 'field_684bb5e784438'; // ACF key for loyalty_points

    function calculatePoints(){
        var mrp  = parseFloat($('[data-key="'+mrpFieldKey+'"] input').val()) || 0;
        var coef = parseFloat($('[data-key="'+coefFieldKey+'"] input').val()) || 0;

        var autoVal = Math.round(mrp * 0.08 * coef);

        var $pointsInput = $('[data-key="'+pointsFieldKey+'"] input');
        var currentVal   = $pointsInput.val();

        // Only overwrite if empty or previously auto-calculated
        if (currentVal === '' || currentVal == $pointsInput.data('auto')) {
            $pointsInput.val(autoVal).data('auto', autoVal);
        }
    }

    // Run on input
    $(document).on('input', 
        '[data-key="'+mrpFieldKey+'"] input, [data-key="'+coefFieldKey+'"] input', 
        calculatePoints
    );

    // Run on page load
    $(document).ready(calculatePoints);

})(jQuery);
</script>
<?php
    endif;
});



// New Function

// Disable WordPress default new user notification to user
remove_action('register_new_user', 'wp_send_new_user_notifications');
remove_action('edit_user_created_user', 'wp_send_new_user_notifications');

add_action('user_register', function($user_id) {
    if ( is_admin() && ! wp_doing_ajax() ) {

        $user = get_userdata($user_id);
        $user_email = $user->user_email;
        $username = $user->user_login;

        // Generate password reset link
        $reset_key = get_password_reset_key($user);
        $reset_link = network_site_url("wp-login.php?action=rp&key=$reset_key&login=" . rawurlencode($username), 'login');

        // Email subject
        $subject = 'Welcome to Sigma India – Your Account Details';

        // HTML email content
        $message = '
        <div style="font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 20px;">
          <div style="max-width: 600px; margin: auto; background: #fff; border-radius: 10px; overflow: hidden; border: 1px solid #ddd;">
            
            <div style="background-color: #111; color: #fff; text-align: center; padding: 20px;">
              <img src="https://sigmaindia.in/wp-content/uploads/2025/10/sigma-logo.png" alt="Sigma India" style="max-height: 50px; margin-bottom: 10px;">
              <h2 style="margin: 0;">Welcome to Sigma India</h2>
            </div>
            
            <div style="padding: 25px; color: #333;">
              <p>Hi <strong>' . esc_html($username) . '</strong>,</p>
              <p>Your account has been successfully created by our admin team.</p>

              <p><strong>Username:</strong> ' . esc_html($username) . '</p>
              
              <p>To set your password, please click the button below:</p>
              <p><a href="' . esc_url($reset_link) . '" style="background: #0073aa; color: #fff; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Set Your Password</a></p>

              <p>Once your password is set, you can log in anytime at:</p>
              <p><a href="https://sigmaindia.in/my-account/" style="color: #0073aa;">https://sigmaindia.in/my-account/</a></p>

              <p>If you didn’t request this account, please ignore this email.</p>

              <p style="margin-top: 30px;">Best regards,<br><strong>The Sigma India Team</strong></p>
            </div>

            <div style="background: #f2f2f2; text-align: center; padding: 15px; font-size: 13px; color: #777;">
              © ' . date("Y") . ' Sigma India. All rights reserved.
            </div>

          </div>
        </div>';

        // Send as HTML email
        $headers = array('Content-Type: text/html; charset=UTF-8');

        // Send the custom email
        wp_mail($user_email, $subject, $message, $headers);
    }
}, 20);



// Default Search chnage to soundex
add_filter('posts_search', 'wp_like_soundex_search', 10, 2);

function wp_like_soundex_search($search, $wp_query) {
    global $wpdb;

    if (empty($search) || ! $wp_query->is_search() || is_admin()) {
        return $search;
    }

    $terms = $wp_query->query_vars['search_terms'];
    if (empty($terms)) {
        return $search;
    }

    $search = " AND (";

    $clauses = [];

    foreach ($terms as $term) {
        $term = esc_sql($term);

        $clauses[] = "
            {$wpdb->posts}.post_title LIKE '%{$term}%'
            OR {$wpdb->posts}.post_content LIKE '%{$term}%'
            OR SOUNDEX({$wpdb->posts}.post_title) = SOUNDEX('{$term}')
        ";
    }

    $search .= implode(' AND ', $clauses);
    $search .= ") ";

    return $search;
}



// Export Product with serial number

add_action('admin_init', 'export_products_with_serial_number');

function export_products_with_serial_number() {

    if (!current_user_can('manage_woocommerce')) {
        return;
    }

    if (!isset($_GET['export_serial_products'])) {
        return;
    }

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=products-serial-export.csv');

    $output = fopen('php://output', 'w');

    // CSV Header
    fputcsv($output, ['Product Name', 'Serial Number']);

    $args = [
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ];

    $products = get_posts($args);

    foreach ($products as $product) {
        $serial_number = get_post_meta($product->ID, 'serial_number', true);

        fputcsv($output, [
            $product->post_title,
            $serial_number
        ]);
    }

    fclose($output);
    exit;
}
