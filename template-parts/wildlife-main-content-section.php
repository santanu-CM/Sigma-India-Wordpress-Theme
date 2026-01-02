<?php
$common_genre_page_content= get_field('common_genre_page_content');
?>
<div class="main__banner inner__banner__main inner__banner__large inner__banner__large__single">
    <?php if(!empty($common_genre_page_content['banner_image'])):?>
    <div class="image__box">
        <img src="<?php echo $common_genre_page_content['banner_image'];?>" alt="" />
    </div>
    <?php endif;?>
    <div class="bannre__content">
        <div class="container">
            <div class="bannre__content__inner__wrapp">
                <?php if(!empty($common_genre_page_content['banner_title'])):?>
                <h3><?php echo $common_genre_page_content['banner_title'];?></h3>
                <?php endif;?>
                <?php if(!empty($common_genre_page_content['banner_subtitle'])):?>
                <h1><?php echo $common_genre_page_content['banner_subtitle'];?></h1>
                <?php endif;?>
                <?php echo apply_filters('the_content',$common_genre_page_content['banner_content'] );?>
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
<!-- First Section Start -->
<div id="start" class="section__global__wrapp landscape__page__wrapp">
    <div class="container">
        <div class="breadcrumb__wrapp">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/'));?>">Home</a></li>
                <li><?php the_title();?></li>
            </ul>
        </div>
        <?php if(!empty($common_genre_page_content['first_section_title'])):?>
        <div class="global__heading__wrapp">
            <h2><?php echo $common_genre_page_content['first_section_title'];?></h2>
        </div>
        <?php endif;?>
        <div class="content__wrapp">
            <?php echo apply_filters('the_content',$common_genre_page_content['first_section_content'] );?>
        </div>
        <div class="image__wrapp">
            <?php foreach($common_genre_page_content['first_section_gallery'] as $listing):?>
            <?php if(!empty($listing['image'])):?>
            <div class="image__box">
                <img src="<?php echo $listing['image'];?>" alt="" />
            </div>
            <?php endif;?>
            <?php if(!empty($listing['caption'])):?>
            <div class="image__caption">
                <p><?php echo $listing['caption'];?></p>
            </div>
            <?php endif;?>
            <?php endforeach;?>
        </div>
    </div>
</div>
<!-- First Section End -->

 <!-- Second Section Start -->
<div class="section__global__wrapp lenses__consider">
    <div class="container">
        <?php if(!empty($common_genre_page_content['second_section_title'])):?>
        <div class="global__heading__wrapp">
            <h2><?php echo $common_genre_page_content['second_section_title'];?></h2>
        </div>
        <?php endif;?>
        <div class="lenses__consider__cards">
             <?php
                $terms = get_terms(array(
                    'taxonomy' => 'pa_mount',
                    'hide_empty' => false,
                ));
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 3, 
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug',
                            'terms'    => 'art', 
                            'operator' => 'IN',
                            'include_children' => true, 
                        ),
                    ),
                );

                // The query
                $loop = new WP_Query($args);
                // The loop to display products
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        global $product;
             ?>
            <div class="item__card">
                <!-- <div class="image__box">
                    <img src="assets/images/lense-consider-1.jpg" alt="" />
                </div> -->
                <div class="content__wrapp">
                    <i class="icon__box">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/art-icon-grey-1.svg" alt="" />
                    </i>
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo wp_trim_words($product->get_short_description(), 20, '...'); ?></p>
                </div>
                <div class="image__box product__image__box">
                    <?php echo woocommerce_get_product_thumbnail(); ?>
                </div>
                <div class="btn__wrapp">
                    <a href="<?php echo get_permalink(); ?>">View Details</a>
                </div>
            </div>
            <?php
                    endwhile;
                } else {
                    echo __('No products found');
                }

                // Restore original post data
                wp_reset_postdata();
            ?>
        </div>
        <div class="btn__wrapp">
            <a href="<?php echo !empty($common_genre_page_content['second_view_the_range_url']) ? $common_genre_page_content['second_view_the_range_url']:'#';?> ">
              <?php echo $common_genre_page_content['second_view_the_range_label'];?>
            </a>
        </div>
    </div>
