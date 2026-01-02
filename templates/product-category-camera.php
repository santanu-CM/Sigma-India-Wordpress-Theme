<?php

/**
 * Template Name: Category Camera
 */
get_header();
$image2 = get_field('discontinued_image');
$image1 = get_field('new_image');

?>
<div class="body__container__inner">
    <div class="large__block container__fluid__wrap">
        <div class="content__wid560 text__center">
            <h1 class="f__h1 f__uppercase"><?php echo get_field('title'); ?></h1>
            <p class="spacing__40"><?php echo get_field('main_content'); ?></p>
        </div>
    </div>
    <div class="large__block container__fluid__wrap">
        <div class="content__card">
            <a href="<?php echo get_field('new_link'); ?>">
                <figure>
                    <img src="<?php echo esc_url($image1['url']); ?>" alt="">
                </figure>
                <p class="f__uppercase spacing__16"><?php echo get_field('new_title'); ?></p>
            </a>
        </div>

    </div>
    <div class="large__block container__fluid__wrap">
        <?php if (have_rows('image_repeater')): ?>
            <div class="l__panel__grid panel__2__pc">
                <?php while (have_rows('image_repeater')): the_row();
                    $image = get_sub_field('image'); // Returns image array
                    $title = get_sub_field('title');
                    $description = get_sub_field('description');
                    $link_url = get_sub_field('link_url');
                ?>
                    <div class="content__card">
                        <a href="<?php echo esc_url($link_url); ?>">
                            <figure>
                                <?php if (!empty($image)): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                <?php endif; ?>
                            </figure>
                            <p class="spacing__16"><?php echo esc_html($title); ?></p>
                            <p class="spacing__20 spacing__right__120__pc spacing__right__0__sp"><?php echo esc_html($description); ?></p>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div>
    <div class="large__block container__fluid__wrap">
        <h2 class="heading__medium f__uppercase text__center"><?php echo get_field('featured_accessories_txt'); ?></h2>
        <?php
        $products = new WP_Query([
            'post_type' => 'product',
            'posts_per_page' => -1, // or a limit like 10
            'order' => 'ASC',
            'tax_query' => [
                [
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => 135,
                ],
            ],
        ]);
        ?>

        <?php if ($products->have_posts()) : ?>
            <div class="product__cards spacing__80__pc spacing__64__sp">
                <div class="slick-wrapper slick__wrapper">
                    <div id="products__slider" class="products__grid">
                        <?php while ($products->have_posts()) : $products->the_post(); ?>
                            <div class="slide-item slide__item">
                                <div class="product__card">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="image__box">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('full'); ?>
                                            <?php else: ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.png" alt="No image">
                                            <?php endif; ?>
                                        </div>
                                        <div class="content__box">
                                            <p><?php the_title(); ?></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>

    </div>
    <div class="large__block container__fluid__wrap">
        <div class="c__story__block column__direction">
            <div class="c__story__block__body spacing__20__sp">
                <h2 class="heading__medium f__uppercase"><?php echo get_field('discontinued_models_txt'); ?></h2>
                <p class="spacing__20"><?php echo get_field('description'); ?></p>
                <a href="<?php echo get_field('discontinued_link'); ?>" class="m__txt__link display__inline spacing__24"><?php echo get_field('explore_btn'); ?></a>
            </div>
            <figure class="c__story__block__img">
                <img src="<?php echo esc_url($image2['url']); ?>" alt="">
            </figure>
        </div>
    </div>
</div>
<?php get_footer(); ?>