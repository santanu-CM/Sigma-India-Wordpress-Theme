<?php

/**
 * Template Name: About Page 
 */
get_header();
$symbol = get_field('symbol_image');
$video_file = get_field('video_image');
$poster_img = get_field('video_image2');
$image3 = get_field('image3');
$image4 = get_field('image4');
$image5 = get_field('image5');
$youtube_url = get_field('youtube_url');
// object-fit: cover;
?>
<div class="body__container__inner">
    <div class="large__block container__fluid__wrap">
        <div class="text__center">
            <h1 class="f__h1 f__uppercase"><?php echo get_field('title'); ?></h1>
            <p class="spacing__40 text__center"><?php echo get_field('sub_heading'); ?></h2>
        </div>
    </div>
    <div class="large__block container__fluid__wrap">
        <figure>
            <img src="<?php echo $symbol['url']; ?>" alt="">
        </figure>
    </div>
    <div class="large__block container__fluid__wrap">
        <div class="content__width560__pc">
            <?php echo get_the_content(); ?>
        </div>
    </div>
    <div class="large__block container__fluid__wrap">
        <div class="l__panel__grid panel__2__pc">
            <div class="image__box m__video">
                <?php
                if ($video_file && $poster_img) :
                ?>
                    <video autoplay muted loop id="video">
                        <source src="<?php echo esc_url($video_file['url']); ?>" type="video/mp4" poster="<?php echo esc_url($poster_img['url']); ?>">
                    </video>
                <?php endif; ?>
            </div>
            <figure>
                <img src="<?php echo esc_url($image3['url']); ?>" alt="">
            </figure>
        </div>
    </div>
    <div class="large__block">
        <div class="content__width560__pc container__fluid__wrap">
            <!-- <h2 class="heading__medium f__uppercase font text__center">Our priorities</h2> -->
            <p><?php echo get_field('text_field'); ?></p>
        </div>

        <div class="large__block container__fluid__wrap">
           
                <figure>
                    <img src="<?php echo esc_url($image4['url']); ?>" alt="">
                </figure>
           
        </div>

        <div class="large__block container__fluid__wrap">
            <div class="content__width560__pc">
                <!-- <h2 class="heading__medium f__uppercase font text__center">Our priorities</h2> -->
                <p><?php echo get_field('text_field_2'); ?></p>
            </div>
        </div>

        <div class="large__block container__fluid__wrap">
            <div class="content__width700__pc">
                <figure>
                    <img src="<?php echo esc_url($image5['url']); ?>" alt="">
                </figure>
            </div>
        </div>
        <div class="large__block container__fluid__wrap">
            <div class="content__width560__pc">
                <!-- <h2 class="heading__medium f__uppercase font text__center"><?php echo get_field('heading2'); ?></h2> -->
                <p class="spacing__40"><?php echo get_field('paragraph1'); ?></p>
                <p class="spacing__40"><?php echo get_field('paragraph2'); ?></p>
            </div>
        </div>
        <div class="large__block container__fluid__wrap">
            <div class="spacing__40">
                <div class="m__iframe">
                    <iframe width="560" height="315" src="<?php echo $youtube_url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>


        <div class="large__block container__fluid__wrap">
            <div class="l__panel__grid panel__2__pc">
                <h2 class="f__ul f__uppercase text__center__sp"><?php echo get_field('btn_txt'); ?></h2>
                <?php if (have_rows('explore_repeater')) : ?>
                    <div class="l__panel__grid panel__2__pc">
                        <?php while (have_rows('explore_repeater')) : the_row();
                            $title = get_sub_field('title');
                            $image = get_sub_field('image'); // image array
                            $url = get_sub_field('url');
                        ?>
                            <div class="m__content__box">
                                <a class="text__color__base" href="<?php echo esc_url($url); ?>" target="_blank">
                                    <?php if ($image) : ?>
                                        <figure>
                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                        </figure>
                                    <?php endif; ?>
                                    <?php if ($title) : ?>
                                        <p class="f__uppercase spacing__16"><?php echo esc_html($title); ?></p>
                                    <?php endif; ?>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <?php get_footer(); ?>