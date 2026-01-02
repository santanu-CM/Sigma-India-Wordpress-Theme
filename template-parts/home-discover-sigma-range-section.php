<?php
$home_field_content = get_field('home_field_content');
?>

<div class="camera__category__wrapp">
    <div class="container">
        <div class="category__wrapp__inner">
            <div class="title__wrapp">
                <?php if(!empty($home_field_content['discover_sigma_range_image'])):?>
                <div class="image__box">
                    <img src="<?php echo esc_url($home_field_content['discover_sigma_range_image']);?>" alt="" />
                </div>
                <?php endif;?>
                <div class="title__content">
                    <?php if(!empty($home_field_content['explore_products_title'])):?>
                    <h3> <?php echo esc_html($home_field_content['explore_products_title']);?></h3>
                    <?php endif;?>
                    <?php if(!empty($home_field_content['discover_sigma_title'])):?>
                    <h2><?php echo esc_html($home_field_content['discover_sigma_title']);?></h2>
                    <?php endif;?>
                </div>
            </div>
            <div class="category__items__grid">
                <?php if(!empty($home_field_content['product_category_details'] )):?>
                    <?php foreach($home_field_content['product_category_details'] as $listing):?>
                        <div class="category__items__card">
							<div class="content__wrapp">
								<?php if(!empty($listing['category_title'])):?>
								<h3><?php echo $listing['category_title'];?></h3>
								<?php endif;?>
								<?php if(!empty($listing['category_description'])):?>
								<?php echo apply_filters('the_content', $listing['category_description']);?>    
								<?php endif;?>
								<a href="<?php echo !empty($listing['category_url']) ? $listing['category_url']:'#';?>">View More</a>
							</div>
                            <div class="image__box">
                                <img src="<?php echo $listing['category_image'];?>" alt="" />
                            </div>
                        </div>
                    <?php endforeach;?>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<div class="product__category__main">
    <div class="container">
        <div class="title__content">
            <?php if(!empty($home_field_content['categories_title'])):?>
            <h3> <?php echo esc_html($home_field_content['categories_title']);?></h3>
            <?php endif;?>
            <?php if(!empty($home_field_content['explore_basis_title'])):?>
            <h2><?php echo esc_html($home_field_content['explore_basis_title']);?></h2>
            <?php endif;?>
        </div>
        <div class="product__category__grid">
            <?php if(!empty($home_field_content['recommended_gear_details'] )):?>
                <?php foreach($home_field_content['recommended_gear_details'] as $listing):?>
                    <div class="product__category__card">
                        <?php if(!empty($listing['gear_hover_image'])):?>
                        <div class="image__box">
                            <img src="<?php echo esc_url($listing['gear_hover_image']);?>" alt="" />
                        </div>
                        <?php endif;?>
                        <a href="<?php echo !empty($listing['gear_url']) ? $listing['gear_url'] :'#';?> ">&nbsp;</a>
                        <div class="content__wrapp">
                            <?php if(!empty($listing['gear_image'])):?>
                            <i class="ico__box">
                                <img src="<?php echo esc_url($listing['gear_image']);?>" alt="" />
                            </i>
                            <?php endif;?>
                            <?php if(!empty($listing['gear_title'])):?>
                            <h3><?php echo esc_html($listing['gear_title']);?></h3>
                            <?php endif;?>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
</div>