<?php
/*
Template Name: Compare Page
*/
get_header();
if (isset($_SESSION['compare_encrypted'])) {
    $encrypted = $_SESSION['compare_encrypted'];
    $cat_id = intval(sigma_decrypt($encrypted));
   
}

?>
<div class="body__container__inner">
    <div class="heading__wrap heading__wrap__medium large__block container__fluid__wrap">
        <h1 class="f__h2 f__uppercase font text__center"><?php echo get_field('title'); ?></h1>
    </div>
    <div class="large__block container__fluid__wrap">
        <div class="c__select__line l__grid panel__3__pc">
            <?php
            $child_categories = get_terms([
                'taxonomy' => 'product_cat',
                'hide_empty' => false,
                'parent' => $cat_id,
            ]);
            if (empty($child_categories) || is_wp_error($child_categories)) {
                $child_categories = [ get_term($cat_id) ]; // treat the original as a leaf
            }
           
            if (!empty($child_categories)) :?>
                <div class="c-selectBlock">
                    <p class="f__ul font">Product 1</p>
                    <div class="m__select">
                        <select class="form-control form__control product-select" data-target="#select-01" aria-label="select-01">

                            <option value="">Select</option>
                            <?php foreach ($child_categories as $child) :
                                // Fetch products in this child category
                                $products = new WP_Query([
                                    'post_type' => 'product',
                                    'posts_per_page' => -1,
                                    'tax_query' => [[
                                        'taxonomy' => 'product_cat',
                                        'field' => 'term_id',
                                        'terms' => $child->term_id,
                                    ]],
                                ]);

                                if ($products->have_posts()) : ?>
                                    <optgroup label="<?php echo esc_html($child->name); ?>">
                                        <?php while ($products->have_posts()) : $products->the_post(); ?>
                                            <option value="<?php echo get_the_ID(); ?>">

                                                <?php the_title(); ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </optgroup>
                            <?php endif;
                                wp_reset_postdata();
                            endforeach; ?>
                        </select>
                    </div>
                </div>
            <?php endif; ?>

            <?php
            $child_categories = get_terms([
                'taxonomy' => 'product_cat',
                'hide_empty' => false,
                'parent' => $cat_id,
            ]);
            if (empty($child_categories) || is_wp_error($child_categories)) {
                $child_categories = [ get_term($cat_id) ];
            }

            if (!empty($child_categories)) : ?>
                <div class="c-selectBlock">
                    <p class="f__ul font">Product 2</p>
                    <div class="m__select">
                        <select class="form-control form__control product-select" data-target="#select-02" aria-label="select-02">

                            <option value="">Select</option>
                            <?php foreach ($child_categories as $child) :
                                // Fetch products in this child category
                                $products = new WP_Query([
                                    'post_type' => 'product',
                                    'posts_per_page' => -1,
                                    'tax_query' => [[
                                        'taxonomy' => 'product_cat',
                                        'field' => 'term_id',
                                        'terms' => $child->term_id,
                                    ]],
                                ]);

                                if ($products->have_posts()) : ?>
                                    <optgroup label="<?php echo esc_html($child->name); ?>">
                                        <?php while ($products->have_posts()) : $products->the_post(); ?>
                                            <option value="<?php echo get_the_ID(); ?>">
                                                <?php the_title(); ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </optgroup>
                            <?php endif;
                                wp_reset_postdata();
                            endforeach; ?>
                        </select>
                    </div>
                </div>
            <?php endif; ?>
            <?php
            $child_categories = get_terms([
                'taxonomy' => 'product_cat',
                'hide_empty' => false,
                'parent' => $cat_id,
            ]);
            if (empty($child_categories) || is_wp_error($child_categories)) {
                $child_categories = [ get_term($cat_id) ]; // treat the original as a leaf
            }

            if (!empty($child_categories)) : ?>
                <div class="c-selectBlock pc__none">
                    <p class="f__ul font">Product 3</p>
                    <div class="m__select">
                    <select class="form-control form__control product-select" data-target="#select-03" aria-label="select-03">

                            <option value="">Select</option>
                            <?php foreach ($child_categories as $child) :
                                // Fetch products in this child category
                                $products = new WP_Query([
                                    'post_type' => 'product',
                                    'posts_per_page' => -1,
                                    'tax_query' => [[
                                        'taxonomy' => 'product_cat',
                                        'field' => 'term_id',
                                        'terms' => $child->term_id,
                                    ]],
                                ]);

                                if ($products->have_posts()) : ?>
                                    <optgroup label="<?php echo esc_html($child->name); ?>">
                                        <?php while ($products->have_posts()) : $products->the_post(); ?>
                                            <option value="<?php echo get_the_ID(); ?>">
                                                <?php the_title(); ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </optgroup>
                            <?php endif;
                                wp_reset_postdata();
                            endforeach; ?>
                        </select>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="c-specLine medium__block l__grid panel__3 panel__2__sp">
            <div id="select-01"></div>
            <div id="select-02"></div>
            <div id="select-03" class="pc"></div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
        $('.product-select').on('change', function() {
            const productId = $(this).val();
            const target = $(this).data('target');

            if (productId) {
                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    method: 'POST',
                    data: {
                        action: 'get_product_specification',
                        product_id: productId
                    },
                    beforeSend: function() {
                        $(target).html('<p>Loading...</p>');
                    },
                    success: function(res) {
                        if (res.success) {
                            $(target).html(res.data);
                        } else {
                            $(target).html('<p>Something went wrong.</p>');
                        }
                    },
                    error: function() {
                        $(target).html('<p>AJAX error occurred.</p>');
                    }
                });
            } else {
                $(target).empty(); // Or show placeholder
            }
        });
    });
</script>

<?php get_footer(); ?>