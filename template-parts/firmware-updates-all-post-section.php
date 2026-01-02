<div class="no__bg__banner">
    <div class="container">
        <div class="breadcrumb__wrapp">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/'));?>">Home</a></li>
                <li><?php the_title();?></li>
            </ul>
        </div>
        <div class="global__heading__wrapp">
            <h1><?php the_title();?></h1>
        </div>
    </div>
</div>

<div class="review__wrapp">
    <div class="container">
        <div class="review__wrapp__inner">
            <?php
            $args = array(
                'category_name' => 'firmware-update', 
                'posts_per_page' => 9, 
            );

            $reviews_query = new WP_Query($args);

            if ($reviews_query->have_posts()) :
                while ($reviews_query->have_posts()) : $reviews_query->the_post();
         ?>
            <div class="review__card">
                <div class="image__box">
                    <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail();
                                    } else { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-img.png"
                        alt="Static Image" />
                    <?php } ?>
                </div>
                <div class="review__content__card">
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></p>
                    <a href="<?php the_permalink(); ?>">
                        Read more
                        <i class="icon__box">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-next-red.svg" alt="" />
                        </i>
                    </a>
                </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata(); // Reset post data
    else :
    ?>
            <p>No reviews found.</p>
            <?php
    endif;
    ?>
        </div>
    </div>
</div>
