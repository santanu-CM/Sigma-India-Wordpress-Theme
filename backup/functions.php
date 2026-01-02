<?php
/**
 * WP Bootstrap Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Bootstrap_Starter
 */

if ( ! function_exists( 'sigma_india_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sigma_india_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WP Bootstrap Starter, use a find and replace
	 * to change 'wp-bootstrap-starter' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wp-bootstrap-starter', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );



	// This theme uses wp_nav_menu() for menus Start//
	register_nav_menus( array(
		'primary' => esc_html__( 'Top Menu', 'sigma-india' ),
        'secondary'=> esc_html__('Footer One Menu','sigma-india' ),
        'third'=> esc_html__('Footer Two Menu','sigma-india' ),
        'fourth'=> esc_html__('Footer Three Menu','sigma-india' ),
        'fifth'=> esc_html__('Footer Fourth Menu','sigma-india' )
	) );
   // This theme uses wp_nav_menu() for menus End//



	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wp_bootstrap_starter_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

    function wp_boostrap_starter_add_editor_styles() {
        add_editor_style( 'custom-editor-style.css' );
    }
    add_action( 'admin_init', 'wp_boostrap_starter_add_editor_styles' );

}
endif;
add_action( 'after_setup_theme', 'sigma_india_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_bootstrap_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_bootstrap_starter_content_width', 1170 );
}
add_action( 'after_setup_theme', 'wp_bootstrap_starter_content_width', 0 );


/**
 * Register widget area Start.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sigma_india_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'wp-bootstrap-starter' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'wp-bootstrap-starter' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'sigma_india_widgets_init' );
//Register widget area End Here.


// Enqueue Scripts and Styles Start Here//
function sigma_india_scripts() {

        if(basename(get_page_template()) != 'template-bf.php'): 
    	    wp_enqueue_style( 'sigma-india', get_stylesheet_uri() );
            wp_enqueue_style( 'sigma-india-owl-carousel-min-cdn', '//owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css' );
            wp_enqueue_style( 'sigma-india-photoswipe-min-cdn', '//cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.css' );
            wp_enqueue_style( 'sigma-india-bootstrap-select-min-cdn', '//cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css' );
           
            wp_enqueue_style( 'sigma-india-bootstrap-icon-cdn', '//cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css' );
    
            wp_enqueue_style( 'sigma-india-default-skin-min-cdn', '//cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/default-skin/default-skin.min.css' );
            wp_enqueue_style( 'sigma-india-swiper-min-cdn', '//cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css' );
    
            wp_enqueue_style( 'sigma-india-slick-cdn', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css' );
            wp_enqueue_style( 'sigma-india-slick-theme-cdn', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css' );
    
            wp_enqueue_style( 'sigma-india-styles', get_template_directory_uri() . '/css/styles.css' );
            //wp_enqueue_style( 'sigma-india-font-styles', get_template_directory_uri() . '/css/font-style.css' );
    
            wp_enqueue_style( 'sigma-india-custom-style', get_template_directory_uri() . '/css/custom-style.css' );
            wp_enqueue_style( 'sigma-india-responsive-styles', get_template_directory_uri() . '/css/responsive.css' );
       
            wp_enqueue_script('jquery');
    
            // Internet Explorer HTML5 support Start//
            wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/inc/assets/js/html5.js', array(), '3.7.0', false );
            wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );
            // Internet Explorer HTML5 support End//
           
    
            //wp_enqueue_script('sigma-india-jquery-min', '//owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js', array(), null, true );
        	wp_enqueue_script('sigma-india-bootstrap-bundle-min', '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '', true );
    
            wp_enqueue_script('sigma-india-bootstrap-select-min', '//cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js', array('jquery'), '', true );
            wp_enqueue_script('sigma-india-owl-carousel-min', '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js', array('jquery'), '', true );
            wp_enqueue_script('sigma-india-photoswipe-min', '//cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.js', array('jquery'), '', true );
    
            wp_enqueue_script('sigma-india-photoswipe-ui-default-min', '//cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe-ui-default.min.js', array('jquery'), '', true );
            wp_enqueue_script('sigma-india-swiper-min', '//cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js', array('jquery'), '', true );
    
            wp_enqueue_script('sigma-india-slick-cdn', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js', array('jquery'), '', true );
    
            wp_enqueue_script('sigma-india-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), null, true );
            wp_enqueue_script('sigma-india-scripts-slider', get_template_directory_uri() . '/js/scripts-slider.js', array('jquery'), null, true );
    
            if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                wp_enqueue_script( 'comment-reply' );
            }
        endif;
}
add_action( 'wp_enqueue_scripts', 'sigma_india_scripts' );
//Enqueue Scripts and Styles End Here//


/**
 * Add Preload for CDN scripts and stylesheet
 */
