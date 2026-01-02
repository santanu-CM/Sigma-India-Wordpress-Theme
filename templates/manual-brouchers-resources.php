<?php

/**
 * Template Name: Catalog Page
 */
get_header();
$cat_slug = 'lenses';
$cat_term = get_term_by('slug', $cat_slug, 'product_cat');

if ($cat_term && !is_wp_error($cat_term)) {
    $cat_id = $cat_term->term_id;

    $child_terms = get_terms([
        'taxonomy'   => 'product_cat',
        'parent'     => $cat_id,
        'hide_empty' => false,
    ]);
}

$exclude_taxonomies = [
    'product_type',
    'product_visibility',
    'pa_mount',
    'product_model',
    'popular_categories',
    'product_cat',
    'product_tag',
    'product_shipping_class',
];

$all_taxonomies = get_object_taxonomies('product', 'objects');
$taxonomies = [];

foreach ($all_taxonomies as $taxonomy) {
    if (!in_array($taxonomy->name, $exclude_taxonomies)) {
        $taxonomies[$taxonomy->name] = $taxonomy->label;
    }
}
$page_image = get_field('firmare_image');
?>
<style>
   .pdct__ld {
    text-align: center;
    font-weight: 500;
    padding: 20px 0;
}
</style>
<div class="body__container__inner container__fluid__wrap body__bgcolor">
    <div class="large__block">
        <p class="text__center"><a href="<?php echo get_field('support_link'); ?>" class="f__uppercase f__ul"><?php echo get_field('page_title'); ?></a></p>
        <h1 class="f__h2 f__uppercase spacing__40 text__center"><?php echo get_field('catalog'); ?></h1>
    </div>
    <div class="medium__block">
        <div class="content__width560__pc">
            <figure>
                <img src="<?php echo $page_image['url']; ?>" alt="">
            </figure>
        </div>
    </div>
    <div class="large__block">
        <div class="nav nav-tabs nav__tabs" id="nav-tab" role="tablist">
            <button class="nav-link nav__link f__uppercase f__ul active" id="nav-lenses-tab" data-bs-toggle="tab" data-bs-target="#nav-lenses" type="button" role="tab" aria-controls="nav-lenses" aria-selected="true"><?php echo get_field('lense_title'); ?></button>
            <button class="nav-link nav__link f__uppercase f__ul" id="nav-cine-lenses-tab" data-bs-toggle="tab" data-bs-target="#nav-cine-lenses" type="button" role="tab" aria-controls="nav-cine-lenses" aria-selected="false"><?php echo get_field('cine_lensestitle'); ?></button>
            <button class="nav-link nav__link f__uppercase f__ul" id="nav-cameras-tab" data-bs-toggle="tab" data-bs-target="#nav-cameras" type="button" role="tab" aria-controls="nav-cameras" aria-selected="false"><?php echo get_field('cameras_title'); ?></button>
            <button class="nav-link nav__link f__uppercase f__ul" id="nav-accessories-tab" data-bs-toggle="tab" data-bs-target="#nav-accessories" type="button" role="tab" aria-controls="nav-accessories" aria-selected="false"><?php echo get_field('accessories_title'); ?></button>

        </div>

        <div class="tab-content tab__content" id="nav-tabContent">
            <div class="tab-pane tab__pane fade show active" id="nav-lenses" role="tabpanel" aria-labelledby="nav-lenses-tab" tabindex="0">
                <div class="medium__block">
                    <p class="f__ul f__uppercase"><?php echo get_field('lense_title'); ?></p>
                    <form id="product-filter-form" method="post">
                        <input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>">
                        <div class="c__filterbar f__ul f__uppercase">
                            <div class="c__filter__bar__head l__grid content__between">
                                <p class="f__ul"><?php echo $term->name; ?></p>
                                <div class="l__grid">
                                    <p id="filter-btn" class="c__filter__bar__btn f__ul"><?php echo get_field('filter'); ?> (<span>0</span>)</p>
                                </div>
                            </div>
                            <div id="filter-category" class="c__filter__bar__box" style="display:block;">
                                <ul class="l__panel__grid spacing__48__pc spacing__32__sp category__list panel__6__pc">
                                    <li class="l__grid flex__column__pc panel__2__sp">
                                        <p class="single__link text__color__secondary"><?php echo get_field('ptitle'); ?></p>
                                        <?php
                                        if (!empty($child_terms) && !is_wp_error($child_terms)) {
                                            echo '<ul class="category__list__item l__grid flex__column spacing__12__pc">';
                                            foreach ($child_terms as $child) {
                                                echo '<li class="f__uppercase font__size__base">
                                            <label class="m__filter__selector">
                                                <input type="checkbox" name="concept" value="' . esc_attr($child->slug) . '">
                                                <span>' . esc_html($child->name) . '</span>
                                            </label>
                                        </li>';
                                            }
                                            echo '</ul>';
                                        }
                                        ?>
                                    </li>
                                    <?php
                                    foreach ($taxonomies as $taxonomy => $title):
                                        $terms = get_terms([
                                            'taxonomy'   => $taxonomy,
                                            'hide_empty' => false,
                                        ]);

                                        if (!empty($terms) && !is_wp_error($terms)): ?>
                                            <li class="l__grid flex__column__pc panel__2__sp">
                                                <p class="single__link text__color__secondary"><?php echo esc_html($title); ?></p>
                                                <ul class="category__list__item l__grid flex__column spacing__12__pc">
                                                    <?php foreach ($terms as $term): ?>
                                                        <li class="f__uppercase font__size__base">
                                                            <label class="m__filter__selector">
                                                                <!-- <input type="checkbox" name="<?php echo esc_attr($taxonomy); ?>" value="<?php echo esc_attr($term->slug); ?>"> -->
                                                                <input type="checkbox" name="<?php echo esc_attr($taxonomy); ?>[]" value="<?php echo esc_attr($term->slug); ?>">

                                                                <span><?php echo esc_html($term->name); ?></span>
                                                            </label>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </li>
                                    <?php endif;
                                    endforeach;
                                    ?>
                                </ul>

                                <p class="m__txt__link single__link txt__link__cancel spacing__32"><a href="#"><?php echo get_field('cl_filter'); ?></a></p>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="filtered-products"></div>
            </div>
            <div class="tab-pane tab__pane fade" id="nav-cine-lenses" role="tabpanel" aria-labelledby="nav-cine-lenses-tab" tabindex="0">
                <div class="medium__block">
                    <p class="f__ul f__uppercase"><?php echo get_field('cine_lensestitle'); ?></p>
                </div>

                <div class="medium__block">
                    <?php
                    $parent_slug = 'cine-lenses';
                    $taxonomy = 'product_cat';
                    $parent_term = get_term_by('slug', $parent_slug, $taxonomy);

                    if ($parent_term) {
                        $child_terms = get_terms([
                            'taxonomy'   => $taxonomy,
                            'hide_empty' => false,
                            'parent'     => $parent_term->term_id,
                            'orderby'    => 'menu_order',
                            'order'      => 'ASC',
                        ]);

                        $index = 1;

                        foreach ($child_terms as $child_term) {
                            // Query products under this child category

                            $products = new WP_Query([
                                'post_type'      => 'product',
                                'posts_per_page' => -1,
                                'post_status'    => 'publish',
                                'orderby'        => 'menu_order',
                                'order'          => 'ASC',
                                'tax_query'      => [
                                    [
                                        'taxonomy' => $taxonomy,
                                        'field'    => 'term_id',
                                        'terms'    => $child_term->term_id,
                                    ],
                                ],
                            ]);

                            $has_content = $products->have_posts() || have_rows('catalog_repeter', 'product_cat_' . $child_term->term_id);

                            if ($has_content):
                    ?>
                                <div class="accordion-item accordion__item body__bgcolor">
                                    <h2 class="accordion-header accordion__header" id="heading-<?php echo $index; ?>">
                                        <button class="accordion-button accordion__button collapsed" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse-<?php echo $index; ?>"
                                            aria-expanded="false"
                                            aria-controls="collapse-<?php echo $index; ?>">
                                            <p><span class="f__uppercase"><?php echo esc_html($child_term->name); ?></span></p>
                                        </button>
                                    </h2>

                                    <div id="collapse-<?php echo $index; ?>" class="accordion-collapse collapse"
                                        aria-labelledby="heading-<?php echo $index; ?>" data-bs-parent="#accordionExample">
                                        <div class="accordion-body accordion__body">
                                            <ul class="c__bg__card__Panel panel__4__pc spacing__08">
                                                <?php
                                                $has_products = false;

                                                if ($products->have_posts()):
                                                    $has_products = true;
                                                    while ($products->have_posts()): $products->the_post();
                                                        $product_id = get_the_ID();
                                                        $product_title = get_the_title();

                                                        if (have_rows('catalog_repeter', $product_id)):
                                                            while (have_rows('catalog_repeter', $product_id)): the_row();
                                                                $guide = get_sub_field('guide');
                                                                $pdf = get_sub_field('pdf');
                                                                $download_txt = get_sub_field('download_txt');
                                                                $pdf_file = get_sub_field('pdf_file');

                                                                if ($pdf_file):
                                                ?>
                                                                    <li class="m__bg__card">
                                                                        <a href="<?php echo esc_url($pdf_file['url']); ?>" class="m__bg__card__inr" rel="noopener noreferrer" target="_blank">
                                                                            <p class="f__ul"><?php echo esc_html($product_title); ?> (<?php echo esc_html($guide); ?>)</p>
                                                                            <p class="f__ul"><?php echo esc_html($pdf); ?></p>
                                                                            <div class="spacing__32">
                                                                                <p class="f__uppercase f__ul m__txt__link"><?php echo esc_html($download_txt); ?></p>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                            <?php
                                                                endif;
                                                            endwhile;
                                                        else:
                                                            ?>
                                                            <li class="m__bg__card">
                                                                <a href="#" class="m__bg__card__inr" onclick="return false;">
                                                                    <p class="f__ul"><?php echo esc_html($product_title); ?></p>
                                                                </a>
                                                            </li>
                                                        <?php
                                                        endif;

                                                    endwhile;
                                                    wp_reset_postdata();
                                                endif;

                                                // Fallback: term-level catalog_repeter
                                                if (!$has_products && have_rows('catalog_repeter', 'product_cat_' . $child_term->term_id)):
                                                    while (have_rows('catalog_repeter', 'product_cat_' . $child_term->term_id)): the_row();
                                                        $guide = get_sub_field('guide');
                                                        $pdf = get_sub_field('pdf');
                                                        $download_txt = get_sub_field('download_txt');
                                                        $pdf_file = get_sub_field('pdf_file');

                                                        if ($pdf_file):
                                                        ?>
                                                            <li class="m-bgCard">
                                                                <a href="<?php echo esc_url($pdf_file['url']); ?>" class="m-bgCard__inr" rel="noopener noreferrer" target="_blank">
                                                                    <p class="m-bgCard__cat"><?php echo esc_html($child_term->name); ?> <?php echo esc_html($guide); ?></p>
                                                                    <p class="m-bgCard__ttl"><?php echo esc_html($pdf); ?></p>
                                                                    <div class="m-bgCard__box l-grid">
                                                                        <p class="m-txtLink"><?php echo esc_html($download_txt); ?></p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                <?php
                                                        endif;
                                                    endwhile;
                                                endif;
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            endif;

                            $index++;
                        }
                    }
                    ?>

                </div>
            </div>

            <div class="tab-pane tab__pane fade" id="nav-cameras" role="tabpanel" aria-labelledby="nav-cameras-tab" tabindex="0">
                <div class="medium__block">
                    <p class="f__ul f__uppercase"><?php echo get_field('cameras_title'); ?></p>
                </div>
                <div class="medium__block">
                    <?php
                    $camera_products = null;
                    $camera_slug = 'cameras';

                    if ($camera_term = get_term_by('slug', $camera_slug, 'product_cat')) {
                        $camera_products = new WP_Query([
                            'post_type'      => 'product',
                            'posts_per_page' => -1,
                            'post_status'    => 'publish',
                            'orderby'        => 'menu_order',
                            'order'          => 'ASC',
                            'tax_query'      => [
                                [
                                    'taxonomy' => 'product_cat',
                                    'field'    => 'term_id',
                                    'terms'    => $camera_term->term_id,
                                ],
                            ],
                        ]);
                    }

                    if ($camera_products->have_posts()):
                        $index = 1;
                        while ($camera_products->have_posts()): $camera_products->the_post();
                            $product_id = get_the_ID();
                            $product_title = get_the_title();
                    ?>
                            <div class="accordion-item accordion__item body__bgcolor">
                                <h2 class="accordion-header accordion__header" id="heading-<?php echo $index; ?>">
                                    <button class="accordion-button accordion__button collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapse-0-<?php echo $index; ?>"
                                        aria-expanded="false"
                                        aria-controls="collapse-0-<?php echo $index; ?>">
                                        <p>
                                            <span class="f__uppercase"><?php echo esc_html($product_title); ?></span>
                                        </p>
                                    </button>
                                </h2>
                                <div id="collapse-0-<?php echo $index; ?>" class="accordion-collapse collapse"
                                    aria-labelledby="heading-<?php echo $index; ?>"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body accordion__body">
                                        <ul class="c__bg__card__Panel panel__4__pc spacing__08">
                                            <?php if (have_rows('catalog_repeter', $product_id)):
                                                while (have_rows('catalog_repeter', $product_id)): the_row();
                                                    $guide = get_sub_field('guide');
                                                    $pdf = get_sub_field('pdf');
                                                    $download_txt = get_sub_field('download_txt');
                                                    $pdf_file = get_sub_field('pdf_file');
                                            ?>
                                                    <?php if ($pdf_file): ?>
                                                        <li class="m__bg__card">
                                                            <a class="m__bg__card__inr" href="<?php echo esc_url($pdf_file['url']); ?>" target="_blank" rel="noopener noreferrer">
                                                                <p class="f__ul">
                                                                    <?php echo esc_html($guide); ?><br>
                                                                    <?php echo esc_html($pdf); ?>
                                                                </p>
                                                                <div class="spacing__32">
                                                                    <p class="f__uppercase f__ul m__txt__link"><?php echo esc_html($download_txt); ?><br></p>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                            <?php endwhile;
                                            endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    <?php
                            $index++;
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>

                </div>

            </div>
            <div class="tab-pane tab__pane fade" id="nav-accessories" role="tabpanel" aria-labelledby="nav-accessories-tab" tabindex="0">
                <div class="medium__block">
                    <p class="f__ul f__uppercase"><?php echo get_field('accessories_title'); ?></p>
                </div>
                <?php
                $parent_slug = 'accessories';

                $parent_term = get_term_by('slug', $parent_slug, 'product_cat');

                if ($parent_term && !is_wp_error($parent_term)) {
                    $parent_cat_id = $parent_term->term_id;

                    $subcategories = get_terms([
                        'taxonomy'   => 'product_cat',
                        'hide_empty' => false,
                        'parent'     => $parent_cat_id,
                    ]);
                }


                if (!empty($subcategories) && !is_wp_error($subcategories)) {
                    $accordion_index = 1;

                    foreach ($subcategories as $subcategory) {
                        echo '<div class="text__center spacing__40">';
                        echo '<div class="f__ul">
                        <h2 class="heading__medium f__uppercase spacing__bottom__20">' . esc_html($subcategory->name) . '</h2>
                         <hr class="firm__border">
                        </div>';
                        echo '</div>';

                        $products = new WP_Query([
                            'post_type'      => 'product',
                            'posts_per_page' => -1,
                            'post_status'    => 'publish',
                            'orderby'        => 'menu_order',
                            'order'          => 'ASC',
                            'tax_query'      => [
                                [
                                    'taxonomy' => 'product_cat',
                                    'field'    => 'term_id',
                                    'terms'    => $subcategory->term_id,
                                ],
                            ],
                        ]);

                        if ($products->have_posts()):
                            while ($products->have_posts()): $products->the_post();
                                $product_id = get_the_ID();
                                $title      = get_the_title();
                                $subtitle   = get_field('product_category_label'); // Optional ACF field for subtitle like "Art", "Contemporary"
                ?>
                                <div class="accordion-item accordion__item body__bgcolor">
                                    <h2 class="accordion-header accordion__header" id="heading-<?php echo $accordion_index; ?>">
                                        <button class="accordion-button accordion__button collapsed" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse-0-<?php echo $accordion_index; ?>"
                                            aria-expanded="false"
                                            aria-controls="collapse-0-<?php echo $accordion_index; ?>">
                                            <p>
                                                <?php if ($subtitle): ?>
                                                    <span class="f__uppercase"><?php echo esc_html($subtitle); ?></span><br>
                                                <?php endif; ?>
                                                <?php echo esc_html($title); ?>
                                            </p>
                                        </button>
                                    </h2>
                                    <div id="collapse-0-<?php echo $accordion_index; ?>" class="accordion-collapse collapse"
                                        aria-labelledby="heading-<?php echo $accordion_index; ?>" data-bs-parent="#accordionExample">
                                        <div class="accordion-body accordion__body">
                                            <ul class="c__bg__card__Panel panel__4__pc spacing__08">
                                                <?php if (have_rows('firmware_versions', $product_id)):
                                                    while (have_rows('firmware_versions', $product_id)): the_row();
                                                        $version = get_sub_field('version');
                                                        $mount   = get_sub_field('mount_type');
                                                        $link    = get_sub_field('page_link');
                                                        $view    = get_sub_field('view_btn') ?: 'VIEW';
                                                ?>
                                                        <li class="m__bg__card">
                                                            <a class="m__bg__card__inr" href="<?php echo esc_url($link); ?>">
                                                                <p class="f__ul">
                                                                    <?php echo esc_html($mount); ?><br>
                                                                    <?php echo esc_html($version); ?>
                                                                </p>
                                                                <div class="spacing__32">
                                                                    <p class="f__uppercase f__ul m__txt__link"><?php echo esc_html($view); ?></p>
                                                                </div>
                                                            </a>
                                                        </li>
                                                <?php endwhile;
                                                endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                <?php
                                $accordion_index++;
                            endwhile;
                            wp_reset_postdata();
                        endif;
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>
<p id="loading-text" class="pdct__ld f__h3" style="display: none;">Loading...</p>

<?php get_footer(); ?>
<script>
    jQuery(document).ready(function($) {
        function loadFilteredProducts(formData = null) {
            if (!formData) {
                formData = {
                    action: 'catalog_filter_products',
                    cat_id: '<?php echo $cat_id; ?>'
                };
            } else {
                formData += '&cat_id=<?php echo $cat_id; ?>';
            }

            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    $('#loading-text').show();
                    $('#filtered-products').html('');
                },
                success: function(response) {
                    $('#filtered-products').html(response);
                    $('#loading-text').hide();
                    updateFilterCount();
                }
            });
        }

        $('form input[type="checkbox"]').on('change', function() {
            let data = $('form').serialize();
            data += '&action=catalog_filter_products';
            loadFilteredProducts(data);
        });

        $('.txt__link__cancel a').on('click', function(e) {
            e.preventDefault();
            $('form input[type="checkbox"]').prop('checked', false);
            loadFilteredProducts();
            updateFilterCount();
        });

        function updateFilterCount() {
            const checkedCount = $('form input[type="checkbox"]:checked').length;
            $('#filter-btn span').text(checkedCount);
        }

        // Initial load
        loadFilteredProducts();
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const category = urlParams.get('category') || 'lenses'; // default tab

        // Map category slug to tab IDs
        const categoryToTabId = {
            'lenses': 'nav-lenses',
            'cine-lenses': 'nav-cine-lenses',
            'cameras': 'nav-cameras',
            'accessories': 'nav-accessories'
        };

        const tabId = categoryToTabId[category];
        if (!tabId) return;

        // Remove active from all nav links and tab panes
        document.querySelectorAll('.nav-link').forEach(el => {
            el.classList.remove('active');
            el.setAttribute('aria-selected', 'false');
        });

        document.querySelectorAll('.tab-pane').forEach(el => {
            el.classList.remove('active', 'show');
        });

        // Activate the correct tab link
        const tabLink = document.querySelector(`[data-bs-target="#${tabId}"]`);
        if (tabLink) {
            tabLink.classList.add('active');
            tabLink.setAttribute('aria-selected', 'true');
        }

        // Show the corresponding tab content pane
        const tabPane = document.getElementById(tabId);
        if (tabPane) {
            tabPane.classList.add('active', 'show');
        }
    });
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function() {
            const targetId = this.getAttribute('data-bs-target').replace('#nav-', '');
            const newUrl = `${window.location.pathname}?category=${targetId}`;
            history.replaceState(null, '', newUrl);
        });
    });
</script>