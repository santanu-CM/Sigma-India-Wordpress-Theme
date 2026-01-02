<?php

/** 
 * Template Name: Product Listing Camera
 */
get_header();

global $post;
$post_id = $post->ID;
$cat_id = 0;
if (!empty($_GET['cat_id'])) {
   $encrypted = $_GET['cat_id'];
   $cat_id = intval(sigma_decrypt($encrypted));
}
$args = [
    'post_type'      => 'product',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'tax_query'      => [
        [
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    => $cat_id,
        ],
    ],
];

$query = new WP_Query($args);
$count = 0;



?>
<div class="body__container__inner large__block">
    <div class="large__block"></div>
    <div class="c__product__listing l__grid">

        <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post();
                global $product; 
                $product_id = get_the_ID();
                $is_new_product = false;
                $product_terms = get_the_terms($product_id, 'product_cat');

                if (!empty($product_terms) && !is_wp_error($product_terms)) {
                    foreach ($product_terms as $term) {
                        if ($term->slug === 'new') {
                            $is_new_product = true;
                            break;
                        }
                    }
                }
                $product_link = $is_new_product ? home_url('camera-bf') : get_the_permalink();
                ?>

            <div class="m__product__card listing__card min__height__pc <?php echo $is_new_product ? 'new__product' : ''; ?>">

                    <a href="<?php echo esc_url($product_link); ?>" target="_blank">
                        <figure class="m__product__card__img">
                            <?php echo $product->get_image('full'); ?>
                        </figure>
                        <p class="spacing__auto">
                            <?php
                            $terms = get_the_terms(get_the_ID(), 'product_cat');
                            if ($terms && !is_wp_error($terms)) {
                               // echo esc_html($terms[0]->name);
                            }
                            ?>
                        </p>
                        <p><?php the_title(); ?></p>
                        <p><?php //echo wc_price($product->get_price()); ?></p>
                    </a>
                </div>

                <?php
                // Insert mood card (explore_category ACF block) after first product
                if ($count === 1 && have_rows('explore_category',$post_id)) :
                  
                    while (have_rows('explore_category',$post_id)) : the_row();
                        $name        = get_sub_field('name');
                        $description = get_sub_field('description');
                        $image       = get_sub_field('image');
                       
                ?>
                        <div class="m__product__card m__mood__product min__height__pc">
                            <?php if ($image) : ?>
                                <figure class="m__product__card__img">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?: $name); ?>">
                                </figure>
                            <?php endif; ?>
                            <div class="m__product__card__body fc__black">
                                <?php if ($description) : ?>
                                    <p class="f__uppercase"><?php echo nl2br(esc_html($description)); ?></p>
                                <?php endif; ?>
                                <?php if ($name) : ?>
                                    <a href="<?php echo home_url('/cameras/');?>" class="m__txt__link spacing__24" target="_blank"><?php echo esc_html($name); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php break; // only show first mood block 
                        ?>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php $count++; ?>
            <?php endwhile;
            wp_reset_postdata(); ?>
        <?php else : ?>
            <p>No products found.</p>
        <?php endif; ?>

    </div>
</div>
<?php get_footer(); ?>