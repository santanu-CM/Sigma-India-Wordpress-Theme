<?php
/*
* Template Name: Product Category Lenses
*/
get_header();
$image1 = get_field('image');
$cat_id = 0;
if (!empty($_GET['cat_id'])) {
   $encrypted = $_GET['cat_id'];
   $cat_id = intval(sigma_decrypt($encrypted));
}
$term = get_term($cat_id, 'product_cat');
$child_terms = get_terms([
   'taxonomy'   => 'product_cat',
   'parent'     => $cat_id,
   'hide_empty' => false,
]);
$popular_cat = get_terms([
   'taxonomy'   => 'popular_categories',
   'hide_empty' => false,
   'order'  => 'DESC'
]);
$taxonomies = [
   'format' => 'Format',
   'mount' => 'Mount',
   'sensor' => 'Sensor Size',
   'type'   => 'Lens Type',
   'angle'  => 'Angle of View',
];
$ordered_slugs = ['contemporary', 'sports', 'art'];


$child_terms = [];

foreach ($ordered_slugs as $slug) {
   $term = get_term_by('slug', $slug, 'product_cat');
   if ($term && $term->parent == $cat_id) {
      $child_terms[] = $term;
   }
}

$term_icons = [
   'contemporary' => get_stylesheet_directory_uri() . '/new-assets/images/C.svg',
   'sports'       => get_stylesheet_directory_uri() . '/new-assets/images/S.svg',
   'art'          => get_stylesheet_directory_uri() . '/new-assets/images/A.svg',
];