function wp_bootstrap_starter_preload( $hints, $relation_type ){
    if ( 'preconnect' === $relation_type && get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
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

add_filter( 'wp_resource_hints', 'wp_bootstrap_starter_preload', 10, 2 );



function wp_bootstrap_starter_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( home_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <div class="d-block mb-3">' . __( "To view this protected post, enter the password below:", "wp-bootstrap-starter" ) . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __( "Password:", "wp-bootstrap-starter" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__( "Submit", "wp-bootstrap-starter" ) . '" class="btn btn-primary"/></div>
    </form>';
    return $o;
}
add_filter( 'the_password_form', 'wp_bootstrap_starter_password_form' );



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
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
    require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
}


// ACF Options Extended Start//	
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page();
    
    acf_add_options_sub_page('Common Header');
    acf_add_options_sub_page('Common Footer');
    acf_add_options_sub_page('Accessories Category Page');
    acf_add_options_sub_page('Camera Category Page');
    acf_add_options_sub_page('Lense Category Page');
    acf_add_options_sub_page('Cine Lenses Category Page');
    acf_add_options_sub_page('Lenses Category Product Details Page');
   
}

// ACF Options Extended End//	


//Finding Youtube url in the post content//
function contains_youtube_url($content) {
    $pattern = '/(https?:\/\/)?(www\.)?(youtube\.com|youtu\.?be)\/.+/';
    return preg_match($pattern, $content);
}

function enqueue_custom_scripts() {
    wp_enqueue_script( 'custom-cart', get_template_directory_uri() . '/js/custom-cart.js', array('jquery'), null, true );
    wp_localize_script( 'custom-cart', 'ajax_object', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ) );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_scripts' );


// Handle AJAX request to remove a product from the cart
add_action( 'wp_ajax_remove_cart_item', 'remove_cart_item' );
add_action( 'wp_ajax_nopriv_remove_cart_item', 'remove_cart_item' );

function remove_cart_item() {
    if ( isset( $_POST['product_id'] ) ) {
        $cart_item_key = sanitize_text_field( $_POST['product_id'] );

        // Remove the item from the cart
        WC()->cart->remove_cart_item( $cart_item_key );

        // Return success response
        wp_send_json_success( array( 'message' => 'Item removed' ) );
    }

    // Return error response if no product_id
    wp_send_json_error( array( 'message' => 'Product ID not provided' ) );
}

//Remove Default Breadcrumb From Woocommerce//
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

