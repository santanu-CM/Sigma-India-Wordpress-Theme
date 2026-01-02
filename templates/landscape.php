<?php

/**
 * Template Name: Landscape Page
 */

get_header();
$banner_image = get_field('banner_image');

?>
<style>
    .single__img {
        width: 100%;
        max-width: 100%;
    }
</style>
<div class="body__container__inner">

    <div class="cover__block">
        <figure>
            <img src="<?php echo $banner_image['url']; ?>" alt="">
        </figure>
        <div class="cover__block__headline cover__block__headline__medium">
            <p class="m__txt__link font__base__color"><?php echo get_field('heading1'); ?></p>
            <h1 class="f__h2 font__base__color spacing__12"><?php echo get_field('heading2'); ?></h1>
            <p><?php echo get_field('paragraph'); ?></p>
        </div>
    </div>
    <?php if (have_rows('lens_sections')): ?>
        <?php while (have_rows('lens_sections')): the_row(); ?>
            <div class="large__block container__fluid__wrap">

                <!-- Section Title + Description -->
                <div class="content__width560__pc">
                    <p class="heading__medium f__uppercase font text__center spacing__bottom__16"><?php the_sub_field('section_title'); ?></p>
                    <p class="text__center"><?php the_sub_field('section_description'); ?></p>
                </div>

                <?php if (have_rows('section_images')): ?>
                    <?php while (have_rows('section_images')): the_row(); ?>
                        <?php
                        // Get current lens_image rows to count images
                        $lens_images = get_sub_field('lens_image');
                        $image_rows_with_image = [];

                        if ($lens_images) {
                            foreach ($lens_images as $index => $row) {
                                $img = $row['image'];
                                if (!empty($img) && !empty($img['url'])) {
                                    $image_rows_with_image[] = $index;
                                }
                            }
                        }
                        $total_images = count($image_rows_with_image);

                        ?>

                        <!-- Image Grid -->
                        <?php if ($lens_images): ?>
                            <div class="large__block">
                                <div class="l__panel__grid panel__2__pc">
                                    <?php foreach ($lens_images as $i => $row): ?>
                                        <?php
                                        $img = $row['image'];
                                        $title = $row['image_title'];
                                        $class = 'm__content__box';

                                        if (!empty($img) && !empty($img['url'])) {
                                            $image_name = basename($img['url']);

                                            // Apply the special class ONLY IF there's exactly one image and it's this one
                                            if ($total_images === 1 && in_array($i, $image_rows_with_image)) {
                                                $class .= ' content__width700__pc single__img';
                                            }

                                            // Optional: match by filename
                                            // if ($image_name === '09.jpg') { $class .= ' your-class'; }
                                        }
                                        ?>
                                        <div class="<?php echo esc_attr($class); ?>">
                                            <figure class="m__iframe">
                                                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt'] ?: $title); ?>">
                                            </figure>
                                            <p class="f__uppercase spacing__16"><?php echo esc_html($title); ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Main Title for Cards -->
                        <div class="large__block">
                            
                                <h2 class="heading__medium f__uppercase font text__center spacing__20"><?php the_sub_field('main_title'); ?></h2>
                         

                            <!-- Cards Grid -->
                            <?php if (have_rows('lens_cards')): ?>
                                <div class="l__panel__grid panel__3__pc medium__block">
                                    <?php while (have_rows('lens_cards')): the_row();
                                        $lens_img = get_sub_field('lens_image');
                                        $lens_title = get_sub_field('lens_title');
                                        $lens_desc = get_sub_field('lens_description');
                                        $lens_link = get_sub_field('lens_link');
                                        $btn_text = get_sub_field('btn_text') ?: 'View Details';
                                    ?>
                                        <div class="content__card">
                                            <figure class="spacing__bottom__16">
                                                <img src="<?php echo esc_url($lens_img['url']); ?>" alt="<?php echo esc_attr($lens_img['alt'] ?: $lens_title); ?>">
                                            </figure>
                                            <p class="f__uppercase spacing__16"><?php echo esc_html($lens_title); ?></p>
                                            <p class="spacing__20 spacing__right__60__pc spacing__right__0__sp"><?php echo esc_html($lens_desc); ?></p>
                                            <a href="<?php echo esc_url($lens_link); ?>" class="m__txt__link display__inline spacing__24"><?php echo esc_html($btn_text); ?></a>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        <?php endwhile; ?>
    <?php endif; ?>


</div>


<?php get_footer(); ?>