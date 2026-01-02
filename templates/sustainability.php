<?php

/**
 * Template Name: Sustainability page
 */
get_header();
$banner_image = get_field('banner_image');
$value = get_field('value');
$content = get_field('content');
$value_repeater = get_field('value_repeater');
$sustainability_heading = get_field('sustainability_heading');

$sustainability_repeater = get_field('sustainability_repeater');


?>
<div class="body__container__inner">
   <div class="large__block container__fluid__wrap">
      <div class="text__center">
         <h1 class="f__h1 f__uppercase"><?php echo get_field('title'); ?></h1>
      </div>
   </div>
   <div class="medium__block container__fluid__wrap">
      <div class="cover__block">
         <figure>
            <img src="<?php echo $banner_image['url']; ?>" alt="">
         </figure>
      </div>
   </div>
   <div class="large__block container__fluid__wrap">
      <div class="content__width560__pc">
         <h2 class="heading__medium f__uppercase font text__center"><?php echo get_field('vision'); ?></h2>
         <p class="spacing__40"><?php echo get_field('vision_content'); ?></p>
      </div>
   </div>
   <div class="spacing__80 container__fluid__wrap">
      <div class="l__wid560__pc">
         <h2 class="heading__medium f__uppercase font text__center"><?php echo get_field('happy_moment_title'); ?></h2>
         <p class="spacing__40"><?php echo get_field('happy_moment_content'); ?></p>
         <p class="spacing__16"><?php echo get_field('happy_moment_content_2'); ?></p>
      </div>
   </div>
   <div class="large__block container__fluid__wrap">
      <div class="content__width560__pc">
         <h2 class="heading__medium f__uppercase font text__center"></h2>
         <p><?php echo get_field('our_vision'); ?></p>
         <ol class="m__ol spacing__16">
            <?php echo get_field('our_vision_content'); ?>
         </ol>
      </div>
   </div>
   <div class="large__block container__fluid__wrap">
      <div class="l__wid600__pc">
         <?php if ($value): ?>
            <h2 class="heading__medium f__uppercase font text__center"><?php echo esc_html($value); ?></h2>
         <?php endif; ?>

         <?php if ($content): ?>
            <p class="spacing__40"><?php echo esc_html($content); ?></p>
         <?php endif; ?>

         <?php if ($value_repeater): ?>
            <?php foreach ($value_repeater as $index => $item): ?>
               <div class="spacing__32">
                  <?php if (!empty($item['title'])): ?>
                     <p><?php echo esc_html($item['title']); ?></p>
                  <?php endif; ?>
                  <?php if (!empty($item['description'])): ?>
                     <p class="spacing__16">
                        <?php echo nl2br(esc_html($item['description'])); ?>
                     </p>
                  <?php endif; ?>
               </div>
            <?php endforeach; ?>
         <?php endif; ?>
      </div>
   </div>
   <div class="large__block container__fluid__wrap">

      <div class="l__wid600__pc">
         <?php if ($sustainability_heading): ?>
            <h2 class="heading__medium f__uppercase font text__center"><?php echo esc_html($sustainability_heading); ?></h2>
         <?php endif; ?>

         <?php if ($sustainability_repeater): ?>
            <?php foreach ($sustainability_repeater as $index => $item): ?>
               <div class="spacing__32">
                  <?php if (!empty($item['title'])): ?>
                     <p><?php echo esc_html($item['title']); ?></p>
                  <?php endif; ?>

                  <?php if (!empty($item['content'])): ?>
                     <ul class="m__ul spacing__16">
                        <?php
                        echo $item['content'];
                        ?>
                     </ul>
                  <?php endif; ?>
               </div>
            <?php endforeach; ?>
         <?php endif; ?>
      </div>
   </div>

   <div class="large__block container__fluid__wrap">

      <div class="l__wid600__pc">
        
            <h2 class="heading__medium f__uppercase font text__center"><?php echo esc_html(get_field('agencies_heading')); ?></h2>
            <?php
               echo get_field('agencies_txt_field');
            ?>   
         
      </div>
   </div>
   <div class="large__block container__fluid__wrap">
      <div class="l__wid600__pc">
         <h2 class="heading__medium f__uppercase font text__center"><?php echo get_field('policy_heading'); ?></h2>
         <?php if (have_rows('policy_items')): ?>
            <div class="spacing__32">
               <div class="accordion" id="accordionExample">
                  <?php $index = 0;
                  while (have_rows('policy_items')): the_row();
                     $title = get_sub_field('title');
                     $description = get_sub_field('description');
                     $link_url = get_sub_field('link_url');
                     $link_label = get_sub_field('link_label');

                     $collapse_id = 'collapse' . $index;
                     $heading_id = 'heading' . $index;
                     $is_first = ($index === 0);
                  ?>
                     <div class="accordion-item accordion__item">
                        <h2 class="accordion-header accordion__header" id="<?php echo esc_attr($heading_id); ?>">
                           <button class="accordion-button accordion__button <?php echo $is_first ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id); ?>" aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr($collapse_id); ?>">
                              <span><?php echo esc_html($index + 1) . '. ' . esc_html($title); ?></span>
                           </button>
                        </h2>
                        <div id="<?php echo esc_attr($collapse_id); ?>" class="accordion-collapse collapse <?php echo $is_first ? 'show' : ''; ?>" aria-labelledby="<?php echo esc_attr($heading_id); ?>" data-bs-parent="#accordionExample">
                           <div class="accordion-body accordion__body">
                              <?php
                              // If description has line breaks or <br> tags
                              $paragraphs = explode('<br>', $description);
                              foreach ($paragraphs as $para) {
                                 echo '<p class="spacing__16">' . trim($para) . '</p>';
                              }
                              ?>

                              <div class="spacing__16">
                                 <a href="<?php echo esc_url($link_url); ?>" class="m__txt__link spacing__24"><?php echo esc_html($link_label); ?></a>
                              </div>

                           </div>
                        </div>
                     </div>
                  <?php $index++;
                  endwhile; ?>
               </div>
               <!-- Static links after accordion -->
               <?php if (have_rows('link_repeater')): ?>
                  <?php $link_index = 0; ?>
                  <?php while (have_rows('link_repeater')): the_row();
                     $label = get_sub_field('link_lebel');
                     $url = get_sub_field('link_url');
                     $spacing_class = $link_index === 0 ? 'spacing__16' : 'spacing__08';
                  ?>
                     <div class="<?php echo esc_attr($spacing_class); ?>">
                        <a href="<?php echo esc_url($url); ?>" class="m__txt__link m__txt__link__caps">
                           <?php echo esc_html(($link_index + 1 + $index) . '. ' . $label); ?>
                        </a>
                     </div>
                  <?php $link_index++;
                  endwhile; ?>
               <?php endif; ?>

            </div>
      </div>
   <?php endif; ?>

   </div>
</div>

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