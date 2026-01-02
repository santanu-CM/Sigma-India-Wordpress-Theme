<?php
defined('ABSPATH') || exit;

get_header();

//do_action('woocommerce_before_main_content');
?>

<?php
$cine_lenses_category_page_content= get_field('cine_lenses_category_page_content','option');
?>
<div class="main__banner inner__banner__main inner__banner__main__single">
    <?php if(!empty($cine_lenses_category_page_content['banner_image'])):?>
    <div class="image__box">
        <img src="<?php echo $cine_lenses_category_page_content['banner_image'];?>" alt="" />
    </div>
    <?php endif;?>
    <div class="bannre__content bannre__content__nobg">
        <div class="container">
            <div class="bannre__content__inner__wrapp">
                <?php if(!empty($cine_lenses_category_page_content['banner_title'])):?>
                <h3><?php echo $cine_lenses_category_page_content['banner_title'];?></h3>
                <?php endif;?>
                <?php if(!empty($cine_lenses_category_page_content['beyound_tech_image'])):?>
                <img src="<?php echo $cine_lenses_category_page_content['beyound_tech_image'];?>" alt="" />
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<div class="section__global__wrapp explore__range">
    <div class="container">
        <div class="breadcrumb__wrapp">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/'));?>">Home</a></li>
                <?php
                // Display category title
				 if ( is_product_category() ) {
					$term = get_queried_object();
                  }?>
                <li><?php echo esc_html( $term->name );?></li>
            </ul>
        </div>
        <div class="global__heading__wrapp">
            <h2>Explore the range</h2>
        </div>
        <div class="explore__range__product__wrapp">
            <?php foreach($cine_lenses_category_page_content['category_details'] as $listing):?>
            <div class="producr__card">
                <a href="<?php echo !empty($listing['url']) ? $listing['url']:'#';?>">
                    <?php if(!empty($listing['image'])):?>
                    <div class="image__box">
                        <img src="<?php echo $listing['image'];?>" alt="" />
                    </div>
                    <?php endif;?>
                    <?php if(!empty($listing['title'])):?>
                    <h3><?php echo $listing['title'];?></h3>
                    <?php endif;?>
                </a>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<div class="section__global__wrapp optical__expertise">
    <div class="container">
        <div class="two__col__wrapp">
            <div class="content__wrapp">
                <?php if(!empty($cine_lenses_category_page_content['optical_expertise_title'])):?>
                <div class="global__heading__wrapp">
                    <h2><?php echo $cine_lenses_category_page_content['optical_expertise_title'];?></h2>
                </div>
                <?php endif;?>
                <?php echo apply_filters('the_content',$cine_lenses_category_page_content['optical_expertise_content']);?>
            </div>
            <?php if(!empty($cine_lenses_category_page_content['optical_across_image'])):?>
            <div class="image__box">
                <img src="<?php echo $cine_lenses_category_page_content['optical_across_image'];?>" alt="" />
            </div>
            <?php endif;?>
        </div>
        <div class="product__featured__wrapp">
            <?php foreach($cine_lenses_category_page_content['featured_details'] as $listing):?>
            <div class="featured__card">
                <?php if(!empty($listing['title'])):?>
                <h3><?php echo $listing['title'];?></h3>
                <?php endif;?>
                <?php echo apply_filters('the_content', $listing['content']);?>
            </div>
            <?php endforeach;?> 
        </div>
    </div>
</div>
<div class="section__global__wrapp section__global__with__bcolor optical__design">
    <div class="container">
        <div class="two__col__wrapp">
            <?php if(!empty($cine_lenses_category_page_content['100_new_image'])):?>
            <div class="image__box">
                <img src="<?php echo $cine_lenses_category_page_content['100_new_image'];?>" alt="" />
            </div>
            <?php endif;?>
            <div class="content__wrapp">
                <?php echo apply_filters('the_content',$cine_lenses_category_page_content['100_new_across_content'] );?>
            </div>
        </div>
    </div>
