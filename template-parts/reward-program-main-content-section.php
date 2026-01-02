<?php
$reward_program_page_content = get_field('reward_program_page_content');
?>
<div class="main__banner inner__banner__main inner__banner__small inner__banner__small__left__align">
    <?php if(!empty($reward_program_page_content['banner_image'])):?>
    <div class="image__box">
        <img src="<?php echo $reward_program_page_content['banner_image'];?>" alt="" />
    </div>
    <?php endif;?>
    <div class="bannre__content">
        <div class="container">
            <div class="bannre__content__inner__wrapp">
                <h1><?php the_title();?></h1>
                <p>Learn more about how you can earn rewad from SIGMA products.</p>
                <div class="btn__wrapp btn__wrapp__scroller">
                    <a href="#start">
                        <div class="sigma__mousey">
                            <div class="sigma__scroller"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="start" class="section__global__wrapp">
    <div class="container">
        <div class="breadcrumb__wrapp breadcrumb__wrapp__body">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/'));?>">Home</a></li>
                <li><?php the_title();?></li>
            </ul>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-6 d-flex flex-column justify-content-center">
                   <?php if(!empty($reward_program_page_content['promotional_offer_title'])):?>
                    <h1 class="mb-4"><?php echo $reward_program_page_content['promotional_offer_title'];?></h1>
                    <?php endif;?>
                    <?php echo apply_filters('the_content',$reward_program_page_content['promotional_offer_content']);?>
                </div>
                <div class="col-6 d-flex align-items-center justify-content-center">
                    <?php if(!empty($reward_program_page_content['sigma_shop_image'])):?>
                    <img src="<?php echo $reward_program_page_content['sigma_shop_image'];?>" alt="Image Description" class="img-fluid">
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>