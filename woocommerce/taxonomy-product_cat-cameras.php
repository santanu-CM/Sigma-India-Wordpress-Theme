<?php
defined('ABSPATH') || exit;

get_header();

//do_action('woocommerce_before_main_content');
?>

<?php
$camera_category_page_content= get_field('camera_category_page_content','option');
?>
<!-- banner section -->
<div class="main__banner inner__banner__small__single">
    <div class="bannre__content">
        <div class="container">
            <div class="bannre__content__inner__wrapp">
                <?php if(!empty($camera_category_page_content['banner_title'])):?>
                <h1><?php echo esc_html($camera_category_page_content['banner_title']);?></h1>
                <?php endif;?>
                <?php if(!empty($camera_category_page_content['banner_content'])):?>
                <?php echo apply_filters('the_content',$camera_category_page_content['banner_content'] );?>
                <?php endif;?>
                <div class="btn__wrapp">
                    <a
                        href="<?php echo !empty($camera_category_page_content['label_buy_now_url'])?$camera_category_page_content['label_buy_now_url']:'#';?>">
                        <?php echo $camera_category_page_content['label_buy_now_title'];?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php if(!empty($camera_category_page_content['banner_image'])):?>
    <div class="image__box">
        <img src="<?php echo esc_url($camera_category_page_content['banner_image']);?>" alt="">
    </div>
    <?php endif;?>
</div>
<!-- compare section -->
<div id="start" class="section__global__wrapp camera__compare">
    <div class="container">
        <div class="global__heading__wrapp">
            <h3>Compare</h3>
            <h2>SIGMA fp vs fp L</h2>
        </div>
        <div class="product__wrapp">
            <ul class="nav nav-tabs nav__tabs" id="myTab" role="tablist">
                <li class="nav-item nav__item" role="presentation">
                    <button class="nav-link nav__link active" id="sigmafp-tab" data-bs-toggle="tab"
                        data-bs-target="#sigmafp" type="button" role="tab" aria-controls="sigmafp"
                        aria-selected="true">SIGMA fp</button>
                </li>
                <li class="nav-item nav__item" role="presentation">
                    <button class="nav-link nav__link" id="fpl-tab" data-bs-toggle="tab" data-bs-target="#fpl"
                        type="button" role="tab" aria-controls="fpl" aria-selected="false">SIGMA fp L</button>
                </li>
            </ul>
            <div class="tab-content tab__content" id="myTabContent">
                <div class="tab-pane tab__pane fade show active" id="sigmafp" role="tabpanel"
                    aria-labelledby="sigmafp-tab">

                    <div class="content__wrapp">
                        <div class="image__box">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/camera-fp.png" alt="" />
                        </div>
                        <div class="product__feature">
                            <h2>SIGMA fp </h2>
                            <div class="product__feature__inner">
                                <div class="feature__card__col">
                                    <div class="feature__card small__feature__card">
                                        <i class="ico__box">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/images/camera.svg"
                                                alt="" />
                                        </i>
                                        <div class="content__box">
                                            <p>Camera</p>
                                            <h3>SIGMA fp</h3>
                                        </div>
                                    </div>
                                    <div class="feature__card small__feature__card">
                                        <i class="ico__box">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/images/battery.svg"
                                                alt="" />
                                        </i>
                                        <div class="content__box">
                                            <p>Battery life</p>
                                            <h3>280 Shots</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="feature__card__col">
                                    <div class="feature__card small__feature__card">
                                        <i class="ico__box">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/images/camera.svg"
                                                alt="" />
                                        </i>
                                        <div class="content__box">
                                            <p>Megapixel</p>
                                            <h3>24.6MP</h3>
                                        </div>
                                    </div>
                                    <div class="feature__card small__feature__card">
                                        <i class="ico__box">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/images/battery.svg"
                                                alt="" />
                                        </i>
                                        <div class="content__box">
                                            <p>Brust Speed</p>
                                            <h3>18fps</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="feature__card__col">
                                    <div class="feature__card small__feature__card">
                                        <i class="ico__box">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/images/camera.svg"
                                                alt="" />
                                        </i>
                                        <div class="content__box">
                                            <p>Stills base ISO</p>
                                            <h3>100/640</h3>
                                        </div>
                                    </div>
                                    <div class="feature__card small__feature__card">
                                        <i class="ico__box">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/images/battery.svg"
                                                alt="" />
                                        </i>
                                        <div class="content__box">
                                            <p>Weight (Battery & card)</p>
                                            <h3>422gm</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="feature__card__col">
                                    <div class="feature__card small__feature__card">
                                        <i class="ico__box">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/images/camera.svg"
                                                alt="" />
                                        </i>
                                        <div class="content__box">
                                            <p>Crop Zoom function</p>
                                            <h3>No</h3>
                                        </div>
                                    </div>
                                    <div class="feature__card small__feature__card">
                                        <i class="ico__box">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/images/battery.svg"
                                                alt="" />
                                        </i>
                                        <div class="content__box">
                                            <p>Autofocus</p>
                                            <h3>Contrast</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn__wrapp">
                                <a href="#">Find Out More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane tab__pane fade" id="fpl" role="tabpanel" aria-labelledby="fpl-tab">
                    <div class="content__wrapp">
                        <div class="image__box">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/camera-fp.png" alt="" />
                        </div>
                        <div class="product__feature">
                            <h2>SIGMA fp L</h2>
                            <div class="product__feature__inner">
                                <div class="feature__card__col">
                                    <div class="feature__card small__feature__card">
                                        <i class="ico__box">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/images/camera.svg"
                                                alt="" />
                                        </i>
                                        <div class="content__box">
                                            <p>Camera</p>
                                            <h3>SIGMA fp</h3>
                                        </div>
                                    </div>
                                    <div class="feature__card small__feature__card">
                                        <i class="ico__box">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/images/battery.svg"
                                                alt="" />
                                        </i>
                                        <div class="content__box">
                                            <p>Battery life</p>
                                            <h3>280 Shots</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="feature__card__col">
                                    <div class="feature__card small__feature__card">
                                        <i class="ico__box">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/images/camera.svg"
                                                alt="" />
                                        </i>
                                        <div class="content__box">
                                            <p>Megapixel</p>
                                            <h3>24.6MP</h3>
                                        </div>
                                    </div>
                                    <div class="feature__card small__feature__card">
                                        <i class="ico__box">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/images/battery.svg"
                                                alt="" />
                                        </i>
                                        <div class="content__box">
                                            <p>Brust Speed</p>
                                            <h3>18fps</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="feature__card__col">
                                    <div class="feature__card small__feature__card">
                                        <i class="ico__box">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/images/camera.svg"
                                                alt="" />
                                        </i>
                                        <div class="content__box">
                                            <p>Stills base ISO</p>
                                            <h3>100/640</h3>
                                        </div>
                                    </div>
                                    <div class="feature__card small__feature__card">
                                        <i class="ico__box">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/images/battery.svg"
                                                alt="" />
                                        </i>
                                        <div class="content__box">
                                            <p>Weight (Battery & card)</p>
                                            <h3>422gm</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="feature__card__col">
                                    <div class="feature__card small__feature__card">
                                        <i class="ico__box">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/images/camera.svg"
                                                alt="" />
                                        </i>
                                        <div class="content__box">
                                            <p>Crop Zoom function</p>
                                            <h3>No</h3>
                                        </div>
                                    </div>
                                    <div class="feature__card small__feature__card">
                                        <i class="ico__box">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/images/battery.svg"
                                                alt="" />
                                        </i>
                                        <div class="content__box">
                                            <p>Autofocus</p>
                                            <h3>Contrast</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn__wrapp">
                                <a href="#">Find Out More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- sigma range section -->
