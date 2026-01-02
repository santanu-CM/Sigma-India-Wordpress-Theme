<?php
$home_field_content = get_field('home_field_content');
?>

<div class="discover__range__wrapp">
    <div class="container">
        <div class="title__content">
            <?php if(!empty($home_field_content['featured_title'])):?>
            <h3><?php echo esc_html($home_field_content['featured_title']);?></h3>
            <?php endif;?>
            <?php if(!empty($home_field_content['sigma_collection_title'])):?>
            <h2><?php echo $home_field_content['sigma_collection_title'];?></h2>
            <?php endif;?>
        </div>
        <div class="featured__products__wrapp">
            <?php foreach($home_field_content['featured_details'] as $listing):?>
            <div class="featured__product__card">
                <?php if(!empty($listing['feature_image'])):?>
                    <div class="image__box">
                        <img src="<?php echo esc_url($listing['feature_image']);?>" alt="" />
                    </div>
                <?php endif;?>
                <div class="content__wrapp">
                    <div class="content__details">
                        <?php if(!empty($listing['feature_title'])):?>
                        <h3><?php echo $listing['feature_title'];?></h3>
                        <?php endif;?>
                        <?php if(!empty($listing['feature_content'])):?>
                        <?php echo apply_filters('the_content', $listing['feature_content']);?>
                        <?php endif;?>
                    </div>
                    <div class="btn__wrapp">
                       <a href="<?php echo !empty($listing['label_url']) ? $listing['label_url'] :'#';?>">
                            <?php echo $listing['label_title'];?>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <div class="event__wrapp">
            <div class="container">
                <div class="event__card">
                     <?php echo do_shortcode('[events-calendar-templates category="all" template="default" style="style-2" date_format="default" start_date="" end_date="" limit="1" order="ASC" hide-venue="no" socialshare="no" time="all"]');?>
                </div>
            </div>
        </div>
    </div>
</div>