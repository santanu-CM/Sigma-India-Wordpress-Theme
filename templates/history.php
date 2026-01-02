<?php

/**
 * Template Name: History Page
 */
get_header();

?>
<div class="body__container__inner">
    <div class="heading__wrap heading__wrap__medium large__block container__fluid__wrap">
        <div class="l__wid500__pc">
            <h1 class="f__h1 f__uppercase font text__center"><?php echo get_field('title'); ?></h1>
            <p class="text__center spacing__40"><?php echo get_field('description'); ?></p>
        </div>
    </div>

    <div class="large__block container__fluid__wrap spacing__160">
        <div class="l__panel__grid f__align__start panel__2__pc">
            <div class="c__spec__list c__sticky__nav">
                <?php
                $years = []; // ✅ Fix: Initialize $years array
                if (have_rows('year_history_repeater')): ?>
                    <ul class="l__grid navigation spacing__08">
                        <?php
                        while (have_rows('year_history_repeater')): the_row();
                            $year = get_sub_field('year');
                            if ($year) {
                                $decade = floor($year / 10) * 10;
                                $years[$decade] = true;
                            }
                        endwhile;
                        ksort($years);
                        foreach (array_keys($years) as $decade): ?>
                            <li>
                                <a href="#<?php echo esc_attr($decade); ?>" class="m__txt__link inverted__text__link"><?php echo esc_html($decade); ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <?php if (have_rows('company_history')): ?>
                <div class="l__panel__grid">
                    <ul class="c__spec__list l__grid gap__32">
                        <?php
                        while (have_rows('company_history')): the_row();
                            $year = get_sub_field('year_label');
                            if (have_rows('events')):
                                $first = true;
                                while (have_rows('events')): the_row();
                                    $title = get_sub_field('event_title');
                                    $subtitle = get_sub_field('event_subtitle');
                                    $description = get_sub_field('event_description');
                                    $image = get_sub_field('event_image');
                                    ?>
                                    <li <?php if ($first) {
                                        echo 'id="' . esc_attr($year) . '" class="page__section c__sticky__link"';
                                        $first = false;
                                    } ?>>
                                        <div class="m__history__card l__grid__pc">
                                            <?php if ($title): ?>
                                                <p class="m__history__card__ttl f__ul f__uppercase"><?php echo esc_html($title); ?></p>
                                            <?php endif; ?>
                                            <div class="m__history__card__body spacing__16__sp">
                                                <?php if ($subtitle): ?>
                                                    <p class="f__uppercase"><?php echo esc_html($subtitle); ?></p>
                                                <?php endif; ?>
                                                <?php if ($description): ?>
                                                    <p class="spacing__16"><?php echo html_entity_decode($description); ?></p>
                                                <?php endif; ?>
                                                <?php if ($image): ?>
                                                    <picture class="spacing__32">
                                                        <source srcset="<?php echo esc_url($image['url']); ?>" media="(max-width: 768px)">
                                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                                    </picture>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                endwhile;
                            endif;
                        endwhile;
                        ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="large__block container__fluid__wrap">
        <div class="l__grid panel__2__pc">
            <h2 class="f__ul f__uppercase text__center__sp"><?php echo get_field('btn_txt'); ?></h2>
            <?php if (have_rows('explore_repeater')) : ?>
                <div class="l__grid panel__2__pc">
                    <?php while (have_rows('explore_repeater')) : the_row();
                        $title = get_sub_field('title');
                        $image = get_sub_field('image');
                        $url = get_sub_field('url');
                       
                        ?>
                        <div class="m__content__box spacing__64__sp">
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