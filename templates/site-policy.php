<?php

/** 
 * Template Name:  Site Policy
 */
get_header();
?>
 <div class="body__container__inner container__fluid__wrap">
         <div class="large__block">
            <div class="text__center">
               <h1 class="f__h2 f__uppercase"><?php echo get_the_title(); ?>
               </h1>
            </div>
         </div>
         <div class="large__block">
            <div class="l__wid560__pc">
              
            <?php the_content(); ?>

            </div>
         </div>

         
      </div>
<?php get_footer();?>