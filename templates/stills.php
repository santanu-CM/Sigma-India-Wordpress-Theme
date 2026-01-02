<?php

/**
 * Template Name: Still Page
 */
get_header();
$cat_id = 0;
if (!empty($_GET['cat_id'])) {
    $encrypted = $_GET['cat_id'];
    $cat_id = intval(sigma_decrypt($encrypted));
    $_SESSION['compare_encrypted'] = sigma_encrypt($cat_id);
}

$term = get_term($cat_id, 'product_cat');
$child_terms = get_terms([
    'taxonomy'   => 'product_cat',
    'parent'     => $cat_id,
    'hide_empty' => false,
]);

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

?>
<div class="body__container__inner">
    <div class="large__block container__fluid__wrap">
        <div class="header__block">
            <form id="product-filter-form" method="post">
                <input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>">
                <div class="c__filterbar f__ul f__uppercase">
                    <div class="c__filter__bar__head l__grid content__between">
                        <p class="f__ul"><?php echo $term->name; ?></p>
                        <div class="l__grid">
                            <p id="filter-btn" class="c__filter__bar__btn f__ul"><?php echo get_field('filter'); ?> (<span>0</span>)</p>
                            <p class="f__ul single__link"><a href="<?php echo home_url('/compare-page/'); ?>"><?php echo get_field('compare'); ?></a></p>
                        </div>
                    </div>
                    <div id="filter-category" class="c__filter__bar__box" style="display:block;">
                        <ul class="l__panel__grid spacing__48__pc spacing__32__sp category__list panel__6__pc">
                            <?php if (!empty($child_terms) && !is_wp_error($child_terms)) : ?>
                                <li class="l__grid flex__column__pc panel__2__sp">
                                    <?php
                                    $ptitle = get_field('ptitle');
                                    if (!empty($ptitle)) :
                                    ?>
                                        <p class="single__link text__color__secondary"><?php echo esc_html($ptitle); ?></p>
                                    <?php endif; ?>
                                    <ul class="category__list__item l__grid flex__column spacing__12__pc">
                                        <?php foreach ($child_terms as $child): ?>
                                            <li class="f__uppercase font__size__base">
                                                <label class="m__filter__selector">
                                                    <input type="checkbox" name="concept" value="<?php echo esc_attr($child->slug); ?>">
                                                    <span><?php echo esc_html($child->name); ?></span>
                                                </label>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <?php
                            foreach ($taxonomies as $taxonomy => $title):
                                $terms = get_terms([
                                    'taxonomy'   => $taxonomy,
                                    'hide_empty' => false,
                                ]);
                                if (empty($title) || empty($terms) || is_wp_error($terms)) {
                                    continue;
                                }
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
    </div>
    <div id="filtered-products" class="c__product__listing l__grid">

    </div>

</div>
<?php get_footer(); ?>
<script>
    jQuery(document).ready(function($) {
        function getUrlParams() {
            const params = {};
            window.location.search
                .substring(1)
                .split("&")
                .forEach(function(pair) {
                    const [key, value] = pair.split("=");
                    if (key) params[decodeURIComponent(key)] = decodeURIComponent(value || '');
                });
            return params;
        }

        function loadFilteredProducts(formData = null) {
            if (!formData) {
                formData = {
                    action: 'still_filter_products',
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
                    $('#filtered-products').html('<p>Loading...</p>');
                },
                success: function(response) {
                    $('#filtered-products').html(response);
                    updateFilterCount();
                }
            });
        }
        // Pre-check checkboxes based on URL
        const urlParams = getUrlParams();
        if (urlParams['type']) {
            $('input[name="type[]"][value="' + urlParams['type'] + '"]').prop('checked', true);
        }


        $('form input[type="checkbox"]').on('change', function() {
            let data = $('form').serialize();
            data += '&action=still_filter_products';
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
        //  loadFilteredProducts();

        let initialData = $('form').serialize() + '&action=still_filter_products';
        loadFilteredProducts(initialData);
        $('.txt__link__cancel a').on('click', function(e) {
            e.preventDefault();

            // Uncheck all filters
            $('form input[type="checkbox"]').prop('checked', false);

            // Remove only `type` from the URL
            const url = new URL(window.location);
            url.searchParams.delete('type');
            window.history.replaceState({}, '', url);

            // Reload product list via AJAX
            loadFilteredProducts();
            updateFilterCount();
        });

    });
</script>