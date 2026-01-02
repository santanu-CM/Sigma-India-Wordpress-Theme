<?php

/**
 * Template Name: Repair Page 
 */
get_header();
?>

<div class="body__container__inner container__fluid__wrap">
    <div class="large__block">
    <div class="content__width500__pc">
        <p class="text__center"><a href="<?php echo  get_field( 'parent_link' ); ?>" class="f__uppercase f__ul"><?php echo  get_field( 'parent_title' ); ?></a></p>
        <?php if ( $title = get_field( 'title' ) ) : ?>
            <h1 class="f__h2 f__uppercase spacing__40 text__center"><?php echo esc_html( $title ); ?></h1>
        <?php endif; ?>
        <?php if ( $content = get_field( 'content' ) ) : ?>
            <p class="spacing__40 text__center"><?php echo $content; ?></p>
        <?php endif; ?>
        <p class="spacing__40 text__center"><a href="<?php echo  get_field( 'link' ); ?>" class="f__uppercase f__ul"><?php echo  get_field( 'contact_txt' ); ?></a></p>
    </div>
    </div>
    <div class="medium__block">
    <div class="content__width560__pc">
        <figure>
            <?php
            $image = get_field( 'image' );
            if ( $image ) : ?>
                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="">
            <?php endif; ?>
        </figure>
    </div>
    </div>
</div>

<?php get_footer(); ?>