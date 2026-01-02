<?php

/**

 * The template for displaying all ambassador single posts

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post

 *

 * @package WP_Bootstrap_Starter

 */



get_header();

if (have_posts()) :
    while (have_posts()) : the_post();

        $ambassador_content = get_field('ambassadors_post_content');

        if ($ambassador_content) :
            $social_links = $ambassador_content['social_details'];
            $gallery_title = $ambassador_content['gal_title'];
            $ambsdr = $ambassador_content['ambassador'];
            $amb_txt = $ambassador_content['amb_text'];
            $abt = $ambassador_content['abt_text'];
            $gallery_desc = $ambassador_content['gal_desc'] ?? [];
            $gallery_images = $ambassador_content['image_details'];
            $about_text = $ambassador_content['about_text'];
            $review_title = $ambassador_content['review_title'];
            $label_title = $ambassador_content['label_title'];
            $social_link_txt = $ambassador_content['social_link'];
            $video = $ambassador_content['video'];

            $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');


?>
            <div class="body__container__inner">
                <div class="heading__wrap heading__wrap__medium large__block">
                    <p class="f__ul text__center"><a href="#"><?php echo  $ambsdr; ?></a></p>
                    <h1 class="f__h1 f__uppercase font text__center spacing__40"><?php the_title(); ?></h1>
                </div>

                <div class="large__block container__fluid__wrap">
                    <div class="c__story__block column__direction img__left">
                        <div class="c__story__block__small__body spacing__20__sp">
                            <h3 class="f__h3 f__uppercase"><?php echo  $amb_txt; ?></h3>
                            <h2 class="heading__medium f__uppercase spacing__32"><?php echo  $social_link_txt; ?></h2>
                            <div class="l__grid">
                                <?php if (!empty($social_links)) :
                                    foreach ($social_links as $link) : ?>
                                        <a href="<?php echo esc_url($link['url']); ?>" class="m__txt__link spacing__16" target="_blank">
                                            <?php echo esc_html($link['platform']); ?>
                                        </a>
                                <?php endforeach;
                                endif; ?>
                            </div>
                            <div class="spacing__20 spacing__right__60__pc spacing__right__0__pc spacing__right__0__sp">
                                <h2 class="heading__medium f__uppercase"><?php echo $abt; ?></h2>
                                <p class="spacing__16"><?php the_content(); ?></p>
                            </div>

                        </div>

                        <?php if (!empty($featured_image)) : ?>
                            <figure class="c__story__block__small__img img__left">
                                <img src="<?php echo esc_url($featured_image); ?>" alt="<?php the_title_attribute(); ?>">
                            </figure>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if (!empty($gallery_images)) : ?>
                    <div class="large__block">
                        <div class="f__uppercase text__center">
                            <h3 class="f__h3"><?php echo esc_html($gallery_title); ?></h3>
                            <h2 class="heading__medium spacing__20"><?php echo esc_html($gallery_desc); ?></h2>
                        </div>

                        <div class="product__cards spacing__80__pc spacing__40__sp">
                            <div class="slick-wrapper slick__wrapper">
                                <div id="featured__products__slider" class="featured__products__grid">
                                    <?php foreach ($gallery_images as $img) : ?>
                                        <div class="slide-item slide__item">
                                            <div class="product__card__slide">
                                                <figure class="post__figure">
                                                    <img src="<?php echo esc_url($img['image']); ?>" alt="">
                                                </figure>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="large__block">
                    <div class="container__fluid__wrap">
                        <div class="f__uppercase">
                            <h3 class="f__h3"><?php echo esc_html($review_title); ?></h3>
                            <h2 class="heading__medium spacing__20"><?php echo esc_html($label_title); ?></h2>
                        </div>
                    </div>
                    <div class="product__cards spacing__80__pc spacing__40__sp">
                        <?php
                        if (!empty($ambassador_content['video'])) : ?>
                            <div class="slick-wrapper slick__wrapper">
                                <div id="review__slider" class="featured__products__grid">
                                    <?php foreach ($ambassador_content['video'] as $video_item) :
                                        $video_url = $video_item['video_url'];
                                        $review_short_desc = $video_item['review_short_desc'];
                                    ?>
                                        <div class="slide-item slide__item">
                                            <div class="product__card__slide">
                                                <div class="m__iframe">
                                                    <iframe width="560" height="315" src="<?php echo esc_url($video_url); ?>" title="YouTube video player"
                                                        frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                        referrerpolicy="strict-origin-when-cross-origin"
                                                        allowfullscreen>
                                                    </iframe>
                                                </div>
                                                <div class="content__box content__wid310__center spacing__20">
                                                    <p class="f__uppercase text__center"><?php echo esc_html($review_short_desc); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>


<?php
        endif;

    endwhile;
endif;
?>
<?php get_footer(); ?>