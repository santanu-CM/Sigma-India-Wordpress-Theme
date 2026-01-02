<?php

/**
 * Template Name: Our Community Page
 */
get_header();
?>
<div class="body__container__inner">
    <div class="heading__wrap heading__wrap__medium large__block container__fluid__wrap">
        <div class="content__width560__pc">
            <h1 class="f__h2 f__uppercase font text__center"><?php echo get_field('title'); ?></h1>
        </div>
    </div>

    <div class="large__block container__fluid__wrap">
        <!-- Updated Filter Tabs as Buttons -->
        <div class="filter__tabs tab__txt" id="filters">
            <button type="button" class="filter active f__uppercase m__txt__link" data-filter="*">All</button>
            <?php
            $terms = get_terms(array(
                'taxonomy' => 'category_community',
                'hide_empty' => false,
            ));

            if (!is_wp_error($terms)) {
                foreach ($terms as $term) {
                    echo '<button type="button" class="filter f__uppercase m__txt__link" data-filter=".' . esc_attr($term->slug) . '">';
                    echo esc_html($term->name);
                    echo '</button>';
                }
            }
            ?>
        </div>

        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $args = array(
            'post_type' => 'our_community',
            'posts_per_page' => 12,
            'paged' => $paged,
            'post_status' => 'publish',
        );

        $community_query = new WP_Query($args);
        ?>

        <div id="gallery" class="l__panel__grid medium__block panel__3__pc">
            <?php
            if ($community_query->have_posts()):
                while ($community_query->have_posts()): $community_query->the_post();

                    $terms = get_the_terms(get_the_ID(), 'category_community');
                    $term_classes = '';
                    $term_name = '';

                    if (!empty($terms) && !is_wp_error($terms)) {
                        $term_names = [];
                        foreach ($terms as $term) {
                            $term_classes .= ' ' . esc_attr($term->slug);
                            $term_names[] = esc_html($term->name);
                        }
                        $term_name = implode(', ', $term_names);
                    }
            ?>
                    <div class="content__card gallery__item mix<?php echo $term_classes; ?>" style="display: block;">
                        <a href="<?php the_permalink(); ?>">
                            <figure class="post__figure">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('full');
                                } else {
                                    echo '<img src="https://via.placeholder.com/300x200?text=No+Image" alt="No image">';
                                } ?>
                            </figure>
                            <p class="f__uppercase f__ul spacing__16"><?php echo $term_name; ?></p>
                            <p class="f__uppercase spacing__16"><?php the_title(); ?></p>
                        </a>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p>No community posts found.</p>';
            endif;
            ?>
        </div>

        <?php
        $total_pages = $community_query->max_num_pages;
        if ($total_pages > 1): ?>
            <div class="c__pagenation">
                <div class="c__pagenation__side">
                    <?php if ($paged > 1): ?>
                        <a class="m__btnsquare arw__backward" href="<?php echo get_pagenum_link($paged - 1); ?>"></a>
                    <?php else: ?>
                        <a class="m__btnsquare arw__backward disabled" href="#"></a>
                    <?php endif; ?>
                </div>

                <div class="c__pagenation__center">
                    <ul class="c__pagenation__list numWrap">
                        <?php
                        $pagination_links = paginate_links(array(
                            'total' => $total_pages,
                            'current' => $paged,
                            'type' => 'array',
                            'prev_next' => false,
                        ));

                        if (!empty($pagination_links)) {
                            foreach ($pagination_links as $link) {
                                echo '<li class="num">' . str_replace('page-numbers', 'm__btnsquare', $link) . '</li>';
                            }
                        }                        
                        
                        ?>
                    </ul>
                </div>

                <div class="c__pagenation__side">
                    <?php if ($paged < $total_pages): ?>
                        <a class="m__btnsquare arw__forward" href="<?php echo get_pagenum_link($paged + 1); ?>"></a>
                    <?php else: ?>
                        <a class="m__btnsquare arw__forward disabled" href="#"></a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="large__block container__fluid__wrap">
        <div class="l__grid panel__2__pc">
            <h2 class="f__ul f__uppercase text__center__sp"><?php echo get_field('btn_txt'); ?></h2>
            <?php if (have_rows('explore_repeater')) : ?>
                <div class="l__grid panel__2__pc">
                    <?php while (have_rows('explore_repeater')) : the_row();
                        $title = get_sub_field('title');
                        $sub_title = get_sub_field('sub_title');
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
                                <?php if ($sub_title) : ?>
                                    <p class="f__uppercase spacing__16"><?php echo esc_html($sub_title); ?></p>
                                <?php endif; ?>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- JavaScript for Filter -->
<script>
jQuery(function($) {
    const $filters = $('.filter');
    const $items = $('#gallery .gallery__item');

    $filters.on('click', function() {
        const filter = $(this).data('filter');

        $filters.removeClass('active');
        $(this).addClass('active');

        if (filter === '*') {
            $items.show();
        } else {
            $items.hide();
            $items.filter(filter).show();
        }
    });
});
</script>
<?php get_footer(); ?>