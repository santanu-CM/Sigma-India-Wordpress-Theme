<?php
$terms_and_conditions_page_content = get_field('terms_and_conditions_page_content');
?>
<div class="no__bg__banner no__bg__banner__cms">
    <div class="container">
        <div class="breadcrumb__wrapp breadcrumb__wrapp__body">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/'));?>">Home</a></li>
                <li><?php the_title();?></li>
            </ul>
        </div>
        <div class="global__heading__wrapp">
            <h1><?php the_title();?></h1>
        </div>
    </div>
</div>
<div class="section__global__wrapp inner__page__content__wrapp cms__content__wrapp">
    <div class="container">
        <ul class="nav nav-tabs nav__tabs" id="myTab" role="tablist">
            <?php 
                $tab_title_index = 0;
                foreach( $terms_and_conditions_page_content['tabs_details'] as $listing):
                $tab_title = $listing['tabs_title'];
                $active_class_for_tab = $tab_title_index  === 0 ? 'active' : ''; 
            ?>
            <li class="nav-item nav__item" role="presentation">
                <button class="nav-link nav__link <?php echo $active_class_for_tab; ?>" id="tab-item-<?php echo $tab_title_index; ?>-tab" data-bs-toggle="tab" data-bs-target="#tab-item-<?php echo $tab_title_index; ?>" type="button" role="tab" aria-controls="tab-item-<?php echo $tab_title_index; ?>"
                    aria-selected="<?php echo $tab_title_index === 0 ? 'true' : 'false';?>"><?php echo $tab_title;?></button>
            </li>
            <?php 
              $tab_title_index++;
              endforeach; 
            ?>
        </ul>
        <div class="tab-content tab__content" id="myTabContent">
            <?php 
               $tab_content_index = 0;
               foreach( $terms_and_conditions_page_content['tabs_details'] as $listing):
               $tab_content = $listing['tabs_content'];
               $active_class_for_content = $tab_content_index === 0 ? 'show active' : ''; 
            ?>
            <div class="tab-pane tab__pane fade <?php echo $active_class_for_content;?>"
                id="tab-item-<?php echo $tab_content_index ;?>" role="tabpanel"
                aria-labelledby="tab-item-<?php echo $tab_content_index ;?>">
                <?php echo $tab_content;?>
            </div>
            <?php 
              $tab_content_index++;
              endforeach; 
            ?>
        </div>
    </div>
</div>