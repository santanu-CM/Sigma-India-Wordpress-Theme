<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

// DO NOT close this PHP tag here!
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php gtag_script(); ?>
    <?php wp_head(); ?>
</head>
<?php
$url = $_SERVER['REQUEST_URI'];
echo $url;
$extra_class = (strpos($url, '/support') !== false) ? ' body__bgcolor' : '';

?>

<body <?php body_class($extra_class); ?>>

    <nav class="navbar navbar-expand-lg navbar__top<?php echo esc_attr($extra_class); ?>">
        <div class="container-fluid">
            <a class="navbar-brand navbar___brand" href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/new-assets/images/logo.svg" alt="Logo" /></a>
            <button class="navbar-toggler navbar__toggler hamburger__menu" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Menu</button>
            <div class="collapse navbar-collapse navbar__main" id="navbarSupportedContent">
                <div class="header__bar">
                    <button class="navbar__toggler__btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Menu</button>
                    <button class="navbar__toggler__btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Close</button>
                </div>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'newprimary',
                    'container'      => false,
                    'menu_class'     => 'navbar-nav navbar__nav',
                    'walker'         => new Sigma_Walker_Nav_Menu(),
                ));
                ?>
                
                <div class="nav__items__small__device">
                    <a href="<?php echo get_permalink(4260);?>"><?php echo esc_html('Loyalty Program');?></a>
                </div>

                <div class="nav__items__small__device">
                    <?php if (is_user_logged_in()) : ?>
                        <a href="<?php echo home_url('/my-account/'); ?>">My Account</a>
                    <?php else : ?>
                        <a href="javascript:void(0);" class="slide__menu__open" data-menu="#slide-nav">My Account</a>
                    <?php endif; ?>
                </div>
                
                <div class="nav__search__small__device">
                    <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="form-group form__group">
                            <div class="input-group input__group">
                                <input type="text" class="form-control form__control" name="s" placeholder="Search by keyword" />
                                <button class="search__bar__btn" type="submit"></button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="nav__info__right">
                <div class="user__info">
                    <?php if (!is_user_logged_in()) : ?>
                        <a href="<?php echo home_url('/loyalty-program/'); ?>">Loyalty Program</a>
                     <?php endif; ?>
                    <?php if (is_user_logged_in()) : ?>
                        <a href="<?php echo home_url('/loyalty-program/'); ?>">Loyalty Program</a>
                        <a href="<?php echo home_url('/my-account/'); ?>">My Account</a>
                    <?php else : ?>
                        <a href="javascript:void(0)" class="slide__menu__open" data-menu="#slide-nav">My Account</a>
                    <?php endif; ?>
                    <a href="javascript:void(0)" class="slide__menu__open" data-menu="#slide-nav-search">Search</a>
                </div>
                <?php if (!is_cart()) { ?>
                    <a href="javascript:void(0)" class="slide__menu__open" data-menu="#slide-nav-minicart">Cart</a>
                <?php } ?>
            </div>
        </div>
        <div class="offset__main"></div>
    </nav>
    <?php
    // Handle login form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['custom_login'])) {
        $creds = array(
            'user_login'    => sanitize_text_field($_POST['log']),
            'user_password' => $_POST['pwd'],
            'remember'      => true
        );

        $user = wp_signon($creds, false);

        if (is_wp_error($user)) {
            $error_message = $user->get_error_message();
        } else {
            wp_redirect(home_url());
            exit;
        }
    }

    // Handle logout
    if (isset($_GET['custom_logout']) && $_GET['custom_logout'] == 1) {
        wp_logout();
        wp_redirect(home_url());
        exit;
    }
    ?>
    <div class="slide__menu">
        <div id="slide-nav" class="slide__menu__slider slide__menu__right">
            <div class="header__bar">
                <span class="slide__menu__close">Log in</span>
                <span class="slide__menu__close">Close</span>
            </div>
            <div class="slide__menu__inner__wrapp">


                <form method="post" id="ajax-login-form">
                    <div id="login-error" class="login-error alert alert-danger" role="alert" style="display:none;"></div>
                    <div class="form-group form__group">
                        <label>Email/User Name*</label>
                        <input type="text" name="log" class="form-control form__control" required />
                    </div>
                    <div class="form-group form__group">
                        <label>Password*</label>
                        <input type="password" name="pwd" class="form-control form__control" required />
                    </div>
                    <button class="submit__btn" type="submit">Login</button>
                    <div class="user__account">
                        <p>Not a member yet? <a href="<?php echo esc_url(site_url()) . '/my-account'; ?>">Create an account</a></p>
                        <p><a href="<?php echo esc_url(wp_lostpassword_url()); ?>">Forgot Your Password?</a></p>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="slide__menu">
        <div id="slide-nav-search" class="slide__menu__slider slide__menu__right">
            <div class="header__bar">
                <span class="slide__menu__close">Search</span>
                <span class="slide__menu__close">Close</span>
            </div>
            <div class="slide__menu__inner__wrapp">
                <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="form-group form__group">
                        <div class="input-group input__group">
                            <input type="text" class="form-control form__control" name="s" placeholder="Search by keyword" value="<?php echo get_search_query(); ?>">
                            <button class="search__bar__btn" type="submit"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="slide__menu">
        <div id="slide-nav-minicart" class="slide__menu__slider slide__menu__right">
            <div class="header__bar">
                <span class="slide__menu__close">Cart</span>
                <span class="slide__menu__close">Close</span>
            </div>


            <div class="slide__menu__inner__wrapp cart__slider__main">
                <?php if (WC()->cart->is_empty()) : ?>
                    <div class="cart__empty__message">
                        <p>Your cart is currently empty.</p>
                    </div>
                <?php else : ?>
                <div class="cart__product__item">
                    <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) :
                        $_product = wc_get_product($cart_item['product_id']);
                        if (! $_product || ! $_product->exists()) {
                            continue;
                        }

                        $product_name     = $_product->get_name();
                        $product_price    = WC()->cart->get_product_price($_product);
                        $product_subtotal = WC()->cart->get_product_subtotal($_product, $cart_item['quantity']);
                        $product_img      = $_product->get_image();
                        $product_permalink = $_product->get_permalink();
                    ?>

                        <div class="cart__item" data-cart-key="<?php echo esc_attr($cart_item_key); ?>">
                            <div class="image__box">
                                <a href="<?php echo esc_url($product_permalink); ?>">
                                    <?php echo $product_img; ?>
                                </a>
                            </div>
                            <div class="card__content">
                                <div class="product__details">
                                    <p><?php echo esc_html($product_name); ?></p>
                                    <?php
                                    if (! empty($cart_item['variation'])) {
                                        foreach ($cart_item['variation'] as $key => $value) {
                                            echo '<p>' . wc_attribute_label(str_replace('attribute_', '', $key)) . ': ' . esc_html($value) . '</p>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="item__cart">
                                    <div class="qty-input">
                                        <div class="qty__input__inner">
                                            <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                                            <input class="product-qty" type="number"
                                                data-cart-key="<?php echo esc_attr($cart_item_key); ?>"
                                                name="product-qty" min="1" max="<?php echo esc_attr($_product->get_max_purchase_quantity()); ?>"
                                                value="<?php echo esc_attr($cart_item['quantity']); ?>">
                                            <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                                        </div>
                                    </div>
                                    <div class="add__cart">
                                        <p class="item-subtotal"><?php echo $product_subtotal; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
                <div class="cart__product__footer">
                    <div class="slider__subtotal">
                        <p>Subtotal</p>
                        <p id="slider-cart-subtotal"><?php echo WC()->cart->get_cart_subtotal(); ?></p>
                    </div>
                    <div class="btn__wrapp">
                        <a href="<?php echo esc_url(wc_get_checkout_url()); ?>">Proceed to checkout</a>
                    </div>
                </div>

                 <?php endif; ?>
            </div>



        </div>
    </div>

    

    <script>
        jQuery(document).ready(function($) {
            // Click handler for + and - buttons
            $(document).on('click', '.qty-count', function() {
                //var $container = $(this).closest('.qty__input__inner');
                var $input = $(document).find('input[name="product-qty"]');
                // // Set new value and trigger change
                $input.trigger('change');
            });


            // Quantity input change
            $(document).on('change', '.product-qty', function() {
                var $this = $(this);

                var newQty = parseInt($this.val()) || 1;
                var cartKey = $this.data('cart-key');

                $this.val(newQty); // ensure value is cleaned

                console.log({
                    action: 'update_sidecart_quantity',
                    cart_item_key: cartKey,
                    quantity: newQty,
                });

                $.ajax({
                    type: 'POST',
                    url: wc_cart_params.ajax_url,
                    data: {
                        action: 'update_sidecart_quantity',
                        cart_item_key: cartKey,
                        quantity: newQty,
                    },
                    success: function(response) {
                        if (response.success) {
                            $this.closest('.cart__item').find('.item-subtotal').html(response.data.subtotal);
                            $('#slider-cart-subtotal').html(response.data.cart_subtotal);
                        } else {
                            alert(response.data.message || 'Cart update failed');
                        }
                    },
                    error: function() {
                        alert('Error updating cart.');
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('ajax-login-form');
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(form);
                formData.append('action', 'custom_ajax_login');

                fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
                        method: 'POST',
                        credentials: 'same-origin',
                        body: formData
                    })
                    .then(res => res.json())
                    .then(data => {
                        const errorDiv = document.getElementById('login-error');
                        if (data.success) {
                            window.location.href = '<?php echo esc_url(site_url("/my-account")); ?>';
                        } else {
                            errorDiv.innerHTML = data.message;
                            errorDiv.style.display = 'block';
                        }
                    });
            });
        });
    </script>