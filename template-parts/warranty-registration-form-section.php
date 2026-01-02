<?php
$warranty_registration_page_content = get_field('warranty_registration_page_content');
?>
<div class="section__global__wrapp warranty__registration__wrapp large__block">
    <div class="container">
        <div class="header__wrapp">
            <div class="global__heading__wrapp">
                <?php if(!empty($warranty_registration_page_content['warranty_registration_title'])):?>
                <h2><?php echo $warranty_registration_page_content['warranty_registration_title'];?></h2>
                <?php endif;?>
                <?php echo apply_filters('the_content',$warranty_registration_page_content['warranty_registration_content'] );?>
            </div>
            <?php if(!empty($warranty_registration_page_content['sigma_badge_image'])):?>
            
             <div class="content__wid415">
            <div class="image__box">
                <img src="<?php echo $warranty_registration_page_content['sigma_badge_image'];?>" alt="" />
            </div>
            </div>
            <?php endif;?>
        </div>
        <div class="form__wrapp">
            <?php //echo do_shortcode('[product_registration_form]');?>
			<?php echo do_shortcode('[fluentform id="1"]');?>
        </div>
    </div>
</div>