?>
<div class="body__container__inner">
   <div class="large__block container__fluid__wrap">
      <div class="l__wid560__pc text__center">
         <h1 class="f__h1 f__uppercase"><?php echo get_field('title'); ?></h1>
         <p class="spacing__40"><?php echo get_field('description'); ?></p>
      </div>
   </div>
   <div class="medium__block container__fluid__wrap">
        
            <figure>
               <img src="<?php echo $image1['url']; ?>" alt="">
            </figure>       
   </div>
   <div class="large__block">
      <h2 class="heading__medium f__uppercase font text__center"><?php echo get_field('line_title'); ?></h2>
   </div>
   <div class="medium__block container__fluid__wrap">
      <?php
      if (! empty($child_terms) && ! is_wp_error($child_terms)) : ?>
         <div class="l__panel__grid panel__3__pc">
            <?php foreach ($child_terms as $term) :
               $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
               $image_url = wp_get_attachment_url($thumbnail_id);
               $term_link = get_term_link($term);
               $icon = isset($term_icons[$term->slug]) ? $term_icons[$term->slug] : '';
               $is_icon_image = (strpos($icon, '.svg') !== false || strpos($icon, '.png') !== false || strpos($icon, '.jpg') !== false);

            ?>
               <div class="content__card">
                  <figure>
                     <?php if ($image_url) : ?>
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($term->name); ?>">
                     <?php else : ?>
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder.jpg'); ?>" alt="Placeholder">
                     <?php endif; ?>
                  </figure>
                  <p class="f__uppercase spacing__16">
                     <?php if ($icon) : ?>
                        <span class="display__inline">
                           <i class="icon">
                              <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($term->name); ?> icon">
                           </i>
                        </span>
                     <?php endif; ?>
                     <?php echo esc_html($term->name); ?>
                  </p>
                  <p class="spacing__20 spacing__right__120__pc spacing__right__0__sp">
                     <?php echo esc_html($term->description); ?>
                  </p>
                  <?php if (get_field('btn_text')): ?>
                     <div class="btn__wrapp">
                        <a href="javascript:void(0)"
                           class="m__txt__link display__inline spacing__24 slide__menu__open"
                           data-menu="#slide-nav-readmore"
                           data-term="<?php echo esc_attr($term->slug); ?>">
                           <?php echo esc_html(get_field('btn_text')); ?>
                        </a>
                     </div>
                  <?php endif; ?>

               </div>
            <?php endforeach; ?>
         </div>
      <?php endif; ?>
   </div>
   <div class="large__block">
      <?php if (have_rows('single_product_repeater')): ?>
         <?php while (have_rows('single_product_repeater')): the_row();
            $product_name = get_sub_field('product_name');
            $product_image = get_sub_field('product_image'); // returns image array
            $btn_text = get_sub_field('btn_text');
            $product_url = get_sub_field('product_url');
         ?>
            <div class="cover__block">
               <figure>
                  <?php if (!empty($product_image)): ?>
                     <img src="<?php echo esc_url($product_image['url']); ?>" alt="<?php echo esc_attr($product_image['alt']); ?>">
                  <?php endif; ?>
               </figure>
               <div class="cover__block__headline">
                  <?php if ($product_name): ?>
                     <h2 class="f__h2 f__uppercase text__center"><?php echo nl2br(esc_html($product_name)); ?></h2>
                  <?php endif; ?>
                  <?php if ($btn_text && $product_url): ?>
                     <div class="btn__wrapp"><a href="<?php echo esc_url($product_url); ?>"><?php echo esc_html($btn_text); ?></a></div>
                  <?php endif; ?>
               </div>
            </div>
         <?php endwhile; ?>
      <?php endif; ?>

   </div>

   <div class="large__block">
      <h2 class="heading__medium f__uppercase font text__center"><?php echo get_field('all_cat_txt'); ?></h2>
      <div class="container__fluid__wrap spacing__80 l__panel__grid panel__2__pc">
         <?php foreach ($popular_cat as $term) :
            $image_id = get_term_meta($term->term_id, 'popular_categories_image', true);
            $image_url = wp_get_attachment_url($image_id);

            $term_link = add_query_arg([
               'cat_id' => $_GET['cat_id'], // or dynamically set it based on context
               'type'   => $term->slug,
            ], site_url('/product-listing-lenses/'));

         ?>
            <div class="content__card">
               <figure>
                  <?php if ($image_url): ?>
                     <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($term->name); ?>">
                  <?php endif; ?>
               </figure>
               <p class="f__uppercase spacing__16"><?php echo esc_html($term->name); ?></p>
               <?php if ($term->description): ?>
                  <p class="spacing__20 spacing__right__120__pc spacing__right__0__sp">
                     <?php echo esc_html($term->description); ?>
                  </p>
               <?php endif; ?>
               <a href="<?php echo esc_url($term_link); ?>" class="m__txt__link display__inline spacing__24"><?php echo get_field('popular_cat_btn'); ?></a>
            </div>
         <?php endforeach; ?>
      </div>
   </div>
   <div class="large__block container__fluid__wrap">
   <h2 class="heading__medium f__uppercase font text__center"><?php echo get_field('featured_txt'); ?></h2>

      <div class="product__cards spacing__80__pc spacing__40__sp">
         <div class="slick-wrapper slick__wrapper">
            <div id="products__slider" class="products__grid">
               <?php if (have_rows('featured_product')): ?>
                  <?php while (have_rows('featured_product')): the_row();
                     $category_name = get_sub_field('category_name');
                     $product_name  = get_sub_field('product_name');
                     $product_image = get_sub_field('product_image'); // Can be URL or Array
                     $page_link     = get_sub_field('page_link');
                     // Handle image field (supports both URL or array return formats)
                     if (is_array($product_image)) {
                        $image_url = $product_image['url'];
                        $image_alt = $product_image['alt'];
                     } else {
                        $image_url = $product_image;
                        $image_alt = $product_name;
                     }
                  ?>
                     <div class="slide-item slide__item">
                        <div class="product__card hr">
                           <a href="<?php echo esc_url($page_link); ?>">
                              <div class="image__box">
                                 <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" />
                              </div>
                              <div class="content__box">
                                 <p class="f__uppercase"><?php echo esc_html($category_name); ?></p>
                                 <p><?php echo esc_html($product_name); ?></p>
                              </div>
                           </a>
                        </div>
                     </div>
                  <?php endwhile; ?>
               <?php else: ?>
                  <p>No featured products found.</p>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>

   <?php
  
   $terms = get_term_by('slug', 'discontinued-models', 'product_cat');
   $term_id = $terms->term_id;
   $term = get_term($term_id, 'product_cat');

   if ($term && !is_wp_error($term)) :
      $thumbnail_id = get_term_meta($term_id, 'thumbnail_id', true);
      $image_url = wp_get_attachment_url($thumbnail_id);
      $term_name = $term->name;
      $term_description = $term->description;
      $term_link = get_term_link($term_id, 'product_cat');
   ?>
      <div class="large__block container__fluid__wrap">
         <div class="img__left c__story__block">
            <div class="c__story__block__body spacing__20__sp">
               <h2 class="heading__medium f__uppercase"><?php echo esc_html($term_name); ?></h2>
               <p class="spacing__20"><?php echo esc_html($term_description); ?></p>
               <a href="<?php echo esc_url($term_link); ?>" class="m__txt__link display__inline spacing__24"><?php echo get_field('popular_cat_btn'); ?></a>
            </div>
            <figure class="c__story__block__img">
               <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($term_name); ?>">
            </figure>
         </div>
      </div>
   <?php endif; ?>

   <div class="large__block container__fluid__wrap">
      <div class="header__block">
         <form id="product-filter-form" method="post">
            <input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>">
            <div class="c__filterbar f__ul f__uppercase">
               <h2 class="heading__medium f__uppercase font text__center"><?php echo get_field('all_cat_txt2'); ?></h2>
               <div class="c__filter__bar__head l__grid content__between">
                  <!-- <p class="f__ul">Product line</p> -->
                  <div class="l__grid">
                     <p id="filter-btn" class="c__filter__bar__btn f__ul"><?php //echo get_field('filter'); 
                                                                           ?></p>
                     <p class="f__ul single__link"><a href="#"><?php echo get_field('compare'); ?></a></p>
                  </div>
               </div>
               <div id="filter-category" class="c__filter__bar__box" style="display:block;">
                  <ul class="l__panel__grid spacing__48__pc spacing__32__sp category__list panel__6__pc">
                     <li class="l__grid flex__column__pc panel__2__sp">
                        <p class="single__link text__color__secondary">Product line</p>
                        <?php
                        if (!empty($child_terms) && !is_wp_error($child_terms)) {
                           echo '<ul class="category__list__item l__grid flex__column spacing__12__pc">';
                           foreach ($child_terms as $child) {
                              echo '<li class="f__uppercase font__size__base">
                                            <label class="m__filter__selector">
                                                <input type="checkbox" name="concept" value="' . esc_attr($child->slug) . '">
                                                <span>' . esc_html($child->name) . '</span>
                                            </label>
                                        </li>';
                           }
                           echo '</ul>';
                        }
                        ?>
                     </li>
                     <?php
                     foreach ($taxonomies as $taxonomy => $title):
                        $terms = get_terms([
                           'taxonomy'   => $taxonomy,
                           'hide_empty' => false,
                        ]);
                      
                        if (!empty($terms) && !is_wp_error($terms)): ?>
                           <li class="l__grid flex__column__pc panel__2__sp">
                              <p class="single__link text__color__secondary"><?php echo esc_html($title); ?></p>
                              <ul class="category__list__item l__grid flex__column spacing__12__pc">
                                 <?php foreach ($terms as $term): ?>
                                    <li class="f__uppercase font__size__base">
                                       <label class="m__filter__selector">
                                          <!-- <input type="checkbox" name="<?php echo esc_attr($taxonomy); ?>" value="<?php echo esc_attr($term->slug); ?>"> -->
                                          <input type="checkbox" name="<?php echo esc_attr($taxonomy); ?>[]" value="<?php echo esc_attr($term->slug); ?>">

                                          <span><?php echo esc_html($term->name); ?></span>
                                       </label>
                                    </li>
                                 <?php endforeach; ?>
                              </ul>
                           </li>
                     <?php endif;
                     endforeach;
                     ?>
                  </ul>
                  <p class="m__txt__link single__link txt__link__cancel spacing__32"><a href="#"><?php //echo get_field('cl_filter'); 
                                                                                                   ?></a></p>
               </div>
            </div>
         </form>
      </div>
   </div>
   <div class="large__block container__fluid__wrap">
      <div class="l__grid panel__2__pc">
         <div class="content__box">
            <h2 class="f__ul f__uppercase text__center__sp"><?php echo esc_html(get_field('explore_btn_txt')); ?></h2>
         </div>

         <div class="l__grid panel__2__pc spacing__64__sp">
            <?php if (have_rows('explore_repeater')) : ?>
               <?php while (have_rows('explore_repeater')) : the_row();
                  $name  = get_sub_field('name');
                  $image = get_sub_field('image');
                  $link  = get_sub_field('link');

                  // Handle image field
                  if (is_array($image)) {
                     $image_url = $image['url'];
                     $image_alt = $image['alt'] ?: $name;
                  } else {
                     $image_url = $image;
                     $image_alt = $name;
                  }
               ?>
                  <div class="content__card spacing__64__sp">
                     <a href="<?php echo esc_url($link); ?>">
                        <figure>
                           <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                        </figure>
                        <p class="f__uppercase spacing__16"><?php echo esc_html($name); ?></p>
                     </a>
                  </div>
               <?php endwhile; ?>
            <?php endif; ?>
         </div>
      </div>
   </div>