//Product Mount Attribute Showing By Call This Functions //
function populate_pa_mount_dropdown() {
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
function gtag_script() {
    ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-377WJJ56X1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-377WJJ56X1');
    </script>
    <?php
}


// Manage Points by Admin

function custom_manage_points_menu() {
    add_menu_page(
        __('Manage Points', 'your-textdomain'),
        __('Manage Points', 'your-textdomain'),
        'manage_options',
        'manage-points',
        'render_manage_points_table', // Callback for the main page
        'dashicons-awards',
        26
    );

    add_submenu_page(
        'manage-points',
        __('Assign Points by Event', 'your-textdomain'),
        __('Assign by Event', 'your-textdomain'),
        'manage_options',
        'manage-points-event',
        'render_points_by_event' // Callback for the event assignment page
    );
    
    add_submenu_page(
        'manage-points',
        __('Assign Points by Product', 'your-textdomain'),
        __('Assign by Product', 'your-textdomain'),
        'manage_options',
        'manage-points-product',
        'render_points_by_product' // Callback for the event assignment page
    );
}

add_action('admin_menu', 'custom_manage_points_menu');

// Enqueue scripts and localize user data
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_scripts');
function enqueue_custom_admin_scripts() {

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

function get_events_by_category_callback() {
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


function render_manage_points_table() {
  
// First table query and pagination setup
$paged = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;
$search = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';
$posts_per_page = 10;

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
    'posts_per_page' => $posts_per_page,
    'paged' => $paged,
    'post_status' => 'publish',
    'meta_query' => $meta_query
];

$query = new WP_Query($args);
$total_pages = $query->max_num_pages;

?>

<div class="wrap">
    <h1>Manage Assigned Points</h1>

    <!-- First Table Search Form -->
    <form method="get" style="margin-bottom: 20px;">
        <input type="hidden" name="page" value="manage-points">
        <input type="search" name="s" placeholder="Search by User ID" value="<?php echo esc_attr($search); ?>">
        <input type="submit" class="button" value="Search">
    </form>

    <!-- First Table -->
    <h2>Assigned Points by Event</h2>
    <table class="wp-list-table widefat striped">
        <thead>
            <tr>
                <th>UserID</th>
                <th>Name</th>
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

                echo '<tr>';
                echo '<td>' . $user_id . '</td>';
                echo '<td>' . esc_html(get_the_author_meta('display_name', $user_id)) . '</td>';
                echo '<td>' . esc_html($event_cat_name) . '</td>';
                echo '<td>' . esc_html(get_the_title($event_id)) . '</td>';
                echo '<td>';
                    echo match ($rank) {
                        '1' => 'First',
                        '2' => 'Second',
                        '3' => 'Third',
                        default => '—',
                    };
                echo '</td>';
                echo '<td>' . esc_html($points) . '</td>';
                echo '<td>' . esc_html(get_the_date('', get_the_ID())) . '</td>';
                echo '</tr>';
            endwhile;
        else : ?>
            <tr><td colspan="7"><?php _e('No data found.', 'your-textdomain'); ?></td></tr>
        <?php endif; ?>
        </tbody>
    </table>

    <?php
    // Pagination for first table
    if ($total_pages > 1) {
        echo '<div class="tablenav"><div class="tablenav-pages">';
        echo paginate_links([
            'base' => add_query_arg('paged', '%#%'),
            'format' => '',
            'prev_text' => __('« Prev'),
            'next_text' => __('Next »'),
            'total' => $total_pages,
            'current' => $paged
        ]);
        echo '</div></div>';
    }

    wp_reset_postdata();

    // Second Table Query and Pagination Setup
    $second_search = isset($_GET['second_search']) ? sanitize_text_field($_GET['second_search']) : '';
    $second_meta_query = [];
    if ($second_search) {
        $second_meta_query['relation'] = 'OR';
        $second_meta_query[] = [
            'key' => 'product_code',
            'value' => $second_search,
            'compare' => 'LIKE'
        ];
    }

    $args2 = [
        'post_type' => 'user_product_point',  // Change the custom post type here
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'post_status' => 'publish',
        'meta_query' => $second_meta_query
    ];

    $query2 = new WP_Query($args2);
    $total_pages2 = $query2->max_num_pages;
    ?>
    <br>
    <hr>
    <br>

    <!-- Second Table Search Form -->
    <form method="get" style="margin-bottom: 20px;">
        <input type="hidden" name="page" value="manage-points-product">
        <input type="search" name="second_search" placeholder="Search by Product Code" value="<?php echo esc_attr($second_search); ?>">
        <input type="submit" class="button" value="Search">
    </form>

    
    <!-- Second Table -->
    <h2>Assigned Points by Product</h2>
    <table class="wp-list-table widefat striped">
        <thead>
            <tr>
                <th>UserID</th>
                <th>Name</th>
                <th>Product</th>
                <th>Product Code</th>
                <th>Points</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($query2->have_posts()) : 
            while ($query2->have_posts()) : $query2->the_post();
                $user_id = get_post_meta(get_the_ID(), 'user_id', true);
                $product_id = get_post_meta(get_the_ID(), 'product_id', true);
                $product_code = get_post_meta(get_the_ID(), 'product_code', true);
                $points = get_post_meta(get_the_ID(), 'points', true);

                echo '<tr>';
                echo '<td>' . $user_id . '</td>';
                echo '<td>' . esc_html(get_the_author_meta('display_name', $user_id)) . '</td>';
                echo '<td>' . esc_html(get_the_title($product_id)) . '</td>';
                echo '<td>' . esc_html($product_code) . '</td>';
                echo '<td>' . esc_html($points) . '</td>';
                echo '<td>' . esc_html(get_the_date('', get_the_ID())) . '</td>';
                echo '</tr>';
            endwhile;
        else : ?>
            <tr><td colspan="6"><?php _e('No data found.', 'your-textdomain'); ?></td></tr>
        <?php endif; ?>
        </tbody>
    </table>

    <?php
    // Pagination for second table
    if ($total_pages2 > 1) {
        echo '<div class="tablenav"><div class="tablenav-pages">';
        echo paginate_links([
            'base' => add_query_arg('paged', '%#%'),
            'format' => '',
            'prev_text' => __('« Prev'),
            'next_text' => __('Next »'),
            'total' => $total_pages2,
            'current' => $paged
        ]);
        echo '</div></div>';
    }

    wp_reset_postdata();
    ?>
</div>
<?php  
}

function render_points_by_event() {
    $users = get_users(['fields' => ['ID', 'display_name']]);
    $event_categories = get_terms([
        'taxonomy' => 'tribe_events_cat',
        'hide_empty' => false
    ]);
    ?>
    <div class="wrap">
        <h2>Assign Points by Event</h2>
        <form method="post" id="manage-points-form">
            <?php wp_nonce_field('save_points_nonce', 'save_points'); ?>

            <!-- Step 1: Choose Event Category & Event -->
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
        const maxRows = 3;

        $('#event-cat-selector').on('change', function () {
            const catId = $(this).val();
            $('#event-selector').html('<option>Loading...</option>');
            $.post(ajaxurl, {
                action: 'get_events_by_category',
                cat_id: catId
            }, function (res) {
                if (res.success) {
                    $('#event-selector').html(res.data); // Insert events
                } else {
                    $('#event-selector').html('<option value="">No events found</option>');
                }
            });
        });

        $('#event-selector').on('change', function () {
            if ($(this).val()) {
                $('#point-entry-wrapper').slideDown();
                $('#points-repeater').html('');
                rowCount = 0;
                $('#add-row').trigger('click'); // Add one row by default
            } else {
                $('#point-entry-wrapper').hide();
            }
        });

        $('#add-row').on('click', function () {
            if (rowCount >= maxRows) return;
            let index = rowCount;

            let rowHtml = `<div class="point-row" style="margin-bottom:15px; padding:10px; border:1px solid #ddd;">
                    <label>User:</label>
                    <select name="points[${index}][user_id]" required>
                        <option value="">Select User</option>`;
                        users.forEach(user => {
                            rowHtml += `<option value="${user.ID}">${user.display_name}</option>`;
                        });
                rowHtml += `</select>

                    <label>Rank:</label>
                    <select name="points[${index}][rank]" required>
                        <option value="">Select Rank</option>
                        <option value="1">First</option>
                        <option value="2">Second</option>
                        <option value="3">Third</option>
                    </select>

                    <label>Points:</label>
                    <input type="number" name="points[${index}][points]" required>

                    <input type="hidden" name="points[${index}][event_id]" value="${$('#event-selector').val()}">
                </div>`;

            $('#points-repeater').append(rowHtml);
            rowCount++;
        });
    });
    </script>
    <?php
}


