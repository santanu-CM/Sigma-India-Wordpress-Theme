<?php if ( have_rows( 'faq_field_content' ) ) : ?>
	<?php while ( have_rows( 'faq_field_content' ) ) :
		the_row(); ?>
		


<div class="body__container__inner">
         <div class="large__block content__width500__pc container__fluid__wrap">
            <div class="text__center">
               <h2 class="heading__medium f__uppercase font"><a href="<?php echo get_sub_field('link');?>"><?php echo get_sub_field('support'); ?></a></h2>
               <h1 class="f__h2 f__uppercase font spacing__40"><?php echo get_sub_field('tilte'); ?></h2>
            </div>
            <div class="spacing__80">
               <figure>
                   <?php
                    $faq_image = get_sub_field( 'faq_image' );
                    if ( $faq_image ) : ?>
                    	<img src="<?php echo esc_url( $faq_image['url'] ); ?>" alt="">
                    <?php endif; ?>
                  
               </figure>
            </div>
         </div>
         
         <?php if ( have_rows( 'tabs_details' ) ) : $a= 1; ?>
            
        	<?php while ( have_rows( 'tabs_details' ) ) :
        	    
        		the_row(); ?>
	
                 <div class="large__block container__fluid__wrap">
                    <div class="l__wid600__pc">
                       <h2 class="heading__medium f__uppercase font text__center"> <?php if ( $tab_title = get_sub_field( 'tab_title' ) ) : ?>	<?php echo esc_html( $tab_title ); ?> <?php endif; ?> </h2>
                       <div class="spacing__32 l__wid600__pc">
                          <div class="accordion body__bgcolor" id="accordionExample-0">
                             <?php if ( have_rows( 'tab_details' ) ) : $i= 1; ?>
                            	<?php while ( have_rows( 'tab_details' ) ) :
                            		the_row(); ?>

                                <div class="accordion-item accordion__item body__bgcolor">
                                <h2 class="accordion-header accordion__header" id="heading0">
                                   <button class="accordion-button accordion__button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $a; ?>-<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $a; ?>-<?php echo $i; ?>">
                                       <?php if ( $question = get_sub_field( 'question' ) ) : ?>
                                        	<span><?php echo esc_html( $question ); ?></span>
                                       <?php endif; ?>
                                   </button>
                                </h2>
                                <div id="collapse-<?php echo $a; ?>-<?php echo $i; ?>" class="accordion-collapse accordion__collapse collapse" aria-labelledby="heading0" data-bs-parent="#accordionExample-0">
                                   <div class="accordion-body accordion__body">
        
                                      <div id="elementor-tab-content-7181" class="elementor-tab-content elementor-clearfix elementor-active" role="region" data-tab="1" aria-labelledby="elementor-tab-title-7181">
                                          <?php if ( $answer = get_sub_field( 'answer' ) ) : ?>
                                            	<?php echo $answer; ?>
                                        <?php endif; ?>
                                      </div>
        
                                   </div>
                                </div>
                             </div>
                             
                             <?php $i++; endwhile; ?>
                            <?php endif; ?>

                          </div>
                       </div>
                    </div>
                 </div>

       <?php $a++; endwhile; ?>
    <?php endif; ?>

      </div>
      
      	<?php endwhile; ?>
<?php endif; ?>
