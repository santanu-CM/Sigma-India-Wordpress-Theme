<?php
$ambassadors_page_content = get_field('ambassadors_page_content');
?>
<div id="start" class="section__global__wrapp">
    <div class="container">
        <div class="breadcrumb__wrapp breadcrumb__wrapp__body">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/'));?>">Home</a></li>
                <li><?php the_title();?></li>
            </ul>
        </div>
        <div class="global__heading__wrapp">
            <?php if(!empty($ambassadors_page_content['sigma_ambassadors_title'])):?>
            <h2><?php echo $ambassadors_page_content['sigma_ambassadors_title'];?></h2>
            <?php endif;?>
            <?php echo apply_filters('the_content',$ambassadors_page_content['sigma_ambassadors_content']);?>
        </div>

        <div class="ambassador__wrapp">
            <?php
                    $args = array(  
                    'post_type' => 'ambassadors',
                    'post_status' => 'publish',
                    'posts_per_page' => 6, 
            );
                $loop = new WP_Query( $args ); 
                while ( $loop->have_posts() ) : $loop->the_post(); 
             ?>
            <div class="ambassador__card">
               <?php if (has_post_thumbnail()): ?>
                <div class="image__box">
                   <?php the_post_thumbnail();?>
                </div>
                <?php endif;?>
                <div class="card__content">
                    <h3><?php the_title();?></h3>
                    <?php the_excerpt();?>
                    <div class="read__more">
                        <a href="<?php echo the_permalink(); ?>">
                            <?php echo __('Read more', 'sigmaindia'); ?>
                            <i class="icon__box">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-next-red.svg" alt="" />
                            </i>
                        </a>
                    </div>
                    <?php 
                    $ambassadors_post_content = get_field('ambassadors_post_content');
                    ?>
                    <?php if(!empty($ambassadors_post_content['social_details'])):?>
                    <div class="share__link">
                        <ul>
                            <?php foreach($ambassadors_post_content['social_details'] as $listing):?>
                            <li>
                                <a href="<?php echo $listing['url'];?>" target="_blank">
                                    <i class="icon__box">
                                     <img src="<?php echo $listing['icon'];?>" alt="" />
                                   </i>
                                </a>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <?php endif;?>
                </div>
            </div>
            <?php 
               endwhile;
               wp_reset_query();
             ?>
        </div>
    </div>
</div>