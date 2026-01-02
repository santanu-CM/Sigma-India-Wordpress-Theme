<?php

/**

 * Template Name: News

 */

get_header();
?>
<div class="body__container__inner">
    <div class="large__block container__fluid__wrap">
        <div class="text__center">
            <h1 class="f__h1 f__uppercase"><?php echo wp_kses_post(get_field('title')); ?></h1>
        </div>
    </div>
    <div class="large__block container__fluid__wrap">
        <div class="c__search__input">
            <div class="mf__search__box">
                <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="form-group form__group">
                        <div class="input-group input__group">
                            <input type="text" name="s" class="form-control form__control" placeholder="Search by keyword" />
                            <button type="submit" class="search__bar__btn"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="c__search__summary f__ul spacing__24 l__grid l__grid__pc">
            <p class="c__search__ttl f__uppercase f__ul no__line__height"><?php echo wp_kses_post(get_field('search')); ?></p>
            <ul class="c__search__list l__grid l__grid__pc">
                <?php foreach (get_popular_searches(5) as $term => $count): ?>
                    <li class="f__uppercase"><a href="<?php echo esc_url(home_url('/?s=' . urlencode($term))); ?>"><?php echo esc_html($term); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>


    </div>
    <div class="medium__block container__fluid__wrap">
        <form>
            <div class="l__panel__grid panel__2">
                <div class="c__select__line">
                    <div class="form-group form__group">
                        <p class="f__ul"><?php echo wp_kses_post(get_field('year')); ?></p>
                        <div class="m__select">
                            <select id="filter-year" class="form-control form__control selectpicker" aria-label="Default select example">
                                <option value="">Select</option>
                                <?php for ($y = date('Y'); $y >= 2020; $y--) : ?>
                                    <option value="<?= esc_attr($y) ?>"><?= esc_html($y) ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="c__select__line">
                    <div class="form-group form__group">
                        <p class="f__ul"><?php echo wp_kses_post(get_field('categories')); ?></p>
                        <div class="m__select">
                            <select id="filter-category" class="form-control form__control selectpicker">
                                <option value="">Select</option>
                                <?php foreach (get_categories(['hide_empty' => false]) as $cat) : ?>
                                    <option value="<?= esc_attr($cat->term_id) ?>"><?= esc_html($cat->name) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="spacing__32 container__fluid__wrap">

        <ul class="c__news__list" id="filtered-posts"></ul>

        <div class="c__pagenation" id="pagination-container"></div>

    </div>
    <div class="large__block container__fluid__wrap">
        <div class="l__panel__grid panel__2__pc">
            <h2 class="f__ul f__uppercase text__center__sp"><?php echo wp_kses_post(get_field('exploremore')); ?></h2>
            <?php if (have_rows('product_repeater')) : ?>
                <div class="l__panel__grid panel__2__pc">
                    <?php while (have_rows('product_repeater')) : the_row();
                        $image = get_sub_field('product_image');
                        $name = get_sub_field('product_name');
                        $page_link =  get_sub_field('page_link');
                    ?>
                        <div class="m__content__box">
                            <a class="text__color__base" href="<?php echo $page_link;?>">
                                <div class="image__box">
                                    <?php if (!empty($image)) : ?>
                                        <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>">
                                    <?php endif; ?>
                                </div>
                                <p class="f__uppercase spacing__16"><?= nl2br(esc_html($name)); ?></p>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php get_footer(); ?>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const postContainer = document.getElementById('filtered-posts');
        const paginationContainer = document.getElementById('pagination-container');
        const yearFilter = document.getElementById('filter-year');
        const categoryFilter = document.getElementById('filter-category');

        function fetchPosts(page = 1) {
            const year = yearFilter.value;
            const category = categoryFilter.value;

            const data = new FormData();
            data.append('action', 'filter_posts_paginated');
            data.append('year', year);
            data.append('category', category);
            data.append('page', page);

            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                    method: 'POST',
                    body: data
                })
                .then(res => res.json())
                .then(response => {
                    postContainer.innerHTML = response.posts;
                    paginationContainer.innerHTML = response.pagination;

                    // Add click event to pagination buttons
                    paginationContainer.querySelectorAll('[data-page]').forEach(btn => {
                        btn.addEventListener('click', (e) => {
                            e.preventDefault();
                            const pageNum = btn.getAttribute('data-page');
                            fetchPosts(pageNum);
                        });
                    });
                });
        }

        yearFilter.addEventListener('change', () => fetchPosts(1));
        categoryFilter.addEventListener('change', () => fetchPosts(1));

        fetchPosts(); // initial load
    });
</script>