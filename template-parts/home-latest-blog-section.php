<?php
$home_field_content = get_field('home_field_content');
?>

<div class="latest__blog__wrapp">
    <div class="container">
        <div class="latest__blog__wrapp__inner">
                <div class="title__content">
					<div class="content__wrapp">
                <?php if(!empty($home_field_content['blog_title'])):?>
                <h3><?php echo $home_field_content['blog_title'];?></h3>
                <?php endif;?>
                <?php if(!empty($home_field_content['blog_subtitle'])):?>
                <h2><?php echo $home_field_content['blog_subtitle'];?></h2>
                <?php endif;?>
                <?php if(!empty($home_field_content['blog_description_content'])):?>
                <?php echo apply_filters('the_content', $home_field_content['blog_description_content']);?>
                <?php endif;?>
                <?php if(!empty($home_field_content['see_all_label_title'])):?>
						</div>
                <div class="btn__wrapp">
                    <a href="<?php echo !empty($home_field_content['see_all_label_url']) ? $home_field_content['see_all_label_url']:'#';?> ">
                        <?php echo $home_field_content['see_all_label_title'];?>
                    </a>
                </div>
                <?php endif;?>
            </div>
            <div class="blog__list__wrapp">
                <div class="owl-carousel owl-theme blog__list__slider">
                    <?php
                        $recent_posts_query = new WP_Query( array(
                        'posts_per_page' => 3, 
                        'ignore_sticky_posts' => true,
                        'orderby'        => 'date', // Order by date
                        'order'          => 'DESC' // Most recent first
                        
                        ) );

                        if ( $recent_posts_query->have_posts() ) : 
                            while ( $recent_posts_query->have_posts() ) : $recent_posts_query->the_post(); 
                    ?>
                    <div class="item">
                        <div class="blog__card">
                            <a href="<?php the_permalink(); ?>">
                                <div class="image__box">
                                    <div class="blog__meta"><?php the_time('d F Y'); ?></div>
                                    <?php if ( has_post_thumbnail() ) : ?>
                                     <img src="<?php the_post_thumbnail_url(); ?>" alt="" />
                                    <?php  endif;?>
                                </div>
                            </a>
                            <a href="<?php the_permalink(); ?>">
                                <h3><?php the_title(); ?></h3>
                                <?php the_excerpt();?>
                            </a>
                            <div class="link__wrapp">
                                <a href="<?php the_permalink(); ?>">READ MORE <i class="ico__box"><img src="<?php echo get_template_directory_uri();?>/assets/images/red-arrow.svg"
                                            alt=""></i></a>
                            </div>
                        </div>
                    </div>
                    <?php 
                    endwhile;
                    wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>