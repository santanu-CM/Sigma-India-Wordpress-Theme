<?php
defined('ABSPATH') || exit;

get_header();

//do_action('woocommerce_before_main_content');
?>

<?php
$accessories_category_page_content= get_field('accessories_category_page_content','option');
?>
<div class="no__bg__banner">
    <div class="container">
        <div class="breadcrumb__wrapp">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                <?php
                // Display category title
                if ( is_product_category() || is_product_tag()) {
                    $term = get_queried_object();
                    // Get the parent term (e.g., "Accessories")
                    //$parent_term = get_term_by( 'slug', 'accessories', 'product_cat' );
                }?>
                <li><?php echo esc_html($term->name); ?></li>
            </ul>
        </div>
        <div class="global__heading__wrapp">
            <h1><?php echo esc_html($term->name); ?></h1>
        </div>
    </div>
</div>
<div class="section__global__wrapp">
    <div class="container">
        <div class="browse__category">
            <div class="category__tabs">
                <ul>
                    <li class="active"><a href="#">Browse by category</a></li>
                </ul>
            </div>
            <?php
                $parent_category_slug = 'accessories';
                $parent_category = get_term_by('slug', $parent_category_slug, 'product_cat');

                if ($parent_category) {
                    $subcategories = get_terms(array(
                        'taxonomy' => 'product_cat',
                        'child_of' => $parent_category->term_id,
                        'hide_empty' => false, // Set to true to hide empty categories
                    ));
                }
            ?>
            <?php if ($subcategories && !is_wp_error($subcategories)) : ?>
            <div class="category__list">
                <?php foreach ($subcategories as $subcategory) : ?>
                    <div class="category__item">
                        <a href="<?php echo esc_url(get_term_link($subcategory)); ?>" class="<?php echo $term->term_id == $subcategory->term_id ? 'active' : ''; ?>">
                            <?php echo esc_html($subcategory->name); ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<!-- Display current category products -->
<div class="accessories__list">
    <div class="container">
        <div class="global__heading__wrapp">
            <h2><?php echo esc_html($term->name); ?></h2>
            <p><?php echo esc_html($term->description); ?></p>
        </div>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            <?php global $product; ?>
                <div class="accessories__product__card">
                    <div class="image__box">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('full'); ?>
                        <?php endif; ?>
                    </div>
                    <div class="card__content">
                        <h3><?php the_title(); ?></h3>
                        <div class="product__price"><?php echo $product->get_price_html();?></div>
                        <p><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
                        <div class="form-group form__group">
                        <?php
                        // Check if the product has the "mount" attribute
                        $attribute_taxonomy_name = 'pa_mount'; // Change this to the slug of the attribute you want to check
                        $attribute_terms = wc_get_product_terms( $product->get_id(), $attribute_taxonomy_name, array( 'fields' => 'all' ) );

                        if ( ! empty( $attribute_terms ) ) : // If there are terms, show the dropdown
                        ?>
                            <div class="input-group input__group">
                                <label>Mount</label>
                                <select name="mount_pick" id="mount_pick" class="selectpicker form-control form__control mb-4">
                                    <option value="">Choose option</option>
                                    <?php
                                    foreach ( $attribute_terms as $attribute_term ) {
                                        echo '<option value="' . esc_attr( $attribute_term->name ) . '">' . esc_html( $attribute_term->name ) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        <?php endif; // End check for attribute ?>
                            <!-- <p class="price__value"><span id="value"></span></p> -->
                            <div class="btn__wrapp">
                                <a href="<?php echo esc_url(get_permalink()); ?>">Add to Cart</a>
                                <a href="<?php echo esc_url(get_permalink()); ?>">Find out more</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <p>No products found in this category.</p>
        <?php endif; ?>
    </div>
</div>
<div class="feature__accessory">
    <?php if(!empty($accessories_category_page_content['featured_accessories_image'])):?>
    <div class="image__box">
        <img src="<?php echo $accessories_category_page_content['featured_accessories_image'];?>" alt="" />
    </div>
    <?php endif;?>
    <div class="content__wrapp">
        <div class="container">
            <div class="content__inner">
                <div class="global__heading__wrapp">
                    <?php if(!empty($accessories_category_page_content['featured_accessories_title'])):?>
                    <h3><?php echo $accessories_category_page_content['featured_accessories_title'];?></h3>
                    <?php endif;?>
                    <?php if(!empty($accessories_category_page_content['featured_accessories_subtitle'])):?>
                    <h2><?php echo $accessories_category_page_content['featured_accessories_subtitle'];?></h2>
                    <?php endif;?>
                </div>
                <?php echo apply_filters('the_content',$accessories_category_page_content['featured_accessories_content']);?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer('shop');
?>






