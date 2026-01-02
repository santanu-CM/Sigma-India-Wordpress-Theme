<?php

/**
 * Template Name: Manufacturing page
 */
get_header();

$video_file = get_field('video_file');
$banner_img = get_field('image_file');
$image_1 = get_field('image_1');
$image_2 = get_field('image_2');
$image_3 = get_field('image_3');
$image_4 = get_field('image_4');
$video_file2 = get_field('video_file2');
$banner_img2 = get_field('image_file2');
$heading = get_field('production_heading');
$description = get_field('production_description');

?>
<div class="body__container__inner">
   <div class="large__block container__fluid__wrap">
      <div class="text__center">
         <h1 class="f__h1 f__uppercase"><?php echo get_field('title'); ?></h1>
         <p class="spacing__40 text__center"><?php echo get_field('sub_heading'); ?></h2>
      </div>
   </div>
   <div class="medium__block container__fluid__wrap">
      <div class="m__video">

         <video autoplay muted loop id="video">
            <source src="<?php echo esc_url($video_file['url']); ?>" type="video/mp4" poster="<?php echo esc_url($banner_img['url']); ?>">
         </video>
      </div>
   </div>

   <div class="large__block container__fluid__wrap">
      <div class="content__width560__pc">
         <h2 class="heading__medium f__uppercase font text__center"><?php echo get_field('content_heading'); ?></h2>
         <?php echo get_field('content_paragraph'); ?>
      </div>
   </div>
   <div class="large__block container__fluid__wrap">
      <div class="l__panel__grid panel__2__pc">
         <figure>
            <img src="<?php echo esc_url($image_1['url']); ?>" alt="">
         </figure>
         <figure>
            <img src="<?php echo esc_url($image_2['url']); ?>" alt="">
         </figure>
      </div>
   </div>
   <div class="large__block container__fluid__wrap">
      <div class="content__width560__pc">
         <h2 class="heading__medium f__uppercase font text__center"><?php echo get_field('content_heading_1'); ?></h2>
         <?php echo get_field('content_paragraph1'); ?>
      </div>
   </div>
   <div class="large__block container__fluid__wrap">
      
         <figure>
            <img src="<?php echo esc_url($image_3['url']); ?>" alt="">
         </figure>
     
   </div>
   <div class="large__block container__fluid__wrap">
      <div class="content__width560__pc">
         <h2 class="heading__medium f__uppercase font text__center"><?php echo get_field('content_heading_2'); ?></h2>
         <?php echo get_field('content_paragraph_2'); ?>
      </div>
   </div>
   <div class="large__block container__fluid__wrap">
      <div class="content__width700__pc">
         <figure>
            <img src="<?php echo esc_url($image_4['url']); ?>" alt="">
         </figure>
      </div>
   </div>
   <div class="large__block container__fluid__wrap">
      <div class="content__width560__pc">
         <h2 class="heading__medium f__uppercase font text__center"><?php echo get_field('content_heading3'); ?></h2>
         <?php echo get_field('content_paragraph3'); ?>
      </div>
   </div>
   <div class="large__block container__fluid__wrap">
      <div class="m__video">
         <video autoplay muted loop id="video">
            <source src="<?php echo esc_url($video_file2['url']); ?>" type="video/mp4" poster="<?php echo esc_url($banner_img2['url']); ?>">
         </video>
      </div>
   </div>
   <?php if ($heading || $description || have_rows('production_accordion')): ?>
      <div class="large__block container__fluid__wrap">
         <div class="l__wid560__pc">

            <?php if ($heading): ?>
               <h2 class="heading__medium f__uppercase font text__center">
                  <?php echo esc_html($heading); ?>
               </h2>
            <?php endif; ?>

            <?php if ($description): ?>
               <p class="spacing__40">
                  <?php echo wp_kses_post($description); ?>
               </p>
            <?php endif; ?>

            <?php if (have_rows('production_accordion')): ?>
               <div class="spacing__32">
                  <div class="l__wid560__pc">
                     <div class="accordion" id="accordionExample">
                        <?php $i = 0;
                        while (have_rows('production_accordion')): the_row();
                           $title = get_sub_field('accordion_title');
                           $content = get_sub_field('accordion_content');
                           $heading_id = 'heading' . $i;
                           $collapse_id = 'collapse' . $i;
                        ?>
                           <div class="accordion-item accordion__item">
                              <h2 class="accordion-header accordion__header" id="<?php echo esc_attr($heading_id); ?>">
                                 <button class="accordion-button accordion__button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id); ?>" aria-expanded="false" aria-controls="<?php echo esc_attr($collapse_id); ?>">
                                    <span><?php echo esc_html($title); ?></span>
                                 </button>
                              </h2>
                              <div id="<?php echo esc_attr($collapse_id); ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo esc_attr($heading_id); ?>" data-bs-parent="#accordionExample">
                                 <div class="accordion-body accordion__body">
                                    <?php echo wp_kses_post($content); ?>
                                 </div>
                              </div>
                           </div>
                        <?php $i++;
                        endwhile; ?>
                     </div>
                  </div>
               </div>
            <?php endif; ?>

         </div>
      </div>
   <?php endif; ?>
   <div class="large__block container__fluid__wrap">
      <div class="l__panel__grid panel__2__pc">
         <h2 class="f__ul f__uppercase text__center__sp"><?php echo get_field('btn_txt'); ?></h2>
         <?php if (have_rows('explore_repeater')) : ?>
            <div class="l__panel__grid panel__2__pc">
               <?php while (have_rows('explore_repeater')) : the_row();
                  $title = get_sub_field('title');
                  $image = get_sub_field('image'); // image array
                  $url = get_sub_field('url');
               ?>
                  <div class="m__content__box">
                     <a class="text__color__base" href="<?php echo esc_url($url); ?>" target="_blank">
                        <?php if ($image) : ?>
                           <figure>
                              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                           </figure>
                        <?php endif; ?>
                        <?php if ($title) : ?>
                           <p class="f__uppercase spacing__16"><?php echo esc_html($title); ?></p>
                        <?php endif; ?>
                     </a>
                  </div>
               <?php endwhile; ?>
            </div>
         <?php endif; ?>

      </div>
   </div>
</div>
<?php get_footer(); ?>