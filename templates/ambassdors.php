<?php

/**
 * Template Name: Ambassdors 
 */
get_header();
?>
<div class="body__container__inner container__fluid__wrap">
<div class="heading__wrap heading__wrap__medium large__block">
        <div class="content__width560__pc">
            <h1 class="f__h2 f__uppercase font text__center"><?php echo get_field('page_title'); ?></h1>
            <p class="text__center spacing__40"><?php echo get_field('description'); ?></p>
        </div>
    </div>
    <div class="large__block">
        <h2 class="heading__medium font text__center"><?php echo get_field('kols');?></h2>
        <div class="l__panel__grid panel__4__pc spacing__40">
            <?php
            $kols_query = new WP_Query(array(
                'post_type'      => 'ambassadors',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'order'         => 'ASC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'ambassadors_category',
                        'field'    => 'term_id',
                        'terms'    => 126,
                    ),
                ),
            ));

            if ($kols_query->have_posts()) :
                while ($kols_query->have_posts()) : $kols_query->the_post();
                    $content_group = get_field('ambassadors_post_content');
                    $short_description = $content_group['short_description'] ?? '';
                    $btn_text = $content_group['btn_text'] ?? 'Read more';
                    $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
            ?>
                    <div class="content__card">
                        <figure class="post__figure">
                            <img src="<?php echo esc_url($image); ?>" alt="<?php the_title_attribute(); ?>">
                        </figure>
                        <p class="f__uppercase spacing__16"><?php the_title(); ?></p>
                        <p class="spacing__20 spacing__right__60__pc spacing__right__0__sp"><?php echo esc_html($short_description); ?></p>
                        <a href="<?php the_permalink(); ?>" class="m__txt__link display__inline spacing__24"><?php echo esc_html($btn_text); ?></a>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
   
    <div class="large__block">
    
    <h2 class="heading__medium f__uppercase font text__center"><?php echo get_field('title');?></h2>

        <div class="l__panel__grid panel__4__pc spacing__40">
            <?php
            $args = array(
                'post_type'      => 'ambassadors',
                'posts_per_page' => -1, // or any number
                'post_status'    => 'publish',
                'order' => 'ASC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'ambassadors_category',
                        'field'    => 'term_id',
                        'terms'    => 126,
                        'operator' => 'NOT IN',
                    ),
                ),
            );
            $ambassadors_query = new WP_Query($args);

            if ($ambassadors_query->have_posts()) :
                while ($ambassadors_query->have_posts()) : $ambassadors_query->the_post();

                    // ACF group field
                    $content_group = get_field('ambassadors_post_content');
                    $short_description = $content_group['short_description'] ?? '';
                    $btn_text = $content_group['btn_text'] ?? 'Read more';
                    $image = get_the_post_thumbnail_url(get_the_ID(), 'full'); // or any size
            ?>
                    <div class="content__card">
                        <figure class="post__figure">
                            <img src="<?php echo esc_url($image); ?>" alt="<?php the_title_attribute(); ?>">
                        </figure>
                        <p class="f__uppercase spacing__16"><?php the_title(); ?></p>
                        <p class="spacing__20 spacing__right__60__pc spacing__right__0__sp"><?php echo esc_html($short_description); ?></p>
                        <a href="<?php the_permalink(); ?>" class="m__txt__link display__inline spacing__24"><?php echo esc_html($btn_text); ?></a>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No ambassadors found.</p>';
            endif;
            ?>
        </div>

    </div>
</div>
<?php get_footer(); ?>