</div>
<div class="cta__banner__wrapp cta__banner__large__high">
    <?php if(!empty($cine_lenses_category_page_content['made_in_aizu_image'])):?>
    <div class="image__box">
        <img src="<?php echo $cine_lenses_category_page_content['made_in_aizu_image'];?>" alt="" />
    </div>
    <?php endif;?>
    <div class="content__wrapp content__wrapp__nobg">
        <div class="container">
            <div class="content__wrapp__inner">
                <?php if(!empty($cine_lenses_category_page_content['made_in_aizu_title'])):?>
                <div class="global__heading__wrapp">
                    <h2><?php echo $cine_lenses_category_page_content['made_in_aizu_title'];?></h2>
                </div>
                <?php endif;?>
                <?php echo apply_filters('the_content',$cine_lenses_category_page_content['made_in_aizu_content']);?>
            </div>
        </div>
    </div>
</div>

<div class="section__global__wrapp">
    <?php if(!empty($cine_lenses_category_page_content['optically_excellent_title'])):?>
    <div class="blockquot__wrapp blockquot__wrapp__text__center">
        <h2><?php echo $cine_lenses_category_page_content['optically_excellent_title'];?></h2>
    </div>
    <?php endif;?>
</div>
<div class="cta__banner__wrapp cta__banner__wrapp__medium__high">
    <?php if(!empty($cine_lenses_category_page_content['powerfull_image'])):?>
    <div class="image__box">
        <img src="<?php echo $cine_lenses_category_page_content['powerfull_image'];?>" alt="" />
    </div>
    <?php endif;?>
    <div class="content__wrapp content__wrapp__nobg">
        <div class="container">
            <div class="content__wrapp__inner">
                <?php if(!empty($cine_lenses_category_page_content['powerfull_title'])):?>
                <div class="global__heading__wrapp">
                    <h2><?php echo $cine_lenses_category_page_content['powerfull_title'];?></h2>
                </div>
                <?php endif;?>
                <?php echo apply_filters('the_content',$cine_lenses_category_page_content['powerfull_content']);?>
            </div>
        </div>
    </div>
</div>
<div class="section__global__wrapp flexible__mount">
    <div class="container">
        <?php if(!empty($cine_lenses_category_page_content['flexible_mount_title'])):?>
        <div class="global__heading__wrapp">
            <h2><?php echo $cine_lenses_category_page_content['flexible_mount_title'];?></h2>
        </div>
        <?php endif;?>
        <?php echo apply_filters('the_content',$cine_lenses_category_page_content['flexible_mount_content'] );?>
        <div class="flexible__mount__product__wrapp">
            <?php foreach($cine_lenses_category_page_content['mount_details'] as $listing):?>
            <div class="flexible__mount__product__card">
                <?php if(!empty($listing['image'])):?>
                <div class="image__box">
                    <img src="<?php echo $listing['image'];?>" alt="" />
                </div>
                <?php endif;?>
                <div class="content__wrapp">
                    <?php if(!empty($listing['title'])):?>
                    <h3><?php echo $listing['title'];?></h3>
                    <?php endif;?>
                    <?php echo apply_filters('the_content', $listing['content']);?>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<div class="section__global__wrapp mount__conversion">
    <div class="container">
        <?php if(!empty($cine_lenses_category_page_content['mount_conversion_title'])):?>
        <div class="global__heading__wrapp">
            <h2><?php echo $cine_lenses_category_page_content['mount_conversion_title'];?></h2>
        </div>
        <?php endif;?>
        <?php echo apply_filters('the_content',$cine_lenses_category_page_content['mount_conversion_content'] );?>
    </div>
    <?php if(!empty($cine_lenses_category_page_content['mount_conversion_image'])):?>
    <div class="image__box">
        <img src="<?php echo $cine_lenses_category_page_content['mount_conversion_image'];?>" alt="" />
    </div>
    <?php endif;?>
