<?php
$dealer_network_field_content = get_field('dealer_network_field_content');
?>
<div class="sigma__experience__zone">
    <div class="container">
        <div class="global__heading__wrapp">
            <?php if(!empty($dealer_network_field_content['experience_zone_title'])):?>
            <h2><?php echo $dealer_network_field_content['experience_zone_title'];?></h2>
            <?php endif;?>
        </div>
        <div class="experience__zone__wrapp">
            <?php if(!empty($dealer_network_field_content['experience_zone_details'])):?> 
            <?php foreach($dealer_network_field_content['experience_zone_details'] as $listing):?>              
            <div class="experience__zone__card">
                <?php if(!empty($listing['store_image'])):?>
                <div class="image__box">
                    <img src="<?php echo $listing['store_image'];?>" alt="" />
                </div>
                <?php endif;?>
                <div class="card__content">
                    <?php if(!empty($listing['store_name'])):?>
                    <h3><?php echo $listing['store_name'];?></h3>
                    <?php endif;?>
                    <?php if(!empty($listing['store_state'])):?>
                    <p><?php echo $listing['store_state'];?></p>
                    <?php endif;?>
                </div>
            </div>
            <?php
            endforeach;
            endif;?>
        </div>
    </div>
</div>