<div class="section__global__wrapp section__global__with__bgcolor">
    <div class="container">
        <div class="global__heading__wrapp">
            <h3>Featured</h3>
            <?php if(!empty($camera_category_page_content['discover_the_sigma_title'])):?>
            <h2><?php echo esc_html($camera_category_page_content['discover_the_sigma_title']);?></h2>
            <?php endif;?>
        </div>
        <div class="two__col__wrapp">
            <div class="content__wrapp">
                <div class="accordion" id="accordionExample">
                    <?php if (!empty($camera_category_page_content['featured_details'])): ?>
                    <div class="accordion" id="accordionExample">
                        <?php foreach ($camera_category_page_content['featured_details'] as $index => $listing): ?>
                        <div class="accordion-item accordion__item">
                            <h2 class="accordion-header accordion__header" id="heading<?php echo $index; ?>">
                                <button
                                    class="accordion-button accordion__button <?php echo $index !== 0 ? 'collapsed' : ''; ?>"
                                    type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse<?php echo $index; ?>"
                                    aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>"
                                    aria-controls="collapse<?php echo $index; ?>">
                                    <?php echo esc_html($listing['title']); ?>
                                </button>
                            </h2>
                            <div id="collapse<?php echo $index; ?>"
                                class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>"
                                aria-labelledby="heading<?php echo $index; ?>" data-bs-parent="#accordionExample">
                                <div class="accordion-body accordion__body">
                                    <?php echo wp_kses_post($listing['content']); ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
            <?php if (!empty($camera_category_page_content['featured_image'])): ?>
            <div class="image__box">
                <img src="<?php echo esc_url($camera_category_page_content['featured_image']);?>" alt="">
            </div>
            <?php endif;?>
        </div>
    </div>
</div>
<!-- made in aizu section -->
<div class="cta__banner__wrapp cta__banner__wrapp__small">
    <?php if(!empty($camera_category_page_content['aizu_section_image'])):?>
    <div class="image__box">
        <img src="<?php echo esc_url($camera_category_page_content['aizu_section_image']);?>" alt="" />
    </div>
    <?php endif;?>
    <div class="content__wrapp">
        <div class="container">
            <div class="content__wrapp__inner">
                <div class="global__heading__wrapp">
                    <h3>MADE IN AIZU</h3>
                    <?php if(!empty($camera_category_page_content['aizu_title'])):?>
                    <h2><?php echo $camera_category_page_content['aizu_title'];?></h2>
                    <?php endif;?>
                </div>
                <div class="btn__wrapp">
                    <a
                        href="<?php echo !empty($camera_category_page_content['world_of_sigma_label_url'])?$camera_category_page_content['world_of_sigma_label_url']:'#';?>">
                        <?php echo $camera_category_page_content['world_of_sigma_label_title'];?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- gallery section -->
