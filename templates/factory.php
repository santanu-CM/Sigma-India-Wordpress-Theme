<?php

/**
 * Template Name: Factory page
 */
get_header();
$banner_image = get_field('image1');
$video_file = get_field('video_file');
$video_img = get_field('video_image');
$image_3 =  get_field('image_3');
$video_file_2 = get_field('video_file_2');
$video_image_2 = get_field('video_image_2');
$video_file_3 = get_field('video_file_3');
$video_image_3 = get_field('video_image_3');
$image_2 =  get_field('image_2');

?>
<div class="body__container__inner">
    <div class="large__block container__fluid__wrap">
        <div class="text__center">
            <h1 class="f__h1 f__uppercase"><?php echo get_field('title'); ?></h1>
            <p class="spacing__40 text__center f__uppercase"><?php echo get_field('sub_heading'); ?></h2>
        </div>
    </div>
    <div class="medium__block container__fluid__wrap">
        
            <figure>
                <img src="<?php echo esc_url($banner_image['url']); ?>" alt="">
            </figure>
            <!-- <div class="m__iframe">
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/3tJTkaW2isM?si=dibB6zdy3ddxERcT" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
               </div> -->
       
    </div>
    <div class="large__block container__fluid__wrap">
        <div class="content__width560__pc">
            <?php echo get_the_content(); ?>
        </div>
    </div>
    <div class="large__block container__fluid__wrap">
        <div class="l__panel__grid panel__2__pc">
            <figure>
                <img src="<?php echo esc_url($image_3['url']); ?>" alt="">
            </figure>
            <div class="image__box m__video">
                <video autoplay muted loop id="video">
                    <source src="<?php echo esc_url($video_file['url']); ?>" type="video/mp4" poster="<?php echo esc_url($video_img['url']); ?>">
                </video>
            </div>
        </div>
    </div>
    <div class="large__block container__fluid__wrap">
        <div class="content__width560__pc">
            <h2 class="heading__medium f__uppercase font text__center"><?php echo get_field('content_heading1'); ?></h2>
            <p class="spacing__40"><?php echo get_field('content_paragraph_1'); ?></p>
        </div>
    </div>
    <div class="large__block container__fluid__wrap">
        <div class="image__box m__video">
            <video autoplay muted loop id="video">
                <source src="<?php echo esc_url($video_file_2['url']); ?>" type="video/mp4" poster="<?php echo esc_url($video_image_2['url']); ?>">
            </video>
        </div>
    </div>
    <div class="large__block container__fluid__wrap">
        <div class="content__width560__pc">
            <h2 class="heading__medium f__uppercase font text__center"><?php echo get_field('content_heading_2'); ?></h2>
            <p class="spacing__40"><?php echo get_field('content_paragraph_2'); ?></p>
        </div>
    </div>
    <div class="large__block container__fluid__wrap">
        <div class="l__panel__grid panel__2__pc">
            <div class="image__box m__video">
                <video autoplay muted loop id="video">
                    <source src="<?php echo esc_url($video_file_3['url']); ?>" type="video/mp4" poster="<?php echo esc_url($video_image_3['url']); ?>">
                </video>
            </div>
            <figure>
                <img src="<?php echo esc_url($image_2['url']); ?>" alt="">
            </figure>
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