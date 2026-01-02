<?php
$home_field_content = get_field('home_field_content');

if($home_field_content['banner_type'] == 'video'):
?>
<div class="main__banner">
    <?php if(!empty($home_field_content['banner_video'])):?>
    <div class="image__box">
        <video autoplay muted loop id="video">
          <source src="<?php echo esc_url($home_field_content['banner_video']);?>" type="video/mp4" poster="<?php echo esc_url($home_field_content['banner_video_cover_image']);?>">
        </video>
    </div>
    <div class="bannre__content">
      <div class="container">
        <div class="bannre__content__inner__wrapp">
            <div class="btn__wrapp">
                <a href="<?php echo get_permalink(2221);?>"><?php echo esc_html('Pre Book Now');?></a>
            </div>
        </div>
      </div>
    </div>
    <?php endif;?>
</div>
<?php else:?>
<div class="main__banner">
    <div class="owl-carousel owl-theme main__banner__slider">
        <?php foreach($home_field_content['banner_details'] as $listing):?>
        <div class="item">
            <?php if(!empty($listing['banner_image'])):?>
            <div class="image__box">
                <img src="<?php echo esc_url($listing['banner_image']);?>" alt="" />
            </div>
            <?php endif;?>
            <div class="bannre__content">
                <div class="container">
                    <div class="bannre__content__inner__wrapp">
                        <?php if(!empty($listing['banner_sports_image'])):?>
                        <img src="<?php echo $listing['banner_sports_image'];?>" alt="" />
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
<?php endif;?>


