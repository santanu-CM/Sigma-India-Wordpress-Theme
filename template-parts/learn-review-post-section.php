<?php
$learn_page_field_content= get_field('learn_page_field_content');
?>
<div class="watch__wrapp__full__width">
    <div class="container">
        <div class="watch__slider__wrapp">
            <div class="owl-carousel owl-theme watch__slider__list">
                <?php
            $args = array(
                'post_type' => 'post',
                'category_name' => 'reviews',
                'posts_per_page' => 8, // Adjust the number of posts to display
            );

            $reviews_query = new WP_Query($args);

            if ($reviews_query->have_posts()) :
                while ($reviews_query->have_posts()) : $reviews_query->the_post(); 
                    $content = get_the_content();
                    
                ?>
                <div class="item">
                    <div class="watch__item">
                        <a href="<?php the_permalink(); ?>">
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
                            <div class="watch__content__card">
                               <?php if (!contains_youtube_url($content)) : ?>
                                <div class="watch__meta">
                                    <?php echo get_the_date('j F Y'); ?>
                                </div>
                                <?php endif;?>
                                <?php if (!contains_youtube_url($content)) : ?>
                                <h3><?php the_title(); ?></h3>
                                <?php endif;?>
                                <p>
                                    <?php 
                                // Extract the YouTube URL
                                    $pattern = '/(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/(watch\?v=)?([a-zA-Z0-9\-_]+)/';
                                    preg_match($pattern, $content, $matches);
                                    $youtube_url = isset($matches[0]) ? $matches[0] : '';

                                    if ($youtube_url) {
                                        $youtube_id = $matches[5];
                                        $embed_url = "https://www.youtube.com/embed/{$youtube_id}";
										echo'<div class="image__box">';
                                        echo '<iframe width="419" height="300" src=" ' . esc_url($embed_url) . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
										echo'</div>';
                                        //echo '<div class="embed-responsive embed-responsive-4by3"><iframe class="embed-responsive-item" src="' . esc_url($embed_url) . '" allowfullscreen></iframe></div>';
                                        echo '<div class="watch__meta">';
                                        echo get_the_date('j F Y');
                                        echo '</div>';
                                        the_title('<h3>','</h3>');
                                    } else {
                                        echo wp_trim_words(get_the_excerpt(), 20, '...'); 
                                    }
                                    ?>
                                    <?php if (!contains_youtube_url($content)) : ?>
                                    <i class="ico__box">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-next-red.svg"
                                            alt="Next Arrow" />
                                    </i>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                <?php 
            endwhile;
            wp_reset_postdata();
        else : ?>
                <p>No reviews found.</p>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <div class="btn__wrapp">
        <a href="<?php echo !empty($learn_page_field_content['label_more_video_url'])?$learn_page_field_content['label_more_video_url']:'#';?>">
           <?php echo $learn_page_field_content['label_more_video_title'];?>
        </a>
    </div>
</div>