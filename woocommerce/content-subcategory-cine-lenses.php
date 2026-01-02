<div class="main__banner inner__banner__main inner__banner__small inner__banner__small__single cine__lense__product__list">
    <div class="image__box">
        <?php
        // Display category thumbnail
        if ( is_product_category() || is_product_tag()) {
            $term = get_queried_object();
            $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
            $image_url = wp_get_attachment_url( $thumbnail_id );
            $parent_term = get_term_by( 'slug', 'cine-lenses', 'product_cat' );
            
            if ( $image_url ) {
                echo '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $term->name ) . '" />';
            } else {
                // Fallback image if no category image is set
                echo '<img src="assets/images/hero-bg-1.jpg" alt="Default Image" />';
            }
            $additional_category_content = get_field('additional_category_content', $term);
            $additional_title = $additional_category_content['additional_title'] ?? '';
            $additional_content = $additional_category_content['additional_content'] ?? '';
        }
        ?>
    </div>
    <div class="bannre__content">
        <div class="container">
            <div class="bannre__content__inner__wrapp">
                <h3>CREATE A KIT</h3>
                <h1><?php echo esc_html( $term->name ); ?></h1>
                <p><?php echo esc_html( $term->description ); ?></p>
                <div class="btn__wrapp btn__wrapp__scroller">
                    <a href="#start">
                        <div class="sigma__mousey">
                            <div class="sigma__scroller"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section__global__wrapp">
    <div class="container">
        <div class="breadcrumb__wrapp breadcrumb__wrapp__single">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                <?php if ( $parent_term ) : ?>
                <li><a href="<?php echo esc_url( get_term_link( $parent_term ) ); ?>"><?php echo esc_html( $parent_term->name ); ?></a></li>
                <?php endif; ?>
                <!-- <li>&nbsp;Lenses</li> -->
                <li><?php echo esc_html($term->name); ?></li>
            </ul>
        </div>
        <div id="start" class="global__heading__wrapp">
            <?php if (!empty($additional_title)): ?>
            <h2><?php echo esc_html( $additional_title ); ?></h2>
            <?php endif; ?>
            <?php if (!empty($additional_content)): ?>
            <?php echo  $additional_content; ?>
            <?php endif; ?>
        </div>
        <div class="lense__content__wrapp">
            <div class="product__list__category">
                <div class="product__list__wrapp__bgcolor">
                        <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                        <?php global $product; ?>
                    <div class="product__card">
                        <a href="<?php echo esc_url(get_permalink()); ?>">
                            <div class="image__box">
                            <?php if (has_post_thumbnail()) : ?>
                              <?php the_post_thumbnail('full'); ?>
                            <?php endif; ?>
                            </div>
                            <div class="content__box">
                                <h4><?php the_title(); ?></h4>
                                <p><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
                            </div>
                        </a>
                    </div>
                        <?php endwhile; ?>
                        <?php else : ?>
                        <p>No products found in this category.</p>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>