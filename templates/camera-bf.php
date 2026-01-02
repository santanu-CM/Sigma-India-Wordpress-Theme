<?php

/** 
 * Template Name:  Camera Bf
 */
get_header();
$video = get_field('banner_video');
$video_image = get_field('banner_image');
$image1 = get_field('image1');
$image2 = get_field('image2');
$video1 = get_field('video1');
$video_image1 = get_field('video_image1');
$video2 = get_field('video2');
$video_image2 = get_field('video_image2');
$video3 = get_field('video3');
$video_image3 = get_field('video_image3');
$image4 = get_field('image4');
$image5 = get_field('image5');
$image6 = get_field('image6');
$story_blocks1_video = get_field('story_blocks1_video');
$story_blocks1_image = get_field('story_blocks1_image');
$story_blocks2_video = get_field('story_blocks2_video');
$story_blocks2_image = get_field('story_blocks2_image');
$story_blocks3_video = get_field('story_blocks3_video');
$story_blocks3_image = get_field('story_blocks3_image');
$video_features1_file = get_field('video_features1_file');
$video_features1_image = get_field('video_features1_image');
$video_features2_file = get_field('video_features2_file');
$video_features2_image = get_field('video_features2_image');
$video_features3_file = get_field('video_features3_file');
$video_features3_image = get_field('video_features3_image');

?>
<div class="sub__header nav__down container__fluid__wrap">
    <div class="sub__header__inner l__grid panel__2 content__between">
        <p class="f__ul"><?php echo get_field('head_title'); ?></p>
        <ul class="l__grid content__end">
            <li><a href="#specifications" class="f__uppercase f__ul"><?php echo get_field('head_txt1'); ?></a></li>
            <li><a href="#buy" class="f__uppercase f__ul"><?php echo get_field('head_txt2'); ?></a></li>
        </ul>
    </div>
</div>
<div class="spacing__48 outer__wrap">
    <div class="main__banner main__banner__single">
        <div class="m__video">
            <video autoplay muted loop id="video">
                <source src="<?php echo $video['url']; ?>" type="video/mp4" poster="<?php echo $video_image['url']; ?>">
            </video>
        </div>
    </div>
