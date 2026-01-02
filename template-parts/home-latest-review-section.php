<?php
$home_field_content = get_field('home_field_content');
?>

<div class="latest__reviews__wrapp">
    <div class="container">
        <div class="title__content">
            <?php if(!empty($home_field_content['new_products_title'])):?>
            <h3><?php echo $home_field_content['new_products_title'];?></h3>
            <?php endif;?>
            <?php if(!empty($home_field_content['new_products_subtitle'])):?>
            <h2><?php echo $home_field_content['new_products_subtitle'];?></h2>
            <?php endif;?>
        </div>
    </div>
    <div class="reviews__slider">
        <?php
            $args = array(
                'category_name' => 'reviews',
                'posts_per_page' => 10,
                'orderby'        => 'date',
                'order'          => 'ASC'
            );

            $reviews_query = new WP_Query($args);

            if ($reviews_query->have_posts()) :
                while ($reviews_query->have_posts()) : $reviews_query->the_post();

                    $content = get_the_content();
         ?>
        <div class="review__slider__item">
            <?php if (!contains_youtube_url($content)) : ?>
            <div class="image__box">
                <a href="<?php the_permalink();?>">
                    <?php if (has_post_thumbnail()) {
                                the_post_thumbnail();
                            } else { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-img.png"
                        alt="Static Image" />
                    <?php } ?>
                </a>
            </div>
            <div class="content__wrapp">
                <a href="<?php the_permalink();?>">
                    <h3><?php the_title(); ?></h3>
                </a>
            </div>
            <?php else : ?>
            <?php
                    // Extract the YouTube URL
                    preg_match('/(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/(watch\?v=)?([a-zA-Z0-9\-_]+)/', $content, $matches);
                    $youtube_url = isset($matches[0]) ? $matches[0] : '';

                    if ($youtube_url) {
                        $youtube_id = $matches[5];
                        $embed_url = "https://www.youtube.com/embed/{$youtube_id}";
                    }
                    ?>
            <div class="image__box">
                <iframe width="100%" height="550" src="<?php echo esc_url($embed_url); ?>" title="<?php the_title(); ?>"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
              
            </div>
            <h3><?php the_title(); ?></h3>
            <?php endif; ?>
        </div>
        <?php
        endwhile;
        wp_reset_postdata();
    else :
    ?>
        <p>No reviews found.</p>
        <?php endif; ?>
    </div>
</div>

