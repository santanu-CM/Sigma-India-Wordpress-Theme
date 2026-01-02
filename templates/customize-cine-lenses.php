<?php

/**
 * Template Name: Customize Cine Lense Page 
 */
get_header();
?>

<div class="body__container__inner container__fluid__wrap">
         <div class="large__block">
            <p class="text__center"><a href="<?php echo home_url('/support/');?>" class="f__uppercase f__ul">Support</a></p>
            <?php if ( $title = get_field( 'title' ) ) : ?>
                <h1 class="f__h2 f__uppercase spacing__40 text__center"><?php echo esc_html( $title ); ?></h1>
            <?php endif; ?>
            <div class="content__width500__pc">
                <?php if ( $content = get_field( 'content' ) ) : ?>
                    <P class="spacing__40 text__center"><?php echo $content; ?></p>
                <?php endif; ?>
            </div>
         </div>
        <?php if ( have_rows( 'customization_list' ) ) : ?>
                    <div class="large__block">
                        <ul class="c__txt__card l__grid panel__4__pc">
                        <?php while ( have_rows( 'customization_list' ) ) :
                            the_row(); ?>
                            <li>
                                <p class="spacing__20 f__uppercase heading__medium"><?php echo get_sub_field( 'customization_title' ); ?></p>
                                <p class="spacing__20 spacing__right__16"><?php echo get_sub_field( 'customization_content' ); ?></p>
                                <div class="spacing__24">
                                    <a href="<?php echo get_sub_field( 'customization_link' ); ?>" class="f__uppercase m__txt__link spacing__24"><?php echo get_sub_field( 'button_label' ); ?></a>
                                </div>
                            </li>
                        <?php endwhile; ?>
                        </ul>
                    </div>
        <?php endif; ?>

      </div>


<?php get_footer(); ?>