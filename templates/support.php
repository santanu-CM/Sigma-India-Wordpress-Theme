<?php

/**
 * Template Name: Support Page 
 */
get_header();
?>

<div class="body__container__inner container__fluid__wrap">
         <div class="large__block">
            <div class="l__wid500__pc">
                <?php if ( $title = get_field( 'title' ) ) : ?>
                    <h1 class="f__h2 f__uppercase text__center"><?php echo $title; ?></h1>
                <?php endif; ?>
                <?php if ( $content = get_field( 'content' ) ) : ?>
                    <p class="spacing__40 text__center"><?php echo esc_html( $content ); ?></p>
                <?php endif; ?>
                <?php if ( $link_text = get_field( 'link_text' ) ) : ?>
                    <p class="spacing__40 text__center"><a href="<?php echo get_field( 'link' ); ?>" class="f__uppercase f__ul"><?php echo esc_html( $link_text ); ?></a></p>
                <?php endif; ?>
            </div>
         </div>
         <div class="medium__block">
            <div class="l__wid560__pc">
               <figure>
                <?php
                $image = get_field( 'image' );
                if ( $image ) : ?>
                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="">
                <?php endif; ?>
               </figure>
            </div>
         </div>
         <div class="large__block">
            <div class="c__search__input">
               <div class="mf__search__box">
                  <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="form-group form__group">
                        <div class="input-group input__group">
                            <input type="text" name="s" class="form-control form__control body__bgcolor" placeholder="Search by keyword" />
                            <button type="submit" class="search__bar__btn"></button>
                        </div>
                    </div>
                </form>
               </div>
            </div>
            <div class="c__search__summary f__ul spacing__24 l__grid l__grid__pc">
               <p class="c__search__ttl">Popular searches</p>
               <ul class="c__search__list l__grid l__grid__pc">
                <?php foreach (get_popular_searches(5) as $term => $count): ?>
                  <li><a href="<?php echo esc_url(home_url('/?s=' . urlencode($term))); ?>"><?php echo esc_html($term); ?></a></li>
                <?php endforeach; ?>
                  
               </ul>
            </div>
         </div>
         <div class="large__block">
            <h2 class="heading__medium f__uppercase text__center">Search by Purpose</h2>
            <div class="medium__block">
               <div class="l__panel__grid panel__4__pc">
                  <?php if ( have_rows( 'purpose_list' ) ) : ?>
                    <?php while ( have_rows( 'purpose_list' ) ) :
                        the_row(); ?>
                        <div class="m__product__card">
                            <a href="<?php echo  get_sub_field( 'purpose_link' ); ?>">
                            <figure class="m__product__card__img">
                                <?php
                                $purpose_image = get_sub_field( 'purpose_image' );
                                if ( $purpose_image ) : ?>
                                    <img src="<?php echo esc_url( $purpose_image['url'] ); ?>" alt="">
                                <?php endif; ?>
                            </figure>
                            <?php if ( $purpose_title = get_sub_field( 'purpose_title' ) ) : ?>
                               <h3 class="heading__medium f__uppercase spacing__16"> <?php echo esc_html( $purpose_title ); ?></h3>
                            <?php endif; ?>
                            </a>
                        </div>
                  <?php endwhile; ?>
                <?php endif; ?>
               </div>
            </div>
            <div class="medium__block">
               <div class="content__width560__pc">
                  <figure>
                    <?php
                        $above_image = get_field( 'above_image' );
                        if ( $above_image ) : ?>
                            <img src="<?php echo esc_url( $above_image['url'] ); ?>" alt="">
                        <?php endif; ?>
                  </figure>
               </div>
            </div>
         </div>
         <div class="large__block">
            <h2 class="heading__medium f__uppercase text__center">Customization services</h2>
            <div class="medium__block">
               <ul class="c__txt__card l__grid panel__4__pc">
                  <?php if ( have_rows( 'service_list' ) ) : ?>
                        <?php while ( have_rows( 'service_list' ) ) :
                            the_row(); ?>
                                <li>
                                    <p class="spacing__16 f__uppercase heading__medium"><?php echo get_sub_field( 'service_title' ); ?></p>
                                    <p class="spacing__16 spacing__right__16 spacing__right__0__sp"><?php echo get_sub_field( 'service_description' ); ?></p>
                                    <div class="spacing__24">
                                        <a href="<?php echo get_sub_field( 'button_link' ); ?>" class="f__uppercase m__txt__link spacing__24"><?php echo get_sub_field( 'button_text' ); ?></a>
                                    </div>
                                </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
               </ul>
            </div>
         </div>
         <div class="large__block">
            <h2 class="heading__medium f__uppercase text__center">WARRANTY</h2>
            <div class="medium__block">
               <ul class="c__txt__card l__grid panel__4__pc">
                  <li>
                     <p class="spacing__16 f__uppercase heading__medium"><?php echo get_field( 'warranty_title' ); ?></p>
                     <p class="spacing__16 spacing__right__16 spacing__right__0__sp"><?php echo get_field( 'warrantry_text' ); ?></p>
                     <div class="spacing__24">
                        <a href="<?php echo get_field( 'warranty_link' ); ?>" class="f__uppercase m__txt__link spacing__24"><?php echo get_field( 'warranty_button_text' ); ?></a>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
         <div class="large__block">
            <h2 class="heading__medium f__uppercase text__center">Updates</h2>
            <div class="medium__block">
               <ul class="c__news__list">
                  
<?php
$update_list = get_field( 'update_list' ); // ACF Post Object (multiple posts)
if ( $update_list ) :
    foreach ( $update_list as $post ) :
        setup_postdata( $post ); ?>
        <li>
            <a href="<?php the_permalink(); ?>" class="c__news__list__item l__grid">
                <p class="f__ul c__news__list__date"><?php echo get_the_date( 'Y.m.d' ); ?></p>
                <p class="f__ul c__news__list__ttl"><?php the_title(); ?></p>
                <p class="f__ul f__uppercase c__news__list__cat">
                    <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        $category_names = wp_list_pluck( $categories, 'name' );
                        echo esc_html( implode( ' | ', $category_names ) );
                    }
                    ?>
                </p>
            </a>
        </li>
    <?php endforeach;
    wp_reset_postdata();
endif;
?>
                  
               </ul>
            </div>
            <div class="medium__block f__uppercase text__center">
               <a href="<?php echo get_field('view_link'); ?>" class="f__uppercase m__txt__link spacing__24"><?php echo get_field('view_more_txt');?></a>
            </div>
         </div>
      </div>

<?php get_footer(); ?>