</div>
<div class="section__global__wrapp camera__compare camera__compare__inner">
    <div class="container">
        <div class="global__heading__wrapp">
            <?php if(!empty($cine_lenses_category_page_content['two_cine_prime_title'])):?>
            <h3><?php echo $cine_lenses_category_page_content['two_cine_prime_title'];?></h3>
            <?php endif;?>
            <?php if(!empty($cine_lenses_category_page_content['two_cine_prime_subtitle'])):?>
            <h2><?php echo $cine_lenses_category_page_content['two_cine_prime_subtitle'];?></h2>
            <?php endif;?>
        </div>
        <div class="content__wrapp">
            <?php echo apply_filters('the_content',$cine_lenses_category_page_content['two_cine_prime_subtitle_content'] );?>
        </div>
        <div class="camera__wrapp">
            <div class="content__wrapp">
                <?php if(!empty($cine_lenses_category_page_content['cine_lens_first_image'])):?>
                <div class="image__box">
                    <img src="<?php echo $cine_lenses_category_page_content['cine_lens_first_image'];?>" alt="" />
                </div>
                <?php endif;?>
                <div class="featured__wrapp">
                    <div class="featur__inner">
                        <p>Name of line</p>
                        <h4>FF High Speed Primes</h4>
                        <p>Lenses in range</p>
                        <h4>11</h4>
                        <p>Mount options</p>
                        <h4>3</h4>
                        <p>Luminous option</p>
                        <h4>Yes</h4>
                        <p>Markings</p>
                        <h4>Metric or imperial</h4>
                        <p>Lens coating</p>
                        <h4>Super Multi-layer Coating</h4>
                        <p>Maximum T-stop values</p>
                        <h4>T1.5 – T2.5</h4>
                    </div>
                    <div class="btn__wrapp">
                        <a href="https://www.sigmaindia.in/product-category/cine-lenses/ff-high-speed-prime-line/">View Range</a>
                    </div>
                </div>
            </div>
            <div class="content__wrapp">
                <?php if(!empty($cine_lenses_category_page_content['cine_lens_second_image'])):?>
                <div class="image__box">
                    <img src="<?php echo $cine_lenses_category_page_content['cine_lens_second_image'];?>" alt="" />
                </div>
                <?php endif;?>
                <div class="featured__wrapp">
                    <div class="featur__inner">
                        <p>FF Classic Primes</p>
                        <h4>FF High Speed Primes</h4>
                        <p>Lenses in range</p>
                        <h4>11</h4>
                        <p>Mount options</p>
                        <h4>1</h4>
                        <p>Luminous option</p>
                        <h4>No</h4>
                        <p>Markings</p>
                        <h4>Metric or imperial</h4>
                        <p>Lens coating</p>
                        <h4>Recoated</h4>
                        <p>Maximum T-stop values</p>
                        <h4>T2.5 – T3.2</h4>
                    </div>
                    <div class="btn__wrapp">
                        <a href="https://www.sigmaindia.in/product-category/cine-lenses/ff-classic-prime-line/">View Range</a>
                    </div>
                </div>
            </div>
        </div>
<!--         <div class="video__wrapp">
            <?php /*if(!empty($cine_lenses_category_page_content['classic_vs_regular_title'])):?>
            <h3><?php echo $cine_lenses_category_page_content['classic_vs_regular_title'];?></h3>
            <?php endif;?>
            <?php echo apply_filters('the_content',$cine_lenses_category_page_content['classic_vs_regular_content'] );?>
            <div class="two__col__video__wrap">
                <?php foreach($cine_lenses_category_page_content['sample_footage_details'] as $listing):?>
                <div class="vodeo__holder">
                    <div class="image__box">
                        <a class="video__player" href="#">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/button-play-video.svg" alt="" />
                        </a>
                        <?php if(!empty($listing['image'])):?>
                        <img src="<?php echo $listing['image'];?>" alt="" />
                        <?php endif;?>
                    </div>
                    <?php if(!empty($listing['captions'])):?>
                    <div class="caption"><?php echo $listing['captions'];?></div>
                    <?php endif;?>
                </div>
                <?php endforeach;*/?>
            </div>
        </div> -->
    </div>
</div>

<?php
get_footer('shop');
?>