<?php

/**
 * Template Name: Product Verify Page 
 */
get_header();

// Start session early
if (!session_id()) {
    session_start();
}

// Check session
if (!isset($_SESSION['verified_product'])) {
    echo '<p style="
    margin-top: 10%;
">No product verified.</p>';
    exit;
}

$data = $_SESSION['verified_product'];

// Extract values from session
$product_name       = sanitize_text_field($data['product_name']);
$serial_no          = sanitize_text_field($data['serial_no']);
$product_category   = sanitize_text_field($data['product_category']);
$vendor_name        = sanitize_text_field($data['vendor_name']);
$user_id            = get_current_user_id();

// Validate product post by title
$product_post = get_page_by_title($product_name, OBJECT, 'loyalty_products');
if (!$product_post) {
    echo '<p style="
    margin-top: 10%;
">❌ Product not matched in the system.</p>';
    exit;
}

// Get points from ACF field
$points = get_field('loyalty_points', $product_post->ID);
if (!$points || !is_numeric($points)) {
    echo '<p style="
    margin-top: 10%;
">❌ This product has no points assigned.</p>';

    exit;
}

// Check for duplicate entry in custom table
global $wpdb;
$reason = 'For Product Registration: ' . $product_name .  ' Of Category ' . $product_category;


$existing = $wpdb->get_var($wpdb->prepare("
    SELECT COUNT(*) FROM {$wpdb->prefix}points_log
    WHERE user_id = %d AND reson LIKE %s
", $user_id, '%' . $wpdb->esc_like($reason) . '%'));

if ($existing > 0) {
?><div class="container">
        <div class="verified-txt" style="text-align: center">
            <p style="
    margin-top: 10%;
"> This product has already been verified and points claimed.</p>

            <a href="<?php echo esc_url(home_url('/my-account/')); ?>" class="button" style="
margin-top: 3%;
display: inline-block;
padding: 10px 20px;
background-color: #000;
color: #fff;
text-decoration: none;
border-radius: 5px;
">
                ← Back to My Account
            </a>
        </div>
    </div>


<?php
    exit;
}

// Points expiry and user tier
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
        'reson'              => $reason,
        'membership_tier_id' => $current_membership,
        'expiry_date'        => $calculated_expiry_date,
    ],
    ['%d', '%d', '%s', '%s', '%s']
);

// Update user membership tier if needed
if (function_exists('update_user_membership_tier')) {
    update_user_membership_tier($user_id);
}

// Success message
?>
<div class="container">
    <div class="product-verification-result" style="text-align: center">
        <h2>✅ Thank You!</h2>
        <p style="margin-top: 10%;">You earned <strong><?php echo esc_html($points); ?> points</strong> for your Product Registration.</p>
        <a href="<?php echo esc_url(home_url('/my-account/')); ?>" class="button" style="
        margin-top: 3%;
        display: inline-block;
        padding: 10px 20px;
        background-color: #000;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    ">
            ← Back to My Account
        </a>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        $('#backToAccount').on('click', function(e) {
            e.preventDefault();

            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                data: {
                    action: 'clear_verified_product_session'
                },
                success: function(response) {
                    // Redirect after clearing session
                    window.location.href = '<?php echo esc_url(home_url('/my-account/')); ?>';
                }
            });
        });
    });
</script>

<?php

get_footer();
