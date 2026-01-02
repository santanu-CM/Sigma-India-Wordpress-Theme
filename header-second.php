<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
	
	<?php gtag_script(); // Calling the gtag script here ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
$header_top_content =get_field('header_top_content','option');
?>

<a id="button"></a>
<nav class="navbar navbar-expand-lg navbar__top navbar__top__inner js--sticky-nav">
    <div class="container">
        <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
        <a class="navbar-brand navbar___brand" href="<?php echo esc_url( home_url( '/' )); ?>">
            <img src="<?php echo esc_url(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>"
                alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
            </a>
        <?php else : ?>
         <a class="site-title"
            href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
         <?php endif; ?>

        <button class="navbar-toggler navbar__toggler hamburger__menu" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation"><span class="menu"></span></button>

            <?php
                wp_nav_menu(array(
                'theme_location'    => 'primary',
                'container'       => 'div',
                'container_id'    => 'navbarSupportedContent',
                'container_class' => 'collapse navbar-collapse',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav navbar__nav',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
            ?>
        <div class="nav__info__right">
            <a href="#" data-bs-toggle="modal" data-bs-target="#searchrmodal"><img
                    src="<?php echo get_template_directory_uri();?>/assets/images/search-ico.svg" alt="" /></a>
            <a href="<?php echo (!empty($header_top_content['my_account_url'])) ? $header_top_content['my_account_url']:'#';?>">
                <img src="<?php echo get_template_directory_uri();?>/assets/images/user-ico.svg" alt="" />
            </a>
            <?php if ( class_exists( 'WooCommerce' ) && WC()->cart ) : ?>
                <a href="#" class="slide__menu__open" data-menu="#slide-nav">
                    <div class="cart__qty" data-counter="<?php echo WC()->cart->get_cart_contents_count(); ?>">
                        <?php echo WC()->cart->get_cart_contents_count(); ?>
                    </div>
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/cart-ico.svg" alt="" />
                </a>
            <?php endif; ?>
        </div>
    </div>
</nav>

    