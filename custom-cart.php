<?php
// Ensure WooCommerce is active
if ( class_exists( 'WooCommerce' ) ) :
    // Get WooCommerce cart
    $cart = WC()->cart;
    ?>

    <div class="slide__menu">
        <div id="slide-nav" class="cart__menu slide__menu__right">
            <span class="slide__menu__close">&nbsp;</span>
            <div class="cart__product__item">
                <?php if ( $cart->get_cart_contents_count() > 0 ) : ?>
                    <?php foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) :
                        $product = $cart_item['data'];
                        $product_name = $product->get_name();
                        $product_price = wc_price( $product->get_price() );
                        $product_image = wp_get_attachment_url( $product->get_image_id() );
                        $quantity = $cart_item['quantity'];
                        ?>

                        <div class="cart__item">
                            <div class="image__box">
                                <a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>">
                                    <img src="<?php echo esc_url( $product_image ); ?>" alt="<?php echo esc_attr( $product_name ); ?>" />
                                </a>
                            </div>
                            <div class="card__content">
                                <h3><?php echo esc_html( $product_name ); ?></h3>
                                <div class="producr__item">Price: <?php echo $product_price; ?></div>
                                <div class="producr__item">Quantity: <?php echo esc_html( $quantity ); ?></div>
                                <button class="delete__product" data-product_id="<?php echo esc_attr( $cart_item_key ); ?>">
                                     <img src="<?php echo get_template_directory_uri(); ?>/assets/images/close-black.svg" alt="Delete" />
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="mb-4 text-center">Your cart is empty.</p>
                <?php endif; ?>
            </div>

            <div class="slider__subtotal">
                <?php echo 'Subtotal - ' . WC()->cart->get_cart_subtotal(); ?>
            </div>

            <div class="slider__btn__wrapp">
                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>">View basket</a>
                <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>">Checkout</a>
            </div>
        </div>
    </div>

    <?php
endif;
