<?php

/**
 * The template for displaying search results pages
 *
 * @package WP_Bootstrap_Starter
 */

get_header();

// Define post types for the search


?>
<?php $paged = get_query_var('paged') ? get_query_var('paged') : 1; ?>


<div class="body__container__inner">
    <div class="heading__wrap heading__wrap__medium large__block container__fluid__wrap">
        <div class="content__width560__pc">
            <h1 class="f__h2 f__uppercase font text__center">Search results</h1>
        </div>
    </div>

    <div class="large__block container__fluid__wrap">

        <!-- Search Form -->
        <div class="c__search__input">
            <div class="mf__search__box">
                <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="form-group form__group">
                        <div class="input-group input__group">
                            <input type="text" name="s" class="form-control form__control" placeholder="Search by keyword" value="<?php echo get_search_query(); ?>">
                            <button class="search__bar__btn" type="submit"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Popular Searches -->
        <div class="c__search__summary f__ul spacing__24 l__grid">
            <p class="c__search__ttl">Popular searches</p>
            <ul class="c__search__list l__grid">
                <?php
                $popular_keywords = ['Mirrorless', 'Camera Compatibility', 'Firmware Download', '18-50mm', 'DSLR', 'Canon RF Mount', 'SIGMA Optimization Pro'];
                foreach ($popular_keywords as $keyword) {
                    echo '<li><a href="' . esc_url(home_url('/?s=' . urlencode($keyword))) . '">' . esc_html($keyword) . '</a></li>';
                }
                ?>
            </ul>
        </div>

        <!-- Filter Tabs -->
        <div class="medium__block">
            <ul class="f__ul tab__txt content__start" id="filters">
                <li><span class="f__uppercase m__txt__link filter active" data-filter=".products, .inspiration, .support, .news">All</span></li>
                <li><span class="f__uppercase m__txt__link filter" data-filter=".products">Products</span></li>
                <li><span class="f__uppercase m__txt__link filter" data-filter=".inspiration">Inspiration</span></li>
                <li><span class="f__uppercase m__txt__link filter" data-filter=".support">Support</span></li>
                <li><span class="f__uppercase m__txt__link filter" data-filter=".news">News</span></li>
            </ul>
        </div>

        <!-- Search Results -->
        <div class="medium__block">
            <p class="f__ul"><span><?php echo $wp_query->found_posts; ?></span> results</p>
            <div id="gallery-2" class="l__panel__grid">
                <div class="spacing__32 large__mood__product">
                    <div class="c__search__result__entry">
                        <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <?php
                                $post_type = get_post_type();
                                $post_type = get_post_type();
                                $filter_class = '';

                                if ($post_type === 'product') {
                                    $filter_class = 'products';
                                } elseif (in_array($post_type, ['ambassador', 'our_community', 'shooting_with_sigma'])) {
                                    $filter_class = 'inspiration';
                                } elseif ($post_type === 'post') {
                                    $filter_class = 'news';
                                } elseif ($post_type === 'page') {
                                    $support_page = get_page_by_path('support');

                                    if ($support_page) {
                                        $current_id = get_the_ID();
                                        $ancestor_ids = get_post_ancestors($current_id);

                                        // Include current ID too for exact match
                                        $check_ids = array_merge([$current_id], $ancestor_ids);

                                        if (in_array($support_page->ID, $check_ids)) {
                                            $filter_class = 'support';
                                        }
                                    }
                                }

                                if (empty(get_the_title()) && empty(get_the_content())) {
                                    continue;
                                }
                                ?>
                                <div class="gallery__item <?php echo esc_attr($filter_class); ?>">
                                    <div class="c__search__result__entry__grid l__grid panel__2__pc">
                                        <p><?php the_title(); ?></p>
                                        <div class="spacing__20__sp">
                                            <p class="text__description"><?php echo wp_trim_words(get_the_excerpt(), 40); ?></p>
                                            <p class="spacing__20">
                                                <a href="<?php the_permalink(); ?>" class="m__txt__link">See more</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <p>No results found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <?php
        $pagination_links = paginate_links([
            'total'        => $wp_query->max_num_pages,
            'current'      => $paged,
            'type'         => 'array',
            'mid_size'     => 2,
            'prev_next'    => false // disables prev/next completely
        ]);

        if ($pagination_links) : ?>
            <div class="c__pagenation">
                <div class="c__pagenation__side">
                    <?php if ($paged > 1) : ?>
                        <a class="m__btnsquare arw__backward" href="<?php echo get_pagenum_link($paged - 1); ?>"></a>
                    <?php else : ?>
                        <a class="m__btnsquare arw__backward disabled" href="#"></a>
                    <?php endif; ?>
                </div>

                <div class="c__pagenation__center">
                    <ul class="c__pagenation__list numWrap">
                        <?php
                        foreach ($pagination_links as $link) {
                            $is_current = strpos($link, 'current') !== false ? ' active' : '';
                            echo '<li class="num">' . str_replace('<a ', '<a class="m__btnsquare' . $is_current . '" ', $link) . '</li>';
                        }
                        ?>
                    </ul>
                </div>

                <div class="c__pagenation__side">
                    <?php if ($paged < $wp_query->max_num_pages) : ?>
                        <a class="m__btnsquare arw__forward" href="<?php echo get_pagenum_link($paged + 1); ?>"></a>
                    <?php else : ?>
                        <a class="m__btnsquare arw__forward disabled" href="#"></a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

    </div>
</div>




<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filters = document.querySelectorAll('#filters .filter');
        const items = document.querySelectorAll('.gallery__item');

        filters.forEach(filter => {
            filter.addEventListener('click', function() {
                // Remove active class from all
                filters.forEach(f => f.classList.remove('active'));
                this.classList.add('active');

                const target = this.getAttribute('data-filter').split(',').map(s => s.trim());

                items.forEach(item => {
                    const match = target.some(t => item.classList.contains(t.substring(1))); // remove dot from .class
                    item.style.display = match ? 'block' : 'none';
                });
            });
        });
    });
</script>

<?php get_footer(); ?>