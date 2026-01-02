<?php

/**
 * Template Name:Terms & Conditions
 */
get_header();
?>
<div class="body__container__inner">
    <div class="large__block container__fluid__wrap">
        <div class="content__wid1024 text__center">
            <h1 class="f__h1 f__uppercase spacing__50"><?php echo get_field('page_title');?></h1>
        </div>
    </div>

    <div class="large__block content__wid650 container__fluid__wrap spacing__50">
       <?php echo get_the_content();?>

        <div class="content__wid560">
           <?php echo get_field('page_content');?>
        </div>
    </div>

</div>
<?php get_footer(); ?>