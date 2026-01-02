<?php
defined('ABSPATH') || exit;

get_header('shop');

global $product;
//do_action('woocommerce_before_main_content');


?>

<?php
$lense_category_page_field= get_field('lense_category_page_field','option');
?>

<div class="bg__banner">
    <div class="container">
        <div class="title__wrapp">
            <div class="breadcrumb__wrapp">
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/'));?>">Home</a></li>
                    <li>Lenses</li>
                </ul>
            </div>
            <?php if(!empty($lense_category_page_field['banner_title'])):?>
            <h3><?php echo $lense_category_page_field['banner_title'];?></h3>
            <?php endif;?>
        </div>
    </div>
</div>
<div class="section__global__wrapp">
    <div class="container">
        <div class="lense__content__wrapp">
            <div class="lense__filter__wrapp">
                <?php echo do_shortcode('[yith_wcan_filters slug="default-preset"]');?>
            </div>
            <div class="product__list__category">
                <div class="product__list__wrapp__no__bg">
                    <ul>
                        <?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 12,
                                'product_cat' => 'lenses', // Product category slug
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'paged' => $paged,
                            );
                            $products_query = new WP_Query($args);
                            if ($products_query->have_posts()):
                                while ($products_query->have_posts()):
                                    $products_query->the_post();
                                    global $product; // Access WooCommerce product object
                        ?>
                        <li>
                            <div class="product__card">
                                <a href="<?php echo get_permalink(); ?>">
                                    <div class="image__box">
                                        <?php echo get_the_post_thumbnail($product->get_id(), 'medium'); ?>
                                    </div>
                                    <?php if (!$product->is_in_stock()): ?>
                                    <div class="product__tag">Out of Stock</div>
                                    <?php elseif ($product->is_on_sale()): ?>
                                    <div class="product__tag">Sale</div>
                                    <?php else: ?>
                                    <div class="product__tag">New</div>
                                    <?php endif; ?>
                                </a>
                                <div class="content__box">
                                    <p><strong>SIGMA INDIA</strong></p>
                                    <a href="<?php echo get_permalink(); ?>">
                                        <h4><?php the_title(); ?></h4>
                                    </a>
                                    <div class="price">
                                        <?php echo wc_price($product->get_price()); ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php 
                                endwhile; 
                            endif; 
                            wp_reset_postdata();
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="pagination__wrapp">
            <ul class="pagination pagination__list">
                <?php
                        $total_pages = $products_query->max_num_pages;
                        if ($total_pages > 1) :
                            $current_page = max(1, get_query_var('paged'));

                if ($current_page > 1): ?>
                <li class="page-item page__item">
                    <a href="<?php echo get_pagenum_link($current_page - 1); ?>" aria-label="Previous">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.21238 12.5707C7.92921 12.2598 7.92921 11.7403 8.21238 11.4286L14.7462 4.23618C15.033 3.92127 15.4981 3.92127 15.7842 4.23618C16.071 4.55108 16.071 5.06257 15.7842 5.37748L9.76941 12L15.7849 18.6217C16.0717 18.9374 16.0717 19.4481 15.7849 19.7638C15.4981 20.0787 15.033 20.0787 14.7469 19.7638L8.21238 12.5707Z"
                                fill="#6A6C76" />
                        </svg>
                    </a>
                </li>
                <?php endif;

                            for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item page__item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                    <a href="<?php echo get_pagenum_link($i); ?>"><?php echo $i; ?></a>
                </li>
                <?php endfor;

                            if ($current_page < $total_pages): ?>
                <li class="page-item page__item">
                    <a href="<?php echo get_pagenum_link($current_page + 1); ?>" aria-label="Next">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.7876 12.5707C16.0708 12.2598 16.0708 11.7403 15.7876 11.4286L9.25383 4.23618C8.96702 3.92127 8.50191 3.92127 8.21583 4.23618C7.92903 4.55108 7.92903 5.06257 8.21583 5.37748L14.2306 12L8.2151 18.6217C7.9283 18.9374 7.9283 19.4481 8.2151 19.7638C8.50191 20.0787 8.96702 20.0787 9.2531 19.7638L15.7876 12.5707Z"
                                fill="#6A6C76" />
                        </svg>
                    </a>
                </li>
                <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>

<?php
get_footer('shop');
?>
