<?php
$learn_page_field_content= get_field('learn_page_field_content');
?>
<div id="start" class="section__global__wrapp">
    <div class="container">
        <div class="breadcrumb__wrapp breadcrumb__wrapp__body">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/'));?>">Home</a></li>
                <li><?php the_title();?></li>
            </ul>
        </div>
        <div class="global__heading__wrapp">
            <h2><?php the_title();?></h2>
        </div>
        <div class="discover__category">
            <?php foreach($learn_page_field_content['learn_list'] as $listing):?>
            <div class="item__card">
                <a href="<?php echo !empty($listing['page_url'])?$listing['page_url']:'#';?>">
                    <?php if(!empty($listing['page_logo'])):?>
                    <i class="icon__box">
                        <img src="<?php echo $listing['page_logo'];?>" alt="" />
                    </i>
                    <?php endif;?>
                    <?php if(!empty($listing['page_title'])):?>
                    <div class="card__title"><?php echo $listing['page_title'];?><img src="<?php echo get_template_directory_uri();?>/assets/images/arrow-next-red.svg" alt="" /></div>
                    <?php endif;?>
                </a>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>