<div class="latest__reviews__wrapp pd__medium">
    <div class="container">
        <div class="title__content">
            <h3>Gallery</h3>
            <?php if(!empty($camera_category_page_content['our_image_gallery_title'])):?>
            <h2><?php echo $camera_category_page_content['our_image_gallery_title'];?></h2>
            <?php endif;?>
        </div>
    </div>
    <div class="reviews__slider">
        <?php if(!empty($camera_category_page_content['gallery'] )):?>
        <?php foreach($camera_category_page_content['gallery'] as $listing):?>
        <div class="review__slider__item">
            <?php if(!empty($listing['images'])):?>
            <div class="image__box">
                <img src="<?php echo $listing['images'];?>" alt="" />
            </div>
            <?php endif;?>
            <?php if(!empty($listing['title'])):?>
            <div class="content__wrapp">
                <h3><?php echo $listing['title'];?></h3>
            </div>
            <?php endif;?>
        </div>
        <?php endforeach;?>
        <?php endif;?>
    </div>
</div>
<!-- crop zoom section -->
<div class="crop__zoom__wrapp">
    <div class="bannre__content">
        <div class="container">
            <div class="bannre__content__inner__wrapp">
                <div class="global__heading__wrapp">
                    <h3>Crop Zoom</h3>
                    <?php if(!empty($camera_category_page_content['extra_reach_title'])):?>
                    <h2><?php echo esc_html($camera_category_page_content['extra_reach_title']);?></h2>
                    <?php endif;?>
                </div>
                <?php if(!empty($camera_category_page_content['extra_reach_title'])):?>
                <?php echo apply_filters('the_content',$camera_category_page_content['extra_reach_content'] );?>
                <?php endif;?>
            </div>
        </div>
    </div>
    <?php if(!empty($camera_category_page_content['extra_reach_section_image'])):?>
    <div class="image__box">
        <img src="<?php echo esc_url($camera_category_page_content['extra_reach_section_image']);?>" alt="" />
    </div>
    <?php endif;?>
</div>
<!-- l mount section -->
<div class="mount__lens__wrapp">
    <?php if(!empty($camera_category_page_content['extensive_lens_section_image'])):?>
    <div class="image__box">
        <img src="<?php echo esc_url($camera_category_page_content['extensive_lens_section_image']);?>" alt="" />
    </div>
    <?php endif;?>
    <div class="bannre__content">
        <div class="container">
            <div class="bannre__content__inner__wrapp">
                <div class="global__heading__wrapp">
                    <h3>L-Mount</h3>
                    <?php if(!empty($camera_category_page_content['extensive_lens_title'])):?>
                    <h2><?php echo esc_html($camera_category_page_content['extensive_lens_title']);?></h2>
                    <?php endif;?>
                </div>
                <?php if(!empty($camera_category_page_content['extensive_lens_content'])):?>
                <?php echo apply_filters('the_content',$camera_category_page_content['extensive_lens_content'] );?>
                <?php endif;?>
                <div class="btn__wrapp">
                    <a
                        href="<?php echo !empty($camera_category_page_content['see_mount_converter_label_url'])?$camera_category_page_content['see_mount_converter_label_url']:'#';?>">
                        <?php echo $camera_category_page_content['see_mount_converter_label_title'];?>
                    </a>
                    <a
                        href="<?php echo !empty($camera_category_page_content['view_lens_range_label_url'])?$camera_category_page_content['view_lens_range_label_url']:'#';?>">
                        <?php echo $camera_category_page_content['view_lens_range_label_title'];?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- color moodes section -->
<div class="section__global__wrapp color__modes__wrapp">
    <div class="container">
        <div class="global__heading__wrapp">
            <?php if(!empty($camera_category_page_content['color_mode_title'])):?>
            <h3><?php echo $camera_category_page_content['color_mode_title'];?></h3>
            <?php endif;?>
            <?php if(!empty($camera_category_page_content['color_mode_subtitle'])):?>
            <h2><?php echo $camera_category_page_content['color_mode_subtitle'];?></h2>
            <?php endif;?>
        </div>
        <?php echo apply_filters('the_content',$camera_category_page_content['color_mode_content'] );?>
        <div class="color__mode__crads">
            <?php if(!empty($camera_category_page_content['color_mode_details'])):?>
                <?php foreach($camera_category_page_content['color_mode_details'] as $listing):?>
                    <div class="color__mode__crad">
                        <?php if(!empty($listing['image'])):?>
                        <div class="image__box">
                            <img src="<?php echo $listing['image'];?>" alt="" />
                        </div>
                        <?php endif;?>
                        <?php if(!empty($listing['title'])):?>
                        <h3><?php echo $listing['title'];?></h3>
                        <?php endif;?>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
</div>

<?php
get_footer('shop');
?>