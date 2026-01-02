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
$terms = get_the_terms( $product->get_id(), 'product_cat' );
?>
<?php
$lense_product_details_content= get_field('lense_product_details_content', 'option');
?>
<!-- Banner section-->
<div class="main__banner inner__banner__small__single">
    <div class="bannre__content">
        <div class="container">
            <div class="bannre__content__inner__wrapp">
                <h1><?php the_title(); ?></h1>
                <p><?php echo wp_trim_words( $product->get_short_description(), 5, '...' ); ?></p>
                <div class="btn__wrapp">
                    <a href="#" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                        aria-controls="offcanvasRight">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="image__box">
        <img src="https://www.sigmaindia.in/wp-content/uploads/2024/07/full-img2.jpg" alt="">
    </div>
</div>
<!-- product specification section-->
<div id="start" class="product__details__wrapp product__details__single">
    <div class="container">
        <div class="global__heading__wrapp">
            <h3>Explore Our Products</h3>
            <h2><?php the_title(); ?></h2>
        </div>
        <div class="product__wrapp">
            <div class="image__box">
                <?php  echo woocommerce_get_product_thumbnail(); ?>
            </div>
            <div class="product__feature">
                <h2><?php the_title(); ?></h2>
                <div class="product__feature__inner">
                    <!-- <div class="feature__card__col">
                        <div class="feature__card small__feature__card">
                            <i class="ico__box">
                                <img src="assets/images/camera.svg" alt="" />
                            </i>
                            <div class="content__box">
                                <p>Camera</p>
                                <h3>SIGMA fp</h3>
                            </div>
                        </div>
                        <div class="feature__card small__feature__card">
                            <i class="ico__box">
                                <img src="assets/images/battery.svg" alt="" />
                            </i>
                            <div class="content__box">
                                <p>Battery life</p>
                                <h3>280 Shots</h3>
                            </div>
                        </div>
                    </div> -->
                    <div class="feature__card__col">
                        <div class="feature__card small__feature__card">
                            <i class="ico__box">
                                <img src="<?php echo get_template_directory_uri();?>/assets/images/camera.svg" alt="" />
                            </i>
                            <div class="content__box">
                                <p>Megapixel</p>
                                <h3>24.6MP</h3>
                            </div>
                        </div>
                        <div class="feature__card small__feature__card">
                            <i class="ico__box">
                                <img src="<?php echo get_template_directory_uri();?>/assets/images/battery.svg"
                                    alt="" />
                            </i>
                            <div class="content__box">
                                <p>Brust Speed</p>
                                <h3>18fps</h3>
                            </div>
                        </div>
                    </div>
                    <div class="feature__card__col">
                        <div class="feature__card small__feature__card">
                            <i class="ico__box">
                                <img src="<?php echo get_template_directory_uri();?>/assets/images/camera.svg" alt="" />
                            </i>
                            <div class="content__box">
                                <p>Stills base ISO</p>
                                <h3>100/640</h3>
                            </div>
                        </div>
                        <div class="feature__card small__feature__card">
                            <i class="ico__box">
                                <img src="<?php echo get_template_directory_uri();?>/assets/images/battery.svg"
                                    alt="" />
                            </i>
                            <div class="content__box">
                                <p>Weight (Battery & card)</p>
                                <h3>422gm</h3>
                            </div>
                        </div>
                    </div>
                    <div class="feature__card__col">
                        <div class="feature__card small__feature__card">
                            <i class="ico__box">
                                <img src="<?php echo get_template_directory_uri();?>/assets/images/camera.svg" alt="" />
                            </i>
                            <div class="content__box">
                                <p>Crop Zoom function</p>
                                <h3>No</h3>
                            </div>
                        </div>
                        <div class="feature__card small__feature__card">
                            <i class="ico__box">
                                <img src="<?php echo get_template_directory_uri();?>/assets/images/battery.svg"
                                    alt="" />
                            </i>
                            <div class="content__box">
                                <p>Autofocus</p>
                                <h3>Contrast</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn__wrapp">
                    <a href="#" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                        aria-controls="offcanvasRight">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ultimate ultra-fast section-->
