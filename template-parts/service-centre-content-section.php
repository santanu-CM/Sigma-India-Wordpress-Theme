<?php
$service_centre_field_content = get_field('service_centre_field_content');
?>
<div class="service__centre__wrapp">
    <div class="container">
        <div class="global__heading__wrapp">
            <?php if(!empty($service_centre_field_content['service_centre_title'])):?>
            <h2><?php echo $service_centre_field_content['service_centre_title'];?></h2>
            <?php endif;?>
            <?php echo apply_filters('the_content',$service_centre_field_content['service_centre_content'] );?>
        </div>
        <div class="accordion" id="accordionExample">
            <?php if(!empty($service_centre_field_content['service_centre_details'])): ?>
            <?php foreach($service_centre_field_content['service_centre_details'] as $index => $listing): ?>
            <?php
            $collapse_id = 'collapse' . $index;
            $heading_id = 'heading' . $index;
            ?>
            <div class="accordion-item accordion__item">
                <h2 class="accordion-header accordion__header" id="<?php echo $heading_id; ?>">
                    <button class="accordion-button accordion__button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#<?php echo $collapse_id; ?>" aria-expanded="true"
                        aria-controls="<?php echo $collapse_id; ?>">
                        <span><?php echo $listing['state_name']; ?></span>
                    </button>
                </h2>
                <div id="<?php echo $collapse_id; ?>"
                    class="accordion-collapse accordion__collapse collapse <?php echo $index == 0 ? 'show' : ''; ?>"
                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body accordion__body">
                        <?php if(!empty($listing['stores'])): ?>
                        <?php foreach($listing['stores'] as $listing): ?>
                        <div class="address__watpp">
                            <h3><?php echo $listing['store_name'];?></h3>
                            <?php echo apply_filters('the_content', $listing['store_location']);?>
                        </div>
                          <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>