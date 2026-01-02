<?php
$mount_conversion_service_page_content = get_field('mount_conversion_service_page_content');
?>

<div class="main__banner inner__banner__main inner__banner__small inner__banner__small__left__align">
    <?php if(!empty($mount_conversion_service_page_content['banner_image'])):?>
    <div class="image__box">
        <img src="<?php echo $mount_conversion_service_page_content['banner_image'];?>" alt="" />
    </div>
    <?php endif;?>
    <div class="bannre__content">
        <div class="container">
            <div class="bannre__content__inner__wrapp bannre__content__inner__wrapp__single">
                <h1><?php the_title();?></h1>
                <?php echo apply_filters('the_content',$mount_conversion_service_page_content['banner_content']);?>
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