</div>
<div class="body__container body__container__single">
    <div class="container__fluid__wrap">
        <div class="large__block">
            <h1 class="f__h1 f__uppercase text__center"><?php echo get_field('banner_heading'); ?></h1>
            <div class="l__line__5__pc text__center spacing__24">
                <?php echo get_field('banner_content'); ?>
            </div>
        </div>
        <div class="large__block">
            <figure>
                <source srcset="<?php echo $image1['url']; ?>" media="(max-width: 768px)">
                <img src="<?php echo $image1['url']; ?>" alt="">
            </figure>
        </div>
        <div class="large__block">
            <div class="content__wid770 text__center">
                <h2 class="f__h2 f__uppercase"><?php echo get_field('title1'); ?></h2>
                <div class="l__line__5__pc text__center spacing__24">
                    <?php echo get_field('content1'); ?>
                </div>
            </div>
        </div>
        <div class="large__block">
            <figure>
                <source srcset="<?php echo $image2['url']; ?>" media="(max-width: 768px)">
                <img src="<?php echo $image2['url']; ?>" alt="">
            </figure>
        </div>
        <div class="large__block">
            <div class="container__fluid__wrap">
                <div class="l__slide">
                    <div id="camera__bf__view" class="camera__bf__view">
                        <?php if (have_rows('image_slider_repeater')) : ?>
                            <?php while (have_rows('image_slider_repeater')) : the_row(); ?>
                                <?php
                                $image = get_sub_field('image'); // Get ACF image array
                                if ($image):
                                    $img_url = esc_url($image['url']);
                                    $alt = esc_attr($image['alt'] ?: '');
                                ?>
                                    <div class="slide-item slide__item">
                                        <figure>
                                            <source srcset="<?php echo $img_url; ?>" media="(max-width:768px)">
                                            <img src="<?php echo $img_url; ?>" alt="<?php echo $alt; ?>">
                                        </figure>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="large__block">
            <div class="l__panel__grid panel__2__pc">
                <?php if (have_rows('image3_repeater')): ?>
                    <?php while (have_rows('image3_repeater')): the_row(); ?>
                        <?php
                        $image = get_sub_field('image'); // ACF Image field
                        if ($image):
                            $img_url = esc_url($image['url']);
                            $alt = esc_attr($image['alt'] ?: '');
                        ?>
                            <div class="content__card">
                                <figure>
                                    <img src="<?php echo $img_url; ?>" alt="<?php echo $alt; ?>">
                                </figure>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="large__block">
            <div class="m__video">
                <video autoplay="" muted="" loop="" id="video">
                    <source src="<?php echo $video1['url']; ?>" type="video/mp4" poster="<?php echo $video_image1['url']; ?>">

                </video>
            </div>
        </div>
        <div class="large__block">
            <div class="content__wid770 text__center">
                <h2 class="f__h2 f__uppercase"><?php echo get_field('title2'); ?></h2>
                <div class="l__line__5__pc text__center spacing__24">
                    <p><?php echo get_field('content2'); ?></p>
                </div>
            </div>
        </div>
        <div class="large__block">
            <div class="c__story__block column__direction">
                <div class="c__story__block__body spacing__20__sp">
                    <h2 class="heading__medium f__uppercase"><?php echo get_field('story_blocks1'); ?></h2>
                    <p class="spacing__20"><?php echo get_field('story_blocks1_description'); ?></p>
                </div>
                <figure class="c__story__block__img">
                    <div class="m__video">
                        <video autoplay="" muted="" loop="" id="video">
                            <source src="<?php echo $story_blocks1_video['url']; ?>" type="video/mp4" poster="<?php echo $story_blocks1_image['url']; ?>">
                        </video>
                    </div>
                </figure>
            </div>
        </div>
        <div class="large__block">
            <div class="c__story__block img__left">
                <div class="c__story__block__body spacing__20__sp">
                    <h2 class="heading__medium f__uppercase"><?php echo get_field('story_blocks2'); ?></h2>
                    <p class="spacing__20"><?php echo get_field('story_blocks2_description'); ?></p>
                </div>
                <figure class="c__story__block__img">
                    <div class="m__video">
                        <video autoplay="" muted="" loop="" id="video">
                            <source src="<?php echo $story_blocks2_video['url']; ?>" type="video/mp4" poster="<?php echo $story_blocks2_image['url']; ?>">
                        </video>
                    </div>
                </figure>
            </div>
        </div>
        <div class="large__block">
            <div class="c__story__block column__direction">
                <div class="c__story__block__body spacing__20__sp">
                    <h2 class="heading__medium f__uppercase"><?php echo get_field('story_blocks3'); ?></h2>
                    <p class="spacing__20"><?php echo get_field('story_blocks3_description'); ?></p>
                    <p class="spacing__20"><?php echo get_field('story_blocks3_description2'); ?></p>
                </div>
                <figure class="c__story__block__img">
                    <div class="m__video">
                        <video autoplay="" muted="" loop="" id="video">
                            <source src="<?php echo $story_blocks3_video['url']; ?>" type="video/mp4" poster="<?php echo $story_blocks3_image['url']; ?>">
                        </video>
                    </div>
                </figure>
            </div>
        </div>
        <div class="large__block">
            <div class="m__video">
                <video autoplay="" muted="" loop="" id="video">
                    <source src="<?php echo $video2['url']; ?>" type="video/mp4" poster="<?php echo $video_image2['url']; ?>">
                </video>
            </div>
        </div>
        <div class="large__block">
            <div class="content__wid770 text__center">
                <h2 class="f__h2 f__uppercase"><?php echo get_field('title3'); ?></h2>
                <div class="l__line__5__pc text__center spacing__24">
                    <?php echo get_field('content3'); ?>
                </div>
            </div>
        </div>
        <div class="large__block">
            <div class="l__panel__grid panel__2__pc">
                <figure class="c__story__block__img">
                    <div class="m__video video__cover__long">
                        <video autoplay="" muted="" loop="" id="video">
                            <source src="<?php echo $video3['url']; ?>" type="video/mp4" poster="<?php echo $video_image3['url']; ?>">
                        </video>
                    </div>
                </figure>
                <div class="content__card">
                    <figure>
                        <img src="<?php echo $image4['url']; ?>" alt="">
                    </figure>
                </div>
            </div>
        </div>
        <div class="large__block">
            <div class="content__wid770 text__center">
                <h2 class="f__h2 f__uppercase"><?php echo get_field('title4'); ?></h2>
                <div class="l__line__5__pc text__center spacing__24">
                    <p><?php echo get_field('content4'); ?></p>
                </div>
            </div>
        </div>
        <div class="large__block">
            <div class="cover__block">
                <figure>
                    <img src="<?php echo $image5['url']; ?>" alt="">
                </figure>
            </div>

            <?php echo get_field('text_field'); ?>
        </div>
        <div class="large__block">
            <div class="c__story__block img__left">
                <div class="c__story__block__body spacing__20__sp">
                    <h2 class="heading__medium f__uppercase"><?php echo get_field('colors_heading'); ?></h2>
                    <?php if (have_rows('color_modes')): ?>
                        <ul class="spacing__16 f__ul tab__nav__wrap" id="pills-tab" role="tablist">
                            <?php
                            $i = 0;
                            while (have_rows('color_modes')): the_row();
                                $title = get_sub_field('title');
                                $slug = sanitize_title($title);
                                $active = $i === 0 ? 'active' : '';
                            ?>
                                <li class="nav-item nav__item" role="presentation">
                                    <button
                                        class="nav-link nav__link <?php echo $active; ?>"
                                        id="pills-<?php echo $slug; ?>-tab"
                                        data-bs-toggle="pill"
                                        data-bs-target="#pills-<?php echo $slug; ?>"
                                        type="button"
                                        role="tab"
                                        aria-controls="pills-<?php echo $slug; ?>"
                                        aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>">
                                        <?php echo esc_html($title); ?>
                                    </button>
                                </li>
                            <?php $i++;
                            endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <?php if (have_rows('color_modes')): ?>
                    <div class="c__story__block__img">
                        <div class="tab-content tab__content" id="pills-tabContent">
                            <?php
                            $i = 0;
                            while (have_rows('color_modes')): the_row();
                                $title = get_sub_field('title');
                                $image = get_sub_field('image');
                                $slug = sanitize_title($title);
                                $active = $i === 0 ? 'show active' : '';
                            ?>
                                <div
                                    class="tab-pane tab__pane <?php echo $active; ?>"
                                    id="pills-<?php echo $slug; ?>"
                                    role="tabpanel"
                                    aria-labelledby="pills-<?php echo $slug; ?>-tab">
                                    <figure>
                                        <?php if ($image): ?>
                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                        <?php endif; ?>
                                    </figure>
                                </div>
                            <?php $i++;
                            endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
        <div class="large__block">
            <div class="c__story__block column__direction">
                <div class="c__story__block__body spacing__20__sp">
                    <h2 class="heading__medium f__uppercase"><?php echo get_field('video_features1'); ?></h2>
                    <p class="spacing__20"><?php echo get_field('video_features1_description'); ?></p>
                </div>
                <figure class="c__story__block__img">
                    <div class="m__video">
                        <video autoplay="" muted="" loop="" id="video">
                            <source src="<?php echo $video_features1_file['url']; ?>" type="video/mp4" poster="<?php echo $video_features1_image['url']; ?>">
                        </video>
                    </div>
                </figure>
            </div>
        </div>
        <div class="large__block">
            <div class="c__story__block img__left">
                <div class="c__story__block__body spacing__20__sp">
                    <h2 class="heading__medium f__uppercase"><?php echo get_field('video_features2'); ?></h2>
                    <p class="spacing__20"><?php echo get_field('video_features2_description'); ?></p>
                </div>
                <figure class="c__story__block__img">
                    <div class="m__video">
                        <video autoplay="" muted="" loop="" id="video">
                            <source src="<?php echo $video_features2_file['url']; ?>" type="video/mp4" poster="<?php echo $video_features2_image['url']; ?>">
                        </video>
                    </div>
                </figure>
            </div>
        </div>
        <div class="large__block">
            <div class="c__story__block column__direction">
                <div class="c__story__block__body spacing__20__sp">
                    <h2 class="heading__medium f__uppercase"><?php echo get_field('video_features3'); ?></h2>
                    <p class="spacing__20"><?php echo get_field('video_features3_description'); ?> </p>
                </div>
                <figure class="c__story__block__img">
                    <div class="m__video">
                        <video autoplay="" muted="" loop="" id="video">
                            <source src="<?php echo $video_features3_file['url']; ?>" type="video/mp4" poster="<?php echo $video_features3_image['url']; ?>">
                        </video>
                    </div>
                </figure>
            </div>
        </div>
        <div class="large__block">
            <div class="m__iframe">
                <iframe width="1871" height="1052" src="<?php echo get_field('youtube_iframe_url'); ?>" title="Features - Sigma BF" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; figure-in-figure; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
        <div class="large__block">
            <div class="text__center">
                <h2 class="f__h2 f__uppercase"><?php echo get_field('title5'); ?></h2>
                <div class="l__line__5__pc text__center spacing__24">
                    <?php echo get_field('content5'); ?>

                </div>
            </div>
        </div>
        <div class="large__block">

            <figure>
                <img src="<?php echo $image6['url']; ?>" alt="">
            </figure>

            <div class="l__grid">
                <div class="m__content__card">
                    <div class="l__line__5__pc spacing__24">
                        <p class="f__uppercase"><?php echo get_field('title6'); ?></p>
                        <p class="f__lowercase spacing__16 spacing__right__60__pc spacing__right__0__sp"><?php echo get_field('description'); ?></p>
                        <a class="m__txt__link display__inline spacing__24" href="<?php echo get_field('ola_link'); ?>"><?php echo get_field('read_more_btn'); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="large__block">
            <?php if (have_rows('content_cards')): ?>
                <div class="l__panel__grid panel__2__pc">
                    <?php while (have_rows('content_cards')): the_row();
                        $image = get_sub_field('image');
                        $name = get_sub_field('name');
                        $description = get_sub_field('description');
                        $link_url = get_sub_field('link_url');
                    ?>
                        <div class="content__card">
                            <?php if ($image): ?>
                                <figure class="spacing__bottom__16">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                </figure>
                            <?php endif; ?>

                            <?php if ($name): ?>
                                <p class="f__uppercase spacing__16"><?php echo esc_html($name); ?></p>
                            <?php endif; ?>

                            <?php if ($description): ?>
                                <p class="spacing__20 spacing__right__120__pc spacing__right__0__sp">
                                    <?php echo esc_html($description); ?>
                                </p>
                            <?php endif; ?>

                            <?php if ($link_url): ?>
                                <a href="<?php echo esc_url($link_url); ?>" class="m__txt__link display__inline spacing__24">Read more</a>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        </div>


        <?php
        $choose_product = get_field('choose_product');
        if ($choose_product) :
            $post = $choose_product;
            setup_postdata($post);
            $product = wc_get_product($post->ID);
            // Get Featured Image
            $featured_image_url = get_the_post_thumbnail_url($post->ID, 'full');
            //echo $product;
        ?>



            <div class="large__block">
                <div id="buy">
                    <div class="l__panel__grid panel__2__pc">
                        <div class="product__overview__block__img">
                            <div class="awesome__slider">
                                <figure>
                                    <img src="<?php echo esc_url($featured_image_url); ?>" alt="">
                                </figure>
                                <?php
                                if (class_exists('WooCommerce')) {
                                    $gallery_image_ids = get_post_meta($post->ID, '_product_image_gallery', true);

                                    if ($gallery_image_ids) {
                                        $gallery_image_ids = explode(',', $gallery_image_ids);
                                        foreach ($gallery_image_ids as $image_id) {
                                            $image_url = wp_get_attachment_url($image_id);
                                ?>
                                            <figure>
                                                <img src="<?php echo esc_url($image_url); ?>" alt="">
                                            </figure>
                                <?php }
                                    }
                                } ?>

                            </div>
                            <div class="awesome__thumbnails l__panel__grid panel__6__pc">
                                <!-- <div class="product__verview__thumbnail active" data-rel="0">
                                <img src="<?php echo esc_url($featured_image_url); ?>" alt="">
                            </div> -->
                                <?php
                                if (class_exists('WooCommerce')) {
                                    $gallery_image_ids = get_post_meta($post->ID, '_product_image_gallery', true);

                                    if ($gallery_image_ids) {
                                        $gallery_image_ids = explode(',', $gallery_image_ids);

                                        $i = 1;
                                        foreach ($gallery_image_ids as $image_id) {
                                            $image_url = wp_get_attachment_url($image_id);
                                ?>
                                            <div class="product__verview__thumbnail active" data-rel="<?php echo $i; ?>">
                                                <img src="<?php echo esc_url($image_url); ?>" alt="">
                                            </div>
                                <?php $i++;
                                        }
                                    }
                                } ?>
                            </div>
                        </div>
                        <div class="product__overview__block__body">
                            <p class="heading__medium f__uppercase f__ul">New</p>
                            <div class="l__panel__grid content__between">
                                <h2 class="heading__medium f__uppercase font"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <div class="price__product auto__width">from <?php echo $product->get_price_html(); ?></div>
                            </div>
                            <div class="f__ul">
                                <p class="f__ul">Choose a mount to see availability</p>

                                <?php
                                if ($product && $product->is_type('variable')) {
                                    $available_variations = $product->get_available_variations();
                                    foreach ($available_variations as $variation) {
                                        $variation_id = $variation['variation_id'];
                                        $attributes = [];

                                        foreach ($variation['attributes'] as $attr => $value) {
                                            // Strip 'attribute_' and use only the slug
                                            $attr_name = str_replace('attribute_', '', $attr);
                                            $attributes[$attr_name] = $value;
                                        }

                                        // Sort to ensure consistent key ordering
                                        ksort($attributes);

                                        // Create unique key: e.g., "color=blue|size=large"
                                        $key = implode('|', array_map(
                                            fn($k, $v) => $k . '=' . $v,
                                            array_keys($attributes),
                                            array_values($attributes)
                                        ));

                                        $variation_map[$key] = $variation_id;
                                    }

                                    $attributes = $product->get_variation_attributes();

                                    $default_attributes = $product->get_default_attributes();

                                    if (!empty($available_variations)) : ?>
                                        <form class="variations_form cart"
                                            method="post"
                                            enctype="multipart/form-data"
                                            action="<?php echo esc_url(wc_get_cart_url()); ?>"
                                            data-product_id="<?php echo esc_attr($product->get_id()); ?>"
                                            data-product_variations='<?php echo wp_json_encode($available_variations); ?>'>

                                            <?php foreach ($attributes as $attribute_name => $options) : ?>
                                                <ul class="f__ul l__grid__mid panel__2__pc panel__2__sp">
                                                    <?php foreach ($options as $option) :
                                                        $sanitized_option = sanitize_title($option);
                                                        $input_id = esc_attr($attribute_name . '_' . $sanitized_option);

                                                        $is_default = isset($default_attributes[$attribute_name]) && $default_attributes[$attribute_name] === $option;
                                                        $variation_id = '';

                                                    ?>
                                                        <li class="product__option__value">
                                                            <input type="radio"
                                                                id="<?php echo $input_id; ?>"
                                                                name="attribute_<?php echo esc_attr(sanitize_title($attribute_name)); ?>"
                                                                value="<?php echo esc_attr($option); ?>"
                                                                data-id="<?php echo esc_attr($variation_id); ?>"
                                                                <?php checked($is_default); ?>
                                                                required>
                                                            <label for="<?php echo $input_id; ?>"><?php echo esc_html($option); ?></label>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endforeach; ?>

                                            <div class="single_variation_wrap">
                                                <div class="woocommerce-variation single_variation"></div>

                                                <div class="woocommerce-variation-add-to-cart variations_button">
                                                    <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>">
                                                    <input type="hidden" name="product_id" value="<?php echo esc_attr($product->get_id()); ?>">
                                                    <input type="hidden" name="variation_id" class="variation_id" value="">

                                                    <div class="product__quantity">
                                                        <button type="button" class="btn__quantity minus__btn">-</button>
                                                        <input class="number__quantity qty" type="number" name="quantity" value="1"
                                                            min="<?php echo esc_attr($product->get_min_purchase_quantity()); ?>"
                                                            max="<?php echo esc_attr($product->get_max_purchase_quantity()); ?>">
                                                        <button type="button" class="btn__quantity plus__btn">+</button>
                                                    </div>

                                                    <button class="m__btn single_add_to_cart_button" type="submit">
                                                        <?php echo esc_html($product->single_add_to_cart_text()); ?>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>


                                        <!-- WooCommerce built-in script dependency -->

                                <?php
                                    endif;
                                }
                                ?>

                                <?php echo apply_filters('the_content', get_the_content()); ?>

                                <div class="spacing__16">
                                    <p><a href="/sigma/dealer-network" class="m__txt__link f__uppercase">Find a Dealer</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php wp_reset_postdata(); ?>
            <?php endif; ?>

            </div>



    </div>
    <div class="large__block">
        <div id="specifications" class="large__block__color__bg space__top__0 container__fluid__wrap">
            <div class="c__product__spec__block__inr">
                <div class="l__panel__grid panel__2__pc">
                    <div class="product__pec__block__tab">
                        <p class="active f__ul f__uppercase show__single" target="1">Specifications</p>
                        <p class="f__ul f__uppercase show__single" target="2">Sample Images </p>
                    </div>
                    <div class="tab__content__details">
                        <?php
                        $choose_product = get_field('choose_product');
                        if ($choose_product) :
                            $post = $choose_product;
                            setup_postdata($post);
                        ?>
                            <div id="content1" class="targetcontent">
                                <ul class="c__speclist c__specList">
                                    <?php if (have_rows('specifications')) : ?>
                                        <?php while (have_rows('specifications')) : the_row(); ?>
                                            <?php $spec_label = get_sub_field('label'); ?>
                                            <li>
                                                <?php if (have_rows('label_type')) : ?>
                                                    <?php
                                                    $first = true;
                                                    while (have_rows('label_type')) : the_row();
                                                    ?>
                                                        <div class="l__grid">
                                                            <div class="l__line__3__pc l__line__1__sp">
                                                                <p class="f__ul">
                                                                    <?php
                                                                    if ($first) {
                                                                        echo esc_html($spec_label);
                                                                        $first = false;
                                                                    }
                                                                    ?>
                                                                </p>
                                                            </div>
                                                            <div class="l__line__3__pc l__line__1__sp">
                                                                <p class="f__ul"><?php echo esc_html(get_sub_field('type_name')); ?></p>
                                                            </div>
                                                            <div class="l__line__6__pc l__line__2__sp">
                                                                <p class="f__ul"><?php echo esc_html(get_sub_field('type_value')); ?></p>
                                                            </div>
                                                        </div>
                                                        <hr class="l__hr l__line__9__pc l__line__3__sp">
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </li>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                        <div id="content2" class="c__speclist targetcontent">
                            <div class="l__panel__grid panel__2__pc">

                                <?php if (have_rows('sample_images')) : ?>
                                    <?php while (have_rows('sample_images')) :
                                        the_row(); ?>
                                        <div class="bf__sampleimages">
                                            <figure>
                                                <?php
                                                $sample_image = get_sub_field('sample_image');
                                                if ($sample_image) : ?>
                                                    <source srcset="<?php echo esc_url($sample_image['url']); ?>" media="(max-width: 768px)">
                                                    <img src="<?php echo esc_url($sample_image['url']); ?>" alt="">
                                                <?php endif; ?>
                                            </figure>
                                            <ul class="c__spec__list internal__spacing__04 spacing__16">
                                                <li class="hr__full">
                                                    <div class="l__grid panel__2">
                                                        <p class="f__ul">Camera</p>
                                                        <div>
                                                            <p class="f__ul"><?php echo get_sub_field('camera'); ?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="hr__full">
                                                    <div class="l__grid panel__2">
                                                        <p class="f__ul">Shutter Speed</p>
                                                        <div>
                                                            <p class="f__ul"><?php echo get_sub_field('shutter_speed'); ?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="hr__full">
                                                    <div class="l__grid panel__2">
                                                        <p class="f__ul">Lens F Number</p>
                                                        <div>
                                                            <p class="f__ul"><?php echo get_sub_field('lens_f_number'); ?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="hr__full">
                                                    <div class="l__grid panel__2">
                                                        <p class="f__ul">ISO</p>
                                                        <div>
                                                            <p class="f__ul"><?php echo get_sub_field('iso'); ?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="hr__full">
                                                    <div class="l__grid panel__2">
                                                        <p class="f__ul">Focal Length</p>
                                                        <div>
                                                            <p class="f__ul"><?php echo get_sub_field('focal_length'); ?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="hr__full">
                                                    <div class="l__grid panel__2">
                                                        <p class="f__ul">Photographer</p>
                                                        <div>
                                                            <p class="f__ul"><?php echo get_sub_field('photographer'); ?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="spacing__16">
                                                <a href="<?php echo esc_url($sample_image['url']); ?>" target="_blank" class="m__btn m__btn__single">Download</a>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container__fluid__wrap">

        <?php if (have_rows('accessories')) : ?>
            <?php while (have_rows('accessories')) : the_row(); ?>
                <div class="large__block">
                    <div class="f__ul">
                        <h2 class="heading__medium f__uppercase font text__center">
                            <?php echo get_sub_field('heading'); ?>
                        </h2>
                    </div>
                    <div class="product__cards spacing__80__pc spacing__40__sp">
                        <div class="slick-wrapper slick__wrapper">
                            <div id="products__slider" class="products__grid">

                                <?php
                                $select_products = get_sub_field('select_products'); // ACF post object field (multiple: true)

                                if ($select_products) :
                                    foreach ($select_products as $post) :
                                        setup_postdata($post);
                                        $image_url = get_the_post_thumbnail_url($post->ID, 'medium');
                                ?>
                                        <div class="slide-item slide__item">
                                            <div class="product__card hr">
                                                <a href="<?php the_permalink(); ?>">
                                                    <div class="image__box">
                                                        <?php if ($image_url) : ?>
                                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="content__box">
                                                        <p><?php the_title(); ?></p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                <?php
                                    endforeach;
                                    wp_reset_postdata();
                                endif;
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>

        <?php if (have_rows('solid_accesories')) : ?>
            <?php while (have_rows('solid_accesories')) : the_row(); ?>
                <div class="large__block">
                    <div class="f__ul">
                        <h2 class="heading__medium f__uppercase font text__center">
                            <?php echo esc_html(get_sub_field('heading')); ?>
                        </h2>
                    </div>
                    <div class="product__cards spacing__80__pc spacing__40__sp">
                        <div class="slick-wrapper slick__wrapper">
                            <div id="products__slider__one" class="products__grid">

                                <?php
                                $select_products = get_sub_field('select_products'); // Post Object field (multiple)

                                if ($select_products) :
                                    foreach ($select_products as $post) :
                                        setup_postdata($post);
                                        $image_url = get_the_post_thumbnail_url($post->ID, 'full');
                                ?>
                                        <div class="slide-item slide__item">
                                            <div class="product__card hr">
                                                <a href="<?php the_permalink(); ?>">
                                                    <div class="image__box">
                                                        <?php if ($image_url) : ?>
                                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="content__box">
                                                        <p><?php the_title(); ?></p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                <?php
                                    endforeach;
                                    wp_reset_postdata();
                                endif;
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>


    </div>


    <script>
        jQuery(document).ready(function($) {
            var $form = $('.variations_form');

            // Wait for WooCommerce to initialize first
            setTimeout(function() {
                initCustomVariationHandler();
            }, 100);

            function initCustomVariationHandler() {
                // Initialize WooCommerce variation form if not already done
                if ($form.length && typeof $form.wc_variation_form === 'function') {
                    try {
                        $form.wc_variation_form();
                    } catch (e) {
                        console.log('WC variation form already initialized or error:', e);
                    }
                }

                // Custom handler for radio button variation selection
                $form.off('change.custom_variation').on('change.custom_variation', 'input[type=radio]', function() {
                    console.log("Radio button changed: " + $(this).val());

                    try {
                        // Get all variations data from the form
                        var variations = $form.data('product_variations');
                        console.log("Available variations:", variations);

                        if (!variations || !Array.isArray(variations)) {
                            console.error('No variations data found');
                            return;
                        }

                        // Find all selected attributes
                        var selectedAttributes = {};
                        $form.find('input[type=radio]:checked').each(function() {
                            var name = $(this).attr('name');
                            var value = $(this).val();
                            selectedAttributes[name] = value;
                        });

                        console.log("Selected attributes:", selectedAttributes);

                        // Find matching variation
                        var matchFound = false;

                        for (var i = 0; i < variations.length; i++) {
                            var variation = variations[i];
                            var isMatch = true;

                            // Check if all selected attributes match this variation
                            for (var attrName in selectedAttributes) {
                                var attrValue = selectedAttributes[attrName];
                                var variationAttrValue = variation.attributes[attrName];

                                // If variation has a specific value for this attribute and it doesn't match
                                if (variationAttrValue !== "" && variationAttrValue !== attrValue) {
                                    isMatch = false;
                                    break;
                                }
                            }

                            if (isMatch) {
                                matchFound = true;
                                console.log("Found matching variation:", variation);

                                // Update the hidden field with the variation ID
                                $form.find('input[name="variation_id"]').val(variation.variation_id);

                                // Trigger WooCommerce's variation found event
                                $form.trigger('found_variation', [variation]);

                                // Update price display
                                if (variation.price_html) {
                                    $('.single_variation').html(variation.price_html).show();
                                }

                                // Enable add to cart button
                                $('.single_add_to_cart_button')
                                    .removeClass('disabled wc-variation-selection-needed')
                                    .addClass('variation-selected');

                                break;
                            }
                        }

                        if (!matchFound) {
                            console.log("No matching variation found");
                            $form.find('input[name="variation_id"]').val('');
                            $('.single_variation').hide();
                            $('.single_add_to_cart_button')
                                .addClass('disabled wc-variation-selection-needed')
                                .removeClass('variation-selected');

                            // Trigger WooCommerce's reset variation event
                            $form.trigger('reset_data');
                        }

                    } catch (error) {
                        console.error('Error in variation handler:', error);
                    }
                });

                // Form submission handler
                $form.off('submit.custom_variation').on('submit.custom_variation', function(e) {
                    var variationId = $form.find('input[name="variation_id"]').val();

                    if (!variationId || variationId === '') {
                        e.preventDefault();
                        e.stopPropagation();
                        alert("Please select product options before adding to cart");
                        return false;
                    }

                    return true;
                });

                // Quantity buttons functionality
                $(document).off('click.custom_quantity').on('click.custom_quantity', '.plus__btn', function() {
                    var $input = $(this).siblings('.qty');
                    var currentVal = parseInt($input.val()) || 1;
                    var max = parseInt($input.attr('max')) || 999999;

                    if (currentVal < max) {
                        $input.val(currentVal + 1).trigger('change');
                    }
                });

                $(document).off('click.custom_quantity').on('click.custom_quantity', '.minus__btn', function() {
                    var $input = $(this).siblings('.qty');
                    var currentVal = parseInt($input.val()) || 1;
                    var min = parseInt($input.attr('min')) || 1;

                    if (currentVal > min) {
                        $input.val(currentVal - 1).trigger('change');
                    }
                });
            }

            // Handle WooCommerce events
            $form.on('woocommerce_variation_has_changed', function() {
                console.log('WooCommerce variation changed');
            });

            $form.on('found_variation', function(event, variation) {
                console.log('WooCommerce found variation:', variation);
            });

            $form.on('reset_data', function() {
                console.log('WooCommerce reset variation data');
            });
        });
    </script>


    <?php get_footer(); ?>