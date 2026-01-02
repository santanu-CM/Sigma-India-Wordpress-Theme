<?php

/**

 * The template for displaying all shooting_with_sigma single posts

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post

 *

 * @package WP_Bootstrap_Starter

 */



get_header();
if (have_posts()) :
   while (have_posts()) : the_post();
      $image = get_field('single_image');
      $image2 = get_field('single_image2');
      $video_file = get_field('video_file');
      $video_image =  get_field('video_image');
      $image3 =  get_field('single_image3');
      $video_file2 = get_field('video_file2');
      $video_image2 =  get_field('video_image2');
      $video_file3 = get_field('video_file3');
      $video_image3 =  get_field('video_image3');
      $image4 = get_field('single_image4');
      $image5 = get_field('single_image5');
      $video_file4 = get_field('video_file4');
      $video_image4 =  get_field('video_image4');
      $equipment_items = get_field('equipment__repeater');

?>
      <div class="body__container__inner container__fluid__wrap">
         <div class="heading__wrap heading__wrap__medium large__block">
            <h1 class="f__h2 f__uppercase font text__center spacing__40"><?php echo get_field('text_heading'); ?></h1>
            <p class="text__center spacing__40"><?php echo get_field('text_block'); ?></p>
            <p class="text__center spacing__16"><?php echo get_field('by_name'); ?></p>
         </div>
         <div class="medium__block">
            <figure>
               <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            </figure>
         </div>
         <div class="large__block">
            <div class="content__width560__pc">
               <p class="spacing__40"><?php echo get_field('content_block1'); ?></p>
            </div>
         </div>
         <div class="large__block">
            <figure>
               <img src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>">
            </figure>
         </div>
         <div class="large__block">
            <div class="content__width560__pc">
               <p class="spacing__40">
                  <?php echo get_field('content_block2'); ?>
               </p>
            </div>
         </div>
         <div class="large__block">
            <div class="l__panel__grid panel__1__pc">
               <div class="m__video align__center">
                  <video autoplay muted loop id="video">
                     <source src="<?php echo esc_url($video_file['url']); ?>" type="video/mp4" poster="<?php echo esc_url($video_image['url']); ?>">
                  </video>
               </div>
            </div>
         </div>
         <?php if (have_rows('image_repeater')) : ?>
            <div class="large__block">
               <div class="l__panel__grid panel__2__pc">
                  <?php while (have_rows('image_repeater')) : the_row();
                     $image = get_sub_field('image');
                     if ($image) :
                  ?>
                        <figure>
                           <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>">
                        </figure>
                  <?php endif;
                  endwhile; ?>
               </div>
            </div>
         <?php endif; ?>
         <div class="large__block">
            <div class="content__width560__pc">
               <p class="spacing__40">
                  <?php echo get_field('content_block3'); ?>
               </p>
            </div>
         </div>
         <div class="large__block">
            <div class="l__panel__grid panel__1__pc">
               <figure class="align__center">
                  <img src="<?php echo esc_url($image3['url']); ?>" alt="<?php echo esc_attr($image3['alt']); ?>">

               </figure>
            </div>
         </div>
         <div class="large__block">
            <div class="m__video">
               <video autoplay muted loop id="video">
                  <source src="<?php echo esc_url($video_file2['url']); ?>" type="video/mp4" poster="<?php echo esc_url($video_image2['url']); ?>">

               </video>
            </div>
         </div>
         <div class="large__block">
            <div class="content__width560__pc">
               <p class="spacing__40">
                  <?php echo get_field('content_block4'); ?>
               </p>
            </div>
         </div>
         <?php if (have_rows('inage_repeater2')) : ?>
            <div class="large__block">
               <div class="l__panel__grid panel__2__pc">
                  <?php while (have_rows('inage_repeater2')) : the_row();
                     $image = get_sub_field('image');
                     if ($image) :
                  ?>
                        <figure>
                           <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>">
                        </figure>
                  <?php endif;
                  endwhile; ?>
               </div>
            </div>
         <?php endif; ?>
         <div class="large__block">
            <div class="l__panel__grid panel__1__pc">
               <div class="m__video align__center">
                  <video autoplay muted loop id="video">
                     <source src="<?php echo esc_url($video_file3['url']); ?>" type="video/mp4" poster="<?php echo esc_url($video_image3['url']); ?>">

                  </video>
               </div>
            </div>
         </div>
         <div class="large__block">
            <figure>
               <img src="<?php echo esc_url($image4['url']); ?>" alt="<?php echo esc_attr($image4['alt']); ?>">

            </figure>
         </div>
         <div class="large__block">
            <div class="content__width560__pc">
               <p class="spacing__40">
                  <?php echo get_field('content_block5'); ?>
               </p>
            </div>
         </div>
         <div class="large__block">
            <div class="l__panel__grid panel__1__pc">
               <figure class="align__center">
                  <img src="<?php echo esc_url($image5['url']); ?>" alt="<?php echo esc_attr($image5['alt']); ?>">

               </figure>
            </div>
         </div>
         <div class="large__block">
            <div class="spacing__40">
               <div class="m__video">
                  <video autoplay muted loop id="video">
                     <source src="<?php echo esc_url($video_file4['url']); ?>" type="video/mp4" poster="<?php echo esc_url($video_image4['url']); ?>">

                  </video>
               </div>
            </div>
         </div>
         <div class="large__block">
            <div class="l__panel__grid panel__3__pc">
               <h2 class="f__ul f__uppercase spacing__right__120__pc spacing__right__0__sp"><?php echo get_field('section_title'); ?></h2>
               <div class="spacing__32__sp spacing__right__120__pc spacing__right__0__sp">
                  <p class="f__uppercase f__ul"><?php echo get_field('name'); ?></p>
                  <p class="f__ul"><?php echo get_field('role'); ?></p>
               </div>
               <div class="spacing__32__sp spacing__right__120__pc spacing__right__0__sp">
                  <p class="f__ul"><?php echo get_field('bio'); ?></p>
                  <?php if (have_rows('links')) : ?>
                     <div class="c__text__Link__Box spacing__24">
                        <?php while (have_rows('links')) : the_row();
                           $label = get_sub_field('link_label');
                           $url = get_sub_field('link_url');
                           if ($label && $url) :
                        ?>
                              <a href="<?php echo esc_url($url); ?>" class="m__text__Link" target="_blank" rel="noopener noreferrer">
                                 <?php echo esc_html($label); ?>
                              </a>
                        <?php endif;
                        endwhile; ?>
                     </div>
                  <?php endif; ?>

               </div>

            </div>
         </div>
         <?php
         if ($equipment_items) :
            $count = 0;
            echo '<div class="large__block">';
            foreach ($equipment_items as $item) :
               // Open new panel after every 2 items
               if ($count % 2 === 0) :
                  if ($count > 0) echo '</div>'; // Close previous panel
                  echo '<div class="l__grid">';
                  // Heading only on first group
                  if ($count === 0) :
                     echo '<h2 class="f__ul f__uppercase">' . esc_html(get_field('equipment_used')) . '</h2>';
                  else :
                     echo '<h2 class="f__uppercase"></h2>';
                  endif;
               endif;

               // Extract subfields
               $category = $item['category_name'];
               $product = $item['product_name'];
               $link = $item['product_link'];
               $image = $item['product_image'];
         ?>
               <div class="content__card spacing__64__sp">
                  <a href="<?php echo esc_url($link ?: 'javascript:void(0);'); ?>" target="_blank" rel="noopener noreferrer">
                     <?php if ($image) : ?>
                        <figure>
                           <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>">
                        </figure>
                     <?php endif; ?>
                     <p class="spacing__16">
                        <?php if ($category) : ?>
                           <span class="f__uppercase"><?php echo esc_html($category); ?></span><br>
                        <?php endif; ?>
                        <?php echo esc_html($product); ?>
                     </p>
                  </a>
               </div>
         <?php
               $count++;
            endforeach;
            echo '</div></div>'; // Close last panel and large block
         endif;
         ?>

         <div class="large__block">
            <div class="l__panel__grid panel__2__pc">
               <h2 class="f__ul f__uppercase text__center__sp"><?php echo get_field('btn_txt'); ?></h2>
               <?php if (have_rows('explore_repeater')) : ?>
                  <div class="l__panel__grid panel__2__pc">
                     <?php while (have_rows('explore_repeater')) : the_row();
                        $title = get_sub_field('title');
                        $sub_title =  get_sub_field('sub_title');
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
                              <?php if ($sub_title) : ?>
                                 <p class="f__uppercase spacing__16"><?php echo esc_html($sub_title); ?></p>
                              <?php endif; ?>
                           </a>
                        </div>
                     <?php endwhile; ?>
                  </div>
               <?php endif; ?>
            </div>
         </div>
      </div>
<?php
   endwhile;
endif;
?>
<?php get_footer(); ?>