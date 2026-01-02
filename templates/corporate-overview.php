<?php

/**
 * Template Name: Corporate Overview Page 
 */
get_header();
?>

<div class="body__container__inner container__fluid__wrap">
         <div class="large__block">
            <h1 class="f__h2 f__uppercase text__center">Corporate overview</h1>
         </div>
         <div class="large__block">
            <div class="l__panel__grid panel__2__pc">
           
               <div class="product__pec__block__tab product__block__relative">
                  <p class="active f__ul f__uppercase show__single">Structure</p>
               </div>
               <div class="tab__content__details">
                  <ul id="content1" class="c__speclist">
                     <li class="l__grid panel__2">
                        <div class="panel__grid">
                           <p class="f__ul">Company name</p>
                        </div>
                        <div class="panel__grid">
                           <p class="f__ul"><?php echo get_field( 'company_name' ); ?></p>
                        </div>
                     </li>
                     <li class="l__grid panel__2">
                        <div class="panel__grid">
                           <p class="f__ul">CEO</p>
                        </div>
                        <div class="panel__grid">
                           <p class="f__ul"><?php echo get_field( 'ceo' ); ?></p>
                        </div>
                     </li>
                     <li class="l__grid panel__2">
                        <div class="panel__grid">
                           <p class="f__ul">Business Contents</p>
                        </div>
                        <div class="panel__grid">
                           <p class="f__ul"><?php echo get_field( 'business_contents' ); ?></p>
                        </div>
                     </li>
                     <li class="l__grid panel__2">
                        <div class="panel__grid">
                           <p class="f__ul">Establishment</p>
                        </div>
                        <div class="panel__grid">
                           <p class="f__ul"><?php echo get_field( 'establishment' ); ?></p>
                        </div>
                     </li>
                     <li class="l__grid panel__2">
                        <div class="panel__grid">
                           <p class="f__ul">Incorporated</p>
                        </div>
                        <div class="panel__grid">
                           <p class="f__ul"><?php echo get_field( 'incorporated' ); ?></p>
                        </div>
                     </li>
                     <li class="l__grid panel__2">
                        <div class="panel__grid">
                           <p class="f__ul">Capital</p>
                        </div>
                        <div class="panel__grid">
                           <p class="f__ul"><?php echo get_field( 'capital' ); ?></p>
                        </div>
                     </li>
                     <li class="l__grid panel__2">
                        <div class="panel__grid">
                           <p class="f__ul">Employees</p>
                        </div>
                        <div class="panel__grid">
                           <p class="f__ul"><?php echo get_field( 'employees' ); ?></p>
                        </div>
                     </li>
                     <li class="l__grid panel__2">
                        <div class="panel__grid">
                           <p class="f__ul">Annual Turnover</p>
                        </div>
                        <div class="panel__grid">
                           <p class="f__ul"><?php echo get_field( 'annual_turnover' ); ?></p>
                        </div>
                     </li>
                     <li class="l__grid panel__2">
                        <div class="panel__grid">
                           <p class="f__ul">Stock</p>
                        </div>
                        <div class="panel__grid">
                           <p class="f__ul"><?php echo get_field( 'stock' ); ?></p>
                        </div>
                     </li>
                     <li class="l__grid panel__2">
                        <div class="panel__grid">
                           <p class="f__ul">Oversea subsidiaries</p>
                        </div>
                        <div class="panel__grid">
                           <p class="f__ul"><?php echo get_field( 'oversea_subsidiaries' ); ?></p>
                        </div>
                     </li>
                     <li class="l__grid panel__2">
                        <div class="panel__grid">
                           <p class="f__ul">Overseas sales network in addition to above</p>
                        </div>
                        <div class="panel__grid">
                           <p class="f__ul"><?php echo get_field( 'overseas_sales_network' ); ?></p>
                        </div>
                     </li>
                  </ul>
                  
               </div>
            </div>
         </div>
         <div class="large__block">
            <div class="l__panel__grid panel__2__pc">
               <div class="product__pec__block__tab product__block__relative">
                  <p class="active f__ul f__uppercase show__single">Location</p>
               </div>
               <div class="tab__content__details">
                  <ul id="content1" class="c__speclist">
                     <li>
                        <div class="l__grid panel__2">
                           <div class="panel__grid">
                              <p class="f__ul">Head Office</p>
                           </div>
                           <div class="panel__grid">
                              <p class="f__ul"><?php echo get_field( 'head_office' ); ?></p>
                           </div>
                        </div>
                        <figure class="spacing__32 l__panel__grid spacing__bottom__24">
                            <?php
                            $head_office_photo = get_field( 'head_office_photo' );
                            if ( $head_office_photo ) : ?>
                                <img src="<?php echo esc_url( $head_office_photo['url'] ); ?>" alt="">
                            <?php endif; ?>
                        </figure>
                     </li>
                     <li class="l__grid panel__2 spacing__bottom__24">
                        <div class="panel__grid">
                           <p class="f__ul">Customer Support Center</p>
                        </div>
                        <div class="panel__grid">
                           <p class="f__ul"><?php echo get_field( 'customer_support_center' ); ?></p>
                        </div>
                     </li>
                     <li>
                        <div class="l__grid panel__2">
                           <div class="panel__grid">
                              <p class="f__ul">Aizu Factory</p>
                           </div>
                           <div class="panel__grid">
                              <p class="f__ul"><?php echo get_field( 'aizu_factory' ); ?></p>
                           </div>
                        </div>
                        <figure class="spacing__32 l__panel__grid">
                            <?php
                            $aizu_factory_image = get_field( 'aizu_factory_image' );
                            if ( $aizu_factory_image ) : ?>
                                <img src="<?php echo esc_url( $aizu_factory_image['url'] ); ?>" alt="">
                            <?php endif; ?>
                           
                        </figure>
                     </li>
                     
                  </ul>
                  
               </div>
            </div>
         </div>
      </div>

<?php get_footer(); ?>