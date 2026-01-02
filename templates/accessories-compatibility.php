<?php

/**
 * Template Name: Accessories Compatibility Page
 */
get_header();
?>

<div class="body__container__inner container__fluid__wrap">
         <div class="large__block">
            <div class="content__width500__pc">
               <p class="text__center"><a href="<?php echo get_field( 'parent_link' )?>" class="f__uppercase f__ul"><?php echo get_field( 'parent_title' )?></a></p>
               <?php if ( $title = get_field( 'title' ) ) : ?>
                	<h1 class="f__h2 f__uppercase spacing__40 text__center"><?php echo esc_html( $title ); ?></h1>
               <?php endif; ?>
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
         
         
    <?php if ( have_rows( 'accessories_list' ) ) : ?>
    	<?php
    	$i = 1;
    	while ( have_rows( 'accessories_list' ) ) :
    		the_row(); ?>
    		
             <div class="medium__block">
                 <?php if ( $accessories_heading = get_sub_field( 'accessories_heading' ) ) : ?>
                	<h2 class="heading__medium f__uppercase text__center"><?php echo esc_html( $accessories_heading ); ?></h2>
                <?php endif; ?>
                <div class="spacing__32">
                   <div class="accordion" id="accordionExample">
                       <?php if ( have_rows( 'accessories' ) ) : ?>
                    	<?php
                    	$a = 1;
                    	while ( have_rows( 'accessories' ) ) :
                    		the_row(); ?>
                              <div class="accordion-item accordion__item body__bgcolor">
                                 <h2 class="accordion-header accordion__header" id="heading-0">
                                    <button class="accordion-button accordion__button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $i; ?>-<?php echo $a; ?>" aria-expanded="false" aria-controls="collapse-0-0">
                                    <span><?php echo get_sub_field( 'accessories_name' ); ?></span>
                                    </button>
                                 </h2>
                                 <div id="collapse-<?php echo $i; ?>-<?php echo $a; ?>" class="accordion-collapse collapse" aria-labelledby="heading-0"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body accordion__body">
                                       <ul class="c__bg__card__Panel panel__4__pc spacing__08">
                                          <?php if ( have_rows( 'view_parts' ) ) : ?>
                                        	<?php while ( have_rows( 'view_parts' ) ) :
                                        		the_row(); 
                                        		$pdf_file = get_sub_field( 'pdf_file' );
                                        		?>
                                                  <li class="m__bg__card">
                                                     <a class="m__bg__card__inr" href="<?php echo esc_url( $pdf_file['url'] ); ?>">
                                                        <p class="f__ul"><?php echo get_sub_field( 'part_name' ); ?></p>
                                                        <p class="f__ul">PDF <?php echo get_sub_field( 'file_size' ); ?></p>
                                                        <div class="spacing__32">
                                                           <p class="f__uppercase f__ul m__txt__link">View</p>
                                                        </div>
                                                     </a>
                                                  </li>
                                          <?php endwhile; ?>
                                        <?php endif; ?>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                      <?php $a++; endwhile; ?>
                    <?php endif; ?>
                      
                   </div>
                </div>
             </div>
             
         <?php $i++; endwhile; ?>
    <?php endif; ?>
         
         
      </div>


<?php get_footer(); ?>