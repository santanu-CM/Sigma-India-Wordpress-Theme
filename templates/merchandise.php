<?php

/**
 * Template Name: Merchandise Page
 */
get_header();
$banner_image = get_field('banner_image');
$coin_image = get_field('point_image');
?>
<div class="body__container__inner">
   <div class="large__block container__fluid__wrap">
      <div class="content__wid1024 text__center">
         <h1 class="f__h1 f__uppercase"><?php echo get_field('title'); ?></h1>
      </div>
      <div class="btn__wrap__center spacing__50">
         <a href="" id="cust_btn"><?php echo get_field('sub_title'); ?></a>
      </div>
   </div>
   <div class="large__block container__fluid__wrap spacing__bottom__40">
      <div class="large__panel__grid large__panel__grid__full">
         <div class="content__card">
            <figure>
               <img src="<?php echo $banner_image['url']; ?>" alt="" />
            </figure>
         </div>
      </div>
   </div>
   <div class="large__block container__fluid__wrap spacing__50">
      <p class="l__wid560__pc"><?php echo get_field('description'); ?></p>
   </div>
   <div id="gifting-section" class="large__block container__fluid__wrap spacing__50">
      <div class="gallery">
         <?php if (have_rows('btn_text')): ?>
            <div class="filter__wrapp">
               <?php while (have_rows('btn_text')): the_row();
                  $btn_name = get_sub_field('btn_name');
                  $btn_id = get_sub_field('btn_id');
                  $btn_image = get_sub_field('image');
               ?>
                  <button class="btn" data-filter="<?php echo esc_attr($btn_id); ?>">
                     <i class="icon__box">
                        <?php if ($btn_image): ?>
                           <img src="<?php echo esc_url($btn_image['url']); ?>" alt="<?php echo esc_attr($btn_name); ?>" />
                        <?php endif; ?>
                     </i>
                     <?php echo esc_html($btn_name); ?>
                  </button>
               <?php endwhile; ?>
            </div>
         <?php endif; ?>

         <div class="items__wrapp">
            <?php
            // Map tier names to category classes
            $class_map = [
               'BRONZE' => 'category1',
               'SILVER' => 'category2',
               'GOLD'   => 'category3',
            ];
            $taxonomy = 'product_cat';
            $required_term = 'gifting';

            // Fetch all membership tiers
            $membership_tiers = get_posts([
               'post_type' => 'membership_tier',
               'posts_per_page' => -1,
               'post_status' => 'publish',
            ]);

            foreach ($membership_tiers as $tier) {
               $tier_id = $tier->ID;
               $tier_title = strtoupper($tier->post_title);
               $css_class = isset($class_map[$tier_title]) ? $class_map[$tier_title] : '';

               // Get product IDs assigned to this tier
               $product_ids = get_post_meta($tier_id, 'gifting_products', true);

               if (!empty($product_ids) && is_array($product_ids)) {
                  // Filter only products that belong to 'electronics-gift-item'
                  $filtered_ids = array_filter($product_ids, function ($pid) use ($taxonomy) {
                     // Get term object for 'gifting'
                     $gifting_term = get_term_by('slug', 'gifting', $taxonomy);
                 
                     // Get all child term IDs of 'gifting'
                     $child_terms = get_term_children($gifting_term->term_id, $taxonomy);
                 
                     // Get all terms assigned to product
                     $product_terms = wp_get_post_terms($pid, $taxonomy, ['fields' => 'ids']);
                 
                     // Check: assigned to gifting AND not assigned to any child
                     $in_gifting = in_array($gifting_term->term_id, $product_terms);
                     $in_child = array_intersect($child_terms, $product_terms);
                 
                     return $in_gifting && empty($in_child);
                 });
                 
                
                  if (!empty($filtered_ids)) {
                      $products = wc_get_products([
                          'include' => $filtered_ids,
                          'status' => 'publish',
                          'limit' => -1,
                      ]);

                      foreach ($products as $product) {
                      ?>
                          <div class="item__card <?php echo esc_attr($css_class); ?>">
                              <a href="<?php echo esc_url(get_permalink($product->get_id())); ?>">
                                  <div class="card__image">
                                      <figure>
                                          <?php echo $product->get_image(); ?>
                                      </figure>
                                  </div>
                                  <div class="card__content">
                                      <p class="f__uppercase"><?php echo esc_html($product->get_name()); ?></p>
                                      <div class="points__wrap">
                                          <i class="icon__box">
                                              <img src="<?php echo esc_url($coin_image['url']); ?>" alt="Points" />
                                          </i>
                                          <p class="f__uppercase"><?php echo esc_html(get_post_meta($product->get_id(), '_points_id', true)); ?> Points</p>
                                      </div>
                                  </div>
                              </a>
                          </div>
          <?php
                      }
                  }
              }
            }
            ?>
         </div>

      </div>
   </div>
   <div class="large__block container__fluid__wrap">
     
         <h2 class="f__uppercase heading__medium text__center"><?php echo get_field('faq_txt'); ?></h2>
    
      <div class="container__wid__fill">
         <p class="f__h4 spacing__bottom__20"><?php echo get_field('general'); ?></p>
      </div>
      <div class="container__wid__medium">
         <?php if (have_rows('faq_repeter')): ?>
            <div class="accordion" id="accordionExample">
               <?php
               $index = 1;
               while (have_rows('faq_repeter')): the_row();
                  $question = get_sub_field('question');
                  $answer = get_sub_field('faq_answer');
                  $heading_id = 'heading' . $index;
                  $collapse_id = 'collapse' . $index;
               ?>
                  <div class="accordion-item accordion__item">
                     <h2 class="accordion-header accordion__header" id="<?php echo esc_attr($heading_id); ?>">
                        <button class="accordion-button accordion__button collapsed" type="button"
                           data-bs-toggle="collapse"
                           data-bs-target="#<?php echo esc_attr($collapse_id); ?>"
                           aria-expanded="false"
                           aria-controls="<?php echo esc_attr($collapse_id); ?>">
                           <span><?php echo esc_html($question); ?></span>
                        </button>
                     </h2>
                     <div id="<?php echo esc_attr($collapse_id); ?>"
                        class="accordion-collapse collapse"
                        aria-labelledby="<?php echo esc_attr($heading_id); ?>"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body accordion__body">
                           <?php echo wp_kses_post($answer); ?>
                        </div>
                     </div>
                  </div>
               <?php
                  $index++;
               endwhile;
               ?>
            </div>
         <?php endif; ?>
      </div>

   </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const btn = document.getElementById('cust_btn');
    const target = document.getElementById('gifting-section');

    if (btn && target) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            target.scrollIntoView({ behavior: 'smooth' });
        });
    }
});
</script>

<?php get_footer(); ?>