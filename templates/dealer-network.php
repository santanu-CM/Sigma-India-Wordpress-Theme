<?php
/**
 * Template Name: Dealer Network Page 
 */
get_header();
?>

<?php if ( have_rows( 'dealer_network_field_content' ) ) : ?>
	<?php while ( have_rows( 'dealer_network_field_content' ) ) :
		the_row(); ?>

<div class="body__container__inner container__fluid__wrap">
         <div class="large__block">
         	<?php if ( $dealer_network_title = get_sub_field( 'dealer_network_title' ) ) : ?>
				<h1 class="f__h2 f__uppercase font text__center"><?php echo esc_html( $dealer_network_title ); ?></h1>
			<?php endif; ?>
			<?php if ( $dealer_network_content = get_sub_field( 'dealer_network_content' ) ) : ?>
				<p class="text__center spacing__40"><?php echo $dealer_network_content; ?></p>
			<?php endif; ?>
            
         </div>

         <?php if ( have_rows( 'locations_details' ) ) : $i = 1; ?>
			<?php while ( have_rows( 'locations_details' ) ) :
				the_row(); ?>
				
			
         <div class="<?php if($i==1){?>large__block<?php }else{?>medium__block <?php } ?>">

            <div class="c__spec__list">
            	<?php if ( $state_name = get_sub_field( 'state_name' ) ) : ?>
					<h1 class="heading__medium spacing__08 f__uppercase font"><?php echo esc_html( $state_name ); ?></h1>
				<?php endif; ?>
               <div class="medium__block">
                  <div class="c__network__list">
					<?php if ( have_rows( 'stores' ) ) : $a = 1; ?>
						<?php while ( have_rows( 'stores' ) ) :
							the_row(); ?>	
		                     <div class="c__network__card<?php if($a > 1){ ?> spacing__40__sp<?php } ?>">
		                     	<?php if ( $store_name = get_sub_field( 'store_name' ) ) : ?>
									 <p class="f__ul f__uppercase font">store<br><?php echo esc_html( $store_name ); ?></p>
								<?php endif; ?>

								<?php if ( $store_location = get_sub_field( 'store_location' ) ) : ?>
									<p class="spacing__16 f__ul f__uppercase font">Location<br><?php echo esc_html( $store_location ); ?></p>
								<?php endif; ?>

								<?php if ( $contact_number = get_sub_field( 'contact_number' ) ) : ?>
									<p class="spacing__16 f__ul f__uppercase font">Phone<br><?php echo esc_html( $contact_number ); ?></p>
								<?php endif; ?>
		                     </div>
                     <?php $a++; endwhile; ?>
					<?php endif; ?>
                  </div>
               </div>
            </div>
            
         </div>

         	<?php  $i++; endwhile; ?>
		<?php endif; ?>



         <div class="large__block">
         	<?php if ( $experience_zone_title = get_sub_field( 'experience_zone_title' ) ) : ?>
				 <h2 class="heading__medium font"><?php echo esc_html( $experience_zone_title ); ?></h2>
			<?php endif; ?>

            <div class="l__panel__grid panel__3__pc spacing__40">
               <?php if ( have_rows( 'experience_zone_details' ) ) : ?>
				<?php while ( have_rows( 'experience_zone_details' ) ) :
					the_row(); ?>
					
		               <div class="content__card">
		                  <figure class="post__figure">
		                     <img src="<?php echo esc_url( get_sub_field( 'store_image' ) ); ?>" alt="">
		                  </figure>
		                  <?php if ( $store_name = get_sub_field( 'store_name' ) ) : ?>
								<p class="f__uppercase spacing__16"><?php echo esc_html( $store_name ); ?></p>
							<?php endif; ?>
							<?php if ( $store_state = get_sub_field( 'store_state' ) ) : ?>
								<p class="f__uppercase spacing__16"><?php echo esc_html( $store_state ); ?></p>
							<?php endif; ?>
		                  
		               </div>

             <?php endwhile; ?>
			<?php endif; ?>
            </div>
         </div>
</div>

		
	<?php endwhile; ?>
<?php endif; ?>      

      <?php get_footer();?>