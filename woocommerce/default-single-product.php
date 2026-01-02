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



<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>



    <div class="no__bg__banner">

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

        </div>

    </div>



    <div class="product__details__wrapp product__details__global">

        <div class="container">

            <div class="single__product__details__wrapp">

                <div class="product__slider__wrapp">

                    <div class="owl-carousel owl-theme single__product__slider">

                        <?php

                        // Get the product's gallery image IDs

                        $attachment_ids = $product->get_gallery_image_ids();



                        // Display the main product image first

                        if ( has_post_thumbnail() ) {

                            $main_image_id = $product->get_image_id();

                            echo '<div class="item">';

                            echo '<div class="image__box"><img src="' . wp_get_attachment_url( $main_image_id ) . '" alt="' . get_post_meta( $main_image_id, '_wp_attachment_image_alt', true ) . '" /></div>';

                            echo '</div>';

                        }



                        // Loop through the gallery images

                        if ( $attachment_ids && is_array( $attachment_ids ) ) {

                            foreach ( $attachment_ids as $attachment_id ) {

                                $image_url = wp_get_attachment_url( $attachment_id );

                                $alt_text = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );

                                echo '<div class="item">';

                                echo '<div class="image__box"><img src="' . $image_url . '" alt="' . $alt_text . '" /></div>';

                                echo '</div>';

                            }

                        }

                        ?>

                    </div>

                </div>



                <div class="single__product__desc">

                    <?php

                        /**

                         * Hook: woocommerce_single_product_summary.

                         *

                         * @hooked woocommerce_template_single_title - 5

                         * @hooked woocommerce_template_single_rating - 10

                         * @hooked woocommerce_template_single_price - 10

                         * @hooked woocommerce_template_single_excerpt - 20

                         * @hooked woocommerce_template_single_add_to_cart - 30

                         * @hooked woocommerce_template_single_meta - 40

                         * @hooked woocommerce_template_single_sharing - 50

                         * @hooked WC_Structured_Data::generate_product_data() - 60

                         */

                        do_action( 'woocommerce_single_product_summary' );

                    ?>

                </div>

            </div>

        </div>

    </div>

    <div class="section__global__wrapp compatible__products">

        <div class="container">

            <?php

                /**

                 * Hook: woocommerce_after_single_product_summary.

                 *

                 * @hooked woocommerce_output_product_data_tabs - 10

                 * @hooked woocommerce_upsell_display - 15

                 * @hooked woocommerce_output_related_products - 20

                 */

                do_action( 'woocommerce_after_single_product_summary' );

                ?>

        </div>

    </div>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>