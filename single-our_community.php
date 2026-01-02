<?php

get_header();
$youtube_id = get_field('youtube_video_id');
$equipment__image = get_field('equipment__image');
?>


<div class="body__container__inner">
   <div class="cms__cts__idt spacing__48">
      <div class="cms__cts__width">
         <h1 class="cms__main__title"><?php echo get_field('page_title'); ?></h1>
         <div class="cat__wrap">
            <p class="cat__title"><?php echo get_field('cat_title'); ?></p>
         </div>
      </div>
   </div>
   <div class="md__contents__detail__vismovie">
      <div class="slide__main">
         <?php
         if ($youtube_id):
         ?>
            <div class="mask__wrap">
               <iframe
                  data-youtube-id="<?php echo esc_attr($youtube_id); ?>"
                  id="yt_<?php echo esc_attr($youtube_id); ?>_0"
                  frameborder="0"
                  allowfullscreen
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  referrerpolicy="strict-origin-when-cross-origin"
                  title="YouTube video"
                  width="auto"
                  height="auto"
                  src="https://www.youtube.com/embed/<?php echo esc_attr($youtube_id); ?>?rel=0&amp;loop=1&amp;playlist=<?php echo esc_attr($youtube_id); ?>&amp;enablejsapi=1&amp;origin=<?php echo esc_url(get_site_url()); ?>"></iframe>
            </div>
         <?php endif; ?>
      </div>
   </div>
   <div class="page__multi__format">

      <div class="contents__seccol">
         <div class="cms__cts__width">
            <?php if (have_rows('page_section')): ?>
               <div class="md__section__anc__line">
                  <?php while (have_rows('page_section')): the_row(); ?>
                     <?php
                     $id = get_sub_field('id');      // anchor ID
                     $title = get_sub_field('title'); // anchor text
                     ?>
                     <?php if ($id && $title): ?>
                        <p><a class="anc__line" href="#<?php echo esc_attr($id); ?>"><?php echo esc_html($title); ?></a></p>
                     <?php endif; ?>
                  <?php endwhile; ?>
               </div>
            <?php endif; ?>

         </div>
      </div>

      <div id="anchor_introduction" class="contents__seccol">
         <div class="text__center">
            <h2 class="sec__title"><?php echo get_field('introduction_title'); ?></h2>
         </div>
         <div class="sec__cts__col">
            <div class="md__contents__col__wrap">
               <div class="col__inr align__center">
                  <div class="col__txt__wrap">
                     <p><?php echo get_field('introduction_content'); ?></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div id="anchor_introduction_sec01" class="contents__seccol">
         <div class="text__center">
            <h2 class="sec__title"><?php echo get_field('interview_section_title'); ?></h2>
            <p class="col__title"><?php echo get_field('interview_section_subtitle'); ?></p>
         </div>
         <div class="sec__cts__col">
            <div class="md__contents__col__wrap">
               <div class="col__inr align__center">
                  <div class="col__txt__wrap">
                     <?php echo get_field('interview_main_content'); ?>
                  </div>
                  <?php $profile = get_field('interviewee_profile'); ?>
                  <?php if ($profile): ?>
                     <div class="profile__col">
                        <div class="interview__inr">
                           <?php if (!empty($profile['image'])): ?>
                              <figure class="profile__bg">
                                 <img src="<?php echo esc_url($profile['image']['url']); ?>" alt="<?php echo esc_attr($profile['name']); ?>">
                              </figure>
                           <?php endif; ?>

                           <div class="interview__txt">
                              <?php if (!empty($profile['name'])): ?>
                                 <div class="name__col">
                                    <p class="name__tet"><?php echo esc_html($profile['name']); ?></p>
                                 </div>
                              <?php endif; ?>

                              <div class="col__txt__wrap">
                                 <?php if (!empty($profile['bio'])): ?>
                                    <p>
                                       <?php echo wp_kses_post($profile['bio']); ?>

                                    </p>
                                 <?php endif; ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  <?php endif; ?>

               </div>
            </div>
         </div>
      </div>
      <?php if (have_rows('more_photo_list')): ?>
         <div id="anchor_more_photo" class="contents__seccol">
            <div class="pmd__line__ttl text__center">
               <h2 class="sec__title"><?php echo get_field('more_txt'); ?></h2>
               <div class="cms__cts__width photo__list">
                  <?php $i = 1; ?>
                  <?php while (have_rows('more_photo_list')): the_row();
                     $photo = get_sub_field('photo'); ?>
                     <?php if ($photo): ?>
                        <div class="folio__img">
                           <figure class="folio__img__thumb">
                              <img src="<?php echo esc_url(is_array($photo) ? $photo['url'] : $photo); ?>" onclick="openModal();currentSlide(<?php echo $i; ?>)">
                           </figure>
                        </div>
                        <?php $i++; ?>
                     <?php endif; ?>
                  <?php endwhile; ?>
               </div>
            </div>
         </div>
      <?php endif; ?>

      <div id="anchor_introduction_sec02" class="contents__seccol">
         <div class="text__center">
            <h2 class="sec__title"><?php echo get_field('composer_title'); ?></h2>
            <p class="col__title"><?php echo get_field('composer_sub_text'); ?></p>
         </div>
         <div class="sec__cts__col">
            <div class="md__contents__col__wrap">
               <div class="col__inr align__center">
                  <div class="col__txt__wrap">
                     <?php echo get_field('composer_content'); ?>
                  </div>
                  <?php if ($profile): ?>
                     <div class="profile__col">
                        <div class="interview__inr">
                           <?php if (!empty($profile['image'])): ?>
                              <figure class="profile__bg">
                                 <img src="<?php echo esc_url($profile['image']['url']); ?>" alt="<?php echo esc_attr($profile['name']); ?>">
                              </figure>
                           <?php endif; ?>

                           <div class="interview__txt">
                              <?php if (!empty($profile['name'])): ?>
                                 <div class="name__col">
                                    <p class="name__tet"><?php echo esc_html($profile['name']); ?></p>
                                    <p class="post__text"><?php echo esc_html($profile['sub_field']); ?></p>
                                 </div>
                              <?php endif; ?>

                              <div class="col__txt__wrap">
                                 <?php if (!empty($profile['bio'])): ?>
                                    <p>
                                       <?php echo wp_kses_post($profile['bio']); ?>

                                    </p>
                                 <?php endif; ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
     
      <?php if (have_rows('masthead_section')): ?>
         <div id="anchor_masthead" class="contents__seccol cm__bg">
            <div class="cms__cts__width">
               <h2 class="sec__title"><?php echo get_field('masthead_title'); ?></h2>
               <div class="md__contents__col__wrap">
                  <p class="col__title"><?php echo get_field('staff'); ?></p>
                  <div class="member__list panel__4__pc panel__2__sp">
                     <?php while (have_rows('masthead_section')): the_row();
                        $role = get_sub_field('role');
                        $name = get_sub_field('name');
                     ?>
                        <div class="member__list__card">
                           <div class="member__card__inr">
                              <p class="sub__head"><?php echo esc_html($role); ?></p>
                              <p class="member__name"><?php echo esc_html($name); ?></p>
                           </div>
                        </div>
                     <?php endwhile; ?>
                  </div>
               </div>
            </div>
         </div>
      <?php endif; ?>

      <div id="anchor_used_equipment" class="contents__seccol">
         <div class="cms__cts__width">
            <h2 class="sec__title"><?php echo get_field('equipment_title'); ?></h2>
            <p class="col__title"><?php echo get_field('sub_title'); ?></p>
            <div class="md__contents__col__wrap">
               <div class="prod__list panel__5 panel__2__sp">
                  <div class="prod__card">
                     <a class="prod__card__inr" href="<?php echo get_field('equipment_link'); ?>">
                        <figure class="prod__img">
                           <img src="<?php echo $equipment__image['url']; ?>" alt="">
                        </figure>
                        <p class="cap__title text__center"><?php echo get_field('equipment_name'); ?></p>
                     </a>
                  </div>
               </div>
            </div>
            <p class="col__title"><?php echo get_field('still_lenses_title'); ?></p>
            <div class="md__contents__col__wrap">
               <?php if (have_rows('still_repeater')): ?>
                  <div class="prod__list panel__5 panel__2__sp">
                     <?php while (have_rows('still_repeater')): the_row();
                        $product_name = get_sub_field('product_name');
                        $product_link = get_sub_field('product_link');
                        $product_image = get_sub_field('product_image');
                     ?>
                        <div class="prod__card">
                           <a class="prod__card__inr" href="<?php echo esc_url($product_link); ?>">
                              <figure class="prod__img">
                                 <img src="<?php echo esc_url($product_image['url']); ?>" alt="<?php echo esc_attr($product_name); ?>">
                              </figure>
                              <p class="cap__title text__center"><?php echo esc_html($product_name); ?></p>
                           </a>
                        </div>
                     <?php endwhile; ?>
                  </div>
               <?php endif; ?>

            </div>
         </div>
      </div>
   </div>
   <div class="md__breadcrumb">
      <?php if (have_rows('breadcrumb')): ?>
         <div class="cms__cts__width">
            <ul>
               <?php while (have_rows('breadcrumb')): the_row();
                  $name = get_sub_field('name');
                  $link = get_sub_field('link');
               ?>
                  <li>
                     <?php if ($link): ?>
                        <a href="<?php echo esc_url($link); ?>"><?php echo esc_html($name); ?></a>
                     <?php else: ?>
                        <?php echo esc_html($name); ?>
                     <?php endif; ?>
                  </li>
               <?php endwhile; ?>
            </ul>
         </div>
      <?php endif; ?>

   </div>
</div>

<?php get_footer(); ?>