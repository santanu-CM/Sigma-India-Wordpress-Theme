<?php
if (! defined('ABSPATH')) {
    exit;
}

do_action('woocommerce_before_account_navigation');
?>

<nav class="woocommerce-MyAccount-navigation woocommerce__myaccount__navigation" aria-label="<?php esc_attr_e('Account pages', 'woocommerce'); ?>">
    <?php
    // Single top-level link
    $dashboard_url = wc_get_account_endpoint_url('dashboard');
    $current_url = home_url(add_query_arg(null, null));
    $dashboard_active = strpos($current_url, 'dashboard') !== false ? 'active' : '';

    echo '<a class="top-level-link dashboard-link ' . esc_attr($dashboard_active) . '" href="' . esc_url($dashboard_url) . '">DASHBOARD</a>';
    // Define endpoints and section structure
    $sections = [
        'Account Settings' => [
            'edit-account' => 'Profile Information',
            'edit-address' => 'Manage Address',
        ],
        'My Orders' => [
            'orders' => 'Orders',
        ],
        'My Stuff' => [
            'offline-verify' => 'Product Registration For Loyalty Program',
            'verify-activity-code' => 'Verify Activity Code',
            'points-history' => 'My Point',
            'referral-code' => 'My Referral',
            'merchandise-products' => 'Merchandise Products',
        ],
        'Other' => [
            'after-sale' => 'After Sales Support',
            'lense-loan' => 'Lense Finance',
            'exchange-old-product' => 'Exchange',
            'product-rental' => 'Rental',
            'service-registration' => 'Service Registration',
        ],
    ];

    $current_url = home_url(add_query_arg(null, null));

    foreach ($sections as $section_title => $links) {
        echo '<div class="menu-section">';
        echo '<div class="menu-title">' . esc_html($section_title) . '</div>';
        echo '<div class="sub-menu sub__menu">';
        foreach ($links as $endpoint => $label) {
            $url = wc_get_account_endpoint_url($endpoint);
            $active = strpos($current_url, $endpoint) !== false ? 'active' : '';
            echo '<a class="' . esc_attr($active) . '" href="' . esc_url($url) . '">' . esc_html($label) . '</a>';
        }

        echo '</div></div>';
    }
    
    // Logout (single link, no submenu)
    $logout_url = wc_get_account_endpoint_url('customer-logout');
    echo '<div class="menu-section logout-section"> <div class="menu-title">';
    echo '<a class="logout-link" href="' . esc_url($logout_url) . '">' . __('Logout', 'woocommerce') . '</a>';
    echo '</div></div>';
    
    ?>
</nav>


<?php do_action('woocommerce_after_account_navigation'); ?>
<script>
    jQuery(document).ready(function($) {
        // Accordion toggle
        $('.menu-title').on('click', function() {
            let $menu = $(this).next('.sub__menu');
            $('.sub__menu').not($menu).slideUp();
            $('.menu-title').not(this).removeClass('open');
            $menu.slideToggle();
            $(this).toggleClass('open');
        });

        // Auto-expand parent of active link
        $('.sub__menu a.active').each(function() {
            $(this).closest('.sub__menu').show();
            $(this).closest('.menu-section').find('.menu-title').addClass('open');
        });
    });
</script>