<?php
$mount_conversion_service_page_content = get_field('mount_conversion_service_page_content');
?>
<div class="how__it__works__wrapp">
    <div class="container">
        <div class="how__it__works__inner">
            <div class="global__heading__wrapp">
                <?php if(!empty($mount_conversion_service_page_content['how_it_works_title'])):?>
                <h2><?php echo $mount_conversion_service_page_content['how_it_works_title'];?></h2>
                <?php endif;?>
                <?php echo apply_filters('the_content',$mount_conversion_service_page_content['how_it_works_content']);?>
            </div>
            <?php if(!empty($mount_conversion_service_page_content['mount_converter_product_image'])):?>
            <div class="image__box">
                <img src="<?php echo $mount_conversion_service_page_content['mount_converter_product_image'];?>" alt="">
            </div>
            <?php endif;?>
        </div>
        <div class="global__heading__wrapp">
            <?php if(!empty($mount_conversion_service_page_content['cost_by_lens_title'])):?>
            <h2><?php echo $mount_conversion_service_page_content['cost_by_lens_title'];?></h2>
            <?php endif;?>
            <?php echo apply_filters('the_content',$mount_conversion_service_page_content['cost_by_lens_content'] );?>
        </div>

        <p>*For more information, please call +91 94444 01805 or email saleschennai@shetalacamera.com </p>
		
        <div class="repair__request">
            <div class="image__box">
                <img src="https://www.sigmaindia.in/wp-content/uploads/2024/11/hands-holding-open-camera-1-scaled.jpg" alt="" />
            </div>
            <div class="global__heading__wrapp">
                <h2>Request a mount conversion </h2>
                <p>Simply fill out the online repair request form, select your lens and request a mount conversion in
                    the ‘fault description’ box. Please specify the mount you would like the lens to be converted to.
                </p>
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#booknowModal">
					Book a repair
				</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Start-->
<div class="modal fade" id="booknowModal" tabindex="-1" aria-labelledby="centeredModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="centeredModalLabel">Book a Repair</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             <?php echo do_shortcode('[contact-form-7 id="acab1a6" title="Book a repair form"]');?>
            </div>
        </div>
    </div>
</div>
<!-- Modal End-->