add_action('wp_ajax_get_events_by_category', function () {
    if (!isset($_POST['cat_id'])) {
        wp_send_json_error(['message' => 'No category ID provided']);
    }

    $cat_id = intval($_POST['cat_id']);
    $events = get_posts([
        'post_type' => 'tribe_events',
        'posts_per_page' => -1,
        'tax_query' => [[
            'taxonomy' => 'tribe_events_cat',
            'field' => 'term_id',
            'terms' => $cat_id
        ]]
    ]);

    if (empty($events)) {
        wp_send_json_error(['message' => 'No events found']);
    }

    $options = '<option value="">Select Event</option>';
    foreach ($events as $event) {
        $options .= '<option value="' . esc_attr($event->ID) . '">' . esc_html($event->post_title) . '</option>';
    }

    wp_send_json_success(['data' => $options]);
});

add_action('admin_init', function () {
    if (isset($_POST['save_points']) && wp_verify_nonce($_POST['save_points'], 'save_points_nonce')) {
        $points = $_POST['points'];

        foreach ($points as $entry) {
            $user_id = intval($entry['user_id']);
            $event_id = intval($entry['event_id']);
            $rank = intval($entry['rank']);
            $point_val = intval($entry['points']);

            // Check if the rank for this event already has a user assigned
            $existing_points = get_posts([
                'post_type' => 'user_event_point',
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

            // If a rank already has a user assigned, don't allow the same rank to be reassigned
            if (empty($existing_points)) {
                // No user is assigned this rank for the event, proceed to insert the new record
                wp_insert_post([
                    'post_type' => 'user_event_point',
                    'post_status' => 'publish',
                    'post_title' => "User $user_id - Event $event_id - Rank $rank",
                    'meta_input' => [
                        'user_id' => $user_id,
                        'event_id' => $event_id,
                        'rank' => $rank,
                        'points' => $point_val
                    ]
                ]);

                add_action('admin_notices', function () {
                    echo '<div class="notice notice-success"><p>Points saved successfully!</p></div>';
                });
            } else {
                // If a rank is already assigned, show an error message
                add_action('admin_notices', function () {
                    echo '<div class="notice notice-error"><p>Rank and Point for this event has already been assigned to another user. No new record was added.</p></div>';
                });
            }
        }
    }
});


function render_points_by_product() {
    // Get all users
    $users = get_users(['fields' => ['ID', 'display_name']]);

    // Get all products from WooCommerce
    $products = wc_get_products([
        'limit' => -1, // Get all products
        'status' => 'publish'
    ]);

    ?>
    <div class="wrap">
        <h2><?php _e('Assign Points by Product', 'your-textdomain'); ?></h2>
        <form method="post" id="manage-points-product-form">
            <?php wp_nonce_field('save_points_product_nonce', 'save_points_product'); ?>

            <!-- Select User -->
            <table class="add-prod-point">
                <tr>
                    <td>
                         <label><strong><?php _e('Username:', 'your-textdomain'); ?></strong></label>
                    </td>
                    <td>
                        <select name="user_id" required>
                            <option value=""><?php _e('Select User', 'your-textdomain'); ?></option>
                            <?php foreach ($users as $user): ?>
                                <option value="<?php echo esc_attr($user->ID); ?>"><?php echo esc_html($user->display_name); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <!-- Select Product -->
                        <label><strong><?php _e('Product:', 'your-textdomain'); ?></strong></label>
                    </td>
                    <td>
                        <select name="product_id" required>
                            <option value=""><?php _e('Select Product', 'your-textdomain'); ?></option>
                            <?php foreach ($products as $product): ?>
                                <option value="<?php echo esc_attr($product->get_id()); ?>"><?php echo esc_html($product->get_name()); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <!-- Product Code -->
                        <label><strong><?php _e('Product Code:', 'your-textdomain'); ?></strong></label>
                    </td>
                    <td>
                        <input type="text" name="product_code" required>
                        <!-- Verify Link -->
                        <p><a href="#" id="verify-product-code"><?php _e('Verify', 'your-textdomain'); ?></a></p>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <!-- Points -->
                        <label><strong><?php _e('Points:', 'your-textdomain'); ?></strong></label>
                    </td>
                    <td>
                        <input type="number" name="points" required>
                    </td>
                </tr>
            </table>

            <p style="margin-top: 20px;">
                <button type="submit" class="button button-primary"><?php _e('Save Points', 'your-textdomain'); ?></button>
            </p>
        </form>
    </div>

    <script>
    jQuery(function($) {
        $('#verify-product-code').on('click', function(e) {
            e.preventDefault();
            const productCode = $('input[name="product_code"]').val();

            if (productCode) {
                alert('<?php _e('Product code verification is under development.', 'your-textdomain'); ?>');
            } else {
                alert('<?php _e('Please enter a product code to verify.', 'your-textdomain'); ?>');
            }
        });
    });
    </script>
    <style>
        .add-prod-point td{
            padding: 20px;
        }
    <?php
}


add_action('admin_init', function () {
    if (isset($_POST['save_points_product']) && wp_verify_nonce($_POST['save_points_product'], 'save_points_product_nonce')) {
        $user_id = intval($_POST['user_id']);
        $product_id = intval($_POST['product_id']);
        $product_code = sanitize_text_field($_POST['product_code']);
        $points = intval($_POST['points']);

        // Check if the product code exists (you can implement your logic for verifying product code here)
        if (empty($product_code)) {
            add_action('admin_notices', function () {
                echo '<div class="notice notice-error"><p>' . __('Product code is required.', 'your-textdomain') . '</p></div>';
            });
            return;
        }

        // Save points to the database as a custom post type or anywhere you want
        wp_insert_post([
            'post_type' => 'user_product_point',
            'post_status' => 'publish',
            'post_title' => "User $user_id - Product $product_id - Code $product_code",
            'meta_input' => [
                'user_id' => $user_id,
                'product_id' => $product_id,
                'product_code' => $product_code,
                'points' => $points
            ]
        ]);

        add_action('admin_notices', function () {
            echo '<div class="notice notice-success"><p>' . __('Points saved successfully for the product!', 'your-textdomain') . '</p></div>';
        });
    }
});


// Showing total point to Users list

// Add new column to Users table
add_filter('manage_users_columns', function($columns) {
    $columns['total_points'] = __('Total Points', 'your-textdomain');
    return $columns;
});

// Display content for the new column
add_filter('manage_users_custom_column', function($value, $column_name, $user_id) {
    if ($column_name === 'total_points') {
        // Get total from event-based points
        $event_args = [
            'post_type' => 'user_event_point',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_query' => [[
                'key' => 'user_id',
                'value' => $user_id,
                'compare' => '='
            ]]
        ];
        $event_points = 0;
        $event_posts = get_posts($event_args);
        foreach ($event_posts as $post) {
            $event_points += intval(get_post_meta($post->ID, 'points', true));
        }

        // Get total from product-based points (if exists)
        $product_args = [
            'post_type' => 'user_product_point',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_query' => [[
                'key' => 'user_id',
                'value' => $user_id,
                'compare' => '='
            ]]
        ];
        $product_points = 0;
        $product_posts = get_posts($product_args);
        foreach ($product_posts as $post) {
            $product_points += intval(get_post_meta($post->ID, 'points', true));
        }

        $total_points = $event_points + $product_points;
        return $total_points;
    }
    return $value;
}, 10, 3);



