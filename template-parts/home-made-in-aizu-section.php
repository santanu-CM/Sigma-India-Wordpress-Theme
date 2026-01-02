<?php
$home_field_content = get_field('home_field_content');
?>
<div class="video__slider__wrapp">
    <?php if(!empty($home_field_content['sigma_video'])):?>
    <div class="video__wrapp">
        <video autoplay muted loop id="video">
            <source src="<?php echo esc_url($home_field_content['sigma_video']);?>" type="video/mp4">
        </video>
    </div>
    <?php endif;?>
    <div class="content__wrapp">
        <div class="container">
            <div class="content__wrapp__inner">
                <?php if(!empty($home_field_content['made_in_aizu_title'])):?>
                <h3><?php echo $home_field_content['made_in_aizu_title'];?></h3>
                <?php endif;?>
                <?php if(!empty($home_field_content['made_in_aizu_title'])):?>
                <h2><?php echo $home_field_content['made_in_aizu_subtitle'];?></h2>
                <?php endif;?>
                <div class="btn__wrapp">
                    <a href="<?php echo !empty($home_field_content['contact_us_label_url']) ? $home_field_content['contact_us_label_url'] :'#';?>">
                       <?php echo $home_field_content['contact_us_label_title'];?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