</div>
 <!-- Second Section End -->

<!-- Third Section Start -->
<div class="section__global__wrapp landscape__page__wrapp">
    <div class="container">
        <?php if(!empty($common_genre_page_content['third_section_title'])):?>
        <div class="global__heading__wrapp">
            <h2><?php echo $common_genre_page_content['third_section_title'];?></h2>
        </div>
        <?php endif;?>
        <div class="content__wrapp">
            <?php echo apply_filters('the_content',$common_genre_page_content['third_section_content'] );?>
        </div>
        <div class="image__wrapp">
            <?php foreach($common_genre_page_content['third_section_gallery'] as $listing):?>
            <?php if(!empty($listing['image'])):?>
            <div class="image__box">
                <img src="<?php echo $listing['image'];?>" alt="" />
            </div>
            <?php endif;?>
            <?php if(!empty($listing['caption'])):?>
            <div class="image__caption">
                <p><?php echo $listing['caption'];?></p>
            </div>
            <?php endif;?>
            <?php endforeach;?>
        </div>
    </div>
</div>
<!-- Third Section End -->

<!-- Fourth Section Start -->
<div class="section__global__wrapp lenses__consider">
    <div class="container">
       <?php if(!empty($common_genre_page_content['fourth_section_title'])):?>
        <div class="global__heading__wrapp">
            <h2><?php echo $common_genre_page_content['fourth_section_title'];?></h2>
        </div>
        <?php endif;?>
        <div class="lenses__consider__cards">
             <?php
                $terms = get_terms(array(
                    'taxonomy' => 'pa_mount',
                    'hide_empty' => false,
                ));
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 3, 
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug',
                            'terms'    => 'art', 
                            'operator' => 'IN',
                            'include_children' => true, 
                        ),
                    ),
                );

                // The query
                $loop = new WP_Query($args);
                // The loop to display products
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        global $product;
             ?>
            <div class="item__card">
                <!-- <div class="image__box">
                    <img src="assets/images/lense-consider-1.jpg" alt="" />
                </div> -->
                <div class="content__wrapp">
                    <i class="icon__box">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/art-icon-grey-1.svg" alt="" />
                    </i>
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo wp_trim_words($product->get_short_description(), 20, '...'); ?></p>
                </div>
                <div class="image__box product__image__box">
                    <?php echo woocommerce_get_product_thumbnail(); ?>
                </div>
                <div class="btn__wrapp">
                    <a href="<?php echo get_permalink(); ?>">View Details</a>
                </div>
            </div>
            <?php
                    endwhile;
                } else {
                    echo __('No products found');
                }

                // Restore original post data
                wp_reset_postdata();
            ?>
        </div>
        <div class="btn__wrapp">
            <a href="<?php echo !empty($common_genre_page_content['fourth_view_the_range_url']) ? $common_genre_page_content['fourth_view_the_range_url']:'#';?> ">
              <?php echo $common_genre_page_content['fourth_view_the_range_label'];?>
            </a>
        </div>
    </div>
</div>
<!-- Fourth Section End -->

<!-- Fifth Section Start -->
<div class="section__global__wrapp landscape__page__wrapp">
    <div class="container">
        <?php if(!empty($common_genre_page_content['fifth_section_title'])):?>
        <div class="global__heading__wrapp">
            <h2><?php echo $common_genre_page_content['fifth_section_title'];?></h2>
        </div>
        <?php endif;?>
        <div class="content__wrapp">
            <?php echo apply_filters('the_content',$common_genre_page_content['fifth_section_content'] );?>
        </div>
        <div class="image__wrapp">
            <?php foreach($common_genre_page_content['fifth_section_gallery'] as $listing):?>
            <?php if(!empty($listing['image'])):?>
            <div class="image__box">
                <img src="<?php echo $listing['image'];?>" alt="" />
            </div>
            <?php endif;?>
            <?php if(!empty($listing['caption'])):?>
            <div class="image__caption">
                <p><?php echo $listing['caption'];?></p>
            </div>
            <?php endif;?>
            <?php endforeach;?>
        </div>
    </div>
