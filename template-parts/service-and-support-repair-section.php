<?php
$service_and_support_page_content = get_field('service_and_support_page_content');
?>
<div id="start" class="section__global__wrapp">
    <div class="container">
        <div class="support__wrapp">
            <div class="breadcrumb__wrapp breadcrumb__wrapp__body">
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/'));?>">Home</a></li>
                    <!-- <li><a href="#">Support</a></li> -->
                    <li><?php the_title();?></li>
                </ul>
            </div>
            <div class="support__inner__col">
                <?php if(!empty($service_and_support_page_content['repair_service_title'])):?>
                <div class="global__heading__wrapp">
                    <h2><?php echo $service_and_support_page_content['repair_service_title'];?></h2>
                </div>
                <?php endif;?>

                <?php if(!empty($service_and_support_page_content['repair_service_details'])):?>
                <div class="repair__wrapp">
                    <?php foreach($service_and_support_page_content['repair_service_details'] as $listing):?>
                    <div class="repair__inner__wrapp">
                        <?php if(!empty($listing['image'])):?>
                        <i class="icon__box">
                            <img src="<?php echo $listing['image'];?>" alt="">
                        </i>
                        <?php endif;?>
                        <?php if(!empty($listing['title'])):?>
                        <h3><?php echo $listing['title'];?></h3>
                        <?php endif;?>
                        <?php echo apply_filters('the_content',$listing['content'] );?>
                        <div class="btn__wrapp">
                            <a href="<?php echo !empty($listing['label_url']) ? $listing['label_url']: '#';?>"><?php echo $listing['label_title'];?></a>
                        </div>
                    </div>
                     <?php endforeach;?> 
                </div>
                <?php endif;?>

            </div>
            <div class="support__faqs__wrapp">
                <?php if(!empty($service_and_support_page_content['support_faq_title'])):?>
                <div class="global__heading__wrapp">
                    <h2><?php echo $service_and_support_page_content['support_faq_title'];?></h2>
                </div>
                <?php endif;?>
                <div class="accordion" id="accordionExample">
                   <?php
                      $index = 0;
                      foreach($service_and_support_page_content['faq_details'] as $listing):
                    ?>
                    <div class="accordion-item accordion__item">
                        <h2 class="accordion-header accordion__header" id="heading<?php echo $index;?>">
                            <button class="accordion-button accordion__button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse<?php echo $index;?>" aria-expanded="<?php echo $index===0 ? 'true':'false';?>" aria-controls="collapse<?php echo $index;?>">
                                <span><?php echo $listing['question'];?></span>
                            </button>
                        </h2>
                        <div id="collapse<?php echo $index;?>" class="accordion-collapse accordion__collapse collapse<?php echo $index===0? 'show':'';?>"
                            aria-labelledby="heading<?php echo $index;?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body accordion__body">
                                <?php echo apply_filters('the_content',$listing['answer']);?>
<!--                                 <div class="btn__wrapp">
                                    <a href="<?php //echo !empty($listing['service_pdf']) ? $listing['service_pdf']:'#';?>" target="_blank">
                                        <?php //echo $listing['service_pdf_title'];?>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <?php
                      $index++;
                      endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>