<div class="section__global__wrapp section__global__with__bcolor ultimate__section">
    <div class="container">
        <div class="content__wrapp">
            <div class="content__box">
                <div class="global__heading__wrapp">
                    <h3>Featured</h3>
                </div>
                <?php if(!empty($lense_product_details_content['ultimate_ultra_fast_title'])):?>
                <h2><?php echo $lense_product_details_content['ultimate_ultra_fast_title'];?></h2>
                <?php endif;?>
                <?php if(!empty($lense_product_details_content['ultimate_ultra_fast_content'])):?>
                <?php echo apply_filters('the_content',$lense_product_details_content['ultimate_ultra_fast_content'] );?>
                <?php endif;?>
            </div>
            <?php if(!empty($lense_product_details_content['ultimate_ultra_fast_section_image'])):?>
            <div class="image__box">
                <img src="<?php echo esc_url($lense_product_details_content['ultimate_ultra_fast_section_image']);?>"
                    alt="" />
            </div>
            <?php endif;?>
        </div>
    </div>
</div>
<!-- gallery section-->
<div class="latest__reviews__wrapp">
    <div class="container">
        <div class="title__content">
            <h3>Gallery</h3>
            <?php if(!empty($lense_product_details_content['check_image_gallery_title'])):?>
            <h2><?php echo esc_html($lense_product_details_content['check_image_gallery_title']);?></h2>
            <?php endif;?>
        </div>
    </div>
    <div class="reviews__slider">
        <?php if(!empty($lense_product_details_content['image_gallery'])):?>
        <?php foreach($lense_product_details_content['image_gallery'] as $listing):?>
        <div class="review__slider__item">
            <?php if(!empty($listing['image'])):?>
            <div class="image__box">
                <img src="<?php echo esc_url($listing['image']);?>" alt="" />
            </div>
            <?php endif;?>
            <?php if(!empty($listing['title'])):?>
            <div class="content__wrapp">
                <h3><?php echo esc_html($listing['title']);?></h3>
            </div>
            <?php endif;?>
        </div>
        <?php endforeach;?>
        <?php endif;?>
    </div>
</div>
<!-- Product Specs section-->
<div class="section__global__wrapp section__global__with__bgcolor">
    <div class="container">
        <div class="product__hotspot">
            <div class="d-flex product__hotspot__wrapp">
                <?php if ($lense_product_details_content['product_specification_details']): ?>
                <div class="nav flex-column nav-pills nav__pills me-3" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <?php 
                        $index = 1;
                        foreach ($lense_product_details_content['product_specification_details'] as $listing): 
                            $tab_serial_no = $listing['tab_serial_no'];
                            $tab_title = $listing['tab_title'];
                            ?>
                    <button class="nav-link nav__link <?php echo ($index === 1) ? 'active' : ''; ?>"
                        id="v-pills-<?php echo esc_attr($tab_serial_no); ?>-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-<?php echo esc_attr($tab_serial_no); ?>" type="button" role="tab"
                        aria-controls="v-pills-<?php echo esc_attr($tab_serial_no); ?>"
                        aria-selected="<?php echo ($index === 1) ? 'true' : 'false'; ?>">
                        <?php echo esc_html($tab_serial_no); ?>
                    </button>
                    <?php $index++; ?>
                    <?php endforeach; ?>
                </div>

                <div class="tab-content tab__content" id="v-pills-tabContent">
                    <?php 
                        $index = 1;
                        foreach ($lense_product_details_content['product_specification_details'] as $listing): 
                            $tab_serial_no = $listing['tab_serial_no'];
                            $tab_title = $listing['tab_title'];
                            $tab_content = $listing['tab_content'];
                        ?>
                    <div class="tab-pane tab__pane fade <?php echo ($index === 1) ? 'show active' : ''; ?>"
                        id="v-pills-<?php echo esc_attr($tab_serial_no); ?>" role="tabpanel"
                        aria-labelledby="v-pills-<?php echo esc_attr($tab_serial_no); ?>-tab">
                        <div class="content__box">
                            <div class="cpounter__box"><?php echo esc_html($tab_serial_no); ?></div>
                            <h2><?php echo esc_html($tab_title); ?></h2>
                            <?php echo $tab_content ;?>
                        </div>
                    </div>
                    <?php $index++; ?>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- Tech Specs section-->
