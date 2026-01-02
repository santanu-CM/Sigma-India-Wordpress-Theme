<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>
<div
    class="main__banner inner__banner__main inner__banner__small inner__banner__small__left__align details__page__banner">
    <?php

        $product_slug = $product->get_slug();


        // Define the image URLs
        $camera_images = array(
            'sigmafp'  => get_template_directory_uri() . '/assets/images/camera-product-details-hero.png',
            'default'  => get_template_directory_uri() . '/assets/images/fpl-v3.png',
        );

        // Set the image URL based on the product slug
        $image_url = ( $product_slug === 'sigmafp' ) ? $camera_images['sigmafp'] : $camera_images['default'];
     ?>
    <div class="image__box">
        <img src="<?php echo esc_url($image_url); ?>" alt="" />
    </div>
    <div class="bannre__content">
        <div class="container">
            <div class="bannre__content__inner__wrapp">
                <h1 style="color: #1E1D1D;"><?php echo esc_html($product->get_name()); ?></h1>
                <p style="color: #1E1D1D;"><?php echo wp_trim_words( $product->get_short_description(), 10, '...' ); ?></p>
                <div class="btn__wrapp">
                    <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Buy Now</a>
                </div>
<!-- 				<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                   Buy Now
                </button> -->
                <div class="btn__wrapp btn__wrapp__scroller">
                    <a href="#start">
                        <div class="sigma__mousey">
                            <div class="sigma__scroller"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="start" class="product__details__wrapp product__details__single camera__product__details__single">
    <div class="container">
        <div class="breadcrumb__wrapp">
            <ul>
                <li><a href="<?php echo home_url(); ?>">Home</a></li>
                <?php
                    // Get the product categories
                    $terms = get_the_terms( $product->get_id(), 'product_cat' );
                    if ( $terms && ! is_wp_error( $terms ) ) {
                        $cat_links = [];
                        foreach ( $terms as $term ) {
                            $cat_links[] = '<li><a href="' . get_term_link( $term ) . '">' . $term->name . '</a></li>';
                        }
                        echo implode( ' ', $cat_links );
                    }
                    ?>
                <li><?php the_title(); ?></li>
            </ul>
        </div>
        <div class="product__wrapp">
            <?php
                $product_slug = $product->get_slug();
                // Define the image URLs
                $camera_images = array(
                    'sigmafp'  => get_template_directory_uri() . '/assets/images/cameras-3.png',
                    'default'  => get_template_directory_uri() . '/assets/images/fpl-v4.png',
                );

                // Set the image URL based on the product slug
                $image_url = ( $product_slug === 'sigmafp' ) ? $camera_images['sigmafp'] : $camera_images['default'];
            ?>
            <div class="image__box">
                <img src="<?php echo esc_url($image_url); ?>" alt="" />
            </div>
            <div class="product__feature">
                <div class="product__feature__inner new__features">
                    <div class="feature__card">
                        <h3>43.3mm</h3>
                        <p>megapixels</p>
                    </div>
                    <div class="feature__card">
                        <h3>FF</h3>
                        <p>sensor</p>
                    </div>
                    <div class="feature__card">
                        <h3>Contrast</h3>
                        <p>autofocus</p>
                    </div>
                    <div class="feature__card">
                        <h3>18 fps</h3>
                        <p>burst speed</p>
                    </div>
                    <div class="feature__card">
                        <h3>422g</h3>
                        <p>in weight</p>
                    </div>
                    <div class="feature__card">
                        <h3>4K UHD</h3>
                        <p>video</p>
                    </div>
                    <div class="feature__card">
                        <h3>EVF</h3>
                        <p>optional</p>
                    </div>
                    <div class="feature__card">
                        <h3>100/640</h3>
                        <p>stills base ISO</p>
                    </div>
                    <div class="feature__card">
                        <h3>15+</h3>
                        <p>Color Modes</p>
                    </div>
                    <div class="feature__card">
                        <h3>£1600</h3>
                        <p>inc. VAT</p>
                    </div>
                </div>
                <div class="btn__wrapp">
                    <a href="#">Specification</a>
                    <a href="#">Accessories</a>
					 <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Buy Now</a>
<!--                     <a class="btn__single" href="#" >Buy Now</a> -->
<!-- 					<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                      Buy Now
                   </button> -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section__global__wrapp">
    <div class="product__details__wrapp">
        <div class="container">
           <div class="tech__specification">
               <div class="global__heading__wrapp">
                  <h2>Tech Specification</h2>
               </div>
                <?php
                        // Ensure WooCommerce functions are available
                        if ( class_exists( 'WooCommerce' ) ) {
                            // Display product tabs
                            if ( function_exists( 'woocommerce_output_product_data_tabs' ) ) {
                                woocommerce_output_product_data_tabs();
                            }
                        }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="section__global__wrapp section__global__with__bcolor">
    <div class="container">
        <?php
            // Ensure WooCommerce functions are available
            if ( class_exists( 'WooCommerce' ) ) {
                // Display product tabs
            }
            // Display related products
            if ( function_exists( 'woocommerce_output_related_products' ) ) {
                woocommerce_output_related_products();
            }
        ?>
    </div>
</div>
<!-- Buy Now Modal Start-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <button type="button" class="btn-close text-reset mt-4" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
     <h4 class="mb-4"> Choose your mount </h4>
      <?php
        // Output the Add to Cart button
        global $product;
        if ( $product ) {
            woocommerce_template_single_add_to_cart();
        }
        ?>
  </div>
  <div class="mt-auto d-flex justify-content-start">
      <button type="button" class="btn btn-secondary btn-sm mt-4" data-bs-dismiss="offcanvas" aria-label="Close">Close</button>
    </div>
</div>
<!-- Buy Now Modal End-->