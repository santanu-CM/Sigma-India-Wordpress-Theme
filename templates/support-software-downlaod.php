<?php

/**
 * Template Name: Support Software Page 
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
        <p class="text__center"><a href="<?php echo home_url('/support/');?>" class="f__uppercase f__ul"><?php echo esc_html($parent_title); ?></a></p>
        <?php } ?>
        <?php if ( $title = get_field( 'title' ) ) : ?>
			<h1 class="f__h2 f__uppercase spacing__40 text__center"><?php echo esc_html( $title ); ?></h1>
		<?php endif; ?>
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

         <?php if ( have_rows( 'download_list' ) ) : ?>
			<?php while ( have_rows( 'download_list' ) ) :
				the_row(); ?>

		         <div class="large__block">
		         	<?php if ( $heading = get_sub_field( 'heading' ) ) : ?>
						<h2 class="heading__medium f__uppercase text__center"><?php echo esc_html( $heading ); ?></h2>
					<?php endif; ?>
		            <div class="medium__block">
		               <div class="l__panel__grid panel__3__pc">
		                  <?php if ( have_rows( 'software_list' ) ) : ?>
							<?php while ( have_rows( 'software_list' ) ) :
								the_row(); ?>
				                  <div class="content__card">
				                     <figure>
				                     	<?php
										$software_image = get_sub_field( 'software_image' );
										if ( $software_image ) : ?>
											<img src="<?php echo esc_url( $software_image['url'] ); ?>" alt="">
										<?php endif; ?>
				                     </figure>
				                     
				                     <p class="f__uppercase spacing__16"><?php echo get_sub_field( 'software_name' ); ?></p>
				                     <p class="spacing__20 spacing__right__120__pc spacing__right__0__sp"><?php echo get_sub_field( 'software_short_text' ); ?></p>
				                     <a href="<?php echo get_sub_field( 'download_link' ); ?>" class="m__txt__link display__inline spacing__24"><?php echo get_sub_field( 'download_text' ); ?></a>
				                  </div>
		                  <?php endwhile; ?>
						<?php endif; ?>

		               </div>
		            </div>
		         </div>
         <?php endwhile; ?>
		<?php endif; ?>

      </div>


<?php get_footer(); ?>