// Manage Membership by Admin

function custom_manage_membership_menu() {
    add_menu_page(
        __('Manage Membership', 'your-textdomain'),
        __('Manage Membership', 'your-textdomain'),
        'manage_options',
        'manage-membership',
        'render_manage_membership_table', // Callback for the main page
        'dashicons-superhero',
        26
    );

    add_submenu_page(
        'manage-membership',
        __('Add Membership', 'your-textdomain'),
        __('Add Membership', 'your-textdomain'),
        'manage_options',
        'add_memebership',
        'render_add_memebership' // Callback for the event assignment page
    );

}
add_action('admin_menu', 'custom_manage_membership_menu');


function render_add_memebership() {
    $post_counts = wp_count_posts('membership_tier');
    $tier_count = isset($post_counts->publish) ? (int) $post_counts->publish : 0;
    
    //echo "Published membership tiers: " . $tier_count;

    // Handle form submission
    if (
        isset($_POST['save_membership']) &&
        isset($_POST['save_membership_nonce']) &&
        wp_verify_nonce($_POST['save_membership_nonce'], 'save_membership_nonce')
    ) {
        if ($tier_count >= 3) {
            echo '<div class="notice notice-error is-dismissible"><p>You can only add up to 3 membership tiers.</p></div>';
        } else {
            $tier_name = sanitize_text_field($_POST['tier_name']);
            $points_from = intval($_POST['points_from']);
            $points_to = intval($_POST['points_to']);
            $validity = intval($_POST['validity']);

            wp_insert_post([
                'post_type' => 'membership_tier',
                'post_status' => 'publish',
                'post_title' => $tier_name,
                'meta_input' => [
                    'points_from' => $points_from,
                    'points_to' => $points_to,
                    'validity_months' => $validity
                ]
            ]);

            echo '<div class="notice notice-success is-dismissible"><p>Membership Tier saved successfully.</p></div>';
            $tier_count++; // Just to update UI
        }
    }

    ?>
    <div class="wrap">
        <h1>Add Membership Tier</h1>

        <?php if ($tier_count >= 3): ?>
            <div class="notice notice-warning is-dismissible"><p>You have already added 3 tiers. Delete one to add a new tier.</p></div>
        <?php else: ?>
            <form method="post">
                <?php wp_nonce_field('save_membership_nonce', 'save_membership_nonce'); ?>

                <table class="form-table">
                    <tr>
                        <th><label for="tier_name">Tier Name</label></th>
                        <td><input type="text" name="tier_name" id="tier_name" required class="regular-text"></td>
                    </tr>
                    <tr>
                        <th><label>Point Range</label></th>
                        <td>
                            From: <input type="number" name="points_from" required style="width: 100px;"> &nbsp;
                            To: <input type="number" name="points_to" required style="width: 100px;">
                        </td>
                    </tr>
                    <tr>
                        <th><label for="validity">Validity (Months)</label></th>
                        <td>
                            <select name="validity" id="validity" required>
                                <?php for ($i = 1; $i <= 12; $i++): ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </td>
                    </tr>
                </table>

                <p><button type="submit" name="save_membership" class="button button-primary">Save Tier</button></p>
            </form>
        <?php endif; ?>
    </div>
    <?php
}
