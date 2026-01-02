<?php
$learn_page_field_content= get_field('learn_page_field_content');
?>
<div class="cta__banner__wrapp">
    <?php if(!empty($learn_page_field_content['sigma_background_image'])):?>
    <div class="image__box">
        <img src="<?php echo $learn_page_field_content['sigma_background_image'];?>" alt="" />
    </div>
    <?php endif;?>
    <div class="content__wrapp">
        <div class="container">
            <div class="content__wrapp__inner">
                <div class="global__heading__wrapp">
                    <?php if(!empty($learn_page_field_content['meet_the_sigma_title'])):?>
                    <h2><?php echo $learn_page_field_content['meet_the_sigma_title'];?></h2>
                    <?php endif;?>
                </div>
                <?php echo apply_filters('the_content',$learn_page_field_content['meet_the_sigma_content']);?>
                <div class="btn__wrapp">
                    <a href="<?php echo !empty($learn_page_field_content['label_find_out_url'])?$learn_page_field_content['label_find_out_url']:'#';?> ">
                        <?php echo $learn_page_field_content['label_find_out_title'];?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>