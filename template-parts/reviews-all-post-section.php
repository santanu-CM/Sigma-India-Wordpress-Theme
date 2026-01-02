<?php
$reviews_page_field_content = get_field('reviews_page_field_content');
?>
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
        <div class="vodeo__review__wrapp">
            <div class="video__palayer">

                <?php
                $youtubeUrl = $reviews_page_field_content['reviews_youtube_url'];
                $videoId = null;
                // Check if it's a short URL (youtu.be)
                if (strpos($youtubeUrl, 'youtu.be') !== false) {
                    $parts = explode('/', $youtubeUrl);
                    $videoId = end($parts);
                } else {
                    // Parse the URL to extract query parameters
                    $urlParts = parse_url($youtubeUrl);
                    if (isset($urlParts['query'])) {
                        parse_str($urlParts['query'], $queryParameters);
                        // Check if 'v' parameter exists
                        if (isset($queryParameters['v'])) {
                            $videoId = $queryParameters['v'];
                        }
                    }
                }
            ?>
            
                <iframe width="100%" height="630" src="https://www.youtube.com/embed/<?php echo $videoId; ?>"
                    title="Review of SIGMA 70-200mm F2.8 DG DN OS Sports lens | Review by Basith Paykat #sigma"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
            <?php if(!empty($reviews_page_field_content['reviews_title'])):?>
            <h3 class="mt-4"><?php echo $reviews_page_field_content['reviews_title'];?></h3>
            <?php endif;?>
        </div>
        <div class="review__wrapp__inner mt-5">
            <?php
            $args = array(
                'category_name' => 'reviews', 
                'posts_per_page' => 9, 
            );

            $reviews_query = new WP_Query($args);

            if ($reviews_query->have_posts()) :
                while ($reviews_query->have_posts()) : $reviews_query->the_post();

             $content = get_the_content();

         ?>
            <div class="review__card">
               <?php if (!contains_youtube_url($content)) : ?>
                <div class="image__box">
                    <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail();
                                    } else { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-img.png"
                        alt="Static Image" />
                    <?php } ?>
                </div>
                <?php endif;?>
                <div class="review__content__card">
                <?php
                if (contains_youtube_url($content)) {
                    // Extract the YouTube URL
                    $pattern = '/(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/(watch\?v=)?([a-zA-Z0-9\-_]+)/';
                    preg_match($pattern, $content, $matches);
                    $youtube_url = isset($matches[0]) ? $matches[0] : '';

                    if ($youtube_url) {
                        $youtube_id = $matches[5];
                        $embed_url = "https://www.youtube.com/embed/{$youtube_id}";
                        ?>
                        <div class="image__box">
                        <iframe width="100%" height="400" src="<?php echo esc_url($embed_url); ?>" title="<?php the_title(); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <h3><?php the_title(); ?></h3>
                        <?php
                    } else {
                        // Fallback if URL extraction fails
                        echo apply_filters('the_content', $content);
                        ?>
                        <h3><?php the_title(); ?></h3>
                        <?php
                    }
                } else {
                    the_title('<h3>','</h3>');
                    the_excerpt();
                    ?>
                    <?php
                }
                ?>
                    <!-- <p><?php //echo wp_trim_words(get_the_content(), 20, '...'); ?></p> -->
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