</div>
<div id="term-descriptions" style="display: none;">
   <?php if (have_rows('category_description')): ?>
      <?php while (have_rows('category_description')): the_row();
         $cat_term = get_sub_field('ctegory_name'); // This is a term object if it's a taxonomy field
         $cat_slug = is_object($cat_term) ? $cat_term->slug : sanitize_title($cat_term); // handle both cases
         $cat_desc = get_sub_field('category_description');

      ?>
         <div class="term-desc-item" data-term="<?php echo esc_attr($cat_slug); ?>">
            <?php echo wp_kses_post($cat_desc); ?>
         </div>
      <?php endwhile; ?>
   <?php endif; ?>
</div>


<div class="slide__menu">
   <div id="slide-nav-readmore" class="slide__menu__slider slide__menu__right">
      <div class="header__bar">
         <span class="slide__menu__title"></span>
         <span class="slide__menu__close">Close</span>
      </div>
      <div class="slide__menu__inner__wrapp">

      </div>
   </div>
</div>


<?php get_footer(); ?>
<script>
   jQuery(".slide__menu__open").on("click", function() {
      var menu = jQuery(this).attr("data-menu");
      var term = jQuery(this).data("term");

      // Find the matching description
      var desc = jQuery("#term-descriptions")
         .find('.term-desc-item[data-term="' + term + '"]')
         .html();
      jQuery(menu).find(".slide__menu__title").text(term.toUpperCase());

      // Inject into the slide panel
      jQuery(menu).find(".slide__menu__inner__wrapp").html(desc ? desc : "<p>No description available.</p>");
   });
</script>