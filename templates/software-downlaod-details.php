<?php

/**
 * Template Name: Software Download Detail 
 */
get_header();
global $post;

if ($post->post_parent) {
   $parent_link = get_permalink($post->post_parent);
} else {
   $parent_link = '#'; // fallback if no parent exists
}
?>



<div class="body__container__inner container__fluid__wrap">
   <div class="large__block">
      <p class="text__center"><a href="<?php echo esc_url($parent_link); ?>" class="f__uppercase f__ul">Software download</a></p>
      <?php if ($title = get_field('title')) : ?>
         <h1 class="f__h2 f__uppercase spacing__40 text__center"><?php echo $title; ?></h1>
      <?php endif; ?>
   </div>
   <div class="large__block">
      <div class="nav nav-tabs nav__tabs" id="nav-tab" role="tablist">
         <button class="nav-link nav__link f__uppercase f__ul active" id="nav-windows-tab" data-bs-toggle="tab" data-bs-target="#nav-windows" type="button" role="tab" aria-controls="nav-windows" aria-selected="true">Windows</button>
         <button class="nav-link nav__link f__uppercase f__ul" id="nav-mac-tab" data-bs-toggle="tab" data-bs-target="#nav-mac" type="button" role="tab" aria-controls="nav-mac" aria-selected="false">Mac os</button>
      </div>



      <div class="tab-content tab__content" id="nav-tabContent">
         <div class="tab-pane tab__pane fade show active" id="nav-windows" role="tabpanel" aria-labelledby="nav-windows-tab" tabindex="0">
            <div class="large__block">
               <div class="content__width560__pc">
                  <h2 class="heading__medium f__uppercase text__center">Before Updating</h2>
                  <?php if ($before_updating = get_field('before_updating')) : ?>
                     <?php echo $before_updating; ?>
                  <?php endif; ?>
               </div>
            </div>
            <div class="large__block">
               <div class="content__wid700">
                  <?php
                  $first_image = get_field('first_image');
                  if ($first_image) : ?>
                     <img src="<?php echo esc_url($first_image['url']); ?>" alt="">
                  <?php endif; ?>

               </div>
            </div>
            <div class="large__block">
               <div class="content__width560__pc">
                  <h2 class="heading__medium f__uppercase text__center">Targets of this Plug-in</h2>
                  <?php if ($targets_of_this_plug_in = get_field('targets_of_this_plug-in')) : ?>
                     <?php echo $targets_of_this_plug_in; ?>
                  <?php endif; ?>
                  <div class="btn__full__width spacing__40 product__overview__block__body">
                     <?php if ($download_file = get_field('download_file')) : ?>
                        <a href="<?php bloginfo("template_directory"); ?>/<?php echo esc_html($download_file); ?>" class="m__btn">Download for windows (158.5MB)</a>
                     <?php endif; ?>

                  </div>
               </div>
            </div>
            <div class="large__block">
               <div class="content__width560__pc">
                  <h2 class="heading__medium f__uppercase text__center">Update History</h2>
                  <?php if ($update_history = get_field('update_history')) : ?>
                     <?php echo $update_history; ?>
                  <?php endif; ?>

               </div>
            </div>
            <div class="large__block">
               <div class="content__width560__pc">
                  <h2 class="heading__medium f__uppercase text__center">Warnings</h2>
                  <?php if ($warnings = get_field('warnings')) : ?>
                     <?php echo $warnings; ?>
                  <?php endif; ?>
               </div>
            </div>
            <div class="large__block">
               <div class="content__width560__pc">
                  <h2 class="heading__medium f__uppercase text__center">Installation</h2>
                  <?php if ($installation = get_field('installation')) : ?>
                     <?php echo $installation; ?>
                  <?php endif; ?>
               </div>
            </div>
            <div class="large__block">
               <div class="content__width560__pc">
                  <h2 class="heading__medium f__uppercase text__center">Operating Conditions</h2>
                  <?php if ($operating_conditions = get_field('operating_conditions')) : ?>
                     <?php echo $operating_conditions; ?>
                  <?php endif; ?>
               </div>
            </div>
         </div>

         <div class="tab-pane tab__pane fade" id="nav-mac" role="tabpanel" aria-labelledby="nav-mac-tab" tabindex="0">
            <div class="large__block">
               <div class="content__width560__pc">
                  <h2 class="heading__medium f__uppercase text__center">Before Updating</h2>
                  <?php if ($before_updating_mac = get_field('before_updating_mac')) : ?>
                     <?php echo $before_updating_mac; ?>
                  <?php endif; ?>
               </div>
            </div>
            <div class="large__block">
               <div class="content__wid700">
                  <?php
                  $first_image_mac = get_field('first_image_mac');
                  if ($first_image_mac) : ?>
                     <img src="<?php echo esc_url($first_image_mac['url']); ?>" alt="<?php echo esc_html($first_image_mac['filename']); ?>">
                  <?php endif; ?>

               </div>
            </div>
            <div class="large__block">
               <div class="content__width560__pc">
                  <h2 class="heading__medium f__uppercase text__center">Targets of this Plug-in</h2>
                  <?php if ($targets_of_this_plug_in_mac = get_field('targets_of_this_plug-in_mac')) : ?>
                     <?php echo $targets_of_this_plug_in_mac; ?>
                  <?php endif; ?>
                  <div class="btn__full__width spacing__40 product__overview__block__body">
                     <?php if ($download_file_mac = get_field('download_file_mac')) : ?>
                        <a href="<?php bloginfo("template_directory"); ?>/<?php echo esc_html($download_file_mac); ?>" class="m__btn">Download for Mac OS (167.9MB)</a>
                     <?php endif; ?>

                  </div>
               </div>
            </div>
            <div class="large__block">
               <div class="content__width560__pc">
                  <h2 class="heading__medium f__uppercase text__center">Update History</h2>
                  <?php if ($update_history_mac = get_field('update_history_mac')) : ?>
                     <?php echo $update_history_mac; ?>
                  <?php endif; ?>
               </div>
            </div>
            <div class="large__block">
               <div class="content__width560__pc">
                  <h2 class="heading__medium f__uppercase text__center">Warnings</h2>
                  <?php if ($warnings_mac = get_field('warnings_mac')) : ?>
                     <?php echo $warnings_mac; ?>
                  <?php endif; ?>
               </div>
            </div>
            <div class="large__block">
               <div class="content__width560__pc">
                  <h2 class="heading__medium f__uppercase text__center">Installation</h2>
                  <?php if ($installation_mac = get_field('installation_mac')) : ?>
                     <?php echo $installation_mac; ?>
                  <?php endif; ?>
               </div>
            </div>
            <div class="large__block">
               <div class="content__width560__pc">
                  <h2 class="heading__medium f__uppercase text__center">Operating Conditions</h2>
                  <?php if ($operating_conditions_mac = get_field('operating_conditions_mac')) : ?>
                     <?php echo $operating_conditions_mac; ?>
                  <?php endif; ?>
               </div>
            </div>
         </div>

      </div>
   </div>


   <?php get_footer(); ?>