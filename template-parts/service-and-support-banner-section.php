<?php
$service_and_support_page_content = get_field('service_and_support_page_content');
?>
<div class="main__banner inner__banner__main inner__banner__small inner__banner__small__left__align">
    <?php if(!empty($service_and_support_page_content ['banner_image'])):?>
    <div class="image__box">
        <img src="<?php echo $service_and_support_page_content['banner_image'];?>" alt="" />
    </div>
    <?php endif;?>
    <div class="bannre__content">
        <div class="container">
            <div class="bannre__content__inner__wrapp">
                <h1><?php the_title();?></h1>
                <?php echo apply_filters('the_Content',$service_and_support_page_content['banner_content']);?>
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