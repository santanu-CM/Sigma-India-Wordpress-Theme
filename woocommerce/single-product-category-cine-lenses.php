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
<div class="product__details__wrapp product__details__single">
    <div class="container">
        <div class="global__heading__wrapp">
            <h3><?php echo $term->name ;?></h3>
            <h2><?php the_title(); ?></h2>
        </div>
        <div class="product__wrapp">
            <div class="image__box">
                <?php  echo woocommerce_get_product_thumbnail(); ?>
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
<div class="section__global__wrapp">
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
        <div class="review__wrapp">
            <div class="global__heading__wrapp">
                <h2>Review </h2>
            </div>
            <div class="review__wrapp__inner">
                <?php
                    $args = array(
                        'category_name' => 'reviews', 
                        'posts_per_page' => 3, 
                        'orderby'        => 'date',
                        'order'          => 'ASC'
                    );

                    $reviews_query = new WP_Query($args);

                    if ($reviews_query->have_posts()) :
                        while ($reviews_query->have_posts()) : $reviews_query->the_post();

                    $content = get_the_content();

                 ?>
                <div class="review__card">
                    <?php if (!contains_youtube_url($content)) : ?>
                    <div class="image__box">
                        <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail();
                                    } else { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-img.png"
                            alt="Static Image" />
                        <?php } ?>
                    </div>
                    <?php endif;?>
                    <div class="review__content__card">
                        <?php
                            if (contains_youtube_url($content)) {
                                // Extract the YouTube URL
                                $pattern = '/(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/(watch\?v=)?([a-zA-Z0-9\-_]+)/';
                                preg_match($pattern, $content, $matches);
                                $youtube_url = isset($matches[0]) ? $matches[0] : '';

                                if ($youtube_url) {
                                    $youtube_id = $matches[5];
                                    $embed_url = "https://www.youtube.com/embed/{$youtube_id}";
                                    ?>
						          <div class="image__box">
                                    <iframe width="100%" height="400" src="<?php echo esc_url($embed_url); ?>"
                                        title="<?php the_title(); ?>" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
						           </div>
                                    <h3><?php the_title(); ?></h3>
                                    <?php
                                } else {
                                    // Fallback if URL extraction fails
                                    echo apply_filters('the_content', $content);
                                    ?>
                                    <h3><?php the_title(); ?></h3>
                                    <?php
                                }
                            } else {
                                the_title('<h3>','</h3>');
                                the_excerpt();
                            ?>
                                <?php
                        }
                        ?>
                        <!-- <p><?php //echo wp_trim_words(get_the_content(), 20, '...'); ?></p> -->
                        <a href="<?php the_permalink(); ?>">
                            Read more
                            <i class="icon__box">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-next-red.svg"
                                    alt="" />
                            </i>
                        </a>
                    </div>
                </div>
                <?php
                        endwhile;
                        wp_reset_postdata(); // Reset post data
                    else :
                    ?>
                                <p>No reviews found.</p>
                                <?php
                    endif;
                ?>
            </div>
        </div>
    </div>
</div>
<div class="section__global__wrapp compatible__products">
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