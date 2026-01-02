<?php
$learn_page_field_content= get_field('learn_page_field_content');
?>
<div class="event__cards">
    <div class="container">
        <?php if(!empty($learn_page_field_content['upcoming_events_title'])):?>
        <div class="global__heading__wrapp">
            <h2><?php echo $learn_page_field_content['upcoming_events_title'];?></h2>
        </div>
        <?php endif;?>
         <?php echo do_shortcode('[events-calendar-templates category="all" template="default" style="style-2" date_format="default" start_date="" end_date="" limit="10" order="ASC" hide-venue="no" socialshare="no" time="all"]');?>
        <div class="btn__wrapp">
            <a href="<?php echo !empty($learn_page_field_content['label_see_all_events_url'])?$learn_page_field_content['label_see_all_events_url']:'#';?> ">
                <?php echo $learn_page_field_content['label_see_all_events_title'];?>
            </a>
        </div>

    </div>
</div>