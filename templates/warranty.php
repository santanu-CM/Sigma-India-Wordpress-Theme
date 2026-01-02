<?php

/**
 * Template Name: Support Warranty Page 
 */
get_header();
?>
<div class="body__container__inner">
         <div class="large__block container__fluid__wrap">
            <div class="content__width500__pc">
               <p class="text__center"><a href="<?php echo get_field('support_link');?>" class="f__uppercase f__ul"><?php echo get_field('support_txt');?></a></p>
               <?php if ( $title = get_field( 'title' ) ) : ?>
                	<h1 class="f__h2 f__uppercase spacing__40 text__center"><?php echo esc_html( $title ); ?></h1>
                <?php endif; ?>
            </div>
         </div>
         <div class="large__block container__fluid__wrap">
           
               <div class="accordion" id="accordionExample">
                  <div class="accordion-item accordion__item body__bgcolor">
                     <h2 class="accordion-header accordion__header" id="heading-0">
                        <button class="accordion-button accordion__button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-0-0" aria-expanded="false" aria-controls="collapse-0-0">
                        <span><?php echo get_field('title2');?></span>
                        </button>
                     </h2>
                     <div id="collapse-0-0" class="accordion-collapse collapse" aria-labelledby="heading-0"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body accordion__body">
                           <ul class="c__bg__card__Panel panel__4__pc spacing__08">
                               <?php if ( have_rows( 'warranty_list' ) ) : ?>
                                	<?php while ( have_rows( 'warranty_list' ) ) :
                                		the_row();
                    
                                            $download_file = get_sub_field( 'download_file' );
                                         ?>

                                		<li class="m__bg__card">
                                             <a class="m__bg__card__inr" target="_blank" href="<?php echo esc_url( $download_file['url'] ); ?>">
                                                <p class="f__ul f__uppercase"><?php echo get_sub_field( 'warranty_for' ); ?></p>
                                                <div class="spacing__32">
                                                   <p class="f__uppercase f__ul m__txt__link"><?php echo get_sub_field( 'download_button_text' ); ?></p>
                                                </div>
                                             </a>
                                          </li>
                              
                                	<?php endwhile; ?>
                                <?php endif; ?>                                                                                          
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
           
         </div>
      </div>

<?php get_footer(); ?>