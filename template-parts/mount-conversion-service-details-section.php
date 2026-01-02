<?php
$mount_conversion_service_page_content = get_field('mount_conversion_service_page_content');
?>
<div id="start" class="section__global__wrapp">
    <div class="container">
        <div class="breadcrumb__wrapp breadcrumb__wrapp__body">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/'));?>">Home</a></li>
                <li><a href="<?php echo !empty($mount_conversion_service_page_content['support_page_url']) ? $mount_conversion_service_page_content['support_page_url']: '#';?>">
                    <?php echo $mount_conversion_service_page_content['support_title'];?></a></li>
                <li><?php the_title();?></li>
            </ul>
            <div class="global__heading__wrapp global__heading__wrapp__single">
                <?php if(!empty($mount_conversion_service_page_content['sigma_mount_conversion_service_title'])):?>
                <h2><?php echo $mount_conversion_service_page_content['sigma_mount_conversion_service_title'];?></h2>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>