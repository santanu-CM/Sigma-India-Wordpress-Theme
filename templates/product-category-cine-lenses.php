<?php

/**
 * Template Name: Category Cine Lenses
 */
get_header();
$image = get_field('image');
$parent_slug = 'cine-lenses';
$child_slug = 'latest'; // ← Use your actual child slug here
$latest_term = get_term_by('slug', $child_slug, 'product_cat');
$parent_term = get_term_by('slug', $parent_slug, 'product_cat');

?>
<div class="body__container__inner">
    <div class="large__block container__fluid__wrap">
        <div class="content__wid560 text__center">
            <h1 class="f__h1 f__uppercase"><?php echo get_field('title'); ?></h1>
            <p class="spacing__40"><?php echo get_field('description'); ?></p>
            <!--<div class="btn__wrapp__global spacing__40"><a href="#">Shop all lenses</a></div> -->
        </div>
    </div>
    <div class="large__block container__fluid__wrap">
       
            <figure>
                <img src="<?php echo $image['url']; ?>" alt="">
            </figure>
       
    </div>
    <div class="large__block container__fluid__wrap">
        
            <h2 class="heading__medium f__uppercase font text__center"><?php echo get_field('cat_title'); ?></h2>
     

        <?php
        if ($parent_term && !is_wp_error($parent_term)) {
            $child_terms = get_terms([
                'taxonomy'   => 'product_cat',
                'parent'     => $parent_term->term_id,
                'hide_empty' => false,
            ]);

            if (!empty($child_terms) && !is_wp_error($child_terms)) {
                echo '<div class="l__panel__grid panel__4__pc spacing__80__pc spacing__64__sp">';

                foreach ($child_terms as $term) {
                    // Skip the specific slug term
                    if ($latest_term && $term->term_id === $latest_term->term_id) {
                        continue;
                    }

                    $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                    $image_url = wp_get_attachment_url($thumbnail_id);
        ?>
                    <div class="content__card">
                        <a href="<?php echo home_url('/product-listing-cine-lenses/?cat_id=NDg'); ?>">
                            <figure>
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($term->name); ?>">
                            </figure>
                            <p class="f__uppercase spacing__16"><?php echo esc_html($term->name); ?></p>
                        </a>
                    </div>
        <?php
                }

                echo '</div>';
            } else {
                echo '<p>No subcategories found under Cine Lenses.</p>';
            }
        } else {
            echo '<p>Cine Lenses category not found.</p>';
        }
        ?>
    </div>

    <?php
    if ($parent_term && $latest_term && !is_wp_error($parent_term) && !is_wp_error($latest_term)) {

        // Query products in the specified child term
        $args = [
            'post_type' => 'product',
            'posts_per_page' => -1,
            'tax_query' => [
                [
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' => $latest_term->term_id,
                ],
            ],
        ];
        $products = new WP_Query($args);

        if ($products->have_posts()) {
    ?>
            <div class="large__block container__fluid__wrap">
              
                    <h2 class="heading__medium f__uppercase font text__center"><?php echo $child_slug; ?></h2>
               
                <div class="product__cards spacing__80__pc spacing__40__sp">
                    <div class="slick-wrapper slick__wrapper">
                        <div id="products__slider" class="products__grid">
                            <?php while ($products->have_posts()) : $products->the_post();
                                global $product; ?>
                                <div class="slide-item slide__item">
                                    <div class="product__card<?php if ($product->get_attribute('custom_layout') == 'hr') echo ' hr'; ?>">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="image__box">
                                                <?php echo $product->get_image('full'); ?>
                                            </div>
                                            <div class="content__box">
                                                <p><?php echo esc_html(get_the_title()); ?></p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
    <?php
            wp_reset_postdata();
        }
    }

    ?>

    <?php if (have_rows('concept_repeater')) : ?>
        <?php while (have_rows('concept_repeater')) : the_row();
            $title = get_sub_field('title');
            $description = get_sub_field('description');
            $btn_text = get_sub_field('btn_text');
            $image = get_sub_field('image'); // returns image array if set in ACF field settings
            $link = get_sub_field('link');
        ?>
            <div class="large__block container__fluid__wrap">
                <div class="c__story__block column__direction">
                    <div class="c__story__block__body spacing__20__sp">
                        <?php if ($title) : ?>
                            <h2 class="heading__medium f__uppercase"><?php echo esc_html($title); ?></h2>
                        <?php endif; ?>

                        <?php if ($description) : ?>
                            <p class="spacing__20"><?php echo esc_html($description); ?></p>
                        <?php endif; ?>

                        <?php if ($btn_text) : ?>
                            <a href="<?php echo $link;?>" class="m__txt__link display__inline spacing__24"><?php echo esc_html($btn_text); ?></a>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($image)) : ?>
                        <figure class="c__story__block__img">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        </figure>
                    <?php endif; ?>
                </div>
            </div>
        
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if (have_rows('shot_on_repeater')) : ?>
        <?php while (have_rows('shot_on_repeater')) : the_row();
            $title = get_sub_field('title');
            $description = get_sub_field('description');
            $btn_text = get_sub_field('btn_text');
            $image = get_sub_field('image'); // should return image array from ACF
            $link = get_sub_field('link');
        ?>
            <div class="large__block container__fluid__wrap">
                <div class="c__story__block img__left">
                    <div class="c__story__block__body spacing__20__sp">
                        <?php if ($title) : ?>
                            <h2 class="heading__medium f__uppercase"><?php echo esc_html($title); ?></h2>
                        <?php endif; ?>

                        <?php if ($description) : ?>
                            <p class="spacing__20"><?php echo esc_html($description); ?></p>
                        <?php endif; ?>

                        <?php if ($btn_text) : ?>
                            <a href="<?php echo $link;?>" class="m__txt__link display__inline spacing__24"><?php echo esc_html($btn_text); ?></a>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($image)) : ?>
                        <figure class="c__story__block__img img__left">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        </figure>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

</div>
<?php get_footer(); ?>