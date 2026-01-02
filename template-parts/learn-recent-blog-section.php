<?php
$learn_page_field_content= get_field('learn_page_field_content');
?>
<div class="section__global__wrapp">
    <div class="container">
        <div class="global__heading__wrapp">
            <?php if(!empty($learn_page_field_content['blogs_title'])):?>
            <h3><?php echo $learn_page_field_content['blogs_title'];?></h3>
            <?php endif;?>
            <?php if(!empty($learn_page_field_content['lates_blogs_title'])):?>
            <h2><?php echo $learn_page_field_content['lates_blogs_title'];?></h2>
            <?php endif;?>
        </div>
        <div class="blog__list__wrapp">
            <div class="owl-carousel owl-theme blog__list__slider__two">
                <?php
                    $recent_posts_query = new WP_Query( array(
                    'posts_per_page' => 10, 
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
<!--            <div class="btn__wrapp">
                <a href="<?php //echo !empty($learn_page_field_content['label_see_more_url'])?$learn_page_field_content['label_see_more_url']:'#';?> ">
                  <?php //echo $learn_page_field_content['label_see_more_title'];?>
                </a>
            </div> -->
			<div class="d-flex justify-content-center mt-5">
				<a href="<?php echo !empty($learn_page_field_content['label_see_more_url']) ? $learn_page_field_content['label_see_more_url'] : '#'; ?>" 
				   class="btn btn-secondary">
				   <?php echo $learn_page_field_content['label_see_more_title']; ?>
				</a>
			</div>
        </div>
    </div>
</div>
