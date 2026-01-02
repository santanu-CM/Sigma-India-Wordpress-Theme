<?php
$home_field_content = get_field('home_field_content');
?>
<div class="section__global__wrapp section__global__with__bcolor">
    <div class="container">
        <div class="global__heading__wrapp">
            <?php if(!empty($home_field_content['new_products_title'])):?>
            <h3><?php echo $home_field_content['new_products_title'];?></h3>
            <?php endif;?>
            <?php if(!empty($home_field_content['new_products_subtitle'])):?>
            <h2><?php echo $home_field_content['new_products_subtitle'];?></h2>
            <?php endif;?>
        </div>
        <div class="product__list__wrapp">
            <div class="owl-carousel owl-theme product__list__slider">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 15, // Number of products to display
                    'orderby' => 'date',
                    'order' => 'DESC'
                );

                $loop = new WP_Query($args);

                if ($loop->have_posts()) : 
                    while ($loop->have_posts()) : $loop->the_post();
                        global $product;
                        ?>
                <div class="item">
                    <div class="product__card">
                        <a href="<?php echo esc_url(get_permalink()); ?>">
                            <?php if ($product->is_on_sale()) : ?>
                                <div class="product__tag">Sale</div>
                            <?php elseif ($product->is_featured()) : ?>
                                <div class="product__tag">Featured</div>
                            <?php else : ?>
                                <div class="product__tag">New</div>
                            <?php endif; ?>
                            <div class="image__box">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lense-1.avif" alt="<?php the_title(); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="content__box">
                                <h4><?php the_title(); ?></h4>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                            </div>
                        </a>
                    </div>
                </div>
                <?php
                    endwhile;
                else :
                    echo __('No products found');
                endif;

                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</div>




