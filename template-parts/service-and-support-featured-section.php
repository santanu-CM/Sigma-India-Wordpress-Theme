<?php
$service_and_support_page_content = get_field('service_and_support_page_content');
?>
<div class="feature__accessory">
    <?php if(!empty($service_and_support_page_content['accessory_image'])):?>
    <div class="image__box">
        <img src="<?php echo $service_and_support_page_content['accessory_image'];?>" alt="" />
    </div>
    <?php endif;?>
    <div class="content__wrapp">
        <div class="container">
            <div class="content__inner">
                <div class="global__heading__wrapp">
                    <?php if(!empty($service_and_support_page_content['featured_title'])):?> 
                    <h3><?php echo $service_and_support_page_content['featured_title'];?></h3>
                    <?php endif;?>
                    <?php if(!empty($service_and_support_page_content['sigma_usb_title'])):?> 
                    <h2><?php echo $service_and_support_page_content['sigma_usb_title'];?></h2>
                    <?php endif;?>
                </div>
                <?php echo apply_filters('the_content',$service_and_support_page_content['sigma_usb_content'] );?>
            </div>
        </div>
    </div>
</div>