</div>
<!-- Fifth Section End -->

<!-- Sixth Section Start -->
<div class="section__global__wrapp lenses__consider">
    <div class="container">
       <?php if(!empty($common_genre_page_content['sixth_section_title'])):?>
        <div class="global__heading__wrapp">
            <h2><?php echo $common_genre_page_content['sixth_section_title'];?></h2>
        </div>
        <?php endif;?>
        <div class="lenses__consider__cards">
             <?php
                $terms = get_terms(array(
                    'taxonomy' => 'pa_mount',
                    'hide_empty' => false,
                ));
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 3, 
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug',
                            'terms'    => 'art', 
                            'operator' => 'IN',
                            'include_children' => true, 
                        ),
                    ),
                );

                // The query
                $loop = new WP_Query($args);
                // The loop to display products
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        global $product;
             ?>
            <div class="item__card">
                <!-- <div class="image__box">
                    <img src="assets/images/lense-consider-1.jpg" alt="" />
                </div> -->
                <div class="content__wrapp">
                    <i class="icon__box">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/art-icon-grey-1.svg" alt="" />
                    </i>
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo wp_trim_words($product->get_short_description(), 20, '...'); ?></p>
                </div>
                <div class="image__box product__image__box">
                    <?php echo woocommerce_get_product_thumbnail(); ?>
                </div>
                <div class="btn__wrapp">
                    <a href="<?php echo get_permalink(); ?>">View Details</a>
                </div>
            </div>
            <?php
                    endwhile;
                } else {
                    echo __('No products found');
                }

                // Restore original post data
                wp_reset_postdata();
            ?>
        </div>
        <div class="btn__wrapp">
            <a href="<?php echo !empty($common_genre_page_content['sixth_view_the_range_url']) ? $common_genre_page_content['sixth_view_the_range_url']:'#';?> ">
              <?php echo $common_genre_page_content['sixth_view_the_range_label'];?>
            </a>
        </div>
    </div>
</div>
<!-- Sixth Section End -->

<!-- Sevent Section Start -->
<!-- <div class="section__global__wrapp lenses__video__wrapp">
    <div class="container">
        <div class="two__col__wrapp">
            <div class="video__box">
                <?php //if(!empty($common_genre_page_content['seventh_section_video_button_image'])):?>
                <a class="video__player" href="#">
                    <img src="<?php //echo $common_genre_page_content['seventh_section_video_button_image'];?>" alt="">
                </a>
                <?php //endif;?>
                <?php //if(!empty($common_genre_page_content['seventh_section_image'])):?>
                <img src="<?php //echo $common_genre_page_content['seventh_section_image'];?>" alt="" />
                <?php //endif;?>
            </div>
            <div class="content__wrapp">
                <div class="global__heading__wrapp">
                    <?php //if(!empty($common_genre_page_content['seventh_section_title'])):?>
                    <h3><?php //echo $common_genre_page_content['seventh_section_title'];?></h3>
                    <?php //endif;?>
                    <?php //if(!empty($common_genre_page_content['seventh_section_subtitle'])):?>
                    <h2><?php //echo $common_genre_page_content['seventh_section_subtitle'];?></h2>
                    <?php //endif;?>
                </div>
                <?php //echo apply_filters('the_content',$common_genre_page_content['seventh_section_content'] );?>
            </div>
        </div>
    </div>
</div> -->
<!-- Sevent Section End -->