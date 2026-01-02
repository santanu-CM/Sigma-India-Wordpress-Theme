<?php
    $url = $_SERVER['REQUEST_URI']; 
    $extra_class = (strpos($url, '/support') !== false) ? ' body__bgcolor' : '';
?>
<footer class="<?php echo esc_attr($extra_class); ?>">
    <div class="footer__inr container__fluid__wrap">
        <div class="footer__logo">
            <img src="<?php echo get_template_directory_uri(); ?>/new-assets/images/symbol.svg" alt="" />
        </div>
        <ul class="footer__menu">
            <li class="footer__nav">
                <p><?php echo esc_html(get_field('information', 'option')); ?></p>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'newfooter',
                    'container' => false,
                    'menu_class' => 'footer__nav__list',
                    'fallback_cb' => false
                ));
                ?>
            </li>
            <li class="footer__nav">
                <p><?php echo esc_html(get_field('support', 'option')); ?></p>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'newfootertwo',
                    'container' => false,
                    'menu_class' => 'footer__nav__list',
                    'fallback_cb' => false
                ));
                ?>
            </li>
            <li class="footer__nav">
                <p><?php echo esc_html(get_field('policies', 'option')); ?></p>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'newfooterthree',
                    'container' => false,
                    'menu_class' => 'footer__nav__list',
                    'fallback_cb' => false
                ));
                ?>
            </li>
            <li class="footer__nav">
                <p><?php echo esc_html(get_field('social', 'option')); ?></p>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'newfooterfour',
                    'container' => false,
                    'menu_class' => 'footer__nav__list',
                    'fallback_cb' => false
                ));
                ?>
            </li>
        </ul>

        <p class="footer__copy">&copy; <?php echo date('Y'); ?> SIGMA India (Shetala Agencies Pvt Ltd). All rights reserved.</p>
    </div>
</footer>
<?php wp_footer(); ?>

<script>
// jQuery(document).on('click', '.qty-count', function() {
//     var action = jQuery(this).data('action');
//     var input = jQuery(this).siblings('input.product-qty');
//     var qty = parseInt(input.val());
//     if (action === 'add') {
//         input.val(qty + 1).trigger('change');
//     } else if (action === 'minus' && qty > 1) {
//         input.val(qty - 1).trigger('change');
//     }
// });

// jQuery(document).on('change', '.product-qty', function() {
//     var qty = jQuery(this).val();
//     var cart_item_key = jQuery(this).data('cart_item_key');
//     jQuery.ajax({
//         type: 'POST',
//         url: wc_cart_params.ajax_url,
//         data: {
//             action: 'update_cart_item_quantity',
//             cart_item_key: cart_item_key,
//             quantity: qty,
//         },
//         success: function() {
//             location.reload();
//         }
//     });
// });
</script>

</body>

</html>