<div class="section__global__wrapp">
    <div class="container">
        <div class="global__heading__wrapp">
            <h3>Tech Specs</h3>
            <h2>Specifications in detail</h2>
        </div>
        <div class="specification__wrapp">
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
<!-- Made in Aizu section-->
<div class="cta__banner__wrapp cta__banner__wrapp__single">
    <?php if(!empty($lense_product_details_content['made_in_aizu_section_image'])): ?>
    <div class="image__box">
        <img src="<?php echo esc_url($lense_product_details_content['made_in_aizu_section_image']);?>" alt="" />
    </div>
    <?php endif;?>
    <div class="content__wrapp content__wrapp__nobg">
        <div class="container">
            <div class="content__wrapp__inner">
                <?php if(!empty($lense_product_details_content['made_in_aizu_title'])): ?>
                <div class="global__heading__wrapp">
                    <h2><?php echo esc_html($lense_product_details_content['made_in_aizu_title']);?></h2>
                </div>
                <?php endif;?>
                <?php if(!empty($lense_product_details_content['made_in_aizu_content'])): ?>
                <?php echo apply_filters('the_content',$lense_product_details_content['made_in_aizu_content'] );?>
                <?php endif;?>
                <div class="btn__wrapp">
                <a href="<?php echo !empty($lense_product_details_content['learn_more_label_url'])
                     ?$lense_product_details_content['learn_more_label_url']:'#';?>"><?php echo $lense_product_details_content['learn_more_label_title'];?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Related product section-->
<div class="section__global__wrapp">
    <div class="container">
        <div class="global__heading__wrapp">
            <h3>You May Also Like</h3>
            <h2>Compatible accessories</h2>
        </div>
        <div class="compatible__product__list">
            <div class="owl-carousel owl-theme product__list__slider__like">
                <?php
                // Get current product ID
                $current_product_id = get_the_ID();

                // Get product categories or tags to find related products
                $product_terms = wp_get_post_terms($current_product_id, 'product_cat'); // Change 'product_cat' as needed

                if (!empty($product_terms)) {
                    $term_ids = wp_list_pluck($product_terms, 'term_id');
                    
                    // Query for related products
                    $args = array(
                        'post_type' => 'product', // Adjust if needed
                        'posts_per_page' => 10,
                        'post__not_in' => array($current_product_id), // Exclude current product
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat', // Replace with appropriate taxonomy
                                'field' => 'term_id',
                                'terms' => $term_ids,
                            )
                        )
                    );

                    $related_products = new WP_Query($args);

                    if ($related_products->have_posts()) : 
                        while ($related_products->have_posts()) : $related_products->the_post(); ?>
                <div class="item">
                    <div class="product__card">
                        <a href="<?php the_permalink(); ?>">
                            <div class="image__box">
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>"
                                    alt="<?php the_title_attribute(); ?>">
                            </div>
                        </a>
                        <div class="content__box">
                            <a href="<?php the_permalink(); ?>">
                                <h4><?php the_title(); ?></h4>
                            </a>
                            <div class="price">
                            <?php echo wc_price($product->get_price()); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                }
                ?>

            </div>
        </div>
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
        <button type="button" class="btn btn-secondary btn-sm mt-4" data-bs-dismiss="offcanvas"
            aria-label="Close">Close</button>
    </div>
</div>
<!-- Buy Now Modal End-->