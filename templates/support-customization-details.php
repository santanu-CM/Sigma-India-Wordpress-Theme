<?php

/**
 * Template Name: Support Customization Details Page 
 */
get_header();
?>

<div class="body__container__inner container__fluid__wrap">
 <div class="large__block">
     <?php
        global $post;
        
        if ($post->post_parent) {
            $parent_id = $post->post_parent;
            $parent_title = get_the_title($parent_id);
            
            ?>
        <p class="text__center"><a href="<?php echo get_field('parent_link'); ?>" class="f__uppercase f__ul"><?php echo get_field( 'parent_title' ); ?></a></p>
        <?php } ?>
        
        <?php if ( $title = get_field( 'title' ) ) : ?></h1>
    	    <h1 class="f__h2 f__uppercase spacing__40 text__center content__wid740"><?php echo  $title; ?></h1>
        <?php endif; ?>
 </div>
 <?php if ( have_rows( 'content' ) ) : ?>
	<?php while ( have_rows( 'content' ) ) :
		the_row(); ?>
		
		 <?php if ( $text_content = get_sub_field( 'text_content' ) ) : ?>
             <div class="medium__block">
                    <div class="content__width560__pc">
                        <?php echo $text_content; ?>
                       <!--<P class="">Chargeable installation service of the Rear Filter Holder FHR-11. The Rear Filter Holder FHR-11 is an accessory exclusively designed for the Sigma 14-24mm F2.8 DG HSM | Art and the Sigma 14mm F1.8 DG HSM | Art. It enables photographers to use a sheet filter on the lens. By attaching the Rear Filter Holder FHR-11 to the rear of the lens, it allows more freedom for photographic expression.</P>-->
                       <!--<p class="spacing__16">Only available for the Canon mount lens. There are no plans for the development in Sigma and Nikon mounts. In case it is not convenient for your environment to use the installation service and prefer to do it by your own effort, the necessary parts can be sold. Customers who do not own the appropriate tools or who do not feel confident in attaching the filter holder themselves may take advantage of the chargeable installation service.</p>-->
                    </div>
             </div>
             <?php endif; ?>
             
             <?php if ( get_sub_field( 'image_column' ) == 'Two' ) : ?>
                 <div class="large__block">
                    <div class="l__panel__grid panel__2__pc">
                       <div class="content__card">
                          <figure>
                              <?php
                                $first_image = get_sub_field( 'first_image' );
                                if ( $first_image ) : ?>
                                	<img src="<?php echo esc_url( $first_image['url'] ); ?>" alt="">
                               <?php endif; ?>
                          </figure>
                          <?php if ( $first_image_title = get_sub_field( 'first_image_title' ) ) : ?>
                            <p class="f__ul f__uppercase spacing__16"><?php echo esc_html( $first_image_title ); ?></p>
                          <?php endif; ?>
                          
                       </div>
                       <div class="content__card">
                          <figure>
                              <?php
                                $second_image = get_sub_field( 'second_image' );
                                if ( $second_image ) : ?>
                                	<img src="<?php echo esc_url( $second_image['url'] ); ?>" alt="">
                                <?php endif; ?>
                          </figure>
                          <?php if ( $second_image_title = get_sub_field( 'second_image_title' ) ) : ?>
                            	<p class="f__ul f__uppercase spacing__16"><?php echo esc_html( $second_image_title ); ?></p>
                          <?php endif; ?>
                       </div>
                    </div>
                 </div>
             <?php endif; ?>
             <?php if ( get_sub_field( 'image_column' ) == 'One' &&  get_sub_field( 'first_image' ) != '' ) : ?>
                 <div class="spacing__20">
                    <div class="l__wid700__pc">
                       <figure>
                          <?php
                                $first_image = get_sub_field( 'first_image' );
                                if ( $first_image ) : ?>
                                	<img src="<?php echo esc_url( $first_image['url'] ); ?>" alt="">
                               <?php endif; ?>
                       </figure>
                    </div>
                 </div>
             <?php endif; ?>
             
	<?php endwhile; ?>
 <?php endif; ?>
 <div class="large__block">
    <div class="content__width560__pc">
        <?php if ( $bottom_text = get_field( 'bottom_text' ) ) : ?>
        	<P class=""><?php echo esc_html( $bottom_text ); ?></P>
        <?php endif; ?>
       <div class="btn__full__width spacing__40 product__overview__block__body">
           
          <a class="m__btn" href="<?php echo get_field( 'button_link' ); ?>"><?php echo get_field( 'button_text' ); ?></a>
       </div>
    </div>
 </div>
</div>

<?php get_footer(); ?>