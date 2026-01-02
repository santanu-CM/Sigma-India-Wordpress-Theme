<?php

/**
 * WP Bootstrap Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Bootstrap_Starter
 */

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



        // This theme uses wp_nav_menu() for menus Start//
        register_nav_menus(array(
            'primary' => esc_html__('Top Menu', 'sigma-india'),
            'secondary' => esc_html__('Footer One Menu', 'sigma-india'),
            'third' => esc_html__('Footer Two Menu', 'sigma-india'),
            'fourth' => esc_html__('Footer Three Menu', 'sigma-india'),
            'fifth' => esc_html__('Footer Fourth Menu', 'sigma-india')
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

    if (basename(get_page_template()) != 'template-bf.php'):
        wp_enqueue_style('sigma-india', get_stylesheet_uri());
        wp_enqueue_style('sigma-india-owl-carousel-min-cdn', '//owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css');
        wp_enqueue_style('sigma-india-photoswipe-min-cdn', '//cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.css');
        wp_enqueue_style('sigma-india-bootstrap-select-min-cdn', '//cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css');

        wp_enqueue_style('sigma-india-bootstrap-icon-cdn', '//cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css');

        wp_enqueue_style('sigma-india-default-skin-min-cdn', '//cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/default-skin/default-skin.min.css');
        wp_enqueue_style('sigma-india-swiper-min-cdn', '//cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css');

        wp_enqueue_style('sigma-india-slick-cdn', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css');
        wp_enqueue_style('sigma-india-slick-theme-cdn', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css');


        wp_enqueue_style('sigma-india-styles', get_template_directory_uri() . '/css/styles.css');

        wp_enqueue_style('sigma-india-custom-style', get_template_directory_uri() . '/css/custom-style.css');
        wp_enqueue_style('sigma-india-responsive-styles', get_template_directory_uri() . '/css/responsive.css');


        wp_enqueue_script('jquery');

        // Internet Explorer HTML5 support Start//
        wp_enqueue_script('html5hiv', get_template_directory_uri() . '/inc/assets/js/html5.js', array(), '3.7.0', false);
        wp_script_add_data('html5hiv', 'conditional', 'lt IE 9');
        // Internet Explorer HTML5 support End//

        //wp_enqueue_script('sigma-india-jquery-min', '//owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js', array(), null, true );


        wp_enqueue_script('sigma-india-bootstrap-bundle-min', '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '', true);

        wp_enqueue_script('sigma-india-bootstrap-select-min', '//cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js', array('jquery'), '', true);
        wp_enqueue_script('sigma-india-owl-carousel-min', '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js', array('jquery'), '', true);
        wp_enqueue_script('sigma-india-photoswipe-min', '//cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.js', array('jquery'), '', true);

        wp_enqueue_script('sigma-india-photoswipe-ui-default-min', '//cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe-ui-default.min.js', array('jquery'), '', true);
        wp_enqueue_script('sigma-india-swiper-min', '//cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js', array('jquery'), '', true);

        wp_enqueue_script('sigma-india-slick-cdn', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js', array('jquery'), '', true);
        wp_enqueue_script('sigma-india-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
        wp_enqueue_script('sigma-india-scripts-slider', get_template_directory_uri() . '/js/scripts-slider.js', array('jquery'), null, true);

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    endif;
}

add_action('admin_enqueue_scripts', function () {
    // Bootstrap 5 CSS
    wp_enqueue_style('bootstrap-5', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css', [], '5.3.0');

    // DataTables Bootstrap 5 CSS
    wp_enqueue_style('datatables-bootstrap5', 'https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css', ['bootstrap-5'], '2.2.2');

    // jQuery (already included in WordPress, but if you want latest one from CDN, deregister default)
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.7.1.js', [], '3.7.1', true);
    wp_enqueue_script('jquery');

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




// add_action('admin_menu', 'custom_manage_points_menu');
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


    // Submenu: Manage Points under Membership & Rewards
    add_submenu_page(
        'points-management', // Parent menu slug
        __('Points by Event', 'woocommerce'), // Page title
        __('Points by Event', 'woocommerce'), // Menu title
        'manage_options', // Capability required
        'manage-points', // Slug for the submenu page
        'render_manage_points_table' // Callback function for this submenu page
    );

    // Submenu: Assign Points by Event under Manage Points
    add_submenu_page(
        'points-management',
        __('Assign Points by Event', 'woocommerce'),
        __('Assign by Event', 'woocommerce'),
        'manage_options',
        'manage-points-event',
        'render_points_by_event'
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


    // Submenu: Manage Membership
    add_submenu_page(
        'points-management',
        __('Manage Membership', 'woocommerce'),
        __('Manage Membership', 'woocommerce'),
        'manage_options',
        'manage-membership',
        'render_manage_membership_table'
    );


    // Submenu: Product Model Points
    add_submenu_page(
        'points-management',
        __('Points To Product Model', 'woocommerce'),
        __('Points To Product Model', 'woocommerce'),
        'manage_options',
        'product-model-points',
        'render_model_points_page'
    );

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

function render_exchange_old_product_form_data()
{
    echo 'old product form data';
}

function render_product_rental_form_data()
{

    echo 'product rental form data';
}

function render_service_registration_form_data()
{

    echo 'service registration form data';
}


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

    if ($used_points > $available_point) {
        $available_points = $available_point;
    } else {
        $available_points = $available_point - $used_points;
    }     // only unexpired + unused

    // Return only available (unexpired & unused) points
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
    }
}


function render_points_log()
{
    global $wpdb;

     // Set up variables
     $table_name = $wpdb->prefix . 'points_log';
     $search = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';
 
     // Prepare WHERE clause if search exists
     $where = '';
     if (!empty($search)) {
         $where = $wpdb->prepare("WHERE user_id LIKE %s OR reason LIKE %s", '%' . $search . '%', '%' . $search . '%');
     }
 
     // Fetch all records without pagination
     $results = $wpdb->get_results("SELECT * FROM $table_name $where ORDER BY created_at DESC");

  
?>
    <div class="wrap">
        <h1>Points Log</h1>



        <table class="table table-striped" id="points_log" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Points</th>
                    <th>Reason</th>
                    <th>Date</th>
                    <th>Referral History</th>

                </tr>
            </thead>
            <tbody>
                <?php if ($results): ?>
                    <?php foreach ($results as $row): ?>
                        <tr>
                            <td>
                                <?php
                                $user = get_userdata($row->user_id);
                                echo $user ? esc_html($user->display_name . " (#{$row->user_id})") : "User ID: {$row->user_id}";
                                ?>
                            </td>
                            <td><?= intval($row->points); ?></td>
                            <td><?= esc_html($row->reson); ?></td>
                            <td><?= esc_html(date('Y-m-d H:i', strtotime($row->created_at))); ?></td>
                            <td>
                                <a href="<?php echo admin_url('admin.php?page=product_referral_points&user_id=' . $row->user_id); ?>" class="button">
                                    View Referral Points
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No logs found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>
    <script>
        jQuery(document).ready(function($) {
            $('#points_log').DataTable();
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
?>
    <div class="wrap">
        <h2> Assigned Points by Event</h2>
        <form method="post" id="manage-points-form">
            <?php wp_nonce_field('save_points_nonce', 'save_points'); ?>

            <label><strong>Event Category:</strong></label>
            <select id="event-cat-selector" required>
                <option value="">Select Category</option>
                <?php foreach ($event_categories as $cat): ?>
                    <option value="<?= esc_attr($cat->term_id); ?>"><?= esc_html($cat->name); ?></option>
                <?php endforeach; ?>
            </select>

            <label><strong>Event:</strong></label>
            <select id="event-selector" name="selected_event_id" required>
                <option value="">Select Event</option>
            </select>

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

            $('#add-row').on('click', function() {
                let index = rowCount;

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
                </div>

                <label>Rank:</label>
                <input type="text" name="points[${index}][rank]" placeholder="e.g., First, Top Performer" required>

                <label>Points:</label>
                <input type="number" name="points[${index}][points]" required>

                <input type="hidden" name="points[${index}][event_id]" value="${$('#event-selector').val()}">
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
                        .css('display', 'inline-block') // or 'flex' if you're using flex layouts
                        .find('select').prop('required', true);
                } else if (selected === 'new') {
                    $(`#new-${index}`)
                        .css('display', 'inline-block')
                        .find('input').prop('required', true);
                }
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
            $rank = sanitize_text_field($entry['rank']);
            $point_val = intval($entry['points']);
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

            // 2. Check for duplicate rank for the same event
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

            // 3. Insert user_event_point post
            $post_title = "User $user_id - Event $event_id - Rank $rank";
            $post_id = wp_insert_post([
                'post_type' => 'user_event_point',
                'post_status' => 'publish',
                'post_title' => $post_title,
                'meta_input' => [
                    'user_id' => $user_id,
                    'event_id' => $event_id,
                    'rank' => $rank,
                    'points' => $point_val
                ]
            ]);

            if ($post_id && !is_wp_error($post_id)) {
                $success_count++;

                // 4. Insert into wp_points_log table
                $earned_at = current_time('Y-m-d');
                $current_membership = get_user_meta($user_id, 'assigned_membership_tier', true);
                $validity_days = get_post_meta($current_membership, 'validity_months', true); // actually days
                $calculated_expiry_date = date('Y-m-d', strtotime("+$validity_days days", strtotime($earned_at)));

                $wpdb->insert(
                    $wpdb->prefix . 'points_log',
                    [
                        'user_id'     => $user_id,
                        'points'      => $point_val,
                        'reson'       => $post_title,
                        'membership_tier_id' => $current_membership,
                        'expiry_date' => $calculated_expiry_date,
                        'created_at'  => current_time('mysql')
                    ],
                    ['%d', '%d', '%s', '%s', '%d']
                );
                update_user_membership_tier($user_id);
            } else {
                $errors[] = "Failed to save post for user ID $user_id.";
            }
        }

        // 5. Show admin notices
        add_action('admin_notices', function () use ($success_count, $errors) {
            if ($success_count > 0) {
                echo '<div class="notice notice-success"><p>' . $success_count . ' point(s) saved successfully.</p></div>';
            }
            foreach ($errors as $err) {
                echo '<div class="notice notice-error"><p>' . esc_html($err) . '</p></div>';
            }
        });
    }
});

function render_points_by_product()
{
    $edit_id = isset($_GET['edit_id']) ? intval($_GET['edit_id']) : 0;
    $user_id = $product_id = $product_code = $points = '';

    if ($edit_id && get_post_type($edit_id) === 'user_product_point') {
        $user_id = get_post_meta($edit_id, 'user_id', true);
        $product_id = get_post_meta($edit_id, 'product_id', true);
        $product_code = get_post_meta($edit_id, 'product_code', true);
        $points = get_post_meta($edit_id, 'points', true);
    }

    $users = get_users(['fields' => ['ID', 'display_name']]);
    $products = wc_get_products(['limit' => -1, 'status' => 'publish']);

?>
    <div class="wrap">
        <h2><?php echo $edit_id ? 'Edit Points Entry' : 'Assign Points by Product'; ?></h2>
        <form method="post" id="manage-points-product-form">
            <?php wp_nonce_field('save_points_product_nonce', 'save_points_product'); ?>
            <input type="hidden" name="edit_post_id" value="<?php echo esc_attr($edit_id); ?>" />

            <table class="add-prod-point">
                <tr>
                    <td><label><strong>Username:</strong></label></td>
                    <td>
                        <select name="user_id" required>
                            <option value="">Select User</option>
                            <?php foreach ($users as $user): ?>
                                <option value="<?php echo esc_attr($user->ID); ?>" <?php selected($user_id, $user->ID); ?>>
                                    <?php echo esc_html($user->display_name); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label><strong>Product:</strong></label></td>
                    <td>
                        <select name="product_id" required>
                            <option value="">Select Product</option>
                            <?php foreach ($products as $product): ?>
                                <option value="<?php echo esc_attr($product->get_id()); ?>" <?php selected($product_id, $product->get_id()); ?>>
                                    <?php echo esc_html($product->get_name()); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label><strong>Product Code:</strong></label></td>
                    <td>
                        <input type="text" name="product_code" required value="<?php echo esc_attr($product_code); ?>">
                        <p><a href="#" id="verify-product-code">Verify</a></p>
                    </td>
                </tr>
                <tr>
                    <td><label><strong>Points:</strong></label></td>
                    <td>
                        <input type="number" name="points" required value="<?php echo esc_attr($points); ?>">
                    </td>
                </tr>
            </table>

            <p style="margin-top: 20px;">
                <button type="submit" class="button button-primary">
                    <?php echo $edit_id ? 'Update Points' : 'Save Points'; ?>
                </button>
            </p>
        </form>
    </div>

    <script>
        jQuery(function($) {
            $('#verify-product-code').on('click', function(e) {
                e.preventDefault();
                const productCode = $('input[name="product_code"]').val();
                if (productCode) {
                    alert('Product code verification is under development.');
                } else {
                    alert('Please enter a product code to verify.');
                }
            });
        });
    </script>
    <style>
        .add-prod-point td {
            padding: 20px;
        }
    </style>
<?php
}




add_action('admin_init', function () {
    if (
        isset($_POST['save_points_product']) &&
        wp_verify_nonce($_POST['save_points_product'], 'save_points_product_nonce')
    ) {
        $user_id = intval($_POST['user_id']);
        $product_id = intval($_POST['product_id']);
        $product_code = sanitize_text_field($_POST['product_code']);
        $points = intval($_POST['points']);
        $edit_post_id = intval($_POST['edit_post_id']);

        $post_args = [
            'post_type' => 'user_product_point',
            'post_title' => "User $user_id Product Offline Product - $product_code",
            'meta_input' => [
                'user_id' => $user_id,
                'product_id' => $product_id,
                'product_code' => $product_code,
                'points' => $points
            ],
        ];

        if ($edit_post_id) {
            $post_args['ID'] = $edit_post_id;
            wp_update_post($post_args);
        } else {
            $post_args['post_status'] = 'publish';
            wp_insert_post($post_args);
        }

        wp_redirect(admin_url('admin.php?page=manage-points-product')); // Change this slug
        exit;
    }
});


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
            echo '<div class="notice notice-success is-dismissible"><p>Membership Tier updated successfully.</p></div>';
            $users = get_users(['fields' => ['ID']]);
            foreach ($users as $user) {
                update_user_membership_tier($user->ID);
            }
        } else {
            if ($tier_count >= 3) {
                echo '<div class="notice notice-error is-dismissible"><p>You can only add up to 3 membership tiers.</p></div>';
            } else {
                wp_insert_post($post_args);
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
                        <th><label for="validity">Validity (Days)</label></th>
                        <td>
                            <select name="validity" id="validity" required>
                                <?php for ($i = 1; $i <= 365; $i++): ?>
                                    <option value="<?php echo $i; ?>" <?php selected($tier_data['validity'], $i); ?>>
                                        <?php echo $i; ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="tier_name">Gifting Products</label></th>
                        <td>
                            <?php
                            // Get products under 'gifting' category
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
                                    ],
                                ],
                            ];

                            $gifting_products = get_posts($args);

                            // prepare saved selected products
                            $saved_gifting_products = is_array($tier_data['gifting_products']) ? $tier_data['gifting_products'] : explode(',', $tier_data['gifting_products']);

                            if (!empty($gifting_products)) {
                                foreach ($gifting_products as $product) {
                                    $points = get_post_meta($product->ID, '_points_id', true);
                            ?>
                                    <label style="display:block; margin-bottom:5px;">
                                        <input type="checkbox" name="gifting_products[]" value="<?php echo esc_attr($product->ID); ?>"
                                            <?php checked(in_array($product->ID, $saved_gifting_products)); ?>>
                                        <?php echo esc_html($product->post_title); ?><?php echo ' ' . '(' . $points . ' Points)' ?>
                                    </label>
                            <?php
                                }
                            } else {
                                echo '<p>No gifting products found.</p>';
                            }
                            ?>
                        </td>

                    </tr>
                </table>

                <p><button type="submit" name="save_membership" class="button button-primary"><?php echo $is_edit ? 'Update Tier' : 'Save Tier'; ?></button></p>
            </form>
        <?php endif; ?>
    </div>

<?php
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
        'order' => 'ASC'
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

?>
    <h2> User Points</h2>
    <table class="form-table">
        <tr>
            <th><label for="assigned_membership_tier">Assign Points</label></th>
            <td>
                <input type="number" id="user_points" name="user_points" value="<?php echo $points; ?>">
                <p class="description">Assign a membership tier to this user. Can be changed at any time.</p>
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

    if (isset($_POST['user_points'])) {
        $earned_at = current_time('Y-m-d');
        $current_membership = get_user_meta($user_id, 'assigned_membership_tier', true);
        $validity_days = get_post_meta($current_membership, 'validity_months', true); // actually days
        $calculated_expiry_date = date('Y-m-d', strtotime("+$validity_days days", strtotime($earned_at)));

        $refs_post_title = "User $user_id earned points - By Admin";

        $points = intval($_POST['user_points']);

        $wpdb->insert(
            $wpdb->prefix . 'points_log',
            [
                'user_id'             => $user_id,
                'points'              => $points,
                'reson'               => $refs_post_title,
                'membership_tier_id'  => $current_membership,
                'expiry_date'         => $calculated_expiry_date,
                'created_at'          => current_time('mysql'),
            ],
            ['%d', '%d', '%s', '%s', '%s', '%s'] // Correct number of format specifiers!
        );
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
    $membership_id = get_user_meta($user_id, 'assigned_membership_tier', true);
    $membership_name = get_the_title($membership_id);
    global $wpdb;
    $table = $wpdb->prefix . 'points_log';
    $today = current_time('Y-m-d');


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

    if ($used_points > $available_point) {
        $available_points = $available_point;
    } else {
        $available_points = $available_point - $used_points;
    }    // only unexpired + unused



?>
    <div class="woocommerce-custom-dashboard" style="margin-top: 30px;">
        <h2 style="margin-bottom: 20px;">Your Account Summary</h2>

        <div style="display: flex; flex-wrap: wrap; border: 1px solid #ccc; border-radius: 8px; overflow: hidden;">
            <!-- Membership -->
            <div style="flex: 1 1 50%; padding: 15px; background-color:#ffffff; border-right: 1px solid #ccc;">
                <strong>Membership</strong>
                <div style="margin-top: 8px;"><?php echo esc_html($membership_name); ?></div>
            </div>

            <!-- Total Points -->
            <div style="flex: 1 1 50%; padding: 15px; background-color: #fff;">
                <strong>Total Points</strong>
                <div style="margin-top: 8px;"><?php echo esc_html($available_points); ?></div>
            </div>
        </div>
    </div>

<?php
}


function register_offline_verify_endpoint()
{
    add_rewrite_endpoint('offline-verify', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('points-history', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('exchange-old-product', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('product-rental', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('service-registration', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('referral-code', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('after-sale', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('lense-loan', EP_ROOT | EP_PAGES);
}
add_action('init', 'register_offline_verify_endpoint');

function add_offline_verify_menu_item($items)
{
    // Add it before logout or wherever you'd like
    $new_items = [];
    foreach ($items as $key => $item) {
        if ($key === 'customer-logout') {
            $new_items['offline-verify'] = __('Offline Product Verify', 'woocommerce');
            $new_items['points-history'] = __('Points History', 'woocommerce');
            $new_items['referral-code'] = __('Referral Code ', 'woocommerce');
        }
        if ($key === 'orders') {
            $new_items['after-sale']  = __('After The Sale', 'woocommerce');
            $new_items['lense-loan']        = __('Lense Loan', 'woocommerce');
            $new_items['exchange-old-product']  = __('Exchange Old Product', 'woocommerce');
            $new_items['product-rental']        = __('Product Rental', 'woocommerce');
            $new_items['service-registration']  = __('Service Registration', 'woocommerce');
        }
        $new_items[$key] = $item;
    }
    return $new_items;
}
add_filter('woocommerce_account_menu_items', 'add_offline_verify_menu_item');


// referral codes function

function referral_code_assign_register()
{

    $user_id = get_current_user_id();
    $used_code = get_user_meta($user_id, 'used_referral_code', true);

    echo '<h2 class="referral-bonus-code">Please Enter Referral Code</h2><br>';
    echo '<br>';
    if ($used_code) {
        echo '<p><strong>You have already used a referral code:</strong> ' . esc_html($used_code) . '</p>';
        return;
    }

?>
    <form class="referral-bonus-form" method="post">
        <label for="referral_code">Referral Code:</label>
        <input type="text" name="referral_code" id="referral_code" required>
        <input type="hidden" name="action" value="submit_referral_code">
        <?php wp_nonce_field('submit_referral_code_action', 'submit_referral_code_nonce'); ?>
        <input type="submit" value="Apply Referral Code">
    </form>
<?php
}
add_action('woocommerce_account_referral-code_endpoint', 'referral_code_assign_register');

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
                ['%d', '%d', '%s', '%s']
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
                ['%d', '%d', '%s', '%s']
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
    echo '<h2 class="woocommerce-after-sale title">After Sale Contact</h2>';
    $sale_email = get_field('sale_email', 'option');
    $sale_phone = get_field('sale_phone_number', 'option');

    // Check if either field is available before displaying
    if ($sale_email || $sale_phone) {
        echo '<div class="after-sale-contact-info">';

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
    echo '<h2 class="woocommerce-after-sale title">Lense Loan Contact Details</h2>';

    $leans_email = get_field('lense_loan_email', 'options');
    $leans_phone = get_field('lense_loan_phone_number', 'options');

    // Check if either field is available before displaying
    if ($leans_email || $leans_phone) {
        echo '<div class="after-sale-contact-info">';

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
    echo '<h2 class="woocommerce-Address-title title">Offline Product Verification</h2>';
    echo '<p>Enter your product name and code to verify its authenticity.</p>';
    echo '<br>';
    $product_titles = [];

    $args = [
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    ];

    $products = get_posts($args);

    foreach ($products as $prod) {
        $product_titles[] = get_the_title($prod->ID);
    }
    $product_code = [];
    $models = get_terms([
        'taxonomy' => 'product_model',
        'hide_empty' => false
    ]);

    foreach ($models as $model) {
        $product_code[] = $model->name;
    }




?>
    <form class="woocommerce-EditAccountForm" method="post">
        <p style="margin-bottom:10px;">
            <label for="product_name">Product Name:</label><br />
            <input type="text" name="product_name" id="product_name" placeholder="Search..." class="form-control" required />
        <ul id="search-results" style="list-style: none; padding-left: 0;"></ul>
        </p>
        <p style="margin-bottom:10px;">
            <label for="vendor_name">Vendor Name:</label><br />
            <input type="text" name="vendor_name" id="vendor_name" placeholder="Enter Vendor Name" class="form-control" required />
        </p>
        <p style="margin-bottom:10px;">
            <label for="product_code">Product Code:</label><br />
            <input type="text" name="product_code" id="product_code" placeholder="Search Product Code..." class="form-control" required />
        <ul id="search-result" style="list-style: none; padding-left: 0;"></ul>
        </p>
        <button type="submit" name="offlineProdpoint" class="button">Verify</button>
    </form>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("product_name");
            const searchResults = document.getElementById("search-results");

            if (!searchInput || !searchResults) return;

            const data = <?php echo json_encode($product_titles); ?>;

            searchInput.addEventListener("input", function() {
                const searchTerm = searchInput.value.toLowerCase();
                const filteredData = data.filter(item =>
                    item.toLowerCase().includes(searchTerm)
                );
                displayResults(filteredData);
            });

            function displayResults(results) {
                searchResults.innerHTML = "";

                if (results.length === 0) {
                    const li = document.createElement("li");
                    li.textContent = "No matches found.";
                    searchResults.appendChild(li);
                    return;
                }

                results.forEach(item => {
                    const li = document.createElement("li");
                    li.textContent = item;

                    li.addEventListener("click", function() {
                        searchInput.value = item;
                        searchResults.innerHTML = "";
                    });

                    searchResults.appendChild(li);
                });
            }

            // ✅ Hide results when clicking outside
            document.addEventListener("click", function(e) {
                if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                    searchResults.innerHTML = "";
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const productCodeInput = document.getElementById("product_code");
            const productCodeResults = document.getElementById("search-result");

            if (!productCodeInput || !productCodeResults) return;

            const productCodes = <?php echo json_encode($product_code); ?>;

            productCodeInput.addEventListener("input", function() {
                const searchTerm = productCodeInput.value.toLowerCase();
                const filteredData = productCodes.filter(item =>
                    item.toLowerCase().includes(searchTerm)
                );
                displayCodeResults(filteredData);
            });

            function displayCodeResults(results) {
                productCodeResults.innerHTML = "";

                if (results.length === 0) {
                    const li = document.createElement("li");
                    li.textContent = "No matches found.";
                    productCodeResults.appendChild(li);
                    return;
                }

                results.forEach(item => {
                    const li = document.createElement("li");
                    li.textContent = item;

                    li.addEventListener("click", function() {
                        productCodeInput.value = item;
                        productCodeResults.innerHTML = "";
                    });

                    productCodeResults.appendChild(li);
                });
            }

            // Hide when clicking outside
            document.addEventListener("click", function(e) {
                if (!productCodeInput.contains(e.target) && !productCodeResults.contains(e.target)) {
                    productCodeResults.innerHTML = "";
                }
            });
        });
    </script>


<?php

}
add_action('woocommerce_account_offline-verify_endpoint', 'offline_verify_content');


function points_history_content()
{
    global $wpdb;

    echo '<h2 class="woocommerce-Address-title title">Points History</h2>';

    $user_id = get_current_user_id();

    // Fetch points log from custom table
    $results = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM {$wpdb->prefix}points_log WHERE user_id = %d ORDER BY created_at DESC",
            $user_id
        )
    );

    if (!empty($results)) {
        echo '<div class="woocommerce-account-points-history">';
        echo '<table class="shop_table shop_table_responsive my_account_points_history">';
        echo '<thead>
                <tr>
                    <th>Date</th>
                    <th>Points</th>  
                    <th>Cutt Off Points</th>              
                    <th>Reason</th>
                    <th>Expiry</th>
                </tr>
              </thead>';
        echo '<tbody>';

        foreach ($results as $row) {
            echo '<tr>';
            echo '<td>' . esc_html(date('Y-m-d', strtotime($row->created_at))) . '</td>';
            echo '<td>' . esc_html($row->points) . '</td>';
            echo '<td>' . esc_html($row->cutoff_points) . '</td>';
            echo '<td>' . esc_html($row->reson) . '</td>';
            echo '<td>' . esc_html($row->expiry_date) . '</td>';
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
    echo do_shortcode('[contact-form-7 id="fca21eb" title="Exchange old product Form"]');
    echo '</div>';
}

add_action('woocommerce_account_exchange-old-product_endpoint', 'exchange_old_product_content');

//product rental

function product_rental_content()
{
    echo '<div class="container">';
    echo do_shortcode(' [contact-form-7 id="965a835" title="Product Rental Form"]');
    echo '</div>';
}

add_action('woocommerce_account_product-rental_endpoint', 'product_rental_content');

//service registration

function service_registration_content()
{
    echo '<div class="container">';
    echo do_shortcode('  [contact-form-7 id="dfaf7ed" title="Service registration Form"]');
    echo '</div>';
}

add_action('woocommerce_account_service-registration_endpoint', 'service_registration_content');

function handle_offline_verification_form()
{
    global $wpdb;
    if (is_user_logged_in() && isset($_POST['offlineProdpoint']) && !empty($_POST['product_code'])) {
        $user_id      = get_current_user_id();
        $product_code = sanitize_text_field($_POST['product_code']);
        $product_name = sanitize_text_field($_POST['product_name']);
        $vendor_name  = sanitize_text_field($_POST['vendor_name']);

        $models = get_terms([
            'taxonomy'   => 'product_model',
            'hide_empty' => false
        ]);

        $matched = false;

        if (!is_wp_error($models)) {
            foreach ($models as $model) {
                $model_id   = $model->term_id;
                $model_name = $model->name;
                $points     = intval(get_term_meta($model_id, 'model_point', true));
                $earned_at = current_time('Y-m-d');
                $current_membership = get_user_meta($user_id, 'assigned_membership_tier', true);
                $validity_days = get_post_meta($current_membership, 'validity_months', true); // actually days
                $calculated_expiry_date = date('Y-m-d', strtotime("+$validity_days days", strtotime($earned_at)));
                if ($model_name === $product_name) {
                    $matched = true;

                    $post_id = wp_insert_post([
                        'post_type'   => 'model_purchase_point',
                        'post_status' => 'publish',
                        'post_title'  => "Points for purchase - User #$user_id",
                        'meta_input'  => [
                            'user_id'     => $user_id,
                            'model_id'    => $model_id,
                            'points'      => $points,
                            'reason'      => 'Offline Purchase of model: ' . $model_name,
                            'vendor_name' => 'Vendor Name: ' . $vendor_name,
                            'source'      => 'offline_purchase'
                        ]
                    ]);
                    $wpdb->insert(
                        $wpdb->prefix . 'points_log',
                        [
                            'user_id'     => $user_id,
                            'points'      => $points,
                            'reson'       => 'Offline Purchase of model: ' . $model_name,
                            'membership_tier_id' => $current_membership,
                            'expiry_date' => $calculated_expiry_date,
                            'created_at'  => current_time('mysql')
                        ],
                        [
                            '%d', // user_id
                            '%d', // points
                            '%s', // reson
                            '%s'  // created_at
                        ]
                    );
                    update_user_membership_tier($user_id);

                    if ($post_id && !is_wp_error($post_id)) {
                        echo '<script>alert("Product successfully verified and logged.")</script>';
                    } else {
                        echo '<script>alert("Something went wrong. Please try again.")</script>';
                    }

                    break;
                }
            }

            // Show "not found" message only if no match was found
            if (!$matched) {
                // Instead of JS alert, let's show a proper WooCommerce-style error message
                wc_print_notice('Product name not found. Please check your input.', 'error');
            }
        } else {
            wc_print_notice('Error retrieving product models.', 'error');
        }
    }
}
add_action('init', 'handle_offline_verification_form');


function render_model_points_page()
{
    $models = get_terms([
        'taxonomy' => 'product_model',
        'hide_empty' => false
    ]);

    // Handle form submission
    if (isset($_POST['model_points_nonce']) && wp_verify_nonce($_POST['model_points_nonce'], 'save_model_points')) {
        foreach ($_POST['points'] as $term_id => $value) {
            update_term_meta($term_id, 'model_point', intval($value));
        }
        echo '<div class="notice notice-success"><p>Points updated successfully.</p></div>';
    }

?>
    <div class="wrap">
        <h1>Assign Points to Product Models</h1>
        <form method="post">
            <?php wp_nonce_field('save_model_points', 'model_points_nonce'); ?>
            <table class="widefat fixed striped">
                <thead>
                    <tr>
                        <th>Product Model</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($models as $model): ?>
                        <tr>
                            <td><?php echo esc_html($model->name); ?></td>
                            <td>
                                <input type="number" name="points[<?php echo $model->term_id; ?>]" value="<?php echo esc_attr(get_term_meta($model->term_id, 'model_point', true)); ?>" />
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p><button type="submit" class="button button-primary">Save Points</button></p>
        </form>
    </div>
<?php
}

//$model_points = get_term_meta($model_term_id, 'model_point', true);


// function register_model_purchase_point_post_type()
// {
//     register_post_type('model_purchase_point', [
//         'label' => 'Model Purchase Points',
//         'public' => false,
//         'show_ui' => true,
//         'supports' => ['title'],
//         'capability_type' => 'post',
//         'menu_position' => 25,
//         'menu_icon' => 'dashicons-money-alt',
//     ]);
// }
// add_action('init', 'register_model_purchase_point_post_type');


add_action('woocommerce_order_status_completed', function ($order_id) {
    $order = wc_get_order($order_id);
    $user_id = $order->get_user_id();

    if (!$user_id) return;

    global $wpdb;

    foreach ($order->get_items() as $item) {
        $product_id = $item->get_product_id();
        $quantity   = $item->get_quantity();

        $terms = wp_get_post_terms($product_id, 'product_model');
        if (!empty($terms) && !is_wp_error($terms)) {
            $term = $terms[0]; // Assuming one model per product

            $model_points = intval(get_term_meta($term->term_id, 'model_point', true));
            $earned_points = $model_points * $quantity;
            $current_membership = get_user_meta($user_id, 'assigned_membership_tier', true);
            $earned_at = current_time('Y-m-d');
            $validity_days = get_post_meta($current_membership, 'validity_months', true); // actually days
            $calculated_expiry_date = date('Y-m-d', strtotime("+$validity_days days", strtotime($earned_at)));


            if ($earned_points > 0) {
                // Save in custom post type
                wp_insert_post([
                    'post_type'   => 'model_purchase_point',
                    'post_status' => 'publish',
                    'post_title'  => "Points for Order #$order_id - User #$user_id",
                    'meta_input'  => [
                        'user_id'    => $user_id,
                        'order_id'   => $order_id,
                        'product_id' => $product_id,
                        'model_id'   => $term->term_id,
                        'points'     => $earned_points,
                        'membership_tier_id' => $current_membership,
                        'expiry_date' => $calculated_expiry_date,
                        'reason'     => 'Purchase of model: ' . $term->name,
                        'source'     => 'woocommerce_order'
                    ]
                ]);

                $wpdb->insert(
                    $wpdb->prefix . 'points_log',
                    [
                        'user_id'     => $user_id,
                        'points'      => $earned_points,
                        'reson'       => 'Purchase of model: ' . $term->name . " (Order #$order_id)",
                        'membership_tier_id' => $current_membership,
                        'expiry_date' => $calculated_expiry_date,
                        'created_at'  => current_time('mysql')
                    ],
                    [
                        '%d', // user_id
                        '%d', // points
                        '%s', // reson
                        '%s'  // created_at
                    ]
                );
                update_user_membership_tier($user_id);
                // Optional: order note
                $order->add_order_note("User earned $earned_points points for model '{$term->name}'.");
            }
        }
    }
});

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
    if (! empty($_POST['name'])) {
        update_user_meta($customer_id, 'name', sanitize_text_field($_POST['name']));
        wp_update_user(array(
            'ID'           => $customer_id,
            'display_name' => sanitize_text_field($_POST['name']),
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
    if (empty($_POST['name'])) {
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

add_action('woocommerce_product_options_general_product_data', 'add_points_field_for_gifting_category');
function add_points_field_for_gifting_category()
{
    global $post;

    // Check if product has 'gifting' category
    $product_id = $post->ID;
    $has_gifting = has_term('gifting', 'product_cat', $product_id);

    if ($has_gifting) {
        woocommerce_wp_text_input(array(
            'id'          => '_points_id',
            'label'       => __('Points', 'woocommerce'),
            'placeholder' => esc_html__('Enter a value', 'woocommerce'),
            'desc_tip'    => true,
            'description' => esc_html__('Add Points on Products.', 'woocommerce'),
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
        echo '<p class="purchase-with-points" style="font-weight:bold; color:#d35400;">You can purchase this product with ' . esc_html($points) . ' reward points.</p>';
    }
}



// 2. Add custom cart item data
add_filter('woocommerce_add_cart_item_data', 'wk_add_cart_item_data', 10, 3);
function wk_add_cart_item_data($cart_item_data, $product_id, $variation_id)
{
    $points = get_post_meta($product_id, '_points_id', true);
    if (!empty($points)) {
        $cart_item_data['points'] = (int) sanitize_text_field($points);
    }
    return $cart_item_data;
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
            'key'   => __('Reward Points', 'woocommerce'),
            'value' => wc_clean($cart_item_data['points']),
        );
    }
    return $item_data;
}


add_action('woocommerce_checkout_create_order_line_item', 'wc_add_points_to_order_item_meta', 10, 4);
function wc_add_points_to_order_item_meta($item, $cart_item_key, $values, $order)
{
    if (!empty($values['points'])) {
        $item->add_meta_data('points', $values['points']);
    }
}

add_action('woocommerce_review_order_before_submit', 'validate_user_points_before_order', 10, 0);

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

add_filter('woocommerce_add_to_cart_validation', function ($passed, $product_id) {
    $user_id = get_current_user_id();
    $current_membership_id = get_user_meta($user_id, 'assigned_membership_tier', true);

    if ($current_membership_id) {
        $allowed_products = get_post_meta($current_membership_id, 'gifting_products', true);

        if (!empty($allowed_products) && !in_array($product_id, (array) $allowed_products)) {
            wc_add_notice(__('This product is not available for your membership tier.'), 'error');
            return false;
        }
    }

    return $passed;
}, 10, 2);


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

function online_purchase_products_points($order)
{
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
        $points = (int) $item->get_meta('points');
        $qty = $item->get_quantity();
        $total_used_points += ($points * $qty);
    }

    if ($total_used_points <= 0) return;

    // Get the user's available points (FIFO)
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
    $earned_at = current_time('Y-m-d');
    $validity_days = get_post_meta($current_membership, 'validity_months', true); // actually days
    $calculated_expiry_date = date('Y-m-d', strtotime("+$validity_days days", strtotime($earned_at)));
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
            ['%d', '%d', '%d', '%s', '%s']
        );

        $total_used_points -= $to_deduct;
        update_user_membership_tier($user_id);
    }
}

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
