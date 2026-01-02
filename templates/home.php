<?php

/**

 * Template Name: Home

 */

get_header();
$video = get_field('banner_video');
$aizu_image = get_field('aizu_image');

?>

<div class="main__banner">
    <div class="image__box">
        <video autoplay muted loop id="video">
            <source src="<?php echo esc_url($video['url']); ?>" type="video/mp4" poster="<?php echo get_template_directory_uri(); ?>/new-assets/images/bf_hero_top.jpg">

        </video>
    </div>
    <div class="bannre__content">
        <div class="container__fluid__wrap">
            <div class="bannre__content__inner__wrapp">
                <h1 class="heading__medium f__uppercase content__wid180"><?php echo wp_kses_post(get_field('banner_text')); ?></h1>
                <p class="spacing__32">
                    <?php echo wp_kses_post(get_field('lens_spec_html')); ?>
                </p>
                <a href="<?php echo get_field('link_url');?>" class="spacing__40 f__uppercase"><?php echo wp_kses_post(get_field('lan_btn')); ?></a>
            </div>
        </div>
    </div>
</div>
<div class="body__container">
    <div class="large__block container__fluid__wrap">
        <div class="heading__wrap heading__wrap__medium">
            <h2 class="heading__medium f__uppercase font text__center"><?php echo get_field('browse_txt');?></h2>
        </div>
        <?php
        $desired_order = ['cameras', 'stills', 'cine-lenses', 'accessories']; // Use category slugs
        $terms = get_terms([
            'taxonomy' => 'product_cat',
            'hide_empty' => false,
        ]);

        // Filter visible categories
        $visible_terms = array_filter($terms, function ($term) {
            return get_term_meta($term->term_id, 'cat_visibility', true) === 'yes';
        });
        usort($visible_terms, function($a, $b) use ($desired_order) {
            $pos_a = array_search($a->slug, $desired_order);
            $pos_b = array_search($b->slug, $desired_order);
            return $pos_a - $pos_b;
        });

        ?>
        <div class="l__panel__grid panel__4__pc spacing__80__pc spacing__64__sp">
            <?php foreach ($visible_terms as $term):
                $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                $image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : get_template_directory_uri() . '/new-assets/images/placeholder.jpg';
              
            ?>
                <div class="content__card">
                    <figure class="spacing__bottom__16">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($term->name); ?>">
                    </figure>
                    <p class="f__uppercase spacing__16"><?php echo esc_html($term->name); ?></p>
                    <p class="spacing__20 spacing__right__60__pc spacing__right__0__sp"><?php echo esc_html($term->description); ?></p>
                    <a href="<?php echo esc_url(get_term_link($term)); ?>" class="m__txt__link display__inline spacing__24"><?php echo wp_kses_post(get_field('lan_btn')); ?></a>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
    <div class="large__block container__fluid__wrap">
        <h2 class="heading__medium f__uppercase font text__center"><?php echo wp_kses_post(get_field('image_gallery_title')); ?></h2>
        <div class="l__panel__grid panel__4__pc spacing__80__pc spacing__64__sp">
            <?php if (have_rows('img_gallary_repeater')): ?>
                <?php while (have_rows('img_gallary_repeater')): the_row();
                    $image = get_sub_field('imagefield');
                    $title = get_sub_field('imagetitle');
                    $link_url = get_sub_field('link_url');
                   
                ?>
                    <div class="content__card">
                        <a href="<?php echo $link_url;?>" target="_blank">
                            <figure class="spacing__bottom__16 pic__large">
                                <?php if ($image): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                <?php endif; ?>
                            </figure>
                            <?php if ($title): ?>
                                <p class="f__uppercase"><?php echo esc_html($title); ?></p>
                            <?php endif; ?>
                        </a>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

    </div>
    <div class="large__block container__fluid__wrap">
        <h2 class="heading__medium f__uppercase font text__center"><?php echo wp_kses_post(get_field('imgsection2title')); ?></h2>
        <div class="l__panel__grid panel__2__pc spacing__80__pc spacing__64__sp">
            <?php if (have_rows('imgsection2repetater')): ?>
                <?php while (have_rows('imgsection2repetater')): the_row();
                    $image = get_sub_field('image');
                    $heading = get_sub_field('heading');
                    $description = get_sub_field('description');
                    $lrn_btn = get_sub_field('lrn_btn');
                   
                    $link = get_sub_field('link');
                    
                ?>
                    <div class="content__card">
                        <figure class="spacing__bottom__16">
                            <?php if ($image): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                            <?php endif; ?>
                        </figure>

                        <?php if ($heading): ?>
                            <p class="f__uppercase spacing__16"><?php echo esc_html($heading); ?></p>
                        <?php endif; ?>

                        <?php if ($description): ?>
                            <p class="spacing__20 spacing__right__120__pc spacing__right__0__sp">
                                <?php echo esc_html($description); ?>
                            </p>
                        <?php endif; ?>

                       
                            <a href="<?php echo esc_url($link); ?>" class="m__txt__link display__inline spacing__24"><?php echo $lrn_btn;?></a>
                       
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

    </div>
    <div class="large__block">
        <div class="cover__block">
            <figure>
                <img src="<?php echo $aizu_image['url']; ?>" alt="">
            </figure>
            <div class="cover__block__headline">
                <h2 class="f__h1"><?php echo wp_kses_post(get_field('aizu_title')); ?></h2>
                <p><?php echo wp_kses_post(get_field('aizu_description')); ?></p>
                <div class="btn__wrapp"><a href="<?php echo get_field('aizu_link')?>"><?php echo wp_kses_post(get_field('readbtn')); ?></a></div>
            </div>
        </div>
    </div>
    <div class="large__block">
        <h2 class="heading__medium f__uppercase font text__center"><?php echo wp_kses_post(get_field('video_section_title')); ?></h2>
        <div class="product__cards spacing__80__pc spacing__40__sp">
            <div class="slick-wrapper slick__wrapper">
                <div id="featured__products__slider" class="featured__products__grid">
                    <?php if (have_rows('video_repeater_section')): ?>
                        <?php while (have_rows('video_repeater_section')): the_row();
                            $youtube_url = get_sub_field('youtube_video_');
                            $video_title = get_sub_field('video_title');
                        ?>
                            <div class="slide-item slide__item">
                                <div class="product__card__slide">
                                    <div class="m__iframe">
                                        <?php if ($youtube_url): ?>
                                            <iframe width="1873" height="1054" src="<?php echo esc_url($youtube_url); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                        <?php endif; ?>
                                    </div>
                                    <div class="content__box content__wid310__center spacing__20">
                                        <p class="f__uppercase text__center"><?php echo esc_html($video_title); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>


            </div>
        </div>
    </div>
    <div class="large__block container__fluid__wrap">
        <div class="c__story__block post__list">
            <div class="c__story__block__body spacing__20__sp">
                <h2 class="heading__medium f__uppercase"><?php echo wp_kses_post(get_field('latest_post_section')); ?></h2>
                <p class="spacing__20"><?php echo wp_kses_post(get_field('latest_post_section_description')); ?></p>
                <a href="<?php echo get_field('view_link');?>" class="m__txt__link display__inline spacing__24"><?php echo wp_kses_post(get_field('view_all')); ?> </a>
            </div>
            <div class="c__story__block__img">
                <div class="l__panel__grid panel__3__pc spacing__64__sp">
                    <?php if (have_rows('section4_repeater')): ?>
                        <?php while (have_rows('section4_repeater')): the_row();
                            $date = get_sub_field('date');
                            $image = get_sub_field('image');
                            $title = get_sub_field('title');
                            $description = get_sub_field('description');
                            $btn_text = get_sub_field('btn_text');
                            $link_url  = get_sub_field('link_url');
                        ?>
                            <div class="content__card">
                                <a href="<?php echo $link_url; ?>">
                                    <?php if ($date): ?>
                                        <div class="blog__meta"><?php echo esc_html($date); ?></div>
                                    <?php endif; ?>
                                    <?php if ($image): ?>
                                        <figure class="spacing__bottom__16 post__figure">
                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                        </figure>
                                    <?php endif; ?>
                                </a>
                                <a href="<?php echo $link_url; ?>">
                                    <p class="heading__medium f__uppercase"><?php echo esc_html($title); ?></p>
                                </a>
                                <p class="spacing__20 post__descraption spacing__right__32"><?php echo esc_html($description); ?></p>
                                <a href="<?php echo $link_url; ?>" class="m__txt__link display__inline spacing__24 aligned__equal"><?php echo esc_html($btn_text); ?></a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>