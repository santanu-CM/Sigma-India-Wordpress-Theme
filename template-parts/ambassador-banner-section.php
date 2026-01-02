<?php
$ambassadors_page_content = get_field('ambassadors_page_content');
?>
<div class="main__banner inner__banner__main inner__banner__small">
    <?php if(!empty($ambassadors_page_content['banner_image'])):?>
    <div class="image__box">
        <img src="<?php echo $ambassadors_page_content['banner_image'];?>" alt="" />
    </div>
    <?php endif;?>
    <div class="bannre__content">
        <div class="container">
            <div class="bannre__content__inner__wrapp">
                <?php if(!empty($ambassadors_page_content['banner_title'])):?>
                <h3><?php echo $ambassadors_page_content['banner_title'];?></h3>
                <?php endif;?>
                <?php if(!empty($ambassadors_page_content['banner_subtitle'])):?>
                <h1><?php echo $ambassadors_page_content['banner_subtitle'];?></h1>
                <?php endif;?>
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